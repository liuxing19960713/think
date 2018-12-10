<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
class Blog extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $cont = DB::table("content")->select();
        return $this->fetch("Blog/index",['list'=>$cont]);

    }
    //获取
    public function getrid()
    {
        # code...
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        // echo $id;
        //查询所有re_content表与con_id相同的信息
        $list = DB::table("re_content")->where("con_id",$id)->select();
        // var_dump($list);
        // 分配数据
        return $this->fetch("Blog/read",['list'=>$list]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
