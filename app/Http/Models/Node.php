<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2019/6/13
 * Time: 11:39
 */
namespace App\Http\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Node extends  Model
{
    protected $table = "node";
    public function selectNode()
    {
        $data = Node::get();
        return $data;
    }

    public function selectAll()
    {
        $data = Node::where("pid",0)->get();
        return $data;
    }

    public function addNode($data)
    {
        $res = Node::insert($data);
        return $res;
    }

    public function selectNodeName($nodeids)
    {
        $data = Node::whereIn("node_id",$nodeids)->get();
        return $data;
    }
}