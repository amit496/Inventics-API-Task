<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposelItem extends Model
{
    use HasFactory;
    protected $table = 'proposal_items';
    protected $fillable = ['proposal_id', 'item_name', 'type', 'quantity', 'unit_price', 'amount', 'item_summary', 'taxes', 'hsn_sac_code', 'unit_id', 'product_id'];
}
