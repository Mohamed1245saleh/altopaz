$(document).ready(function() {

        $("#projectOptionsSelect").change(function() {
        $("#buildingOptionsSelect").children('option').hide();
        $("#buildingOptionsSelect").children("option[id^=" + $("option:selected",this).attr("id") + "]").show();
        $('#buildingOptionsSelect option').each(function () {
            if ($(this).css('display') != 'none') {
                $(this).prop("selected", true);
                return false;
            }
        });


    })

    $("#projectBuildButton").on("click",function(){

        var buliding = $("#buildingOptionsSelect").children('option:selected').val();
        var project  = $("#projectOptionsSelect").children('option:selected').val();

        if(buliding == -1 || project == -1){

            Swal.fire('من فضلك اختر رقم مشروع و رقم عماره...')
        }else{
            ajaxCall = $.post("groups.php",
                {
                    project: project,
                    building: buliding,
                    async :false
                },
                function(data, status){
                    if(status == "success"){
                        document.open();
                        document.write(data);
                        document.close();
                    }

                });

            ajaxCall.always(function(){
                $("#projectOptionsSelect").val(project).prop('selected', true);
                $("#buildingOptionsSelect").val(buliding).prop('selected', true);
                $('#buildingOptionsSelect > option').each(function () {
                    if ($(this).attr("id") != project) {
                        $(this).hide();
                    }else{
                        $(this).show();

                    }
                });
            })
        }





    });



    $('#projectDateid').on("change" , function(){
        var projectDate = $('#projectDateid').val();
        var now = new Date(projectDate);

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var fullYear = now.getFullYear() +1;
        var today = fullYear+"-"+(month)+"-"+(day) ;
        $('#projectDeliveryDateid').val(today);
    })

            $("#build_project_button_submit").on("click", function(e) {

                var buliding = $("#buildingOptionsSelect").children('option:selected').val();
                var project  = $("#projectOptionsSelect").children('option:selected').val();

                var form_data = new FormData();
                var totalfiles = document.getElementById('first_step_image').files.length;
                if(totalfiles <= 0){
                    var firstTypeFlag = true;
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Oops...',
                    //     text: 'Something went wrong!',
                    //     footer: '<a href="">Why do I have this issue?</a>'
                    // })
                }else{
                    for (var index = 0; index < totalfiles; index++) {
                        form_data.append("files[]", document.getElementById('first_step_image').files[index]);
                        form_data.append("type[]" , 1);
                    }
                }

                var totalfiles = document.getElementById('second_step_image').files.length;
                if(totalfiles <= 0){
                    var secondTypeFlag = true;
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Oops...',
                    //     text: 'Something went wrong!',
                    //     footer: '<a href="">Why do I have this issue?</a>'
                    // })
                }else{
                    for (var index = 0; index < totalfiles; index++) {
                        form_data.append("files[]", document.getElementById('second_step_image').files[index]);
                        form_data.append("type[]" , 2);
                    }
                }

                var totalfiles = document.getElementById('third_step_image').files.length;
                if(totalfiles <= 0){
                    var thirdTypeFlag = true
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Oops...',
                    //     text: 'Something went wrong!',
                    //     footer: '<a href="">Why do I have this issue?</a>'
                    // })
                }else{
                    for (var index = 0; index < totalfiles; index++) {
                        form_data.append("files[]", document.getElementById('third_step_image').files[index]);
                        form_data.append("type[]" , 3);
                    }
                }

                if(firstTypeFlag && secondTypeFlag && thirdTypeFlag){
                    Swal.fire({
                        icon: 'error',
                        title: 'لم يتم رفع أي صور ',
                        text: 'من فضلك قم برفع صوره واحده علي الأقل',

                    });
                    firstTypeFlag = false;
                    secondTypeFlag = false;
                    thirdTypeFlag = false;
                }else{
                    form_data.append("project" , project);
                    form_data.append("buliding" , buliding);
                    $.ajax({
                        url: 'uploadProjectImages.php',
                        type: 'POST',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        cache: false,
                        dataType: 'text',
                        success:function(data) {
                            if(data == "success"){
                                            window.open('https://altopaz.floteksa.com/admin/uploadProjectImages.php?project='+project+'&bulding='+buliding,'_blank' );
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title:'تم رفع الصور بنجاح',
                                showConfirmButton: true,
                                timer: 10000
                            })
                            }else{
                                Swal.fire({
                        icon: 'error',
                        title: 'خطأ',
                        text: 'حدث خطأ اثناء الرفع من فضلك قم برفع الصور مره أخري...',

                    });
                            }

                        }

                    });
                }


});

    $("#delivery_building_check").on("click" , function(){
        var rowId = $("#delivery_building_check").val();
        var isChecked = $('#delivery_building_check')[0].checked;

        $.post("updateBuildingDelivery.php",
            {
                rowId :rowId,
                isChecked: isChecked,
                async :false
            },
            function(data, status){
                if(status == "success"){
                   if(data){
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: 'تم تغيير حاله المبني بنجاح',
                           showConfirmButton: true,
                           timer: 3000
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
    })

});

function copyToClipboard(){
   document.getElementById("text_to_be_copied").select();
    document.execCommand("copy");
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'تم نسخ الرابط بنجاح',
        showConfirmButton: true,
        timer: 3000
    })
}






