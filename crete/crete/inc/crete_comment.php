<?php
//crete comment form
add_filter('comment_form_default_fields','crete_comments_form');
if(!function_exists('crete_comments_form')){
    function crete_comments_form($default){
			$default['author'] = '<div  class="comment_forms"><div  class="comment_forms_inner">
			
			<div class="comment_field row g-3"><div class="input-field col">

				<input id="name" class="theme-input" name="author" type="text" placeholder="'.esc_html__('Your Name','crete').'"/>
			</div>';

			$default['email'] = '
			<div class="input-field col">
		
				<input id="email"  class="theme-input" name="email" type="text" placeholder="'.esc_html__('Email Address','crete').'"/>
			</div>';	

			$default['title'] = '
			<div class="input-field col">
				<input id="title" class="theme-input" name="url" type="text" placeholder="'.esc_html__('Your Website','crete').'"/>
			</div> </div>';	
			$default['url']='';
			$default['message'] ='<div class="comment_field"><div class="textarea-field"><textarea name="comment" id="comment" cols="30" rows="6" class="theme-input" placeholder="'.esc_html__('Write your comment...','crete').'"></textarea></div></div>   </div></div>';																		

 
        return $default;
    }
}
add_filter('comment_form_defaults','crete_form_default');

 if(!function_exists('crete_form_default')){
    function crete_form_default($default_info){
        if(!is_user_logged_in()){
            $default_info['comment_field'] = '';
        }else{
            $default_info['comment_field'] = '<div  class="comment_forms"><div  class="comment_forms_inner"> <div class="comment_field"><div class="textarea-field"><textarea name="comment" id="comment" cols="30" rows="6" class="theme-input" placeholder="'.esc_html__('Write your comment...','crete').'"></textarea></div></div> </div></div>';
        }
         
        $default_info['submit_button'] = '<button class="crete_btn template-btn primary-btn mt-1" type="submit">'.esc_html__('Post Comment','crete').'</button>';
        $default_info['submit_field'] = '%1$s %2$s';
        $default_info['comment_notes_before'] = ' ';
        $default_info['title_reply'] = esc_html__('leave a comment ','crete');
        $default_info['title_reply_before'] = '<div class="commment_title"><h3> ';
        $default_info['title_reply_after'] = '</h3></div> ';
 
        return $default_info;
    }
 
 }
	
	
//crete comment show
if(! function_exists('crete_comment')){
	function crete_comment($comment,$arg, $depth){
		$GLOBALS ['comment'] = $comment;
		?>

		<!-- connent reply -->		
		<div class="default_post_comment">
			<div class="comment_inner">
				<div class="post_replay">
					<div class="post_replay_content">											
						<div class="post_replay_inner blog-comment-list" id="comment-<?php comment_ID(); ?>">
						    
						    <div class="d-flex gap-4 flex-wrap flex-md-nowrap">
						        <div class="client-thumb">
						            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php echo get_avatar($comment,100); ?></a>
						           </div><!--Client Thumb End-->
						           
						           
						           <div class="position-relative comment-full-content">
                                            <span class="fw-light fs-sm text-color"><?php echo get_comment_date(get_option('date_format')); ?></span>
                                            <h6 class="mb-3 mt-1"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_comment_author(); ?></a></h6>
                                            <p class="fw-light text-color mb-0"><?php comment_text(); ?></p>
                                            <?php 
										comment_reply_link(
											array_merge($arg,array(
												'reply_text' => '<span class="span_right reply-btn">'. esc_html__('REPLY','crete').'</span>',
												'depth'    => $depth,
												'max_depth' => $arg['max_depth']
											))
									); ?>   
                                </div>
						    </div>
						    
						    
						    
					
						
							
						</div>
					</div>																
				</div>
			</div>
		</div>		
	
		<?php
	}
}