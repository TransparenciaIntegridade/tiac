<?php if (function_exists('get_header')) {
   get_header();
}else{
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/twentyfourteen/index_en.php");
    exit;
}; ?>