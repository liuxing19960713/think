<?php
/**
 * 项目成就模块
 */
namespace app\Admin\controller;

use think\Controller;
use think\Request;
use think\Db;
class Project extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $info = DB::table("project")->select();
        // var_dump($info);
        return $this->fetch("Project/index",['info'=>$info]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch("Project/create");
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
        $file = request()->file('pj_pic');
        // var_dump($file);
        $info = $file->move( './static/uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            // echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $data['pj_pic'] =  $info->getSaveName();
            if (DB::table("project")->insert($data)) {
                return $this->success('添加ok',"/project");
            }else{
                return $this->error("error","/project/create");
            }
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            // echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
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
