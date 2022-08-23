<?php

namespace App\Models;

use App\Observers\PlatformObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'domain', 'api_token', 'status_id'];

    public static function boot()
    {
        parent::boot();
        Platform::observe(PlatformObserver::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(Status::class);
    }
}
