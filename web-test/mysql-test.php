<?php
echo "This is a test</br>";
$mysql_server_name = "localhost"; // 数据库服务器名称
$mysql_username = "root"; // 连接数据库用户名
$mysql_password = "abc123_"; // 连接数据库密码
$mysql_database = "test"; // 数据库的名字
                          
// 连接到数据库
$conn = mysql_connect ( $mysql_server_name, $mysql_username, $mysql_password );

// 从表中提取信息的sql语句
$strsql = "SELECT * FROM `users`";
// 执行sql查询
$result = mysql_db_query ( $mysql_database, $strsql, $conn );
// 获取查询结果
$row = mysql_fetch_row ( $result );

echo '<table>';

// 显示字段名称
echo "</b><tr></b>";
for($i = 0; $i < mysql_num_fields ( $result ); $i ++) {
 echo '<td><b>' . mysql_field_name ( $result, $i );
 echo "</b></td></b>";
}
echo "</tr></b>";
// 定位到第一条记录
mysql_data_seek ( $result, 0 );
// 循环取出记录
while ( $row = mysql_fetch_row ( $result ) ) {
 echo "<tr></b>";
 for($i = 0; $i < mysql_num_fields ( $result ); $i ++) {
  echo '<td>';
  echo $row [$i];
  echo '</td>';
 }
 echo "</tr></b>";
}

echo "</table></b>";
echo "</font>";
// 释放资源
mysql_free_result ( $result );
// 关闭连接
mysql_close ( $conn );
?>