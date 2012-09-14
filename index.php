<?php
ob_start('ob_gzhandler');
?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<title>SkiBs the Kid - Official Site</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description=" content="The Official Website of SkiBs the Kid, an upcoming rap artist living in Hong Kong">

	<!-- Included CSS Files (Compressed) -->
	<link rel="stylesheet" href="includes/stylesheets/foundation.min.css">
	<link rel="stylesheet" href="includes/stylesheets/app.css">
	<link rel="stylesheet" href="includes/stylesheets/theme/style.css">

	<script type="text/javascript" src="includes/javascripts/jquery.js"></script>
    <script type="text/javascript" src="includes/javascripts/modernizr.foundation.js"></script>
	<script type="text/javascript" src="includes/javascripts/custom.js"></script>
	<script type="text/javascript" src="includes/javascripts/jquery.localscroll-1.2.7-min.js"></script>
	<script type="text/javascript" src="includes/javascripts/jquery.scrollTo-1.4.2-min.js"></script>
	<script type="text/javascript" src="includes/javascripts/jquery.inview.js"></script>
	<script type="text/javascript" src="includes/javascripts/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="includes/javascripts/projekktor.min.js"></script>
	<script type="text/javascript" src="includes/javascripts/jquery.twitter.js"></script>
	<script type="text/javascript" src="includes/javascripts/soundmanager2.js"></script>
	<link href='icon.ico' rel='shortcut icon' type='image/x-icon'/>

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<meta name="google-site-verification" content="aToFOiydp88Y11fsGB1gQuNcq7R3PnCNACM_6Eche4M" />
</head>
<body>


	<!--TITLE PAGE-->
	<div id="title" class="row hide-for-touch">
		<div class="twelve columns">
			<div id="nav2">
				<a href="#music" class="logo"></a>
			</div><!--title-->
			<div class="micro1"></div>
		</div>
	</div>

	
	<!--MUSIC PAGE-->
	<div id="music" class="row">
		<div class="eleven columns centered">
			<div class="two columns hide-for-small menu">
				<a href="#title" title="Home"><img src="includes/images/logo_skibsthekid.png" alt="SkiBs the Kid - Official Site"></a>
				<ul id="nav6" class="navi">
					<li class="active"><h3><a href="#music" title="Music">Music</a></h3></li>
					<li><h3><a href="#video" title="Multimedia">Videos</a></h3></li>
					<li><h3><a href="#about" title="Biography">About</a></h3></li>
					<li><h3><a href="#contact" title="Contact">Contact</a></h3></li>
				</ul>
				<div class="socialMain hide-for-touch">
					<fb:like href="http://www.facebook.com/SkiBsthekid" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
					<a href="https://twitter.com/skibs852" class="twitter-follow-button" data-show-count="false">Follow @skibs852</a>
				</div>
			</div>
			<div class="ten columns centered">
				<h1>Music</h1>
				<!-- Grid Example -->
				<div class="row">
					<div class="eleven columns centered">
						<div class="soundcloud row">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--VIDEO PAGE-->
	<div id="video" class="row">
		<div class="eleven columns centered">
			<div class="two columns hide-for-small menu">
				<a href="#title" title="Home"><img src="includes/images/logo_skibsthekid.png" alt="SkiBs the Kid - Official Site"></a>
				<ul id="nav3" class="navi">
					<li><h3><a href="#music" title="Music">Music</a></h3></li>
					<li class="active"><h3><a href="#video" title="Multimedia">Videos</a></h3></li>
					<li><h3><a href="#about" title="Biography">About</a></h3></li>
					<li><h3><a href="#contact" title="Contact">Contact</a></h3></li>
				</ul>
				<div class="socialMain hide-for-touch">
					<fb:like href="http://www.facebook.com/SkiBsthekid" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
					<a href="https://twitter.com/skibs852" class="twitter-follow-button" data-show-count="false">Follow @skibs852</a>
				</div>
			</div>
			<div class="ten columns centered">
				<h1>Videos</h1>
				<!-- Grid Example -->
				<div class="row">
					<div class="eleven columns centered">
						<div id="player_a" class="projekktor"></div>
					</div>
				</div>
				</br>
				<div class="row">
					<div class="twelve columns videos">
					<?php
						$feedURL = 'http://gdata.youtube.com/feeds/api/users/SkiBsandDXL/uploads?max-results=50';
						$sxml = simplexml_load_file($feedURL);
						$i=0;
						foreach ($sxml->entry as $entry) {
							$media = $entry->children('media', true);
							$watch = (string)$media->group->player->attributes()->url;
							$thumbnail = (string)$media->group->thumbnail[0]->attributes()->url;
					?>
						<div class="three columns video">
							<div class="videothumb">
								<a href="<?php echo $watch; ?>" class="watchvideo">
									<img src="<?php echo $thumbnail;?>" width="100%" alt="<?php echo $media->group->title; ?>" />
							</a>
							</div>
							<p><a href="<?php echo $watch; ?>" class="watchvideo"><?php echo $media->group->title; ?></a></p>
				
	 					</div>
 					<?php } ?>
 					</div>
				</div>
			</div>
		</div>
	</div>


	<!--ABOUT PAGE-->
	<div id="about" class="row">
		<div class="eleven columns centered">
			<div class="two columns hide-for-small menu">
				<a href="#title" title="Home"><img src="includes/images/logo_skibsthekid.png" alt="SkiBs the Kid - Official Site"></a>
				<ul id="nav4" class="navi">
					<li><h3><a href="#music" title="Music">Music</a></h3></li>
					<li><h3><a href="#video" title="Multimedia">Videos</a></h3></li>
					<li class="active"><h3><a href="#about" title="Biography">About</a></h3></li>
					<li><h3><a href="#contact" title="Contact">Contact</a></h3></li>
				</ul>
				<div class="socialMain hide-for-touch">
					<fb:like href="http://www.facebook.com/SkiBsthekid" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
					<a href="https://twitter.com/skibs852" class="twitter-follow-button" data-show-count="false">Follow @skibs852</a>
				</div>
			</div>
			<div class="ten columns centered">
				<h1>About SkiBs</h1>
				<!-- Grid Example -->
				<div class="row">
					<div class="eight columns">
						<div class="panel">
							<p>17 year old Lucas “SkiBs” Scibetta is an American rapper that is based in Hong Kong. On April 19th, 1995 Lucas was born in New York City, and since then he has lived in Tokyo, London and now Hong Kong. Over the years Lucas has adapted to overseas life and had the opportunity to learn Japanese and travel to over 35 countries.</p>

<p>SkiBs has been surrounded by music from all over the world, but he found his talents in Hip-Hop as he has been writing since a very young age. Hong Kong producer DXL heard SkiBs freestyle in 2010 and they have been working together ever since. On 11/11/11 SkiBs released his first mixtape “The Pink Slip”, which helped him generate a small buzz both online and around Hong Kong. Since then SkiBs has been performing at venues around Hong Kong, growing as an artist and working on his upcoming projects.</p>

<p>SkiBs' style stands out in Hong Kong's music scene and his music innovates the cities developing Hip Hop appreciation. His passion for what he does accompanies him as he pushes the barrier between unknown artists and success.</p></br>
<blockquote>
  "Yeah man, I just live life have fun cause thats what imma want when this whole things done." 
  <cite>Lucas “SkiBs” Scibetta, 2012</cite>
</blockquote>
						</div>
					</div>
					<div class="four columns">
						<div class="panel">
							<div id="twitter"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<img src="includes/images/cover.jpeg" class="borderDouble white placeCenter" alt="SkiBs and the Crew" width="100%">
				</div>
			</div>
		</div>
	</div>

	<!--CONTACT PAGE-->
	<div id="contact" class="row">
		<div class="eleven columns centered">
			<div class="two columns hide-for-small menu">
				<a href="#title" title="Home"><img src="includes/images/logo_skibsthekid.png" alt="SkiBs the Kid - Official Site"></a>
				<ul id="nav5" class="navi">
					<li><h3><a href="#music" title="Music">Music</a></h3></li>
					<li><h3><a href="#video" title="Multimedia">Videos</a></h3></li>

					<li><h3><a href="#about" title="Biography">About</a></h3></li>
					<li class="active"><h3><a href="#contact" title="Contact">Contact</a></h3></li>
				</ul>
				<div class="socialMain hide-for-touch">
					<fb:like href="http://www.facebook.com/SkiBsthekid" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
					<a href="https://twitter.com/skibs852" class="twitter-follow-button" data-show-count="false">Follow @skibs852</a>
				</div>
			</div>
			<div class="ten columns centered">
				<h1>Contact</h1>
				<!-- Grid Example -->
				<div class="row">
					<div class="eight columns">
						<form method="post" action="index.php">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Enter your name" />
							<label>Subject:</label>
							<input type="text" name="subject" class="twelve" placeholder="Subject" />
							<textarea name="comment" style="height: 300px;"></textarea>
							<div class="ten columns push-two">
								<div class="row collapse">
									<div class="eight mobile-three columns">
										<input type="text" name="email" placeholder="Your email"/>
									</div>
									<div class="four mobile-one columns">
										<button value="Submit" type="submit" class="postfix secondary button expand" >Email Me</button>
									</div>
								</div>
							</div>  
						</form>
					</div>
					<div class="four columns">
						<div class="panel">
							<h2>More Info</h2>
							<hr>
							<p>
							<span class="subheader">Email:</span> </br> <a href="mailto:skibsdxl@gmail.com">skibsdxl@gmail.com</a>
							</p>
							<p>
							<span class="subheader">Facebook:</span> </br> <a href="https://www.facebook.com/SkiBsthekid">www.facebook.com/SkiBsthekid</a>
							</p>
							<p>
							<span class="subheader">Youtube:</span> </br> <a href="http://www.youtube.com/user/SkiBsandDXL">www.youtube.com/user/SkiBsandDXL</a>
							</p>
							<p>
							<span class="subheader">Soundcloud:</span> </br> <a href="http://soundcloud.com/skibsthekid">www.soundcloud.com/skibsthekid</a>
							</p>
							<p>
							<span class="subheader">Instagram:</span> </br> <a href="http://instaview.me/user/skibsthekid/">www.instaview.me/user/skibsthekid/</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<div class="row" id="footer">
		<div class="eight columns hide-for-small">
			<p>This website and its content is copyright of SkiBs the Kid - © SkiBs the Kid 2012. All rights reserved. Images courtesy of Alexander Stoeckle.</p>
		</div>
		<div class="four columns">
			<a href="http://www.keiranlovett.com/?utm_source=SkibsTheKid&utm_medium=website&utm_campaign=SkibsSite"><img class="logo" src="includes/images/Designby.png" alt="Designed by Keiran Lovett"></a>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function() {
	projekktor('#player_a', {
	useYTIframeAPI: false,
	height: 452,
	plugin_display: {
   		logoImage: "includes/images/transIcon.png"
	},
	controls: true,
	playlist: [{0:{src:'includes/proxy.php?url=http://gdata.youtube.com/feeds/base/users/SkiBsandDXL/uploads?alt=rss&amp;v=2&amp;orderby=published', type:"text/xml"}}],
	reelParser: function(xmlDocument) {
		var result = {};
		var regMatch = new RegExp("http:[^ ,]+\.jpg");
		result['playlist'] = [];
		$(xmlDocument).find("item").each(function() {
		try {
			result['playlist'].push({
			0:{
				src: $(this).find('link').text(),
				type: 'video/youtube'
			},
			config: {
				poster: regMatch.exec(unescape( $(this).find('description').text())),
				title: $(this).find('title').text(),
				desc: $(this).find('description').text()
			}
			});
		} catch(e){}
		});
		return result;
	}
	});
 });
 
  $("#twitter").getTwitter({
		userName: "skibs852",
		numTweets: 6,
		loaderText: "Loading tweets…",
		slideIn: true,
		slideDuration: 450,
		showHeading: false,
		showProfileLink: false,
		showTimestamp: true
	});
 
</script>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23783984-5']);
  _gaq.push(['_trackPageview', location.pathname + location.search + location.hash]);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=185324271585974";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php if (isset($_REQUEST['email'])) {
	$name_field =  stripslashes($_POST['name']);
	$email_field =  stripslashes($_POST['email']);
	$subject =  stripslashes($_POST['subject']);
	$message = stripslashes($_POST['comment']);
	$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";
	mail("skibsdxl@gmail.com,kvclovett@gmail.com","SkiBs Site Email: ".$subject,$body,"From: webmaster@keiranlovett.com");
} ?>
    <script type="text/javascript" src="includes/javascripts/application.js"></script>

<script type="text/javascript">
  var GoSquared = {};
  GoSquared.acct = "GSN-061428-M";
  (function(w){
    function gs(){
      w._gstc_lt = +new Date;
      var d = document, g = d.createElement("script");
      g.type = "text/javascript";
      g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
      var s = d.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(g, s);
    }
    w.addEventListener ?
      w.addEventListener("load", gs, false) :
      w.attachEvent("onload", gs);
  })(window);
</script>

<script type="text/javascript">
$(document).ready(function() {
$('#id2').detach().insertAfter('#id1'); 
  });    
</script>

</body>
</html>
<?php
ob_end_flush();
?>