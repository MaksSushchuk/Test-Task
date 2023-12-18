<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','name','surname','email','number'];

    protected $casts = [
        'company_id' => 'integer',
        'name' => 'string',
        'surname' => 'string',
        'email' => 'string',
        'number' => 'string',

    ];

    public function company(){
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
