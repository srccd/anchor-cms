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
}
?>