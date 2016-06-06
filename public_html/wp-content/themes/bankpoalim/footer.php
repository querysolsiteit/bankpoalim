<?php
	$footer_menu_id = get_field('footer_top_menu','option');
	$footer_content = get_field('footer_content','option');
	$copyright      = get_field('copyright','option');
?>
	<footer id="page-footer" class="footer footer--main">
		<div class="wrapper">
		  <?php wp_nav_menu(
				  array(
					  'theme_location' => 'footer-top-menu',
					  'menu_class' => 'footer-links-block',
					  'container_class'=>'',
					  'walker'=> new Footer_Top_Walker_Nav_Menu
			  ));
		  ?>

			<?php if($footer_content):?><p class="body-text"><?php echo $footer_content;?></p><?php endif;?>

			<ul class="row row--with-more-gutter row--lg footer-links-row">
				<?php for($i = 1; $i <= 5; $i++ ): ?>
					<li class="col col-1-5">
						<?php
							if(is_active_sidebar('footer_0'.$i)){
								dynamic_sidebar('footer_0'.$i);
							}
						?>
					</li>
				<?php endfor; ?>
			</ul>
		</div>
	</footer>
		<?php if($copyright):?><div class="footer-bottom"><?php echo $copyright;?></div><?php endif;?>

		<?php wp_footer(); ?>
	</body>
</html>
