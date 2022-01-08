<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ward;

class WardResult extends Model
{
    use HasFactory;

    protected $table = 'announced_ward_results';
    protected $primaryKey = 'result_id';
    public $timestamps = false; //removes created_at and updated_at default timestamps

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_name');
    }
}
