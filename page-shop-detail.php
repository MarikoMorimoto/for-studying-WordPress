<?php
/*
Template Name: 店舗詳細
*/
get_header(); // カスタムページテンプレートと認識されるためには、phpファイルの先頭で上記のようにコメントで Template Name:[テンプレート名] という記述が必要
?>
              <div class="page-inner full-width">
                <div class="page-main" id="pg-shopDetail">
                  <div class="lead-inner">
                    <?php
                    if ( have_posts() ) :
                      while ( have_posts() ) : the_post();
                        the_content();
                      endwhile;
                    endif;
                    ?>
                    <div class="bg-shop"></div>
                  </div>
                  <div class="shopList-Container">
                    <div class="shopList-head">
                      <span class="title-en"></span>
                      <h3 class="title">ショップリスト</h3>
                    </div>
                    <div class="shopList-inner">
                      <ul class="shopList">
                          <?php
                          if ( function_exists( 'have_rows' ) && have_rows( 'first_shop_detail') ) :
                              while ( have_rows( 'first_shop_detail' ) ) : the_row();
                          ?>
                        <li class="shopList-item">
                          <div class="shop-image">
                              <?php
                              $image_id = get_sub_field( 'shop_img' );
                              echo wp_get_attachment_image( $image_id, 'shop-detail' );
                              ?>
                          </div>
                          <div class="shop-body">
                            <p class="shop-title"><?php the_sub_field( 'shop_name' ); ?></p>
                            <p class="shop-caption"><?php the_sub_field( 'shop_strength' ); ?></p>
                            <div class="shop-detail">
                              <dl>
                                <dt>営業時間</dt>
                                <dd><?php the_sub_field( 'shop_hours' ); ?></dd>
                              </dl>
                              <dl>
                                <dt>フロア情報</dt>
                                <dd><?php the_sub_field( 'floor_info' ); ?></dd>
                              </dl>
                            </div>
                          </div>
                        </li>
                          <?php
                              endwhile;
                              endif;

                              if ( function_exists( 'have_rows' ) && have_rows( 'second_shop_detail' ) ) :
                                  while ( have_rows( 'second_shop_detail' ) ) : the_row();
                          ?>
                        <li class="shopList-item">
                          <div class="shop-image">
                              <?php
                              $image_id = get_sub_field( 'shop_img' );
                              echo wp_get_attachment_image( $image_id, 'shop-detail' );
                              ?>
                          </div>
                          <div class="shop-body">
                            <p class="shop-title"><?php the_sub_field( 'shop_name' ); ?></p>
                            <p class="shop-caption"><?php the_sub_field( 'shop_strength' ); ?></p>
                            <div class="shop-detail">
                              <dl>
                                <dt>営業時間</dt>
                                <dd><?php the_sub_field( 'shop_hours' ); ?></dd>
                              </dl>
                              <dl>
                                <dt>フロア情報</dt>
                                <dd><?php the_sub_field( 'floor_info'); ?></dd>
                              </dl>
                            </div>
                          </div>
                        </li>
                          <?php
                              endwhile;
                              endif;
                          ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
<?php get_footer(); ?>