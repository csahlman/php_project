<?php

  $host="localhost"; // Host name 
  $username="root"; // Mysql username 
  $password=""; // Mysql password 
  $db_name="forum"; // Database name 
  $tbl_name="comments"; // Table name 

  mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
  mysql_select_db("$db_name")or die("cannot select DB");

  $title = $_POST['comment_title'];
  $comment = $_POST['comment_body'];
  $id = $_POST['thread_id'];


  // $datetime=date("d/m/y h:i:s"); 

  $sql="INSERT INTO $tbl_name(comment_title, comment_body, thread_id)VALUES('$title', '$comment', $id)";
  $result=mysql_query($sql);

  if($result){
    echo "Successful<BR>";
    echo "<a href=view_comments.php?id=$id>View your topic</a>";
  }
  else {
    echo $id;
    echo $comment;
    echo $title;
  }
  mysql_close();
?>