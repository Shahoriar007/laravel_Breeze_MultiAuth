<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCasefine extends Model
{
    use HasFactory;

    protected $fillable = [

        'userId',
        'caseCode',
        'caseId' ,
        'fineAmmount' ,
        'casePhoto' ,
        'paidWith' ,
        'trId' ,
    ];
}
