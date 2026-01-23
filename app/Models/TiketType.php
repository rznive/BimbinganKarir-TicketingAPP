<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tiket;

class TiketType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'ticket_type_id');
    }
}
