<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $reservations = Reservation::where('status', false)->get();
        $sliderCount = Slider::count();
        $contactCount = Contact::count();
        return view('admin.dashboard', compact('categoryCount', 'itemCount','reservations', 'sliderCount', 'contactCount'));
    }
}
