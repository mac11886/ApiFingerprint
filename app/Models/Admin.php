<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','company_id','name','username','password'];


    //link company_id => name 
    public function company(){
        return $this->hasOne(Company::class,"id","company_id");
    }
    public $timestamps = false ;
}
