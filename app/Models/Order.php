<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['agent_id','product_id','price'];
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
