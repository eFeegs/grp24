<html>
  <head>
    <title>Group 24 Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
      <pre>
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
            $check = isset($_GET['user']);
            if($check) {
              $user = $_GET['user'];
              print_header($user);
              $rs = $pdo->query("SELECT NAME, ID FROM PRODUCT");
              $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
              echo "<h2>Products</h2>
                    <table class='table table-bordered table-hover'>
                      <thead class='table-dark'>
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>";
              foreach($rows as $row) {
                $pid = $row['ID'];
                $name = $row['NAME'];
                echo "<tr>
                        <td><a href='http://students.cs.niu.edu/~z1944395/productdetail.php?user=$user&id=$pid'>$name</a></td>
                        <td><a href='http://students.cs.niu.edu/~z1944395/productdetail.php?user=$user&id=$pid'>$price</a></td>
                        <td><a href='http://students.cs.niu.edu/~z1944395/productdetail.php?user=$user&id=$pid'>$qty</a></td>
                      </tr>";
              }
            }
            else {
              print_login();
            }
          }
          catch(PDOexception $e)
          {
            echo "Connection to database failed: " . $e->getMessage();
          }
        ?>
      </pre>
    </body>
</html>