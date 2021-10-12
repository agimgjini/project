<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'customers';

    protected $fillable = [
        'name_surename','company','telephone','address','email'
     ];

    // public function customers(){
    //     return $this->belongsTo(Customers::class ,'customer_id');
    // }
}