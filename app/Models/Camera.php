<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\{
    Model,
    Builder,
    Casts\Attribute,
    Relations\BelongsTo,
    Factories\HasFactory,
    Relations\HasMany
};

class Camera extends Model
{
    use HasFactory;

    protected $table = 'camera_web';

    public $timestamps = false;

    public static function latestWith(bool $includesRoom = false): Builder
    {
        $query = Camera::query()->latest('id');

        $includes = [
            'user:id,look,username',
            'likes' => fn ($query) => $query->whereLiked(true)
        ];

        if ($includesRoom) {
            array_push($includes, 'room:id,name');
        }

        return $query->with($includes);
    }

    public function scopeFilter(Builder $query, $filter): void
    {
        $user = \Auth::user();

        if($filter == 'only_my_friends') {
            $friendsId = $user->friends()->pluck('id')->toArray();

            $query->whereIn('user_id', $friendsId);
        }

        if($filter == 'liked_by_me') {
            $likedPhotoIds = $user->photoLikes()->pluck('camera_id')->toArray();

            $query->whereIn('id', $likedPhotoIds);
        }
    }

    public function scopePeriod(Builder $query, $period): void
    {
        if($period == 'today') {
            $query->where('timestamp', '>=', Carbon::today()->timestamp);
        }

        if($period == 'last_week') {
            $query->whereBetween('timestamp', [now()->subWeek()->timestamp, now()->timestamp]);
        }

        if($period == 'last_month') {
            $query->whereBetween('timestamp', [now()->subMonth()->timestamp, now()->timestamp]);
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(CameraLike::class);
    }

    public function formattedDate(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::parse($this->timestamp)->format('Y-m-d H:i')
        );
    }
}
