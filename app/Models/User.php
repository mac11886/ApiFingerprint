<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['id','company_id','name','fingerprint_id','department_id','job_id','image_path'];

    public $timestamps = false ;
}
