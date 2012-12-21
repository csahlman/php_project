<?php

  $host="localhost"; // Host name 
  $username="root"; // Mysql username 
  $password=""; // Mysql password 
  $db_name="forum"; // Database name 
  $tbl_name="thread"; // Table name 

  mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
  mysql_select_db("$db_name")or die("cannot select DB");

  $id = $_GET['id'];
  $sql = "SELECT * FROM thread WHERE id='$id'";
  $result = mysql_query($sql);
  $rows = mysql_fetch_array($result);
?>

<h2>Thread Title: <?php echo $rows['thread_title'] ?></h2>

<table>
  <thead>
    <th>ID: </th>
    <th>Comment Title:</th>
    <th>Comment Body: </th>
  </thead>

<?php 
  $tbl_name = "comments";
  $sql = "SELECT * FROM $tbl_name WHERE thread_id = '$id'";
  $result = mysql_query($sql);
  while($rows = mysql_fetch_array($result)) {
?>

  <tr>
    <td><?php echo $rows['id'] ?></td>
    <td><?php echo $rows['comment_title'] ?></td>
    <td><?php echo $rows['comment_body'] ?></td>
  </tr>

<?php 
  }
  mysql_close();
?>
</table>


<table>
  <form id="comment_form" name="comment_form" method="post" action="create_comment.php">
    <tr>
      <td>Comment Title</td>
      <td><input name="comment_title" type="text" name="comment_title" size="30" /></td>
    </tr>
    <tr>
      <td>Comment Body</td>
      <td><input name="comment_body" type="text" name="comment_body" size="200" /></td>
    </tr>
    <tr>
      <td><input name="thread_id" type="hidden" value="<?php echo $id; ?>"></td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </form>
</table>
<a href="view_threads.php">View all threads</a>