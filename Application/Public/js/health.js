/**
 * Created by 传旺 on 2015/11/29.
 */
var date = new Date().toLocaleDateString().replace(/\//g,"-");
var exerciseInfoGot = false;
var slumberInfoGot = false;
var steps;
var slumber;

function getExerciseInfo(){
    if(exerciseInfoGot){
        var ctx = document.getElementById("exerciseChart").getContext("2d");
        new Chart(ctx).Bar(steps);
        return;
    }
    $.post(
        "getExerciseInfo",
        {date:date},
        function(data){
            var tmp = data["steps"].replace(/{|}/g,"");
            stepsData = tmp.split(",");
            document.getElementById("complete_goal").innerHTML = (100*data["complete_goal"]) + "%";
            document.getElementById("meters").innerHTML = data["meters"] + "米";
            document.getElementById("exercise_duration").innerHTML = parseInt(data["exercise_duration"]/60) + "小时" + (data["exercise_duration"] - parseInt(data["exercise_duration"]/60)*60) + "分";
            document.getElementById("calories").innerHTML = data["calories"] + "卡";

            steps = {
                labels : [" 00:00 ","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
                datasets : [
                    {
                        fillColor : "rgba(87,229,72,0.35)",
                        strokeColor : "rgba(220,220,220,1)",
                        data : stepsData
                    }
                ]
            }
            var ctx = document.getElementById("exerciseChart").getContext("2d");
            new Chart(ctx).Bar(steps);
            exerciseInfoGot = true;
        }
    );
}

function saveBaseInfo(){
    var height = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;
    $.post(
        "saveBaseInfo",
        {height:height,weight:weight},
        function(data){
            if(data){
                $("#myModal").modal("show");
            }else {
                document.getElementsByClassName("modal-body")[0].innerHTML = "保存失败，检查网络连接！"
                $("#myModal").modal("show");
            }
        }
    );
}

function getSlumberInfo(){
    if(slumberInfoGot){
        var ctx = document.getElementById("slumberChart").getContext("2d");
        new Chart(ctx).Bar(slumber);
        return;
    }
    $.post(
        "getSlumberInfo",
        {date:date},
        function(data){
            var tmp = data["info"].replace(/{|}/g,"");
            slumberInfo = tmp.split(",");
            document.getElementById("effective_rate").innerHTML = 100*data["effective_rate"] + "%";
            document.getElementById("begin_time").innerHTML = data["begin_time"];
            document.getElementById("end_time").innerHTML = data["end_time"];
            document.getElementById("slumber_time").innerHTML = parseInt(data["slumber_time"]/60) + "小时" + (data["slumber_time"] - parseInt(data["slumber_time"]/60)*60) + "分";

            slumber = {
                labels : [" 00:00 ","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
                datasets : [
                    {
                        fillColor : "rgba(87,229,72,0.35)",
                        strokeColor : "rgba(220,220,220,1)",
                        data : slumberInfo
                    }
                ]
            }
            var ctx = document.getElementById("slumberChart").getContext("2d");
            new Chart(ctx).Bar(slumber);
        }
    );
}