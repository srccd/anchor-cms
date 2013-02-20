<?php theme_include('header'); ?>

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
<<<<<<< HEAD
						<?php echo Html::markdown(article_html(article_custom_field('processmarkdown')?article_custom_field('processmarkdown'):'yes'),article_custom_field('processmarkdown')?article_custom_field('processmarkdown'):'yes'); // this is doing a dance around markdown for items that don't want it ?>
=======
						<?php
						echo article_custom_field('attachimg1') ? '<p><a href="'.article_custom_field('attachimg1').'"><img src="'.article_custom_field('attachimg1').'_preview.png" alt="Attached Image." /></a></p>' : '';
						echo Html::markdown(article_html());
						if (article_custom_field('attachimg2')||article_custom_field('attachimg3')||article_custom_field('attachimg4')||article_custom_field('attachimg5')||article_custom_field('attachfile1')||article_custom_field('videohuluid')||article_custom_field('videoyoutubeid')||article_custom_field('videovimeoid')) echo "<br /><a href=\"".article_url()."\" title=\"".article_title()."\">See more</a>.";
						?>
>>>>>>> dev_attachplus
					</div>

					<footer>
						Posted <time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time> by <?php echo article_author('real_name'); ?>.<?php echo article_custom_field('tags') ? '<br/>Tagged: '.article_custom_field('tags') : ''; ?>
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

<?php theme_include('footer'); ?>