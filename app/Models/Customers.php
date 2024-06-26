<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customerServices(){

        return $this->hasMany(CustomerServices::class, 'customers_id', 'id');
    }
}
