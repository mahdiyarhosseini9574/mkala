<?php

namespace App\Http\Resources;

use App\Enums\UserMaritalStatusEnum;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this->resource->comments);
        return [
            'id' => $this->id,
            'user_name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'product' => $this->whenLoaded('products', fn() => ProductResource::collection($this->products)),
            'blog' => $this->whenLoaded('blogs', fn() => BlogResource::collection($this->blogs)),
            'view' => $this->whenLoaded('views', fn() => ViewResource::collection($this->views)),
            'comment' => $this->whenLoaded('comments', fn() => CommentResource::collection($this->comments)),
            'like' => $this->whenLoaded('likes', fn() => LikeResource::collection($this->likes)),
            'media' => $this->whenLoaded('images', fn() => ImageResource::collection($this->images)),
            'marital_status' => UserMaritalStatusEnum::SINGLE->value,
        ];
    }
}
