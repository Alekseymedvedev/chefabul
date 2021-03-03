<?php
/*
Template Name: Главная страница
*/


get_header();
?>

<section class="main" style="background-image:url(<?php the_field('banner-img') ?>">


	<div class="container">
		<div class="main-text">
			<h1>
				<?php the_field('banner-title') ?>

			</h1>
			<p><?php the_field('banner-text') ?></p>
			<form>
				<div class="flex">
					<a class="banner_btn" href="<?php echo  wc_get_page_permalink('shop') ?>">Start Shopping</a>
				</div>
			</form>
		</div>
	</div>
</section>
<section class="adv">
	<div class="container">
		<div class="flex">
			<?php if (have_rows('examples_section')) : while (have_rows('examples_section')) : the_row(); ?>
					<div class="item">
						<img src="<?php the_sub_field('adv_img'); ?>" alt="">
						<p><?php the_sub_field('adv_text'); ?></p>
					</div>

			<?php endwhile;
			else : endif; ?>

		</div>
	</div>
</section>
<section class="steps">
	<div class="container">
		<div class="title"><?php the_field('steps_title') ?></div>
		<div class="flex">

			<?php if (have_rows('steps')) : while (have_rows('steps')) : the_row(); ?>
					<div class="item">
						<img src="<?php the_sub_field('steps_img'); ?>" alt="">
						<p class="step-name"><?php the_sub_field('step-name'); ?></p>
						<p class="step-descr"><?php the_sub_field('step-descr'); ?></p>
					</div>

			<?php endwhile;
			else : endif; ?>


		</div>
	</div>
</section>
<section class="reviews" style="background-image: url(<?php the_field('reviews_bg') ?>);">
	<div class="container">
		<div class="title"><?php the_field('reviews_title') ?></div>

		<div class="owl-carousel owl-theme">

			<?php if (have_rows('reviews')) : while (have_rows('reviews')) : the_row(); ?>
					<div class="item">
						<div class="review">
							<div class="review-img">
								<img src="<?php the_sub_field('reviews_img'); ?>" alt="">
							</div>
							<p class="review-text"><?php the_sub_field('reviews_text'); ?></p>
							<p class="review-author"><?php the_sub_field('reviews_author'); ?></p>
							<p class="review-company"><?php the_sub_field('reviews_company'); ?></p>
						</div>
					</div>

			<?php endwhile;
			else : endif; ?>

		</div>
		<a href="" class="all-reviews">All reviews</a>
	</div>
</section>
<section class="products-section">
	<div class="container">
		<div class="title">Bestsellers</div>
		<div class="flex">

			<?php echo do_shortcode('[recent_products per_page=8]')  ?>

		</div>
	</div>
</section>



<?php
get_footer();

