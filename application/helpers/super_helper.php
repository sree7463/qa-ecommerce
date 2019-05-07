<?PHP 

function seo_friendly_url($string) {
	$string = str_replace(array('[\', \']'), '', $string);
	$string = preg_replace('/\[.*\]/U', '', $string);
	$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
	return strtolower(trim($string, '-'));
}

function filter_this($input) {
	$input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

function resize_image($filepath, $res_width, $res_height, $savepath) {
  list($width, $height) = getimagesize($filepath);
  $org_image = $filepath;
  $new_image = imagecreatefromfile($filepath);
  $new_image = imagescale( $new_image, $res_width, $res_height);
  imagejpeg($new_image, $savepath);
  // imagecopyresampled($true_color, $new_image, 0, 0, 0, 0, $res_width, $res_height, $width, $height);
}


function imagecreatefromfile($filename) {
  if (!file_exists($filename)) {
    throw new InvalidArgumentException('File "' . $filename . '" not found.');
  }
  switch (strtolower(pathinfo($filename, PATHINFO_EXTENSION))) {
    case 'jpeg':
    case 'jpg':
      return imagecreatefromjpeg($filename);
      break;
    
    case 'png':
      return imagecreatefrompng($filename);
      break;
    
    case 'gif':
      return imagecreatefromgif($filename);
      break;
    
    default:
      throw new InvalidArgumentException('File "' . $filename . '" is not valid jpg, png or gif image.');
      break;
  }
}