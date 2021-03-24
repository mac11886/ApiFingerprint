<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id','first_fingerprint','second_fingerprint'];

    public $timestamps = false ;
}
