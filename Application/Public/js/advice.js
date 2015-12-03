/**
 * Created by 传旺 on 2015/12/1.
 */
function searchUser(){
    var userName = document.getElementById("searchName").value;
    $.post(
        "../User/searchUser",
        {userName:userName},
        function(data){
            var result = document.getElementById("result");
            result.innerHTML = "";
            for(var i = 0; i < data.length; i++) {
                var doctorUnit = getDoctorUnit(data[i]["uid"],data[i]["icon_url"],data[i]["name"],data[i]["identify"],data[i]["sign"],"申请服务",function(){applyService()});
                result.appendChild(doctorUnit);
            }
        }
    );
}

function getDoctorUnit(userId, imgSrc, user_name, userIdentify, userSign,type,fun){
    var doctorUnit = document.createElement("div");
    doctorUnit.className = "doctor";
    var doctor_img = document.createElement("div");
    doctor_img.className = "doctor-img";
    var img = document.createElement("img");
    img.src = "/partner/Application/Public/data/" + imgSrc;
    doctor_img.appendChild(img);
    doctorUnit.appendChild(doctor_img);
    var doctor_content = document.createElement("div");
    doctor_content.className = "doctor-content";
    var userName = document.createElement("h4");
    userName.innerHTML = user_name;
    var identity = document.createElement("span");
    identity.className = "badge";
    identity.innerHTML = userIdentify;
    userName.appendChild(identity);
    var sign = document.createElement("p");
    sign.innerHTML = "&nbsp&nbsp&nbsp——" + userSign;
    var button = document.createElement("button");
    button.innerHTML = type;
    button.id = "search" + userId;
    button.value = userId;
    button.onclick = fun;
    doctor_content.appendChild(userName);
    doctor_content.appendChild(sign);
    doctor_content.appendChild(button);
    doctorUnit.appendChild(doctor_content);
    return doctorUnit;
}

function applyService(){
    var userId = window.event.target.value;
    $.post(
        "../User/applyService",
        {serviceId:userId},
        function (data) {
            document.getElementById("myModalLabel").innerHTML = "申请消息";
            if(data == 1){
                document.getElementsByClassName("modal-body")[0].innerHTML = "申请成功！";
            }else {
                document.getElementsByClassName("modal-body")[0].innerHTML = "申请失败！是否已经申请过？";
            }
            $("#myModal").modal("show");
        }
    );
}

function getMyDoctors(){
    $.post(
        "../User/getMyRelations",
        {type:"医生"},
        function(data){
            var doctors = document.getElementById("myDoctors");
            doctors.innerHTML = "";
            for(var i = 0; i < data.length; i++) {
                var doctorUnit = getDoctorUnit(data[i]["uid"],data[i]["icon_url"],data[i]["name"],data[i]["identify"],data[i]["sign"],"查看该医生详情>>",null);
                doctors.appendChild(doctorUnit);
            }
        }
    );
}

function getMyCoaches(){
    $.post(
        "../User/getMyRelations",
        {type:"教练"},
        function(data){
            var coaches = document.getElementById("myCoaches");
            coaches.innerHTML = "";
            for(var i = 0; i < data.length; i++) {
                var coachUnit = getDoctorUnit(data[i]["uid"],data[i]["icon_url"],data[i]["name"],data[i]["identify"],data[i]["sign"],"查看该医生详情>>",null);
                coaches.appendChild(coachUnit);
            }
        }
    );
}

function getMyAdvices(){

}

function getMyQuestions(){
    $.post(
        "getQuestions",
        {},
        function(data){
            var myQuestions = document.getElementById("myQuestions");
            myQuestions.innerHTML = "";
            for(var i = 0; i < data.length; i++){
                var questionUnit = getQuestionUnit(data[i]["title"],data[i]["content"],data[i]["time"]);
                myQuestions.appendChild(questionUnit);
            }
        }
    );
}

function getQuestionUnit(title,content,time){
    var li = document.createElement("li");
    li.className = "list-item";
    var question = document.createElement("question");
    question.className = "question";
    var ques_p = document.createElement("p");
    ques_p.innerHTML = "<span>标题：</span>" + title;
    question.appendChild(ques_p);
    var question_content = document.createElement("div");
    question_content.className = "question-content";
    question_content.innerHTML = "<hr><div>" + content + "</div><br>"
    var offer_time = document.createElement("div");
    offer_time.className = "offer-time";
    offer_time.innerHTML = "<span>发表于 </span> " + time;
    question_content.appendChild(offer_time);
    li.appendChild(question);
    li.appendChild(question_content);
    return li;
}

function question(){
    var title = document.getElementById("new_question_title");
    var content = document.getElementById("new_question_content");
    $.post(
        "question",
        {title:title.value,content:content.value},
        function(data){
            document.getElementById("myModalLabel").innerHTML = "发布问题";
            if(data == 1){
                document.getElementsByClassName("modal-body")[0].innerHTML = "发布成功！";
                title.value = "";
                content.value = "";
            }else {
                document.getElementsByClassName("modal-body")[0].innerHTML = "发布失败！请确认网络已连接！";
            }
            $("#myModal").modal("show");
        }
    );
}