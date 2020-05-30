<footer class="mtb2 p1">
	<div class="footer-widgets mb1">
		<?php Theme::plugins( 'siteSidebar' ) ?>
		<?php if ( $config->show_social_links ): ?>
			<div class="social">
				<?php foreach ( Theme::socialNetworks() as $key=>$label ) : ?>
					<a href="<?php echo $site->{$key}(); ?>"><?php echo '<img src="'.$config->{$key.'_icon'} .'">'; ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php Theme::plugins( 'siteBodyEnd' ); ?>
	<span class="loading-time"><?php echo round( ( microtime( true ) - $loadtime )*1000, 4 ) . 'ms'; ?></span>
	<div class="copyright"><?php echo $site->footer(); ?></div>
</footer>
