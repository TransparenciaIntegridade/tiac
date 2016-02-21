<?php
$imglist='';
  //$img_folder is the variable that holds the path to the banner images. Mine is images/tutorials/
// see that you don't forget about the "/" at the end
$img_folder ='/images/';
 
mt_srand((double)microtime()*1000);
 
//use the directory class
$imgs = dir($img_folder);
 
//read all files from the  directory, checks if are images and ads them to a list (see below how to display flash banners)
while($file = $imgs->read()){
   if(eregi("gif", $file) || eregi("jpg", $file) || eregi("png", $file))
     $imglist .= "$file ";
 
}
closedir($imgs->handle);
 
//put all images into an array
$imglist = explode(" ", $imglist);
$no = sizeof($imglist)-2;
 
//generate a random number between 0 and the number of images
$random = mt_rand(0, $no);
$image = $imglist[$random];
 
//display image
echo '<img src="http://www.sebs-studio.com/display-random-image-from-a-folder-using-php/'.$img_folder.$image.'" border=0/>';
?>