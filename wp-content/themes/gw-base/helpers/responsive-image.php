<?php 
	$imgxs = wp_get_attachment_image_src( $img, 'slider-xs' );
	$imgsm = wp_get_attachment_image_src( $img, 'slider-sm' );
	$imgmd = wp_get_attachment_image_src( $img, 'slider-md' );
	$imgxl = wp_get_attachment_image_src( $img, 'slider-xl' );
?>
<picture>
	<!--[if IE 9]><video style="display: none;"><![endif]-->
	<?php if($imgxl): ?>
		<source srcset="<?php echo $imgxl[0] ?>" media="(min-width: <? echo $imgmd[1] ?>px)">
	<?php endif; ?>
	<?php if($imgmd): ?>
		<source srcset="<?php echo $imgmd[0] ?>" media="(min-width: <? echo $imgsm[1] ?>px)">
	<?php endif; ?>
	<?php if($imgsm): ?>
		<source srcset="<?php echo $imgsm[0] ?>" media="(min-width: <? echo $imgxs[1] ?>px)">
	<?php endif; ?>	
	<?php if($imgxs): ?>
		<source srcset="<?php echo $imgxs[0] ?>">
	<?php endif; ?>
	<!--[if IE 9]></video><![endif]-->
	<img src="<?php echo $imgxl[0]; ?>" />
</picture>