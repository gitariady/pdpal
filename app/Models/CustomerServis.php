<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerServis extends Model
{
    protected $table = 'customer_servis';
    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function servisable()
    {
        return $this->morphTo();
    }
}
