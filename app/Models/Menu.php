<?php

namespace App\Models; // The namespace of the model, which follows the PSR-4 standard for autoloading classes.

use Illuminate\Database\Eloquent\Factories\HasFactory; // Imports the HasFactory trait, which provides factory methods for the model.
use Illuminate\Database\Eloquent\Model; // Imports the base Eloquent Model class, which provides the core functionality for interacting with the database.

/**
 * The Menu class represents a model for a menu item in the application.
 * It extends the base Eloquent Model class, inheriting functionality to interact with the database.
 */
class Menu extends Model
{
    use HasFactory; // Includes the HasFactory trait, which allows you to create instances of this model using factories for testing or seeding the database.
}
