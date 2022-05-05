<html>
  <head>
    <title>Create New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <pre>
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
          $check = isset($_GET['credit']);
          if($check) {
            $credit = $_GET['credit'];
            $cfname = $_GET['cfname'];
            $clname = $_GET['clname'];
            $month = $_GET['month'];
            $year = $_GET['year'];
            $cvv = $_GET['cvv'];
            $caddr = $_GET['caddr'];
            $ccty = $_GET['ccty'];
            $cstate = $_GET['cstate'];
            $czip = $_GET['czip'];
            $rs = $pdo->query("INSERT INTO CARD (ID, FNAME, LNAME, MONTH, YEAR, CVV, ADDRESS, CITY, STATE, ZIP)
                              VALUES('$credit', '$cfname', '$clname', '$month', '$year', '$cvv', '$caddr', '$ccty', '$cstate', '$czip')");
            echo "
            <div class='w-50'>
              <form action='http://students.cs.niu.edu/~z1944395/account.php' class='row g-3'>
                <div class=' col-sm-6'>
                  <label for='fname' class='form-label'></label>
                  <input type='text' id='fname' name='fname' value='$cfname'class='form-control' aria-label=\"First Name\" placeholder=\"First Name\">
                </div>
                <div class=' col-sm-6'>
                  <label for='lname' class='form-label'></label>
                  <input type='text' id='lname' name='lname' value='$clname'class='form-control' aria-label=\"Last Name\" placeholder=\"Last Name\">
                </div>
                <div class=' col-sm-6'>
                  <label for='email' class='form-label'></label>
                  <input type='text' id='email' name='email' class='form-control' aria-label=\"Email\" placeholder=\"Email\">
                </div>
                <br>
                <div class=' col-12'>
                  <label for='addr' class='form-label'></label>
                  <input type='text' id='addr' name='addr' value='$caddr' class='form-control' aria-label=\"Address\" placeholder=\"Address\">
                </div>
                <div class=' col-sm-6'>
                  <label for='cty' class='form-label'></label>
                  <input type='text' id='cty' name='cty' value='$ccty' class='form-control' aria-label=\"City\" placeholder=\"City\">
                </div>
                <div class=' col-sm-2'>
                  <label for='state' class='form-label'></label>
                  <input type='text' id='state' name='state' size='2' value='$cstate' class='form-control' aria-label=\"State (abbreviated)\" placeholder=\"State (abbreviated)\">
                </div>
                <div class=' col-sm-4'>
                  <label for='zip' class='form-label'></label>
                  <input type='text' id='zip' name='zip' value='$czip' class='form-control' aria-label=\"ZIP Code\" placeholder=\"ZIP Code\">
                </div>
                  <input type='hidden' id='card' name='card' value='$credit' >
                  <input type='submit' value='Create New User' class='btn btn-dark'>
                </form>
                </div>";
          }
          else {
            echo "<h2>Credit Card Information</h2>
            <div class='w-50'>
                <form action='http://students.cs.niu.edu/~z1944395/createnewuser.php' class='row g-3'>
                <div class='col-sm-6'>
                  <label for='credit' class='form-label'></label>
                  <input type='text' id='credit' name='credit' class='form-control' aria-label=\"Credit Card Number\" placeholder=\"Credit Card Number\">
                </div>
                <br>
                <div class='col-sm-6'>
                  <label for='cfname' class='form-label'></label>
                  <input type='text' id='cfname' name='cfname' class='form-control' aria-label=\"First name\" placeholder=\"First name\">
                </div>
                <div class=' col-sm-6'>
                  <label for='clname' class='form-label'></label>
                  <input type='text' id='clname' name='clname' class='form-control' aria-label=\"Last name\" placeholder=\"Last name\">
                </div>
                
                <div class=' col-sm-3'>
                  <label for='month' class='form-label'></label>
                  <input type='text' id='month' name='month' size='2' class='form-control' aria-label=\"Month\" placeholder=\"Month\">
                </div>
                
                <div class=' col-sm-3'>
                  <label for='year' class='form-label'></label>
                  <input type='text' id='year' name='year' size='2' class='form-control' aria-label=\"Year\" placeholder=\"Year\">
                </div>
                
                <div class=' col-sm-3'>
                  <label for='cvv' class='form-label'></label>
                  <input type='text' id='cvv' name='cvv' size='3' class='form-control' aria-label=\"CVV\" placeholder=\"CVV\">
                </div>
                
                <div class=' col-12'>
                  <label for='caddr' class='form-label'></label>
                  <input type='text' id='caddr' name='caddr' class='form-control' aria-label=\"Address\" placeholder=\"Address\">
                </div>
                
                <div class=' col-sm-6'>
                  <label for='ccty' class='form-label'></label>
                  <input type='text' id='ccty' name='ccty' class='form-control' aria-label=\"City\" placeholder=\"City\">
                </div>
                
                <div class=' col-sm-4'>
                  <label for='cstate' class='form-label'></label>
                  <input type='text' id='cstate' name='cstate' size='2' class='form-control' aria-label=\"State (abbreviated)\" placeholder=\"State (abbreviated)\">
                </div>
                <div class=' col-sm-2'>
                  <label for='czip' class='form-label'></label>
                  <input type='text' id='czip' name='czip' class='form-control' aria-label=\"ZIP Code\" placeholder=\"ZIP Code\">
                </div>
                <input type='submit' value='Add Credit Card' class='btn btn-dark'>
                </form>
                </div>";
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
