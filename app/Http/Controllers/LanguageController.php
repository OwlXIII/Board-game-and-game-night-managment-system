<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        session()->put('locale', $lang);

        logger('Language switched to: ' . $lang);

        return redirect()->back();
    }
}
