<article class="article-card">
	<a class="card-link" href="<?php echo get_term_link( $term ); // このファイルは include を使って呼び出されルことを前提として作成している。そのため呼び出し元で定義された変数 $term を参照する ?>">
		<div class="image">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-page-dummy.png">
		</div>
		<div class="body">
			<time><?php the_time( 'Y.m.d' ); ?></time>
			<p class="title"><?php echo $term->name; ?></p>
			<p class="excerpt"><?php echo $term->description; ?></p>
			<div class="buttonBox">
				<button type="button" class="seeDetail">More</button>
			</div>
		</div>
    </a>
</article>