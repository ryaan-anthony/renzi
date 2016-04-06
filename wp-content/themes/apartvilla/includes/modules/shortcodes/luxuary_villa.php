<?php ob_start(); ?>

<li>
    <i class="<?php echo str_replace("icon ","", $icon);?>"></i>
    <h4><?php echo balanceTags($title);?></h4>
    <span><?php echo balanceTags($number);?></span>
</li>

<?php return ob_get_clean(); 