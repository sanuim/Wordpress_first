<?php
$thistag_id = get_queried_object()->term_id;
global $post;
$args = array('tag_id'=> $thistag_id, 'posts_per_page'=>32);
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