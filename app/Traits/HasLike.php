<?php

namespace App\Traits;

use App\Models\Like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLike
{
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like()
    {
        $model = $this->likes()
            ->where('user_id', auth()->id())
            ->first();
        if ($model) {
            $model->delete();
        } else {
            $this->likes()->create([
                'user_id' => auth()->id()
            ]);

        }

    }
}
