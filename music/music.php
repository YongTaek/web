<!DOCTYPE html>
<html>

<head>
	<title>Music Library</title>
	<meta charset="utf-8" />
	<link href="http://selab.hanyang.ac.kr/courses/cse326/2014/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
	<link href="http://selab.hanyang.ac.kr/courses/cse326/2014/labs/labResources/music.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<h1>My Music Page</h1>

	<!-- Ex 1: Number of Songs (Variables) -->
	<?php 
	$song_count = 5678;
	?> 
	<p>
		I love music.
		I have <?= $song_count ?> total songs,
		which is over <?= (int)($song_count/10) ?> hours of music!
	</p>

	<!-- Ex 2: Top Music News (Loops) -->
	<!-- Ex 3: Query Variable -->
	<?php
	$newspages = $_GET['newspages'];
	if(!isset($newspages)) {
		$newspages = 5;
	}
	?>
	<div class="section">
		<h2>Yahoo! Top Music News</h2>
		
		<ol>
			<?php for ($i = 1; $i <= $newspages; $i++) { ?>
			<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Ex 4: Favorite Artists (Arrays) -->
	<?php 
	$favoriteArtist = array("Guns N' Roses","Green Day", "Blink182");
	$favoriteArtist[] = "Queen";
	?>
	<!-- Ex 5: Favorite Artists from a File (Files) -->
	<?php
	$favoriteArtist = file("favorite.txt");
	?>
	<div class="section">
		<h2>My Favorite Artists</h2>
		
		<ol>
			<?php foreach ($favoriteArtist as $artist) { ?>
			<li><a href="http://en.wikipedia.org/wiki/<?= implode("_",explode(" ",$artist)); ?>"><?= $artist ?></a></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Ex 6: Music (Multiple Files) -->
	<?php
	$path = "lab5/musicPHP/songs/";
	$songs = glob("{$path}*.mp3");
	usort( $songs, function( $a, $b ) { return filesize($b) - filesize($a); } );
	?>
	<!-- Ex 7: MP3 Formatting -->
	<div class="section">
		<h2>My Music and Playlists</h2>

		<ul id="musiclist">
			<?php foreach ($songs as $song) {	?>
			<li class="mp3item">
				<a href="<?= $song ?>" download><?= basename($song)?></a><?=" (".(int)(filesize($song)/1000)."KB)" ?>
			</li>
			<?php } ?>
			<!-- Exercise 8: Playlists (Files) -->
			<?php 
				$playlists = glob("{$path}*.m3u");
				rsort($playlists);
				foreach ($playlists as $list) {	
					$songs = file($list);
			?>
			<li class="playlistitem"><?= basename($list)?>:
				<ul>
					<?php 
					shuffle($songs);
					foreach ($songs as $song) { 
					if(strpos($song, '#') === false) { ?>
					<li><?= $song?></li>
					<?php } } ?>
				</ul>
			</li>
			<?php } ?>

		</ul>
	</div>

	<div>
		<a href="http://validator.w3.org/check/referer">
			<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-html.png" alt="Valid HTML5" />
		</a>
		<a href="http://jigsaw.w3.org/css-validator/check/referer">
			<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-css.png" alt="Valid CSS" />
		</a>
	</div>
</body>
</html>
