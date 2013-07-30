## Anchor CMS

Anchor is a super-simple, lightweight blog system, made to let you just write. [Check out the site](http://anchorcms.com/). 

### Customized

This version of Anchor is modified to include bug fixes and additional features included below:

- Disable Directory Browsing with Default HTAccess
- Handle special characters in the edit form for posts, pages, and comments
- Handle square images when resizing
- Fix search and show newest first
- Make search pagination consistent with the posts page
- Only resize images if they are larger
- Previous and Next Article function for themes
- Choice of using Disqus for comments instead of the builtin comment system
    - You will need to set your Disqus shortname at the top of article.php and posts.php in the theme folder.
- Ability to ignore markdown for certain posts.
    - I found this useful for old stuff that I had imported that didn't play nice with the markdown processor.
    - For this, you need to add a new custom field in the site's dashboard with the following config:
        - extend / type / key / label
        - post / text / processmarkdown / Process Markdown (yes by default)
    - When you add a post, you can set this field to "no" to disable Markdown
- A custom CSS file for all your CSS rather than editing the existing CSS files in the theme.
- Tags
    - You need to add a new custom field in the site's dashboard with the following config:
        - extend / type / key / label
        - post / text / tags / Tags
    - (I actually made my label: Tags (comma separated))
    - When you enter Tags don't add spaces before or after the comma.
- Tag cloud or list
    - There are a few options for this, but you have to make them in (application root)/anchor/functions/helpers.php. See the notes in the file.
- Image upload process to respect the files Exif Orientation setting.
    - Nice for mobile uploads.
    - Important: ImageMagick must be installed and accessible via system('/usr/bin/mogrify') php. If it is not, then you should open and edit (application root)/anchor/libraries/imagetweak.php
- Image upload process creates thumbnails for images
    - This only applies to JPEG and TIF and only if the custom field is set to resize the image.
    - one at maximum dimensions of 500x500 and one at max of 250x250
    - Important: ImageMagick must be installed and accessible via system('/usr/bin/mogrify') and system('/usr/bin/convert') php.
- A few choices for attachments, images, and videos.
    - Includes the ability to have a header image for your post, and then up to 4 images posted inline at the bottom of the post. It also lets you post videos in webm or mp4 formats (uses Video.js). Or post videos from YouTube, Vimeo, or Hulu just by adding their ID to a post's custom field. All are available, but optional. Leave a field blank, and it will be ignored.
    - Need to add a few new custom fields in the site's dashboard with the following config:
        - extend / type / key / label / types / width / height
        - post / image / attachimg1 / Main image (will be larger) / jpg,gif,png,jpeg / 1600 / 1200
        - post / image / attachimg2 / Image Inline / jpg,gif,png,jpeg / 1600 / 1200
        - post / image / attachimg3 / Image Inline / jpg,gif,png,jpeg / 1600 / 1200
        - post / image / attachimg4 / Image Inline / jpg,gif,png,jpeg / 1600 / 1200
        - post / image / attachimg5 / Image Inline / jpg,gif,png,jpeg / 1600 / 1200
    - We are adding the width and height so it resizes to a max image size and strips tags (including geo)
    - Add another custom field with the following config:
        - extend / type / key / label / type
        - post / file / attachfile1 / Other file (ex: video, txt) / webm,avi,mp4,wav,mp3,txt,doc,docx,pdf
    - And a few more custom fields with the following config:
        - extend / type / key / label
        - post / text / videoyoutubeid / YouTube ID
        - post / text / videovimeoid / Vimeo ID
        - post / text / videohuluid / Hulu EID (not the ID)

This custom version requires ImageMagick.

### Requirements

- PHP 5.3.6+
    - curl
    - mcrypt
    - gd
    - pdo\_mysql or pdo\_sqlite
- MySQL 5.2+

To determine your PHP version, create a new file with this PHP code: `<?php echo PHP_VERSION; // version.php`. This will print your version number to the screen.

### Install

1. Insure that you have the required components.
2. Download Anchor either from [here](http://anchorcms.com/download) or by cloning this Github repo.
3. Upload Anchor through FTP/SFTP or whatever upload method you prefer to the public-facing directory of your site.
4. Ensure that the permissions for the `content` and `anchor/config` folders are set to `0777`.
5. Create a database for Anchor to install to. You may name it anything you like. The method for database creation varies depending on your webhost but may require using PHPMyAdmin or Sequel Pro. If you are unsure of how to create this, ask your host.
6. Navigate your browser to your Anchor installation URL, if you have placed Anchor in a sub directory make sure you append the folder name to the URL: `http://MYDOMAINNAME.com/anchor`
7. Follow the installer instructions
8. For security purposes, delete the `install` directory when you are done.

### Problems?

If you can't install Anchor, check the [forums](http://forums.anchorcms.com/); there's probably someone there who's had the same problem as you, and the community is always happy to help. Additionally, check out the [documentation](http://anchorcms.com/docs).

