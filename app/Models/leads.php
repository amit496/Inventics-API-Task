<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leads extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = ['companycompany_name', 'website','client_name','salutation'];

    public function proposals()
    {
        return $this->hasMany(Proposals::class, 'lead_id', 'id');
    }
}
