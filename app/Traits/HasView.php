<?php

namespace App\Traits;

use App\Models\View;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasView
{
    public function views(): MorphMany
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function addView()
    {
        $this->views()->updateOrCreate([
            'user_id' => auth()->id(),
        ]);
    }
}
