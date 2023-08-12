<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Devis extends Model
{
    use HasFactory;
    protected $fillable=[''];
    public function factures():HasMany
    {
        return $this->hasMany(Facture::class);
    }
    public function detail_devis():HasMany
    {
        return $this->hasMany(DetailDevis::class);
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
