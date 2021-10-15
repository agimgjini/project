<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_info extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'customer_info';

    protected $fillable = [
        'customer_id','communication_date','communication_type','communication_scope','projected_price','invoiced'
    ];


    public function info(){
        return $this-> belongsTo('App/Models/Customers' ,'customer_id');
    }

}
