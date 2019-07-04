<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Orders;


class OrdersController extends Controller
{
	
     public function orders()
     {
     	$model = new Orders;
     	$data = $model->orders();
     	// var_dump($data);die;
          $page = $data->links();

     	return view('orders.orders', ['data'=>$data, 'page'=>$page]);
     }


     public function ordersxq(Request $request)
     {
     	$id = $request->input('id');

     	$model = new Orders;
     	$orders = $model->ordersId($id);
     	$cart = $model->cart($id);
     	
     	return view('orders.ordersxq', ['orders'=>$orders, 'cart'=>$cart]);
     }



     public function deal()
     {
     	$model = new Orders;
     	$data = $model->orders();

     	return view('orders.deal', ['data'=>$data]);
     }



     public function del(Request $request)
     {
          $id = $request->input('id');

          $model = new Orders;
          $model->del($id);

          return redirect('/orders/orders');
     }


     public function update(Request $request)
     {
          $id = $request->input();

          $model = new Orders;
          $orders = $model->update_orders($id);
          $cart = $model->update_cart($id);
          $type_attr = $model->update_type($id);
          // var_dump($orders);
          // var_dump($cart);
          // var_dump($type_attr);

          return view('orders.update', ['orders'=>$orders, 'cart'=>$cart, 'type_attr'=>$type_attr]);
     }


     public function update_do(Request $request)
     {
          $data = $request->input();
          unset($data['_token']);
          // var_dump($data);die;
          
          $model = new Orders;
          $model->update_do($data);
          $model->update_doc($data);


          return redirect('/orders/orders');
     }


     public function status()
     {
          $model = new Orders;
          $data=$model->list();

          return view('orders/status', ['data'=>$data]);
     }

     public function status_del(Request $request)
     {
          $id = $request->input('id');

          $model = new Orders;
          $model->status_del($id);

          return redirect('/orders/status');
     }

     public function status_add()
     {
          return view('orders.status_add');
     }




     public function add_do(Request $request)
     {
          $data = $request->input();
          // var_dump($data);die;
          unset($data['_token']);
          // var_dump($data);die;


          $model = new Orders;
          $model->add_do($data);


          return redirect('/orders/status');
     }

}



?>