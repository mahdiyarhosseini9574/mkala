<?php
//
//namespace Tests\Unit;
//
//use App\Models\BlogRepository;
//use App\Models\Like;
//use App\Models\Order;
//use App\Models\Product;
//use App\Models\User;
//use DB;
//use JetBrains\PhpStorm\NoReturn;
//use Tests\TestCase;
//
//class ExampleTest extends TestCase
//{
//    /**
//     * A basic test example.
//     */
//    public function test_that_true_is_true(): void
//    {
//        $blog = Like::find(8);
////        dd($blog->title);
//
////        dd($product->load('Likes')->toArray());
//        $blog = Product::find(2);
//        dd($blog->like(5)->toArray());
//        $blog = BlogRepository::find(1);
//        dd($blog->like(6)->toArray());
//
////        dd($blog->getTitleAttribute()->toArray());
//
////        dd('jhmn');
//        $response->assertStatus(200);
//    }
//
//    #[NoReturn] public function test_user_most_count_products()
//    {
//        $user = User::find(2);
//
//        $query = Product::query()
//            ->select('id as product_id', 'user_id as seller_id')
//            ->whereHas('orderItems', function ($q) use ($user) {
//                $q->whereHas('order', function ($qq) use ($user) {
//                    $qq->where('user_id', $user->id);
//                });
//            })
//            ->withCount([
//                'orderItems' => function ($query) {
//                    $query->select(DB::raw('SUM(quantity)'));
//                }
//            ])
//            ->orderByDesc('order_items_count')
//            ->limit(4)
//            ->get();
//
//        dd($query->toArray());
//    }
//
//    public function test_that_true_is(): void
//    {
//
//        $user = User::find(1);
//        Order::query()->where('user_id', $user->id)->items()->
//
//        $query = Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) use ($user) {
//                    $query->whereHas('order', function ($query) use ($user) {
//                        $query->where('user_id', $user->id);
//                    })
//                        ->select(DB::raw("SUM(qty) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum', 'desc')
//            ->limit(10)
//            ->get();
//
//        $response->assertStatus(200);
//
//    }
//
//
//    public function  test_user_most_count_products($query): void
//    {
//        dd('sfs');
//        $user = User::find(1);
//        Order::query()->where('user_id', $user->id)->items()->
//
//        $query = Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) use ($user) {
//                    $query->whereHas('order', function ($query) use ($user) {
//                        $query->where('user_id', $user->id);
//                    })
//                        ->select(DB::raw("SUM(qty) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum', 'desc')
//            ->limit(10)
//            ->get();
//
//        $response->assertStatus(200);
//
//    }
//}
