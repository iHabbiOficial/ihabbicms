<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class BattleTotal extends Model
{
    use HasFactory;

    protected $table = 'battle_total';

    protected $guarded = [];

    public $timestamps = false;
}