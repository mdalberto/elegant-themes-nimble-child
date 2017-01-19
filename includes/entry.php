<?php
$i = 1;
$open_row = false;
if ( have_posts() ) : while ( have_posts() ) : the_post();
        $last_class = $i % 2 == 0 ? ' last' : '';
        if ( ( $i + 1 ) % 2 == 0 ){
            echo '<div class="row clearfix">';
            $open_row = true;
        }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry clearfix' . $last_class ); ?>>
    <?php
		$index_postinfo = et_get_option( 'nimble_postinfo1' );

		$thumb = '';
		$width = (int) apply_filters('et_blog_image_width',266);
		$height = (int) apply_filters('et_blog_image_height',266);
		$classtext = '';
		$titletext = get_the_title();
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Blogimage');
		$thumb = $thumbnail["thumb"];
    ?>

    <?php if ( 'on' == et_get_option('nimble_thumbnails_index','on') && '' != $thumb ){ ?>
    <div class="post-thumbnail portfolio-image">
        <a href="<?php the_permalink(); ?>">
            <?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
            <span class="overlay"></span>
        </a>
        <span class="comments_count"><?php comments_popup_link( '0', '1', '%' ); ?></span>
    </div>  <!-- end .post-thumbnail -->
    <?php } ?>

    <div class="post-title">
        <h2 class="title">
            <a href="<?php the_permalink(); ?>">

                <?php /* ?> This is the Number block start <?php */ ?>

                    <?php if ( is_post_type_archive( 'hypotheses' ) )  { ?>
                            <div class="postId">
                            <?php if( get_field('hypothesis_number') ): ?>
                                <div class="postIdType">HYPOTHESIS</div>
                                <div class="postIdNumb"><?php the_field( 'hypothesis_number' ); ?></div>
                             <?php endif; ?>
                            <?php /* ?><?php the_ID(); ?><?php */ ?> <span class="raquo">»</span> </span> 
                        </div>
                    <?php } ?>


                    <?php if ( is_post_type_archive( 'tests' ) )  { ?>
                        <div class="postId">
                        <?php if( get_field('test_number') ): ?>
                            <div class="postIdType">TEST</div>
                            <div class="postIdNumb"><?php the_field( 'test_number' ); ?></div>
                         <?php endif; ?>
                        <?php /* ?><?php the_ID(); ?><?php */ ?> <span class="raquo">»</span> </span> 


                        </div>
                    <?php } ?>
                <?php /* ?> This is the Number block end <?php */ ?>




                <?php the_title(); ?>
            </a>


        </h2>

        <p class="meta-info">Date created: <strong><?php the_field( 'hypothesis_date' ); ?> </strong>| Author: <strong><?php the_field( 'author' ); ?></strong> </p>
        <?php /*
            if ( $index_postinfo ){
            echo '<p class="meta-info">';
            et_postinfo_meta( $index_postinfo, et_get_option('nimble_date_format'), esc_html__('0 comments','Nimble'), esc_html__('1 comment','Nimble'), '% ' . esc_html__('comments','Nimble') );
            echo '</p>';
            }
         */ ?>
    </div>

    <div class="post_content clearfix">
        <?php if ( 'on' == et_get_option('nimble_blog_style') ) the_content(''); else echo '<p>' . truncate_post(210,false) . '</p>'; ?>

        

        <?php if ( is_post_type_archive( 'hypotheses' ) )  { ?>
            <div class="teaserCaption">Hypothesis: <?php the_field( 'hypothesis' ); ?></div>
        <?php } ?>

        <a href="<?php the_permalink(); ?>" class="learn-more"><?php esc_html_e( 'Full Details', 'Nimble' ); ?></a>
    </div> <!-- end .post_content -->
</article> <!-- end .entry -->
<?php
        if ( $i % 2 == 0 ){
            echo '</div> <!-- end .row -->';
            $open_row = false;
        }
        $i++;
    endwhile;
	if ( $open_row ) echo '</div> <!-- end .row -->';

	if ( function_exists('wp_pagenavi') ) { wp_pagenavi(); }
	else { get_template_part( 'includes/navigation', 'entry' ); }
else:
	get_template_part( 'includes/no-results','entry' );
endif;
?>