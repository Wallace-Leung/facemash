<?php if (!defined('THINK_PATH')) exit();?><FORM method="post" action="__URL__/update">
    标题：<INPUT type="text" name="title" value="<?php echo ($article["title"]); ?>"><br/>
    内容：<TEXTAREA name="content" rows="5" cols="45"><?php echo ($article["content"]); ?></TEXTAREA><br/>
    <INPUT type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
    <INPUT type="submit" value="提交">
</FORM>