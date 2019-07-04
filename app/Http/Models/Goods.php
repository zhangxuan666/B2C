<?php

namespace  App\Http\Models;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


Class Goods extends Model
{
    public  function brand_list()
    {
        $list=Db::table('brand')->get();
        return $list;
    }

    public function brand_add($data)
    {   
        $arr=[
            'brand_name'=>$data['brand_name'],
            'brand_desc'=>$data['brand_desc'],
            'brand_sort'=>$data['brand_sort'],
            'is_show'=>$data['is_show']
        ];
        $res=Db::table('brand')->insert($arr);
        return $res;
    }

    public function branddel($id)
    {
        $res=Db::table('brand')->where('id',$id)->delete();
        return $res;
    }

    public function typeDel($id)
    {
        $res=Db::table('type')->where('id',$id)->delete();
        return $res;
    } 

    public function findType($id)
    {
        return $demo=Db::table('type')->where('parent_id',$id)->first();
    }

    public function selectType()
    {
        return $list=Db::table('type')->get();
    }

    public function type_Add_do($data)
    {
        $arr=[
            'type_name'=>$data['type_name'],
            'is_show'=>$data['is_show'],
            'parent_id'=>$data['parent_id']
        ];
        return $res=Db::table('type')->insert($arr);
    }

    public function add_typeattr($data)
    {   
        $arr=[
            'type_name'=>$data['type_name'],
            'type_color'=>$data['type_color'],
            'type_size'=>$data['type_size']
        ];

        return $res=Db::table('type_attribute')->insert($arr);
    }

    public function type_Attribute()
    {
        return $data=Db::table('type_attribute')->get();
    }

    public function select_Good()
    {
        return $good=Db::table('goods')->get();

    }

    public function sku_do($data)
    {
        $arr=[
            'goods_type'=>$data['goods_type'],
            'goods_name'=>$data['goods_name'],
            'sku_color'=>json_encode($data['sku_color']),
            'sku_size'=>json_encode($data['sku_size'])
        ];
        // var_dump($arr);
        return $res=Db::table('sku')->insert($arr);
    }

    public function getAll()
    {
        return DB::table('goods')->join('type','goods.type_id','=','type.id')
                                 ->join('warehouse','goods.attr_id','=','warehouse.id')
                                 ->join('brand','goods.brands_id','=','brand.id')
                                 ->select('goods.*','type.type_name', 'warehouse.name', 'brand.brand_name')
                                 ->paginate(6);
    }

    public function delDate($id)
    {
        return DB::table('goods')->where('id',$id)->delete();
    }
    
}