
<html>
	<head>
		<meta charset="utf-8">
		<title>H 15</title>
		<link rel="shortcut icon" href="../15sicon.ico" />
		<!-- CSS -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/social-icons.css" type="text/css" media="screen" />
		<link href="../css/hover-min.css" rel="stylesheet" media="all">
		<!-- ENDS CSS -->	
		
		<!--[if IE]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- ENDS JS -->
		
		<!-- JS -->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/custom.js"></script>
		<script type="text/javascript" src="../js/slider1.js"></script>
		<script src="../js/slides/source/slides.min.jquery.js"></script>
		<script src="../js/quicksand.js"></script>
		<script type="text/javascript" src="js/jquery.hcaptions.js"></script>
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="../css/superfish.css" /> 

		<script type="text/javascript" src="../js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="../js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="../js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->

		<!-- poshytip -->
		<link rel="stylesheet" href="../js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="../js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="../js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="../css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
			
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
		
			<?php
		include('../counter.php');
		?>	 		

	</head>
	<body onload="fadeform()">
	
		<!-- Dynamic Background -->
		<div id="headerimgs">
			<div id="headerimg1" class="headerimg"></div>
			<div id="headerimg2" class="headerimg"></div>
		</div>
		<!-- ENDS Dynamic Background -->
		
		<!-- background nav -->
		<div id="headernav">
			<div id="back" class="btn"></div>
			<div id="next" class="btn"></div>
		</div>
		<!-- ENDS background nav -->
		
		<div id="top-gap"></div>
		
		<!--- hotbar holder--->
		<img src="../img/hotbar-top.png" id="hotbar" class="hot"  onmouseover="onbar()" onmouseout="outbar()" style="top:550px">
			<ul id="hotnav" class="hot" onmouseover="onmenu()" onmouseout="outmenu()" onclick="outmenu()" style="top:603px">
				<li ><a id="hishowpopup"  href="#">MY IP</a></li>
				<li><a href="http://gymkhana.iitb.ac.in/cms_new/">complaint(CMS)</a></li>
				<li><a href="http://gymkhana.iitb.ac.in/~hostels/guest.html">Guest Stay</a></li>
			</ul>
		
		<!-- ends hotbar holder-->	
			
		<!-- wrapper -->
		<div class="wrapper" >
		
			<a href="../index.php"><img  id="logo" src="../img/logo.png" alt="H15"></a>
			
			
			<!-- nav bar holder -->
			<div id="nav-bar-holder">
				<!-- Navigation -->
				<ul id="nav" class="sf-menu">
					<li ><a href="../index.php">Home</a></li>
					<li><a> Activities</a>
						<ul>
							<li><a href="../tech/index.php">Tech</a></li>
							<li><a href="../sports/index.php">Sports</a></li>
							<li><a href="../cult/index.php">Cult</a></li>
						</ul>
					<li class="current-menu-item"><a href="../council/index.php">Council</a></li>
					<li ><a href="../gallery1/index.html">Gallery</a></li>
					</li>	
					<li><a href="../feedback/index.html">feedback</a></li>
					
				</ul>
				<!-- ENDS Navigation -->
				
				
				<!-- Social -->
				<ul class="social">
					<li><a href="https://www.facebook.com/h15iitb" class="poshytip  facebook" title="Become a fan"></a></li>
					<li><a href="javascript: alert('will we available soon ...')" class="poshytip  twitter" title="Follow my tweets"></a></li>
					<li><a href="javascript: alert('will we available soon ...')" class="poshytip  dribbble" title="Working on..."></a></li>
				</ul>
				<!-- ENDS Social -->
			</div>
			<!-- ENDS nav bar holder -->
				
			<!-- content wrap -->	    	
	        <div id="content-wrap" style="height:2200px;">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap" >
	        	
					<div class="page-title"><img src="../img/ribbon-red.png" style=" position:relative; left:210px;" ></div>
					<a href="javascript:void(0);" onclick="fadeform()" ><img class="poshytip  facebook" title="previlaged members Login to update.." id="login-img" src="../img/login.png" style=" margin-right:0; right:27px; position:absolute; width:86px; margin-top:-21px;" ></a>
					
					<table id="login-form"  width="300"  border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" style="background: url(../img/signin-form.png) no-repeat; height:170px">
					<tr>
						<form id="form1" method="post" onsubmit="check()"  accept-charset="UTF-8" action="change_mess_menu.php" >
						<td>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
								
								<tr style="position:absolute; top:33px; left:36px;">
									
									
									<td width="294"><input  middle name="myusername" type="text" id="myusername" style="outline:none;"  placeholder="  Ldap" autocomplete="off" ></td>
								</tr>
								<tr style="position:absolute; top:71px; left:36px;">

									<td><input  name="mypassword" type="password" id="mypassword" style="outline:none; "  placeholder="  Password" autocomplete="off "></td>
								</tr>
								<tr style="position:absolute; top:124px; left:140px;">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><input type="submit" name="Submit" value="Login"  id="submit" style="width:64px; height:28px; " ></td>
								</tr>
							</table>
						</td>
						</form>
					</tr>
					</table>
					<script>
						function check()
						{   
							x=document.forms["form1"]["myusername"].value;
							
							if( x != "ankur.bansal" && x != "13d100024" && x != "130110010" && x!= "130040117")
							{
							
							document.getElementById("form1").action="change_news.php";
							
							}
						}
						
					
					</script>
					
					<!-- side content -->
					<div id="gallery-holder1">
					

						<!-- Thumbnails -->
						<div id="warden-img" class="hover-shadow">
						<p class="council-disc" style="left:100px;">Warden</p>
							<img  class="council-img" src="../img/council/warden.jpg"  alt="warden" style='width:250px;' >
						<p class="council-disc-name" style="width:250px;" >G Naresh Patwari</p>
						</div>
						
						<div class="council-img-grp" onload="arrangecouncil()">
						
							<?php
								$type=array("Gsec","Tech-Co","Cult-Co","Sports-Co","Mess-secy");
								$hstl=array("H15A","H15B","H15C");
								$name=array(
									array("sambav jain","Sahil Khanna","Parul Purwar"),
									array("Nithin Murali","Chandra maloo","Rutuja Borada"),
									array("Siddharth Goyal","sameer chourasia","Anamika Bhardwaj"),
									array("Anil Raj","Gaurav Zakhmi","Shilpi Bhargava"),
									array("","",""),
									array("","Shivam Varshney","")
								);
								$top=580;
								$left=array(34,355,678);
								for($x=0;$x<4;$x++)
								{
									for($y=0;$y<3;$y++)
									{	
										echo" <div  class='$type[$x]-img hover-shadow' id='$type[$x]-img$y' style='position:absolute; top:$top; width:220px; left:$left[$y];'>
												  <p class='council-disc' >$type[$x] $hstl[$y]</p>
												  <div class='box'>
												  <img  class='council-img ' class='hcaption' src='../img/council/".$name[$x][$y] .".jpg'  alt='$type[$x] $hstl[$y]' style='width:226px;height:230px;' >
												  <span class='council-disc-name'> <p>" .$name[$x][$y] ."</p> </span>
												  </div>
											  </div>";
									}
									$top+=390;
								}
							?>
							
						</div>
					
						<div class="clear"></div>	
			            <!-- ENDS Thumbnails -->
						
					</div>
					<!-- ENDS side content -->
					
					
					<div class="clear"></div>
	        	
	        	</div>
	        	<!-- ENDS Page wrap -->
	        	
	        </div>
	        <!-- ENDS content wrap -->
	        
        </div>
		<!-- ENDS Wrapper -->
		
		<!-- FOOTER -->
		<div id="footer-bottom">
			<div class="bottom-wrapper">
			  
			  <div id="bottom-right" style="
    position: relative;
    right: -67px;
">
				 Developed by <a href ="http://www.fb.com/imnithinm"> Nithin Murali </a>
				 ... Tech co @ H15A </div>
				<div id="bottom-left">
					<img src="../img/gototop.png" alt="To Top" id="scroll">
					<span style="font-size: 18px;left: -164px;position: relative;top: -24px;"> No of visitors :<?php echo $counterVal; ?> </span>
               
				 </div>
		  </div>
		</div>
		<!-- ENDS footer -->

		<!--------pop up ip------------>	
		
	<div id="toPopup" style="background-image:url('../img/form-bg.gif');">

        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
            
			<p algin="center"> <b>Find Your Room's allocated IP </b></p>
            
			
			<form id="ip-form" style="position:relative;left:19px;">
			<ul>
				<li>
					<label for="room">Your Room NO:  </label>
					<input type="text" size="10" name="roomtxt" autofocus />
				</li>
				
				<li>
					<label for="wing">Your Wing:   </label>
					<select name="wingo">
						<option>A</option>
						<option>B</option>
						<option>C</option>
					</select>
				</li>
				<li>
					<label id="ip" >Your allocatted ip is :</label>
				</li>
				<li>
					<label id="subnet">Your Subnet Is : </label>
				</li>
				<li>
					<label id="gateway">your allocated gateway is:</label>
				</li>
				<li>
					<label id="dns">Your DNS Is :	</label>
				</li>

			</form>
			
		</div> <!--your content end-->
				<button  id="find-ip" style="position:relative;left:115px;height:27px;width:93px;bottom:5px;" >Find IP</button>
    </div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>

<!-- ends popup ip--->


		
	</body>
</html>