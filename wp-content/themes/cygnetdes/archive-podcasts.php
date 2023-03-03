<?php get_header(); ?>
<!-- Banner Slider start -->
<section class="banner-content half-banner">
	<div class="banner-inner-content w-100" <?php if (get_field('podcasts_listing_banner_image', 'option')) : ?> style="background-image: url('<?php echo the_field('podcasts_listing_banner_image', 'option'); ?>')" <?php endif; ?>>  
		<div class="container"> 
		<div class="d-md-flex flex-wrap slide-content-main align-items-center w-100">
			<div class="banner-caption">
				<?php if (get_field('podcasts_listing_banner_title', 'option')) : ?>
					<h1 class="banner-title text-white wow fadeInUp">
						<?php the_field('podcasts_listing_banner_title', 'option'); ?>
					</h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
	</div>    
</section>
<!-- Banner Slider end -->
<div>	
	<!-- More Podcasts section start -->
	<section class="webnair-sec bg-light">
		<div class="container podcasts-page-listing">
			<!-- Podcasts start -->
			<div class="podcasts-container webinars-container blog-container"></div>
			<!-- Podcasts end -->
		</div>
	</section>
</div>
<?php get_footer(); ?>