<html><head><title>Account</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head><body><pre>
<?php
$username='z1944395';
$password='1997Apr02';
  error_reporting(E_ALL);
  include("secrets.php");
  include("projectlibrary.php");
  include("library.php");
  try {
    $dsn = "mysql:host=courses;dbname=z1944395";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $check = isset($_GET['fname']);
    if($check) {
      $fname = $_GET['fname'];
      $lname = $_GET['lname'];
      $email = $_GET['email'];
      $addr = $_GET['addr'];
      $cty = $_GET['cty'];
      $state = $_GET['state'];
      $zip = $_GET['zip'];
      $card = $_GET['card'];
      $rs = $pdo->query("INSERT INTO CUSTOMER (FNAME, LNAME, EMAIL, ADDRESS, CITY, STATE, ZIP, CARD)
              VALUES('$fname', '$lname', '$email', '$addr', '$cty', '$state', '$zip', '$card')");
      $ru = $pdo->query('SELECT ID FROM CUSTOMER WHERE ID = ( SELECT MAX(ID) FROM CUSTOMER );');
      $urow = $ru->fetch(PDO::FETCH_ASSOC);
      $user = $urow['ID'];
    }
    else {
      $user = $_GET['user'];
    }
    print_header($user);
    $rs = $pdo->query("SELECT * FROM CUSTOMER WHERE ID = $user");
    $crow = $rs->fetch(PDO::FETCH_ASSOC);
    $fname = $crow['FNAME'];
    $lname = $crow['LNAME'];
    $email = $crow['EMAIL'];
    $addr = $crow['ADDRESS'];
    $cty = $crow['CITY'];
    $state = $crow['STATE'];
    $zip = $crow['ZIP'];
    $card = $crow['CARD'];
    echo "<h2>Account Information:</h2>
          Name: $fname $lname
          Email: $email
          Address: $addr, $cty, $state, $zip
          Card Information: $card";
    $rs = $pdo->query("SELECT OID, PID, QUANTITY, DDATE, CUSTOMER_ORDER.STATUS
                      FROM ORDERLINE, CUSTOMER_ORDER
                      WHERE ORDERLINE.CID = $user AND ORDERLINE.ID = CUSTOMER_ORDER.OID AND ORDERLINE.STATUS = 'Bought'");
    $num_rows = $rs->rowCount();
    echo "<h2>Orders:</h2>";
    if($num_rows!=0)
    {
        $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=1 cellspacing=1>
             <tr>
             <th>Order ID</th>
             <th>Product</th>
             <th>Quantity</th>
             <th>Item Price</th>
             <th>Order Total</th>
             <th>Status</th>
             <th>Expected Delivery Date</th>
                          <th>Expected Delivery Date</th>
             </tr>";
        foreach($rows as $row) {
          $oid = $row['OID'];
          $pid = $row['PID'];
          $rp = $pdo->query("SELECT NAME, PRICE FROM PRODUCT WHERE ID = $pid");
          $rowp = $rp->fetch(PDO::FETCH_ASSOC);
          $name = $rowp['NAME'];
          $qty = $row['QUANTITY'];
          $price = $rowp['PRICE'];
          $total = $price * $qty;
          $status = $row['STATUS'];
          $duedate = $row['DDATE'];
          echo "<tr>
                <td>$oid</td>
                <td>$name</td>
                <td>$qty</td>
                <td>$$price</td>
                <td>$$total</td>
                <td>$status</td>
                <td>$duedate</td>
                </tr>";
        }
        echo "</table>";
    }
    else
    {
      echo "<br>No previous orders";
    }
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</pre></body></html>
                                                                                                                                                                                                                           57,22-29      Top
