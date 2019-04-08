<?php
	session_start();
	//include ("php/connectDB2.php");
	include ("Emad.php");

	$cnt = $_SESSION['noticnt'];
	$output = $_SESSION['noti'];	
?>

<!DOCTYPE html>

<html>
  <head>
    <title> iShop | Inventory </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/util.css">
  	<link rel="stylesheet" type="text/css" href="css/inventory.css">
	<link rel="stylesheet" type="text/css" href="tablestyle.css">
	<script src"https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!--===============================================================================================-->
  </head>

  <body>
    <div class="bgimg">
      <div class="insidebg">

        <div id="topNav-container">
          <span id="navToggle" onclick="openNav()">&#9776;</span>

          <span id="right-notification">
            <a href="#" class="notification">
              <button class="button" id="bWidget">
                <span>Notifications </span>
              </button>
              <span class="badge"><?php echo $cnt;  ?></span>
            </a>
          </span>
        </div>

        <!-- The widget modal -->
        <div id="wModal" class="wmodal">

          <!-- Widget Modal content -->
          <div class="wmodal-content">
            <span class="wclose">&times;</span><br>
            <p class="pFR">Food Safety Notification Recalls</p>

            <div class="wContent">
              <?php
                                
                    //header('Content-type: text/plain');
                    echo nl2br( "$output",false );
              ?>
            </div>
          </div>
        </div>


        <div id="mySidenav" class="sidenav">
     	  <div class="busName">
             <h1> <?php echo $bzname; ?> </h1>
          </div>
          <section id="navInfo">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="businessInv.php">
	     <button class="button" style="vertical-align:middle">
	        <span id="invSpan">Inventory </span> 
	     </button>
	  </a>
            
           
            <article id="companyInfo">
              <h2 class="navInfoTitle"> Business ID: </h2>
                <h3 class="navInfoData"> <?php echo "BU00$bID"; ?> </h3>
              <h2 class="navInfoTitle"> Company Address: </h2>
                <h3 class="navInfoData"> <?php echo "$street $city, $state $zc"; ?></h3>
              <h2 class="navInfoTitle"> Email: </h2>
                <h3 class="navInfoData"> <?php echo $email; ?> </h3>
              <!--<h2 class="navInfoTitle"> Last Login: </h2>
                <h3 class="navInfoData"> March 30, 2019 at 12:30PM</h3> -->
            </article>
          </section>
          <section class="logoutButnC">
            <a href="../phpFiles/logout.php"><img src="images/logout.png" title="logoutBtn" alt="logoutBtn" id="logoutButnD"></a>
          </section>
          <section class="logoiShopC">
            <a href="index.php"><img src="images/ishop.png" id="logoiShopD"> </a>
          </section>
        </div>

        <!--                            MAIN CONTENT                         -->
        <section id="main">
          <div class="nameInContent">
            <h1> <a href="index.php"><img src="images/ishop.png" width="200px"> </a> </h1>
          </div>

     	 
                  <!--<h1>ISHOP INVENTORY FROM DB </h1>-->
          
<!-- FORM FOR UPDATE
		<div>
		<form class="updateForm" id="updateForm" action="updateInv.php" method="POST">
		<label for="product">Product</label>
		<input type="text" name="product" id="product"placeholder="Product" />
		<label for="brand">Brand</label>
		<input type="text" name="brand" id="brand"placeholder="Brand" />
		<label for="qty">Quantity</label>
		<input type="text" name="qty" id="quantity"placeholder="Quantity" />
		<input class="myButton"type="submit" name="submit-update" value="Update" onclick= "return chk()">
		</form><br>
		</div>
	<p id="msg"></p>
-->
        <button class ="myButton" onclick="location.href='businessInv.php';">Back to Your Inventory</button>

<!--MAKING A NEW TABLE OF ISHOP INV COMING FROM RABBITMQ-->
<br><br><br><h1 class="heading">Ishop Inventory</h1><br><br>
		<?php
			require ('../rabbitMQFiles/testRabbitMQClient.php');
			$ql = "SELECT name,brand FROM ishopinv";
			$record = getIshop($ql);
			
			$html .= "<table class='fixed_header'>";
       	                $html .= "<thead>";
               	        $html .="<tr class='trS'>";
                     	   $html .="<th class='thS'>Product</th>";
                           $html .="<th class='thS'>Brand</th>";
                  	$html .="</tr>";
                $html .="</thead>";
                        $count = 1;
                        foreach ($record as $aR)
                        {
                                foreach($aR as $key => $row)
                                {
                                       $html .="<td class='thS'>".$row."</td>";
                                       
                                }
                                $html .= "</tr>";
                                $count +=1;
                        }
                        $html .="</table>";
                        echo $html;
		
			echo"<br><br><br><h3 class='heading'>Update your inventory</h3><br>";
		
	/*Testing to get dropdown instead of manual inserts*/
				
			$que = "SELECT brand, name FROM ishopinv";
			$op = getOp($que);
	
		echo"<form  class='updateForm' action='updateInv.php' method='POST'>";
			echo"<div class = 'list'>";

		
				foreach($op as $combo)
				{
				 foreach ($combo as $brand =>$name)
				  {  php?>
				    <input type="radio" name= "<?php// $brand ?>" value="<?php// $name?>" >
				 <?php }
				}
			echo"</div>";
		/*	echo"<select class='selectgrp' STYLE='font-family : monospace; font-size:20px;'>";
			foreach($op as $combo)
			{	
				$count = 1;
				foreach($combo as $part)
				{
					if($count == 1)
					{
						$count += 1 ;
						echo" <optgroup STYLE='font-size:20px;' class='opt' label='$part'>";
						
					}
					else{
						echo" <option class='opt' value='$part'>".$part."</option>";
					}
				}
			}						
			echo"</select>";*/
	echo"<br>";
			echo"<input type='text' class='inputqty' STYLE='font-size:20px;' placeholder='Qty'>";
			
			echo"<br><input  class='myButton' type='submit' name='submit' value='Update'>";
			echo"</form>";
		?>
	
			
        </section>

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/inventory.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/bootstrap/js/popper.js"></script>
    	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    	<script>
    		$('.js-pscroll').each(function(){
    			var ps = new PerfectScrollbar(this);

    			$(window).on('resize', function(){
    				ps.update();
    			})
    		});


    	</script>
	<script>
		function chk()
		{
			var  product=document.getElementById('product').value;
			var  brand=document.getElementById('brand').value;
			var  quantity=document.getElementById('quantity').value;
			var  dataString='product='+product+'&brand='+brand+'&quantity'+quantity;
			$.ajax({
				type:"post",
				url:  "updateInv.php",
				data:dataString,
				data:{'product':product},
				data:{'brand':brand}.
				data:{'quantity':quantity};
				cache:false,
				success: function(html){
					$('#msg').html(html);
				}
			});
			return false;
		}
	</script>
    <!--===============================================================================================-->
  </body>
</html>
