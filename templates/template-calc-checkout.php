<?php 
$life_time = 1 * 60 * 60 * 24 * 7; 
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $life_time) . ' GMT'); 
?>
<div class="iute-calculator">
    <div>
        <div class="col" style="padding-top:10px;">
            <div class="--range">
                <div class="col-sm-10">
                	<input id="rangeInput" class="range-slider__range-range" type="range" step="500" min="0" max="10000" />
                </div>
                <div class="col-sm-2">
                    <input id="amount" class="range-slider__value" name="loan_amount" type="number" value="<?php echo $amount; ?>" min="0" max="10000" />
                </div>
            </div>
            <h4 class="text-left"><?php echo __( 'Period', 'iutecredit-payment' ); ?></h4>
            <div>
                <div class="col-sm-10">
                    <input id="periodInput" class="range-slider__range-range" name="loan_period" type="range" min="1" max="5" />
                </div>
                <div class="col-sm-2">
                    <input id="months" class="range-slider__value" type="number" value="1" min="1" max="5" />
                </div>
            </div>
            <div></div>
            <div>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td width="50%"><strong><?php echo __( 'Loan amount', 'iutecredit-payment' ); ?></strong></td>
                            <td width="50%"><span id="loanAmount" class="loan-amount">--</span></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __( 'Period', 'iutecredit-payment' ); ?></strong></td>
                            <td><span id="loanPeriod" class="loan-period">--</span></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo __( 'Monthly payment', 'iutecredit-payment' ); ?></strong></td>
                            <td><span id="monthlyPayment" class="monthly-repayment">--</span></td>
                        </tr>
                        <?php if ($options->get_option('info_commision') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'Comission', 'iutecredit-payment' ); ?></strong></td>
                                <td><span id="commissionFee" class="comm-fee">--</span></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($options->get_option('info_admin_fee') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'Admin fee', 'iutecredit-payment' ); ?></strong></td>
                                <td><span id="adminFee" class="admin-fee">--</span></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($options->get_option('info_interest_cost') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'Interest cost', 'iutecredit-payment' ); ?></strong></td>
                                <td><span id="interestCost" class="interest-cost">--</span></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($options->get_option('info_total') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'Total cost', 'iutecredit-payment' ); ?></strong></td>
                                <td><span id="totalCost" class="total-cost">--</span></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($options->get_option('info_apr') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'APR', 'iutecredit-payment' ); ?> %</strong></td>
                                <td><span id="apr" class="apr">--</span></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($options->get_option('info_xirr') == 'yes'): ?>
                            <tr>
                                <td><strong><?php echo __( 'XIRR', 'iutecredit-payment' ); ?> %</strong></td>
                                <td><span id="xirr" class="xirr">--</span></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="iute-application">
        <h4><?php _e( 'Loan user application', 'iutecredit-payment' ); ?></h4>
        <input type="text" name="iute_appl_fname" value="<?php echo $data['first_name']; ?>" placeholder="<?php _e( 'First name', 'iutecredit-payment' ); ?>" required>
        <input type="text" name="iute_appl_lname" value="<?php echo $data['last_name']; ?>" placeholder="<?php _e( 'Last name', 'iutecredit-payment' ); ?>" required>
        <input type="text" name="iute_appl_idnp" placeholder="<?php _e( 'IDNP', 'iutecredit-payment' ); ?>" required>
        <input type="email" name="iute_appl_email" value="<?php echo $data['email']; ?>" placeholder="<?php _e( 'Email', 'iutecredit-payment' ); ?>" required>
        <input type="text" name="iute_appl_phone" value="<?php echo $data['phone']; ?>" placeholder="<?php _e( 'Phone', 'iutecredit-payment' ); ?>" required>
        <input type="text" name="iute_appl_bdate" placeholder="<?php _e( 'Birth date', 'iutecredit-payment' ); ?>" placeholder="01.12.1985" pattern="^([0-2][0-9]|(3)[0-1])(\.)(((0)[0-9])|((1)[0-2]))(\.)\d{4}$" title="<? _e('Birth date input format: 01.12.1985', 'iutecredit-payment'); ?>" required>
        <?php if ($options->get_option('info_patr') == 'yes'): ?>
            <input type="text" name="iute_appl_patronymic" placeholder="<?php _e( 'Patronymic', 'iutecredit-payment' ); ?>">
        <?php endif; ?>
        <?php if ($options->get_option('info_bank') == 'yes'): ?>
            <input type="text" name="iute_appl_bank_nr" placeholder="<?php _e( 'Bank account number', 'iutecredit-payment' ); ?>">
        <?php endif; ?>
        <input type="hidden" name="iute_appl_sign" value="dealer">
        <label for="iute_appl_agree"><input id="iute_appl_agree" type="checkbox" name="iute_appl_agree" required> <?php echo $options->get_option('user_agree'); ?></label>
    </div>
</div>