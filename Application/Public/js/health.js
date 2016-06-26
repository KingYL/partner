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
            var ctx = document.getElementById("exerciseChart");
            if(data == 0){
                ctx.style.height = "0";
                document.getElementById("exerciseGot").innerHTML = "今日暂无数据";
                document.getElementById("complete_goal").innerHTML = "0%";
                document.getElementById("meters").innerHTML = "0米";
                document.getElementById("exercise_duration").innerHTML = "0小时0分";
                document.getElementById("calories").innerHTML = "0卡";
                return;
            }else{
                document.getElementById("exerciseGot").innerHTML = "";
            }
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
            ctx.height = 400;
            ctx.width = 800;
            new Chart(ctx.getContext("2d")).Bar(steps);
            exerciseInfoGot = true;
        }
    );
}

function updateExerciseInfo(){
    date = document.getElementById("exercise_date").value;
    exerciseInfoGot = false;
    getExerciseInfo();
    date = new Date().toLocaleDateString().replace(/\//g,"-");
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
            var ctx = document.getElementById("slumberChart");
            if(data == 0){
                ctx.style.height = "0";
                document.getElementById("slumberGot").innerHTML = "今日暂无数据";
                document.getElementById("effective_rate").innerHTML = "0%";
                document.getElementById("begin_time").innerHTML = "00:00";
                document.getElementById("end_time").innerHTML = "00:00";
                document.getElementById("slumber_time").innerHTML = "0小时0分";
                return;
            }else{
                document.getElementById("slumberGot").innerHTML = "";
            }
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
            ctx.height = 400;
            ctx.width = 800;
            new Chart(ctx.getContext("2d")).Bar(slumber);
        }
    );
}

function updateSlumberInfo(){
    date = document.getElementById("slumber_date").value;
    slumberInfoGot = false;
    getSlumberInfo();
    date = new Date().toLocaleDateString().replace(/\//g,"-");
}

//格式化时间
function initialDate(){
    var myDate = new Date();
    var formatDate = myDate.getFullYear();
    if(myDate.getMonth() < 9) {
        formatDate += "-0" + (myDate.getMonth() + 1);
    }else{
        formatDate += "-" + (myDate.getMonth() + 1);
    }
    if(myDate.getDate() < 10){
        formatDate += "-0" + myDate.getDate();
    }else{
        formatDate += "-" + myDate.getDate();
    }
    document.getElementById("exercise_date").value = formatDate;
    document.getElementById("slumber_date").value = formatDate;
}

function showToast(success, text) {
	var toast = $("#modifyResult");
	var toastText = $("#modifyResultText");
	if (success) {
		toast.attr("class", "alert alert-success alert-dismissible");
	} else {
		toast.attr("class", "alert alert-warning alert-dismissible");
	}
	toastText.innerText = text;
	toast.slideDown(400);
}

function saveBaseInfo(){
    var height = document.getElementById("height").value;
    var weight = document.getElementById("weight").value;
    $.post(
        "saveBaseInfo",
        {height:height,weight:weight},
        function(data){
            if(data){
				showToast(true, "修改成功！");
            }else {
				showToast(true, "修改失败，请检查网络连接");
            }
        }
    );
}


function saveExerciseGoal(){
    var goal = document.getElementById("exercise_goal").value;
    $.post(
        "saveExerciseGoal",
        {goal:goal},
        function(data){
            if(data){
                $("#myModal").modal("show");
				$("#modifyResult").slideDown(500);
            }else {
                document.getElementsByClassName("modal-body")[0].innerHTML = "更改失败，检查网络连接！"
                $("#myModal").modal("show");
            }
        }
    );
}
