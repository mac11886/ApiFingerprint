<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;


    protected $fillable = ['id','user_id','company_id','status','late','timestamp'];

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
    public function branch(){
        return $this->hasOne(Branch::class,"id","branch_id");
    }


    public $timestamps = false ;
}
