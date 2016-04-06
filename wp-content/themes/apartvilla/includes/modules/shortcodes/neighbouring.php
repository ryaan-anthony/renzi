<?php ob_start(); ?>

<div class="col-md-2 col-sm-4">
    <div class="single-neighbour">
        <h3><?php echo balanceTags($title);?></h3>
        <p><?php echo balanceTags($locality);?></p>
        <p class="distance"><span class="number"><?php echo balanceTags($distance_num);?></span> <?php echo balanceTags($distance_unit);?></p>
    </div>
</div>

<?php return ob_get_clean(); 