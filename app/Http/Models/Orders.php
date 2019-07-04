<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Orders extends Model
{

	//订单表
	public function orders()
	{
		return DB::table('orders')->paginate(3);
	}


	public function ordersId($id)
	{
		return DB::table('orders')->where('id',$id)->first();
	}


	public function cart($id)
	{
		$orders_user_id=DB::table('orders')->where('id',$id)->value('orders_user_id');
		// var_dump($orders_user_id);die;

		$cart = DB::table('orders')
					->where('orders_user_id', $orders_user_id)
					->join('cart', 'orders.orders_user_id', '=', 'cart.cart_user_id')
					->get();

		return $cart;
	}


	public function del($id)
	{
		return DB::table('orders')->where('id', $id)->delete();
	}


	public function update_orders($id)
	{
		return DB::table('orders')->where('orders_user_id', $id)->first();
	}


	public function update_cart($id)
	{
		return DB::table('cart')->where('cart_user_id', $id)->get();
	}

	public function update_type($id)
	{
		$cart_goods_class = DB::table('cart')->where('cart_user_id', $id)->value('cart_goods_class');
		return DB::table('type_attribute')->where('type_name', $cart_goods_class)->get();
	}

	public function update_do($data)
	{
		$id = $data['id'];

		unset($data['cart_goods_size']);
		unset($data['cart_goods_color']);
		unset($data['cart_goods_sum']);
		unset($data['id']);
		

		return DB::table('orders')->where('orders_user_id', $id)->update($data);

	}

	public function update_doc($data)
	{
		$id = $data['id'];

		unset($data['orders_user_address']);
		unset($data['orders_user_phone']);
		unset($data['orders_status']);
		unset($data['id']);

		return DB::table('cart')->where('cart_user_id', $id)->update($data);
	}

	public function list(){
    	return DB::table('orders_static')->get();
    }

    public function status_del($id)
    {
    	return DB::table('orders_static')->where('id', $id)->delete();
	}
	
	public function add_do($data)
    {
    	return DB::table('orders_static')->insert($data);
    }

}

?>