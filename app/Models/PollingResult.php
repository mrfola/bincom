<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PollingUnit;

class PollingResult extends Model
{
    use HasFactory;

    protected $table = "announced_pu_results";

    public function pollingUnit()
    {
        return $this->belongsTo(PollingUnit::class, 'polling_unit_uniqueid');
    }
}
