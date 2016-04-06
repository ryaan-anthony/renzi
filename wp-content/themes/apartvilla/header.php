<?php $options = _WSH()->option();
bunch_global_variable();
$icon_href = (apartvilla_set( $options, 'site_favicon' )) ? apartvilla_set( $options, 'site_favicon' ) : get_template_directory_uri().'/img/favicon.png';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<![endif]-->
<head>
	 <!-- Basic -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favcon -->
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
		<link rel="shortcut icon" type="image/png" href="<?php echo esc_url($icon_href);?>">
	<?php endif;?>
	<?php wp_head(); ?>
</head>
<body <?php if( apartvilla_set($options, 'boxed') ) body_class('boxed'); else body_class(); ?>>

<?php $header = apartvilla_set($options, 'header_style');
	  $header = (apartvilla_set($_GET, 'header_style')) ? apartvilla_set($_GET, 'header_style') : $header;
	  switch($header){
	  	case "header_v2":
			get_template_part('includes/modules/header_v2');
			break;
		case "header_v3":
			get_template_part('includes/modules/header_v3');
			break;
		case "header_v4":
			get_template_part('includes/modules/header_v4');
			break;
		default:
			get_template_part('includes/modules/header_v1');
		} 	
?>