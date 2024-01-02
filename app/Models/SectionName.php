<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SectionName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'polling_station_id'];

    public function members(): HasMany{

        return $this->hasMany(Memeber::class, 'section_name_id', 'id');

    }

    public function pollingstation(): BelongsTo {

        Return $this->belongsTo(PollingStation::class, 'polling_station_id', 'id');

    }
}
