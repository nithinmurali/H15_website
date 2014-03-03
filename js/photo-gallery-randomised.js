(function( $ ){
	// Define the "fade_in" function
	$.fn.photoCards = function(gallerySettings) {
  
		/* -------------------------------------------------
		// Global variables
		------------------------------------------------- */
    	var gPhotoData, gMainLoopCounter, gMainLoopMax;
    	var gPanelBgRpt, gPanelBgClr, gPanelBgPos, gPanelBgImg, gPanelWidth, gPanelHeight;
    	var gPhotoWidth, gPhotoHeight, gPhotoPadding, gPhotoBgClr, gPhotoBrdWidth, gPhotoBrdClr;
    	var gDataSeparator, gBorderRadius, gSmartRandomisation, gMinSeparateX, gMinSeparateY;
    	var gPhotoTotalWidth, gPhotoTotalHeight;

		/* -------------------------------------------------
		// Edit here your carousel or photo gallery settings
		------------------------------------------------- */
		// Plugin settings (comma separated)
		var settings = {
            "photoPanelData" : {
                "height" : 400,
                "width"  : 800,
                "backgroundImage" : "",
                "backgroundColor" : "#0E1647",
                "backgroundRepeat" : "",
                "backgroundPosition" : ""
            },
            "photoImageDimensions" : {
              "height" : 146,
              "width" : 250,
              "padding" : 3,
              "bgColor" : "#555555",
              "borderThickness" : 3,
              "borderColor" : "#EEEEEE"
            },
            "photoDataSeparator" : "|",
            "borderRadius" : 6,
            "useSmartPhotoRand" : true,
            "photoMinSeparateX" : 100,
            "photoMinSeparateY" : 100
		},
		
		_init = function (obj, options) {
		    // Define globals
		    defineGlobals(options);
		    
		    // Clear photos
		    obj.find(".cards-container").html("");
		    
			// Set styling
			setPanelStyles(obj, options);
			addPhotos(obj, options);
		},
		
		defineGlobals = function (options) {
		    gPhotoData = options.photoData;
		    gMainLoopCounter = 0;
		    gMainLoopMax = 200;
		    
		    gPanelBgRpt = options.photoPanelData.backgroundRepeat;
    	    gPanelBgClr = options.photoPanelData.backgroundColor == "" ? "transparent" : options.photoPanelData.backgroundColor;
    	    gPanelBgPos = options.photoPanelData.backgroundPosition == "" ? "0 0" : options.photoPanelData.backgroundPosition;
    	    gPanelBgImg = options.photoPanelData.backgroundImage;
    	    gPanelWidth = options.photoPanelData.width;
    	    gPanelHeight = options.photoPanelData.height;
		    
		    gPhotoWidth = options.photoImageDimensions.width;
    	    gPhotoHeight = options.photoImageDimensions.height;
    	    gPhotoPadding = options.photoImageDimensions.padding;
    	    gPhotoBgClr = options.photoImageDimensions.bgColor;
    	    gPhotoBrdWidth = options.photoImageDimensions.borderThickness;
    	    gPhotoBrdClr = options.photoImageDimensions.borderColor;
    	    
    	    gDataSeparator = options.photoDataSeparator;
    	    gBorderRadius = options.borderRadius;
    	    gSmartRandomisation = options.useSmartPhotoRand;
    	    gMinSeparateX = options.photoMinSeparateX;
		    gMinSeparateY = options.photoMinSeparateY;
		    
		    gPhotoTotalWidth = gPhotoWidth + (2 * gPhotoPadding) + (2 * gPhotoBrdWidth);
            gPhotoTotalHeight = gPhotoHeight + (2 * gPhotoPadding) + (2 * gPhotoBrdWidth);
		};

		/* --------------------------------------
		-- Set styling for the panel
		-------------------------------------- */
		var setPanelStyles = function (obj) {
		  var bgRepeat = gPanelBgRpt;
		  
		  if (bgRepeat == "x" || bgRepeat == "y") bgRepeat = "repeat-" + bgRepeat;
		  else if (bgRepeat == "xy") bgRepeat = "repeat";
		  else bgRepeat = "no-repeat";
		  
		  obj.css("width", gPanelWidth + "px")
		     .css("height", gPanelHeight + "px")
		     .css("background", gPanelBgClr + " url('" + gPanelBgImg + "') " + bgRepeat + " " + gPanelBgPos)
		     .css("border-radius", gBorderRadius + "px");
		},
		
		/* --------------------------------------
		-- Add photos to the panel with styling from config
		-------------------------------------- */
		addPhotos = function (obj) {

		  var cardHtml,
		      imgTitle;
		  for (var i = 0; i < gPhotoData.length; i++) {
		    itemData = gPhotoData[i].split(gDataSeparator);
		    imgSrc = itemData[0];
		    imgTitle = itemData[1];
		    cardHtml = "<a class='gallery-item' href='javascript:;'>"
		             + "<img alt='" + imgTitle + "' src='" + imgSrc + "'>"
		             + "</a>";   
		    obj.find(".cards-container").append(cardHtml);
		  }
		  obj.find(".gallery-item").css("border-radius", gBorderRadius + "px")
	        .css("padding", gPhotoPadding + "px")
	        .css("border", gPhotoBrdWidth + "px solid " + gPhotoBrdClr)
	        .css("background-color", gPhotoBgClr);
		  obj.find(".gallery-item img").css("height", gPhotoHeight)
	        .css("width", gPhotoWidth)
	        .css("border-radius", gBorderRadius + "px " + gBorderRadius + "px 0 0");
		  obj.find(".gallery-item span").css("border-radius", "0 0 " + gBorderRadius + "px " + gBorderRadius + "px");
		  
		  // If photo tilt angles and positions are not set, randomise!!!
		  if(gPhotoData[0].split(gDataSeparator).length < 5) {
		    // Randomise
		    randomisePhotoPositions(obj);
		  } else {
		    // Do NOT randomise. Use data from settings
		    getPhotoPositions(obj);
		  }
		},
		
		/* --------------------------------------
		-- Randomise photo positions
		-------------------------------------- */
		randomisePhotoPositions = function (obj) {
		  if (!gSmartRandomisation) {
		    doSimpleRandomisation(obj);
		  } else {
		    doSmartRandomisation(obj);
		  }
		},
		
		/* --------------------------------------
		-- Simple Photo randomisation
		-------------------------------------- */
		doSimpleRandomisation = function (obj) {
		  var styleArray = new Array(),
    		  minX = 0,
    		  minY = 0;
    	  
		  for (var i = 0; i < gPhotoData.length; i++) {
		    imgLeft = parseInt(Math.random() * ( gPanelWidth - gPhotoWidth ) ) + "px";
		    imgTop = parseInt(Math.random() * ( gPanelHeight - gPhotoHeight ) ) + "px";
		    imgRotate = "rotate(" + parseInt((Math.random() - 0.5) * 90) + "deg)"; // Random angle between -45 and 45 degrees
		    styleArray.push(imgLeft + gDataSeparator + imgTop + gDataSeparator + imgRotate);
          }		  
		  setPhotoPositions(obj, styleArray);
		},
		
		/* --------------------------------------
		-- Smart Photo randomisation
		-------------------------------------- */
		doSmartRandomisation = function (obj) {
		  var styleArray = new Array();
    		  
		  for (var i = 0; i < gPhotoData.length; i++) {
		    photoPosAngleValid = false;
		    while (photoPosAngleValid == false && gMainLoopCounter < gMainLoopMax) {
    		    imgLeft = parseInt(Math.random() * ( gPanelWidth - gPhotoTotalWidth) );
    		    imgTop = parseInt(Math.random() * ( gPanelHeight - gPhotoTotalHeight) );
    		    randAngle = parseInt((Math.random() - 0.5) * 90); // Random angle between -45 and 45 degrees
		        photoPosAngleValid = isPhotoPosAngleValid(imgLeft, imgTop, randAngle, styleArray);
		        gMainLoopCounter++;
				
		    }
		    
		    if (gMainLoopCounter == gMainLoopMax) {
		        console.log("Plugin data error! Exiting... ");
		        break;
		    }
		    
		    imgLeft += "px";
		    imgTop += "px";
		    
		    imgRotate = "rotate(" + randAngle + "deg)";
		    
		    styleArray.push(imgLeft + gDataSeparator + imgTop + gDataSeparator + imgRotate);
          }		  
		  setPhotoPositions(obj, styleArray);
		},
		
		isPhotoPosAngleValid = function (imgLeft, imgTop, randAngle, styleArray) {
		    var bValid = true;
		    
		    posRandAngle = randAngle < 0 ? (0 - randAngle) : randAngle;

		    // See; http://www.mathsisfun.com/algebra/trig-finding-side-right-triangle.html
		    angleSpacerY = parseInt((gPhotoTotalWidth / 2) * Math.cos((90 - posRandAngle) * Math.PI / 180))
		        + parseInt((gPhotoTotalHeight / 2) * Math.cos(posRandAngle * Math.PI / 180));
		        
		    angleSpacerX = parseInt((gPhotoTotalHeight / 2) * Math.cos((90 - posRandAngle) * Math.PI / 180))
		        + parseInt((gPhotoTotalWidth / 2) * Math.cos(posRandAngle * Math.PI / 180));

            // Make sure photo is inside photo panel
            if ((imgLeft < (angleSpacerX - (gPhotoTotalWidth / 2))) || (imgLeft > (gPanelWidth - angleSpacerX - (gPhotoTotalWidth / 2)))) bValid = false;
            if ((imgTop < (angleSpacerY - (gPhotoTotalHeight / 2))) || (imgTop > (gPanelHeight - angleSpacerY - (gPhotoTotalHeight / 2)))) bValid = false;
            
            // Create enough separation from other photos (and keep inside photo panel)
            var currentPhotoCenterTop = imgTop + (gPhotoTotalHeight / 2),
                currentPhotoCenterLeft = imgLeft + (gPhotoTotalWidth / 2);
            // e.g. 439px|266px|rotate(-3deg)
            if (styleArray.length) {
                for (var i = 0; i < styleArray.length; i++) {
                    aArray = styleArray[i].split(gDataSeparator);
                    
                    var otherPhotoStyleLeft = aArray[0],
                        otherPhotoStyleTop = aArray[1];
                    otherPhotoStyleLeft = parseInt(otherPhotoStyleLeft.replace("px", ""));
                    otherPhotoStyleTop = parseInt(otherPhotoStyleTop.replace("px", ""));
                    
                    var otherPhotoCenterTop = otherPhotoStyleTop + (gPhotoTotalHeight / 2),
                        otherPhotoCenterLeft = otherPhotoStyleLeft + (gPhotoTotalWidth / 2);
                        
                    distanceY = otherPhotoCenterTop - currentPhotoCenterTop;
                    if (distanceY < 0) distanceY = 0 - distanceY;
                    distanceX = otherPhotoCenterLeft - currentPhotoCenterLeft;
                    if (distanceX < 0) distanceX = 0 - distanceX;
                    
                    if ((distanceX < gMinSeparateX) && (distanceY < gMinSeparateY)) bValid = false;
                }
            }

		    return bValid;
		},

		/* ----------------------------------------------
		-- Get photo positions from settings into an array
		---------------------------------------------- */
		getPhotoPositions = function (obj) {
		  var styleArray = new Array();
		  
		  for (var i = 0; i < gPhotoData.length; i++) {
		    itemData = gPhotoData[i].split(gDataSeparator);
		    imgLeft = itemData[2] + "px";
		    imgTop = itemData[3] + "px";
		    imgRotate = "rotate(" + itemData[4] + "deg)";
		    styleArray.push(imgLeft + gDataSeparator + imgTop + gDataSeparator + imgRotate);
		  }

		  setPhotoPositions(obj, styleArray);
		},

		/* -------------------------------------------
		-- Set photo positions from data
		------------------------------------------- */
		setPhotoPositions = function (obj, posData) {
		  if (posData.length == obj.find(".gallery-item").length) {
		    for (var i = 0; i < posData.length; i++) {
		      thisStyle = posData[i];
		      styles = thisStyle.split(gDataSeparator);
		      obj.find(".gallery-item").eq(i).css("left", styles[0])
		        .css("top", styles[1])
		        .css("-webkit-transform", styles[2])
				.css("transform", styles[2]);
				   }
		  }
		}
		
		return this.each(function() {
			// Merge the defaults and user settings
			options = gallerySettings;
			
			options.photoPanelData = $.extend(settings.photoPanelData, options.photoPanelData);
			options.photoImageDimensions = $.extend(settings.photoImageDimensions, options.photoImageDimensions);
			options = $.extend(settings, options),
			    obj = $(this);
			    
			objId = obj.attr("id");
			_init(obj, options);
			
        	$(".gallery-item").click( function () {
        	    thisPanel = $(this).closest(".cards-randomised");
        	    thisPanel.find(".card-image-large-content").html("");
        	    thisPanel.find(".card-image-holder, .card-image-large-overlay").hide();
        	    thisPanel.find(".card-image-large-content").html($(this).html());
        	    thisPanel.find(".card-image-large-content").append("<span>" + thisPanel.find(".card-image-large-content img").attr("alt") + "</span>");
        	    thisPanel.find(".card-image-large-content img")
        	        .css("height", "auto")
        	        .css("width", "auto")
        	        .css("max-height", parseInt(thisPanel.css("height").replace("px")) - 20 + "px")
        	        .css("max-width", parseInt(thisPanel.css("width").replace("px")) - 20 + "px");
        	    thisPanel.find(".card-image-holder, .card-image-large-overlay").fadeIn();
        	    return false;
        	});
        	
        	$(".card-image-close, .card-image-large-overlay, .card-image-holder").click( function () {
        	    thisPanel = $(this).closest(".cards-randomised");
        	    thisPanel.find(".card-image-holder, .card-image-large-overlay").hide();
        	    thisPanel.find(".card-image-large-content").html($(this).html());
        	    return false;
        	});
		});
	}; 
})( jQuery ); 
