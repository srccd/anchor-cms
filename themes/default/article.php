<?php theme_include('header'); ?>
<?php $disqus_shortname = ''; //set to your Disqus site shortname to use disqus instead of default comment system ?>

		<section class="content wrap" id="article-<?php echo article_id(); ?>">
			<h1><?php echo article_title(); ?></h1>

			<article>
				<?php echo article_markdown(); ?>
			</article>

			<section class="footnote">
				<!-- Unfortunately, CSS means everything's got to be inline. -->
				<p>Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.<?php if(comments_open()): ?> It has <?php if($disqus_shortname!=''): ?><a href="<?php echo article_url(); ?>#disqus_thread">0 Comments</a><?php else: echo total_comments() . pluralise(total_comments(), ' comment'); endif; ?> for now.<?php endif; ?><br/>
				<p>This article is my <?php echo numeral(article_id()); ?>. It is <?php echo count_words(article_markdown()); ?> words long. <?php echo article_custom_field('attribution'); ?><?php echo article_previous() ? ' <a href="'.article_previous().'">&laquo; Previous article</a>' : ''; ?><?php echo article_next() ? ' <a href="'.article_next().'">Next article &raquo;</a>' : ''; ?></p>
			</section>
		</section>

		<?php if(comments_open()): ?>
			<?php if($disqus_shortname!=''): ?>
			<section class="comments wrap">
				<div id="disqus_thread"></div>
				<script type="text/javascript">
				    var disqus_shortname = '<?php echo $disqus_shortname; ?>';
				    (function() {
				        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				    })();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
			</section>
			<?php else: ?>
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
		<?php endif; ?>

	<?php if($disqus_shortname!=''): ?>
    <script type="text/javascript">
    var disqus_shortname = '<?php echo $disqus_shortname; ?>';
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
    <?php endif; ?>

<?php theme_include('footer'); ?>