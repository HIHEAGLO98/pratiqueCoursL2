(function($) {
	// Call pubs from JSON file, defines as object
	var callPub = {
		// Identify the current index
		curIndex : 0,

		// Handle publications list
		pubList : "",

		// Define the limit (4 : default for performence)
		limit : 3,

		// Store
		__PUBSTOREFILE__ : "tools/iai/js/json/pubobj.json",

		// Array
		__PUBS__ : [],

		// Others variables
		indexed : $('._single_pub'),
		domCaller : $("#appendToQueue"),

		// Load publication
		appendToQueue : function () {
			// Enable strict mode
			"use strict";
			$.getJSON(this.__PUBSTOREFILE__ , function(pub) {
				callPub.__PUBS__ = pub;

				// Predicate
				if (callPub.curIndex + 1 >= callPub.__PUBS__.length) {
					callPub.curIndex = -1;
				}
				callPub.indexed.fadeOut("slow");
				setTimeout(function() {
					callPub.indexed.find('.pub-desc').text(callPub.__PUBS__[callPub.curIndex+1].desc);
					callPub.indexed.find('.pub-img').attr('src',callPub.__PUBS__[callPub.curIndex+1].logo);
					callPub.indexed.find('.pub-title').text(callPub.__PUBS__[callPub.curIndex+1].title);
					setTimeout(function() {
						callPub.indexed.fadeIn("fast");
						callPub.curIndex++;
					}, 300);
				}, 600);
			});
		},

		// DOM its caller
		observeDomCaller : function () {
			this.domCaller.on('click' , function () {
				callPub.appendToQueue();
			});
		},

		// Initialize
		init : function (startAt, pubList, shouldBegin, observeCaller) {
			// Enable strict mode
			"use strict";

			// Object properties initialize
			this.curIndex = parseInt(startAt);
			this.pubList = pubList;

			// Load auto the next el for the list starting from @startAt
			if (shouldBegin)
				this.appendToQueue();

			// Listen on DOM caller clicks
			if (observeCaller)
				this.observeDomCaller();
		}
	};

	// get ready gang
	$(document).ready(function() {
		// Initialize caller with auto load @true
		callPub.init (-1, "_pubs_content", true, true);
	});
}) (jQuery);