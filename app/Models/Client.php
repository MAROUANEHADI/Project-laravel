<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[''];
    public function devis():HasMany
    {
        return $this->hasMany(Devis::class);
    }
    public function scoop_Nb_devis()
    {
        return $this->devis()->count();
    }
}
