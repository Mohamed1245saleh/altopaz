var globaDeadLine;
var startLine;
var globalDeadLineIsgreater = false;
var globalDeadLineIsSmaller = false;
function updateTimer(){
    var d = new Date();
    if(globaDeadLine > d ){
        var time = globaDeadLine - d ;
        globalDeadLineIsgreater = true;
        // console.log(globalDeadLineIsgreater);
    }else{  // calculate the difference current date & time and the deliveryPastTime
        time = d  - globaDeadLine ;
        globalDeadLineIsSmaller = true;
        // console.log(time);
    }

    return {
        'days': Math.floor( time/(1000*60*60*24) ),
        'hours': Math.floor( (time/(1000*60*60)) % 24 ),
        'minutes': Math.floor( (time/1000/60) % 60 ),
        'seconds': Math.floor( (time/1000) % 60 ),
        'total' : time
    };
}


function animateClock(span){
    //span.className = "turn";
    setTimeout(function(){
        span.className = "";
    },700);
}

function startTimer(id){

    var timerInterval = setInterval(function(){
        var clock = document.getElementById(id);
        var timer = updateTimer();
        if(globalDeadLineIsgreater){
            // globaDeadLine = globaDeadLine -1000;
        }
        if(globalDeadLineIsgreater){
            globalDeadLineIsgreater = false;
            clock.innerHTML = '<div >' + timer.days + '<p style="font-size:15px;">الآيام</span></div>'
                + '<div >' + timer.hours + '<p style="font-size:15px;">الساعات</span></div>'
                + '<div >' + timer.minutes + '<p style="font-size:15px;">الدقائق</span></div>'
                + '<div >' + timer.seconds + '<p style="font-size:15px;">الثواني</span></div>';
        }else if(globalDeadLineIsSmaller){
            globalDeadLineIsSmaller = false;
            clock.innerHTML = '<div >' + timer.days + '<p style="font-size:15px;">الآيام</span></div>'
                + '<div  >' + timer.hours + '<p style="font-size:15px;">الساعات</span></div>'
                + '<div   >' + timer.minutes + '<p style="font-size:15px;">الدقائق</span></div>'
                + '<div  >' + timer.seconds + '<p style="font-size:15px;">الثواني</span></div>';
        }


        //animations
        var spans = clock.getElementsByTagName("div");
        animateClock(spans[3]);
        if(timer.seconds == 59) animateClock(spans[2]);
        if(timer.minutes == 59 && timer.seconds == 59) animateClock(spans[1]);
        if(timer.hours == 23 && timer.minutes == 59 && timer.seconds == 59) animateClock(spans[0]);

        //check for end of timer
        if(timer.total < -1000000000000000000000000000){
                    clearInterval(timerInterval);
                }


    }, 1000);
}


function startCountDown(date , startdate){

    var d = new Date();
    globaDeadLine = date*1000;
    startLine = startdate*1000;
    if(globaDeadLine > d){
        startTimer("clock" );
    }else{
        // console.log("hello");
        startTimer("clock-alert");
    }
};
