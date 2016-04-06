<?php

/// Recent Posts 
class Bunch_Recent_Post_With_Image extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_Post_With_Image', /* Name */esc_html__('apartvilla Recent Posts with image','apartvilla'), array( 'description' => esc_html__('Show the recent posts with images', 'apartvilla' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
		<?php echo balanceTags($before_title.$title.$after_title); ?>
		
		<?php $query_string = 'posts_per_page='.$instance['number'];
		if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
		query_posts( $query_string ); 
		
		$this->posts();
		wp_reset_query();
		?>
        
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Posts', 'apartvilla');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'apartvilla'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'apartvilla'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
           	<!-- Title -->
				
                <ul class="popular-post">
				<?php while( have_posts() ): the_post(); ?>
                    
                    <!-- Item -->
					<li>
						<!-- .img-holder -->
						<div class="img-holder">
							
							<?php the_post_thumbnail('apartvilla_six', array('class' => 'img-responsive'));?>
							
						</div><!-- /.img-holder -->
						<div class="content">
							<h4><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h4>
							<span><?php echo get_the_date('F d, Y');?></span>
						</div>
					</li>
                    
                <?php endwhile; ?>
                </ul>
            
        <?php endif;
    }
}

/// Contact info 
class Bunch_Meet_Agent extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Meet_Agent', /* Name */esc_html__('Apartvilla Meet Agent','apartvilla'), array( 'description' => esc_html__('Show Meet Our Agent', 'apartvilla' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
		<?php echo balanceTags($before_title.$title.$after_title); ?>
		<a href="<?php echo esc_url($instance['url']);?>"  data-toggle="modal" data-target="<?php echo esc_url($instance['data_target']);?>">
			<div class="agent-box">
				<img src="<?php echo esc_url($instance['img_url']);?>" alt="<?php esc_html_e('image', 'apartvilla');?>">
				<div class="name">
					<h4><?php echo balanceTags($instance['agent_name']);?></h4>
				</div>
			</div>
		</a>
		
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = $new_instance['url'];
		$instance['data_target'] = $new_instance['data_target'];
		$instance['img_url'] = $new_instance['img_url'];
		$instance['agent_name'] = $new_instance['agent_name'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Meet Our Agent', 'apartvilla');
		$url = ( $instance ) ? esc_attr($instance['url']) : '#';
		$data_target = ( $instance ) ? esc_attr($instance['data_target']) : '#contact-agent-modal';
		$img_url = ( $instance ) ? esc_attr($instance['img_url']) : get_template_directory_uri().'/img/resources/sidebar-agent.jpg';
		$agent_name = ( $instance ) ? esc_attr($instance['agent_name']) : esc_html__('Merry Disalva', 'apartvilla');
		
		
		?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Link URL: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('data_target')); ?>"><?php esc_html_e('data-target: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('data_target')); ?>" name="<?php echo esc_attr($this->get_field_name('data_target')); ?>" type="text" value="<?php echo esc_attr( $data_target ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php esc_html_e('Image URL: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_url')); ?>" name="<?php echo esc_attr($this->get_field_name('img_url')); ?>" type="text" value="<?php echo esc_attr( $img_url ); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('agent_name')); ?>"><?php esc_html_e('Agent Name: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('agent_name')); ?>" name="<?php echo esc_attr($this->get_field_name('agent_name')); ?>" type="text" value="<?php echo esc_attr( $agent_name ); ?>" />
        </p>
            
		<?php 
	}
	
}

/// Services Posts 
class Bunch_Services_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Services_Posts', /* Name */esc_html__('apartvilla Services Posts','apartvilla'), array( 'description' => esc_html__('Show the recent posts of services', 'apartvilla' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
		<!-- Services -->
		<div class="footer-widget services-widget">
			
				<?php echo balanceTags($before_title.$title.$after_title); ?>
				
				<?php 
				$args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
				query_posts($args); 
					
					$this->posts();
					wp_reset_query();
				?>
		</div>
		
		
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Services', 'apartvilla');
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'apartvilla'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'apartvilla'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
           	<!-- Title -->
				
                <ul class="links">
				
				<?php while( have_posts() ): the_post(); 
					$services_meta = _WSH()->get_meta();
				?>
				
					<li><a href="<?php echo esc_url(apartvilla_set($services_meta, 'ext_url'));?>"><?php the_title();?></a></li>
				
				<?php endwhile; ?>
				</ul>
			
        <?php endif;
    }
}

/// FAQs Posts 
class Bunch_Faqs_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Faqs_Posts', /* Name */esc_html__('apartvilla Faqs Posts','apartvilla'), array( 'description' => esc_html__('Show the recent posts of faqs', 'apartvilla' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget); ?>
		
		<!-- Services -->
		<div class="footer-widget services-widget">
			
				<?php echo balanceTags($before_title.$title.$after_title); ?>
				
				<?php 
				$args = array('post_type' => 'bunch_faqs', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'faqs_category','field' => 'id','terms' => (array)$instance['cat']));
				query_posts($args); 
					
					$this->posts();
					wp_reset_query();
				?>
		</div>
		
		
		<?php echo balanceTags($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Our Support', 'apartvilla');
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'apartvilla'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'apartvilla'), 'selected'=>$cat, 'taxonomy' => 'faqs_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
           	<!-- Title -->
				
                <ul class="links">
				
				<?php while( have_posts() ): the_post(); 
					$services_meta = _WSH()->get_meta();
				?>
				
					<li><a href="<?php echo esc_url(apartvilla_set($services_meta, 'ext_url'));?>"><?php the_title();?></a></li>
				
				<?php endwhile; ?>
				</ul>
			
        <?php endif;
    }
}

// Subscribe to our mailing list
class Bunch_feedburner extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_subscribe_mail_list', /* Name */esc_html__('apartvilla Subscribe to Mailing List','apartvilla'), array( 'description' => esc_html__('create account on http://feedburner.com and allow users to subscribe', 'apartvilla' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo balanceTags($before_widget);?>
        
        <div class="footer-widget newsletter-widget">
			<?php echo balanceTags($before_title . $title . $after_title) ; ?>
			<div class="text"><?php echo balanceTags($instance['text']); ?></div>
			
			<div class="form">
				<form target="popupwindow" method="post" id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" class="newsletter_form">
					<div class="form-group">
						<input type="email" name="email" value="" id="email" placeholder="<?php esc_html_e('Enter your email address', 'apartvilla');?>" required autocomplete="off">
						<input type="hidden" id="uri" name="uri" value="<?php echo esc_attr($instance['ID']); ?>">
						<input type="hidden" value="en_US" name="loc">
						<button type="submit" name="submit" class="hvr-bounce-to-right"><span class="fa fa-paper-plane"></span></button>
					</div>
				</form>
			</div>
			<?php $theme_option = get_option(BUNCH_NAME.'_theme_options');?>
			<?php if($instance['show_socials']):?>
			<?php if($socials = apartvilla_set(apartvilla_set($theme_option, 'social_media'), 'social_media')):?>
			<div class="social-links wow fadeInRight" data-wow-delay="1000ms" data-wow-duration="1500ms">
			
				<?php foreach($socials as $key => $value):
					  if(apartvilla_set($value, 'tocopy')) continue;
				?>
					<a title="<?php echo apartvilla_set($value, 'social_title');?>" href="<?php echo esc_url(apartvilla_set($value, 'social_link'));?>"><span class="fa <?php echo apartvilla_set($value, 'social_icon');?>"></span></a>
				<?php endforeach;?>
				
			</div>
			<?php endif;?>
			<?php endif;?>
			
		</div>
		
		<?php
		
		echo balanceTags($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = $new_instance['text'];
		$instance['ID'] = $new_instance['ID'];
		$instance['show_socials'] = $new_instance['show_socials'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('Newsletter', 'apartvilla');
		$text = ($instance) ? esc_attr($instance['text']) : '';
		$ID = ($instance) ? esc_attr($instance['ID']) : 'themeforest';
		$show_socials = ( $instance ) ? esc_attr($instance['show_socials']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Text:', 'apartvilla'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text"><?php echo esc_attr($text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('ID')); ?>"><?php esc_html_e('Feedburner ID:', 'apartvilla'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ID')); ?>" name="<?php echo esc_attr($this->get_field_name('ID')); ?>" type="text" value="<?php echo esc_attr($ID); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('show_socials')); ?>"><?php esc_html_e('Show Social Icons:', 'apartvilla'); ?></label>
			<?php $selected = ( $show_socials ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_socials')); ?>"<?php echo balanceTags($selected); ?> name="<?php echo esc_attr($this->get_field_name('show_socials')); ?>" type="checkbox" value="true" />
        </p>
		<?php 
	}
}









/*--------------------------------------------------------------------*/





