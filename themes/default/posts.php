<?php theme_include('header'); ?>
<?php $disqus_shortname = ''; //set to your Disqus site shortname to use disqus instead of default comment system ?>

<section class="content">

	<?php if(has_posts()): ?>
		<ul class="items">
			<?php posts(); ?>
			<li>
				<article class="wrap">
					<h1>
						<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
					</h1>

					<div class="content">
						<?php
						echo article_custom_field('attachimg1') ? '<p><a href="'.article_custom_field('attachimg1').'"><img src="'.article_custom_field('attachimg1').'_preview.png" alt="Attached Image." /></a></p>' : '';
						echo Html::markdown(article_html(article_custom_field('processmarkdown')?article_custom_field('processmarkdown'):'yes'),article_custom_field('processmarkdown')?article_custom_field('processmarkdown'):'yes'); // this is doing a dance around markdown for items that don't want it
						if (article_custom_field('attachimg2')||article_custom_field('attachimg3')||article_custom_field('attachimg4')||article_custom_field('attachimg5')||article_custom_field('attachfile1')||article_custom_field('videohuluid')||article_custom_field('videoyoutubeid')||article_custom_field('videovimeoid')) echo "<br /><a href=\"".article_url()."\" title=\"".article_title()."\">See more</a>.";
						?>
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.<?php if(comments_open()&&$disqus_shortname!=''): ?> It has <a href="<?php echo article_url(); ?>#disqus_thread">0 Comments</a>.<?php endif; ?><?php echo article_custom_field('tags') ? '<br/>Tagged: '.article_custom_field('tags') : ''; ?>
					</footer>
				</article>
			</li>
			<?php $i = 0; while(posts()): $i++; ?>
			<li style="background: hsl(<?php echo round((360 / posts_per_page()) * $i); ?>,28%,<?php echo round((($i / posts_per_page()) * 20) + 20); ?>%);">
				<article class="wrap">
					<h2>
						<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>"><?php echo article_title(); ?></a>
					</h2>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>

		<?php if(has_pagination()): ?>
		<nav class="pagination">
			<div class="wrap">
				<?php echo posts_prev(); ?>
				<?php echo posts_next(); ?>
			</div>
		</nav>
		<?php endif; ?>

	<?php else: ?>
		<p>Looks like you have some writing to do!</p>
	<?php endif; ?>

</section>

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