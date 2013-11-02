// as the page loads, call these scripts
jQuery(document).ready(function($) {
    // initialise Stellar.js
    $(window).stellar();
    
    // Cache some variables
    var links = $('nav').find('li a');
    var slide = $('.page-panel');
    var button = $('.down-button');
    var mywindow = $(window);
    var htmlbody = $('html,body');

    var ranHomeAnimation = false;

    if (window.localStorage && window.localStorage.ranHomeAnimation === 'true') {
	    ranHomeAnimation = true;
	    
	    // TODO: Remove me for production!
	    ranHomeAnimation = false;

		if (ranHomeAnimation) {
			$('body').addClass('ran-animation').removeClass('loading');	
		}
    } else if (!window.localStorage) {
	    $('body').addClass('ran-animation').removeClass('loading');
    }

    // Let's see if we're at the top of the page, shall we?
    $('#home').waypoint(function() {
    	if (ranHomeAnimation) {
	    	return;
    	}

    	// Fade out current elements
    	$('#home, header, #home blockquote, #home .down-buttonm, #smoke').addClass('fade-out');

    	// If we are, move header down
		$('#header').removeClass('scrolled');

		$(window).on('load', function() {
			setTimeout(function() {
			
				setTimeout(function() {
					$('body').removeClass('loading');
				}, 1500);
				
				// Fade in homepage elements
		    	$('#home').removeClass('fade-out');
		    	
		    	setTimeout(function() {
					$('#smoke').removeClass('fade-out');
				}, 1500);
				
				setTimeout(function() {
					$('#header').removeClass('fade-out');
				}, 2500);
		
				setTimeout(function() {
					$('#home blockquote').removeClass('fade-out');
				}, 3500);
		
				setTimeout(function() {
					$('#home .down-button').removeClass('fade-out');
				}, 4500);
			}, 0);
		});

		ranHomeAnimation = true;
		window.localStorage.ranHomeAnimation = 'true';
	});

	var scrollCheck = false;
	function checkScrollPosition() {
		if (scrollCheck) {
			return;
		}
		
		scrollCheck = true;

		if (mywindow.scrollTop() >= 100) {
			$('#header').addClass('scrolled');
		} else {
			$('#header').removeClass('scrolled');
		}
		
		setTimeout(function() {
			scrollCheck = false;
		}, 200);
	}

	mywindow.on('scroll', checkScrollPosition);
	checkScrollPosition();
    
    // Set up waypoints plugin
    // Direction appears not to work, so I've overwritten it. Needs cleaning up. 
    slide.waypoint(function (event, direction) {
        //cache the variable of the data-slide attribute associated with each slide
        var dataslide = $(this).attr('data-slide');
        //If the user scrolls up change the navigation link that has the same data-slide attribute as the slide to active and
        //remove the active class from the previous navigation link
        if (direction === 'down') {
          // $('nav li a[data-slide="' + dataslide + '"]').parent().addClass('active').next().removeClass('active');
        }
        // if the user scrolls down change the navigation link that has the same data-slide attribute as the slide to active and
        //remove the active class from the next navigation link
        else {
            $('nav li a[data-slide="' + dataslide + '"]').parent().addClass('active').siblings().removeClass('active');
        }
    });
    
    // waypoints doesnt detect the first slide when user scrolls back up to the top so we add this little bit of code, that removes the class
    // from navigation link slide 2 and adds it to navigation link slide 1.
    mywindow.scroll(function () {
        if (mywindow.scrollTop() === 0) {
          $('nav li a[data-slide="1"]').parent().addClass('active');
          $('nav li a[data-slide="2"]').parent().removeClass('active');
        }
    });
    
    //Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
    //easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.page-panel[data-slide="' + dataslide + '"]').offset().top
        }, 2000, 'easeInOutQuint');
    }
    
    // When the user clicks on the navigation links, get the data-slide attribute value of the link and pass that variable to the goToByScroll function
    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
        $(this).blur();
        $('nav li.active').removeClass('active');
        $(this).parent().addClass('active');
    });
    
    //When the user clicks on the button, get the get the data-slide attribute value of the button and pass that variable to the goToByScroll function
    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
        $('nav li a[data-slide="' + dataslide + '"]').parent().addClass('active').siblings().removeClass('active');
    });
   
}); /* end of as page load scripts */
