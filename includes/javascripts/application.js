var client_id = "bcc776e7aa65dbc29c40ff21a1a94ecd",
	page_title = document.title,
	user = 'skibsthekid',
	messageTimer = 0,
	lock = false;

soundManager.url = "includes/swfs/";
soundManager.flashVersion = 9;
soundManager.useFlashBlock = false;
soundManager.useHighPerformance = true;
soundManager.wmode = 'transparent';
soundManager.useFastPolling = true;

soundManager.onready(function() {

//Get playlists from account
$.getJSON('http://api.soundcloud.com/users/'+ user +'/playlists.json?client_id=' + client_id, { get_param: 'value' }, function(data_playlists) {
	$.each(data_playlists, function(index, playlists) {
		//Get playlists data
		i = 1;
		console.log(playlists.uri);
		$.getJSON(playlists.uri + '.json?client_id=' + client_id, { get_param: 'value' }, function(playlist) {
			
			$("<div class='player row' id='id" + i +"'><div class=' four columns'><div class='artwork'><img /></div></div><div class='playlist eight columns'><div class='description'></div><ol class='tracks'></ol></div></div>").appendTo('.soundcloud');
			
			//get track data
			$.each(playlist.tracks, function(index, track) {
				// Create a list item for track, associate it's data, and append it to the track list.
				var $li = $('<li class="track_' + track.id + '">' + (index + 1) + '. ' + track.title + '</li>').data('track', track).appendTo('#id'+i+' .tracks');
			// Find the appropriate stream url depending on whether the track has a secret_token or is public.
				url = track.stream_url;
				(url.indexOf("secret_token") == -1) ? url = url + '?' : url = url + '&';
				url = url + 'client_id=' + client_id;
				var s = soundManager.createSound({
					// ### Sound Defaults		
					// * Auto load the first track
					autoLoad: (index == 0),
					id: 'track_' + track.id,
					multiShot: false,
					url: url,
					volume: 100,
					// ### Sound Functions
						// **On Play** swap the waveform image, change the page title, and adjust the buffer if it's fully loaded.
					onplay: function() {
						document.title = '\u25B6 ' + track.title;
					},
					// **On Resume** change the page title, and adjust the buffer if it's full loaded.
					onresume: function() {
						document.title = '\u25B6 ' + track.title;
					},
					// **On Stop** revert the page title to default and set buffer and played's width to 0
					onstop: function() {
						document.title = page_title;
					},
					// **On Pause** revert the page title
					onpause: function() {
						document.title = page_title;
					},
					// **On Finish** jump to the next track
					onfinish: function() {
						nextTrack(i);
					}
				});
			});
			
			if (playlist.downloadable) {
				$("<a href='"+ playlists.purchase_url+"' class='postfix secondary button expand' >Download Album</a>").appendTo('#id'+i+' .four');
			} 
			if (playlist.artwork_url) {
				$('#id'+i).find('.artwork img').attr('src', playlist.artwork_url.replace('-large', '-crop'));
			} else {
				$('#id'+i).find('.artwork img').attr('src', "http://i1.sndcdn.com/artworks-000017199115-fganhh-crop.jpg?6425e9e");
			}
			$('.artwork').fadeIn('slow');
			$('#id'+i).find('.avatar img').attr('src', playlist.user.avatar_url.replace('-large', '-badge'));
			$('#id'+i).find('.description').html('<h2>' + playlist.title + '</h2>');
			i++

		});
	});
});

// Bind a *click* event to each list item in the track list
$('.tracks li').live('click', function() {
	$('.tracks li span').replaceWith('');
	$(this).prepend('<span>\u25B6   </span> ');
	// Create variables for the track, its data, and whether or not it's playing
	var $track = $(this),
		data = $track.data('track'),
		playing = $track.is('.playing');
	// If is it playing, pause it.
	if (playing) {
		soundManager.pause('track_' + data.id);
		// If not, stop all other sounds that might be playing, and play the clicked sound.			
	} else {
			soundManager.stopAll();
	
		$track.addClass('active').siblings('li').removeClass('active');
		soundManager.play('track_' + data.id);
	}
	// Toggle the playing class and remove it from any other list items.
	$track.toggleClass('playing').siblings('li').removeClass('playing');
});

// Loads the next track or first if there isn't a next track
var nextTrack = function(i) {
	soundManager.stopAll();
	if ($('li.active').next().click().length == 0) {
		$('#id'+i).find('.tracks li:first').click();
	}
}



});