<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

use Illuminate\Database\Eloquent\Relations\{
    HasMany
};

class BattlePass extends Model
{
    use HasFactory;

    protected $table = 'battle_pass';

    protected $guarded = [];

    public $timestamps = false;

    public function battleLogs(): HasMany
    {
        return $this->hasMany(BattleLog::class, 'battle_id', 'id');
    }
}