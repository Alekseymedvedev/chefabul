<?php

/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;
?>
<div class="product_meta">

	<?php do_action('woocommerce_product_meta_start'); ?>

	<?php if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

		<span class="sku_wrapper"><?php esc_html_e('SKU:', 'woocommerce'); ?> <span class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>

	<?php endif; ?>

	<?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</span>'); ?>

	<?php echo wc_get_product_tag_list($product->get_id(), ', ', '<span class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</span>'); ?>

	<?php do_action('woocommerce_product_meta_end'); ?>



	<div class="card-wrap">

		<div class="accordion-container">
			<div class="set">

				<a href="#">
					<?php the_field('cart_title-1') ?>

				</a>
				<div class="content">
					<table>
						<thead>
							<tr>
								<td>
									<?php the_field('cart_subtitle-1') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-2') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-3') ?>
								</td>
							</tr>
						</thead>
						<tbody>

							<?php if (have_rows('specifications_1')) : while (have_rows('specifications_1')) : the_row(); ?>
									<tr>
										<td>
											<?php the_sub_field('specifications_content-1'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-2'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-3'); ?>
										</td>
									</tr>
							<?php endwhile;
							else : endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="set">
				<a href="#">
					<?php the_field('cart_title-2') ?>

				</a>
				<div class="content">
					<table>
						<thead>
							<tr>
								<td>
									<?php the_field('cart_subtitle-4') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-5') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-6') ?>
								</td>
							</tr>
						</thead>
						<tbody>

							<?php if (have_rows('specifications_2')) : while (have_rows('specifications_2')) : the_row(); ?>
									<tr>
										<td>
											<?php the_sub_field('specifications_content-4'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-5'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-6'); ?>
										</td>
									</tr>
							<?php endwhile;
							else : endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="set">
				<a href="#">
					<?php the_field('cart_title-3') ?>

				</a>
				<div class="content">
					<table>
						<thead>
							<tr>
								<td>
									<?php the_field('cart_subtitle-7') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-8') ?>
								</td>
								<td>
									<?php the_field('cart_subtitle-9') ?>
								</td>
							</tr>
						</thead>
						<tbody>

							<?php if (have_rows('specifications_3')) : while (have_rows('specifications_3')) : the_row(); ?>
									<tr>
										<td>
											<?php the_sub_field('specifications_content-7'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-8'); ?>
										</td>
										<td>
											<?php the_sub_field('specifications_content-9'); ?>
										</td>
									</tr>
							<?php endwhile;
							else : endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>