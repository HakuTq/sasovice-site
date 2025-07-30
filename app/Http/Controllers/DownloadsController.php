<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    public function index()
    {
        $filePaths = Storage::disk('public')->files('download');

        $files = array_map(function ($file) {
            return [
                'name' => basename($file),
                'path' => Storage::url($file),
                'type' => pathinfo($file, PATHINFO_EXTENSION),
                'size' => Storage::disk('public')->size($file),
                'last_modified' => date('d.m.Y H:i', Storage::disk('public')->lastModified($file)),
            ];
        }, $filePaths);

        return view('downloads', compact('files'));
    }
}
