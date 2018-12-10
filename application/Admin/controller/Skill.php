<?php
//技能模块
namespace app\Admin\controller;

use think\Controller;
use think\Request;
//引入DB类
use think\Db;
class Skill extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        
        $info = DB::table("skill")->select();
        return $this->fetch("Skill/index",['info'=>$info]);       
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch("Skill/add");
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
        $data = $request->param();
        // var_dump($data);


        $info = DB::table("skill")->insert($data);
        if ($info) {
            $this->success("添加ok","/skill");
        }else{
            $this->error("添加失败","skill/create");
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        // echo $id;
        $info = DB::table("skill")->where("id",$id)->find();
        return $this->fetch("Skill/read",['info'=>$info ]);
        var_dump($info);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {

        $info = DB::table("skill")->where("id",$id)->find();
        return $this->fetch("Skill/edit",['info'=>$info]);
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
        
        //去除请求方式和id
        $data = $request->except(['_method','id']);
        $info = DB::table("skill")->where("id",$id)->update($data);
        if ($info) {
            return $this->success("更新ok","/skill");
        }else{
            return $this->error("更新error","/skill/$id/edit");
        }
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
        // echo $id;
        $del = DB::table("skill")->where("id",$id)->delete();
        if ($del) {
            return $this->success("删除OK","/skill");
        }else{
            return $this->error("删除error","/skill");
        }
        // var_dump($del);
    }
}
