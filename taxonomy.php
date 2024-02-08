<?php get_header(); ?>
	<div class="page-inner">
		<div class="page-main" id="pg-contribution">
			<div class="contribution">
				<?php
				$term = get_specific_post( 'daily_contribution', 'event', $term, -1 );
				// taxonomy.php や taxonomy-[taxonomy].php などのカスタムタクソノミーのテンプレートでは、 $term に閲覧しているタームのスラッグが自動的に格納される。
				if ( $term->have_posts() ) :
					while ( $term->have_posts() ) : $term->the_post();
						get_template_part( 'content-tax' );
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>