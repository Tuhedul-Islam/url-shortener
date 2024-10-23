<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function create()
    {
        return view('create-link');
    }

    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);

        $originalUrl = $request->input('url');
        $link = Link::shortenUrl($originalUrl);

        return view('show-link', compact('originalUrl', 'link'));
    }

    public function show($shortUrl)
    {
        $originalUrl = Link::getOriginalUrl($shortUrl);


        if (!$originalUrl) {
            abort(404);
        }

        return redirect($originalUrl);
    }
}
