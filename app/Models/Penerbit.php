<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penerbit extends Model
{
    // menambahkan data ke dalam tabel penerbit
    protected $guarded = [];

    // relationship eloquent (ORM Laravel)
    public function bukus(): HasMany {
        // HasMany = banyak buku
        return $this->hasMany(Buku::class);
    }
}
