<?php
    if($_SESSION['accessRole'] == 'admin') {
        $welcome = "Welcome " . $_SESSION['accessRole'];
        $isAdmin = true;
    } else {
        $welcome = "Welcome " . $_SESSION['accessRole'];
        $isAdmin = false;
    }
?>
<header class="header-mobile d-block d-lg-none">
   <div class="header-mobile__bar">
       <div class="container-fluid">
           <div class="header-mobile-inner">
               <a class="logo" href="index.php">
               <h2 style="color:black; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; display: table-cell;"> HIRAYA </h2> 
                <!-- <img src="images/hiraya.png" alt="Homepage"> -->
               </a>
               <button class="hamburger hamburger--slider" type="button">
                   <span class="hamburger-box">
                       <span class="hamburger-inner"></span>
                   </span>
               </button>
           </div>
       </div>
   </div>
   <nav class="navbar-mobile">
       <div class="container-fluid">
           <ul class="navbar-mobile__list list-unstyled">
                <li>
                   <a href="./dashboard.php">
                       <i class="fas fa-home"></i>Home</a>
               </li>
               <li>
                   <a href="./profile.php">
                       <i class="fas fa-user"></i>Profile</a>                     
               </li>
               <li>
                   <a href="./booking.php">
                       <i class="fas fa-book"></i>Booking</a>                     
               </li>
               <li>
                   <a href="./gallery.php">
                   <i class="fas fa-camera-retro"></i>My Gallery</a>
               </li>  
               <li>
                    <a href="./packages.php">
                        <i class="zmdi zmdi-picture-in-picture"></i>Packages</a>                     
                </li> 
               <?php if($isAdmin) { ?>
               <li>
                   <a href="./calendar.php">
                       <i class="fas fa-calendar-alt"></i>Calendar</a>                     
               </li>
               <li>
                   <a href="./users.php">
                       <i class="fas fa-users"></i>Users</a>                     
               </li>
               <li>
                   <a href="./customers.php">
                       <i class="fas fa-users"></i>Customers</a>                     
               </li>
               <li>
                   <a href="./upload.php">
                       <i class="fas fa-arrow-circle-up"></i>Upload Gallery</a>                     
               </li>
               <li>
                    <a href="./contact-forms.php">
                        <i class="zmdi zmdi-email-open"></i>Contact Forms</a>                     
               </li>
               <?php ;} ?>
           </ul>
       </div>
   </nav>
</header>