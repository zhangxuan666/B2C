<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Models\Warehouse;


class WarehouseController extends Controller
{
	public function list()
	{
		$model = new Warehouse;
		$data = $model->show();
		// var_dump($data);die;
		$city = $model->city();
		// var_dump($city);die;

		return view('warehouse.list', ['data'=>$data, 'city'=>$city]);
	}


	public function add()
	{
		$model = new Warehouse;
		$city = $model->city();

		return view('warehouse.add', ['city'=>$city]);
	}

	public function add_do(Request $request)
	{
		$data = $request->input();
		unset($data['_token']);

		$model = new Warehouse;
		$model->add($data);

		return redirect('/warehouse/list');
	}

	public function del(Request $request)
	{
		$id = $request->input('id');

		$model = new Warehouse;
		$model->del($id);

		return redirect('/warehouse/list');
	}


	public function update(Request $request)
	{
		$id = $request->input('id');
		// var_dump($id);die;

		$model = new Warehouse;
		$data = $model->update_list($id);
		$city = $model->city();

		return view('warehouse.update', ['data'=>$data, 'city'=>$city]);
	}

	public function update_do(Request $request)
	{
		$data = $request->input();
		unset($data['_token']);
		// var_dump($data);die;

		$model = new Warehouse;
		$model->update_do($data);

		return redirect('/warehouse/list');
	}

	

}

?>