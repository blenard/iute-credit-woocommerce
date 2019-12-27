/* beautify ignore:start */
@@include('./_calculator.js');
/* beautify ignore:end */

(function ($) {
    $(document).ready(function () {

        if ($('.iute-calculator').length) {
            var calculator;
            setTimeout(function () {

                calculator = new EshopCalculator();

                calculator.initWithLiveAgentInformation(
                    iute_params.country,
                    iute_params.currency,
                    iute_params.api_url,
                    iute_params.agent_id,
                    []
                );

            }, 1000);

            $(document).on("ajaxComplete", function( event, xhr, settings){
                if(settings.url === '/?wc-ajax=update_order_review'){
                    if(typeof calculator === 'object'){
                        calculator.initWithLiveAgentInformation(
                            iute_params.country,
                            iute_params.currency,
                            iute_params.api_url,
                            iute_params.agent_id,
                            []
                        );
                    }
                }
            });
        }

        if ($('.single-product').length) {

            var calculator = new EshopCalculator();
            var params = calculator.fetchInputParameters(
                iute_params.country,
                iute_params.currency,
                iute_params.api_url,
                iute_params.agent_id
            );

            var calcParams = calculator.parseProductSettingsAndAddToCalculationSets(
                params.loanProductParametersResponseList[0], 0
            );

            calculator.initWithLiveAgentInformation(
                iute_params.country,
                iute_params.currency,
                iute_params.api_url,
                iute_params.agent_id,
                []
            );

            function monthlyPayment(month) {
                result = '';
                var loanAmount = parseFloat($('#amount').val());
                $.ajax({
                    async: false,
                    type: "POST",
                    url: iute_params.api_url,
                    data: {
                        'action' : 'wc_iute_get_param',
                        'amount' : loanAmount
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (!data) {
                            return;
                        }

                        // OM
                        result = data['monthlyRepayments'].find(x => x.period === month)['monthlyRepayment'];
                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
                return result;
            }
            $('.iute-loan__price label').text(monthlyPayment(params.loanProductParametersResponseList[0].maxPeriod));

            $('.iute-calc-single-range').change(function () {
                if(iute_params.use_api == 'yes') {
                    $('.iute-calc-single time span').text($(this).val());
                    $('.iute-loan__price label').text(monthlyPayment($(this).val()));
                }
                else{
                    let firstProductId =  params.loanProductParametersResponseList[0].customProductId;
                    calculator.setSelectedProduct(firstProductId);
                    calculator.calculateForProduct(firstProductId);
                }

            });

        }


    });
})(jQuery);