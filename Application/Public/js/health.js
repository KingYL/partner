/**
 * Created by 传旺 on 2015/11/29.
 */
var date = new Date().toLocaleDateString().replace(/\//g,"-");

function getExerciseInfo(){
    $.post(
        "getExerciseInfo",
        {date:date},
        function(data){
            console.log(data);
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
    getCookie("uid")
    $.post(
        "getSlumberInfo",
        {date:date},
        function(data){
            console.log(data);
        }
    );
}