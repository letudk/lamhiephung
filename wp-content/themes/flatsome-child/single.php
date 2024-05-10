<?php
get_header(); ?>


<div class="row row-small">


<div class="large-9 col" style="background-color:rgb(248, 248, 248);">
	<div class="breadcrum">	<?php custom_breadcrumbs(); ?></div>
   <main>
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>">
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <?php
                        printf(
                            __('%1$s | %2$s', 'textdomain'),
                            get_the_date(),
                            get_the_author()
                        );
                        ?>
                        <?php if (get_the_time('U') !== get_the_modified_time('U')) {
                            echo ' | ' . __('Cập nhật lúc ', 'textdomain') . get_the_modified_time('m/d/Y');
                        } ?>
                    </div>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
              
              <?php echo do_shortcode(' [gdrts_stars_rating]'); ?>    Chia sẻ: <?php echo do_shortcode('[share]'); ?>
                </footer>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </main><!-- #main -->

</div>


	<div class="post-sidebar large-3 col" style="background-color:rgb(248, 248, 248);">
		<?php flatsome_sticky_column_open( 'blog_sticky_sidebar' ); ?>
		<?php get_sidebar(); ?>
		<?php flatsome_sticky_column_close( 'blog_sticky_sidebar' ); ?>
	</div>
</div>

<?php get_footer(); ?>