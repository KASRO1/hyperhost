<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\Request;

class LanguageController extends Controller
{
    public function setLanguage($lang)
    {
        $lang = Language::where("id", $lang)->first();
        if(!$lang){
            return back();
        }

        $cookie = cookie()->forever('language', $lang->id);
        app()->setLocale($lang->id);

        return back()->withCookie($cookie);

    }


}
