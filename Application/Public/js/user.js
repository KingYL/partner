/**
 * Created by ´«Íú on 2015/11/18.
 */

function signIn(){
    //var url = "{:U('Login/signIn)}";
    var url = "http://localhost/partner/index.php/Login/signIn";
    console.log(123);
    $.ajax({
        type:'post',
        url:url,
        data:{id:1016990109,password:13858852741},
        success:function(data){
            console.log(data);
        }
    });
}