<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'date',
        'detail',
        'img',
        'created_by_id',
    ];

    public function getImgAttribute($value)
    {
        return Storage::url($value);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function invites()
    {
        return $this->hasMany(Invite::class);
    }
}
