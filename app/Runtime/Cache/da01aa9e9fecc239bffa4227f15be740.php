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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
		<div class="ranking_board">
            <div class="box tips update">
                FAQ:<br/>
                Q:提交了，还是出现图片?<br/>
                A:输入的必须是高考考号，且提交成功后有"恭喜你，已成功撤销你的头像"的提示，才是申诉成功，如果还不行请在下面内容栏输入你的高考考号（请填写正确的邮箱地址，方便联系）
            </div>

			<div class="box tips">
				<?php if($success==true): ?><span style="color:green;font-weight:bold;">提交成功，感谢你的意见</span>
				<?php else: ?>
					以下2项必填<?php endif; ?>
			</div>
			<div class="box">
				<?php if($msg != ''): echo ($msg); ?>
				<?php else: ?>
					<form class="form-inline" style="margin-top:18px;" method="post" action="/suggest/doSuggest">
						<table>
							<tr><td width="100px">邮箱</td><td><input type="text" class="span6" id="name" name="name"></td></tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td>内容</td><td><textarea class="span6" id="content" name="content" style="height:100px;"></textarea></td></tr>
							<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td><td><input type="submit" class="btn" value="提交"></td></tr>
						</table><?php endif; ?>
			</div>
		</div> 
<div class="copyright">Created by Wallace Leung | <a href="http://tongji.baidu.com/web/welcome/ico?s=7e4d1cc2d4e3403311eca133d95159a3" target="_blank">Statistic</a></div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="__JS__/jquery-1.7.1.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/jquery.masonry.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(function(){
	$(".btn").click(function(){
		var name=$.trim($("#name").val());
		var content=$.trim($("#content").val());

		if(name=='' || content=='')
			return false;
		else
			return true;
	});
});
</script>