<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperSpecialization
 */
class Specialization extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['uniqid', 'name', 'description', 'is_visible', 'page_id', 'created_by', 'image'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function capabilities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Capability::class);
    }

    public function npcs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Npc::class);
    }

    public function page(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
