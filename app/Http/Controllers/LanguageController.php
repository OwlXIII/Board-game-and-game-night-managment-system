<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($lang): RedirectResponse
    {
        if (!in_array($lang, ['en', 'lt'])) {
            abort(400);
        }

        //app()->setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
