
<?php
	error_reporting(0);
/* LDAP authentication */
	$ldap_uid = $_POST['myusername'];
	$ldapId	= $ldap_uid;
	$ldap_pass = $_POST['mypassword'];
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	
   	  $allowed = false;
	 $file=fopen("ldaps.txt","r");
	 while( ! feof($file)){
		 $pos=fgets($file);
		 $ldap=fgets($file);
		 $pos=trim($pos);
		 $ldap=trim($ldap);
		 if($ldapId==$ldap){
			$allowed=true;
			break;
		 }
	}
	fclose($file);
	
	if($allowed!= true){
		header('Refresh: 2; http://gymkhana.iitb.ac.in/~hostel15/council/index.php?auth=invalid');
		die("Invalid username/password or you dont have enough previlages. Please try again.");
	} 
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_uid)");
	$info = ldap_get_entries($ds, $sr);
	$ldap_uid = $info[0]['dn'];
	$do_bind = @ldap_bind($ds,$ldap_uid,$ldap_pass) or header('http://gymkhana.iitb.ac.in/~hostel15/council/index.php?auth=wrong');
	
	$status = ldap_unbind ($ds);
	//$_POST['myusername'] ='';
	//$_POST['mypassword']='';
	
	$pos = trim($pos);
	
	switch ($pos)
	{
	case "gsec":
		$fileused="../updates/gen.txt";
		$cat='gen';
		$lines = file_get_contents("../updates/gen.txt");
		break;
	case "techco":
		$fileused="../updates/tech.txt";
		$cat='tech';
		$lines = file_get_contents("../updates/tech.txt");
		break;
	case "cultco":
		$fileused="../updates/cult.txt";
		$cat='cult';
		$lines = file_get_contents("../updates/cult.txt");
		break;
	case "sportsco":
		$fileused="../updates/sports.txt";
		$cat='sports';
		$lines = file_get_contents("../updates/sports.txt");
		break;
	default:
		echo "internal file error";
		header('Refresh: 1; http://gymkhana.iitb.ac.in/~hostel15/council/index.php?');
	}
	
	$line=explode(';',$lines);
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>H 15</title>
		<link rel="shortcut icon" href="../15sicon.ico" />
		<!-----Meta----->
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
				
		<!-- CSS -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/social-icons.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/styleform.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/form.css" type="text/css" media="screen" />
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
		<script src="../js/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript" charset="utf-8">
			  $(function(){
				$("input:checkbox, input:radio, input:file, select").uniform();
			  });
			</script>
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
	        <div id="content-wrap" style="min-height:1150px;padding:1em;height:auto;">
	        	
	        	<!-- Page wrap -->
	        	<div id="page-wrap" >
	        	
					<div class="page-title" style="position: relative;top: 38px;"><strong style="position: relative;left: 320px; bottom: 30px;font-size: 30px;color: rgb(41, 37, 33);text-shadow: 5px 5px 5px rgb(197, 185, 185);">Change Updates</strong></div>
						
					<div style="top: 23px;position: relative;font-size: 22;color: rgb(99, 129, 118);"> Welcome <?php echo $pos ?>,</div>
					
						<div style=" margin: 0 auto; padding: 120px 0 40px;">
						<ul class="tabs" style="list-style:none;">
							<li><a href="#view1">1</a></li>
							<li><a href="#view2">2</a></li>
							<li><a href="#view3">3</a></li>
							<li><a href="#view4">4</a></li>
							<li><a href="#view5">5</a></li>
							<li><a href="#view6">6</a></li>
							<li><a href="#view7">7</a></li>
						
						</ul>
						<div class="tabcontents">
							
							
						<form id="form_777814" class="appnitro"  method="post" action="<?php echo "save_news.php?fileused=".$fileused ?>">	
							<?php
							error_reporting(0);
							
							for($x=0,$a=0;$x<7;$x++,$a=$a+2)
							{ 
								$y=$x+1;
								$b=$a+1;
								trim($line[$a]);
								trim($line[$b]);
								
								echo'
								<div id="view'.$y.'">
									<u'.$y.' style="list-style: none;">
										<li id="li_1" >
										<label class="description" for="element_D'.$y.'_1">Heading</label>
										<div>
											<input id="element_D'.$y.'_1" name="element_D'.$y.'_1" class="element text large" type="text" maxlength="255" value="'.$line[$a].'"  /> 
										</div> 
										</li>		<li id="li_2" >
										<label class="description" for="element_2">Details </label>
										<div>
											<textarea id="element_D'.$y.'_2" name="element_D'.$y.'_2" rows="4" cols="50">'.$line[$b].'</textarea>
										</div>
										
									</u'.$y.'>
								</div>' ;
								
							} 
							?>
							<button type="submit" name="Submit" class="action"  id="save_menu" " > save </button>
	
					</form>
						</div>
		<!----poster------------------------------------------->			
					<div id="upload-div" style="
							background-color: #fff;
							border: 2px #000;
							min-height: 540px;
							top: 21px;
							position: relative;
							transition: height 2s;
							-webkit-transition: height 2s; /* Safari */
							overflow:hidden;
							padding:1em;
							height:auto;
						">
						<h2 style="
							position: relative;
							left: 286px;
							top: 10px;
							font-size: 26;
							font-weight: 400;
						"> Add a new Poster to the Notice Board</h2>
			
						<script type="text/javascript" src="../js/form-validation.js"></script>
						<script>
							function checkfile1()
							{
								
								if( document.forms["upform"]["fname"].value!='' || document.forms["upform"]["file"].value!=''){
									return true;
								}
								else
								{
									alert('Please enter valid file');
									return false;
								}
							}
							/*
							$("#upform #submit").click(function() {
							
								var cat = $("#cat").val();
								var fnmae = $("#fnmae").val();
								var file = $("#file").val();
								var dataString = 'cat='+ cat
												+ '&fanme=' + fname        
												+ '&file=' + file;
							
							$.post( "upload_file.php",dataString,function( data ) {

							 alert(data);
							});
							
							}
							*/
						</script>
					
					<form name="upform" action="upload_file.php" method="post" onsubmit="return checkfile1();" enctype="multipart/form-data" style="
							top: 40PX;
							position: relative;
						" _lpchecked="1">
							
							<input type="hidden" name ='cat' value=<?php echo $cat; ?>>
							
											<label for="file" style="
							font-size: 19;
							left: 188px;
							top: 32;
							position: relative;
						">Filename:</label>
							<input type="text" name="fname" style="
							position: relative;
							top: 31px;
							right: -105px;
						">
						
						
									<div class="uploader" id="uniform-file" style="
							left: -164px;
							"><div class="uploader" id="uniform-file"><input type="file" name="file" id="file" style="opacity: 0;"><span class="filename">No file selected</span><span class="action">Choose File</span></div><span class="filename">No file selected</span><span class="action">Choose File</span></div><br>
												<button type="submit" name="submit" value="Submit" style="
							position: relative;
							right: -201px;
							top: 1px;
						">  Add  </button>
							
							
							</form>	
							
						
							
					<form action="delete.php">		
						<input type="hidden" name ='cat' value=<?php echo $cat; ?>>
						<ul style="
								position: relative;
								top: 65;
								left: -48px;
								padding: 5px;
								-webkit-padding-start: 276px;
								width: 400px;
								height: 300px;
								overflow-y: scroll;
							">			
														 <?php 
								$files = glob('../img/posters/'.$cat.'/*.{jpg,png,gif}', GLOB_BRACE);
								$x=0;
								foreach($files as $file) {
								$f1 = explode("/",$file);
								
								echo '
								<li style="padding: 9px;">
								<label style="width:auto;" ><input type="checkbox" name="delete_file[]" value="'.$f1[4].'" /> ' .$f1[4]. '</label>
								</li>';
								$x=$x+1;
								}
						   ?>
						</ul>
						
						<button type="submit" name="submit" value="Submit" style="
																
							position: absolute;
							left: 169px;
							top: 187px;
						">  Delete...  </button>
						</div>
					</form>
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
			  
			  <div id="bottom-right">
				  Developed by <a href ="http://www.fb.com/imnithinm"> Nithin Murali </a> </div>
				<div id="bottom-left">
					<img src="../img/gototop.png" alt="To Top" id="scroll">
				                  			
                </div>
		  </div>
		</div>
		<!-- ENDS footer -->


		
	</body>
</html>

