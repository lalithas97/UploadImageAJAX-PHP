<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 $connection=@mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db('image',$connection);
 ?>