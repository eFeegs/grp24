<html><head><title>Login</title></head><body><pre>
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
    echo "<h2>Order Confirmed</h2>";
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
      $rn = $pdo->query("SELECT NAME, QUANTITY, RQUANTITY, PRICE FROM PRODUCT WHERE ID = $pid;");
      $rown = $rn->fetch(PDO::FETCH_ASSOC);
      $name = $rown['NAME'];
      $pqty = $rown['QUANTITY'];
      $price = $rown['PRICE'];
      $total = $qty * $price;
      $ptotal = $total + $ptotal;
      $rqty = $rown['RQUANTITY'];
      $rqty = $rqty + $qty;
      $nqty = $pqty - $qty;
      echo "<tr>
           <td>$name</td>
           <td>$qty</td>
           <td>$$price</td>
           <td>$$total</td>
           </tr>";
      $rs = $pdo->query("UPDATE PRODUCT SET RQUANTITY = $rqty WHERE ID = $pid;");
      $rs = $pdo->query("UPDATE PRODUCT SET QUANTITY = $nqty WHERE ID = $pid;");
      $rs = $pdo->query("UPDATE ORDERLINE SET STATUS = 'Bought' WHERE ID = $id;");
      $rs = $pdo->query("INSERT INTO CUSTOMER_ORDER (OID, STATUS) VALUES($id, 'Recieved');");
    }
    echo "</table>
         <p>Total Purchase: $$ptotal</p>";
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</pre></body></html>