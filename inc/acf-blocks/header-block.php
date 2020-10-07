<?php

$header_img = get_field('betspin_header_image');

$header_text = get_field('betspin_header_text');

?>

<h2 class="custom-header">

    <img src="<?php echo $header_img['url'] ?>" alt="<?php echo $header_img['alt'] ?>">
    <?php echo $header_text; ?>

</h2>