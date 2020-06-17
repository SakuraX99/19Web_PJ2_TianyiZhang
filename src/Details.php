<?php
session_start();
include '../php/database_connect.php';

if(!isset($_SESSION['UID'])){
    echo '<script>window.location.href="../src/login.html"</script>';
}
$imagesrc = $_SESSION['imagesrc'];
$images = $pdo->query("SELECT * FROM travelimage WHERE PATH='$imagesrc'");
$row = $images->fetch();
$_SESSION['favors'] = $row['FAVOR'];

echo $_SESSION['favors'];
echo $_SESSION['favorID'];

$uid = $_SESSION["UID"];
$favors = $pdo->query("SELECT * FROM travelimagefavor WHERE UID=$uid");
$_SESSION['favorID'] = -1;
while ($row = $favors->fetch()){
    if($row['ImageID']==$_SESSION['imageid']){
        $_SESSION['favorID'] = $row['FavorID'];
        break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
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
<div class="details">
    <p class="detailshead">
Details
    </p>
    <p class="detailstitle">
        <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['title'];?>
</p>
    <div class="detailscontent">
        <div class="detailleft"><img style="position: relative;top:20%;" src="../travel-images/large/<?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['imagesrc'];?>"><br><br><br><br><br><br><br><br><br><br></div>
        <div class="detailright">
            <div class="LikeNumber">
                <p> Like Number</p>
                <h1> <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['favors'];?> </h1>
            </div>
            <div class="imagedetail">
                <p class="imgtitle"> Image Details </p>
                <p> Content: <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['theme'];?></p>
                <p> Country: <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['country'];?></p>
                <p> City: <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['city'];?></p>
            </div>
            <div class="favorclick" onclick="favorOperation()"><button><img src="../img/favor.png"><p><?php if($_SESSION['favorID'] !="-1"){echo 'unfavor';}else{echo 'favor';}?></p></button></div>
            <span id="favorid" style="display: none;"><?php echo $_SESSION['favorID'];?></span>
        </div>
    </div>
    <p class="text">
        <?php if(isset($_SESSION['IMAGEJUMP']))echo $_SESSION['description'];?>    </p>
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
<script type="text/javascript">
    function favorOperation() {
        let imagefavor = document.getElementById('favorid');
        let id = imagefavor.innerHTML;

        let request = new XMLHttpRequest();
        request.open('POST', '../php/favorOperation.php');
        request.setRequestHeader("content-type","application/x-www-form-urlencoded;charset=utf-8");
        let send_data = {
            'favorid': id
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
</script>
</body>
</html>