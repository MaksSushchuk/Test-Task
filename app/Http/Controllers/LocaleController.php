<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function changeLocale($locale)
    {
        
        Session::put('locale', $locale);

        return back();
    }
}
