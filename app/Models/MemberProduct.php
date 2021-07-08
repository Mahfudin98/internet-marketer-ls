<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
