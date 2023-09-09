<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'slug', 'thumb', 'status', 'type_id'];

    public function thumb(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? asset('storage/' . $value) : asset('storage/default.jpg')
        );
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
