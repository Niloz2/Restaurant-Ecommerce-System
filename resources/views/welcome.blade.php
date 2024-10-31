<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Selah Kitchen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>

    @include('components.client-navigation')


    <!-- Hero Start -->
    <div class="container-fluid bg-light py-2 my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 col-md-12">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome
                        to Selah Kitchen</small>
                    <h1 class="display-2 mb-4 animated bounceInDown">Order <span
                            class="text-primary">Selah</span>Kitchen For Your Dream Event</h1>
                    <a href="#menu-list"
                        class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Order
                        Now</a>
                    <a href="#book-form"
                        class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Book For
                        Later</a>
                </div>
                <div class="col-lg-5 col-md-12">
                    <img src="img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Service Start -->
    <div class="container-fluid service py-2">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                    Services</small>
                <h1 class="display-5 mb-5">What We Offer</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-utensils fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Fine Dining Experience</h4>
                                <p class="mb-4">Enjoy an exquisite dining experience with our gourmet dishes prepared
                                    by top chefs.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-birthday-cake fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Event Catering</h4>
                                <p class="mb-4">Perfect for weddings, birthdays, and corporate events with a variety
                                    of menu options.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-truck fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Home Delivery</h4>
                                <p class="mb-4">Delicious meals delivered straight to your door with prompt and
                                    reliable service.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-cocktail fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Cocktail Bar</h4>
                                <p class="mb-4">Enjoy a wide selection of cocktails and beverages at our stylish bar.
                                </p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-pizza-slice fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Pizza Night</h4>
                                <p class="mb-4">Join us for a special pizza night featuring a variety of handcrafted
                                    pizzas.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-glass-cheers fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Brunch Specials</h4>
                                <p class="mb-4">Indulge in our delicious brunch specials every weekend.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-table fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Private Dining</h4>
                                <p class="mb-4">Book a private dining experience for intimate gatherings or special
                                    occasions.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fas fa-cake fa-7x text-primary mb-4"></i>
                                <h4 class="mb-3">Custom Cakes</h4>
                                <p class="mb-4">Order custom cakes for your celebrations with unique designs and
                                    flavors.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Book Us Start -->
    <div id="book-form" class="container-fluid contact py-3 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0">
                <div class="col-1">
                    <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start"
                        style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
                <div class="col-10">
                    <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                        <div class="text-center">
                            <small
                                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Book
                                Us</small>
                            <h1 class="display-5 mb-5">Contact Us To Get Our Services</h1>
                        </div>
                        <div class="row g-4 form">
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    {{-- <option selected>Select Country</option> --}}
                                    <option value="1">Tanzania</option>
                                    {{-- <option value="2">Other</option> --}}
                                    {{-- <option value="3">India</option> --}}
                                    {{-- <option value="4">USA</option> --}}
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    <option selected>Select City</option>
                                    <option value="1">Dodoma</option>
                                    <option value="2">Dar-es-salaam</option>
                                    <option value="3">Morogoro</option>
                                    <option value="4">Other</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    <option selected>Select Palace</option>
                                    <option value="1">Depend On City</option>
                                    <option value="2">Swaswa</option>
                                    <option value="3">Manzese</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    <option selected>Small Event</option>
                                    <option value="1">Event Type</option>
                                    <option value="2">Big Event</option>
                                    <option value="3">Small Event</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    <option selected>No. Of plates</option>
                                    <option value="1">less than 10</option>
                                    <option value="2">10-50</option>
                                    <option value="3">50-100</option>
                                    <option value="4">100-150</option>
                                    <option value="5">150-200</option>
                                    <option value="6">200-500</option>
                                    <option value="7">500+</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select class="form-select border-primary p-2" aria-label="Default select example">
                                    <option selected>Vegetarian</option>
                                    <option value="1">Vegetarian</option>
                                    <option value="2">Non Vegetarian</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="mobile" class="form-control border-primary p-2"
                                    placeholder="Your Contact No.">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="date" class="form-control border-primary p-2"
                                    placeholder="Select Date">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <input type="email" class="form-control border-primary p-2"
                                    placeholder="Enter Your Email">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end"
                        style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Book Us End -->



    <!-- Blog Start -->
    <div class="container-fluid blog py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                    Blog</small>
                <h1 class="display-5 mb-5">Be First Who Read News</h1>
            </div>
            <div class="row gx-4 justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="overflow-hidden rounded">
                                <!-- Convert the longblob to a base64 string and use it in the src attribute -->
                                <img src="data:image/jpeg;base64,{{ base64_encode($blog->image) }}"
                                    class="img-fluid w-100" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-content mx-4 d-flex rounded bg-light">
                                <div class="text-dark bg-primary rounded-start">
                                    <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                        <p class="fw-bold mb-0">
                                            {{ \Carbon\Carbon::parse($blog->published_at)->format('d') }}</p>
                                        <p class="fw-bold mb-0">
                                            {{ \Carbon\Carbon::parse($blog->published_at)->format('M') }}</p>
                                    </div>
                                </div>
                                <!-- Display the title within the same div -->
                                {{-- <a href="{{ route('singleBlog', $blog->id) }}"
                                    class="h5 lh-base my-auto h-100 p-3">{{ $blog->title }}</a> --}}
                                <a href="/singleBlog/{{ $blog->id }}"
                                    class="h5 lh-base my-auto h-100 p-3">{{ $blog->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->
    @include('components.client-footer');

    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/66d5d0a150c10f7a00a31c18/1i6pjdudj';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
