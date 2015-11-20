/**
 * Created by 传旺 on 2015/11/18.
 */
var url = "http://localhost/partner/index.php";


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