<article class="article-card">
	<a class="card-link" href="<?php echo get_the_permalink(); ?>">
		<div class="image">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="body">
			<p class="title"><?php the_title(); ?></p>
			<p class="excerpt"><?php echo get_the_excerpt(); ?></p>
			<div class="buttonBox">
				<button type="button" class="seeDetail">More</button>
			</div>
		</div>
	</a>
</article>