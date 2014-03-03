
jQuery(document).ready(function($) { 
  
  
	//##########################################
	// Nav menu
	//##########################################
	
	$("ul.sf-menu").superfish({ 
        animation: {height:'show'},   // slide-down effect without fade-in 
        delay:     400 ,              // 1.2 second delay on mouseout 
        autoArrows:  false,
        speed:         'normal'
    });
    
    //##########################################
	// Header nav
	//##########################################
	
    $(document).mousemove(function(e){
    	if((e.pageY) < 200){
			$("#headernav").fadeIn();
		}else{
			$("#headernav").fadeOut();
		}
   	}); 
	
	
	//##########################################
	// Tool tips
	//##########################################
	
    $('.poshytip').poshytip({
    	className: 'tip-twitter',
		showTimeout: 1,
		alignTo: 'target',
		alignX: 'center',
		offsetY: 5,
		allowTipHover: false
    });
    
    $('.form-poshytip').poshytip({
		className: 'tip-yellowsimple',
		showOn: 'focus',
		alignTo: 'target',
		alignX: 'right',
		alignY: 'center',
		offsetX: 5
	});
	
	
	$('#reel').poshytip({
		className: 'tip-darkgray',
		content:"Click for NoticeBoard",
		showOn: 'hover',
		alignTo: 'target',
		alignX: 'right',
		alignY: 'center',
		offsetX: 5
		
	});
	
	
	//##########################################
	// Tweet feed
	//##########################################
	
	$("#tweets").tweet({
        count: 3,
        username: ""
    });


	//##########################################
	// Front slides
	//##########################################

	$('#front-slides').slides({
		preload: true,
		generateNextPrev: false,
		slideSpeed: 600
		
	});
	
	
	//#######################################
	//		Notice
	//#####################################
	
	$('#notice-board').slides({
		preload: true,
		generateNextPrev: false,
		slideSpeed: 600,
		
	});
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Scroll to top
	/*-----------------------------------------------------------------------------------*/
	
	
	$('#scroll').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
	
	
	//------------------------------------------------
	//		 hotbar move
	//------------------------------------------------
	
	$(document).scroll(function(){
		
		var hotpos = 450 + $(document).scrollTop();
		
		if(hotpos > ($("#content-wrap").height()-50)){
			hotpos = ($("#content-wrap").height()-50);
		}
		
		if($(".current-menu-item").text() == "Home" || $(".current-menu-item").text() == " Activities"){
			if(hotpos < 553){
				hotpos = 553;
			}
		}
		
		$("#hotbar").css("top",hotpos); 
		$("#hotnav").css("top",hotpos + 53); 
	});
	
			
	//##########################################
	// Comments switcher
	//##########################################

	var $comments_switcher = $(".show-comments");
	var $comments_holder = $(".comments-switcher");
	
	$comments_switcher.click(function(){
		if($comments_holder.css("display") == "block"){
			$comments_switcher.children("span").text("click to show");		
		}else{
			$comments_switcher.children("span").text("click to hide");
		}
		$comments_holder.slideToggle();
	});

	//###########################################
	//            SHow IP
	//############################################

	$("#hishowpopup").click(function() {
			
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(); // function show popup
			}, 600); // .5 second
	return false;
	});
	
	/* event for close the popup */
	$("div.close").hover(
					function() {
						$('span.ecs_tooltip').show();
					},
					function () {
    					$('span.ecs_tooltip').hide();
  					}
				);

	$("div.close").click(function() {
		disablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			disablePopup();  // function close pop up
		}
	});

        $("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});
	
	
	$('#find-ip').click(function() {
			var room = document.forms["ip-form"]["roomtxt"].value;
			var numericExpression = /^[0-9]+$/;
		 if( !(document.forms["ip-form"]["roomtxt"].value.match(numericExpression)) || document.forms["ip-form"]["roomtxt"].value == ""){
					document.forms["ip-form"]["roomtxt"].style.background = 'Yellow';
					alert("please enter a valid room no");
					document.forms["ip-form"]["roomtxt"].focus();
		 }else
		 { 
			floor = room.charAt(0);
			var wing = document.forms["ip-form"]["wingo"].selectedIndex;
			wing= wing+1;
			var ip="Your Ip Is :	 10.15."+ wing.toString()+floor.toString() +".0" + (room.charAt(1)).toString()+room.charAt(2).toString()+",10.15."+ wing.toString()+floor.toString() +".1" + (room.charAt(1)).toString()+room.charAt(2).toString();
			var gateway="Your Default gateway Is: 10.15."+ wing.toString()+floor.toString() +".250";
			document.getElementById('ip').innerHTML = ip;
			document.getElementById('subnet').innerHTML = 'Your Subnet Is : 255.255.255.0 ';
			document.getElementById('gateway').innerHTML = gateway;
			document.getElementById('dns').innerHTML = 'Your DNS Is :	10.200.11.1, 10.200.1.11';

		 }
	});	

	 /************** start: functions. **************/
	
	function loading() {
		$("div.loader").show();
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');
	}

	var popupStatus = 0; // set value

	function loadPopup() {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
			
		}
	}

	function disablePopup() {
		if(popupStatus == 1) { // if value is 1, close popup
			$("#toPopup").fadeOut("normal");
			$("#backgroundPopup").fadeOut("normal");
			popupStatus = 0;  // and set value to 0
		}
	}
	/************** end: functions. **************/

	//###########################################
	//            SHow NB
	//############################################

	$("#reel").click(function() {
			
			nbloading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				nbloadPopup(); // function show popup
			}, 500); // .5 second
	return false;
	});
	
	
	$("div.close").hover(
					function() {
						$('span.ecs_tooltip').show();
					},
					function () {
    					$('span.ecs_tooltip').hide();
  					}
				);

	$("div.close").click(function() {
		nbdisablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'Ecs' in the keyboard
			nbdisablePopup();  // function close pop up
		}
	});

        $("div#backgroundnbPopup").click(function() {
		nbdisablePopup();  // function close pop up
	});
	
	 /************** start: functions. **************/
	
	function nbloading() {
		$("div.nbloader").show();
	}
	function nbcloseloading() {
		$("div.nbloader").fadeOut('normal');
	}

	var nbpopupStatus = 0; // set value

	function nbloadPopup() {
		if(nbpopupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#tonbPopup").fadeIn(0500); // fadein popup div
			$("#backgroundnbPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundnbPopup").fadeIn(0001);
			nbpopupStatus = 1; // and set value to 1
			
		}
	}

	function nbdisablePopup() {
		if(nbpopupStatus == 1) { // if value is 1, close popup
			$("#tonbPopup").fadeOut("normal");
			$("#backgroundnbPopup").fadeOut("normal");
			nbpopupStatus = 0;  // and set value to 0
		}
	}
	/************** end: functions. **************/

});

///////////////////////////////////////////////////////

	function scrollto(val)
	{
		setTimeout(function(){$("html, body").animate({ scrollTop: val }, 900);},500);
		
	}

	
	function check_member(){
		
		alert(document.getElementById("form1").action);
  
	$("#login-form").fadeToggle();
	}
	
	
	
	function fadeform(){
			$("#login-form").fadeToggle();
			
		}

	
	function defaultInput(target){
		if((target).value == 'Search...'){(target).value=''}
	}

	function clearInput(target){
		if((target).value == ''){(target).value='Search...'}
	}
	
	function showdelete(){
	alert("okk");
	document.getElementById('upload-div').style.height="400px";
	document.getElementById('content-wrap').style.height="1200px";
	
	}
	
	

//////////////////////////////////////////////////

///////////////////////////hot menu///////////////
var barstate = 0;
var menustate =0;

function onbar(){

	var element = document.getElementById('hotbar');

	var menu = document.getElementById("hotnav");
	var bar = document.getElementById("hotbar");
	
		bar.style.animation="hotbarslide 1.5s 1";
		bar.style.webkitAnimation="hotbarslide 1.5s 1";
		
		element.addEventListener('webkitAnimationEnd', function(){
		this.style.webkitAnimationName = '';
		if(barstate==1 || menustate==1)
		{
		menu.style.visibility="visible";
		
		}
		
	}, false);
	
	element.addEventListener('animationend', function(){
		this.style.animationName = '';
		if(barstate==1 || menustate==1)
		{
		menu.style.visibility="visible";
		
		}
		
	}, false);
	
	
	bar.style.left="20px";
	barstate=1;
	
}

function onmenu(){
	var menu = document.getElementById("hotnav");
	var bar = document.getElementById("hotbar");
	bar.style.left="20px";
	menu.style.visibility="visible";
	
	menustate=1;
	
}

function outbar()
{	
	barstate=0;
	if(menustate == 0)
	{
	var menu = document.getElementById("hotnav");
	var bar = document.getElementById("hotbar");
	bar.style.left="120px";
	menu.style.visibility="hidden";
	}
}

function outmenu()
{	
	menustate=0;
	if(barstate == 0)
	{
	var menu = document.getElementById("hotnav");
	var bar = document.getElementById("hotbar");
	bar.style.left="120px";
	menu.style.visibility="hidden";
	}
}

////////////////////////////////////news updates//////////////
	function updatenews()
		{   var x=document.getElementsByClassName("slide-box");
			var max = x.length-1;
			var i=0;
			var next=1;
			$(".slide-box").hide();
			$(x[0]).show();
			
			if(max!=0){
			var timer =	setInterval(function(){
					$(x[i]).hide(1,function(){
					$(x[next]).show("slow",function(){
					next=next+1;i=i+1;
					if(i==(max+1)){i=0;}
					if(next==(max+1)){next=0;}
					});
					});
					
				},9000);
				//var window.timer = timer;
			}	
		}
		
		$('#reel').hover(function(ev){
			clearInterval(window.timer); alert(' ');
		}, function(ev){
			updatenews();
		});
		
//////////////////////////////////////////////////////////////////////////////////////////
  //                 position hotbar
  ////////////////////////////////////////////////////////////
  /*
  function position_hotbar(){
	var menu = document.getElementById("hotnav");
	var bar = document.getElementById("hotbar");
	var wrapper=document.getElementById("wrapper");
	menu.style.css("left")="";
	menu.style.css("left")="";
  }
  
  $(window).resize(function(){
  

  
});*/
		