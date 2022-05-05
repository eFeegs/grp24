<html><head><title>Login</title></head><body><pre>
<?php
$username='z1944395';
$password='1997Apr02';
  error_reporting(E_ALL);
  //include("secrets.php");
  include("projectlibrary.php");
  try {
    $dsn = "mysql:host=courses;dbname=z1944395";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $check = isset($_GET['usertype']);
    if(!$check) {
    echo "New or Returning Customer?
         <form action='http://students.cs.niu.edu/~z1944395/createnewuser.php'>
         <input type='submit' value='New'>
         </form>
         <form actiion='http://studnets.cs.niu.edu/~z1944395/login.php'>
         <input type='hidden' id='usertype' name='usertype' value='Returning'>
         <input type='submit' value='Returning'>
         </form>";
    }
    else {
      $usertype = $_GET['usertype'];
      if($usertype = 'Returning') {
        $rs = $pdo->query("SELECT ID, FNAME, EMAIL FROM CUSTOMER;");
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
        echo "Select a User:";
        foreach($rows as $row) {
          $id = $row['ID'];
          $name = $row['FNAME'];
          $email = $row['EMAIL'];
          echo "<br> Name: <a href='http://students.cs.niu.edu/~z1944395/account.php?user=$id'>$name</a> Email: $email";
      }
      }
    }
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</pre></body></html>