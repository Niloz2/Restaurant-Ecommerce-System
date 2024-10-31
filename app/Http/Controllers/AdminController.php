<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
    public function manageUsers() {
        return view('admin.users');
    }

    public function manageMenu() {
        return view('admin.menu');
    }

    public function manageOrders() {
        return view('admin.orders');
    }

    public function manageBlog() {
        return view('admin.blog');
    }

    public function manageAbout() {
        return view('admin.about');
    }

    public function manageUserProfiles() {
        return view('admin.userProfiles');
    }

    public function manageFoodMenu() {
        return view('admin.foodMenu');
    }

    public function managePayment() {
        return view('admin.payment');
    }

    public function manageSubscription() {
        return view('admin.subscription');
    }

    public function manageSuggestions() {
        return view('admin.suggestions');
    }

    public function manageContact() {
        return view('admin.contact');
    }
}
