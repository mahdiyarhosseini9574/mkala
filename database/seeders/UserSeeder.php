<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meta;
use Database\Factories\MetaFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->create()
            ->each(callback: function ($user) {
                Blog::factory(1)
                    ->create([
                        'user_id' => $user->id,
                    ])
                    ->each(function (Blog $blog) use ($user) {
                        Image::factory(1)
                            ->create([
                                'imageable_id' => $blog->id,
                                'imageable_type' => Blog::class,

                            ]);
                        Meta::factory(10)->create([
                            'owner_id'=>$blog->id,
                            'owner_type'=>Blog::class,
                        ]);


                        Like::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'likeable_id' => $blog->id,
                                'likeable_type' => Blog::class,
                            ]);


                        View::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'viewable_id' => $blog->id,
                                'viewable_type' => Blog::class,
                            ]);


                        Comment::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'commentable_id' => $blog->id,
                                'commentable_type' => Blog::class,
                            ])
                            ->each(function (Comment $comment) use ($user) {
                                Like::factory(1)
                                    ->create([
                                        'user_id' => $user->id,
                                        'likeable_id' => $comment->id,
                                        'likeable_type' => Comment::class,
                                    ]);
                            });
                    });


                Product::factory(1)
                    ->create([
                        'user_id' => $user->id,
                    ])
                    ->each(function (Product $product) use ($user) {
                        Image::factory(1)
                            ->create([
                                'imageable_id' => $product->id,
                                'imageable_type' => Product::class,
                            ]);


                        Like::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'likeable_id' => $product->id,
                                'likeable_type' => Product::class,
                            ]);


                        View::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'viewable_id' => $product->id,
                                'viewable_type' => Product::class,
                            ]);


                        Comment::factory(1)
                            ->create([
                                'user_id' => $user->id,
                                'commentable_id' => $product->id,
                                'commentable_type' => Product::class,
                            ])
                            ->each(function (Comment $comment) use ($user) {
                                Like::factory(1)
                                    ->create([
                                        'user_id' => $user->id,
                                        'likeable_id' => $comment->id,
                                        'likeable_type' => Comment::class,
                                    ]);
                            });
                    });

            });
    }
}
