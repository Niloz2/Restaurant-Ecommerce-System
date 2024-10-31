  <!-- Menu Start -->
  <div class="container-fluid menu py-2">
      <div class="container">
          <div class="text-center wow bounceInUp#" {{-- data-wow-delay="0.1s" --}}>
              {{-- <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Menu</small> --}}
              <h1 class="display-5 mb-5">Select Menu of Your Choice</h1>
          </div>
          <div class="tab-class text-center">
              <a href="cart" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Order Now</a>
              <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp">
                  <li class="nav-item p-2">
                      <a class="nav-link d-flex py-2 mx-2 border border-primary rounded-pill bg-white text-dark category-tab"
                          data-category="all"style="cursor: pointer;" id="category-all">
                          <span class="text-dark" style="width: 150px;">All</span>
                      </a>
                  </li>
                  @foreach ($categories as $category)
                      <li class="nav-item p-2">
                          <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill category-tab nav-link"
                              data-category="{{ $category->name }}"style="cursor: pointer;">
                              <span class="text-dark" style="width: 150px;">{{ $category->name }}</span>
                          </a>
                      </li>
                  @endforeach
              </ul>

              <div class="tab-content">
                  <div id="menu-items" class="tab-pane fade show active">
                      <div class="container">
                          <div class="row g-4" id="menu-items-container">
                              @foreach ($menuItems as $item)
                                  <div class="col-lg-6 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                                      <div class="card h-100 border-0 shadow-sm">
                                          <div class="row g-0">
                                              <div class="col-md-4">
                                                  <!-- Styled Image using Bootstrap 5 classes -->
                                                  <img class="img-fluid rounded-start" src="{{ $item->image_data }}"
                                                      alt="{{ $item->name }}">
                                              </div>
                                              <div class="col-md-8">
                                                  <div class="card-body">
                                                      <div class="d-flex justify-content-between">
                                                          <h5 class="card-title">{{ $item->name }}</h5>
                                                          <h5 class="text-primary">{{ number_format($item->price) }} Tsh
                                                          </h5>
                                                      </div>
                                                      <p class="card-text">{{ $item->description }}</p>
                                                      <button class="btn btn-primary cart-btn"
                                                          data-meal-name="{{ $item->name }}"
                                                          data-price="{{ $item->price }}">
                                                          <i class="fas fa-cart-plus">Add to Cart</i>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>


          </div>
      </div>
  </div>
  <script>
      $(document).ready(function() {
          $('.category-tab').on('click', function() {
              let categoryName = $(this).data('category');

              // Event listener for the 'all' category | When the All Category is Clicked, it opens the '/' route instead of reloading the page
              $('#category-all').on('click', function() {
                  // Redirect to the '/' route
                  window.location.href = '/';
              });


              // Remove the 'active' class from all category tabs
              $('.category-tab').removeClass('active');

              // Add the 'active' class to the clicked category tab
              $(this).addClass('active');

              $.ajax({
                  url: '/categoryName', // Ensure this matches your route
                  method: 'POST',
                  data: {
                      _token: "{{ csrf_token() }}",
                      categoryName: categoryName
                  },
                  success: function(menuItems) {
                      let container = $('#menu-items-container');
                      container
                          .empty(); // Clear previous items without removing the container

                      // Check if menuItems is an array and not empty
                      if (Array.isArray(menuItems) && menuItems.length > 0) {
                          menuItems.forEach(function(item) {
                              container.append(`
                             <div class="col-lg-4 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="menu-item card shadow-sm border-0 h-100 rounded overflow-hidden">
                            <img class="card-img-top img-fluid rounded-top" src="${item.image_data}" alt="${item.name}" style="object-fit: cover; height: 200px;">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0 text-truncate">${item.name}</h5>
                                    <h5 class="text-primary mb-0">${item.price} Tsh</h5>
                                </div>
                                <p class="card-text text-muted mb-3 text-truncate">${item.description}</p>
                                <button class="btn btn-primary mt-auto cart-btn d-flex justify-content-center align-items-center" data-meal-name="${item.name}" data-price="${item.price}">
                                    <i class="fas fa-cart-plus me-2">Add to Cart</i>
                                </button>
                            </div>
                        </div>
                    </div>
                        `);
                          });
                      } else {
                          container.append(
                              '<p>No menu items available for this category.</p>');
                      }
                  },
                  error: function(xhr) {
                      console.log(xhr);
                      alert('Failed to fetch menu items.');
                  }
              });
          });

          // Event delegation for dynamically added "Add to Cart" buttons
          $('#menu-items-container').on('click', '.cart-btn', function() {
              let button = $(this);
              let mealName = button.data('meal-name');
              let price = button.data('price');

              if (button.hasClass('added')) {
                  // Remove from cart
                  $.ajax({
                      url: "{{ route('cart.remove') }}",
                      method: 'POST',
                      data: {
                          _token: "{{ csrf_token() }}",
                          mealName: mealName
                      },
                      success: function(response) {
                          // Update button appearance
                          button.removeClass('added btn-danger');
                          button.addClass('btn-primary');
                          button.find('i').removeClass('fa-minus').addClass(
                              'fas fa-cart-plus');
                          button.find('i').text(" Add to Cart");
                      },
                      error: function(xhr) {
                          alert('Failed to remove item from cart.');
                      }
                  });
              } else {
                  // Add to cart
                  $.ajax({
                      url: "{{ route('cart.add') }}",
                      method: 'POST',
                      data: {
                          _token: "{{ csrf_token() }}",
                          mealName: mealName,
                          price: price
                      },
                      success: function(response) {
                          // Update button appearance
                          button.addClass('added btn-danger');
                          button.removeClass('btn-primary');
                          button.find('i').removeClass('fa-plus').addClass('fa-minus');
                          button.find('i').text(" Remove");
                      },
                      error: function(xhr) {
                          alert('Failed to add item to cart.');
                      }
                  });
              }
          });
      });
  </script>
  <!-- Menu End -->
