<?php

  $host="localhost"; // Host name 
  $username="root"; // Mysql username 
  $password=""; // Mysql password 
  $db_name="forum"; // Database name 
  $tbl_name="thread"; // Table name 

  mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
  mysql_select_db("$db_name")or die("cannot select DB");

  $title=$_POST['title'];


  $datetime=date("d/m/y h:i:s"); 

  $sql="INSERT INTO $tbl_name(thread_title)VALUES('$title')";
  $result=mysql_query($sql);

  if($result){
    echo "Successful<BR>";
    echo "<a href=view_threads.php>View your topic</a>";
  }
  else {
    echo "ERROR";
  }
  mysql_close();
?>