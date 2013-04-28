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
<div id="container">

	<div class="row">
		<div class="box tips board">
			<strong>Facemash简介:</strong>
			 Facemash是由Mark Zuckerberg始创于2003年,他利用学校网站的漏洞获取女生的头像, 并利用<a href="http://zh.wikipedia.org/wiki/%E7%AD%89%E7%BA%A7%E5%88%86" target="_blank">Elo rating</a>算法对所有女生进行美貌排行，在短短2小时内达到22,000+的点击量，从而致使哈佛网络崩溃,详情可参考电影<a href="http://movie.douban.com/subject/3205624/" target="_blank">《社交网络》</a>，或者文章 <a href="http://itswater.com/learning_facemash_of_tsn/" target="_blank">浅析《TSN》中的Facemash.com</a><br/>
			<strong>游戏说明:</strong> 本网站的头像目前仅有常平中学高三级的大部分数据，秉承着男女平等的原则，因此页面出现的头像是男女随机组合的，若你有意见或建议，可点击建议填写内容进行提交<br/>
			<strong>游戏规则:</strong> 在页面随机出现的2张头像中，选择你认为较吸引的童鞋头像，并按vote为Ta进行投票，排行榜可查看分数按高到低前100名的童鞋<br/>
			<strong>Attention:</strong> 本网站仅作娱乐，绝无冒犯之意，<span style="color: green;text-decoration: underline;">若你的头像出现在此网站，并感觉不安，可点击申诉并输入高考考号以撤销你的头像，撤销成功后，你的头像将不会在此网站显示</span>
		</div>

        <div class="box tips board update">
            <strong>2月5号更新说明:</strong>主要添加多了289位童鞋的头像，估计数据覆盖率达到99%（1.在此首先感激那位坚持玩了一个星期而始终找不到自己classmate的童鞋的忠实支持,估计这次不会再让你失望了。2.还有那位想要用饭卡号申诉的女童鞋，我在此重申一下：是高考考号啦，不是饭卡号！） <span style="color: red">Ps:申诉后，还出现图片的童鞋请见<a href="/suggest">FAQ</a></span>
        </div>

		<div class="box board">
			<div class="versus">
				<form id="form1" method="post" action="/Index/vote">
					<div class="col">
						<div class="avatar"><img src="__IMG__/avatar/<?php echo ($pk[0]['image']); ?>"></div>
						<div class="vote"><input type="button" class="btn btn-success" onclick="vote('a');" value="vote"></div>
					</div>
					<div class="vs">VS</div>
					<div class="col">
						<div class="avatar"><img src="__IMG__/avatar/<?php echo ($pk[1]['image']); ?>"></div>
						<div class="vote"><input type="button" class="btn btn-success" onclick="vote('b');" value="vote"></div>
					</div>
					<input type="hidden" id="aid" name="aid" value="<?php echo ($pk[0]['id']); ?>">
					<input type="hidden" id="bid" name="bid" value="<?php echo ($pk[1]['id']); ?>">
                    <input type="hidden" id="code" name="code" value="<?php echo ($code); ?>">
					<input type="hidden" id="win" name="win">
				</form>
			</div>

			<div>
				分享到:&nbsp;
				<a class="icon xlwb" style="cursor:pointer" onClick="share('TSina')">新浪微博</a>&nbsp;
				<a class="icon xlwb" style="cursor:pointer" onClick="share('Qzone')">QQ空间</a>&nbsp;
				<a class="icon xlwb" style="cursor:pointer" onClick="share('DouBan')">豆瓣</a>
			</div>
		</div>
	</div>

</div>
<div class="copyright">Created by Wallace Leung | <a href="http://tongji.baidu.com/web/welcome/ico?s=7e4d1cc2d4e3403311eca133d95159a3" target="_blank">Statistic</a></div>

<!-- Placed at the end of the document so the pages load faster -->
<script src="__JS__/jquery-1.7.1.min.js"></script>
<script src="__JS__/bootstrap.min.js"></script>
<script src="__JS__/jquery.masonry.min.js"></script>
</body>
</html>
<script src="/app/public/js/share.js"></script>
<script type="text/javascript">
function vote(win){
	var form=$("#form1");
	$("#win").val(win);
    form.submit();
}
</script>