<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'value', 'expires_at'];

    public function isValid()
    {
        return is_null($this->expires_at) || now()->lessThan($this->expires_at);
    }

    public function calculateDiscount($total)
    {
        return $this->type === 'percent'
            ? ($total * ($this->value / 100))
            : $this->value;
    }
}
