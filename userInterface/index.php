<?php
	session_start();
	$username = $_SESSION ["username"];

	include (" php/connectDB.php ");
?>

<!DOCTYPE html>
<html>
  <head>
    <title> <?php echo $username; ?> | Main page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">

  </head>
  <body>


    <div class="bgimg">
      <div class="insidebg">

        <div id="topNav-container">
          <span id="navToggle" onclick="openNav()">&#9776;</span>

          <span id="right-notification">
            <a href="#" class="notification">
              <button class="button">
                <span>Notifications </span>
              </button>
              <span class="badge">3</span>
            </a>
          </span>
        </div>


        <div id="mySidenav" class="sidenav">
          <div class="busName">
            <h1> <?php echo $username; ?> </h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="businessInv.php" class="buinv">
		<button class="button" style="vertical-align:middle"><span>Inventory </span></button>
	    </a>

            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo $bzid; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zipcode"; ?></h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> <?php echo $email; ?> </h3>
              <!--<h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3> -->
            </article>
          </section>
          <section class="logoutButnC">
            <a href="../phpFiles/logout.php">
	         <img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD">
	    </a>
          </section>
          <section class="logoiShopC">
          <a href="index.php">
            <img src="images/ishop.png" title="iShopLogo" alt="iShopLogo" id="logoiShopD">
          </a>
          </section>
        </div>


        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <h1> <a href="index.php"><img src="images/ishop.png" width="200px"> </a> </h1>
          </div>

          <div id="button-container">
            <div>
              <button class="bttn">
                <img src="images/searchBTN.png">
              </button>
            </div>
            <div>
              <button class="bttn">
                <a href="ishopInv.php">
                  <img src="images/add-remove.png">
                </a>
              </button>
            </div>
            <div>
              <button id="myBtn" class="bttn">
                <img src="images/map.png">
              </button>
            </div>
          </div>

          <div id="img-container">
            <img id="BUimg" src="images/recall.jpg" alt="BUimg" title="Our Business">
          </div>
        </section>
      </div>
      <!--                               END OF MAIN CONTENT                 -->

      <!-- The Map Modal -->
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>LOCALIZER</p>

          <section class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.4529525156877!2d-74.17745888503858!3d40.92773907930902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fdb3b53a8603%3A0x7bf5fca607743ad6!2s100+N+5th+St%2C+Paterson%2C+NJ+07522!5e0!3m2!1sen!2s!4v1542240288675"
              width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </section>
        </div>
      </div>
	    
      <!-- The widget modal -->
      <div id="wModal" class="wmodal">
        <!-- Widget Modal content -->
        <div class="wmodal-content">
          <span class="wclose">&times;</span>
          <p class="pFR">Food Safety Notification Recalls</p>

          <div class="wContent">
            <!--<iframe src="https://www.foodsafety.gov/recalls/widget/widget.html" width="167" height="380" alt="Food Safety Widget" title="Food Safety Widget" frameborder="0">&nbsp;</iframe>-->
          </div>
        </div>
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
