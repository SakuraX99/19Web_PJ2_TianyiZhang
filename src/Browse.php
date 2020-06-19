<?php
session_start();
include '../php/database_connect.php';
if(!isset($_SESSION['UID'])){
    echo '<script>window.location.href="../src/login.html"</script>';
}

$hotCities = $pdo->query("SELECT * FROM geocities order by Heat desc");
$hotCountries = $pdo->query("SELECT * FROM geocountries order by Heat desc");
$hotThemes = $pdo->query("SELECT * FROM Theme order by Heat desc");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Broswer</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
                <li class="active">
                    <a class="f_a" href="Browse.php">Browse</a>
                </li>
                <li>
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
<div class="broswer-main">
    <ul>
        <li class="side">
            <div class="leftside">
                <div id="search-box1">
                    <div class="Titlesearch" name="Titlesearch">
                        <p>Search By Title</p>
                        <input  class="Titlesearch" id="titleInput" type="text" name="title" value="">
                        <input class="imgsubmit" type="image" src="../img/search.jpg" onclick="titlesearch()">
                    </div>
                </div>

                <div class="HotContent">
                    <p class="HotContent">Hot Content</p>
                    <ul class="contentlist">
                        <li><a class="content" href="#" onclick="citySearch(this)"><?php echo $hotCities->fetch()['AsciiName'];?></a></li>
                        <li><a class="content" href="#" onclick="citySearch(this)"><?php echo $hotCities->fetch()['AsciiName'];?></a></li>
                        <li><a class="content" href="#" onclick="citySearch(this)"><?php echo $hotCities->fetch()['AsciiName'];?></a></li>
                        <li><a class="content" href="#" onclick="citySearch(this)"><?php echo $hotCities->fetch()['AsciiName'];?></a></li>
                        <li><a class="content" href="#" onclick="citySearch(this)"><?php echo $hotCities->fetch()['AsciiName'];?></a></li>
                    </ul>
                </div>

                <div class="HotContent">
                    <p class="HotContent">Hot Country</p>
                    <ul class="contentlist">
                        <li><a class="content" href="#" onclick="countrySearch(this)"><?php echo $hotCountries->fetch()['CountryName'];?></a></li>
                        <li><a class="content" href="#" onclick="countrySearch(this)"><?php echo $hotCountries->fetch()['CountryName'];?></a></li>
                        <li><a class="content" href="#" onclick="countrySearch(this)"><?php echo $hotCountries->fetch()['CountryName'];?></a></li>
                        <li><a class="content" href="#" onclick="countrySearch(this)"><?php echo $hotCountries->fetch()['CountryName'];?></a></li>
                        <li><a class="content" href="#" onclick="countrySearch(this)"><?php echo $hotCountries->fetch()['CountryName'];?></a></li>
                    </ul>
                </div>
                <div class="HotContent">
                    <p class="HotContent">Hot Theme</p>
                    <ul class="contentlist">
                        <li><a class="content" href="#" onclick="themeSearch(this)"><?php echo $hotThemes->fetch()['theme'];?></a></li>
                        <li><a class="content" href="#" onclick="themeSearch(this)"><?php echo $hotThemes->fetch()['theme'];?></a></li>
                        <li><a class="content" href="#" onclick="themeSearch(this)"><?php echo $hotThemes->fetch()['theme'];?></a></li>
                        <li><a class="content" href="#" onclick="themeSearch(this)"><?php echo $hotThemes->fetch()['theme'];?></a></li>
                        <li><a class="content" href="#" onclick="themeSearch(this)"><?php echo $hotThemes->fetch()['theme'];?></a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="side">
            <div class="rightside">
                <div class="filter">
                    <p class="filter">Filter</p>
                    <div class="filteroptions">
                        <div>
                            <select name="content" id="content" class='filter' msgEmpty="Filter by Content">
                                <option value="请选择">请选择</option>
                                <option value="Scenery">Scenery</option>
                                <option value="City">City</option>
                                <option value="People">People</option>
                                <option value="Animal">Animal</option>
                                <option value="Building">Building</option>
                                <option value="Wonder">Wonder</option>
                                <option value="Other">Other</option>
                            </select>

                            <select name="country" id="country" class='filter' msgEmpty="Filter by Country"
                                    onChange="set_city(this,document.getElementById('citys'));">
                            </select>

                            <select name="city" id="citys" class='filter' msgEmpty="Filter by City">
                                <option value="">请选择</option>
                            </select>
                            <button class="searhbutton" onclick="filtersearch()"><img src="../img/search.jpg"></button>
                        </div>
                    </div>
                    <div class="filterresponse">
                        <div class="photoelement">
                            <ul class="sight" id="row1">
                            </ul>
                            <ul class="sight" id="row2">
                            </ul>
                            <ul class="sight" id="row3">
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
            </div>
        </li>
    </ul>
</div>
<footer class="footer" style="position: absolute;top:1300px">
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
<script type="text/javascript" src="../js/image.js"></script>
<script type="text/javascript">
    var result = new Array();
    var numOfpage = 1;
    var currentPage = 1;


    var cities = new Object();

    function updateList() {
        let request = new XMLHttpRequest();
        request.open('POST', '../php/updateList.php');
        request.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=utf-8");
        request.send();
        request.onload = function(e){
            console.log("请求成功")
            console.log(request.status, "请求的URL的相应状态")
            console.log(request.readyState, "请求的结果，一般都是4")
            if (request.status === 200 && request.readyState===4) {
                let ret = JSON.parse(request.response);
                console.log(request.response);
                console.log(typeof(request.response));
                console.log(ret);
                console.log(typeof(ret));
                cities = ret;

                let select = document.getElementById("country");
                var option0 = document.createElement('option');
                option0.text = '请选择';
                option0.value = '0';
                select.appendChild(option0);
                for(let key in cities){
                    var option = document.createElement('option');
                    option.value = key;
                    option.innerHTML = key;
                    select.appendChild(option);
                }
            }
            else{
                alert('设置失败，请重试！');
            }
        }
        request.onerror = function(e){
            alert('请求失败')
        }
    }
    updateList();



    function set_city(country, city) {

        var pv, cv;
        var i, ii;

        pv = country.value;
        cv = city.value;

        city.length = 1;

        if (pv == '0') return;
        if (typeof (cities[pv]) == 'undefined') return;

        for (i = 0; i < cities[pv].length; i++) {
            ii = i + 1;
            city.options[ii] = new Option();
            city.options[ii].text = cities[pv][i];
            city.options[ii].value = cities[pv][i];
        }
    }

    function titlesearch() {

        let title = document.getElementById('titleInput').value;

        let request = new XMLHttpRequest();
        request.open('POST', '../php/titleSearch.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {'title': title}
        request.send(JSON.stringify(send_data));

        request.onload = function (e) {
            console.log("请求成功")
            console.log(request.status, "请求的URL的相应状态")
            console.log(request.readyState, "请求的结果，一般都是4")
            if (request.status === 200 && request.readyState===4) {
                console.log(request.response);
                console.log(typeof (request.response));
                let ret = eval("(" + request.response + ")");
                let arr = new Array();
                for (let j = 0; j < ret.length; j++) {
                    arr.push(ret[j]);
                }
                result = arr;
                alert('查询成功！');
                console.log(result);
                // alert("render2");
                render(1);
                console.log(result);
                // alert("render3");
                pasgeschanger();
            } else {
                // alert('设置失败，请重试！');
            }
        }
        request.onerror = function (e) {
            alert('请求失败')
        }

    }

    function filtersearch() {

        let themeSelect = document.getElementById('content');
        let themeidx = themeSelect.selectedIndex;
        let theme = themeSelect.options[themeidx].value;

        let countrySelect = document.getElementById('country');
        let countryidx = countrySelect.selectedIndex;
        let country = countrySelect.options[countryidx].value;

        let citiesSelect = document.getElementById('citys');
        let citiesidx = citiesSelect.selectedIndex;
        let city = citiesSelect.options[citiesidx].value;


        let request = new XMLHttpRequest();
        request.open('POST', '../php/filterSearch.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {
            'theme': theme,
            'country': country,
            'city': city
        }
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
                result = ret[2];
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
            let len = result.length;
            console.log(len);
            let x = 0 + (page-1)*9;
            console.log(x);
            console.log(result);

            var ul1 = document.getElementById('row1');
            var ul2 = document.getElementById('row2');
            var ul3 = document.getElementById('row3');

            var pObjs = ul1.childNodes;
            for (var i = pObjs.length - 1; i >= 0; i--) { // 一定要倒序，正序是删不干净的，可自行尝试
                ul1.removeChild(pObjs[i]);
            }
            var pObjs1 = ul2.childNodes;
            for (var i = pObjs1.length - 1; i >= 0; i--) { // 一定要倒序，正序是删不干净的，可自行尝试
                ul2.removeChild(pObjs1[i]);
            }
            var pObjs2 = ul3.childNodes;
            for (var i = pObjs2.length - 1; i >= 0; i--) { // 一定要倒序，正序是删不干净的，可自行尝试
                ul3.removeChild(pObjs2[i]);
            }

            var addele ='';
            for(;x<len;x++){
                addele += '<li class="sight" id="img1">\n' +
                    '<a href="#"><div class="imgsight"><img src='+ "'../travel-images/large/" + result[x]+"'" +' onclick="imageToDetail(this)"></div></a></li>'

                if((x%9+1)%3==0||x==len-1) {
                    let y = 0;
                    var idx = 'row'+(Math.floor(x % 9 / 3)+1).toString();
                    var ul = document.getElementById(idx);
                    ul.innerHTML =addele;
                    addele = '';
                }
                if(x%9==8){
                    break;
                }

            }
    }

    function pasgeschanger() {
        let num = Math.ceil(result.length/9);
        for(let i = 5;i>0;i--){
            document.getElementById('p'+i.toString()).style.display = "";
        }
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

    function citySearch(obj) {
        let cityName = obj.innerHTML;

        let request = new XMLHttpRequest();
        request.open('POST', '../php/hotSearch.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {
            'by':'city',
            'city': cityName
        }
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
                result = ret[2];
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

    function countrySearch(obj) {
        let countryName = obj.innerHTML;

        let request = new XMLHttpRequest();
        request.open('POST', '../php/hotSearch.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {
            'by':'country',
            'country': countryName
        }
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
                result = ret[2];
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

    function themeSearch(obj) {
        let theme = obj.innerHTML;

        let request = new XMLHttpRequest();
        request.open('POST', '../php/hotSearch.php');
        request.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {
            'by':'theme',
            'theme': theme
        }
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
                result = ret[2];
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

</script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript" src='../js/script.js'></script>

</body>
</html>
