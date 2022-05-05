<html>
  <head>
    <title>Group 24 Project</title>
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
              foreach($rows as $row) {
                $pid = $row['ID'];
                $name = $row['NAME'];
                echo "<a href='http://students.cs.niu.edu/~z1944395/productdetail.php?user=$user&id=$pid'>$name</a>
                      <br>";
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