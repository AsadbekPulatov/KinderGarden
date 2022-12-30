<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retsep extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'warehouse_id',
        'count',
    ];
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
