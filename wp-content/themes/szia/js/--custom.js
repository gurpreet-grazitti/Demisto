/*----------------------------------------------------*/
/*	CUSTOM.JS - Szia Studio v.1.0
/*----------------------------------------------------*/


jQuery(function($){
	
        $('footer a#to_top').click(function(){
           var href = $(this).attr('href');
           var top = 0;
           if($('#wpadminbar').length > 0){
                top = 32;
           }
           if($(href).length > 0){               
               var homeTop = $(href).offset();
               top = homeTop.top;               
           }
           
           $('html,body').animate({scrollTop:top},1000);
           
           return false;
        });
        
        $('#arrow_more > a').click(function(){
            var id = $(this).attr('href');            
            var top = $(id).offset();
            top = top.top;
            if($('#wpadminbar').length > 0){
                top -= 32;
            }            
            $('html,body').animate({scrollTop:top},300);
            return false;
        });
        
/*----------------------------------------------------*/
/*	Slider - Flexslider
/*----------------------------------------------------*/
	$('#bigslider').flexslider({
    	animation: "fade",
		controlNav: true,              
    	directionNav: true
  	});
	$('#about_slider').flexslider({
    	animation: "slide",
		controlNav: true,              
    	directionNav: false
  	});
	$('#work_slider').flexslider({
    	animation: "slide",
		controlNav: false,              
    	directionNav: true
  	});	
	
	$('#page_slider').flexslider({
    	animation: "fade",
		controlNav: true,              
    	directionNav: false
  	});	
	
	$('#bigslider, #home_banner, #home_video').height(jQuery(window).height());

/*----------------------------------------------------*/
/*	Sticky
/*----------------------------------------------------*/

	if($('#wpadminbar').length > 0){
            var oset = 0;
        }
        else{
            var oset = function(){
                var hh = $('header').outerHeight(true);                
                return -$(this).children('div:first-child').height() + hh;
            };
        }    
            
	$('#content_wrapper').waypoint(function(direction) {
            
            $("header").toggleClass("stuck");
        }, {
			offset: oset
	});
        
        

/*----------------------------------------------------*/
/*	To Top
/*----------------------------------------------------*/	
	
	$('#contact').waypoint(function(direction) {
		$('#to_top').toggleClass('hiding', direction === "up");
	}, {
		offset: function() {
			return $.waypoints('viewportHeight') - $(this).height() + 100;
		}
	});
        


	/*Window Resize*/	
	if ($(window).width() < 700) {
		$('nav ul.primary_nav li a').click(function(){
			$('nav ul.primary_nav').slideUp();
		});
	
	}
	else {
	
  	}

	$(window).resize(function(){
		$('#bigslider, #home_banner').height(jQuery(window).height());
	});
	
	if ($(window).width() < 760) {
		$width = ($(window).width())/2;
		$('#work_showcase li').width($width);
		$("#work_showcase").carouFredSel({
			items				: 2,
			auto: false,
			responsive : true,
			direction			: "left",
			mousewheel: true,
				swipe: {
					onMouse: true,
					onTouch: true
				}				
		});	
	
	  }
	  else {
		  
		  /*Do Something*/
		
	  }
	  
	  
	  if ($(window).width() < 700) {
		$('nav ul.primary_nav li a').click(function(){
			$('nav ul.primary_nav').slideUp();
		});
		
	  }
	  else {
		
	  }
	
	
});






jQuery(document).ready(function($) {	
/*----------------------------------------------------*/
/*	Contact Form
/*----------------------------------------------------*/
	
	$("#contactForm").validate({
		submitHandler: function(form) {
			
			var params = {
				name: $('#name').val(),
				email: $('#email').val(),
				comment: $('#comment').val(),
			};
			
			$.post('process.php', params, function(){
				alert('Thanks, We will get back to you soon');
				$('#contact_form').slideUp('200');
				$('.write_to_us .trigger').removeClass("active");
				$("#contact_form input#name, #contact_form input#email, #contact_form #comment").val('');
				$("#contact_form input#name, #contact_form input#email, #contact_form #comment").removeClass("valid");
			});
		}
	});

	
/*----------------------------------------------------*/
/*	One Page Scrolling
/*----------------------------------------------------*/

	$('header nav ul').onePageNav({
		begin: function() {
		},
		end: function() {
		},
		scrollOffset: 0,
		easing: 'swing',
		filter: ':not(.external)'
	});
	
	
/*----------------------------------------------------*/
/*	Tool Tip
/*----------------------------------------------------*/
	
	$('.tooltip').tooltipster({
		position: 'bottom',
	});


/*----------------------------------------------------*/
/*	Testimonial
/*----------------------------------------------------*/
	
	$(".testimonial_slide").carouFredSel({
		items				: 1,
		auto: true,
		direction			: "bottom",
		pagination: "#pager2",
		mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}				
	});		
	
/*----------------------------------------------------*/
/*	Home Quotes
/*----------------------------------------------------*/
	
	$(".home_quotes").carouFredSel({
		items				: 1,
		auto				: true,
		direction			: "up"
	});		
	
	
	$(window).resize(function(){
		$(".home_quotes").carouFredSel({
			items				: 1,
			auto				: true,
			direction			: "up"
		});		
	});
	
	
/*----------------------------------------------------*/
/*	Accordion
/*----------------------------------------------------*/
	(function() {

		var $container = $('.acc-container'),
			$trigger   = $('.acc-trigger');

		$container.hide();
		$trigger.first().addClass('active').next().show();

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		
		$trigger.on('click', function(e) {
			if( $(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				$(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();
	

/*----------------------------------------------------*/
/*	Toggle
/*----------------------------------------------------*/
	(function() {

		var $container = $('.toggle-container'),
			$trigger   = $('.toggle-trigger');

		$container.hide();
		

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		
		$trigger.on('click', function(e) {
			
				$(this).toggleClass('active').next().slideToggle(300);
				return(false);
			
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();
	
	
/*----------------------------------------------------*/
/*	Tabs
/*----------------------------------------------------*/

	(function() {

		var $tabsNav    = $('.tabs-nav'),
			$tabsNavLis = $tabsNav.children('li'),
			$tabContent = $('.tab-content');

		$tabsNav.each(function() {
			var $this = $(this);

			$this.next().children('.tab-content').stop(true,true).hide()
												 .first().show();

			$this.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
				 .addClass('active');
			
			$this.parent().next().children('.tab-content').stop(true,true).hide()
														  .siblings( $this.find('a').attr('href') ).fadeIn();

			e.preventDefault();
		});

	})();
	
	
	
	
	/* CONTACT TOGGLE */
	$('.trigger').click(function(){
		$(this).toggleClass("active");
      	$('#contact_form').slideToggle('300');
  	}); 
	
	
/*----------------------------------------------------*/
/*	POPUP
/*----------------------------------------------------*/
	
	// Magnific popup for images
			$('.work_info a.plus, .popup').magnificPopup({ 
			type: 'image',
			fixedContentPos: false,
			mainClass: 'mfp-with-zoom',
				zoom: {
					enabled: true,
					duration: 300,
					easing: 'ease-in-out', 
					opener: function(openerElement) {
						return openerElement.is('a') ? openerElement : openerElement.find('a');
					}
				}
			});
			
			// Magnific popup for soundcloud
			$('.popup-soundcloud').magnificPopup({ 
				type: 'iframe',
				mainClass: 'soundcloud-popup',
				fixedContentPos: false
			});

			// Magnific popup for videos
			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});


	
});

/*----------------------------------------------------*/
/*	Responsive Menu
/*----------------------------------------------------*/
	jQuery(function($) {
		var pull 		= $('.pull');
			menu 		= $('nav ul');
			menuHeight	= menu.height();
	
		$(pull).on('click', function(e) {
			e.preventDefault();
			menu.slideToggle();
		});		
	
		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	});



/*----------------------------------------------------*/
/*	Logo Fade
/*----------------------------------------------------*/
            jQuery(window).load(function(){
                jQuery('.partner_logos li img').each(function(){
                                    var el = $(this);
                                    
                        el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
                                var el = jQuery(this);
                                el.parent().css({"width":this.width,"height":this.height});
                                el.dequeue();
                        });

                        this.src = grayscale(this.src);

                });
                
                
           
	jQuery(function($){
			
			// Fade in images so there isn't a color "pop" document load and then on window load
			$(".partner_logos li img").fadeIn(500);
			 
			// clone image
                        setTimeout(function(){
                            
                        },1000);
			
			// Fade image 
			$('.partner_logos li img').mouseover(function(){
				$(this).parent().find('img:first').stop().animate({opacity:1}, 400);
			})
			$('.img_grayscale').mouseout(function(){
				$(this).stop().animate({opacity:0}, 400);
			});		
		});
		
		// Grayscale w canvas method
		function grayscale(src){
			var canvas = document.createElement('canvas');
			var ctx = canvas.getContext('2d');
			var imgObj = new Image();
			imgObj.src = src;
			canvas.width = imgObj.width;
			canvas.height = imgObj.height; 
			ctx.drawImage(imgObj, 0, 0); 
                        
			var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
			for(var y = 0; y < imgPixels.height; y++){
				for(var x = 0; x < imgPixels.width; x++){
					var i = (y * 4) * imgPixels.width + x * 4;
					var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
					imgPixels.data[i] = avg; 
					imgPixels.data[i + 1] = avg; 
					imgPixels.data[i + 2] = avg;
				}
			}
			ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
			return canvas.toDataURL();
	}
	
		
/*----------------------------------------------------*/
/*	Drag Slider - Work
/*----------------------------------------------------*/
	
	$width = ($(window).width())/4;
	$('#work_showcase li').width($width);
	$("#work_showcase").carouFredSel({
		items				: 4,
		auto: false,
		responsive : true,
		direction			: "left",
		mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}				
	});	
	
	
	
	

 });