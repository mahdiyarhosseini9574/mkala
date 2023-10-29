<?php

namespace App\Repositoryes\Blog;

use App\Models\Blog;
use App\Repositoryes\BaseRepository;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }


    public function toggle(Blog $blog): Blog
    {
        $blog->published = !$blog->published;
        $blog->save();
        return $blog;
    }

    public function mostView()
    {
        $mostviews = Blog::with(['views'])->withCount('views')
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();
        return $mostviews;
    }

    public function mostCommented()
    {
        $mostcomment = Blog::withCount('comments')->orderBy('comments_count', 'desc')
            ->take(5)->get();
        return $mostcomment;
    }
}
