<?php
/*
* 
*  $mondira_theme_docs is must be a global variable as we are using it from theme mondira framework
*/
global $mondira_theme_docs;

$docs = array(
    array(
        "name" => __( "General", 'mondira_admin' ),
        "section" => 'general',
    ),
	array(
        "name" => __( "Widgets", 'mondira_admin' ),
        "section" => 'widgets',
    )
);

$mondira_theme_docs = array(
	'title' => THEME_NAME . ' Documentation',
	'docs' => $docs,
);

return $mondira_theme_docs;
