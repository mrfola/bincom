<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PollingUnit;
use App\Models\LocalGovernment;

class Ward extends Model
{
    use HasFactory;

    protected $table = "ward";
    protected $primaryKey = 'uniqueid';
    public $timestamps = false; //removes created_at and updated_at default timestamps

    public function pollingUnits()
    {
        return $this->hasMany(PollingUnit::class);
    }

    public function localGovernment()
    {
        return $this->belongsTo(LocalGovernment::class, 'lga_id');
    }

    public function wardResults()
    {
        return $this->hasMany(WardResult::class);
    }
  
}
