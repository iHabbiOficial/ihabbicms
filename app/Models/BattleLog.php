<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory,
    Relations\BelongsTo
};

class BattleLog extends Model
{
    use HasFactory;

    protected $table = 'battle_logs';

    protected $guarded = [];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function battlePass(): BelongsTo
    {
        return $this->belongsTo(BattlePass::class, 'battle_id', 'id');
    }
}