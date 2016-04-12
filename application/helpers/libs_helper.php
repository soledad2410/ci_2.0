<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * page_count()
 *
 * @param int $total_record
 * @param int $limit
 * @return int
 */
function page_count($total_record, $limit) {
	$page = 1;
	if ($limit > 0) {
		$page = ceil($total_record / $limit);
	}
	return $page;
}

function create_selectbox_option($locs, $selected_loc = null) {
	$contents = '';
	foreach ($locs as $loc) {
		if ($selected_loc && $selected_loc == $loc['id']) {
			$contents . '<option value="' . $loc['id'] . '" selected="selected">' . $loc['name'] . '</option>';
		} else {
			$contents . '<option value="' . $loc['id'] . '">' . $loc['name'] . '</option>';
		}

	}
	return $contents;
}

function privilege_group($group_name) {
	if (!isset($_SESSION['user']['group_name']) || $_SESSION['user']['group_name'] != $group_name) {
		redirect('/admin/admin/errorpermission');
	}
}

/**
 * embed_flash()
 *
 * @param mixed $url
 * @param integer $width
 * @param integer $height
 * @return
 */
function embed_flash($url, $width = 100, $height = 100) {
	echo '<object height="' . $height . '" width="' . $width . '" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0">
          <param name="movie" value="' . $url . '">
          <param name="quality" value="high">
          <param name="menu" value="false">
          <param name="WMode" value="Transparent">
          <embed height="' . $height . '" width="' . $width . '" src="' . $url . '" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="Transparent">
        </object>';
}

/**
 * to_ansi_character()
 *
 * @param string $text
 * @param bool $space
 * @return string
 */
function to_ansi_character($text, $space = false) {
	$text = html_entity_decode($text);
	$text = preg_replace("/(ä|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = str_replace("ç", "c", $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|î|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ü|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
//CHU HOA
	$text = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = str_replace("Ç", "C", $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(̀|́|̉|$|>)/", '', $text);
	$text = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $text);

	$text = strtolower($text);
	$text = preg_replace('/\s\s+/', ' ', $text);
	$text = trim(preg_replace('/[^a-z0-9 ]/', '', $text));
	if (!$space) {
		$text = str_replace(" ", '-', $text);
	}
	$text = str_replace("----", "-", $text);
	$text = str_replace("---", "-", $text);
	$text = str_replace("--", "-", $text);
	return $text;
}

/**
 * advance_substr()
 *
 * @param mixed $count
 * @param mixed $string
 * @return void
 * @uses substring by space
 */
function advance_substr($count, $string) {
	$string_array = explode(" ", $string);

	$result_array = array_slice($string_array, 0, $count);
	$result = implode(" ", $result_array);
	if (count($string_array) >= $count) {
		$result .= '...';
	}
	return $result;

}

/**
 * to_mydata()
 *
 * @param mixed $array
 * @return string
 * @uses convert array to string mydata type
 */
function to_mydata($arr) {
	$str = '';

	foreach ($arr as $key => $value) {
		$str .= $key . '[-]' . $value;
		$str .= '[|]';
	}
	echo $str;
}

/**
 * mydata_toarray()
 *
 * @param mixed $string
 * @return array
 * @uses convert string to array mydata type
 */
function mydata_toarray($str) {
	$arr = explode('[|]', $str);
	if (empty($arr[count($arr) - 1])) {
		unset($arr[count($arr) - 1]);
	}

	foreach ($arr as $key => $value) {
		list($col_name, $col_value) = explode("[-]", $value);
		$rs[$col_name] = $col_value;
	}

	return $rs;
}

/**
 * is_extension()
 *
 * @param array $extensions
 * @param string $file
 * @return boolean
 */
function is_extension($extensions, $file_name) {
	$file_extension = strstr($file_name, ".");
	if (in_array(strtoupper($file_extension), $extensions)) {return true;} else {return false;}
}

/**
 * mktime_date_vi()
 *
 * @param string $date_month_year
 * @param string $delimiter
 * @param integer $second
 * @param integer $minute
 * @param integer $hour
 * @return int time
 */
function mktime_date_vi($date_month_year, $delimiter, $second = 0, $minute = 0, $hour = 0) {
	if (trim($date_month_year) != '') {
		list($date, $month, $year) = explode($delimiter, $date_month_year);
		$time = mktime($hour, $minute, $second, $month, $date, $year);
		return $time;
	}
}
/**
 * scale_image()
 *
 * @param mixed $image_url
 * @param bool $max_width
 * @param bool $max_width
 * @param mixed $des_name
 * @return void
 */
function scale_image($image_url, $max_width = false, $max_height = false, $thumb_dir = false, $des_name = false, $fit = false) {
	$image_url = rawurldecode($image_url);
	if (startsWith($image_url, '/')) {
		$image_url = substr($image_url, 1);
	}

	if (file_exists($image_url)) {
		$file_name = basename($image_url);

		list($name, $type) = explode('.', $file_name);
		$new_name = ($des_name ? $des_name : $name) . '_' . $max_width . '_' . $max_height . '.' . $type;
		$month = date('m');
		$year = date('Y');
		$thumb_path = 'upload/images/thumbs';
		if ($thumb_dir) {
			$thumb_path .= '/' . $thumb_dir;
		}
		if (file_exists($thumb_path . '/' . $new_name)) {return $thumb_path . '/' . $new_name;} else {
			if (@getimagesize($image_url)) {
				$size = getimagesize($image_url);
				$height = $size['1'];
				$width = $size['0'];
				$new_width = $max_width;
				$new_height = $max_height;
				$image_ratio = $width / $height;
				$frame_ratio = (!$max_width || !$max_height) ? $image_ratio : $max_width / $max_height;
				if ($image_ratio > $frame_ratio) {
					$new_width = $max_width;
					$new_height = round($new_width / $image_ratio);
				}
				if ($image_ratio < $frame_ratio) {
					$new_height = $max_height;
					$new_width = round($new_height * $image_ratio);
				}

				if ($fit) {
					$new_width = $max_width;
					$new_height = $max_height;
				}
				if (!$max_width) {
					$new_width = $max_height * $image_ratio;
				}
				if (!$max_height) {
					$new_height = $max_width / $image_ratio;
				}
				if (!file_exists($thumb_path)) {mkdir($thumb_path, 0777, true);}
				$image_resized = imagecreatetruecolor($new_width, $new_height);
				$image_temp = null;
				switch ($size['mime']) {
					case 'image/png':
						$image_temp = imagecreatefrompng($image_url);
						imagecopyresampled($image_resized, $image_temp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagepng($image_resized, $thumb_path . '/' . $new_name, 1);
						imagedestroy($image_resized);
						break;

					case 'image/jpeg':
						$image_temp = imagecreatefromjpeg($image_url);
						imagecopyresampled($image_resized, $image_temp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagejpeg($image_resized, $thumb_path . '/' . $new_name, 80);
						imagedestroy($image_resized);
						break;

					case 'image/gif':
						$image_temp = imagecreatefromgif($image_url);
						imagecopyresampled($image_resized, $image_temp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						imagegif($image_resized, $thumb_path . '/' . $new_name, 80);
						imagedestroy($image_resized);
						break;

					default:
						break;
				}

				return $thumb_path . '/' . $new_name;
			}
		}
	}
}

/**
 * prep_form()
 *
 * @param array $info
 * @return array
 */
function prep_form($info) {
	foreach ($info as $key => $value) {
		$info[$key] = form_prep($value);
	}

	return $info;
}

/**
 * admin_error()
 *
 * @param mixed $message
 * @return error message wwith html format
 */
function admin_error($message) {
	$msg = '<div id="message-error" class="message message-error">';
	$msg .= '<div class="image">';
	$msg .= '<img src="html/resources/images/icons/error.png" alt="Error" height="32" />';
	$msg .= '</div>';
	$msg .= '<div class="text">';
	$msg .= '<h6>Lỗi</h6>';
	$msg .= '<span id="error-message">' . $message . '</span>';
	$msg .= '</div>';
	$msg .= '<div class="dismiss">';
	$msg .= '<a href="#message-error"></a>';
	$msg .= '</div>';
	$msg .= '</div>';
	return $msg;
}

/**
 * admin_success()
 *
 * @param mixed $message
 * @return success message with html format
 */
function admin_success($message) {
	$msg = '<div class="message message-success" id="message-success">';
	$msg .= '<div class="image">';
	$msg .= '<img height="32" alt="Success" src="html/resources/images/icons/success.png"/>';
	$msg .= '</div>';
	$msg .= '<div class="text">';
	$msg .= '<h6>Thông báo</h6>';
	$msg .= '<span id="error-message">' . $message . '</span>';
	$msg .= '</div>';
	$msg .= '<div class="dismiss">';
	$msg .= '<a href="#message-success"></a>';
	$msg .= '</div>';
	$msg .= '</div>';
	return $msg;
}

/**
 * admin_warning()
 *
 * @param mixed $message
 * @return warning message with html format
 */
function admin_warning($message) {

	$msg = '<div class="message message-warning" id="message-warning">';
	$msg .= '<div class="image">';
	$msg .= '<img height="32" alt="Warning" src="html/resources/images/icons/warning.png">';
	$msg .= '</div>';
	$msg .= '<div class="text">';
	$msg .= '<h6>Thông báo</h6>';
	$msg .= '<span id="error-message">' . $message . '</span>';
	$msg .= '</div>';
	$msg .= '<div class="dismiss">';
	$msg .= '<a href="#message-warning"></a>';
	$msg .= '</div>';
	$msg .= '</div>';
	return $msg;

}
/**
 * datetime_vi()
 *
 * @param bool $time_stamp
 * @return
 */
function datetime_vi($time_stamp = false) {
	$time = ($time_stamp) ? $time_stamp : time();
	$date = date("d/m/Y", $time);
	$day = 'Chủ nhật';
	switch (date("N", $time)) {
		case '1':
			$day = 'Thứ hai';
			break;
		case '2':
			$day = 'Thứ ba';
			break;
		case '3':
			$day = 'Thứ tư';
			break;
		case '4':
			$day = 'Thứ năm';
			break;
		case '5':
			$day = 'Thứ sáu';
			break;
		case '6':
			$day = 'Thứ bảy';
			break;
		default:
			break;

	}
	return $day . ' ' . $date;
}

function flash_data($flash_data = false) {
	if ($flash_data) {$_SESSION['flash_data'] = $flash_data;} else {
		if (isset($_SESSION['flash_data'])) {
			$return_data = $_SESSION['flash_data'];
			unset($_SESSION['flash_data']);
			return $return_data;
		}
	}
}

function countdown_time($time) {
	$hour = floor($time / 3600);
	$minute = floor(($time - $hour * 3600) / 60);
	$second = $time - $minute * 60 - $hour * 3600;

	return array($hour, $minute, $second);
}

function check_name($min_length, $max_length, $str) {
	$patern = '/^[a-z\d_]{' . $min_length . ',' . $max_length . '}$/';
	if (preg_match($patern, $str)) {return true;} else {return false;}

}

function check_email($str) {
	$patern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	if (preg_match($patern, $str)) {
		return true;
	} else {return false;}

}

/**
 * is_user_agent()
 *
 * @param string $type
 * @return bool
 * @uses check browser type : bot,browser,mobile
 */
function is_user_agent($type = NULL) {
	$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if ($type == 'bot') {
		// matches popular bots
		if (preg_match("/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent)) {
			return true;
			// watchmouse|pingdom\.com are "uptime services"
		}
	} else if ($type == 'browser') {
		// matches core browser types
		if (preg_match("/mozilla\/|opera\//", $user_agent)) {
			return true;
		}
	} else if ($type == 'mobile') {
		// matches popular mobile devices that have small screens and/or touch inputs
		// mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
		// detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
		if (preg_match("/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent)) {
			// these are the most common
			return true;
		} else if (preg_match("/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent)) {
			// these are less common, and might not be worth checking
			return true;
		}
	}
	return false;
}

/**
 * isInteger()
 *
 * @param string $input
 * @return bool
 * @uses check string is integer (0-9)
 */
function isInteger($input) {
	return (ctype_digit(strval($input)));
}

function curPageURL() {
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function format_number($number, $str_format = '0', $maxlength) {
	if ($maxlength <= strlen(strval($number))) {return $number;}
	return strval(str_repeat($str_format, ($maxlength - strlen(strval($number)))) . $number);

}

function read_excel($file) {

	/** PHPExcel_IOFactory */
	require_once dirname(__FILE__) . '/../third_party/phpexcel/Classes/PHPExcel/IOFactory.php';

	$inputFileName = $file;

	$objReader = new PHPExcel_Reader_Excel5();

	$objPHPExcel = $objReader->load($inputFileName);

	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
	return $sheetData;
}
/**
 * $labels = [['key1'=>val1,'key2'=>val2],['key1'=>val11,'key2'=>val12]];
 * $heading = ['title1','title2','title3']
 * */
function export_excel($labels, $datas) {

	require_once dirname(__FILE__) . '/../third_party/phpexcel/PHPExcel.php';

	$objPHPExcel = new PHPExcel();
	$list = array();
	foreach (range('A', 'Z') as $char) {
		$list[] = $char;
	}

	$objPHPExcel->getProperties()->setCreator("SystemCp")
		->setLastModifiedBy("LupitaVn")
		->setTitle("Danh sách khách hàng đăng ký " . date('d-m-Y H:i:s'))
		->setSubject("Danh sách khách đăng ký")
		->setDescription("Danh sách khách đăng ký")
		->setKeywords("Danh sách khách đăng ký")
		->setCategory("Danh sách khách đăng ký");
	$count = count($labels) > count($list) ? count($list) : count($labels);

	array_unshift($datas, $labels);
	if (count($datas)) {
		for ($i = 0; $i < count($datas); $i++) {
			for ($j = 0; $j < $count; $j++) {
				$tmp = $i + 1;

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($list[$j] . $tmp, $datas[$i][$j]);
			}
			;
		}
	}

// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Shee1');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	ob_start();
// Redirect output to a client’s web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Danh_sach_khach_dang_ky_' . date('d_m_y') . '.xlsx"');
	header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	exit();
}

function admin_paginator($total, $limit = 20) {
	if ($total <= 0 || $limit <= 0) {return;}
	$params = $_GET;

	$current_page = isset($params['page']) ? $params['page'] : 1;
	$offset = ($current_page - 1) * $limit;
	$to = $current_page * $limit > $total ? $total : $current_page * $limit;
	$total_page = page_count($total, $limit);
	$url = strtok($_SERVER['REQUEST_URI'], '?');
	$content = '<div class="pagination">';
	$content .= '	<div class="results">';
	$content .= '<span>Hiển thị kết quả từ ' . $offset . ' - ' . $to . ' của tổng ' . $total . '</span>';
	$content .= '<span style="float: left;margin-left: 10px;"><select id="num-row-order" data="' . $limit . '">';
	$content .= '                <option value="20" >20</option>';
	$content .= '                      <option value="30">30</option>';
	$content .= '                          <option value="40">40</option>';
	$content .= '          <option value="60">60</option>';
	$content .= '          <option value="80" >80</option>';
	$content .= '          <option value="100">100</option>';
	$content .= '          </select>';
	$content .= '          </span>';
	$content .= '</div>';
	if ($total_page > 0) {
		$url .= '?';

		$content .= '<ul class="pager">';
		for ($i = 1; $i <= $total_page; $i++) {
			$params['page'] = $i;
			$pattern = '';
			foreach ($params as $key => $value) {
				$pattern .= $key . "=" . $value . "&";
			}
			$link = $url . $pattern;
			if ($i == $current_page) {
				$content .= '<li class="current">' . $i . '</li>';
			} else {
				$content .= '<li ><a href="' . $link . '">' . $i . '</a></li>';
			}
		}
		$content .= '</ul>';

	}
	$content .= '</div>';
	return $content;
}

/**
 * png_image_create()
 *
 * @param mixed $text
 * @param mixed $width
 * @param mixed $heigt
 * @param mixed $fontsize
 * @param mixed $hex_color
 * @return image
 */
function png_image_create($text) {
	if (trim($text) == '') {
		return;
	}
	$new_name = to_ansi_character($text) . '.png';

	$thumb_path = 'upload/panoramas/hotspot_caption';
	if (file_exists($thumb_path . '/' . $new_name)) {
		return $thumb_path . '/' . $new_name;
	}

	$string = $text;

	$font = 'asset/captcha/times_0.ttf';
	$font_size = 14;
	$text_box = imagettfbbox($font_size, 0, $font, $text);
	$text_width = $text_box[2] - $text_box[0];
	$width = $text_width + 14;
	$height = 28;
	$image = imagecreatetruecolor($width, $height);
	$black = imagecolorallocate($image, 0, 0, 0); // text color
	$white = imagecolorallocate($image, 255, 255, 255); // background color
	$green = imagecolorallocate($image, 53, 170, 195);
	//imagecolortransparent($image, $black);

	$text_width = $text_box[2] - $text_box[0];
	$text_height = $text_box[3] - $text_box[1];
	$x = ($width / 2) - ($text_width / 2);
	$y = ($height / 2) - ($text_height / 2);
	$silver = imagecolorallocate($image, 204, 204, 204);
	$gray = imagecolorallocate($image, 155, 155, 155);
	imagefill($image, 0, 0, $white);
	imagettftext($image, $font_size, 0, $x, 20, $green, $font, $string);
	imagepng($image, $thumb_path . '/' . $new_name, 1);
	return $thumb_path . '/' . $new_name;

}
function get_skype_status($username) {
	$status = 'off';
	/***************************************
	Possible status  values:
	NUM        TEXT                DESCRIPTION
	 * 0     UNKNOWN             Not opted in or no data available.
	 * 1     OFFLINE                 The user is Offline
	 * 2     ONLINE                  The user is Online
	 * 3     AWAY                    The user is Away
	 * 4     NOT AVAILABLE       The user is Not Available
	 * 5     DO NOT DISTURB  The user is Do Not Disturb (DND)
	 * 6     INVISIBLE               The user is Invisible or appears Offline
	 * 7     SKYPE ME                The user is in Skype Me mode
	 ****************************************/
	$url = "http://mystatus.skype.com/" . $username;
	//getting contents

	$data = trim(file_get_contents($url));

	switch ($data) {
		case 'Online':
			$status = 'on';
			break;
		case 'Do Not Disturb':
			$status = 'busy';
		case 'Away':
			$status = 'away';
		default:
			$status = 'off';
			break;
	}
	return $status;

}

function clean_cache_file($cache_dir = 'application/cache') {
	$files = glob($cache_dir . '/*'); // get all file names
	foreach ($files as $file) {
		// iterate files
		if (is_file($file)) {
			unlink($file); // delete file
		}
	}
}

function startsWith($haystack, $needle) {
	// search backwards starting from haystack length characters from the end
	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function endsWith($haystack, $needle) {
	// search forward starting from end minus needle length characters
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function create_thumb_image($path) {
	$CI = &get_instance();
	$CI->load->library('image_lib');
	$config['image_library'] = 'gd2';
	$config['source_image'] = FCPATH . $path;
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	$config['width'] = 900;
	$config['height'] = 900;

	$CI->image_lib->clear();
	$CI->image_lib->initialize($config);
	$CI->image_lib->resize();
}