<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailDevis extends Model
{
    use HasFactory;
    protected $fillable=[''];
    public function devis(): BelongsTo
    {
        return $this->belongsTo(Devis::class);
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
