<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HuntingAssociationController extends Controller
{
    public function index(Request $request)
    {
        $news = array_map(function ($item) {
            $item['text'] = Str::limit($item['text'], 180);
            $item['text.de'] = Str::limit($item['text.de'] ?? '', 180);
            $item['title.de'] = $item['title.de'] ?? $item['title'];
            return $item;
        }, array_slice(config('news'), 0, 3));

        return view('hs', compact('news'));
    }
}