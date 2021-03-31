<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','company_id', 'branch_id', 'role', 'name','username','password'];


    //link company_id => name 
    public function company(){
        return $this->hasOne(Company::class,"id","company_id");
    }
    public function branch(){
        return $this->hasOne(Branch::class,"id","branch_id");
    }
    public $timestamps = false ;
}
