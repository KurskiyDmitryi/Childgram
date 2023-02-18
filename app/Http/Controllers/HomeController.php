<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $count = \Spatie\MediaLibrary\MediaCollections\Models\Media::whereDate('created_at', now()->toDateString())->count();
        if (Auth::check()) {
            return view('home',['count'=>$count]);
        }

        return redirect()->route('login');
    }
}
