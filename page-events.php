<?php
get_header();

use App\Constants;

?>
<?php get_sidebar(); ?>
    <div class="row content-page">
        <div class="col-md-9 content">
            <?php if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p class="breadcrumb">', '</p>');
            } ?>
            <?php if (have_posts()): ?>
                <?php while (have_posts()):the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php get_template_part('include/events'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer(); ?>