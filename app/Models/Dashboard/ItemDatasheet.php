<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDatasheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'file'
    ];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
