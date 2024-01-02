<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Memeber extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','gender','is_Active','photo','section_name_id'];


    protected $table = 'members';
    protected $foreignKey = 'section_name_id';


    public function sectionname(): BelongsTo {
        
        return $this->belongsTo(SectionName::class,'section_name_id','id');

    }

}
