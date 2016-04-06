<?php ob_start(); ?>

<li class="clearfix">
    <div class="name">
        <h3><?php echo balanceTags($title);?></h3>
        <p><?php echo balanceTags($address);?></p>
    </div>
    <div class="distance">
        <?php echo balanceTags($miles);?>
    </div>
</li>

<?php return ob_get_clean(); 