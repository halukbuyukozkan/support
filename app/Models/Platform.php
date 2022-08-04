<?php

namespace App\Models;

use App\Observers\PlatformObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'domain', 'api_token'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
