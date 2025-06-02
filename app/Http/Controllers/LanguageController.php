<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switches interface language (locale)
     *
     * @param $lang
     * @return RedirectResponse
     */
    public function switchLang($lang): RedirectResponse
    {
        abort_if(!in_array($lang, ['en', 'lt']), 400);

        logger('(controller) before ' . app()->getLocale());

        session()->put('locale', $lang);

        dump(Session::get('locale'));

        logger('(controller) before ' . app()->getLocale());

        logger('Language switched to: ' . $lang);

        return redirect()->back();
    }
}
