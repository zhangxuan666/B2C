<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Warehouse extends Model
{
	public function show()
	{
		return DB::table('warehouse')->get();
	}

	public function city()
	{
		return DB::table('city')->get();
	}

	public function add($data)
	{
		$data['zip'] = rand(111111,999999);
		return DB::table('warehouse')->insert($data);
	}

	public function del($id)
	{
		return DB::table('warehouse')->where('id', $id)->delete();
	}

	public function update_list($id)
	{
		return DB::table('warehouse')->where('id', $id)->first();
	}

	public function update_do($data)
	{
		$id=$data['id'];
		unset($data['id']);
		return DB::table('warehouse')->where('id', $id)->update($data);
	}


}

?>