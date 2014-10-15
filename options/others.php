<div class="wrap theme-options-page">                                                                               

    <h2>Other Settings</h2>
    <p>Here you can manage your site <?php bloginfo( 'name' ); ?> other settings like change facicon, add google analytics or other footer scripts, change theme tiny elements etc. Also here you can apply custom css to overwrite theme appearance.</p>
    <?php echo $html->createForm(array('method'=>'post', 'action'=>'', 'name'=>'option_general', 'type'=>'multipart/form-data'));   ?>

    <h3>General</h3>
    <?php 
    echo $html->tableStart();
    
    $favicon_url = !empty($favicon_url)?$favicon_url:'';
    echo $html->formTableInput(array('upload'=>array('title'=>'Insert Favicon'), 'title'=>'Custom Favicon', 'name'=>'favicon_url', 'type'=>'text', 'id'=>'favicon_url', 'class'=>'regular-text', 'value'=>$favicon_url), 'URL for a valid .ico favicon');
    
    $custom_css = !empty($custom_css)?$custom_css:'';
    echo $html->formTableTextarea(array('title'=>'Custom CSS', 'name'=>'custom_css', 'type'=>'textarea', 'id'=>'custom_css', 'class'=>'large mondiraCSSEditor', 'value'=>$custom_css));
    
    $google_analytics = !empty($google_analytics)?$google_analytics:'';
    echo $html->formTableTextarea(array('title'=>'Google Analytics', 'name'=>'google_analytics', 'type'=>'textarea', 'id'=>'google_analytics', 'class'=>'large mondiraHTMLEditor', 'value'=>$google_analytics));
    
    $suppress_comments_message = !empty($suppress_comments_message)?$suppress_comments_message:'no';
    echo $html->formTableCheckbox(array('title'=>'Suppress Comments Message?', 'name'=>'suppress_comments_message', 'checked'=>$suppress_comments_message, 'id'=>'suppress_comments_message'), 'To hide Comments are closed message on page with comment closed select yes.');
    
    $enable_nicescroll = !empty($enable_nicescroll)?$enable_nicescroll:'no';
    echo $html->formTableCheckbox(array('title'=>'Enable NiceScroll?', 'name'=>'enable_nicescroll', 'checked'=>$enable_nicescroll, 'id'=>'enable_nicescroll'), 'To enable styled page scrollbar on right.');
    
    echo $html->tableEnd();
    
    echo $html->saveChangeButton();
    ?>
    
    
      
    <?php echo $html->endForm(); ?>       
</div>