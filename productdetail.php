<html><head><title>Product Detail</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head><body><pre>
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
    $itembought = false;
    $id = $_GET['id'];
    $user = $_GET['user'];
    print_header($user);
    $check = isset($_GET['q']);
    if($check) {
      $user = $_GET['user'];
      $q = $_GET['q'];
      $status = $_GET['status'];
      $rc = "SELECT * FROM ORDERLINE WHERE CID = $user AND PID = $id AND STATUS = 'Shopping';";
      $resultc = $pdo->query($rc);
      $num_rows = $resultc->rowCount();
      if($num_rows == 0)
      {
        $rs = "INSERT INTO ORDERLINE (CID, PID, STATUS, QUANTITY) VALUES ($user, $id, '$status', $q);";
        $result = $pdo->query($rs);
        if(!$rs) { echo "Error in query"; die(); }
      }
      else {
        $itembought = true;
      }
    }
    $rs = $pdo->prepare("SELECT NAME, QUANTITY, PRICE, DESCRIPTION FROM PRODUCT WHERE ID = $id;");
    if(!$rs) { echo "Error in query"; die(); }
    $rs->execute(array(":id" => $_GET["id"]));
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    $pname = $row['NAME'];
    $price = $row['PRICE'];
    $qty = $row['QUANTITY'];
    $desc = $row['DESCRIPTION'];
    echo "<h1 class='mb-3 ms-5'>$pname</h1>";
    echo "<p class='mb-0 ms-5'><b>Price:</b> $$price</p>
          <p class='mt-0 ms-5'><b>Quantity Left:</b> $qty</p>";
    if($desc != null) {
       echo "<p class='mt-0 ms-5'><b>Description:</b> $desc<p>";
    }
    echo "<form action='http://students.cs.niu.edu/~z1944395/productdetail.php' class='ms-5'>
         <input type='hidden' id='status' name='status' value = 'Shopping'>
         <input type='hidden' id='user' name='user' value=$user>
         <input type='hidden' id='id' name='id' value=$id>
         <div class='w-25'>
          <input type='number' id='q' name='q' step='1' min='1' max=$qty value='1' class='form-control'>
         </div>
         <input type='submit' value='Buy' class='btn btn-dark'>
         </form>";
    if($itembought) {
      echo "Item already in your shopping cart.";
    }
  }
  catch(PDOexception $e)
  {
    echo "Connection to database failed: " . $e->getMessage();
  }
?>
</pre></body></html>
