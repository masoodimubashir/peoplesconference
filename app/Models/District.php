<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Str;

class District extends Model
{

    use HasFactory;

    protected $fillable = ['name'];

   

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Str::title($value),
        );
    }

    public function constituencies() : HasMany {

        return $this->hasMany(Constituency::class, 'district_id', 'id');

    }


    public function pollingStations(): HasManyThrough {

       return $this->hasManyThrough(PollingStation::class, Constituency::class);
    
    }

   
    


}
