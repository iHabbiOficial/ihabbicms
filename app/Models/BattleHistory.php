<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory,
    Relations\BelongsTo
};

class BattleHistory extends Model
{
    use HasFactory;

    protected $table = 'battle_history';

    protected $guarded = [];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}