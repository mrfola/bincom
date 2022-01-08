<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ward;
use App\Models\State;
use App\Models\LocalGovernmentResult;

class LocalGovernment extends Model
{
    use HasFactory;

    protected $table = "lga";
    protected $primaryKey = 'uniqueid';

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function localGovernmentResults()
    {
        return $this->hasMany(LocalGovernmentResult::class);
    }
}
