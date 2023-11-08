<a class="news-link" href="<?php the_permalink(); ?>">
	<div class="news-body">
		<time class="release"><?php the_time( 'Y.m.d' ); ?></time>
		<p class="title"><?php echo get_the_title(); ?></p>
	</div>
</a>