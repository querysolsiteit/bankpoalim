// all the client javascript - including initialization of sliders, accordions and other components

// navigation search toggle
// navigation mobile toggle
// mobile navigation subnav toggle
// sticky header

// slick sliders

// modal functionality

// reorder columns on testimonial pages

// form validation (contact page)

// accordion on faq page

(function($) {
	"use strict"

	var $window = jQuery(window),
		$body = jQuery('body'),

		$searchToggle = jQuery('#search-toggle'),
		$searchInput = jQuery('#search-input'),
		$rightGroup = jQuery('#right-group'),
		$topBarRight = jQuery('.top-bar-right'),

		$navToggle = jQuery('#toggle-nav'),
		$mobileNav = jQuery('#mobile-nav'),
		$mobileLogo = jQuery('#mobile-logo'),
		$newNavToggle = jQuery('#new-nav-toggle'),
		$navToggles = jQuery('#toggle-nav, #new-nav-toggle'),
		$mobileBarRight = jQuery('.mobile-bar-right'),
		$subnavToggle = jQuery('[data-toggle="subnav"]'),

		$header = jQuery('#page-header'),
		$mainNavWaypoint = jQuery('#main-nav-waypoint'),
		$mainNav = jQuery('#main-nav'),
		$secondNavWaypoint = jQuery('#second-nav-waypoint'),
		$secondNav = jQuery('#second-nav'),
		$transitionWrapper = $secondNav.find('.transition-wrapper'),
		mainNavWaypoint,
		secondNavWaypoint,
		createdSticky = false,

		industryInitialised = false,
		sliders = [
			// about slider
			function() {
				var $el = jQuery('#about-link-slider');
				var settings = {
					dots: true,
					arrows: false,
					draggable: false
				};

				$el.accessibleSlick(settings);
			},

			// industry slider
			function() {
				if ($window.width() > 730) {
					if (!industryInitialised) {
						var $el = jQuery('#industry-page-slider'),
							$parent = $el.parent(),
							itemAmount = $el.find('.industry-page-item').length,
							settings = {
								arrows: true,
								prevArrow: $parent.find('.left'),
								nextArrow: $parent.find('.right'),
								variableWidth: true,
								responsive: [
									{
										breakpoint: 730,
										settings: "unslick"
									}
								],
								slidesToShow: itemAmount / 2,
								draggable: false,
								accessibility: false
							};


						console.log("item amount: " + itemAmount);

						$el.accessibleSlick(settings);
						industryInitialised = true;
					}

				} else {
					industryInitialised = false;
				}
			},

			// private slider
			function() {
				var $el = jQuery('#private-slider');
				var $parent = $el.parent();
				var $prev = $parent.find('.prev');
				var $next = $parent.find('.next');
				var $pause = $parent.find('.pause');

				var carousel = $el.accessibleSlick({
					arrows: true,
					prevArrow: $prev,
					nextArrow: $next,
					autoplay: true,
					autoplaySpeed: 5000,
					pauseOnHover: false,
					useTransform: true,
					speed: 600,
					fade: true,
					draggable: false,
					accessibility: false
				});

				$pause.on("click", function() {
					carousel.accessibleSlick('slickPause');
				});
			},

			// mobile services slider
			function() {
				var $el = jQuery('#mobile-services-slider');
				var $parent = $el.parent();
				var $prev = $parent.find('.prev');
				var $next = $parent.find('.next');

				$el.accessibleSlick({
					prevArrow: $prev,
					nextArrow: $next,
					dots: true
				});
			}
		],

		$toggleModal = jQuery('[data-toggle="modal"]'),
		$closeModal = jQuery('[data-role="close-modal"]'),
		$toggleNextModal = jQuery('[data-toggle-next="true"]'),
		$togglePrevModal = jQuery('[data-toggle-prev="true"]'),

		$reorderMd = jQuery('.reorder-md'),
		$reorderXs = jQuery('.reorder-xs'),
		outOfMobile = false,

		$contactForm = jQuery('#contact-form'),
		$careersForm = jQuery('.careers-form'),
		$messageSentModal = jQuery('#msg-sent-modal'),

		$btnToggleAnswer = jQuery('[data-accordion="true"] .btn-toggle-answer'),

		$mapLocation = jQuery('.map-location');


	// header/navigaiton
	function handleSearchClick(e) {
		if ($searchInput.hasClass("open")) {
			$searchInput.removeClass("open");

			setTimeout(function() {
				$rightGroup.fadeToggle();

			}, 500);
		} else {
			$rightGroup.fadeToggle();

			setTimeout(function() {
				$searchInput.addClass("open");
				$searchInput.focus();
			}, 500);
		}
	}

	function showMobileMenu() {
		$mobileNav.toggleClass("showing");
		$mobileLogo.toggleClass("hidden");
		$newNavToggle.fadeToggle();
		$mobileBarRight.toggleClass("hidden");
	}

	function handleMobileToggleClick(e) {
		showMobileMenu();
	}

	function handleMobileSubnavClick(e) {
		var $this = jQuery(this);
		var $icon = $this.find('.icon');
		var target = $this.attr('data-target');

		jQuery(target).slideToggle();
		$icon.toggleClass("up");
	}

	function initStickyHeader() {
		if ($window.width() > 730) {
			if ((!mainNavWaypoint && !secondNavWaypoint) || !createdSticky) {

				// if both waypoints are there
				// if ($mainNavWaypoint.length && $secondNavWaypoint.length) {
				if ($mainNavWaypoint.length) {
					mainNavWaypoint = new Waypoint({
						element: $mainNavWaypoint,
						handler: function(dir) {
							$mainNav.toggleClass('sticky');
							if (!$mainNavWaypoint.hasClass("home-waypoint"))
								$body.toggleClass('header--stuck');
						}
					});
				}

				if ($secondNavWaypoint.length) {
						secondNavWaypoint = new Waypoint({
							element: $secondNavWaypoint,
							handler: function(dir) {
								$secondNav.toggleClass('sticky');
							},
							offset: 180
						});
				}

					createdSticky = true;

					// when the window width is odd
					// the icons tend to jiggle as the transition occurs.
					// this is a fix: if the width is odd, we will shorten the transition
					// wrapper by 1px fixing the problem
					if ($window.width() % 2 != 0)
						$transitionWrapper.css('right', '-1px');
				// }
			}
		} else if (mainNavWaypoint && secondNavWaypoint) {
			console.log("destroying everything");
			mainNavWaypoint.destroy();
			secondNavWaypoint.destroy();
			$mainNav.removeClass("sticky");
			$secondNav.removeClass("sticky");
			createdSticky = false;
			$body.removeClass('header--stuck');
		}


	}

	// slick sliders
	function initSlickSliders() {
		for (var i = 0; i < sliders.length; i++) {
			var slider = sliders[i];

			if (typeof slider === "object") {
				slider.$el.slick(slider.settings);
			} else if (typeof slider === "function") {
				slider();
			}
		}
	}

	// modals
	function toggleModal(e) {
		e.preventDefault();

		var $this = jQuery(this);
		var target = $this.attr('data-target');
		var $target = jQuery(target);
		var title = $this.attr('data-modal-title');

		// $body.addClass('modal-open');
		$target.fadeIn();
		if (title)
			$target.find('.job-title').html(title);
	}

	function toggleModalById(id) {
		console.log("id: " + id);
		var $target = jQuery('#' + id);
		// $body.addClass('modal-open');
		$target.fadeIn();
	}

	function closeModal() {
		var $this = jQuery(this);
		// $body.removeClass("modal-open");
		var depth = 1;
		if ($this.attr('data-close-form-modal'))
			depth = 2;

		$this.parents().eq(depth).fadeOut();
	}

	// shows next modal
	function showNextModal() {
		var $this = jQuery(this),
			$parent = $this.parents().eq(2),
			$next = $parent.next('.modal-wrapper');

		// $body.removeClass("modal-open");
		$parent.fadeOut();

		if ($next.length)
			toggleModalById($next.attr("id"));
		else
			toggleModalById($parent.attr("id").slice(0, -1).concat("1"));
	}

	function showPrevModal() {
		var $this = jQuery(this),
			$parent = $this.parents().eq(2),
			$prev = $parent.prev('.modal-wrapper');

		// $body.removeClass("modal-open");
		$parent.fadeOut();

		if ($prev.length)
			toggleModalById($prev.attr("id"));
		else
			toggleModalById($parent.attr("id").slice(0, -1).concat("3"));
	}

	// reordering columns on testimonials page
	function reorderColumns() {
		var width = $window.width();
		if (width < 941 && width > 490) {
			if (outOfMobile) {
				restoreOrder();
				outOfMobile = false;
			}

			$reorderMd.each(function() {
				var $this = jQuery(this);
				if (!$this.hasClass("js--reordered")) {
					// change arrows
					if ($this.hasClass("arrow--right")) {
						$this.removeClass("arrow--right");
						$this.addClass("js--arrow--left");
					} else {
						var $prev = $this.next();
						$prev.removeClass("arrow--left");
						$prev.addClass("js--arrow--right");
					}

					$this.insertAfter($this.next());
					$this.addClass("js--reordered");
				}
			});
		} else if (width < 490) {
			if (!outOfMobile) {
				restoreOrder();
			}

			$reorderXs.each(function() {
				var $this = jQuery(this);
				if (!$this.hasClass("js--reordered")) {
					$this.insertAfter($this.next());
					$this.addClass("js--reordered");
				}
			});

			outOfMobile = true;
		} else {
			restoreOrder();
		}
	}

	function restoreOrder() {
		jQuery('.js--reordered').each(function() {
			var $this = jQuery(this);
			$this.insertBefore($this.prev());
			$this.removeClass("js--reordered");

			if ($this.hasClass("js--arrow--left")) {
				$this.removeClass("js--arrow--left");
				$this.addClass("arrow--right");
			} else if ($this.hasClass("js--arrow--right")) {
				$this.removeClass("js--arrow--right");
				$this.addClass("arrow--left");
			}
		});

		jQuery('.js--arrow--right').each(function() {
			var $this = jQuery(this);
			$this.removeClass("js--arrow--right");
			$this.addClass("arrow--left");
		});

		jQuery("js--arrow--left").each(function() {
			var $this = jQuery(this);
			$this.removeClass("js--arrow--left");
			$this.addClass("arrow--right");
		});
	}


	// contact form
	function initContactValidation() {
		var params = {
			rules: {
				name: "required",
				email: "required",
				phone: "required"
			},

			messages: {
				name: "Username missing",
				email: {
					required: "Email missing",
					email: "Invalid email address"
				},
				phone: "Phone missing"
			},

			errorClass: "form--error",

			submitHandler: function(form) {
				// show the conformation modal
				$messageSentModal.fadeIn();

			},

			invalidHandler: function(event, validator) {
				// add role="alert" to errors (a11y)
				setTimeout(function() {
					jQuery('label.form--error').attr('role', 'alert');
				}, 0);
			}
		};

		$contactForm.validate(params);
		$careersForm.validate(params);
	}

	// accordion on faq page
	function handleFaqClick(e) {
		var $this = jQuery(this);
		var $parent = $this.parent();
		var expanded = $this.hasClass('activated');
		var txt = expanded ? '+' : '-';

		$parent.find('.faq-item-details').slideToggle();
		$parent.attr('aria-expanded', !expanded);
		$this.toggleClass("activated");
		$this.text(txt);
	}

	// general resize
	function handleResize() {
		initStickyHeader();
		reorderColumns();

		// on resize, reinit the industry slider if needed
		sliders[1]();
	}

	var bhi = (function() {
		var init = function() {
			bindEvents();
			initStickyHeader();
			reorderColumns();
			initContactValidation();
			initSlickSliders();
		}

		var bindEvents = function() {
			$searchToggle.on("click", handleSearchClick);
			$navToggles.on("click", handleMobileToggleClick);
			$subnavToggle.on("click", handleMobileSubnavClick);
			$toggleModal.on("click", toggleModal);
			$closeModal.on("click", closeModal);
			$toggleNextModal.on("click", showNextModal);
			$togglePrevModal.on("click", showPrevModal);
			$btnToggleAnswer.on("click", handleFaqClick);

			$window.on("resize", handleResize);
		}

		return {
			init: init
		}
	})();

	jQuery(document).on("ready", function() {
		bhi.init();
	});



})(jQuery);
