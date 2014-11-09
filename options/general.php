<div class="wrap theme-options-page">

    <h2>General</h2>
    <p>Here you can manage your site <?php bloginfo( 'name' ); ?> general settings like logo, slogan, footer copyright text etc.</p>
    
    <?php echo $html->createForm(array('method'=>'post', 'action'=>'', 'name'=>'option_general', 'type'=>'multipart/form-data'));   ?>     
    <h3>Header</h3>
    <p>Here you can change some settings for the site global header.</p>
        <?php 
        echo $html->tableStart();      
        
        $_use_image_logo = !empty($_use_image_logo)?$_use_image_logo:'no';
        echo $html->formTableCheckbox(array('title'=>'Use Image Logo?', 'name'=>'_use_image_logo', 'checked'=>$_use_image_logo, 'id'=>'_use_image_logo'), 'Do you want to use image logo instead text logo?');
        
        $logo_image = !empty($logo_image)?$logo_image:'';
        echo $html->formTableInput(array('upload'=>array('title'=>'Upload Logo'), 'title'=>'Upload Logo', 'name'=>'logo_image', 'type'=>'text', 'id'=>'logo_image', 'class'=>'regular-text', 'value'=>$logo_image, 'data-fold'=>'_use_image_logo'), 'URL for a valid image logo url or you can click on below button to select a logo from media library.');
        
        $logo_height = !empty($logo_height)?$logo_height:'32';
        echo $html->formTableInput(array('title'=>'Logo Height', 'name'=>'logo_height', 'value'=>$logo_height, 'id'=>'logo_height', 'data-fold'=>'_use_image_logo'), 'Don\'t include "px" in the string. e.g. 32');
    
        $header_padding = !empty($header_padding)?$header_padding:'30';
        echo $html->formTableInput(array('title'=>'Header Padding', 'name'=>'header_padding', 'type'=>'text', 'id'=>'header_padding', 'class'=>'regular-text', 'value'=>$header_padding), 'Don\'t include "px" in the string. e.g. 30');
        
		$is_boxed = !empty($is_boxed)?$is_boxed:'no';
		echo $html->formTableCheckbox(array('title'=>'Boxed Layout?', 'name'=>'is_boxed', 'checked'=>$is_boxed, 'id'=>'is_boxed'), 'To enable boxed content area check this field.');
        
		$header_resize_on_scroll = !empty($header_resize_on_scroll)?$header_resize_on_scroll:'no';
        echo $html->formTableCheckbox(array('title'=>'Header Resize On Scroll?', 'name'=>'header_resize_on_scroll', 'checked'=>$header_resize_on_scroll, 'id'=>'header_resize_on_scroll'), 'Do you want the header to resize a little when you scroll.?');
		
		$logo_image_sticky = !empty($logo_image_sticky)?$logo_image_sticky:'';
        echo $html->formTableInput(array('upload'=>array('title'=>'Upload Logo'), 'title'=>'Sticky Logo', 'name'=>'logo_image_sticky', 'type'=>'text', 'id'=>'logo_image_sticky', 'class'=>'regular-text', 'value'=>$logo_image_sticky, 'data-fold'=>'header_resize_on_scroll#yes'), 'URL for a valid image logo url or you can click on below button to select a logo from media library. Note: It is not supposed to be resized but color changed depending on your heading background color.');
        
        
        
        echo $html->tableEnd();
        echo $html->saveChangeButton();
        ?>
    
    <h3>Initialize Demo Data</h3>
    <p>If you imported demo data using WordPress xml imported with theme included default demo data, You may noticed all meta images are not showing properly. In that case you must need to check this field to fix that issue.</p>   
        <?php 
        echo $html->tableStart();      
        
        $_initialize_demo_data = !empty( $_initialize_demo_data ) ? $_initialize_demo_data : 'no';
        echo $html->formTableCheckbox( array( 'title'=>'Enable Demo Data?', 'name'=>'_initialize_demo_data', 'checked'=>$_initialize_demo_data, 'id'=>'_initialize_demo_data' ), 'To enable demo data select yes.' );
        
        if ( function_exists( 'mondira_media_demo_base_url' ) ) {
            $media_demo_base_url_tmp = mondira_media_demo_base_url();
        } else {
            $media_demo_base_url_tmp = '';            
        }
        $media_demo_base_url = !empty( $media_demo_base_url ) ? $media_demo_base_url : $media_demo_base_url_tmp;
        echo $html->formTableInput( array( 'title'=>'Media Demo Base URL', 'name'=>'media_demo_base_url', 'type'=>'text', 'id'=>'media_demo_base_url', 'data-fold'=>'_initialize_demo_data', 'value'=>$media_demo_base_url ), "Please if you don't know what it is keep it as it is. Not it should have a / at the end of url" );
        
        echo $html->tableEnd();
        echo $html->saveChangeButton();
        ?>
    
    <?php echo $html->endForm(); ?>                                   
    
</div>
