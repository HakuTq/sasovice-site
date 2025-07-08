<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactsController extends Controller
{
    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $contacts = collect(config('contacts'));

        $perPage = 3;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $contacts->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $contacts->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('contact', ['contacts' => $paginated]);
    }
}
