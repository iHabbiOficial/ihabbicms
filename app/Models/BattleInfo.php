<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class BattleInfo extends Model
{
    use HasFactory;

    protected $table = 'battle_infos';

    protected $guarded = [];

    public $timestamps = false;
}