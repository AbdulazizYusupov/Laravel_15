<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['agent_id','product_id','price'];
    public function agent()
    {
        return $this->belongsToMany(Agent::class, 'orders', 'agent_id');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'orders', 'product_id');
    }
}
