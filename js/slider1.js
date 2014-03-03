

/************************************************* 
CONFIGURATION
*************************************************/ 

// Autoplay
var autoplay = true;


// Speed of the automatic slideshow
var slideshowSpeed = 6000;



// Variable to store the img/slider we need to set as background
var photos = [ 
	{"image" : "../img/bg/11.jpg", "color" : "#000000" },
	{"image" : "../img/bg/12.jpg", "color" : "#000000" },
	{"image" : "../img/bg/13.jpg", "color" : "#000000" },
	{ "image" : "../img/bg/15.jpg", "color" : "#000000" },
	{ "image" : "../img/bg/16.jpg", "color" : "#000000" },
];

/****************************************************/














// IMPORTANT: Don't mess below this line //


// Jquery with no conflict
jQuery(document).ready(function($) { 
		
	// Backwards navigation
	$("#back").click(function() {
		stopAnimation();
		navigate("back");
		autoplay = false;
	});
	
	// Forward navigation
	$("#next").click(function() {
		stopAnimation();
		navigate("next");
		autoplay = false;
	});
	
	var interval;
	$("#control").toggle(function(){
		stopAnimation();
	}, function() {
		// Change the background image to "pause"
		$(this).css({ "background-image" : "url(img/slider/btn_pause.png)" });
		
		// Show the next image
		navigate("next");
		
		// Start playing the animation
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	});
	
	
	var activeContainer = 1;	
	var currentImg = 0;
	var animating = false;
	var navigate = function(direction) {
		// Check if no animation is running. If it is, prevent the action
		if(animating) {
			return;
		}
		
		// Check which current image we need to show
		if(direction == "next") {
			currentImg++;
			if(currentImg == photos.length + 1) {
				currentImg = 1;
			}
		} else {
			currentImg--;
			if(currentImg == 0) {
				currentImg = photos.length;
			}
		}
		
		// Check which container we need to use
		var currentContainer = activeContainer;
		if(activeContainer == 1) {
			activeContainer = 2;
		} else {
			activeContainer = 1;
		}
		
		showImage(photos[currentImg - 1], currentContainer, activeContainer);
		
	};
	
	var currentZindex = -1;
	var showImage = function(photoObject, currentContainer, activeContainer) {
		animating = true;
		
		// Make sure the new container is always on the background
		currentZindex--;
		
		// Set the background image of the new active container
		$("#headerimg" + activeContainer).css({
			"background-image" : "url(" + photoObject.image + ")",
			"display" : "block",
			"z-index" : currentZindex
		});
		
		$("body").css({
			"background-color" : photoObject.color
		});
		
		
		// Fade out the current container
		// and display the header text when animation is complete
		$("#headerimg" + currentContainer).fadeOut(function() {
			setTimeout(function() {
				animating = false;
			}, 500);
		});
	};
	
	var stopAnimation = function() {
		// Change the background image to "play"
		$("#control").css({ "background-image" : "url(img/slider/btn_play.png)" });
		
		// Clear the interval
		clearInterval(interval);
	};
	
	// We should statically set the first image
	navigate("next");
	
	// Start playing the animation
	if(autoplay){
		interval = setInterval(function() {
			navigate("next");
		}, slideshowSpeed);
	}
	
});