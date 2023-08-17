<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Order;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use DB;
use Tests\TestCase;

use Carbon\Carbon;



class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {

//        Permission::create([
//            'name'=>'toRead'
//        ]);
//        dd("sdfsd");
//        global $response;
        global $response;
        $user = User::first();
//        $user->roles()->sync([1,2]);
//        $role=Role::first();
//        $role->permissions()->attach(2);
//        dd('asdas');
//dd($user->roles);
        $j = $user->hasPermission("toF");
//$per=Permission::first();
//dd($per->roles());
//        $response->assertStatus(true);}

    public function test_that_true_is(): void
    {

        //        $query = Product::withCount(['views', 'likes'])
//            ->orderBy('views_count', 'desc')
//            ->limit(7)
//            ->get();
//
//        $query = Product::withCount(['likes'])
//            ->whereDate('created_at', '<=', Carbon::now())
//            ->whereDate('created_at', '>=', Carbon::now()->subDays(7))
//            ->orderBy('likes_count', 'desc')
//            ->limit(4)
//            ->get();


//        $query = Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) {
//                    $query->select(DB::raw("SUM(qty*price) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum','desc')
//            ->limit(5)
//            ->get();
        $user = User::find(1);
//        Order::query()->where('user_id',$user->id)->items()->

//        $query=Product::query()
//            ->withCount([
//                'orderItems AS order_items_sum' => function ($query) use($user) {
//                    $query->whereHas('order',function ($query) use($user){
//                            $query->where('user_id',$user->id);
//                        })
//                        ->select(DB::raw("SUM(qty) as paidsum"));
//                }
//            ])
//            ->orderBy('order_items_sum','desc')
//            ->limit(10)
//            ->get();

//
//        $query = Product::query()
//            ->whereHas('orderItems', function ($query) use ($user) {
//                $query->whereHas('order', function ($query) use ($user) {
//                    $query->where('user_id', $user->id);
//                });
//            })
//            ->withCount(['orderItems'=>function ($query) use ($user){
//                $query->whereHas('order', function ($query) use ($user) {
//                    $query->where('user_id', $user->id);
//                });
//            }])
//            ->limit(4)
//            ->get();
//
//        dd($query->toArray());
//
//        $this->assertTrue(true);
//
//    }

    }
    }


    public function test_the_application_returns_a_successful_response(): void
    {
        $count=10;
        for ($i = 0; $i <=$count; $i++) {
            $user[] = [
                'name' => 'ali' . $i,
                'money' => rand(10, 100),
            ];
        }
            dd($user);



    }
}
