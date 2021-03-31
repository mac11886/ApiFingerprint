<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ["company_id", "name"];

    public $timestamps = false;

    public function company(){
        return $this->hasOne(Company::class, "id", "company_id");
    }
}
