<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd(CommentResource::collection($this->resource->comments));
        return [
            'id'=>$this->id,
            'title' => $this->title,
            'description' => $this->description,
            'meta_description' => $this->meta_description,
            'category' => CategoryResource::make($this->category),
            'user' => UserResource::make($this->user),
            'media'=>$this->whenLoaded('images',fn()=>ImageResource::collection($this->images)),
            'view' => $this->whenLoaded('views', fn() => ViewResource::collection($this->views)),
            'comment' => $this->whenLoaded('comments', fn() => CommentResource::collection($this->resource->comments)),
            'like' => $this->whenLoaded('likes', fn() => LikeResource::collection($this->likes)),
            'image' => $this->whenLoaded('medias', fn() => ImageResource::collection($this->images)),
        ];
    }
}
