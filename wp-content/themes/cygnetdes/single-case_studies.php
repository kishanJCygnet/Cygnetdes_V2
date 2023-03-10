<?php
$pdfLink = get_field('pdf_link', $post->ID);

$post_type = get_post_type_object( get_post_type($post) ); 
$post_type_name = $post_type->labels->singular_name;

get_header();
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!-- Banner Slider start -->
		<?php
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '1920w');
			$video_url = get_field('video_url');
        ?>
		<div class="case-study">
		<?php if($video_url != ''){ ?>
			<section class="case-study-bnvd">
				<div class="container">
					<div class="bnvd-inner">
						<div class="bnvd-left">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="bnvd-right">
							<iframe width="100%" height="400" src="<?php echo $video_url; ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</section>
		<?php } else { ?>
			<section class="banner-content half-banner overlay-bg">    
				<div class="banner-inner-content w-100" <?php if ($featured_img_url) : ?> style="background-image: url('<?php echo $featured_img_url; ?>')" <?php endif; ?>>  
					<div class="container">
						<div class="d-md-flex flex-wrap slide-content-main align-items-center w-100">
							<div class="banner-caption text-white">
								<h1 class="banner-title text-white">
									<?php the_title(); ?>
								</h1>
							</div>
						</div>
					</div>
				</div>    
			</section>
		<?php } ?>
			<!-- Banner Slider end -->
			<div>
				<section class="bg-white no-min-height">               
						<div class="blog-detail">
							<!--<div class="blog-share-social d-none d-xl-block">
								<div class="sidebar-social">
									<div class="share-social-box">
										<a href="javascript:void(0)" title="Share" class="share-btn"><i class="bi bi-share" aria-hidden="true"></i></a>
										<?php echo sharethis_inline_buttons(); ?>
									</div>
								</div>
							</div>-->
							<div class="container section-container-padding pt-0 pb-0">
								<div class="single-container">                                
									<div class="container-with-sidebar">
										<article class="blog-contents pe-md-3 pe-xl-4 pe-xxl-5">
											<h2 class="section-title mb-3">Summary</h2>
											<!--<div class="blog-share-social d-xl-none mb-5">
												<div class="sidebar-social">
													<div class="share-social-box">
														<a href="javascript:void(0)" title="Share" class="share-btn"><i class="bi bi-share" aria-hidden="true"></i></a>
														<?php echo sharethis_inline_buttons(); ?>
													</div>
												</div>
											</div>-->
											<?php the_content(); ?>
										</article>	
										<aside class="sidebar">
											<div class="sidebar-title">
												<h4>Download My Copy</h4>
											</div>
											<div class="sidebar-block-body">
												<?php echo do_shortcode('[contact-form-7 id="666" title="Download Copy"]'); ?>
											</div>
										</aside>
									</div>
								</div>                            
							</div>
						</div>               
				</section>
			</div>
		</div>
<?php endwhile;
endif; ?>

<!-- Download PDF after submit -->
<script>
    var siteurl = '<?php echo $pdfLink; ?>';
    if (siteurl) {
        document.addEventListener('wpcf7mailsent', function(e) {
            // alert(siteurl);
            if (e.detail.contactFormId == 666) {
                var pdfurl = siteurl ? siteurl : '';

                e.stopPropagation();
                // You can place extra checks here.
                var tab = window.open(pdfurl, '_blank');
                tab.focus();
            }
        }, false);
    }
	
	jQuery( document ).ready(function() {
		jQuery('#custom_post_type').val("<?php echo $post_type_name; ?>");
	});
</script>

<?php get_footer(); ?>