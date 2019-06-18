<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class MenuModel extends Model
{
    public function getAll()
    {
        return DB::table('menu')->where('pid',0)->paginate(5);
    }

    public function getTree()
    {
         return DB::table('menu')->where('is_show',0)->get();
    }

    public function fl($data,$pid=0,$le=0)
    {
        static $array=array();

        foreach ($data as $v) {
            
            if($v->pid==$pid)
            {
                $v->le=$le;

                $array[]=$v;

                self::fl($data,$v->id,$le+1);
            }
        }

        return $array;
    }

    public function getDel($id)
    {
        $data=DB::table('menu')->where('pid',$id)->get();
//return $data->first();
        if($data->count()==0)
        {
            return DB::table('menu')->where('id',$id)->delete();
        }

    }

    public function getSubmenuAll($id)
    {
        return DB::table('menu')->where('pid',$id)->paginate(5);
    }

    public function getUpdate($id)
    {
         $data=DB::table('menu')->where('pid',$id)->get();

          if($data->count()==0)
        {
            return $id;
        }
    }

    public function getUpdateAll($id)
    {
        return DB::table('menu')->where('id',$id)->first();
    }

    public function doUpdate($data)
    {
       array_shift($data);

       return DB::table('menu')->where('id',$data['id'])->update($data);
    }

    public function addData($data)
    {
        array_shift($data);

        return DB::table('menu')->insert($data);
    }
}
?>