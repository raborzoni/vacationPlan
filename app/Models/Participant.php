<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'holiday_plan_id' // Relacionamento com o plano de férias
    ];

    public function holidayPlan()
    {
        return $this->belongsTo(HolidayPlan::class);
    }
}
