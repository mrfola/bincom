<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StateResult;

class State extends Model
{
    use HasFactory;
    
    protected $table = "states";
    protected $primaryKey = 'state_id';
    public $timestamps = false; //removes created_at and updated_at default timestamps

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function stateResults()
    {
        return $this->hasMany(StateResult::class);
    }
}
