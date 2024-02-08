<?php get_header(); ?>
	<div class="page-inner">
		<div class="page-main" id="pg-contribution">
			<div class="contribution">
				<?php
				$terms = get_terms( 'event' );
				foreach ( $terms as $term ) :
					include 'content-contribution.php'; // phpの組み込み関数 include を使えば、呼び出されたファイルが呼び出し元の変数を参照できる。
				endforeach;
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>