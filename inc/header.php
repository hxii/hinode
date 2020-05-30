<header class="mb2 ptb2">
	<div class="logo">
		<a href="<?php echo Theme::siteUrl() ?>">
			<?php echo ( $site->logo() )? "<img src='{$site->logo()}' alt='{$site->title()}'>" : ''; ?>
			<?php echo ( $config->show_site_name_logo )? "<span>{$site->title()}</span>" : ''; ?>
		</a>
		<?php if ( $config->show_site_slogan ): ?>
			<div class="slogan"><?php echo $site->slogan(); ?></div>
		<?php endif; ?>
	</div>

	<input type="checkbox" id="menu" name="menu">
	<label for="menu"><div class="menu-button"><?php echo $config->menu_icon; ?></div></label>

	<nav class="main-navigation">
		<ul>
			<?php 
				if ( $config->show_categories_in_menu ) {
					$categories = getCategories();
					foreach ( $categories as $category ) {
						if ( count( $category->pages() ) ) {
							echo "<li><a href='{$category->permalink()}'>{$category->name()}</a></li>";
						}
					}
				}
			?>
			<?php foreach ( $staticContent as $staticPage ) {
				if ( $config->show_all_static_pages_in_menu || $staticPage->custom('show_in_menu') ) {
						echo "<li><a href='{$staticPage->permalink()}' title=''>{$staticPage->title()}</a></li>";
				}
			} ?>
		</ul>
	</nav>
</header>
