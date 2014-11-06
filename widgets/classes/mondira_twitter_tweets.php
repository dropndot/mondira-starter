<?php
/**
* 
* Mondira_Twitter_Tweets Widget Class
* 
* 
* Makes a custom Widget for displaying twitter tweets
*
* @package WordPress
* @subpackage Mondira
* @since Mondira 1.0.0
*/
class Mondira_Twitter_Tweets extends WP_Widget {
    
    function __construct() {
        parent::WP_Widget( 
            'mondira_twitter_tweets_widget', // Base Id 
            THEME_NAME .' Twitter Widget', // Widge display name 
            array( 
                'description' => 'Display Latest Tweets from Twitter' 
            ) 
        );
    }

	function form( $instance ) {
		$instance = wp_parse_args( 
            (array) $instance, 
            array( 
                'title' => __( 'Latest Tweets', 'mondira' ), 
                'count' => '3', 
                'username' => 'Twitter Account',
				'exclude_replies' => '1' , 
                'time' => '1', 
                'display_avatar' => '1', 
                'consumer_key' => '',
                'consumer_secret' => '',
                'access_token' => '',
                'access_token_secret' => ''
            ) 
        );
						
		$title = 					empty( $instance[ 'title' ] ) ?	'' : wp_filter_nohtml_kses( $instance[ 'title' ] );
		$consumer_key = 			empty( $instance[ 'consumer_key' ] ) ?	'' : wp_filter_nohtml_kses( $instance[ 'consumer_key' ] );
		$consumer_secret = 			empty( $instance[ 'consumer_secret' ] ) ?	'' : wp_filter_nohtml_kses( $instance[ 'consumer_secret' ] );
		$access_token = 			empty( $instance[ 'access_token' ] ) ?	'' : wp_filter_nohtml_kses( $instance[ 'access_token' ] );
		$access_token_secret = 		empty( $instance[ 'access_token_secret' ] ) ?	'' : wp_filter_nohtml_kses( $instance[ 'access_token_secret' ] );
		$count = 					empty( $instance[ 'count' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'count' ] );
		$username = 				empty( $instance[ 'username' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'username' ] );
		$exclude_replies = 			empty( $instance[ 'exclude_replies' ] ) ? 0 : 1;
		$time = 					empty( $instance[ 'time' ] ) ? 0 : 1;
		$display_avatar = 			empty( $instance[ 'display_avatar' ] ) ? 0 : 1;
        ?>
        
        <?php $tapps = "https://dev.twitter.com/apps"; ?>
        <p><?php _e('Twitter Authentication options', 'mondira');?> <br /><br /><?php _e('Get them creating your Twitter Application', 'mondira');?> <a href="<?php echo $tapps; ?>" target="_blank"><?php _e('here', 'mondira');?></a></p>
        
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mondira');?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

        <p><label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php _e('Consumer Key:', 'mondira');?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" 
            type="text" value="<?php echo esc_attr($consumer_key); ?>" /></label></p>
            
        <p><label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php _e('Consumer Secret:', 'mondira');?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" 
            type="text" value="<?php echo esc_attr($consumer_secret); ?>" /></label></p>

        <p><label for="<?php echo $this->get_field_id('access_token'); ?>"><?php _e('Access Token:', 'mondira');?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" 
            type="text" value="<?php echo esc_attr($access_token); ?>" /></label></p>
            
        <p><label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php _e('Access Token Secret:', 'mondira');?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" 
            type="text" value="<?php echo esc_attr($access_token_secret); ?>" /></label></p>

        <p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Enter your twitter username:', 'mondira');?>
           <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>"
            type="text" value="<?php echo esc_attr($username); ?>" /></label></p>
            
        <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('How many entries do you want to show:', 'mondira');?>
        	<select class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
            <?php for($i = 1; $i <= 20; $i++):	
					$selected = ($count == $i ) ? "selected='selected'" : "";?>
	              <option <?php echo($selected);?> value="<?php echo($i);?>"><?php echo($i);?></option>
            <?php endfor;?>
            </select></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('exclude_replies');?>" name="<?php echo $this->get_field_name('exclude_replies');?>" 
			<?php checked($exclude_replies); ?> /> <label for="<?php echo $this->get_field_id('exclude_replies'); ?>"><?php _e('Exclude @replies', 'mondira');?></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('time');?>" name="<?php echo $this->get_field_name('time');?>" 
			<?php checked($time); ?> /> <label for="<?php echo $this->get_field_id('time'); ?>"><?php _e('Show time of tweet', 'mondira');?></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('time');?>" name="<?php echo $this->get_field_name('display_avatar');?>" 
				<?php checked($display_avatar); ?> /> <label for="<?php echo $this->get_field_id('display_avatar'); ?>"><?php _e('Show user avatar', 'mondira');?></label></p>		
<?php
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance [ 'title' ] = wp_filter_nohtml_kses( $new_instance[ 'title' ] );
		$instance [ 'consumer_key' ] = wp_filter_nohtml_kses( $new_instance[ 'consumer_key' ] );
		$instance [ 'consumer_secret' ] = wp_filter_nohtml_kses( $new_instance[ 'consumer_secret' ] );
		$instance [ 'access_token' ] = wp_filter_nohtml_kses( $new_instance[ 'access_token' ] );
		$instance [ 'access_token_secret' ] = wp_filter_nohtml_kses( $new_instance[ 'access_token_secret' ] );
		$instance [ 'count' ] = wp_filter_nohtml_kses( $new_instance[ 'count' ] );
		$instance [ 'username' ] = wp_filter_nohtml_kses( $new_instance[ 'username' ] );
		$instance [ 'exclude_replies' ] = empty( $new_instance[ 'exclude_replies' ] ) ? 0 : 1;
		$instance [ 'time' ] = empty( $new_instance[ 'time' ] ) ? 0 : 1;
		$instance [ 'display_avatar' ] = empty( $new_instance[ 'display_avatar' ] ) ? 0 : 1;
		return $instance;
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title = empty( $instance[ 'title' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'title' ] );
		$consumer_key = empty( $instance[ 'consumer_key' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'consumer_key' ] );
		$consumer_secret = empty( $instance[ 'consumer_secret' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'consumer_secret' ] );
		$access_token = empty( $instance[ 'access_token' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'access_token' ] );
		$access_token_secret = empty( $instance[ 'access_token_secret' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'access_token_secret' ] );
		$count = empty( $instance[ 'count' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'count' ] );
		$username = empty( $instance[ 'username' ] ) ? '' : wp_filter_nohtml_kses( $instance[ 'username' ] );
		$exclude_replies = empty( $instance[ 'exclude_replies' ] ) ? false : true;
		$time = empty( $instance[ 'time' ] ) ? false : true;
		$display_avatar = empty( $instance[ 'display_avatar' ] ) ? false : true ;

		echo $before_widget;			
			
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
			if($username && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count) { 
            		$transName = 'list_tweets';
					$cacheTime = 10;
					require_once 'twitteroauth/twitteroauth.php';
                    	$twitterConnection = new TwitterOAuth( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
						$twitterData = $twitterConnection->get( 'statuses/user_timeline', array( 'screen_name' => $username, 'count' => $count,'exclude_replies' => $exclude_replies ) );
			
						 if ( $twitterConnection->http_code != 200 ) {
							 $twitterData = get_transient( $transName );
						 }
			 
					set_transient( $transName, $twitterData, 60 * 10 );
					$twitter = get_transient( $transName );
					
					echo "<ul class='mondira-widget-recent-posts mondira-widget-recent-tweet-posts'>";
					if( $twitter && is_array( $twitter ) ) {
						foreach( $twitter as $tweet ):
							$latestTweet = $tweet->text;
							$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet );
							$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet );
							
							$twitterTime = strtotime( $tweet->created_at );
                            $offset = !empty( $tweet->utc_offset ) ? $tweet->utc_offset : 0;
							$timeAgo = date_i18n(  get_option('date_format'), $twitterTime + $offset ); 
							
							echo '<li class="clear">';
									if ( $display_avatar )
									echo '<a class="title" href="http://twitter.com/' . $username . '" title=""><img src="' . $tweet->user->profile_image_url . '" alt="" /></a>';
									
									echo '<div class="tweet-content' . $display_avatar . ' mondira-recent-posts-content clr">' . $latestTweet;
								
									if ( $time )
									echo "<div class='tweet-time mondira-widget-recent-posts-meta'><i class='icon-time'></i>{$timeAgo}</div>";
								
							echo '</div></li>'; 
						endforeach;
					} else {
						echo '<li>' . __( 'No public Tweets found', 'mondira') . '</li>';
						
					}
					echo "</ul>";
			}
			
		echo $after_widget;
	}
}                                       
add_action( 'widgets_init', 'mondira_twitter_load_widgets' );
function mondira_twitter_load_widgets() {
	register_widget( 'Mondira_Twitter_Tweets' );
} 