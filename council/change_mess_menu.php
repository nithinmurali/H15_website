
<?php
/*
session_start();
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'council.php';

if(!session_is_registered(myusername)){
header("Location: http://$host/$uri/$extra");
}
*/

/* LDAP authentication */
	$ldap_uid = $_POST['myusername'];
	$ldapId	= $ldap_uid;
	$ldap_pass = $_POST['mypassword'];
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_uid==''||$ldap_pass==''||($ldapId != "ankur.bansal" && $ldapId != "13d100024" && $ldapId != "130110010" && $ldapId != "130040117")){
		header('Refresh: 1; http://gymkhana.iitb.ac.in/~hostel15/council/index.php');
		die("Invalid username/password. Please try again.");
	}
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_uid = $info[0]['dn'];
	$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or die("Wrong Username and/or Password. Please go back and try again.");
	//$status = ldap_unbind ($ds);
	
	//$file= fopen("../mess-menu.txt",'r') or echo " file not found ";
	$line = file("../mess-menu.messtxt");
	$b=array("","","","","","","");
	$l=array("","","","","","","");
	$t=array("","","","","","","");
	$d=array("","","","","","","");
	for($x=0;$x<7;$x++)
	  {
		$piece=explode(">",$line[$x]);

		$b[$x]=trim(strchr($piece[3],"<",true));
		$l[$x]= trim(strchr($piece[7],"<",true));
		$t[$x]=trim(strchr($piece[11],"<",true));
		$d[$x]=trim(strchr($piece[15],"<",true));
		
	  }
	
	
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>H 15</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/social-icons.css" type="text/css" media="screen" />
		<!-- ENDS CSS -->	
		
		<!--[if IE]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- ENDS JS -->
		
		<!-- JS -->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/date-news.js"></script>
		<script type="text/javascript" src="../js/custom.js"></script>
		<script type="text/javascript" src="../js/slider.js"></script>
		<script src="../js/slides/source/slides.min.jquery.js"></script>
		<script src="../js/quicksand.js"></script>
		<script src="../js/tabcontent.js" type="text/javascript"></script>
				
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
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- prettyPhoto -->
		<script type="text/javascript" src="../js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="../js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>

	</head>
	<body onload="fademenu()">
	
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
		
		<!-- wrapper -->
		<div class="wrapper" >
		
			<a href="../index.php"><img  id="logo" src="../img/logo.png" title="logout" ></a>
			
			
			<!-- nav bar holder -->
			<div id="nav-bar-holder">
				<!-- Navigation 
				<ul id="nav" class="sf-menu">
					<li ><a href="../index.php">Home</a></li>
					<li><a> Activities</a>
						<ul>
							<li><a href="../tech/index.php">Tech</a></li>
							<li><a href="../sports/index.php">Sports</a></li>
							<li><a href="../cult/index.php">Cult</a></li>
						</ul>
					<li class="current-menu-item"><a href="index.php">Council</a></li>
					<li><a href="../gallery1/index.html">Gallery</a></li>

					</li>	
					<li><a href="../feedback/index.html">feedback</a></li>
					
				</ul>
				<!-- ENDS Navigation -->
				
				<!-- Social 
				<ul class="social">
					<li><a href="http://www.facebook.com" class="poshytip  facebook" title="Become a fan"></a></li>
					<li><a href="http://www.twitter.com" class="poshytip  twitter" title="Follow my tweets"></a></li>
					<li><a href="http://www.dribbble.com" class="poshytip  dribbble" title="Working on..."></a></li>
				</ul>
				<!-- ENDS Social -->
			</div>
			<!-- ENDS nav bar holder -->
				
			<!-- content wrap -->	    	
	        <div id="content-wrap" style="height:880px;">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap" >
	        	
					<div class="page-title" style="position: relative;top: 38px;"><strong style="position: relative;left: 320px; bottom: 30px;font-size: 30px;color: rgb(41, 37, 33);text-shadow: 5px 5px 5px rgb(197, 185, 185);">Change Mess Menu</strong></div>
						
					<div style=" margin: 0 auto; padding: 120px 0 40px;">
						<ul class="tabs">
							<li><a href="#view1">Sunday</a></li>
							<li><a href="#view2">Monday</a></li>
							<li><a href="#view3">Tuesday</a></li>
							<li><a href="#view4">Wednesday</a></li>
							<li><a href="#view5">Thursday</a></li>
							<li><a href="#view6">Friday</a></li>
							<li><a href="#view7">Saturday</a></li>
						
						</ul>
						<div class="tabcontents">
							
						<form id="form_777814" class="appnitro"  method="post" action="save_menu.php">	
							
							<?php
							for($x=0;$x<7;$x++)
							{ 
								$y=$x+1;
								
								echo'
								<div id="view'.$y.'">
									<u'.$y.' >
										<li id="li_1" >
										<label class="description" for="element_D'.$y.'_1">Breakfast </label>
										<div>
											<input id="element_D'.$y.'_1" name="element_D'.$y.'_1" class="element text large" type="text" maxlength="255" value="'.$b[$x].'" style="width:500px;" /> 
										</div> 
										</li>		<li id="li_2" >
										<label class="description" for="element_2">Lunch </label>
										<div>
											<input id="element_D'.$y.'_2" name="element_D'.$y.'_2" class="element text large" type="text" maxlength="255" value="'.$l[$x].'" style="width:500px;"/> 
										</div> 
										</li>		<li id="li_3" >
										<label class="description" for="element_D'.$y.'_3">Tiffin </label>
										<div>
											<input id="element_D'.$y.'_3" name="element_D'.$y.'_3" class="element text medium" type="text" maxlength="255" value="'.$t[$x].'" style="width:500px;"/> 
										</div> 
										</li>		<li id="li_4" >
										<label class="description" for="element_D'.$y.'_4">Dinner </label>
										<div>
											<input id="element_D'.$y.'_4" name="element_D'.$y.'_4" class="element text large" type="text" maxlength="255" value="'.$d[$x].'" style="width:500px;"/> 
										</div> 
										
									</u'.$y.'>
								</div>' ;
							} 
							?>
						
							<input type="submit" name="Submit" value="Save"  id="save_menu" style="width:64px; height:28px; " >
							
						</form>
						</div>
					
					</div>
					
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
				                  			
                </div>
		  </div>
		</div>
		<!-- ENDS footer -->


		
	</body>
</html>

