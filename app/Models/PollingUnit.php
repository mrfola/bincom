<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;#
use App\Models\Ward;
use App\Models\PollingResult;
use App\Models\LocalGovernment;

class PollingUnit extends Model
{
    use HasFactory;
    
    protected $table = 'polling_unit';
    protected $primaryKey = 'uniqueid';
    public $timestamps = false; //removes created_at and updated_at default timestamps

    public function Ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function pollingResults()
    {
        return $this->hasMany(PollingResult::class);
    }

    // public function getLocalGovernment()
    // {
    //     $ward = $this->ward()->first();
    //     $lga_id = $ward->lga_id;
    //     if($lga_id)
    //     {
    //         return $lga_id;
    //     }else
    //     {
    //         return "None";
    //     }
    //     return $lga_id;
    //     $localGovernment = LocalGovernment::where('lga_id', $lga_id)->get();//('lga_name')->lga_name;
    //     return $localGovernment;
    // }
}
