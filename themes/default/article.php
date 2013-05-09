<?php theme_include('header'); ?>

		<section class="content wrap" id="article-<?php echo article_id(); ?>">
			<h1><?php echo article_title(); ?></h1>

			<article>
				<?php
				echo article_custom_field('attachimg1') ? '<p><a href="'.article_custom_field('attachimg1').'"><img src="'.article_custom_field('attachimg1').'_preview.png" alt="Attached Image." /></a></p>' : '';
				if (($theext = @pathinfo(article_custom_field('attachfile1'), PATHINFO_EXTENSION))=="webm"||$theext=="mp4") echo '<video id="attachvideo" class="video-js vjs-default-skin" width="400" height="240" controls preload="none" data-setup="{}"><source src="'.article_custom_field('attachfile1').'" type=\'video/webm; codecs="vp8, vorbis"\' /></video><script>var attachvideo = _V_("attachvideo");</script>';
				echo article_custom_field('videohuluid') ? '<iframe width="500" height="281" src="http://www.hulu.com/embed.html?eid='.article_custom_field('videohuluid').'" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> <p><a href="http://hulu.com/watch/?eid='.article_custom_field('videohuluid').'">See at Hulu</a>.</p>' : '';
				echo article_custom_field('videoyoutubeid') ? '<iframe width="500" height="281" src="http://www.youtube.com/embed/'.article_custom_field('videoyoutubeid').'" frameborder="0" allowfullscreen></iframe> <p><a href="http://youtu.be/'.article_custom_field('videoyoutubeid').'">See at YouTube</a>.</p>' : '';
				echo article_custom_field('videovimeoid') ? '<iframe src="http://player.vimeo.com/video/'.article_custom_field('videovimeoid').'" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p><a href="http://vimeo.com/'.article_custom_field('videovimeoid').'">See at Vimeo</a>.</p>' : '';
				echo article_markdown();
				if ($theext!="webm") echo article_custom_field('attachfile1') ? '<p>Attachment: <a href="'.article_custom_field('attachfile1').'">'.article_custom_field('attachfile1').'</a></p>' : '';
				if (article_custom_field('attachimg2')||article_custom_field('attachimg3')||article_custom_field('attachimg4')||article_custom_field('attachimg5')) {
					echo '<p></p><div class="attachimgcontainer">';
					echo article_custom_field('attachimg2') ? '<a href="'.article_custom_field('attachimg2').'"><img src="'.article_custom_field('attachimg2').'_thumb.png" alt="Attached Image." /></a>' : '';
					echo article_custom_field('attachimg3') ? '<a href="'.article_custom_field('attachimg3').'"><img src="'.article_custom_field('attachimg3').'_thumb.png" alt="Attached Image." /></a>' : '';
					echo article_custom_field('attachimg4') ? '<a href="'.article_custom_field('attachimg4').'"><img src="'.article_custom_field('attachimg4').'_thumb.png" alt="Attached Image." /></a>' : '';
					echo article_custom_field('attachimg5') ? '<a href="'.article_custom_field('attachimg5').'"><img src="'.article_custom_field('attachimg5').'_thumb.png" alt="Attached Image." /></a>' : '';
					echo "</div>";
				}
				?>
			</article>

			<section class="footnote">
				<!-- Unfortunately, CSS means everything's got to be inline. -->
				<p>This article is my <?php echo numeral(article_id()); ?> oldest. It is <?php echo count_words(article_markdown()); ?> words long<?php if(comments_open()): ?>, and it’s got <?php echo total_comments() . pluralise(total_comments(), ' comment'); ?> for now.<?php endif; ?> <?php echo article_custom_field('attribution'); ?><?php echo article_custom_field('tags') ? '<br/>Tagged: '.article_custom_field('tags') : ''; ?></p>
			</section>
		</section>

		<?php if(comments_open()): ?>
		<section class="comments">
			<?php if(has_comments()): ?>
			<ul class="commentlist">
				<?php $i = 0; while(comments()): $i++; ?>
				<li class="comment" id="comment-<?php echo comment_id(); ?>">
					<div class="wrap">
						<h2><?php echo comment_name(); ?></h2>
						<time><?php echo relative_time(comment_time()); ?></time>

						<div class="content">
							<?php echo comment_text(); ?>
						</div>

						<span class="counter"><?php echo $i; ?></span>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>

			<form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
				<?php echo comment_form_notifications(); ?>

				<p class="name">
					<label for="name">Your name:</label>
					<?php echo comment_form_input_name('placeholder="Your name"'); ?>
				</p>

				<p class="email">
					<label for="email">Your email address:</label>
					<?php echo comment_form_input_email('placeholder="Your email (won’t be published)"'); ?>
				</p>

				<p class="textarea">
					<label for="text">Your comment:</label>
					<?php echo comment_form_input_text('placeholder="Your comment"'); ?>
				</p>

				<p class="submit">
					<?php echo comment_form_button(); ?>
				</p>
			</form>

		</section>
		<?php endif; ?>

<?php theme_include('footer'); ?>