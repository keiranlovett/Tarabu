(function($) {

	$.fn.Tarabu = function(options) {
		$.fn.Tarabu.defaults = {
			soundcloud_URL: null,
			soundcloud_clientId: null,
			playlist: null,
			page_title: document.title,
			locked: null
		};
		var o = $.extend({}, $.fn.Tarabu.defaults, options);
		
		return this.each(function() {	
			var c = $(this);		
			//Determine playlist type. If soundcloud is set as the playlist it will load either the complete user set (soundcloud_URL must be set) or selected sets. If local playlists have been set it will load them.
			if (o.playlist == 'soundcloud') {
				//Determine if the soundcloud API client ID is set. This is required to access json data.
				if(typeof(o.soundcloud_clientId) != "undefined" && o.soundcloud_clientId !== null) {
					//Determine if the user is set and then load all sets.
					if(typeof(o.soundcloud_URL) != "undefined" && o.soundcloud_URL !== null) {
					/*	var patt = new RegExp('users', 'g'); 
						if(patt.test(URLString) == true) { //secondary level
							}else{
							//primary level 
							}*/
						$.getJSON('http://api.soundcloud.com/'+ o.soundcloud_URL +'?client_id=' + o.soundcloud_clientId, { get_param: 'value' },
						function(playlists_data) {
							$.each(playlists_data, function(index, playlists) {
							//Get playlists data
							i = 1;
							$.getJSON(playlists.uri + '.json?client_id=' + o.soundcloud_clientId, { get_param: 'value' }, function(playlist) {
								c.append("<div class='tarabu-playlist' id='tarabu-id" + i + "'><div class='tarabu-sleeve'><img class='tarabu-artwork'/></div><div class='tarabu-content'><div class='tarabu-description'></div><ol class='tarabu-tracks'></ol></div></div>");
								//get track data
								$.each(playlist.tracks, function(index, track) {
									// Create a list item for track, associate it's data, and append it to the track list.
									var $li = $('<li class="tarabu-track-' + track.id + '">' + track.title + '</li>').data('track', track).appendTo('#tarabu-id'+i+' .tarabu-tracks');
								});
								i++			
							});
						});
						});
					} else {
						alert('soundcloud not user set');	
					}
				} else {
					alert('A Soundcloud Client API must be set.');
				}
			} else {
				alert('local');	
			}
		//Lock Logic
		// User can lock the app requiring the users to perform an action before they can download it. Facebook, Twitter sharing. Timed
		if(typeof(o.locked) != "undefined" && o.locked !== null) {
			if (o.locked == 'twitter') {
				$.getScript("http://platform.twitter.com/widgets.js", function(){
					function handleTweetEvent(event){
						if (event) {
							alert("This is a callback from a tweet")
							//Append twitter handle
						}
					}	
					twttr.events.bind('tweet', handleTweetEvent);        
				});
			} else if (o.locked == 'facebook') {
				window.fbAsyncInit = function() {
				    FB.init({appId: '185324271585974', status: true, cookie: true, xfbml: true});
				    FB.Event.subscribe('edge.create', function(href, widget) {
				 	  	 alert('You just liked the page!');
				 	  	 //Append facebook handle
				 	});
				};	
			} else {
				var date 	= new Date();
				date.setFullYear(2020,1,1);
				var _now 	= new Date();
				var month 	= date.getMonth() + 1
				var day 	= date.getDate()
				var year 	= date.getFullYear()

				if(date.getTime() > _now.getTime()) {
					alert('Unlock on ' + month + "/" + day + "/" + year);
				} else {
					alert('date is past');
				}
			}
		}
		});
	};
})(jQuery);