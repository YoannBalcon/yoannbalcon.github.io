<!-- connection à la base de données -->
<?php
define('SQL_DSN', 'mysql:dbname=testlist;host=localhost;chaset=utf8');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '1234');

$pdo= new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
 ?>
