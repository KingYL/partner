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

function getUserDetail(uid) {
	if (uid == null)
		uid = 1;
	alert(window.location.host);/*
	window.location.href = window.location.host + "/partner/index.php/Home/User/user/userId/" + uid;*/
}

function getMyDoctors(page){
	if (page == null)
		page = 0;
    $.post(
        "../User/getMyRelations",
        {type:"医生", page: page},
        function(data){
            var doctors = document.getElementById("myDoctors");
            doctors.innerHTML = "";
			var doctorDatas = data['datas'];
            for(var i = 0; i < doctorDatas.length; i++) {
                var doctorUnit = getDoctorUnit(doctorDatas[i]["uid"],doctorDatas[i]["icon_url"],
					doctorDatas[i]["name"], doctorDatas[i]["identify"], doctorDatas[i]["sign"],"查看该医生详情>>",getUserDetail);
                doctors.appendChild(doctorUnit);
            }
			var currentPage = page;
			var leftPage = data['leftPage'];
			appendPage(currentPage, leftPage, "getMyDoctors", 
				$('#doctorsPage'));
        }
    );
}


function getMyCoaches(page){
	if (page == null)
		page = 0;
    $.post(
        "../User/getMyRelations",
        {type:"教练", page: page},
        function(data){
            var coaches = document.getElementById("myCoaches");
            coaches.innerHTML = "";
			var doctorDatas = data['datas'];
            for(var i = 0; i < doctorDatas.length; i++) {
                var coachUnit = getDoctorUnit(doctorDatas[i]["uid"], doctorDatas[i]["icon_url"], 
					doctorDatas[i]["name"],doctorDatas[i]["identify"],doctorDatas[i]["sign"],"查看该教练详情>>",null);
                coaches.appendChild(coachUnit);
            }
			var currentPage = page;
			var leftPage = data['leftPage'];
			appendPage(currentPage, leftPage, "getMyCoaches", 
				$('#coachPage'));
        }
    );
}

function getMyQuestions(page){
	if (page == null)
		page = 0;
    $.post(
        "getQuestions",
        {page:page},
        function(data){
            var myQuestions = document.getElementById("myQuestions");
            myQuestions.innerHTML = "";
			var questionDatas = data['datas'];
            for(var i = 0; i < questionDatas.length; i++){
                var questionUnit = getQuestionUnit(questionDatas[i]["title"], questionDatas[i]["content"], 
					questionDatas[i]["time"]);
                myQuestions.appendChild(questionUnit);
            }
			var currentPage = page;
			var leftPage = data['leftPage'];
			appendPage(currentPage, leftPage, "getMyQuestions", 
				$('#questionPage'));
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
    if(title.value == "" || content.value == ""){
        alert("输入不能为空！");
        return;
    }
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

function getAdvices(){
	var page = getParam("page");
	if (page == null)
		page = 0;
    $.post(
        "getAdvices",
        {page: page},
        function(data){
            console.log(data);
            var advices = document.getElementById("advices");
            advices.innerHTML = "";
			var adviceDatas = data['datas'];
            for(var i = 0; i < adviceDatas.length; i++){
                var adviceUnit = getAdviceUnit(adviceDatas[i]["title"], adviceDatas[i]["content"], 
					adviceDatas[i]["name"], adviceDatas[i]["identify"], adviceDatas[i]["time"]);
                advices.appendChild(adviceUnit);
            }
			var currentPage = page;
			var leftPage = data['leftPage'];
			appendPage(currentPage, leftPage, "getAdvices", 
				$('#advicePage'));
        }
    );
}

function getAdviceUnit(question_title,answer_content,name,identify,time){
    var li = document.createElement("li");
    li.className = "list-item";
    var question = document.createElement("div");
    question.className = "question";
    var ques_p = document.createElement("p");
    ques_p.innerHTML = "<span>提问：</span>" + question_title;
    question.appendChild(ques_p);
    var answer = document.createElement("div");
    answer.className = "answer";
    var ans_p = document.createElement("p");
    ans_p.innerHTML = "<span>提问：</span>" + answer_content;
    var offer = document.createElement("div");
    offer.className = "offer";
    offer.innerHTML = "<h4>" + name + "<span class='badge'>" + identify + "</span></h4>";
    var offer_time = document.createElement("div");
    offer_time.className = "offer-time";
    offer_time.innerHTML = time;
    answer.appendChild(ans_p);
    answer.appendChild(offer);
    answer.appendChild(offer_time);
    li.appendChild(question);
    li.appendChild(document.createElement("hr"));
    li.appendChild(answer);
    return li;
}


//service_user function

function getUsers(){
    $.post(
        "../User/getMyServiceUsers",
        {},
        function(data){
            var doctors = document.getElementById("myDoctors");
            doctors.innerHTML = "";
            for(var i = 0; i < data.length; i++) {
                var doctorUnit = getDoctorUnit(data[i]["uid"],data[i]["icon_url"],data[i]["name"],data[i]["identify"],data[i]["sign"],"查看用户详情>>",null);
                doctors.appendChild(doctorUnit);
            }
        }
    );
}

function getServiceQuestions(){
    $.post(
        "getServiceQuestions",
        {},
        function (data) {
            var myQuestions = document.getElementById("myQuestions");
            myQuestions.innerHTML = "";
            for(var i = 0; i < data.length; i++){
                var questionUnit = getServiceQuestionUnit(data[i]["uid"],data[i]["qid"],data[i]["title"],data[i]["content"],data[i]["time"],data[i]["name"]);
                myQuestions.appendChild(questionUnit);
            }
        }
    );
}

function getServiceQuestionUnit(uid,qid,title,content,time,userName){
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
    offer_time.innerHTML = userName + " <span>发表于 </span> " + time;
    question_content.appendChild(offer_time);
    var button = document.createElement("button");
    button.innerHTML = "回复";
    button.onclick = function(){
        document.getElementById("reply_btn").value = qid;
        document.getElementById("reply_title").title = uid;
        document.getElementById("reply_title").innerHTML = title;
        document.getElementById("reply_content").innerHTML = content;
        document.getElementById("reply").value = "";
        $("#reply_modal").modal("show");
    };
    var clearfix = document.createElement("div");
    clearfix.className = "clearfix";
    offer_time.appendChild(button);
    offer_time.appendChild(clearfix);
    li.appendChild(question);
    li.appendChild(question_content);
    return li;
}

function replyQuestion(qid){
    var to_user = document.getElementById("reply_title").title;
    var reply_content = document.getElementById("reply").value;
    if(reply_content == ""){
        document.getElementById("warning").style.display = "block";
        return;
    }
    $.post(
        "replyQuestion",
        {qid:qid,to_user:to_user,content:reply_content},
        function(data){
            if(data){
                $("#reply_modal").modal("hide");
            }else{
                alert("回复失败！");
            }
        }
    );
}

function getServiceAdvices(){
    $.post(
        "getServiceAdvices",
        {},
        function(data){
            var advices = document.getElementById("advices");
            advices.innerHTML = "";
            for(var i = 0; i < data.length; i++){
                var adviceUnit = getServiceAdviceUnit(data[i]["title"],data[i]["content"],data[i]["time"]);
                advices.appendChild(adviceUnit);
            }
        }
    );
}

function getServiceAdviceUnit(question_title,answer_content,time){
    var li = document.createElement("li");
    li.className = "list-item";
    var question = document.createElement("div");
    question.className = "question";
    var ques_p = document.createElement("p");
    ques_p.innerHTML = "<span>提问：</span>" + question_title;
    question.appendChild(ques_p);
    var answer = document.createElement("div");
    answer.className = "answer";
    var ans_p = document.createElement("p");
    ans_p.innerHTML = "<span>提问：</span>" + answer_content;
    var offer_time = document.createElement("div");
    offer_time.className = "offer-time";
    offer_time.innerHTML = time;
    answer.appendChild(ans_p);
    answer.appendChild(offer_time);
    li.appendChild(question);
    li.appendChild(document.createElement("hr"));
    li.appendChild(answer);
    return li;
}