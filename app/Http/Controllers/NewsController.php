<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $newsCollection = collect(config('news'));
        $perPage = 10;
        $page = $request->get('page', 1);
        $news = new \Illuminate\Pagination\LengthAwarePaginator(
            $newsCollection->forPage($page, $perPage),
            $newsCollection->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('news', [
            'news' => $news,
        ]);
    }
}
