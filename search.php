<?php get_header(); ?>
              <div class="page-inner">
                <div class="page-main" id="pg-search">
                  <form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url() ); ?>">
                    <div class="search-box">
                      <input type="text" name="s" class="search-input" placeholder="キーワードを入力してください" value="<?php the_search_query(); // WordPressがフォームに入力された値を取得するためには、inputタグのname属性値を「s」にする必要がある ?>" />
                      <button type="submit" class="button button-submit">検索</button>
                    </div>
                  </form>
                  <div class="searchResult-wrapper">
                      <?php if ( get_search_query() ) : // 検索された文字列を取得する＝検索ワードの有無を判定する ?>
                        <div class="searchResult-head">
                          <h3 class="title">「<?php the_search_query(); ?>」の検索結果</h3>
                          <div class="total">
                              全<?php echo $wp_query->found_posts; // WP_Queryクラスの中で定義されている $found_postsというプロパティには取得した全記事数が格納されている ?>件
                          </div>
                        </div>
                      <?php endif; ?>
                    <ul class="searchResultLlist">
                        <?php
                        if ( have_posts() && get_search_query() ) : // 検索結果と検索キーワードが存在するか
                            while ( have_posts() ) : the_post();
                        ?>
                      <li class="searchResultLlist-item">
                        <a href="<?php the_permalink(); ?>">
                          <div class="item-wrapper">
                            <div class="image">
                                <?php
                                $image = get_the_post_thumbnail( $post->ID, 'search' );
                                if ( $image ) :
                                    echo $image;
                                else :
                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/img-noImage.png" />';
                                endif;
                                ?>
                                </div>
                                <dl>
                                  <dt><?php the_title(); ?></dt>
                                  <dd class="description"><?php echo get_the_excerpt(); ?></dd>
                                </dl>
                              </div>
                            </a>
                          </li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="pager">
                      <ul class="pagerList">
                          <?php page_navi(); ?>
                      </ul>
                    </div>
                    <?php elseif ( ! get_search_query() ) : ?>
                        <p>検索ワードが入力されていません。</p>
                    <?php else : ?>
                        <p>該当する記事は見つかりませんでした。</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
    <?php get_footer(); ?>