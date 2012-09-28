/*soundManager.setup({
  url: '/path/to/swf-files/',
  onready: function() {
    var mySound = soundManager.createSound({
      id: 'aSound',
      url: '/path/to/an.mp3'
    });
    mySound.play();
  },
  ontimeout: function() {
    // Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
  }
});

*/


(function($) {

	$.fn.Tarabu = function(options) {
		$.fn.Tarabu.defaults = {
			soundcloud_user: null,
			soundcloud_clientId: null,
			playlist: 'soundcloud',
			locked: 'twitter'
		};
		var o = $.extend({}, $.fn.Tarabu.defaults, options);
		return this.each(function() {			
			//Determine playlist type. If soundcloud is set as the playlist it will load either the complete user set (soundcloud_user must be set) or selected sets. If local playlists have been set it will load them.
			if (o.playlist == 'soundcloud') {
				alert('soundcloud');
				//Determine if the soundcloud API client ID is set. This is required to access json data.
				if(typeof(o.soundcloud_clientId) != "undefined" && o.soundcloud_clientId !== null) {
					//Determine if the user is set and then load all sets.
					if(typeof(o.soundcloud_user) != "undefined" && o.soundcloud_user !== null) {
						alert('soundcloud user set');	
						$.getJSON('http://api.soundcloud.com/users/'+ o.soundcloud_user +'/playlists.json?client_id=' + o.soundcloud_clientId, { get_param: 'value' },
						function(playlists_data) {
							$.each(playlists_data, function(index, playlists) {
							//Get playlists data
							i = 1;
							$.getJSON(playlists.uri + '.json?client_id=' + o.soundcloud_clientId, { get_param: 'value' }, function(playlist) {
								$("<div class='player row' id='id" + i +"'><div class=' four columns'><div class='artwork'><img /></div></div><div class='playlist eight columns'><div class='description'></div><ol class='tracks'></ol></div></div>").appendTo('.soundcloud');
								//get track data
								$.each(playlist.tracks, function(index, track) {
									// Create a list item for track, associate it's data, and append it to the track list.
									var $li = $('<li class="track_' + track.id + '">' + (index + 1) + '. ' + track.title + '</li>').data('track', track).appendTo('#id'+i+' .tracks');
								// Find the appropriate stream url depending on whether the track has a secret_token or is public.
									url = track.stream_url;
									(url.indexOf("secret_token") == -1) ? url = url + '?' : url = url + '&';
									url = url + 'client_id=' + o.client_id;
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
			
		if (o.locked == 'twitter') {
			$.getScript("http://platform.twitter.com/widgets.js", function(){
				function handleTweetEvent(event){
					if (event) {
						alert("This is a callback from a tweet")
					}
				}	
				twttr.events.bind('tweet', handleTweetEvent);        
			});
		} else if (o.locked == 'facebook') {
			$.getScript("http://platform.twitter.com/widgets.js", function(){
				function handleTweetEvent(event){
					if (event) {
						alert("This is a callback from a tweet")
					}
				}	
				twttr.events.bind('tweet', handleTweetEvent);        
			});
		}
			
		
		});
	};
})(jQuery);