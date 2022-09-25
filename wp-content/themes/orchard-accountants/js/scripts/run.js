// binds $ to jquery, requires you to write strict code. Will fail validation if it doesn't match requirements.
(function($) {
    "use strict";

	// add all of your code within here, not above or below
	$(function() {


		// --------------------------------------------------------------------------------------------------
		// Back to top
		// --------------------------------------------------------------------------------------------------
		$("#back-top").hide();
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 300) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
		});
		$("#back-top").click(function() {
			$("html, body").animate({
			scrollTop: $("body").offset().top
			}, 750);
		});


		// --------------------------------------------------------------------------------------------------
		// Toggle Location Numbers
		// --------------------------------------------------------------------------------------------------
		$('.js-toggle-location-numbers').click(function(){
			$('.location-numbers').toggleClass('location-numbers--visible');
		});


		// --------------------------------------------------------------------------------------------------
		// Mobile Menu
		// --------------------------------------------------------------------------------------------------
		// Copy primary and secondary menus to .mob-nav element
		var mobNav = document.querySelector('.mob-nav .scroll-container');

		var copyPrimaryMenu = document.querySelector('.header__secondary-nav').cloneNode(true);
		mobNav.appendChild(copyPrimaryMenu);


		if($('.header__primary-nav').length) {
			var copySecondaryMenu = document.querySelector('.header__primary-nav').cloneNode(true);
			mobNav.appendChild(copySecondaryMenu);
		}

		// Add Close Icon element
		$( "<div class='mob-nav-close'><span class='icon-close'></span></div>" ).insertAfter( ".mob-nav .scroll-container" );

		// Add dropdown arrow to links with sub-menus
	    $( "<span class='sub-arrow'><span class='icon-angle-down'></span></span>" ).insertAfter( ".mob-nav .menu-item-has-children > a" );

	    // Show sub-menu when dropdown arrow is clicked
	    $('.sub-arrow').click(function() {
	    	$(this).toggleClass('active');
	    	$(this).prev('a').toggleClass('active');
	    	$(this).next('.sub-menu').slideToggle();
	    	$(this).children().toggleClass('fa-angle-down').toggleClass('fa-angle-up');
	    });

	    // Add underlay element after mobile nav
	    $( "<div class='mob-nav-underlay'></div>" ).insertAfter( ".mob-nav" );

	    // Show underlay and fix the body scroll when menu button is clicked
	    $('.menu-btn').click(function() {
	    	$('.mob-nav,.mob-nav-underlay').addClass('mob-nav--active');
	    	$('body').addClass('fixed');
	    });

	    // Hide menu when close icon or underlay is clicked
	    $('.mob-nav-underlay,.mob-nav-close').click(function() {
	    	$('.mob-nav,.mob-nav-underlay').removeClass('mob-nav--active');
	    	$('body').removeClass('fixed');
	    });

        // --------------------------------------------------------------------------------------------------
		// Ninja Forms event tracking | https://www.chrisains.com/seo/tracking-ninja-form-submissions-with-google-analytics-jquery/
		// --------------------------------------------------------------------------------------------------
        jQuery( document ).on( 'nfFormReady', function() {
        	nfRadio.channel('forms').on('submit:response', function(form) {
                gtag('event', 'conversion', {'event_category': form.data.settings.title,'event_action': 'Send Form','event_label': 'Successful '+form.data.settings.title+' Enquiry'});
        		console.log(form.data.settings.title + ' successfully submitted');
        	});
        });

  //       function toggelForm() {
		//   var x = document.getElementByClassName("hero__toggle");
		//   if (x.style.display === "none") {
		//     x.style.display = "block";
		//   } else {
		//     x.style.display = "none";
		//   }
		// }

		$('.hero-toggle-form').click(function() {
	    	$('.hero__toggle').toggleClass('hero__toggle--active');
	    	$('.hero-toggle-form').toggleClass('btn--angle-down');
	    });


		$(window).load(function(){
	       // Remove unnecessary NF mark ups
	       $('.nf-form-cont').find("nf-field").contents().unwrap();
	       $('.nf-form-cont').find("nf-fields-wrap").contents().unwrap();
	       $('.nf-form-cont').find("nf-section").contents().unwrap();
	       $('.nf-form-cont').find("nf-errors").contents().unwrap();
	    });

		// Covid-19 message

		if (readCookie('hide-covid-19') == null ) {
			$(".covid-19-update").show();
		}

		if (Boolean(readCookie('hide-covid-19'))) {
	        $('.covid-19-update').hide();   
	    }

	    $(".close-covid").click(function(e) {
	      $(".covid-19-update").hide();
	      $(".covid-19-icon").show();
	      $(".covid-19-icon").children('h3').text("COVID-19");

	      
	      e.stopPropagation();

	       createCookie('hide-covid-19', true, 1)
	       return false;
	    });

	    function createCookie(name, value, days) {
	        if (days == 1) {
	            var date = new Date();
	            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	            var expires = "; expires=" + date.toGMTString();
	        }
	        else var expires2 = "";
	        document.cookie = name + "=" + value + "; expires=" + expires + "; path=/";
	    }

	    function readCookie(name) {
	        var nameEQ = name + "=";
	        var ca = document.cookie.split(';');
	        for (var i = 0; i < ca.length; i++) {
	            var c = ca[i];
	            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
	            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	        }
	        return null;
	    }

	    function eraseCookie(name) {
	        createCookie(name, "", -1);
	    }

		
	});

}(jQuery));
