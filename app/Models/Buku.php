<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    // menambahkan data ke dalam tabel buku
    protected $guarded = [];

    // relationship eloquent (ORM Laravel)
    public function kategori(): BelongsTo {
        // BelongsTo = hanya satu
        return $this->belongsTo(Kategori::class);
    }
    public function penerbit(): BelongsTo {
        // BelongsTo = hanya satu
        return $this->belongsTo(Penerbit::class);
    }
}
