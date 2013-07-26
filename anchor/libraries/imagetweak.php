<?php
class ImageTweak extends Image {
	public static function rotationfix($file) {
		if(file_exists($file) === false) {
			return false;
		}
		if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), array("tiff","tif","jpeg","jpg"))) {
			$exifofimage = @exif_read_data($file);
		}
		if(!empty($exifofimage['Orientation'])) {
			switch($exifofimage['Orientation']) {
				case 8:
					$theexifreturn = system('/usr/bin/mogrify -rotate -90 "'.$file.'" 2>&1'); //mogrify is clockwise
					break;
				case 3:
					$theexifreturn = system('/usr/bin/mogrify -rotate 180 "'.$file.'" 2>&1');
					break;
				case 6:
					$theexifreturn = system('/usr/bin/mogrify -rotate 90 "'.$file.'" 2>&1');
					break;
			}
		}
		return parent::open($file);
		return false;
	}

	public function makeathumb($file) {
		if(file_exists($file) === false) {
			return false;
		}
		//Need to see if it is a GIF due to the frame issue
		list($width, $height, $type) = getimagesize($file);
		$thegifkind = '';
		$thegifnum = '';
		if($type === IMAGETYPE_GIF) {
			$thegifkind = " -coalesce";
			$thegifnum = "[0]";
		}
		//$theexifreturn = system('/usr/bin/convert -define jpeg:size=400x400 "'.$file.'" -thumbnail "250x250>" "'.$file.'_thumb.png" 2>&1'); //if you want to save some processing power
		$theexifreturn = system('/usr/bin/convert "'.$file.$thegifnum.'" -background transparent'.$thegifkind.' -thumbnail "250x250>" "'.$file.'_thumb.png" 2>&1');
		if (strlen($theexifreturn) > 1) {
			return false;
		}
		//$theexifreturn = system('/usr/bin/convert -define jpeg:size=800x800 "'.$file.'" -thumbnail "500x500>" "'.$file.'_preview.png" 2>&1'); //if you want to save some processing power
		$theexifreturn = system('/usr/bin/convert "'.$file.$thegifnum.'" -background transparent'.$thegifkind.' -thumbnail "500x500>" "'.$file.'_preview.png" 2>&1');
		if (strlen($theexifreturn) > 1) {
			return false;
		}
		return true;
	}

}
?>