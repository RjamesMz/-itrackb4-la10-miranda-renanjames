<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'stock',
        'expiry_date',
        'type_id',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'stock' => 'integer',
            'expiry_date' => 'date',
        ];
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}