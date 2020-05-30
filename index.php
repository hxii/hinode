<?php $config = require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $loadtime = microtime(true); ?>
		<!--
			日の出 - Hinode
			by hxii (paul@glushak.net)
		-->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="shortcut icon" href="<?php echo $config->favicon; ?>">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Roboto+Mono&family=Rufina:wght@700&display=swap" rel="stylesheet">
		<?php echo Theme::metaTags( 'title' ); ?>
		<?php echo Theme::metaTags( 'description' ); ?>
		<?php if (Theme::rssUrl()) {
			echo '<link rel="alternate" type="application/rss+xml" title="Subscribe to RSS" href="'.Theme::rssUrl().'" />';
		} ?>
		<?php echo ($WHERE_AM_I === 'page')? '<meta name="keywords" content="'.$page->tags( false ).'">' : ''; ?>
		<?php 
		$user = new User('admin');
		echo '<meta name="author" content="'.$user->firstName().' ' . $user->lastName(). '">'; ?>
		<?php echo Theme::css( 'css/style.css' ); ?>
		<?php Theme::plugins( 'siteHead' ) ?>
	</head>
	<body>
		<div class="container<?php echo ( $page->template() )? ' template-'.$page->template() : ''; ?>">
			<?php Theme::plugins( 'siteBodyBegin' ) ?>
			<?php include( 'inc/header.php' ); ?>
			<?php if ( $WHERE_AM_I === 'page' ) {
				if ( ! empty( $page->template() ) && file_exists( PATH_THEMES.$site->theme().'/inc/'.$page->template().'.php' ) ) {
					include( "inc/{$page->template()}.php" );
				} else {
					include( 'inc/page.php' );
				}
			} elseif ( $WHERE_AM_I === 'category' ) {
				include( 'inc/category.php' );
			} elseif ( $WHERE_AM_I === 'tag' ) {
				include ( 'inc/tag.php' );
			} else {
				include( 'inc/home.php' );
			} ?>
			<?php include( 'inc/footer.php' ); ?>
		</div>
	</body>
</html>
