<?php

class appealAction extends Action{
	
	public function index(){

		$this->assign('action','appeal');
		$this->display();
	}

	public function doAppeal(){
		$name=$this->_post('name');

        $back="&nbsp;&nbsp;<a href='javascript:history.back()'>返回</a>";
        $home="&nbsp;&nbsp;<a href='/'>首页</a>";

        if(preg_match("/\d{12}/",$name)){
            $List=M('list');
            $data=$List->where("name='$name'")->select();

            $sid=intval($data[0]['id']);

            $msg='';
            if($sid==0){
                $msg="恭喜你，该网站不存在你的数据$home";
            }
            elseif($data[0]['isShow']==0){
                $msg="你已撤销头像$back";
            }

            if(empty($msg)){
                $List->find($sid);
                $List->isShow=0;
                $result=$List->save();

                if($result)
                    $msg="恭喜你，已成功撤销你的头像$home";
                else
                    $msg="撤销失败，请稍后再尝试$back";
            }
        }
        else{
            $msg="格式不正确，请输入长度为12位的数字高考考号!$back";
        }

		$this->assign('action','appeal');
		$this->assign('msg',$msg);
		$this->display('index');
	}
}