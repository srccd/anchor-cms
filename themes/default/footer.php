		<div class="wrap">
	            <footer id="bottom">
					<?php
					// TAGS CLOUD OR LIST
					$tagresult = tag_cloud();
					if(isset($tagresult)) {
						echo '<strong>Random Tags:</strong><br /><ul class="tags">';

						foreach($tagresult as $tagname => $tagcount) {
							echo '<li><label><a href="'.tagged_url().'/'.$tagname.'">'.$tagname.'</a></label><count>'.$tagcount.'</count></li>';
						}
						echo '</ul>';
					}
					?>
	                <small>&copy; <?php echo date('Y'); ?> <?php echo site_name(); ?>. All rights reserved.</small>

	                <ul role="navigation">
	                    <li><a href="<?php echo rss_url(); ?>">RSS</a></li>
	                    <?php if(twitter_account()): ?>
	                    <li><a href="<?php echo twitter_url(); ?>">@<?php echo twitter_account(); ?></a></li>
	                    <?php endif; ?>

	                    <li><a href="<?php echo base_url('admin'); ?>" title="Administer your site!">Admin area</a></li>

	                    <li><a href="/" title="Return to my website.">Home</a></li>
	                </ul>
	            </footer>

	        </div>
        </div>
    </body>
</html>