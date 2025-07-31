<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $table = 'kritik_saran';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
