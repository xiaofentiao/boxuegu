

define(['jquery','cookie'],function($){
	
	if(!$.cookie('PHPSESSID') && location.pathname !== '/login') {
		location.href = '/login';
	}
	if(location.pathname === '/login'){
	return ;
	}
// 根据用户登录的时候， 设置好的cookie 获取到用户的用户名和头像
// 进行设置！
	var userinfo = JSON.parse( $.cookie('userinfo') );
	var $profile = $('.profile');
	// 查找当前元素的所有后代元素
	$profile.find('img').attr('src', userinfo.tc_avatar)
	$profile.find('h4').text(userinfo.tc_name);


	//退出功能定要
	$('#loginOut').on('click',function(){
		alert(1);
		if(!confirm('你确定要退出吗？')){
			return;
		}
		$.ajax({
			url:'/api/logout',
			type:'post',
			success:function(info){
				if(info.code==200){
					location.href='/login';
				}
			}
		})
	})

})

