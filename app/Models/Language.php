<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        'id',
        'icon_path',
        'name',
        'active',
        'default',
    ];

    public static function routePrefix(){
        $prefix = request()->segment(1);

        $activeLanguage = Language::where('active', true)->where("id", $prefix)->first();
        if($activeLanguage == null){
            $prefix = null;
        }


        return $prefix;
    }

    public static function findDefault()
    {
        return Language::where('default', true)->where("active", true)->first();
    }
}
