<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'value',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    public function polls(): BelongsToMany
    {
        return $this->belongsToMany(Poll::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function public(): bool
    {
        return $this->user_id === null;
    }

    public function scopePublic(Builder $query): void
    {
        $query->where(['user_id' => null]);
    }

    public function scopeAccessible(Builder $query): void
    {
        $query->where(['user_id' => null])->orWhere(['user_id' => auth()->id()]);
    }
}
