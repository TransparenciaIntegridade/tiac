<?php


add_action('plugins_loaded', 'cms_with_tms_manage_string_translations');
add_action('update_option_sidebars_widgets', 'cms_with_tms_manage_string_translations');


function cms_with_tms_manage_string_translations() {
	global $wpdb;
	cms_with_tms_add_update_string('Blog Title',get_option('blogname'));
	cms_with_tms_add_update_string('Tagline',get_option('blogdescription'));
	cms_with_tms_add_update_string('Widget Title',get_option('sidebars_widgets'));
	cms_with_tms_add_update_string('Widget Text',get_option('sidebars_widgets'));	
  
	add_action('update_option_blogname', 'cms_with_tms_update_blogname',5,2);
	add_action('update_option_blogdescription', 'cms_with_tms_update_blogdescription',5,2);
	$widget_groups = $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name LIKE 'widget\\_%'");
  foreach($widget_groups as $widget){
    add_action('update_option_' . $widget->option_name, 'cms_with_tms_update_widget_title', 5, 2);
  }    
  add_action('update_option_widget_text', 'cms_with_tms_update_widget_text', 5, 2);  
}

function cms_with_tms_update_blogname($old,$new) {
	if ($old === $new) {
		return;
	}
	cms_with_tms_add_update_string('Blog Title',$new,'NEEDS UPDATE');
}

function cms_with_tms_update_blogdescription($old,$new) {
	if ($old === $new) {
		return;
	}
	cms_with_tms_add_update_string('Tagline',$new,'NEEDS UPDATE');
}

function cms_with_tms_update_widget_title($old,$new) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
  $def_language = get_option("cms_with_tms_def_lang");   
  $curr_lang = cms_with_tms_get_current_language();
  
	foreach($new as $key=>$val) {
		if(isset($val['title'])) {
			if(isset($old[$key]['title']) && $old[$key]['title']) {
				$exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Widget Title - '.md5(apply_filters('widget_title',$old[$key]['title'])),$def_language));
				if ($exists) {
					if ($curr_lang === $def_language) {
						$wpdb->update($table_name1,array('name'=>'Widget Title - '.md5(apply_filters('widget_title',$val['title'])),'value'=>apply_filters('widget_title',$val['title'])),array('id'=>$exists->id),array('%s','%s'), array('%d'));
						cms_with_tms_update_translations($exists->id,'NEEDS UPDATE');
					}
				}
			} elseif ($new[$key]['title'] && $old[$key]['title'] != $new[$key]['title']) {
				if ($curr_lang === $def_language) {
					cms_with_tms_add_update_string('Widget Title',apply_filters('widget_title',$new[$key]['title']),'NEEDS UPDATE');
				}
			}
		}
	}	
}

function cms_with_tms_update_widget_text($old,$new) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
  $def_language = get_option("cms_with_tms_def_lang");   
  $curr_lang = cms_with_tms_get_current_language();
  
	$widget_text = get_option('widget_text'); 
	if(is_array($widget_text)) {
  	foreach($widget_text as $key=>$val) {	
  		if(isset($old[$key]['text']) && trim($old[$key]['text']) && $old[$key]['text'] != $val['text']) {
  			$exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Widget Text - '.md5(apply_filters('widget_text',$old[$key]['text'])),$def_language));
				if ($exists) {
					if ($curr_lang === $def_language) {
						$wpdb->update($table_name1,array('name'=>'Widget Text - '.md5(apply_filters('widget_text',$val['title'])),'value'=>apply_filters('widget_text',$val['text'])),array('id'=>$exists->id),array('%s','%s'), array('%d'));
						cms_with_tms_update_translations($exists->id,'NEEDS UPDATE');
					}
				}
			} elseif ($new[$key]['text'] && $old[$key]['text'] != $new[$key]['text']) {
				if ($curr_lang === $def_language) {
					cms_with_tms_add_update_string('Widget Text',apply_filters('widget_text',$new[$key]['text']),'NEEDS UPDATE');	
				}
  		}
  	}
	}
}

add_filter('option_blogname', 'cms_with_tms_st_blogname');

function cms_with_tms_st_blogname($blogname) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
	$table_name2 = $wpdb->prefix . "cwt_string_translations";  	
	
  $def_language = get_option("cms_with_tms_def_lang");  
  $curr_lang = cms_with_tms_get_current_language();
  
  if ($def_language === $curr_lang) {
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name1 where name = %s and language = %s",'Blog Title',$def_language));
  } else {
  	$string_id = $wpdb->get_var($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Blog Title',$def_language));
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name2 where string_id = %d and language = %s",$string_id,$curr_lang));
  }		
	if ($res and $res->value != '') {
		return $res->value;
	} else {
		return $blogname;
	}
}

add_filter('option_blogdescription', 'cms_with_tms_st_blogdescription');

function cms_with_tms_st_blogdescription($blogdesc) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
	$table_name2 = $wpdb->prefix . "cwt_string_translations";  	
	
  $def_language = get_option("cms_with_tms_def_lang");  
  $curr_lang = cms_with_tms_get_current_language();
  
  if ($def_language === $curr_lang) {
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name1 where name = %s and language = %s",'Tagline',$def_language));
  } else {
  	$string_id = $wpdb->get_var($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Tagline',$def_language));
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name2 where string_id = %d and language = %s",$string_id,$curr_lang));
  }		
	if ($res and $res->value != '') {
		return $res->value;
	} else {
		return $blogdesc;
	}	
}

add_filter('widget_title', 'cms_with_tms_st_widget_title');

function cms_with_tms_st_widget_title($wtitle) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
	$table_name2 = $wpdb->prefix . "cwt_string_translations";  	
	
  $def_language = get_option("cms_with_tms_def_lang");  
  $curr_lang = cms_with_tms_get_current_language();
  
  if ($def_language === $curr_lang) {
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name1 where name = %s and language = %s",'Widget Title - '.md5($wtitle),$def_language));
  } else {
  	$string_id = $wpdb->get_var($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Widget Title - '.md5($wtitle),$def_language));
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name2 where string_id = %d and language = %s",$string_id,$curr_lang));
  }		
	if ($res and $res->value != '') {
		return $res->value;
	} else {
		return $wtitle;
	}	
}

add_filter('widget_text', 'cms_with_tms_st_widget_text');

function cms_with_tms_st_widget_text($wtext) {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
	$table_name2 = $wpdb->prefix . "cwt_string_translations";  	
	
  $def_language = get_option("cms_with_tms_def_lang");  
  $curr_lang = cms_with_tms_get_current_language();
  
  if ($def_language === $curr_lang) {
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name1 where name = %s and language = %s",'Widget Text - '.md5($wtext),$def_language));
  } else {
  	$string_id = $wpdb->get_var($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",'Widget Text - '.md5($wtext),$def_language));
  	$res = $wpdb->get_row($wpdb->prepare("select * from $table_name2 where string_id = %d and language = %s",$string_id,$curr_lang));
  }		
	if ($res and $res->value != '') {
		return $res->value;
	} else {
		return $wtext;
	}	
}

function cms_with_tms_add_update_string($name,$value,$status='') {
	global $wpdb;
  $table_name1 = $wpdb->prefix . "cwt_strings";
  $def_language = get_option("cms_with_tms_def_lang");  
  $curr_lang = cms_with_tms_get_current_language();   
    
  switch($name) {		
		
		case 'Widget Title' :
			//print_r($value);
			$active_widgets = array();
			foreach($value as $key=>$val) {
				if ($key != 'wp_inactive_widgets' and $key != 'array_version') {
					foreach ($value[$key] as $v) {
						$active_widgets[] = $v;
					}					
				}
			}
			//print_r($active_widgets);
			foreach($active_widgets as $widget) {
				$wname = preg_replace('#-[0-9]+#','',$widget);
				//echo $wname;
				$w = get_option("widget_".$wname);
				
				$idx = 1;
				if (preg_match('#-([0-9]+)$#i',$widget, $matches)==TRUE) {
					$idx = $matches[1];
				}
				
				if(isset($w[$idx]['title']) && $w[$idx]['title']) {
            $title = $w[$idx]['title'];     
        } else {
            $title = cms_with_tms_get_default_widget_title($widget);
            $w[$idx]['title'] = $title;
            update_option("widget_".$wname, $w);
        }			
        //echo $title;
        if($title) {
        	$exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where name = %s and language = %s","$name - ".md5(apply_filters('widget_title',$title)),$def_language));
					if ($exists) {
						if ($curr_lang === $def_language) {
							$wpdb->update($table_name1,array('value'=>apply_filters('widget_title',$title)),array('id'=>$exists->id),array('%s'), array('%d'));
						}
					} else {
						if ($curr_lang === $def_language) {
							$wpdb->insert($table_name1,array('language'=>$def_language,'name'=>"$name - ".md5(apply_filters('widget_title',$title)),'value'=>apply_filters('widget_title',$title)),array('%s','%s','%s'));
						}
					}
        }
			}
		break;
		case 'Widget Text' :
			$active_text_widgets = array();
			foreach($value as $key=>$val) {
				if ($key != 'wp_inactive_widgets' and $key != 'array_version') {
					foreach ($value[$key] as $v) {
						if(preg_match('#text-([0-9]+)#i',$v, $matches)) {
							$active_text_widgets[] = $matches[1];
						}
					}					
				}
			}
			$widget_text = get_option('widget_text');
    	if(is_array($widget_text)) {
      	foreach($widget_text as $key=>$val) {
        	if(!empty($val) && isset($val['title']) && in_array($key, $active_text_widgets)) {        		
			    	$exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where name = %s and language = %s","$name - ".md5(apply_filters('widget_text',$val['text'])),$def_language));
						if ($exists) {
							if ($curr_lang === $def_language) {
								$wpdb->update($table_name1,array('value'=>apply_filters('widget_text',$val['text'])),array('id'=>$exists->id),array('%s'), array('%d'));
							}
						} else {
							if ($curr_lang === $def_language) {
								$wpdb->insert($table_name1,array('language'=>$def_language,'name'=>"$name - ".md5(apply_filters('widget_text',$val['text'])),'value'=>apply_filters('widget_text',$val['text'])),array('%s','%s','%s'));
							}
						}
          }
        }
      }
		break;
  	case 'Blog Title' :
  	case 'Tagline' :
  		$exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where name = %s and language = %s",$name,$def_language));
			if ($exists) {
				if ($curr_lang === $def_language) {					
					$wpdb->update($table_name1,array('value'=>$value),array('id'=>$exists->id),array('%s'), array('%d'));
					if ($status != '') {
						cms_with_tms_update_translations($exists->id,$status);
					}
				}
			} else {
				$wpdb->insert($table_name1,array('language'=>$def_language,'name'=>$name,'value'=>$value),array('%s','%s','%s'));
			}
		break;
  }		
}

function cms_with_tms_get_default_widget_title($w) {
	if(preg_match('#archives(-[0-9]+)?$#i',$w)) {                        
		$title = 'Archives';
	} elseif(preg_match('#categories(-[0-9]+)?$#i',$w)) {
		$title = 'Categories';
	} elseif(preg_match('#calendar(-[0-9]+)?$#i',$w)) {
		$title = 'Calendar';
	} elseif(preg_match('#links(-[0-9]+)?$#i',$w)) {
		$title = 'Links';
	} elseif(preg_match('#meta(-[0-9]+)?$#i',$w)) {
		$title = 'Meta';
	} elseif(preg_match('#pages(-[0-9]+)?$#i',$w)) {
		$title = 'Pages';
	} elseif(preg_match('#recent-posts(-[0-9]+)?$#i',$w)) {
		$title = 'Recent Posts';
	} elseif(preg_match('#recent-comments(-[0-9]+)?$#i',$w)) {
		$title = 'Recent Comments';
	} elseif(preg_match('#rss-links(-[0-9]+)?$#i',$w)) {
		$title = 'RSS';
	} elseif(preg_match('#search(-[0-9]+)?$#i',$w)) {
		$title = 'Search';
	} elseif(preg_match('#tag-cloud(-[0-9]+)?$#i',$w)) {
		$title = 'Tag Cloud';
	} else {
		$title = false;
	}  
	return $title;  
}

function cms_with_tms_update_translations($string_id,$status) {
	global $wpdb;
	$tablename = $wpdb->prefix . "cwt_string_translations";  
	$wpdb->update($tablename,array('status'=>$status),array('string_id'=>$string_id),array('%s'), array('%d'));
}

function db_get_strings() {
	global $wpdb;
	$tablename = $wpdb->prefix . "cwt_strings";
  $def_language = get_option("cms_with_tms_def_lang");  
  
  $sql = $wpdb->prepare("SELECT id, name, value from $tablename WHERE language=%s ",$def_language);
  //echo $sql;
  return $wpdb->get_results($sql);
}

function db_get_string_translation($string_id,$lang) {
	global $wpdb;
	$tablename = $wpdb->prefix . "cwt_string_translations";  
  
  $sql = $wpdb->prepare("SELECT * from $tablename WHERE string_id = %d and language = %s",$string_id,$lang);
  //echo $sql;
  return $wpdb->get_row($sql);
}

function db_add_update_string_translation($string_id,$language,$value) {
	global $wpdb;
	$table_name1 = $wpdb->prefix . "cwt_string_translations";  
  
  $exists = $wpdb->get_row($wpdb->prepare("select id from $table_name1 where string_id = %d and language = %s",$string_id,$language));;
  if ($exists) {
    $wpdb->update($table_name1,array('value'=>$value,'status'=>'COMPLETE'),array('id'=>$exists->id),array('%s','%s'), array('%d'));
  } else {
    $wpdb->insert($table_name1,array('language'=>$language,'string_id'=>$string_id,'status'=>'COMPLETE','value'=>$value),array('%s','%d','%s','%s'));
  }
}

function cms_with_tms_get_current_language() {
	global $wpdb;
	$language = get_option("cms_with_tms_def_lang");

 	if (get_option('globalsight-url-type','param') === 'param') {
		if (isset($_GET['cwtlang']) && $_GET['cwtlang'] != '') {
		  $language = $_GET['cwtlang'];    
		}
	} else {  
  	$regexp = "";
		$language_codes = get_option("cms_with_tms_lang_codes");
		foreach ($language_codes as $language_code) {
			$regexp.=$language_code."|";
		}
		$regexp=substr($regexp, 0, -1);
		
		$RegularExpression="`\/($regexp)\/(.*)?`U";
		
		if (preg_match($RegularExpression,$_SERVER["REQUEST_URI"],$res)==TRUE) {
			$language=$res[1];
		}
	}
	return $language;
}
