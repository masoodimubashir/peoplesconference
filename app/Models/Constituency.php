<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Constituency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'district_id'];


    public function district(): BelongsTo
    {

        return $this->belongsTo(District::class);

    }

    public function pollingstations(): HasMany
    {

        return $this->hasMany(PollingStation::class);

    }

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Str::title($value),
            set: fn(string $value) => Str::title($value),
        );
    }



}
