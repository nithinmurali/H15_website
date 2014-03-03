<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
			<meta charset="utf-8">
		<title>hostel 15</title>
		
		<meta name="description" content="IIT Bombay Hostel 15 ... one of the youngest hostel in the campus">
		<META NAME="KEYWORDS" CONTENT="hostel,h15,hostel 15,h15 iitbombay,h15 iitb">
		<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW">
		
		<link rel="shortcut icon" href="15sicon.ico" />
		<!-- CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/style1.css" type="text/css" media="handheld" />
		<link rel="stylesheet" href="css/social-icons.css" type="text/css" media="screen" />
		
		<!-- ENDS CSS -->	
		
		<!--[if IE]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		
		<!-- JS -->
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/slider.js"></script> 
		<script type="text/javascript" src="js/photo-gallery-randomised.js"></script> 
		<script src="js/slides/source/slides.jquery.js"></script>
		<!-- ENDS JS -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 

		<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->

		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-darkgray/tip-darkgray.css" type="text/css" />
		<script type="text/javascript" src="js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<link rel="stylesheet" href="js/poshytip-1.0/src/tip-skyblue/tip-skyblue.css" type="text/css" />
		
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
	
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400italic' rel='stylesheet' type='text/css'>
			
		<?php
			session_start();
			$counter_name = "counter.txt";
			
			 
			// Check if a text file exists. If not create one and initialize it to zero.
			if (!file_exists($counter_name)) {
			  $f = fopen($counter_name, "w");
			  fwrite($f,"0");
			  fclose($f);
			}
			 
			// Read the current value of file
			$f = fopen($counter_name,"r");
			$counterVal = fread($f, filesize($counter_name));
			fclose($f);
			 
			
			//  increase counter value by one
			if(!isset($_SESSION['hasVisited'])){
			  $_SESSION['hasVisited']="yes";
			  
			  $counterVal++;
			  $f = fopen($counter_name, "w");
			  fwrite($f, $counterVal);
			  fclose($f); 
			}
		?>	 		
	</head>
	
	
	<body  onload="updatenews()">
	
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
		
			<img src="img/hotbar-top.png" id="hotbar" class="hot"  onmouseover="onbar()" onmouseout="outbar()" style="top:550px">
			<ul id="hotnav" class="hot" onmouseover="onmenu()" onmouseout="outmenu()" onclick="outmenu()" style="top:603px">
				<li ><a id="hishowpopup"  href="#">MY IP</a></li>
				<li><a href="http://gymkhana.iitb.ac.in/cms_new/">complaint(CMS)</a></li>
				<li><a href="http://gymkhana.iitb.ac.in/~hostels/guest.html">Guest Stay</a></li>
			</ul>
		
		
		<!-- ends hotbar holder-->	
			
		<!-- wrapper -->
	<div class="wrapper" onresize="position_hotbar()">
		
	
			<a href="index.php"><img  id="logo" src="img/logo.png" alt="H 15"></a>
			
			
			<!-- nav bar holder -->
			<div id="nav-bar-holder">
				<!-- Navigation -->
				<ul id="nav" class="sf-menu">
					<li class="current-menu-item"><a href="index.php">Home</a></li>
					<li><a> Activities</a>
						<ul>
							<li><a href="tech/index.php">Tech</a></li>
							<li><a href="sports/index.php">Sports</a></li>
							<li><a href="cult/index.php">Cult</a></li>
						</ul>
					<li ><a href="council/index.php">Council</a></li>
					<li ><a href="gallery1/index.html">Gallery</a></li>
					</li>	
					<li><a href="feedback/index.html">feedback</a></li>
					
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
	        <div id="content-wrap">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap"">
	        	
	        		
	        		<!-- Front slider -->
	        
					<div id="front-slides">
						<div class="slides_container">
							
							<div class="slide">
									<img src="img/dummies/nature.jpg" alt="pic" width="940" height="360"  />
									
								</div>
							
						
							<div class="slide">
								<img src="img/dummies/goodday.jpg"  alt="pic" width="940" height="360"  />
								
							</div>
							
							<div class="slide">
								<img src="img/dummies/02.jpg" alt="pic" width="940" height="360"  />
								
							</div>
							
						</div>
						<img src="img/slide-dbar.png" id="pag-bar" />
						 

						<div id="front-slides-cover"></div>
						
						<!-- Headline 
						<div id="headline">
					  <h6></h6></div>
						<!-- ENDS Headline -->	
					
					</div>
					<!-- ENDS Front slider -->
					
					
					<!-- News -->
					<div id="reel" >
					  <div id="news_container" class="slides_container" >
					
							<?php
								error_reporting(0);
								$num=0;
								$lines = file_get_contents("updates/gen.txt");
								$line=explode(';',$lines);
								for($x=0,$a=1;isset($line[$x]);)
								  {
								  
								   if(!empty($line[$x]) && !empty($line[$a]) ){
								   echo'
								 <div class="slide-box">
										<div class="box-container">
											<h7><b>'.$line[$x].'</b></h7>
											<div class="box-divider"></div>
											'.$line[$a].'
										</div>
									</div>';
								 }
								 $a+=2;$x+=2;
								 }
								
								
								$num=0;
								$lines = file_get_contents("updates/tech.txt");
								$line=explode(';',$lines);
								for($x=0,$a=1;isset($line[$x]);)
								  {
								  
								   if(!empty($line[$x]) && !empty($line[$a]) ){
								   echo'
								 <div class="slide-box">
										<div class="box-container">
											<h7><b>'.$line[$x].'</b></h7>
											<div class="box-divider"></div>
											'.$line[$a].'
										</div>
									</div>';
								 }
								 $a+=2;$x+=2;
								 }
								
								
								$num=0;
								$lines = file_get_contents("updates/cult.txt");
								$line=explode(';',$lines);
								for($x=0,$a=1;isset($line[$x]);)
								  {
								  
								   if(!empty($line[$x]) && !empty($line[$a])){
								   echo'
								 <div class="slide-box">
										<div class="box-container">
											<h7><b>'.$line[$x].'</b></h7>
											<div class="box-divider"></div>
											'.$line[$a].'
										</div>
									</div>';
								 }
								 $a+=2;$x+=2;
								 }
							
								
								
								$lines = file_get_contents("updates/sports.txt");
								$line=explode(';',$lines);
								for($x=0,$a=1;isset($line[$x]);)
								  {
								  
								   if(!empty($line[$x]) && !empty($line[$a]) ){
								   echo'
								 <div class="slide-box">
										<div class="box-container">
											<h7><b>'.$line[$x].'</b></h7>
											<div class="box-divider"></div>
											'.$line[$a].'
										</div>
									</div>';
								 }
								 $a+=2;$x+=2;
								 }
								
							?>
							
							
					  </div>
						
					</div>
					<!-- ENDS Reel slider -->
                    
					<!-- Mess Menu -->
					
					<div id="mess-menu">
					
						<div id="mess-menu-txt1"  >
						<?php
							$menu= file("mess-menu.messtxt");
							
							$day = date('w');
							$menu_today=$menu[$day];
							$split_menu=strtok($menu_today,"*");
							
							echo $split_menu;
						?>
						</div>
						
						<div id="mess-menu-txt2" >
							<?php
								$menu= file("mess-menu.messtxt");
								$day = date('w');
								$menu_today=$menu[$day];
								$split_menu=strtok($menu_today,"*");
								$split_menu=strtok("*");
								echo $split_menu;
							?>
						
						</div>
					
					</div>
					<!--ENDS Mess menu -->
					
					
					<!-- Featured -->
					<div class="featured-title">
					<!--	<div class="ribbon"><span>WELCOME TO HOSTEL 15 !!!</span> -->
					<img src="img/head-ribbon.png" class="hribbon">
				  </div></div>  
				  
					<pre id = "content" class="writeup" >
                 <img src="img/quote.png" style="position: relative;top: 20px; left:51px;" >   
		
					We are the newest kid on the block and we are unique. We are the only
					co-ed and primarily freshmen hostel.Whatever we lack in experience 
					we make up with our enthusiasm, zest and love for life.There is
					something always happening in and around the hostel.  The gusto 
					and verve that every festival brings; the exuberance with which
					we participate in sports events and the willingness to try something
					new is what characterizes Hostel 15. 
       	             </pre>
                    <div class="clear"></div>
					<!-- ENDS Featured -->
					
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
"> Developed by <a href ="http://www.fb.com/imnithinm"> Nithin Murali </a>... Tech co @ H15A </div>
				 <div id="bottom-left">
					<img src="img/gototop.png" alt="To Top" id="scroll">
				    <span style="font-size: 18px;left: -164px;position: relative;top: -24px;"> No of visitors :<?php echo $counterVal; ?> </span>
                </div>
		  </div>
		</div>
		<!-- ENDS footer -->

	<!--------pop up ip------------>	
		
	<div id="toPopup" style="background-image:url('img/form-bg.gif');">

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


<!-- pop pu notice board ----------------->
	<script type="text/javascript"> $(document).ready(function(){ 
  var gallerySettings2 = { 
    "photoPanelData" : { 
      "height" : 500, 
      "width" : 700, 
      "backgroundImage" : "img/wood-grain-texture.png", 
      "backgroundColor" : "", 
      "backgroundRepeat" : "xy", 
      "backgroundPosition" : "" 
    }, 
    "photoImageDimensions" : { 
      "height" : 105, 
      "width" : 180, 
      "padding" : 2, 
      "bgColor" : "#555555", 
      "borderThickness" : 2, 
      "borderColor" : "#EEEEEE" 
    }, 
    "photoData" : [ 
	  <?php 
			$files = glob('img/posters/gen/*.{jpg,png,gif}', GLOB_BRACE);
			foreach($files as $file) {
	  echo'"'.$file.'|",' ;
       }
	   $files = glob('img/posters/cult/*.{jpg,png,gif}', GLOB_BRACE);
			foreach($files as $file) {
	  echo'"'.$file.'|",' ;
       }
	   $files = glob('img/posters/tech/*.{jpg,png,gif}', GLOB_BRACE);
			foreach($files as $file) {
	  echo'"'.$file.'|",' ;
       }
	   $files = glob('img/posters/sports/*.{jpg,png,gif}', GLOB_BRACE);
			foreach($files as $file) {
	  echo'"'.$file.'|",' ;
       }
	   
	   ?>
    ], 
    "photoDataSeparator" : "|", 
    "borderRadius" : 6, 
    "useSmartPhotoRand" : true, 
    "photoMinSeparateX" : 50, 
    "photoMinSeparateY" : 60 
  }; 

  $('#cards-randomised-2').photoCards(gallerySettings2); 
  $("#popup_content_noticeboard").click( function() { $('#cards-randomised-2').photoCards(gallerySettings2); });

}); 
</script>

	<div id="tonbPopup" style=" background-repeat:repeat;">

       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content_noticeboard"  > <!--your content start-->

				<div class="cards-randomised" id="cards-randomised-2" > 
				  <div class="cards-container"></div> 
				  <div class="card-image-large-overlay"></div> 
				  <table class="card-image-holder"><tr><td> 
					<div class="card-image-large"> 
					  <div class="card-image-large-content"></div> 
					  <div class="card-image-close">X</div> 
					</div> 
				  </td></tr></table> 
				</div>

		</div> 
		<!--your content endbackground-image:url('img/form-bg.gif'); -->
    </div> 
	<!--toPopup end-->
		<div class="nbloader"></div>
		<div id="backgroundnbPopup"></div>

	</body>
</html>