/**
 * Created by 传旺 on 2015/11/18.
 */
var url = "http://localhost/partner/index.php/Home";


function validateForm(form){
    var id = form["id"].value;
    var password = form["password"].value;
    var confirmPassword = form["confirmPassword"].value;
    if(id == null || id == ""){
        alert("用户名不能为空!");
        return false;
    }
    if(password == null || password == ""){
        alert("密码不能为空!");
        return false;
    }
    if(password != confirmPassword){
        alert("两次密码不相同!");
        return false;
    }
}

function saveUserInfo(){
    var userInfo = new Array();
    userInfo.name = document.getElementById("name").value;
    var gender = document.getElementsByName("gender");
    if(gender[0].checked){
        userInfo.gender = "女";
    }else if(gender[1].checked){
        userInfo.gender = "男";
    }else{
        userInfo.gender = "";
    }
    userInfo.birthday = document.getElementById("birthday").value;
    userInfo.email = document.getElementById("email").value;
    userInfo.sign = document.getElementById("sign").value;

    console.log(userInfo);
    var uid = getCookie("userId");

    $.post(url + "/User/save", {
        name:userInfo.name,
        gender:userInfo.gender,
        birthday:userInfo.birthday,
        email:userInfo.email,
        sign:userInfo.sign,
        uid:uid
    }, function (data) {
        if(data == 1){
            document.getElementsByClassName("modal-body")[0].innerHTML = "申请成功！";
        }else {
            document.getElementsByClassName("modal-body")[0].innerHTML = "申请失败！是否已经申请过？";
        }
        $("#myModal").modal("show");
    });
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');    //把cookie分割成组
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];                      //取得字符串
        while (c.charAt(0)==' ') {          //判断一下字符串有没有前导空格
            c = c.substring(1,c.length);      //有的话，从第二位开始取
        }
        if (c.indexOf(nameEQ) == 0) {       //如果含有我们要的name
            return unescape(c.substring(nameEQ.length,c.length));    //解码并截取我们要值
        }
    }
    return false;
}

function initGender(){
    var gender = document.getElementsByName("gender");
    console.log(gender[0].value);
    if(gender[0].value == "女"){
        gender[0].checked = true;
    }
    if(gender[1].value == "男"){
        gender[1].checked = true;
    }
}