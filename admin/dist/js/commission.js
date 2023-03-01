$(document).ready(function(){

    $(document).ready(function (){
        $("input[name=is_admin]").on("change"  ,function(){
            var newSelectedId = $('input[name=is_admin]:checked').val();
            newSelectedId = newSelectedId.replace(/\D/g, "");
            ajaxCall = $.post("updateAdmin.php",
                {
                    id: newSelectedId,
                    async :false
                },
                function(data, status){
                    if(status == "success"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'تم اختيار مدير للنظام بنجاح',
                            showConfirmButton: true,
                            // timer: 3000
                        })
                    }

                });
        })
    });

    function displayCommissionError(){
        $("#inputCommissionError").css("display" , "block");
    }
    function hideCommissionError(){
        $("#inputCommissionError").css("display" , "none");
    }
   $("#commissionButton").on("click" , function(e){
     e.preventDefault();
     var value =  $("#commssion").val();
     let pattern=new RegExp('^[+-]?\\d+(\\.\\d+)?$') ;
     let result = pattern.test(value);
     if(result){
         $.post("updateDefaultCommission.php",
             {
                 commissionValue :value,
                 contentType: 'application/json',
                 processData: false,
                 cache: false,
                 dataType: 'json',

             },
             function(data, status){

                 if(status == "success"){
                     if(data){
                         Swal.fire({
                             position: 'top-end',
                             icon: 'success',
                             title: 'تم تحديث نسبه العمولة بنجاح',
                             showConfirmButton: true,
                             // timer: 3000
                         })
                     }else{
                         Swal.fire({
                             icon: 'error',
                             title: 'خطأ',
                             text: 'حدث خطأ ما برجاء اعاده المحاوله',

                         });
                     }
                 }

             });
         var bonusArray = [];
         var investArray = [];
         var idsArray = [];
       $("td[class='bonus dt-center']").each(function(index , element){
           bonusArray.push($("#"+element.id).text());
           let elementId = element.id;
           elementId = elementId.replace(/\D/g, "");
           idsArray.push(elementId);
         });
         $("td[class='investment dt-center']").each(function(index , element){
             investArray.push($("#"+element.id).text());
         });
         updateTotalCommissionFromDefaultCommission(bonusArray , investArray , idsArray , value);
     }else{
         displayCommissionError();
         let interval = setInterval(function () {
                 hideCommissionError()
         }
         , 5000);

     }
   })




});
function updateInvestmentAmount(e) {
    let $this = $(e);
    let elementId = $this.attr("id");
    elementId = elementId.replace(/\D/g, "");
    let $input = $('<input>', {
        value: $this.text(),
        type: 'text',
        blur: function() {
            $this.text(this.value);
            return (this.value);
        },
        keyup: function(e) {
            if (e.which === 13){
                let newInvestmentValue = $input.blur();
                 updateInvestmentAmountBackEnd(newInvestmentValue[0].value , elementId , 0);
                 updateTotalCommissionFromInvest(newInvestmentValue[0].value , elementId);
            }
        }
    }).appendTo( $this.empty() ).focus();
}

function updateBonusAmount(e) {
    let $this = $(e);
    let elementId = $this.attr("id");
    elementId = elementId.replace(/\D/g, "");
    let $input = $('<input>', {
        value: $this.text(),
        type: 'text',
        blur: function() {
            $this.text(this.value);
            return (this.value);
        },
        keyup: function(e) {
            if (e.which === 13){
                let newInvestmentValue = $input.blur();
                updateInvestmentAmountBackEnd(0 , elementId , newInvestmentValue[0].value );
                updateTotalCommissionFromBonus(newInvestmentValue[0].value , elementId);
            }
        }
    }).appendTo( $this.empty() ).focus();

}

function updateInvestmentAmountBackEnd(newInvestmentValue , elementId , bonus){
    if(newInvestmentValue == 0){
        newInvestmentValue = bonus;
        var  url = "updateBonusAmount.php";
        var title = "تم تحديث العلاوة بنجاح..." ;
    }else{
        var  url = "updateInvestmentAmount.php";
        var title = "تم تحديث مبلغ الاستثمار بنجاح";
    }
    $.post(url,
        {
            investmentAmount :newInvestmentValue,
            id : elementId,
            contentType: 'application/json',
            processData: false,
            cache: false,
            dataType: 'json',
        },
        function(data, status){

            if(status == "success"){
                if(data){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: title,
                        showConfirmButton: true,
                        // timer: 3000
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'حدث خطأ ما برجاء اعاده المحاوله',

                    });
                }
            }

        });
}

function updateTotalCommissionFromBonus(value , elementId){
    let defaultCommission = $("#commssion").val();
    let investValue = $('#invest'+elementId).text();
    let finalResult = parseFloat(value) + parseFloat(defaultCommission);
    finalResult = finalResult * investValue;
    finalResult = finalResult / 100;
    $("#totalCommission"+elementId).text(finalResult);
}
function updateTotalCommissionFromInvest(value , elementId){
    let defaultCommission = $("#commssion").val();
    let bonusValue = $('#bonus'+elementId).text();
    let finalResult = parseFloat(bonusValue) + parseFloat(defaultCommission);
    finalResult = finalResult * value;
    finalResult = finalResult / 100;
    $("#totalCommission"+elementId).text(finalResult);
}

function updateTotalCommissionFromDefaultCommission(bonusArray , investArray , idsArray , defaultCommission){
let finalResult = 0;
    for(var x = 0 ; x < idsArray.length ; x++){
        finalResult = parseFloat(bonusArray[x]) + parseFloat(defaultCommission);
        finalResult = finalResult * investArray[x];
        finalResult = finalResult / 100;
        $("#totalCommission"+idsArray[x]).text(finalResult);
    }
}

function updatePaymentType(e){
    let $this = $(e);
    var elementId = $this.attr("id");
    globalElementId = elementId.replace(/\D/g, "");
    var $input = $('<select id="selectToTd" name="dropDown" style="position:relative;z-index: 99;">' +
        '<option id="1" value="cash" onclick="returnToTd(this , globalElementId)" style="position: absolute;">نقدا</option>' +
        '<option id="2" value="transfer" onclick="returnToTd(this , globalElementId)" style="position: absolute;">تحويل</option>' +
        '</select>', {
        value: $this.text(),

        blur: function() {
            $this.text(this.value);
            return (this.value);
        },
        mouse_leave: function(e) {
                let newInvestmentValue = $input.blur();

        }
    }).appendTo( $this.empty() ).focus();
}

function returnToTd(e , elementId){
    let $this = e;
    let selectedOptionText = $('#selectToTd').find(":selected").text();
    let selectedOptionValue = $('#selectToTd').find(":selected").val();
    if(selectedOptionValue == "cash"){
        selectedOptionText = "نقدا";
    }else{
        selectedOptionText = "تحويل";
    }
    $("#selectToTd").replaceWith('<td class="dt-center">'+selectedOptionText+'</td>');
    $.post("updateTransferType.php",
        {
            transferType :selectedOptionValue,
            elementId:elementId ,
            contentType: 'application/json',
            processData: false,
            cache: false,
            dataType: 'json',

        },
        function(data, status){

            if(status == "success"){
                if(data){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data,
                        showConfirmButton: true,
                        // timer: 3000
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'حدث خطأ ما برجاء اعاده المحاوله',

                    });
                }
            }

        });
}
