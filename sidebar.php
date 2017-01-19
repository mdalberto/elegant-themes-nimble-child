<?php if ( is_active_sidebar( 'sidebar-1' ) ){ ?>
	<div id="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php 
            
                if ( is_singular( 'hypotheses' ) )  { 
                    $value = get_field( "testsLink" );

                    if( $value ) {
                        
                        echo '<a class="learn-more" href="' . $value . '" >View The Test</a>';

                    } else {

                        echo 'You Have No Tests Attached To This Hypothesis Yet';
                        
                    }

                }
                
                if ( is_singular( 'tests' ) ){
                    $value = get_field( "hypothesis_link" );

                    if( $value ) {
                        
                        echo '<a class="learn-more" href="' . $value . '" >View The Hypothesis</a>';

                    } else {

                        echo 'You Have No Hypotheses Attached To This Test Yet';
                        
                    }

                }
            ?>

	</div> <!-- end #sidebar -->
<?php } ?>