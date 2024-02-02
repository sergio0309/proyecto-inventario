<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slog',
        'description',
        'image',
        'price',
        'stock',
        'status',
        'category_id'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(categories::class);
    }
}
