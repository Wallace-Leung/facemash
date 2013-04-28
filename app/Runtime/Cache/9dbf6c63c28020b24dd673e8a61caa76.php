<?php if (!defined('THINK_PATH')) exit();?><html>
 <head>
   <title>User</title>
 </head>
 <body>
    <?php if(is_array($form)): $i = 0; $__LIST__ = $form;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>标题：<?php echo ($vo["title"]); ?><br/>
    时间：<?php echo ($vo["create_time"]); ?><br/>
    内容：<?php echo ($vo["content"]); ?><br/>
    <hr><?php endforeach; endif; else: echo "" ;endif; ?>
 </body>
</html>