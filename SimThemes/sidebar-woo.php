				<div class="col-sm-3" role="complementary">
                
                    <div id="sidebar1" >
                    
                        <?php if ( is_active_sidebar( 'sidebar-woo' ) ) : ?>
    
                            <?php dynamic_sidebar( 'sidebar-woo' ); ?>
    
                        <?php else : ?>
    
                            <!-- This content shows up if there are no widgets defined in the backend. -->
                            
                            <div class="alert alert-message">
                            
                                <p><?php _e("Please activate some Widgets","wpbootstrap"); ?>.</p>
                            
                            </div>
    
                        <?php endif; ?>
    
                    </div>
                
                </div>