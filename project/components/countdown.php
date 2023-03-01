<?php

class countdown
{

    public function htmlCountDownClockId($deadline , $start){

        echo '
 <h3 class="text-center  my-5 broun">الوقت المتبقي لاستلام المشروع</h3>
 <div class="timer-div text-center">
                <div id="countdown" time-value="'.$deadline.'">
                    <div id="tiles"></div>
                    <div class="labels my-3">
                        <li style="font-family:Tajawal;font-size: 16px;">يوم</li>
                        <li style="font-family:Tajawal;font-size: 16px;">ساعة</li>
                        <li style="font-family:Tajawal;font-size: 16px;">دقيقة</li>
                        <li style="font-family:Tajawal;font-size: 16px;">ثانية</li>
                    </div>
                </div>
            </div>
';
    }

    public function htmlCountDownClockAlertId($deadline , $start){
        echo '
 <h3 class="text-center  my-5 broun">الوقت المنقضي علي تسليم المشروع</h3>
<div class="timer-div text-center">
                <div id="countdown" time-value="'.$deadline.'">
                    <div id="tiles"></div>
                    <div class="labels my-3">
                        <li style="font-family:Tajawal;font-size: 16px;">يوم</li>
                        <li style="font-family:Tajawal;font-size: 16px;">ساعة</li>
                        <li style="font-family:Tajawal;font-size: 16px;">دقيقة</li>
                        <li style="font-family:Tajawal;font-size: 16px;">ثانية</li>
                    </div>
                </div>
            </div>
';
    }

     public function emptyDeliveryDate(){
        echo '
 <div class="timer-div text-center">
                <div id="countdown" >
                    <h1 class="text-center  my-5 broun" style="font-family:Tajawal;">لم يتم تحديد موعد الأستلام بعد...</h1>
                </div>
            </div>
';
    }

    public function BuildingDelivered(){
        echo '
<div class="timer-div text-center">
                <div id="countdown" >
                    <h1 class="text-center  my-5 broun" style="font-family:Tajawal;">تم بحمد الله تسليم المبني ...</h1>
                </div>
            </div>
';
    }


}
