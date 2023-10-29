<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'user' => UserResource::make($this->user),
            'category' => CategoryResource::make($this->category),
            'brand' => BrandResource::make($this->brand),
            'view' => $this->whenLoaded('views', fn() => ViewResource::collection($this->views)),
            'comment' => $this->whenLoaded('comments', fn() => CommentResource::collection($this->comments)),
            'like' => $this->whenLoaded('likes', fn() => LikeResource::collection($this->likes)),
            'image' => $this->whenLoaded('medias', fn() => ImageResource::collection($this->images)),


        ];
    }
}
