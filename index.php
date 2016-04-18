<?php

//连接数据库
$dsn = 'mysql:host=localhost;dbname=testmemcached';
$username = 'root';
$password = 'root';
$con = new PDO($dsn, $username, $password);
//连接memcached
$m = new Memcached();
$m->addServer('127.0.0.1', '11211');
//查询所有数据
//判断是否有缓存文件
if($m->get('data')) {
    //如果有缓存直接调出缓存文件
    $data = $m->get('data');
}else {
    $sql = 'select * from message order by inputtime desc';
    $res = $con->query($sql);
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    //存入memcached
    $m->set('data', $data, 30);
}
//执行添加操作
if($_POST['submit']) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $inputtime = time();
    $sql = "insert into message(id, title, content, inputtime) values($id, '$title', '$content', $inputtime)";
    $con->exec($sql);
    header('Location:index.php');
}
require_once('show.php');
?>
