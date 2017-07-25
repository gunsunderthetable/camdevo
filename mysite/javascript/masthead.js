 $(document).ready(function(){
 	var $window = $(window);
 	var windowsize = $window.width();
 	// set up background images - these are rendered by CMS into hidden divs in the footer.
 	// ul#bimages and ul#mbimages for the mobile backgrounds
    if (windowsize > 600) {
    	// we are using desktop or tablet - use the rotating backgrounds

    	var imgArr = new Array();

		$("ul#bimages li img").each(function() {

		    var imgData = $(this).attr('src');
		    if (imgData.length > 0) {
		        imgArr.push(imgData);
		    } 
		});

		//console.log(backgroundArray)

    } else {
    	// change the background-image
    	jQuery('#header').css('background-image', 'url(themes/camdevo/images/citycentredark.jpg)');
    	jQuery('#header').css('background-size', '600px 515px');
    	var imgArr = new Array();

		$("ul#mbimages li img").each(function() {

		    var imgData = $(this).attr('src');
		    if (imgData.length > 0) {
		        imgArr.push(imgData);
		    } 
		});

    }	 
	 var preloadArr = new Array();
	 var i;
	 
	 /* preload images */
	 for(i=0; i < imgArr.length; i++){
	 preloadArr[i] = new Image();
	 preloadArr[i].src = imgArr[i];
	 }
	 
	 var currImg = 1;
	 var intID = setInterval(changeImg, 6000);
	 
	 /* image rotator */
	 function changeImg(){
	 	$('#header').animate({opacity: 0.9}, 1000, function(){
	 	$(this).css('background','url(' + preloadArr[currImg++%preloadArr.length].src +') top center no-repeat');
	 	}).animate({opacity: 1}, 100);
	 }
 
 });
