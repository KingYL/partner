/**
 * Created by 传旺 on 2015/11/29.
 */

function addActivity(){
    var title = document.getElementById("title").value;
    var content = document.getElementById("content").innerHTML;
    var image = document.getElementById("image").value;
    $.post(
        "addActivity",
        {title:title,content:content,image:image},
        function(data){
            console.log(data);
        }
    );
}
