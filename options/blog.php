<div class="wrap theme-options-page">                                                                               

    <h2>Blog Settings</h2>
    <p>Here you can manage your site <?php bloginfo( 'name' ); ?> blog settings.</p>
    <?php echo $html->createForm(array('method'=>'post', 'action'=>'', 'name'=>'option_general', 'type'=>'multipart/form-data'));   ?>

    <?php 
    echo $html->tableStart();
    
    $blog_index_content_type_list = array("excerpt"=>"Excerpt");
    $blog_index_content_type = !empty($blog_index_content_type)?$blog_index_content_type:'';
    echo $html->formTableSelect(array('title'=>'Blog Index Content Type', 'empty'=>'Content', 'name'=>'blog_index_content_type', 'options'=>$blog_index_content_type_list, 'selected'=>$blog_index_content_type, 'type'=>'select', "class" => "regular-text", 'id'=>'blog_index_content_type'), "If you select excerpt then on blog index listing all posts content will display only excerpt.");
          
    $pagination_type_list = array("number"=>"Number");
    $pagination_type = !empty($pagination_type)?$pagination_type:'';
    echo $html->formTableSelect(array('title'=>'Pagination Type', 'empty'=>'Next Previous', 'name'=>'pagination_type', 'options'=>$pagination_type_list, 'selected'=>$pagination_type, 'type'=>'select', "class" => "regular-text", 'id'=>'pagination_type'), "");
    
    $max_number_of_gallery_image = !empty($max_number_of_gallery_image)?$max_number_of_gallery_image:'10';
    echo $html->formTableInput(array('title'=>'Maximum Number Of Gallery Image', 'name'=>'max_number_of_gallery_image', 'type'=>'range', 'min'=>'0', 'max'=>20, 'id'=>'max_number_of_gallery_image', 'class'=>'regular-text large', 'value'=>$max_number_of_gallery_image), '');
    
    echo $html->tableEnd();
    
    echo $html->saveChangeButton();
    ?>
    
    <h3>Comments</h3>
    <?php 
    echo $html->tableStart();
    
    $avatar_border_radius = !empty($avatar_border_radius)?$avatar_border_radius:'0';
    echo $html->formTableInput(array('title'=>'Avatar Border Radius', 'name'=>'avatar_border_radius', 'type'=>'range', 'min'=>'0', 'max'=>100, 'id'=>'avatar_border_radius', 'class'=>'regular-text large', 'value'=>$avatar_border_radius), '');
    
    $avatar_image_transform = !empty($avatar_image_transform)?$avatar_image_transform:'0';
    echo $html->formTableInput(array('title'=>'Avatar Transform', 'name'=>'avatar_image_transform', 'type'=>'range', 'min'=>'0', 'max'=>360, 'id'=>'avatar_image_transform', 'class'=>'regular-text large', 'value'=>$avatar_image_transform), '');
    
    if(class_exists( 'Jetpack', false )){
        $enable_jetpack_comments = !empty($enable_jetpack_comments)?$enable_jetpack_comments:'no';
        echo $html->formTableCheckbox(array('title'=>'Enable Jetpack Comments?', 'name'=>'enable_jetpack_comments', 'checked'=>$enable_jetpack_comments, 'id'=>'enable_jetpack_comments'), "To enable jetpack comments you must install Jetpack wordpress plugins and it's comments module.");
    }
    
    
    
    echo $html->tableEnd();
    
    echo $html->saveChangeButton();
    ?>                 
       
    <?php echo $html->endForm(); ?>       
</div>