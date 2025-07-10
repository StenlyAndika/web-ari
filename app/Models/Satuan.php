<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    public static function getall()
    {
        return [
            'batang',
            'botol',
            'box',
            'butir',
            'dus',
            'karton',
            'kg',
            'lembar',
            'liter',
            'pak',
            'pcs',
            'roll',
            'sachet',
            'set',
        ];
    }
}
