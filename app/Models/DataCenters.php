<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCenters extends Model
{
    use HasFactory;


    static public function getTranslateKey($key)
    {
        return $key;
        $key = explode('.', $key);
        $key[0]= substr($key[0], 0, -1);
        return implode('.', $key);
    }
    static public function compileString($key, $id)
    {
        $key = explode('.', $key);
        $key[0]= $key[0].$id;
        $key = implode('.', $key);
        return $key;
    }
}

