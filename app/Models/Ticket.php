<?php

namespace App\Models;

use App\Observers\TicketObserver;
use App\Observers\UserTicketObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'platform_id', 'department_id', 'user_id', 'service_id', 'note', 'created_by'];

    public static function boot()
    {
        parent::boot();
        Ticket::observe(TicketObserver::class);
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function ticketmessages(): HasMany
    {
        return $this->hasMany(TicketMessage::class);
    }
}
