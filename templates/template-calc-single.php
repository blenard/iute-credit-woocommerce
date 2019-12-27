<?php
$life_time = 1 * 60 * 60 * 24 * 7;
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $life_time) . ' GMT');
?>
<div>
    <input id="amount" class="range-slider__value" name="loan_amount" type="hidden" value="<?php  echo $cost; ?>" min="0" max="10000" />
    <div class="iute-loan">
        <span><?php _e( 'Starting from monthly', 'iutecredit-payment' ) ?></span>
        <span class="iute-loan__price">
            <label></label> 
            <?php echo get_woocommerce_currency_symbol(); ?>
        </span>
    </div>
</div>