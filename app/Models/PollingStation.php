<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PollingStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'SNO',
        'locality',
        'building_location',
        'polling_area',
        'total_votes',
        'constituency_id'
    ];

    public function constituency(): BelongsTo
    {

        return $this->belongsTo(Constituency::class);

    }

    public function members(): HasMany
    {

        return $this->hasMany(Memeber::class);

    }
    public function sectionnames(): HasMany
    {

        return $this->hasMany(SectionName::class);

    }
}
