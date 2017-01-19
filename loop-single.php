<?php if ( have_posts() ) while ( have_posts() ) :
              the_post(); ?>
	<?php if (et_get_option('nimble_integration_single_top') <> '' && et_get_option('nimble_integrate_singletop_enable') == 'on') echo (et_get_option('nimble_integration_single_top')); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php
              $thumb = '';
              $post_type = get_post_type( get_the_ID() );
              $et_full_post = get_post_meta( get_the_ID(), '_et_full_post', true );
              $width = (int) apply_filters('et_blog_image_width',621);
              if ( 'on' == $et_full_post ) $width = (int) apply_filters( 'et_single_fullwidth_image_width', 960 );
              $height = (int) apply_filters('et_blog_image_height',320);
              if ( 'project' == $post_type ) $height = (int) apply_filters('et_project_single_image_height',9999);
              $classtext = '';
              $titletext = get_the_title();
              $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Projectimage');
              $thumb = $thumbnail["thumb"];
    ?>

	<?php if ( '' != $thumb && 'on' == et_get_option( 'nimble_thumbnails' ) ) { ?>
		<div class="post-thumbnail">
		<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
			<span class="overlay"></span>
		</div> 	<!-- end .post-thumbnail -->
	<?php } ?>

        <div class="post_content">

            <?php if ( is_singular( 'hypotheses' ) )  { ?>

                <?php if( get_field('number') ): ?>
                      <div class="hy-meta"><?php the_field( 'number' ); ?></div>
                 <?php endif; ?>
                <?php if( get_field('hypothesis') ): ?>
                      <div class="hy-title">Hypothesis: </div>
                      <div class="hy-meta"><?php the_field( 'hypothesis' ); ?></div>
                 <?php endif; ?>

                 <?php if( get_field('hypothesis_date') ): ?>
                      <div class="hy-title">Date: </div>
                      <div class="hy-meta"><?php the_field( 'hypothesis_date' ); ?></div>
                 <?php endif; ?>


                 <?php if( get_field('hypothesis') ): ?>
                      <div class="hy-title">Hypothesis: </div>
                      <div class="hy-meta"><?php the_field( 'hypothesis' ); ?></div>
                 <?php endif; ?>

                 <?php if( get_field('hypothesis') ): ?>
                      <div class="hy-title">Hypothesis: </div>
                      <div class="hy-meta"><?php the_field( 'hypothesis' ); ?></div>
                 <?php endif; ?>

                <?php $fields = get_field_objects(); ?>
	            <?php foreach( $fields as $field ): ?>

		            <?php if( $field['value'] ): ?>
			            <span class="hy-title"><?php echo $field['label']; ?></span> <div class="hy-meta"><?php echo $field['value']; ?></div>
		            <?php endif; ?>

	            <?php endforeach; ?>
            <?php } ?>

            <?php if ( is_singular( 'tests' ) )  { ?>

            		<div class="hy-grouping">
                        <?php
                            $value = get_field( "hypothesis_link" );

                            if( $value ) {
                        
                                echo '<div class="link-to-link"><a class="learn-more" href="' . $value . '" >View The Hypothesis</a></div>';

                            } else {

                                echo 'You Have No Hypotheses Attached To This Test Yet';
                        
                            }
                        ?>
                        <div class="test-top-section">

                            <?php if( get_field('test-pagetype') ): ?>
                              <div class="t-title">Page Type: </div>
                              <div class="t-meta"><?php the_field( 'test-pagetype' ); ?></div>
                            <?php endif; ?>   

                            <?php if( get_field('primary_metric') ): ?>
                              <div class="t-title">Primary Metric: </div>
                              <div class="t-meta"><?php the_field( 'primary_metric' ); ?></div>
                            <?php endif; ?>   

                          <?php if( get_field('type_of_test') ): ?>
                              <div class="t-title">Type of Test: </div>
                              <div class="t-meta"><?php the_field( 'type_of_test' ); ?></div>
                           <?php endif; ?>

                          <?php if( get_field('page_type') ): ?>
                              <div class="t-title">Type of Page: </div>
                              <div class="t-meta"><?php the_field( 'page_type' ); ?></div>
                           <?php endif; ?>
                     

                        </div>

                        <?php if( get_field('test_description') ): ?>
				              <?php /* ?>
                        <div class="hy-title">Test Description: 
                                  <span style="color:gray; font-size:12px;font-weight:normal">(Provide a short overview of the specifics of the test.)</span> 
  			                </div>
                      <?php */?>
                            <div class="hy-meta"><?php the_field( 'test_description' ); ?></div>
                        <?php endif; ?>



                        <?php if( get_field('length_of_test') ): ?>
			                <div class="hy-title">Length of Test: 
                                <span>(How long will the test run for?)</span> 
			                </div>
                            <div class="hy-meta"><?php the_field( 'length_of_test' ); ?> </div>
                        <?php endif; ?>

                        <?php if( get_field('test_start_date') ): ?>
                            <div class="hy-title">Test Start Date:</div>
                            <div class="hy-meta"><?php the_field( 'test_start_date' ); ?> </div>
                        <?php endif; ?>


                        <?php if( get_field('test_end_date') ): ?>
                            <div class="hy-title">Test End Date:</div>
                            <div class="hy-meta"><?php the_field( 'test_end_date' ); ?> </div>
                        <?php endif; ?>

                        <?php if( get_field('measurements') ): ?>
			                <div class="hy-title">Measurements 
                                <span>(What is being measured? How are we measuring it? How often are we measuring it? Who is responsible for measuring it?)</span> 
			                </div> 
                            <div class="hy-meta"><?php the_field( 'measurements' ); ?> </div> 
                        <?php endif; ?>

                        <?php if( get_field('what_is_the_metrics') ): ?>
			                <div class="hy-title">Testing Tool: </div>
                            <div class="hy-meta"><?php the_field( 'what_is_the_metrics' ); ?> </div> 
                        <?php endif; ?>

                        <?php if( get_field('what_is_the_cost_of_the_test') ): ?>
			                <div class="hy-title">What is the cost of the Test? 
                                <span>(How many person days to build? How much cost in promotion (coupons, bonuses etc. compensation to experts).</span>
			                </div>
                            <div class="hy-meta"><?php the_field( 'what_is_the_cost_of_the_test' ); ?> </div>
                        <?php endif; ?>

		            </div>


                <?php /* ?>     
                      
                      <?php $fields = get_field_objects(); ?>
                      <?php foreach( $fields as $field ): ?>

                      <?php if( $field['value'] ): ?>
                      <span class="hy-title"><?php echo $field['label']; ?></span> <div class="hy-meta"><?php echo $field['value']; ?></div>
                      <?php endif; ?>

                      <?php endforeach; ?>

                      <?php */?>


 
            <?php } ?>


			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Nimble').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php edit_post_link(esc_attr__('Edit this page','Nimble')); ?>
		</div> 	<!-- end .post_content -->

	</article> <!-- end .post -->

	<?php if (et_get_option('nimble_integration_single_bottom') <> '' && et_get_option('nimble_integrate_singlebottom_enable') == 'on') echo(et_get_option('nimble_integration_single_bottom')); ?>

	<?php
              if ( et_get_option('nimble_468_enable') == 'on' ){
                  if ( et_get_option('nimble_468_adsense') <> '' ) echo( et_get_option('nimble_468_adsense') );
                  else { ?>
			   <a href="<?php echo esc_url(et_get_option('nimble_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('nimble_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
	<?php 	}
              }
    ?>

	<?php
              if ( 'on' == et_get_option('nimble_show_postcomments') ) comments_template('', true);
    ?>
<?php endwhile; // end of the loop. ?>