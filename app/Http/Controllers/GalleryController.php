<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display the gallery page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = [];

        $directories = Storage::disk('public')->directories('gallery');

        foreach ($directories as $directory) {
            $files = Storage::disk('public')->files($directory);

            // Filter only image files (optional)
            $images = array_filter($files, function ($file) {
                return preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
            });

            // Store relative URLs for Blade view
            $categories[] = [
                'name' => basename($directory),
                'images' => array_map(fn($path) => Storage::url($path), $images),
            ];
        }

        return view('gallery', compact('categories'));
    }
}
