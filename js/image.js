function imageToDetail(img) {
    let path = img.src;
    let arr = path.split('/');
    let imagesrc = arr[arr.length-1];

    let request = new XMLHttpRequest();
    request.open('POST', '../php/changeToDetail.php');
    request.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=utf-8");
    let send_data = {
        'src': imagesrc
    }
    request.send(JSON.stringify(send_data));
    request.onload = function(e){
        console.log("请求成功")
        console.log(request.status, "请求的URL的相应状态")
        console.log(request.readyState, "请求的结果，一般都是4")
        if (request.status === 200 && request.readyState===4) {
            console.log(request.response);
            console.log(typeof(request.response));
            window.location.href="../src/Details.php";
        }
        else{
            alert('设置失败，请重试！');
        }
    }
    request.onerror = function(e){
        alert('请求失败')
    }
}