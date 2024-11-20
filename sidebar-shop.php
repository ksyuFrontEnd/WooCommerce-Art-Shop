<?php 

if ( ! is_active_sidebar( 'sidebar_shop' ) ) {
    return;
}

?>

<div class="sidebar-shop">

    <?php dynamic_sidebar( 'sidebar_shop' ); ?>

</div>
