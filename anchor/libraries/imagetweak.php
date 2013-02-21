<?php
class ImageTweak extends Image {
	public function rotationfix($file) {
		if(file_exists($file) === false) {
			return false;
		}
		$exifofimage = @exif_read_data($file);
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
		//$theexifreturn = system('/usr/bin/convert -define jpeg:size=400x400 "'.$file.'" -thumbnail "250x250>" "'.$file.'_thumb.png" 2>&1'); //if you want to save some processing power
		$theexifreturn = system('/usr/bin/convert "'.$file.'" -background transparent -thumbnail "250x250>" "'.$file.'_thumb.png" 2>&1');
		if (strlen($theexifreturn) > 1) {
			return false;
		}
		//$theexifreturn = system('/usr/bin/convert -define jpeg:size=800x800 "'.$file.'" -thumbnail "500x500>" "'.$file.'_preview.png" 2>&1'); //if you want to save some processing power
		$theexifreturn = system('/usr/bin/convert "'.$file.'" -background transparent -thumbnail "500x500>" "'.$file.'_preview.png" 2>&1');
		if (strlen($theexifreturn) > 1) {
			return false;
		}
		return true;
	}

}
?>