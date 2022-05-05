<html><head><title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head><body><pre>
<?php
$username='z1944395';
$password='1997Apr02';
  error_reporting(E_ALL);
  include("secrets.php");
  include("projectlibrary.php");
  try {
    $dsn = "mysql:host=courses;dbname=z1944395";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $user = $_GET['user'];
    print_header($user);
    $rs = $pdo->query("SELECT FNAME, LNAME, EMAIL, ADDRESS, CITY, STATE, ZIP, CARD FROM CUSTOMER WHERE ID = $user");
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    $fname = $row['FNAME'];
    $lname = $row['LNAME'];
    $email = $row['EMAIL'];
    $addr = $row['ADDRESS'];
    $cty = $row['CITY'];
    $state = $row['STATE'];
    $zip = $row['ZIP'];
    $card = $row['CARD'];
    echo "<h2>Account Information</h2>
          Name: $fname $lname
          Email: $email
          Address: $addr, $cty, $state, $zip
          Card: $card";
    $rs = $pdo->query("SELECT ID, PID, QUANTITY FROM ORDERLINE WHERE STATUS = 'Shopping' AND CID = $user");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    $ptotal = 0;
    echo "<table border=1 cellspacing=1>
          <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Item Price</th>
          <th>Total Price</th>
          </tr>";
    foreach($rows as $row) {
      $id = $row['ID'];
      $pid = $row['PID'];
      $qty = $row['QUANTITY'];
      $rn = $pdo->query("SELECT NAME, QUANTITY, PRICE FROM PRODUCT WHERE ID = $pid;");
      $rown = $rn->fetch(PDO::FETCH_ASSOC);
      $name = $rown['NAME'];
      $pqty = $rown['QUANTITY'];
      $price = $rown['PRICE'];
      $total = $qty * $price;
      $ptotal = $total + $ptotal;
      echo "<tr>
           <td>$name</td>
           <td>$qty</td>
           <td>$$price</td>
           <td>$$total</td>
           </tr>";
    }
    echo "</table>
         <p>Shopping Cart Total: $$ptotal</p>
         <form action='http://students.cs.niu.edu/~z1944395/orderconfirmation.php'>
         <input type='hidden' id='user' name='user' value=$user>
         <input type='submit' value='Confirm Order'>
         </form>";
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</pre></body></html>
