<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['id','company_id','name','fingerprint_id','department_id','job_id','image_path'];

    public function company(){
       return $this->hasOne(Company::class,"id","company_id");
    }
    public function department(){
       return $this->hasOne(Department::class,"id","department_id");
    }
    public function job(){
        return    $this->hasOne(Job::class,"id","job_id");
    }
    public function fingerprint(){
       return $this->hasOne(Fingerprint::class,"id","fingerprint_id");
    }
    public $timestamps = false ;
}
