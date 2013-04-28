<?php

class IndexAction extends Action {

    public function index(){
    	$List=D("List");
    	$this->pk=$List->getPK();

        $code=md5(time().rand(1000,9999));
        $_SESSION['code']=$code;

        $this->assign('code',$code);
        $this->assign('action','index');
        $this->display();
    }

    public function vote(){

    	$aId=$this->_post('aid','intval');
    	$bId=$this->_post('bid','intval');
    	$win=$this->_post('win','trim');
        $code=$this->_post('code','trim');

        if($win!='a' && $win!='b'){
            $this->error("参数错误");
        }

        if(!$_SESSION['code'] || !$code || $code!=$_SESSION['code']){

            if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                $ip = getenv("HTTP_CLIENT_IP");
            else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                $ip = getenv("REMOTE_ADDR");
            else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                $ip = $_SERVER['REMOTE_ADDR'];
            else
                $ip = "unknown";

            $RePost=M("repost");
            $RePost->ip=$ip;
            $RePost->addTime=time();
            $RePost->add();

            $this->error("小朋友，重复提交是不对的哦！","/");
        }
        else{
            unset($_SESSION['code']);
        }
    	
    	$List=D("List");
    	$List->rank($aId,$bId,$win);
        header("location:/");
    }
}