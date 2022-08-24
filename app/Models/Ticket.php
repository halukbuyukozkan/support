<?php

namespace App\Models;

use App\Models\Status;
use App\Observers\TicketObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'platform_id', 'department_id', 'user_id', 'service_id', 'note', 'created_by', 'status_id'];

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

    public function messages(): HasMany
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeActiveTicket($query)
    {
        $closedStatus = Status::closedstatus()->get()->first();
        return $query->where('status_id', '!=', $closedStatus->id);
    }
}
