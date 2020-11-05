<!DOCTYPE html>
<html lang="pl">
<head>
    <title>My page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark align-center">
    <a class="navbar-brand" href="#">
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $image_url = $image[0];
        ?>
        Navbar
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'my_extra_menu_class','my_menu_li_class' => 'nav-item',
            'my_menu_a_class' => 'nav-link',"menu_class" => "navbar-nav" ) );?>
    </div>
</nav>
<!--<div class="container mt-5 p-3 w-25 border border-info rounded bg-light">-->
<!--<form>-->
<!--  <div class="form-group">-->
<!--    <label for="email">Email address</label>-->
<!--    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">-->
<!--    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
<!--  </div>-->
<!--  <div class="form-group">-->
<!--    <label for="password">Password</label>-->
<!--    <input type="password" class="form-control" id="password" placeholder="Password">-->
<!--  </div>-->
<!--  <button type="submit" class="btn btn-primary mt-3">Submit</button>-->
<!--</form>-->
<!--</div>-->
<div id="main" class="container mt-5">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div id="post" class="container p-5 border rounded">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<div id="main" class="container mt-5">
    <img src="<?php the_post_thumbnail_url("large"); ?>">
    <?php comment_form(); ?>
    <?php
    //Pobieramy tylko zaakceptowane w panelu komentarze
    $thispost = get_the_ID();
    $args = array(
        'status' => 'approve',
        'post_id' => $thispost,
        'orderby' => 'comment_date_gmt',
        'order' => 'ASC',
    );
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
    if ( $comments ) {
        foreach ( $comments as $comment ) {?>
            <div class="comment">
                <h4><a href="<?php echo comment_author_url(); ?>" rel="nofollow noopener noreferrer external" target="_blank"><?php comment_author(); ?></a></h4>
                <p><?php comment_date(); ?></p>
                <p class="comment-content"><?php echo $comment->comment_content; ?></p>
            </div>
            <?php
        }
    } else {
        echo 'Brak komentarzy.';
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>