<?php


// src: location of file from doc root
// w: width
// h: height
// zc: zoom crop (0 or 1)
// q: quality (default is 75 and max is 100)

// either width or height can be used
// example: <img src="/resizeImage.php?src=images/image.jpg&h=150" alt="some image" />
	
	
if( !isset( $_REQUEST[ "src" ] ) ) { die( "no image specified" ); }

// clean params before use
$src		= preg_replace( "/^(\.+(\/|))+/", "", $_REQUEST['src'] );
$src		= preg_replace( '/^(s?f|ht)tps?:\/\/[^\/]+/i', '', $src );
$new_width	= preg_replace( "/[^0-9]/", "", $_REQUEST[ 'w' ] );
$new_height = preg_replace( "/[^0-9]/", "", $_REQUEST[ 'h' ] );
$zoom_crop	= preg_replace( "/[^0-9]/", "", $_REQUEST[ 'zc' ] );
$textT      = $_REQUEST[ 'nmT' ]==""?'X':$_REQUEST[ 'nmT' ];

if( !isset( $_REQUEST['q'] ) ) { $quality = 80; } else { $quality = preg_replace("/[^0-9]/", "", $_REQUEST['q'] ); }

// get mime type of src
if( isset( $src ) ) 
	$mime_type = mime_type( $src );

// make sure that the src is gif/jpg/png
if( $src!="" ) {
	if( !valid_src_mime_type( $mime_type ) ) {
		$error = "Invalid src mime type: $mime_type";
		die( $error );
	}
}
// check to see if GD function exist
if(!function_exists('imagecreatetruecolor')) {
	$error = "GD Library Error: imagecreatetruecolor does not exist";
	die( $error );
}


// get path to image on file system 
$srcs = $_SERVER['DOCUMENT_ROOT'] . '/';
$src = $srcs . $src;

if (file_exists($src) && $srcs==$src):
	$canvas = imagecreatetruecolor($new_width, $new_height);
	$bgColor = imagecolorallocate($canvas, 27, 27, 27);
	$whColor = imagecolorallocate($canvas, 255, 255, 255);
	$font = './fonts/arial.ttf';
	
	imagefilledrectangle($canvas, 0, $new_width, $new_width, $new_heigt, $bgColor);
	
	//imagettftext($canvas, 12, 0, 0, 40, $whColor, $font, 'Dirwell' . "\n" . phpversion());
	
	// Create the next bounding box for the second text
	$bbox = imagettfbbox(12, 0, $font, $textT);
	
	// Set the cordinates so its next to the first text
	$x = $bbox[0] + (imagesx($canvas) / 2) - ($bbox[4] / 2);
	$y = $bbox[1] + (imagesy($canvas) / 2) - ($bbox[5] / 2);
	
	// Write it
	imagettftext($canvas, 12, 0, $x, $y, $whColor, $font, $textT);
	
	// output image to browser based on mime type
	header( "Content-Type: image/png");
	imagepng($canvas);
	// remove image from memory
	imagedestroy( $canvas );
	die();
endif;

if(file_exists($src) && $srcs!=$src ) {

	// open the existing image
	$image = open_image($mime_type, $src);
	if ($image === false) { die ('Unable to open image : ' . $src ); }		

	// Get original width and height
	$width = imagesx($image);
	$height = imagesy($image);

	// generate new w/h if not provided
	if($new_width && !$new_height) {
		$new_height = $height * ($new_width/$width);
	}
	elseif($new_height && !$new_width) {
		$new_width = $width * ($new_height/$height);
	}
	elseif(!$new_width && !$new_height) {
		$new_width = $width;
		$new_height = $height;
	}

	// create a new true color image
	$canvas = imagecreatetruecolor($new_width, $new_height);

	if( $zoom_crop ) {

		$src_x = $src_y = 0;
    	$src_w = $width;
    	$src_h = $height;

        $cmp_x = $width  / $new_width;
        $cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source

        if ( $cmp_x > $cmp_y ) {
        
            $src_w = round( ( $width / $cmp_x * $cmp_y ) );
            $src_x = round( ( $width - ( $width / $cmp_x * $cmp_y ) ) / 2 );
            
        } elseif ( $cmp_y > $cmp_x ) {
        
            $src_h = round( ( $height / $cmp_y * $cmp_x ) );
            $src_y = round( ( $height - ( $height / $cmp_y * $cmp_x ) ) / 2 );
            
        }
        
		imagecopyresampled( $canvas, $image, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h );
		
	} else {
	
		// copy and resize part of an image with resampling
		imagecopyresampled( $canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
	}

	// output image to browser based on mime type
	header( "Content-Type: image/png");
	imagepng($canvas);
	
	// remove image from memory
	imagedestroy( $canvas );
	
}

function show_image ($mime_type, $image_resized, $quality, $cache_dir) {
		
	// check to see if we can write to the cache directory
	$is_writable = 0;
	$cache_file_name = $cache_dir . '/' . get_cache_file();        	
	        	
	if( touch( $cache_file_name ) ) {
		// give 666 permissions so that the developer 
		// can overwrite web server user
		chmod( $cache_file_name, 0666 );
		$is_writable = 1;
	} else {
		$cache_file_name = NULL;
		header('Content-type: ' . $mime_type);
	}
	
    if(stristr( $mime_type, 'gif' ) ) {
        imagegif( $image_resized, $cache_file_name );
    } elseif( stristr( $mime_type, 'jpeg' ) ) {
        imagejpeg( $image_resized, $cache_file_name, $quality );
    } elseif( stristr( $mime_type, 'png' ) ) {
        imagepng( $image_resized, $cache_file_name);
    }
    
	if( $is_writable ) { show_cache_file( $cache_dir ); }
    
	exit;
	
}

function open_image ($mime_type, $src) {

	if(stristr($mime_type, 'gif')) {
		$image = imagecreatefromgif($src);
    } elseif(stristr($mime_type, 'jpeg')) {
    	$image = imagecreatefromjpeg($src);
	} elseif(stristr($mime_type, 'png')) {
		$image = imagecreatefrompng($src);
    }
    
	return $image;
	
}

function mime_type ($file) {

	$frags = split("\.", $file);
	$ext = strtolower( $frags[ count( $frags ) - 1 ] );
	$types = array(
 		'jpg'  => 'image/jpeg',
 		'jpeg' => 'image/jpeg',
 		'png'  => 'image/png',
 		'gif'  => 'image/gif',
 		'bmp'  => 'image/bmp', 
 		'doc'  => 'application/msword',
 		'xls'  => 'application/msword',
 		'xml'  => 'text/xml',
 		'html' => 'text/html'
 	);
 	
    //echo "extension = " .$ext;
	$mime_type = $types[$ext];
	if(!strlen($mime_type)) { $mime_type = 'unknown'; }
	
	return($mime_type);
	
}

function valid_src_mime_type ($mime_type) {

	if( preg_match( "/jpg|jpeg|gif|png/i", $mime_type ) ) { return 1; }
	return 0;
	
}

?>