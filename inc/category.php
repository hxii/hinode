<h1 class="page-title mb2">
	<?php
	$categories = new Categories();
	$category_key = $url->slug();
	$category = new Category( $category_key );
	echo $category->name(); ?>
</h1>
<?php if ( ! empty( $category->description() ) ): ?>
	<div class="page-description mb2"><?php echo $category->description(); ?></div>
<?php endif; ?>
<div class="entry-list mb2">
	<?php foreach ( $content as $page ): ?>
		<div class="entry p1">
		<?php if ( $page->coverImage() ): ?>
			<div class="entry-image mb1">
				<img src="<?php echo $page->coverImage(); ?>" loading="lazy">
			</div>
		<?php endif; ?>
			<div class="entry-title"><h2><a href="<?php echo $page->permalink(); ?>"><?php echo $page->title(); ?></a></h2></div>
			<div class="entry-meta db mo mb1"><time><?php echo $page->date( "F jS Y" ); ?></time>
				<?php if ( $page->categoryKey() ): ?>
					- <a href="<?php echo $page->categoryPermalink(); ?>"><?php echo $page->categoryKey(); ?></a>
				<?php endif; ?>
			</div>
			<div class="entry-description mb1">
				<?php if ( $page->description() ) {
					echo $page->description();
				} elseif ( $config->show_entry_list_excerpt ) {
					$raw = strip_tags( $page->contentRaw() );
					echo implode(' ', array_slice(explode(' ', $raw), 0, $config->excerpt_length)) . '...';
				} ?>
				
			</div>
			<a class="db" href="<?php echo $page->permalink(); ?>">Read More →</a>
		</div>
	<?php endforeach; ?>
</div>