<?php
global $post;
$args = array( 's' => esc_html( get_search_query( false ) ), 'posts_per_page' => 16 );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

    <div class="col-md-6">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url('large'); ?>"/>
        </a>
        <div class="post-details">
            <h6><?php echo get_the_date('j F Y'); ?></h6>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p>
                <?php the_excerpt(); ?>
            </p>
        </div>
    </div>
    </div>

<?php endforeach;
wp_reset_postdata();?>