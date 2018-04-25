
//document.write('<script language="javascript" src="./vue.min.js"></script>');

var serverName = '192.168.31.236';
//var serverName = '114.115.223.182:80';
//var serverName = '10.77.117.237:80';
//var serverName = '192.168.0.59';

//判断是否登录了
function islogin(){
    var user_phone = plus.storage.getItem('user_phone');
    if(user_phone != null){
        return true;
    }else{
       	return false;
    }
}
