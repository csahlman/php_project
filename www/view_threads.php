<?php

  $host="localhost"; // Host name 
  $username="root"; // Mysql username 
  $password=""; // Mysql password 
  $db_name="forum"; // Database name 
  $tbl_name="thread"; // Table name 

  mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
  mysql_select_db("$db_name")or die("cannot select DB");

  $sql = "SELECT id, thread_title FROM thread";


  $result = mysql_query($sql);
?>

<table>
  <thead>
    <th>title</th>
  </thead>

<?php 
  while($rows = mysql_fetch_array($result)) {
?>
  <tr>
    <td><?php echo $rows['id']; ?></td>
    <td><a href="view_comments.php?id=<?php echo $rows['id'] ?>"><?php echo $rows['thread_title']; ?></a></td>
  </tr>
<?php 
  }
  mysql_close();
?>
</table>

<a href="thread_form.php">Create new thread</a>
