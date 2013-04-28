<?php
class suggestAction extends Action{
	public function index(){

		$this->assign('action','suggest');
		$this->display();
	}

	public function doSuggest(){
		$name=$this->_post('name');
		$content=$this->_post('content');

		$name=htmlspecialchars($name,ENT_QUOTES);
		$content=htmlspecialchars($content,ENT_QUOTES);

		$Suggest=M('suggest');
		$Suggest->name=$name;
		$Suggest->content=$content;
		$Suggest->addTime=time();
		$result=$Suggest->add();

		if($result){
			$this->assign('success',true);
			$this->display("index");
		}
		else{
			$this->error("提交失败");
		}
	}
}
?>