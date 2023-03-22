

$("form#checkoutForm").on("submit",function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url:BASE_URL+'checkout/place-order',
        data:$("#checkoutForm").serialize(),
        beforeSend:function(){
            $("#placeOrderBtn").attr('disabled',true);
            $("#loader").show();
        },
        success: function (response) {
            if (response.status == 'success'){
                toastr.success(response.message);
               setTimeout(function () {
                   window.location.href = BASE_URL+'checkout/order-completed';
               },2000)
            }else{
                toastr.warning(response.message);
                setTimeout(function () {
                    window.location.href = BASE_URL+'customer/dashboard';
                },2000);
            }
        },
        error:function(errorReponse){
            printErrorMessage(errorReponse);
        },
        complete: function () {
            $("#loader").hide();
            $("#placeOrderBtn").attr('disabled',false);
        }
    });

});
