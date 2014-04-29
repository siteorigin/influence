<div class="sow-slider-base" style="display: none">

	<ul class="sow-slider-images" data-settings="{&quot;pagination&quot;:true,&quot;speed&quot;:850,&quot;timeout&quot;:12000}">
		<li class="sow-slider-image sow-slider-image-cover" style="background-image: url();">

			<div class="sow-slider-image-container">
				<div class="sow-slider-image-wrapper" style="max-width: 720px;">
					<img width="720" height="500" src="<?php echo get_template_directory_uri() ?>/demo/slider-badge.png" class="attachment-full" alt="slider-badge">
				</div>
			</div>

			<video class="sow-background-element" autoplay="" loop="" muted="">
				<source src="<?php echo get_template_directory_uri() ?>/demo/writing-video.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri() ?>/demo/writing-video.ogv" type="video/ogg">
			</video>

		</li>

		<li class="sow-slider-image sow-slider-image-cover" style="background-image: url(<?php echo get_template_directory_uri() ?>/demo/coffee-shop.jpg);">

			<div class="sow-slider-image-container">
				<div class="sow-slider-image-wrapper" style="max-width: 700px;">
					<img width="700" height="500" src="<?php echo get_template_directory_uri() ?>/demo/slider-badge-2.png" class="attachment-full" alt="slider-badge-2">
				</div>
			</div>

		</li>
	</ul>

	<ol class="sow-slider-pagination">
		<li><a href="#" data-goto="0">1</a></li>
		<li><a href="#" data-goto="1">2</a></li>
	</ol>

	<div class="sow-slide-nav sow-slide-nav-next"><a href="#" data-goto="next" data-action="next">Next</a></div>
	<div class="sow-slide-nav sow-slide-nav-prev"><a href="#" data-goto="previous" data-action="prev">Previous</a></div>

</div>