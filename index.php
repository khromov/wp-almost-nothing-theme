<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <section>
            <!-- FIXME: Probably don't hard-code height / width, css instead... -->
            <header style="<?php echo (get_header_image()) ? "background: url('" . esc_url( get_header_image() ) . "'); width: " . get_custom_header()->width . "px; height: " . get_custom_header()->height ."px;" : ''?>">
                <?php if(is_home()): ?>
                    <!-- Get gravatar -->
                <?php endif; ?>
                <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
                <h2>
                    <?php bloginfo('description'); ?>
                </h2>
            </header>
            <!-- Primary navigation -->
            <nav>

            </nav>
        </section>
        <section>
            <footer>
                Hello!
            </footer>
        </section>
        <div class="container">
            <div class="title-header">
                <h1><?=get_bloginfo('name')?></h1>
            </div>
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
                                <div class="entry-meta">
                                    <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
                                </div>
                            <?php
                            endif;

                            if ( is_single() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                            endif;
                            ?>

                            <div class="entry-meta">
                                <?php
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                                    ?>
                                    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
                                <?php
                                endif;

                                edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
                                ?>
                            </div><!-- .entry-meta -->
                        </header><!-- .entry-header -->

                        <?php if ( is_search() ) : ?>
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-summary -->
                        <?php else : ?>
                            <div class="entry-content">
                                <?php
                                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                ) );
                                ?>
                            </div><!-- .entry-content -->
                        <?php endif; ?>

                        <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
                        </article><!-- #post-## -->
                    <?php
                    endwhile;
                    ?>
                </div><!-- #content -->
            </div><!-- #primary -->
        </div>
        <?php wp_footer(); ?>
    </body>
</html>