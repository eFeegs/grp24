<html><head><title>Shopping Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head><body><pre>
<?php
$username='z1944395';
$password='1997Apr02';
  error_reporting(E_ALL);
  include("projectlibrary.php");
  include("secrets.php");
  try {
    $dsn = "mysql:host=courses;dbname=z1944395";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $user = $_GET['user'];
    $check = isset($_GET['oid']);
    if($check) {
      $oid = $_GET['oid'];
      $q = $_GET['q'];
      if($q == 0) {
        $ru = $pdo->query("DELETE FROM ORDERLINE WHERE ID = $oid;");
      }
      else {
        $ru = $pdo->query("UPDATE ORDERLINE SET QUANTITY = $q WHERE ID = $oid;");
      }
    }
    print_header($user);
    $rs = $pdo->query("SELECT ID, PID, QUANTITY FROM ORDERLINE WHERE STATUS = 'Shopping' AND CID = $user");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    $ptotal = 0;
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
      echo "<form action='http://students.cs.niu.edu/~z1944395/shoppingcart.php'>
            <div class='card ms-5 w-25'>
              <div class='card-body'>
                <h5 class='card-title'><a href='http://students.cs.niu.edu/~z1944395/productdetail.php?user=$user&id=$pid'>$name</a></h5>
                <p class='card-text'><b>Quantity: </b>$qty </p>
                <p class='card-text'><b>Price: </b>$$price </p>
                <p class='card-text'><b>Total: </b>$$total </p>
                <div class='card-footer'>
                  <input type='hidden' id='user' name='user' value=$user>
                  <input type='number' id='q' name='q' step='1' max=$pqty value=$qty>
                  <input type='hidden' id='oid' name='oid' value=$id>
                  <input type='submit' value='Update Item' class='btn btn-dark'>
                </div>
              </div>
            </div>
          </div>
        
           </form>";
    }

    echo "
          <h3 class='ms-5'>Shopping Cart Total: $$ptotal</h3>
          <form action='http://students.cs.niu.edu/~z1944395/checkout.php'>
          <input type='hidden' id='user' name='user' value=$user>
          <input type='submit' value='Checkout' class='btn btn-dark'>
          </form>";
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>