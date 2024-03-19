<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
    use HasFactory;
    protected $table = 'proposals';
    protected $fillable = ['lead_id ','valid_till','total','sub_total'];

    public function leads()
    {
        return $this->belongsTo(leads::class, 'lead_id', 'id');
    }
}
