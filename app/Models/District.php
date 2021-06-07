<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
