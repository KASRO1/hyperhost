<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;


    static public function GetSeo($url)
    {
        $seo = SEO::where('page_url', $url)->first();
        return $seo;
    }
}
