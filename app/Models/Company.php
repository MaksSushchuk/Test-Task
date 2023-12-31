<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','email','logo','website'];
    
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'website' => 'string',
    ];

    public function employees(){
        return $this->HasMany(Employee::class);
    }
}
