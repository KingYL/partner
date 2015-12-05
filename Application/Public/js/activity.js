/**
 * Created by 传旺 on 2015/12/5.
 */
function enterActivity(){
    $.post(
        "enterActivity",
        {activity_id:activity_id},
        function(data){
            console.log(data);
        }
    );
}
