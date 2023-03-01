$(document).ready(function (){
   // alert("HI ");
   $("input[name=whatsappCheck]").on("change"  ,function(){
      var newSelectedId = $('input[name=whatsappCheck]:checked').val();
      ajaxCall = $.post("updateCustomerServiceWhatsAppNumber.php",
          {
             id: newSelectedId,
             async :false
          },
          function(data, status){
             if(status == "success"){
                 Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'تم اختيار ممثل جديد لخدمة العملاء عن طريق الواتس اب',
                     showConfirmButton: true,
                     timer: 3000
                 })
             }

          });
   })
});
