<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class StateResult extends Model
{
    use HasFactory;
    protected $table = 'announced_state_results';
    protected $primaryKey = 'result_id';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_name');
    }
}
