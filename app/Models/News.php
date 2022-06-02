<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'active' => 'boolean',
        'approved' => 'boolean',
        'breaking' => 'boolean',
    ];

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeApproved($query)
    {
        $query->where('approved', 1);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeBreaking($query)
    {
        $query->where('breaking', 1);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeInTimeFrame($query)
    {
        return $query->where(function ($query) {
            $query->where(function ($query) {
                $query->whereNull('starts_at')
                    ->whereNull('ends_at');
            })->orWhere(function ($query) {
                $query->whereNotNull('starts_at')
                    ->whereNotNull('ends_at')
                    ->where('starts_at', '<=', now())
                    ->where('ends_at', '>=', now());
            })->orWhere(function ($query) {
                $query->whereNotNull('starts_at')
                    ->whereNull('ends_at')
                    ->where('starts_at', '<=', now());
            })->orWhere(function ($query) {
                $query->whereNull('starts_at')
                    ->whereNotNull('ends_at')
                    ->where('ends_at', '>=', now());
            });
        });
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
