
/* toucheffects.js */

/* 1  */ /** Used Only For Touch Devices **/
/* 2  */ ( function( window ) {
/* 3  */ 	
/* 4  */ 	// for touch devices: add class cs-hover to the figures when touching the items
/* 5  */ 	if( Modernizr.touch ) {
/* 6  */ 
/* 7  */ 		// classie.js https://github.com/desandro/classie/blob/master/classie.js
/* 8  */ 		// class helper functions from bonzo https://github.com/ded/bonzo
/* 9  */ 
/* 10 */ 		function classReg( className ) {
/* 11 */ 			return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
/* 12 */ 		}
/* 13 */ 
/* 14 */ 		// classList support for class management
/* 15 */ 		// altho to be fair, the api sucks because it won't accept multiple classes at once
/* 16 */ 		var hasClass, addClass, removeClass;
/* 17 */ 
/* 18 */ 		if ( 'classList' in document.documentElement ) {
/* 19 */ 			hasClass = function( elem, c ) {
/* 20 */ 				return elem.classList.contains( c );
/* 21 */ 			};
/* 22 */ 			addClass = function( elem, c ) {
/* 23 */ 				elem.classList.add( c );
/* 24 */ 			};
/* 25 */ 			removeClass = function( elem, c ) {
/* 26 */ 				elem.classList.remove( c );
/* 27 */ 			};
/* 28 */ 		}
/* 29 */ 		else {
/* 30 */ 			hasClass = function( elem, c ) {
/* 31 */ 				return classReg( c ).test( elem.className );
/* 32 */ 			};
/* 33 */ 			addClass = function( elem, c ) {
/* 34 */ 				if ( !hasClass( elem, c ) ) {
/* 35 */ 						elem.className = elem.className + ' ' + c;
/* 36 */ 				}
/* 37 */ 			};
/* 38 */ 			removeClass = function( elem, c ) {
/* 39 */ 				elem.className = elem.className.replace( classReg( c ), ' ' );
/* 40 */ 			};
/* 41 */ 		}
/* 42 */ 
/* 43 */ 		function toggleClass( elem, c ) {
/* 44 */ 			var fn = hasClass( elem, c ) ? removeClass : addClass;
/* 45 */ 			fn( elem, c );
/* 46 */ 		}
/* 47 */ 
/* 48 */ 		var classie = {
/* 49 */ 			// full names
/* 50 */ 			hasClass: hasClass,

/* toucheffects.js */

/* 51 */ 			addClass: addClass,
/* 52 */ 			removeClass: removeClass,
/* 53 */ 			toggleClass: toggleClass,
/* 54 */ 			// short names
/* 55 */ 			has: hasClass,
/* 56 */ 			add: addClass,
/* 57 */ 			remove: removeClass,
/* 58 */ 			toggle: toggleClass
/* 59 */ 		};
/* 60 */ 
/* 61 */ 		// transport
/* 62 */ 		if ( typeof define === 'function' && define.amd ) {
/* 63 */ 			// AMD
/* 64 */ 			define( classie );
/* 65 */ 		} else {
/* 66 */ 			// browser global
/* 67 */ 			window.classie = classie;
/* 68 */ 		}
/* 69 */ 
/* 70 */ 		[].slice.call( document.querySelectorAll( 'ul.grid > li > figure' ) ).forEach( function( el, i ) {
/* 71 */ 			el.querySelector( 'figcaption > a' ).addEventListener( 'touchstart', function(e) {
/* 72 */ 				e.stopPropagation();
/* 73 */ 			}, false );
/* 74 */ 			el.addEventListener( 'touchstart', function(e) {
/* 75 */ 				classie.toggle( this, 'cs-hover' );
/* 76 */ 			}, false );
/* 77 */ 		} );
/* 78 */ 
/* 79 */ 	}
/* 80 */ 
/* 81 */ })( window );
