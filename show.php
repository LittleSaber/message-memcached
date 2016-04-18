<?php

//用于显示主页留言板

?>
<html>
<head>
<title>我是memcache的留言板啊</title>
</head>
<body>
<?php
foreach($data as $row) {
    echo '<div>';
    echo '<p>标题：'.$row['title'].'</p>';
    echo '<p>内容：'.$row['content'].'</p>';
    echo '<p>发布时间：'.date('Y-m-d H:i:s', $row['inputtime']).'</p>';
    echo '<hr/>';
}
?>
<form action='' method='post'>
id：<input type='text' value='' name='id'><br/>
标题：<input type='text' value='' name='title'><br/>
内容：<textarea name='content'></textarea><br/>
<input type='submit' value='添加' name='submit'>
</form>
</body>
</html>
