<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('gallery', compact('contacts'));
    }
}
