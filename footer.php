<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chef-abul-theme
 */

?>
<section class="subscribes" style="background-image: url(<?php $page_id = 11; the_field('subscribes_bg',$page_id) ?>);">
	<div class="container">
		<div class="flex">
			<div class="left">
				<div class="title"><?php $page_id = 11; the_field('subscribes_title',$page_id) ?></div>
				<p><?php $page_id = 11; the_field('subscribes_text',$page_id) ?></p>
			</div>
			<div class="right">
				<?php echo do_shortcode('[contact-form-7 id="144" title="Без названия"]'); ?>
			</div>
		</div>
	</div>
</section>
<footer class="footer">
	<div class="container">
		<div class="flex">
			<div class="item">
				<div class="menu-name"><?php $page_id = 11; the_field('menu_title-1',$page_id) ?></div>
				<ul>
					<?php $page_id = 11; if (have_rows('footer_list-1',$page_id)) : while (have_rows('footer_list-1',$page_id)) : the_row(); ?>
						<li>
							<a href="<?php
								$page_id = 11;
								the_sub_field('footer_link-1',$page_id); ?>">
								<?php $page_id = 11; the_sub_field('footer_link-text-1',$page_id); ?>
							
							</a>
						</li>
					<?php endwhile;
				else : endif; ?>
			
			</ul>
		</div>

		<div class="item">
			<div class="menu-name"><?php $page_id = 11; the_field('menu_title-2',$page_id) ?></div>
			<ul>
			<?php $page_id = 11; if (have_rows('footer_list-2', $page_id)) : while (have_rows('footer_list-2', $page_id)) : the_row(); ?>
						<li>
							<a href="<?php
								$page_id = 11;
								the_sub_field('footer_link-2',$page_id); ?>">
								<?php the_sub_field('footer_link-text-2',$page_id); ?>
							
							</a>
						</li>
					<?php endwhile;
				else : endif; ?>
			</ul>
		</div>

		<div class="item">
			<div class="menu-name"><?php $page_id = 11; the_field('menu_title-3',$page_id) ?></div>
			<ul>
	<?php $page_id = 11; if (have_rows('footer_list-3', $page_id)) : while (have_rows('footer_list-3', $page_id)) : the_row(); ?>
						<li>
							<a href="<?php
								$page_id = 11;
								the_sub_field('footer_link-3',$page_id); ?>">
								<?php the_sub_field('footer_link-text-3',$page_id); ?>
							
							</a>
						</li>
					<?php endwhile;
				else : endif; ?>
			</ul>
		</div>

		<div class="item">
			<div class="menu-name"><?php $page_id = 11;  the_field('menu_title-4',$page_id) ?></div>
				<ul>
					<?php $page_id = 11; if (have_rows('footer_list-4', $page_id)) : while (have_rows('footer_list-4', $page_id)) : the_row(); ?>
						<li>
							<a href="<?php
								$page_id = 11;
								the_sub_field('footer_link-4',$page_id); ?>">
								<?php $page_id = 11; the_sub_field('footer_link-text-4',$page_id); ?>
							
							</a>
						</li>
					<?php endwhile;
				else : endif; ?>
				</ul>
			</div>
			<a href="<?php echo  home_url($path, $scheme); ?>" class="logo">
				<img src="<?php $page_id = 11; the_field('logo',$page_id) ?>" alt="">
			</a>
		</div>
		<div class="footer-bottom">
			<div class="footer-menu">
				<ul>
					<?php $page_id = 11; if (have_rows('footer_list-5', $page_id)) : while (have_rows('footer_list-5', $page_id)) : the_row(); ?>
						<li>
							<a href="<?php
								$page_id = 11;
								the_sub_field('footer_link-5',$page_id); ?>">
								<?php the_sub_field('footer_link-text-5',$page_id); ?>
							
							</a>
						</li>
					<?php endwhile;
				else : endif; ?>
				</ul>
			</div>
			<p class="copyright"><?php $page_id = 11; the_field('copy',$page_id) ?></p>
		</div>
	</div>
</footer>
	


<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</body>

</html>