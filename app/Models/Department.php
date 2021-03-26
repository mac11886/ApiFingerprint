<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['id','company_id','name'];

    public function company(){
        return $this->hasOne(Company::class,"id","company_id");
    }

    public $timestamps = false ;
}
