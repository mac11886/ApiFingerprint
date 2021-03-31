<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model{

    use HasFactory;
    protected $fillable = ['branch_id','name','fingerprint_id'];

    public function branch(){
       return $this->hasOne(Branch::class, "id", "branch_id");
    }
    public function fingerprint(){
       return $this->hasOne(Fingerprint::class,"id","fingerprint_id");
    }
    public $timestamps = false ;
}
