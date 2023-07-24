<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmulatorSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $primaryKey = 'key';

    public $incrementing = false;
}
