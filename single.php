<?php get_header(); ?>

<?php $et_full_post = get_post_meta( $post->ID, '_et_full_post', true ); ?>

<div id="main-area">
	<div class="container">
		<div id="content-area" class="clearfix">
             <?php if ( is_singular( 'tests' ) )  { ?>

                <div id="full">
                    <?php get_template_part('loop', 'single'); ?>
                </div>

             <?php }else{ ?>

			    <div id="left-full">
			    <?php get_template_part('loop', 'single'); ?>
			    </div> 

			    <?php get_sidebar(); ?>

            <?php } ?>



		</div> <!-- end #content-area -->


	</div> <!-- end .container -->
</div> <!-- end #main-area -->

<?php get_footer(); ?>