<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function products(): HasMany {
        return $this->hasMany(products::class);
    }
}
