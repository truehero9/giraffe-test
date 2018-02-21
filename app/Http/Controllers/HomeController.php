<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $adverts = Advert::latest()->paginate(Advert::ITEMS_ON_PAGE);

        return view('home', compact('adverts'));
    }
}
