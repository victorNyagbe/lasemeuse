<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ActualiteController extends Controller
{
    public function index(): View
    {
        $page = "actualites";
        return view("pages.auth.actualites.index", compact('page'));
    }
}
