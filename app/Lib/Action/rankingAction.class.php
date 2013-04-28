<?php

class rankingAction extends Action{

	public function index(){
		$List=M('list');
		$data=$List->where("gender='F' and isShow=0")->order("score desc")->limit(100)->select();

		$Reply=M('reply');
		$ranking=array();
		foreach($data as $key=>$value){
			$sid=$value['id'];

			$value['replies']=$Reply->where("sid=".$sid)->order("addTime desc")->select();
			$value['r_count']=count($value['replies']);
			array_push($ranking, $value);
		}

		$this->assign('ranking',$ranking);
		$this->assign('action','ranking');

		$this->display();
	}

	public function replies(){
		$sid=$this->_post("sid",'intval');

		$Reply=M('reply');
		$replies=$Reply->where("sid=".$sid)->order("addTime desc")->select();

		foreach ($replies as $key => $item) {
			$replies[$key]['addTime']=niceDate($item['addTime']);
		}

		$r_count=count($replies);

		$data=array(
			'replies'=>$replies,
			'r_count'=>$r_count
		);

		$jsonData=json_encode($data);
		echo $jsonData;
	}

	public function postReply(){
		$sid=$this->_post('sid','intval');
		$username=$this->_post('username');
		$content=$this->_post('content');

		if($sid==0){
			$this->error("参数错误");
		}

		$username=htmlspecialchars($username,ENT_QUOTES);
		$content=htmlspecialchars($content,ENT_QUOTES);

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

		$Reply=M('reply');
		$Reply->sid=$sid;
		$Reply->username=$username;
		$Reply->content=$content;
        $Reply->ip=$ip;
        $Reply->addTime=time();
		$result=$Reply->add();

		if($result){
			header("location:/ranking");
			//$this->redirect("/ranking");
		}
		else{
			$this->error("评论失败");
		}
	}
}