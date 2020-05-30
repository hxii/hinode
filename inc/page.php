<div class="entry p1 df-c anim-i">
	<?php if ( $page->coverImage() ): ?>
		<div class="entry-image">
		<figure class="cover-image"><img alt="Cover Image" src="<?php echo $page->coverImage(); ?>"/></figure>
		</div>
	<?php endif ?>
<div class="entry-header ch70 mb2">
	<h1 class="entry-title mt2"><?php echo $page->title(); ?></h1>
	<?php if ( ! $page->isStatic() && ! $url->notFound() ): ?>
		<aside class="entry-meta mo">
		<?php echo $page->readingTime(); ?> read, posted <time datetime='<?php echo $page->date( 'Y-m-d H:i' ); ?>'><?php echo $page->date( 'D F jS Y' ); ?></time> in <a href="<?php echo $page->categoryPermalink(); ?>"><?php echo $page->categoryKey(); ?></a><?php 
			if ( $page->parent() ) {
				$parent = new Page($page->parent());
				echo ', Related to <a href="'. $parent->permalink() . '">' . $parent->title() . '</a>';
			}
		?>
		</aside>
	<?php endif; ?>
	<?php if ( ! empty( $page->description() ) ): ?>
		<div class="page-description"><?php echo $page->description(); ?></div>
	<?php endif; ?>
</div>
<div class="entry-content ch70">
	<?php echo $page->content(); ?>
</div>
<div class="entry-pagination mtb2 ch70 df-r b-t pt1">
	<?php 
	if ( $page->previousKey() ) {
		$prev_page = new Page($page->previousKey());
		echo "<div class='pagination-prev'><span class='disp'>Previously:</span> <a class='mo' rel='prev' href='{$prev_page->permalink()}'>{$prev_page->title()}</a></div>";
	}
	if ( $page->nextKey() ) {
		$next_page = new Page($page->nextKey());
		echo "<div class='pagination-prev'><span class='disp'>Next up:</span> <a class='mo' rel='prev' href='{$next_page->permalink()}'>{$next_page->title()}</a></div>";
	}
	?>
</div>

<?php if ( $config->show_sharing_links ): ?>
	<div class="entry-sharing ch70 mb2 ta-c b-t pt1">
		<span class="disp">Share this article via </span>
		<a class="share-twitter mo" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($page->title().' - '.$page->permalink()); ?>">Twitter</a>
		<span class="disp">or</span>
		<a class="share-facebook mo" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $page->permalink(); ?>">Facebook</a>
	</div>
<?php endif; ?>

<?php if ( $page->hasChildren() ): ?>
	<div class="entry-children ch70">
		<span class="disp">More about "<?php echo $page->title(); ?>": </span>
		<ul class="children ul-cs dib mo">
			<?php $children = $page->children();
			foreach ( $children as $child ): ?>
			<li><a href="<?php echo $child->permalink(); ?>"><?php echo $child->title(); ?></a></li>
			<?php endforeach; ?>
			</ul>
	</div>
<?php endif; ?>
<?php if ( $page->tags( true ) ): ?>
	<div class="entry-tags ch70">
		<span class="disp">Tags: </span>
		<ul class="ul-cs dib mo">
			<?php foreach( $page->tags( true ) as $tagKey=>$tagName ) :?>
				<li><a href="<?php echo DOMAIN_TAGS.$tagKey ?>" rel="tag"><?php echo $tagName ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
</div>