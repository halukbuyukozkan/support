<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['platform_id','name','created_by'];

    public static function boot()
    {
        parent::boot();
        Category::observe(CategoryObserver::class);
    }

    public function platform():BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
