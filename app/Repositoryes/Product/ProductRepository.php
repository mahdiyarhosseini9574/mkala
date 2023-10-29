<?php

namespace App\Repositoryes\Product;

use App\Models\Product;
use App\Repositoryes\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function toggle(Model $model): Model
    {
        $model->published = !$model->published;
        $model->save();
        return $model;
    }

    public function highPriceProduct()
    {
        $product = Product::orderBy('price', 'desc')->take(3)->get();

        return $product;
    }

    public function mostView()
    {
        $mostviews = Product::with(['views'])->withCount('views')
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();
        return $mostviews;
    }

    public function mostCommented()
    {
        $mostcomment = Product::withCount('comments')->orderBy('comments_count', 'desc')
            ->take(5)->get();
        return $mostcomment;
    }
}
