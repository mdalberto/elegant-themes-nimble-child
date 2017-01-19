<div id="page-name">
<?php
	$et_tagline = '';
	if( is_tag() ) {
		$et_page_title = esc_html__('Posts Tagged &quot;','Nimble') . single_tag_title('',false) . '&quot;';
	} elseif (is_day()) {
		$et_page_title = esc_html__('Posts made in','Nimble') . ' ' . get_the_time('F jS, Y');
	} elseif (is_month()) {
		$et_page_title = esc_html__('Posts made in','Nimble') . ' ' . get_the_time('F, Y');
	} elseif (is_year()) {
		$et_page_title = esc_html__('Posts made in','Nimble') . ' ' . get_the_time('Y');
	} elseif (is_search()) {
		$et_page_title = esc_html__('Search results for','Nimble') . ' ' . get_search_query();
	} elseif (is_category()) {
		$et_page_title = single_cat_title('',false);
		$et_tagline = category_description();
	} elseif (is_author()) {
		global $wp_query;
		$curauth = $wp_query->get_queried_object();
		$et_page_title = esc_html__('Posts by ','Nimble') . $curauth->nickname;
	} elseif ( is_page() || is_single() ) {
		$et_page_title = get_the_title();
		if ( is_page() ) $et_tagline = get_post_meta(get_the_ID(),'Description',true) ? get_post_meta(get_the_ID(),'Description',true) : '';
	} elseif ( is_tax() ){
		$et_page_title = single_term_title( '', false );
		$et_tagline = term_description();
	}
?>
	<div class="section-title">
		<h1>
			
			<?php /* ?> This is the Number block start <?php */ ?>

				<?php if ( is_singular( 'hypotheses' ) )  { ?>
						<div class="postId">
						<?php if( get_field('hypothesis_number') ): ?>
							<div class="postIdType">HYPOTHESIS</div>
			            	<div class="postIdNumb"><?php the_field( 'hypothesis_number' ); ?></div>
			             <?php endif; ?>
					 	<?php /* ?><?php the_ID(); ?><?php */ ?> <span class="raquo">»</span> </span> 
					</div>
	            <?php } ?>


	            <?php if ( is_singular( 'tests' ) )  { ?>
					<div class="postId">
					<?php if( get_field('test_number') ): ?>
						<div class="postIdType">TEST</div>
		            	<div class="postIdNumb"><?php the_field( 'test_number' ); ?></div>
		             <?php endif; ?>
				 	<?php /* ?><?php the_ID(); ?><?php */ ?> <span class="raquo">»</span> </span> 


					</div>
	            <?php } ?>
			<?php /* ?> This is the Number block end <?php */ ?>

            <?php /* ?> This is the Number block start <?php */ ?>

                <?php if ( is_post_type_archive( 'hypotheses' ) )  { ?>
                	Hypotheses
                <?php } ?>


                <?php if ( is_post_type_archive( 'tests' ) )  { ?>
                	Tests
                <?php } ?>
            <?php /* ?> This is the Number block end <?php */ ?>





	<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
		
	<?php if ( $et_tagline <> '' ) { ?>
		<p class="section-subtitle"><?php echo wp_kses( $et_tagline, array( 'span' => array() ) ); ?></p>
	<?php } ?>
	<?php
		if ( is_single() && 'project' != get_post_type( get_the_ID() ) ) {
			$single_postinfo = et_get_option( 'nimble_postinfo2' );
			if ( $single_postinfo && have_posts() ) {
				the_post();

				echo '<p class="main_post_info">';
				et_postinfo_meta( $single_postinfo, et_get_option('nimble_date_format'), esc_html__('0 comments','Nimble'), esc_html__('1 comment','Nimble'), '% ' . esc_html__('comments','Nimble') );
				echo '</p>';

				rewind_posts();
			}
		}
	?>
	</div>
</div> <!-- end #page-name -->