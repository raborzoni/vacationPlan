<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'description', 
        'date', 
        'location', 
        'participants'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'participants' => 'array',
        'date' => 'date',
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    protected static function booted()
{
    static::addGlobalScope('participants', function ($query) {
        $query->with('participants');
    });
}
}
