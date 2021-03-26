<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','department_id','name'];

    public function department(){
        return $this->hasOne(Department::class,"id","department_id");
    }

    public $timestamps = false ;
}
