<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FaceMash</title>
    <meta name="keywords" content="facemash" />
    <meta name="description" content="facemash,同学，娱乐，照片对比" />
		<link href="__CSS__/bootstrap.min.css" rel="stylesheet">
		<link href="__CSS__/global.css" rel="stylesheet">
		<link rel="shortcut icon" href="favicon.ico">
	</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="/">Face Mash</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
          	<li <?php if($action =='index'): ?>class="active"<?php endif; ?>><a href="/">首页</a></li>
          	<li <?php if($action =='ranking'): ?>class="active"<?php endif; ?>><a href="/ranking">排行榜</a></li>
          	<li <?php if($action =='appeal'): ?>class="active"<?php endif; ?>><a href="/appeal">申诉</a></li>
          	<li <?php if($action =='suggest'): ?>class="active"<?php endif; ?>><a href="/suggest" class="pointer">建议</a></li>
            <li <?php if($action =='suggest'): ?>class="active"<?php endif; ?>><a href="http://weibo.com/zerxon" class="pointer" target="_blank">官方微博</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
		<div class="ranking_board">
			<div class="box tips" style="text-align: center;"><h1>Top 100<h1></div>
			<div class="box">
				<div class="ranking_list">
					<?php if(is_array($ranking)): foreach($ranking as $key=>$item): ?><div class="ranking_item">
						<div class="sort"><?php echo ($key+1); ?></div>
						<div class="pic">
							<img src="__IMG__/avatar/<?php echo ($item["image"]); ?>">
						</div>
						<div class="replies">
							<div class="header">
								评论(<?php echo ($item["r_count"]); ?>):
								<span class="right">
									<a class="btnReply" rel="<?php echo ($item["id"]); ?>" data-toggle="modal" href="#replyForm">我要评论</a>&nbsp;&nbsp;
									<a class="btnShow" rel="<?php echo ($item["id"]); ?>" data-toggle="modal" href="#showForm">查看更多评论>></a>
								</span>
							</div>
							<?php if(is_array($item['replies'])): foreach($item['replies'] as $key=>$value): ?><div class="reply"><?php echo ($value["username"]); ?> (<?php echo (nicedate($value["addTime"])); ?>): <?php echo ($value["content"]); ?></div><?php endforeach; endif; ?>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>

<div class="modal hide fade" id="showForm">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3></h3>
	</div>
	<div class="modal-body"></div>
	<div class="modal-footer"></div>
</div>

<form method="post" action="/ranking/postReply">
<div class="modal hide fade" id="replyForm">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">x</a>
		<h3>我要评论</h3>
	</div>
	<div class="modal-body">
		<input type="hidden" name="sid" id="sid">
		<div>昵称:</div>
		<div><input type="text" name="username" id="username" style="width:45%"></div>
		<div>内容:</div>
		<div><textarea name="content" id="content" style="width:98%;height:100px;"></textarea></div>
	</div>
	<div class="modal-footer"><input class="btn btn-success" id="replySubmit" value="提交" type="submit"></div>
</div>
</form>

<div class="copyright">Created by Wallace Leung | <a href="http://tongji.baidu.com/web/welcome/ico?s=7e4d1cc2d4e3403311eca133d95159a3" target="_blank">Statistic</a></div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="__JS__/jquery-1.7.1.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/jquery.masonry.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(".btnShow").click(function(){
	var sid=$(this).attr("rel");
	
	$.ajax({
		type: "POST",
		url: "/ranking/replies",
		data: "sid="+sid,
		dataType: "JSON",
		beforeSend: function () {
				$("#showForm .modal-body").html("Loading...");
		},
		success: function(data){
			if(data.code == '1'){
				alert('get replies error');
			}
			else{
				var replies=data.replies;
				var count=data.r_count;

				var strHtml="";
				if(replies!=null){
					for(i=0;i<replies.length;i++){
						strHtml+='<div class="reply">'+replies[i].username+' ('+replies[i].addTime+'): '+replies[i].content+'</div>';
					}
				}

				$("#showForm .modal-header h3").html("评论("+count+")");
				$("#showForm .modal-body").html(strHtml);
			}
		}
	});
});

$(".btnReply").click(function(){
	var sid=$(this).attr("rel");
	$("#sid").val(sid);

	$("#content").val('');
});

$("#replySubmit").click(function(){
		var username=$.trim($("#username").val());
		var content=$.trim($("#content").val());

		if(username=='' || content=='')
			return false;
});
</script>