define(['jquery','cookie'],function($){
	$('#loginForm').on("submit",function(){
        var tc_name=$("#tc_name").val();
        var tc_pass=$("#tc_pass").val();
        $.ajax({
            url: '/api/login',
            type:'post',
            data:{
                tc_name: tc_name,
                tc_pass: tc_pass
            },
            success:function(info){
                if(info.code===200){
                     // 将用户信息存储到 cookie 中了
                 $.cookie('userinfo', JSON.stringify(info.result));

                    location.href="/";

                }else{
                    console.log("登录失败");
                }
            }

        })
        return false;
       })
})