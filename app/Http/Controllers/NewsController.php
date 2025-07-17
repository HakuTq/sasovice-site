<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $newsCollection = collect(config('news'))->map(function ($item) {
            $item['text'] = Str::limit($item['text'], 180);
            return $item;
        });

        $perPage = 10;
        $page = $request->get('page', 1);

        $news = new \Illuminate\Pagination\LengthAwarePaginator(
            $newsCollection->forPage($page, $perPage),
            $newsCollection->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function show($id)
    {
        $newsItem = collect(config('news'))->firstWhere('id', $id);

        if (!$newsItem) {
            abort(404);
        }

        return view('news.show', [
            'newsItem' => $newsItem,
        ]);
    }
}
