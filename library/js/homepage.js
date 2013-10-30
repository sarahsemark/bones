// as the page loads, call these scripts
jQuery(document).ready(function($) {

	// Fade in homepage elements
	$('#home, header, #home blockquote, #home .down-button').css('opacity', '0');
    $('#home').delay(0).fadeTo(1000, '1', 'linear');
    $('header').delay(1500).fadeTo(1000, '1', 'linear');
    $('#home blockquote').delay(2500).fadeTo(1000, '1', 'linear');
    $('#home .down-button').delay(3000).fadeTo(500, '1', 'linear');
	
	// Parallax effects via the Stellar library
	
    //initialise Stellar.js
    $(window).stellar();
    
    //Cache some variables
    var links = $('nav').find('li a');
    var slide = $('.page-panel');
    var button = $('.down-button');
    var mywindow = $(window);
    var htmlbody = $('html,body');
    
    // Set up waypoints plugin
    // This should only be active if we're actually on that main page! Also, direction appears not to work, so I've overwritten it. Needs cleaning up. 
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
