<?php
$username='z1944395';
$password='1997Apr02';
 function print_header($user) {
   echo "<div>
            <nav class='navbar navbar-expand-sm py-0'>
            
                  <ul class='navbar-nav navbar-light bg-light'>
                        <li class='nav-item'>
                              <a href='http://students.cs.niu.edu/~z1944395/shoppingcart.php?user=$user' class='nav-link'>Shopping Cart</a>
                        </li>
                        <li class='nav-item '>
                              <a href='http://students.cs.niu.edu/~z1944395/account.php?user=$user' class='nav-link'>Account</a>
                        </li>
                        <li class='nav-item '>
                              <a href='http://students.cs.niu.edu/~z1944395/group24.php?user=$user' class='nav-link'>Products</a>
                        </li>
                        <a class='navbar-brand'>
                        <img src='https://www.pngkey.com/png/detail/83-835076_random-logo-png-transparent-random-brand-logos-png.png' 
                              alt='Random Logo Png Transparent - Random Brand Logos Png@pngkey.com' height=75>
                        </a>

                  </ul>
            
            </nav>
         
         
         
         </div>";
 }
 function print_login() {
  echo "<div>
        <img src='https://www.pngkey.com/png/detail/83-835076_random-logo-png-transparent-random-brand-logos-png.png' alt='Random Logo Png Transparent - Random Brand Logos Png@pngkey.com'
        width=1000 height=200/>
        <a href='http://students.cs.niu.edu/~z1944395/login.php'>Login</a>
        A login is required before proceding
        </div>";
 }
?>