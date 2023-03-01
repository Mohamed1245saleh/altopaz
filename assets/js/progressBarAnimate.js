$(document).ready(function(){
rotate("progressBar1" , "progressRightBar1" , "progressLeftBar1");
rotate("progressBar2" , "progressRightBar2" , "progressLeftBar2");
rotate("progressBar3" , "progressRightBar3" , "progressLeftBar3");
rotate("progressBar4" , "progressRightBar4" , "progressLeftBar4");
rotate("progressBar5" , "progressRightBar5" , "progressLeftBar5");
rotate("progressBar6" , "progressRightBar6" , "progressLeftBar6");
rotate("progressBar7" , "progressRightBar7" , "progressLeftBar7");
});

    function rotate(id , progressBarRightId ,progressBarLeftId) {
        let percent = $("#"+id).text();
        if(parseInt(percent) == 0){
            percent = 1;
        }
        let rotateDegreeOfLessThan50 =  (parseInt(percent) * 360) / 100;
        let rotateDegreeOfMoreThan50 =  parseInt(percent) - 50;
        rotateDegreeOfMoreThan50  = (parseInt(rotateDegreeOfMoreThan50) * 360) / 100;
        if(parseInt(percent) <= 50){
            $("#"+progressBarRightId).animate({
                    deg:rotateDegreeOfLessThan50
                }
                ,
                {
                    duration: 1200,
                    step: function(now) {
                        $(this).css({
                                transform: 'rotate(' + now + 'deg)'
                            }
                        );
                    }
                }
            );
        }else{
            $("#"+progressBarRightId).animate({
                    deg:180
                }
                ,
                {
                    duration: 1200,
                    step: function(now) {
                        $(this).css({
                                transform: 'rotate(' + now + 'deg)'
                            }
                        );
                    }
                }
            );
            $("#"+progressBarLeftId).animate({
                    deg:rotateDegreeOfMoreThan50
                }
                ,
                {
                    duration: 1200,
                    step: function(now) {
                        $(this).css({
                                transform: 'rotate(' + now + 'deg)'
                            }
                        );
                    }
                }
            );
        }
    }

