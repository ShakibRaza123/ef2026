<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function show($page)
    {
        if (view()->exists($page)) {
            return view($page);
        }

        abort(404);
    }
}
