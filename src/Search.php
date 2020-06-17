<?php
session_start();
if(!isset($_SESSION['UID'])){
    echo '<script>window.location.href="../src/login.html"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        a.action{
            color: red;
        }
    </style>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="head">
    <div class="navbox">
        <!-- 侧边栏菜单 -->

        <!-- 主菜单 -->
        <div class="nav headrg" id="nav">
            <ul class="nav_pc">
                <li>
                    <img src="../img/facebook.svg" class="headlogo" alt="logo">
                </li>
                <li>
                    <a class="f_a" href="HomePage.php" >Home</a>
                </li>
                <li>
                    <a class="f_a" href="Browse.php">Browse</a>
                </li>
                <li class="active">
                    <a class="f_a" href="Search.php">Search</a>
                </li>
            </ul>
        </div>
        <div class="sidenav" style="color: white;position: relative;left: 25%;">

            <?php
            if(isset($_SESSION['UserName'])){
                echo '<label><i></i><a style="color: white;position: relative;left: 25%;">'.$_SESSION['UserName'].'</a></label>';
            }
            else{
                echo '<label><i></i><a href="login.html"style="color: white;position: relative;left: 25%;">Login</a></label>';
            }
            ?>
            <?php
            if(isset($_SESSION['UserName'])){
                echo
                '<ul class="side">
                    <li>
                        <a href="Upload.php"><i class="side_t upload"></i>Upload</a>
                    </li>
                    <li>
                        <a href="Myphotos.php"><i class="side_t photos"></i>My Photos</a>
                    </li>
                    <li>
                        <a href="MyFavors.php"><i class="side_t favorite"></i>My Favorite</a>
                    </li>
                    <li>
                        <a href="../php/logout.php"
                        ><i class="side_t login"></i>Logout
                        </a>
                    </li>
                </ul>';} ?>
        </div>
    </div>
</div>
<div class="Searchmain">

    <div class="searchpart0">
        <p class="searchresult">
Search
        </p>
        <div class="searchpart" method="get">
            <input type="radio" name="condition" value="title" required>Filter by Title<br>
            <textarea name="textarea1" id="textarea1"></textarea><br>
            <input type="radio" name="condition" value="decription" required>Filter by Description<br>
            <textarea name="textarea2" id="textarea2"></textarea><br>
            <input type="button" value="Filter" onclick="searchBy()">
        </div>
    </div>

    <div class="resultpart">
        <p class="searchresult">
Result
        </p>
        <div class="searchlist">
            <ul class="searchlist" id="searchlist">
<!--                <li class="searchlist"><div class="searchlistele"><img src="../img/5855735700.jpg" onclick="window.location.href='Details.html'"></div><article class="searchcontent"><p>Seaside Town</p><p class="searchcontent">The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.</p></article></li>-->
<!--                <li class="searchlist"><div class="searchlistele"><img src="../img/5855735700.jpg" onclick="window.location.href='Details.html'"></div><article class="searchcontent"><p>Seaside Town</p><p class="searchcontent">The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.</p></article></li>-->
<!--                <li class="searchlist"><div class="searchlistele"><img src="../img/5855735700.jpg" onclick="window.location.href='Details.html'"></div><article class="searchcontent"><p>Seaside Town</p><p class="searchcontent">The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.</p></article></li>-->
<!--                <li class="searchlist"><div class="searchlistele"><img src="../img/5855735700.jpg" onclick="window.location.href='Details.html'"></div><article class="searchcontent"><p>Seaside Town</p><p class="searchcontent">The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.</p></article></li>-->
<!--                <li class="searchlist"><div class="searchlistele"><img src="../img/5855735700.jpg" onclick="window.location.href='Details.html'"></div><article class="searchcontent"><p>Seaside Town</p><p class="searchcontent">The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.The clouds and sunset glow complement each other and bring out the tranquil atmosphere of the town.The mountains and clouds of the Alps are so fascinating that attracts lots of traveller every year.</p></article></li>-->
            </ul>
        </div>
        <ul class="pasgeschanger" id="pasgeschanger">
            <li><a onclick="pageChange(this)"><<</a></li>
            <li><a onclick="pageChange(this)" id="p1">1</a></li>
            <li><a onclick="pageChange(this)" id="p2">2</a></li>
            <li><a onclick="pageChange(this)" id="p3">3</a></li>
            <li><a onclick="pageChange(this)" id="p4">4</a></li>
            <li><a onclick="pageChange(this)" id="p5">5</a></li>
            <li><a onclick="pageChange(this)">>></a></li>
        </ul>


    </div>
</div>





<footer class="footer">
    <div class="container">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><img src="../img/instagram.svg" class="img-fluid"></a></li>
            <li class="list-inline-item"><a href="#"><img src="../img/twitter.svg" class="img-fluid"></a></li>
            <li class="list-inline-item"><a href="#"><img src="../img/youtube.svg" class="img-fluid"></a></li>
            <li class="list-inline-item"><a href="#"><img src="../img/dribbble.svg" class="img-fluid"></a></li>
            <li class="list-inline-item"><a href="#"><img src="../img/facebook.svg" class="img-fluid"></a></li>
        </ul>
    </div>
    <p class="end">Copyright © 2017-2020 All Rights Reserved. 备案号：闽ICP备15216667932号-1</p>
</footer>
<ul class="rightbottom">
    <div onclick="alert('图⽚已刷新')"><img src="../img/reload.jpg" class="reload"></div>
    <a href="javascript:window.scrollTo( 0, 0 );"><img src="../img/top.jpg" class="top"></a>
</ul>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript" src='../js/script.js'></script>
<script type="text/javascript" src='../js/image.js'></script>
<script type="text/javascript">
    var result = new Array();
    var pathArr = new Array();

    var numOfpage = 1;
    var currentPage = 1;
    function searchBy() {
        var radios = document.getElementsByName("condition");
        var tag = false;
        var val;
        for(radio in radios) {
            if(radios[radio].checked) {
                tag = true;
                val = radios[radio].value;
                break;
            }
        }
        let send_data;
        if(tag) {

            if(val=="title"){
                if(document.getElementById('textarea1').value==''){
                    alert("不能为空!")
                    return;
                }
                send_data = {
                    'by': val,
                    'key': document.getElementById('textarea1').value,
                }
            }
            else{
                if(document.getElementById('textarea2').value==''){
                    alert("不能为空!")
                    return;
                }
                send_data = {
                    'by': val,
                    'key': document.getElementById('textarea2').value,
                }
            }
        }
        else {
            alert("请选择");
        }

        let request = new XMLHttpRequest();
        request.open('POST', '../php/searchBy.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        request.send(JSON.stringify(send_data));

        request.onload = function (e) {
            console.log("请求成功")
            console.log(request.status, "请求的URL的相应状态")
            console.log(request.readyState, "请求的结果，一般都是4")
            if (request.status === 200 && request.readyState===4) {
                console.log(request.response);
                console.log(typeof (request.response));
                let ret = eval("("+request.response+")");
                console.log(ret);
                console.log(typeof (ret));
                result.length =  0;
                result = ret;
                pathArr.length = 0;
                pathArr = ret[2];
                render(1);
                pasgeschanger();
            } else {
                alert('设置失败，请重试！');
            }
        }
        request.onerror = function (e) {
            alert('请求失败')
        }
    }

    function render(page) {
        console.log(page);
        let len = result[0].length;
        let x = 0 + (page-1)*5;
        console.log(result);

        var ul = document.getElementById('searchlist');

        var pObjs = ul.childNodes;
        for (var i = pObjs.length - 1; i >= 0; i--) { // 一定要倒序，正序是删不干净的，可自行尝试
            ul.removeChild(pObjs[i]);
        }

        var addele ='';
        for(;x<len;x++){
            addele += '<li class="searchlist"><div class="searchlistele"><img src=' + "'" + "../travel-images/large/" + pathArr[x] + "'" + 'onclick="imageToDetail(this)"></div><article class="searchcontent"><p>' + result[1][x]+ '</p><p class="searchcontent">' + result[0][x] + '</p></article></li>';
            if(x%5==4){
                break;
            }
        }
        ul.innerHTML =addele;
    }

    function pasgeschanger() {
        for(let i = 5;i>0;i--){
            document.getElementById('p'+i.toString()).style.display = "";
        }
        let num = Math.ceil(result[0].length/5);
        if(num<5){
            for(let i = 5;i>num;i--){
                document.getElementById('p'+i.toString()).style.display = "none";
            }
        }
        numOfpage = num;
        document.getElementById('p1').className = "action";
    }

    function pageChange(key) {
        let k = key.innerHTML;
        if(k=="&lt;&lt;"){
            if(currentPage===1){
                return;
            }
            else{
                let x = currentPage%5;
                if(currentPage%5==0){
                    x = 5;
                }
                document.getElementById('p'+x.toString()).className = "unaction";
                if(currentPage%5===1){
                    for(let i = 1;i<=5;i++){
                        document.getElementById('p' + i.toString()).innerHTML = (i+currentPage-6).toString();
                        document.getElementById('p' + i.toString()).style.display = "";
                    }
                }
                currentPage-=1;
            }
        }
        else if(k=="&gt;&gt;"){
            if(currentPage===numOfpage){
                return;
            }
            else{
                let x = currentPage%5;
                if(currentPage%5==0){
                    x = 5;
                }
                document.getElementById('p'+x.toString()).className = "unaction";
                if(currentPage%5===0){
                    for(let i = 1;i<=5;i++){
                        if(i+currentPage<=numOfpage){
                            document.getElementById('p' + i.toString()).innerHTML = (i+currentPage).toString();
                            document.getElementById('p' + i.toString()).style.display = "";
                        }
                        else {
                            document.getElementById('p' + i.toString()).style.display = "none";
                        }
                    }
                }
                currentPage+=1;
            }
        }
        else {
            let x = currentPage%5;
            if(currentPage%5==0){
                x = 5;
            }
            document.getElementById('p'+x.toString()).className = "unaction";
            currentPage = eval(k);
        }

        let x = currentPage%5;
        if(currentPage%5==0){
            x = 5;
        }
        document.getElementById('p'+x.toString()).className = "action";
        render(currentPage);
    }
</script>
</body>
</html>