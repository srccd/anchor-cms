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
						<?php echo Html::markdown(article_html()); ?>
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.<?php if(comments_open()&&$disqus_shortname!=''): ?> It has <a href="<?php echo article_url(); ?>#disqus_thread">0 Comments</a>.<?php endif; ?>
					</footer>
				</article>
			</li>
			<?php $i = 0; while(posts()): $i++; ?>
			<li style="background: hsl(215,28%,<?php echo round((($i / posts_per_page()) * 20) + 20); ?>%);">
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