<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovernmentResult extends Model
{
    use HasFactory;

    protected $table = 'announced_lga_results';
    protected $primaryKey = 'result_id';
    public $timestamps = false; //removes created_at and updated_at default timestamps

    public function localGovernment()
    {
        return $this->belongsTo(LocalGovernment::class, 'lga_name');
    }
}
