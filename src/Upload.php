<?php
session_start();
include '../php/database_connect.php';
if(!isset($_SESSION['UID'])){
    echo '<script>window.location.href="../src/login.html";</script>';
}
if(isset($_SESSION['invalid'])){
    echo '<script>alert("invaild country and city pair!");</script>';
    unset($_SESSION['invalid']);
}
if(isset($_SESSION['updateStatus'])){
    unset($_SESSION['updateStatus']);
    echo '<script>alert("Update Success!");window.location.href="../src/MyPhotos.php";</script>';
}
$path = 0;
$decription = 0;
$title = 0;
$country = 0;
$city = 0;
$ID = 0;
if(isset($_SESSION['Update'])){
    $imagesrc = $_SESSION['Update'];
    echo $imagesrc;
    $images = $pdo->query("SELECT * FROM travelimage WHERE PATH='$imagesrc'");
    $row = $images->fetch();
    $path = $row['PATH'];
    $decription = $row['Description'];
    $title= $row['Title'];
    $country= $row['CountryName'];
    $city= $row['CityName'];
    $ID = $row['ImageID'];
    $_SESSION['UpdateID'] = $ID;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
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
<div class="uploadpart">
    <p class="uploadtitle">Upload</p>
    <div class="photoupload">
        <div id="imgPreview">
            <div id="prompt3" style="display: <?php if(isset($_SESSION['Update'])){echo "none";}?>">
                <p>Haven't Upload yet</p>
                <input type="file" id="file" class="filepath" onchange="changepic(this)"
                       accept="image/jpg,image/jpeg,image/png,image/PNG">
                <!--当vaule值改变时执行changepic函数，规定上传的文件只能是图片-->
            </div>
            <img src="<?php if(isset($_SESSION['Update'])){echo "../travel-images/large/".$path;}?>" style="display: <?php if(isset($_SESSION['Update'])){echo "block";}else{echo "none";}?>" id="img3"/>
            <p class="uploadtip">Click Central of the box to Upload</p>
        </div>

        <div id="imgPreview1" style="display: <?php if(isset($_SESSION['Update'])){echo "block";}else{echo "none";}?>">
            <div id="prompt31" style="display: block;">
                <p>Haven't Upload yet</p>
                <input type="file" id="file1" class="filepath" onchange="changepic1(this)"
                       accept="image/jpg,image/jpeg,image/png,image/PNG">
                <!--当vaule值改变时执行changepic函数，规定上传的文件只能是图片-->
            </div>
            <img src="#" style="display: none;" id="img31"/>
            <p class="uploadtip">Click Central of the box to Upload</p>
        </div>
        <!--当vaule值改变时执行changepic函数，规定上传的文件只能是图片-->
        <div class="uploadinfo" style="border: 1px solid;border-radius: 10px;width: 68%;position: relative;left: 10%;margin: 40px;">
            <p style="font-size: 10pt;">Select Theme,Country and City For your photo, Text in the frame is also available</p>
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
                </select></div>
        <div class="uploadinfo">
            <p>Title:</p>
            <textarea id="Title"><?php if(isset($_SESSION['Update'])){echo $title;}?></textarea><br></div>
        <div class="uploadinfo">
            <p>Description:</p>
            <textarea id="Description"><?php if(isset($_SESSION['Update'])){echo $decription;}?></textarea><br></div>
        <div class="uploadinfo">
            <p>Country:</p>
            <textarea id="Country"><?php if(isset($_SESSION['Update'])){echo $country;}?></textarea><br></div>
        <div class="uploadinfo">
            <p>City:</p>
            <textarea id="City"><?php if(isset($_SESSION['Update'])){echo $city;}?></textarea><br></div>
        <div ><input type="button" value="<?php if(isset($_SESSION['Update'])){echo "Modify";}else{echo "Upload";}?>" onclick="<?php if(isset($_SESSION['Update'])){echo "upload2()";}else{echo "upload1()";}?>" style="height: 30px;border-radius: 6px;"/></div>
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
<?php unset($_SESSION['Update']);?>
<script type="text/javascript">
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
            if (request.status === 200 && request.readyState===4)
            {   console.log(request.response);
                console.log(typeof(request.response));
                let ret = eval("("+request.response+")");
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

    function changepic() {
        $("#prompt3").css("display", "none");
        var reads = new FileReader();
        f = document.getElementById('file').files[0];
        reads.readAsDataURL(f);
        reads.onload = function (e) {
            // console.log(this.result);
            document.getElementById('img3').src = this.result;

            $("#img3").css("display", "block");
        };
    }

    function changepic1() {
        $("#prompt31").css("display", "none");
        var reads = new FileReader();
        f = document.getElementById('file1').files[0];
        reads.readAsDataURL(f);
        reads.onload = function (e) {
            // console.log(this.result);
            document.getElementById('img31').src = this.result;

            $("#img31").css("display", "block");
        };
    }

    function upload1() {
        let imagefile = document.getElementById('file').files[0];
        if (imagefile == null) {
            alert("文件不能为空!");
            return;
        }

        let themeSelect = document.getElementById('content');
        let themeidx = themeSelect.selectedIndex;
        let theme = themeSelect.options[themeidx].value;

        let countrySelect = document.getElementById('country');
        let countryidx = countrySelect.selectedIndex;
        let country0 = countrySelect.options[countryidx].value;

        let citiesSelect = document.getElementById('citys');
        let citiesidx = citiesSelect.selectedIndex;
        let city0 = citiesSelect.options[citiesidx].value;

        let Title = document.getElementById('Title');
        let Description = document.getElementById('Description');
        let country1 = document.getElementById('Country');
        let city1 = document.getElementById('City');

        let city;
        let country;

        if (theme == "请选择") {
            alert("theme不能为空!");
            return;
        }

        if (country1.value == "") {
            if(country == "请选择")
            {
                alert("country不能为空!");
                return;
            }
            else {
                country=country0;
            }
        }
        else {
            country=country1.value;
        }

        if (city1.value == "") {
            if(country == "请选择")
            {
                alert("city不能为空!");
                return;
            }
            else {
                city=city0;
            }
        }
        else {
            city=city1.value;
        }


        if(Title.value==""){alert("Title不能为空!");return;}
        if(Description.value==""){alert("Description不能为空!");return;}


        var formFile = new FormData();
        formFile.append("imagefile", imagefile);//加入文件对象
        formFile.append("theme", theme);
        formFile.append("country", country);
        formFile.append("city", city);
        formFile.append("Title", Title.value);
        formFile.append("Description", Description.value);

        let request = new XMLHttpRequest();
        request.open('POST', '../php/uploadOperation.php');
        request.send(formFile);

        request.onload = function (e) {
            console.log("请求成功")
            console.log(request.status, "请求的URL的相应状态")
            console.log(request.readyState, "请求的结果，一般都是4")
            if (request.status === 200 && request.readyState===4) {
                console.log(request.response);
                console.log(typeof (request.response));
                window.location.href = "../src/Upload.php";
            } else {
                alert('设置失败，请重试！');
            }
        }
        request.onerror = function (e) {
            alert('请求失败')
        }
    }
    function upload2() {
        let imagefile = document.getElementById('file1').files[0];
        if (imagefile == null) {
            alert("文件不能为空!");
            return;
        }

        let themeSelect = document.getElementById('content');
        let themeidx = themeSelect.selectedIndex;
        let theme = themeSelect.options[themeidx].value;

        let countrySelect = document.getElementById('country');
        let countryidx = countrySelect.selectedIndex;
        let country0 = countrySelect.options[countryidx].value;

        let citiesSelect = document.getElementById('citys');
        let citiesidx = citiesSelect.selectedIndex;
        let city0 = citiesSelect.options[citiesidx].value;

        let Title = document.getElementById('Title');
        let Description = document.getElementById('Description');
        let country1 = document.getElementById('Country');
        let city1 = document.getElementById('City');

        let city;
        let country;

        if (theme == "请选择") {
            alert("theme不能为空!");
            return;
        }

        if (country1.value == "") {
            if(country == "请选择")
            {
                alert("country不能为空!");
                return;
            }
            else {
                country=country0;
            }
        }
        else {
            country=country1.value;
        }

        if (city1.value == "") {
            if(country == "请选择")
            {
                alert("city不能为空!");
                return;
            }
            else {
                city=city0;
            }
        }
        else {
            city=city1.value;
        }


        if(Title.value==""){alert("Title不能为空!");return;}
        if(Description.value==""){alert("Description不能为空!");return;}


        var formFile = new FormData();
        formFile.append("imagefile", imagefile);//加入文件对象
        formFile.append("theme", theme);
        formFile.append("country", country);
        formFile.append("city", city);
        formFile.append("Title", Title.value);
        formFile.append("Description", Description.value);

        let request = new XMLHttpRequest();
        request.open('POST', '../php/updateOperation.php');
        request.send(formFile);

        request.onload = function (e) {
            console.log("请求成功")
            console.log(request.status, "请求的URL的相应状态")
            console.log(request.readyState, "请求的结果，一般都是4")
            if (request.status === 200 && request.readyState===4) {
                console.log(request.response);
                console.log(typeof (request.response));
                window.location.href = "../src/Upload.php";
            } else {
                alert('设置失败，请重试！');
            }
        }
        request.onerror = function (e) {
            alert('请求失败')
        }
    }

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
</script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript" src='../js/script.js'></script>
</body>
</html>