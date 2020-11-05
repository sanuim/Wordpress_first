<?php
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
global $post;
$args = array('category'=> $category_id, 'posts_per_page'=>64);
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