<?php
session_start();
include '../php/database_connect.php';
$images = 0;
if(!isset($_SESSION['refresh'])){
    $images = $pdo->query("SELECT * FROM travelimage order by FAVOR desc");}
else{
    $images = $pdo->query("SELECT * FROM travelimage order by rand() limit 6");}
$arrPATH = [];
$arrTitle = [];
$arrDescr = [];
for($i=0;$i<6;$i++) {
    $row = $images->fetch();
    $arrPATH[$i] = $row['PATH'];
    $arrTitle[$i] = $row['Title'];
    $arrDescr[$i] = $row['Description'];
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
    </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
<div class="main">
    <!-- 导航条 -->
    <div class="head">
        <div class="navbox">
            <!-- 侧边栏菜单 -->

            <!-- 主菜单 -->
            <div class="nav headrg" id="nav">
                <ul class="nav_pc">
                    <li>
                        <img src="../img/facebook.svg" class="headlogo" alt="logo">
                    </li>
                    <li class="active">
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
                        echo '<label><i></i><a href="login.html"style="color: white;position: relative;left: 25%;">'.$_SESSION['UserName'].'</a></label>';
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

    <!--轮播部分-->
    <div class="slider">
        <div id="slideBox" class="slideBox">
            <div class="hd">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="bd">
                <ul>
                    <li><img src="../img/IMG_0385.JPG" /></li>
                    <li><img src="../img/IMG_0387.JPG" /></li>
                    <li><img src="../img/IMG_0398.JPG" /></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sightseeing">
        <p class="sightseeing">Wonderful Moments Here!</p>
        <div class="photoelement">
            <ul class="sight">
                <li class="sight"><p class="sight"><?php echo $arrTitle[0];?></p>
                    <div class="imgsight"><img src="<?php echo "../travel-images/large/".$arrPATH[0];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[0];?></p>
                </li>
                <li class="sight"><p class="sight"><?php echo $arrTitle[1];?></p>
                    <div class="imgsight"><img src="<?php echo"../travel-images/large/".$arrPATH[1];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[1];?></p>
                </li>
                <li class="sight"><p class="sight"><?php echo $arrTitle[2];?></p>
                    <div class="imgsight"><img src="<?php echo"../travel-images/large/".$arrPATH[2];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[2];?></p>
                </li>
            </ul>
            <ul class="sight">
                <li class="sight"><p class="sight"><?php echo $arrTitle[3];?></p>
                    <div class="imgsight"><img src="<?php echo"../travel-images/large/".$arrPATH[3];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[3];?></p>
                </li>
                <li class="sight"><p class="sight"><?php echo $arrTitle[4];?></p>
                    <div class="imgsight"><img src="<?php echo"../travel-images/large/".$arrPATH[4];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[4];?></p>
                </li>
                <li class="sight"><p class="sight"><?php echo $arrTitle[5];?></p>
                    <div class="imgsight"><img src="<?php echo"../travel-images/large/".$arrPATH[5];?>" onclick="imageToDetail(this)"></div>
                    <p class="sight"><?php echo $arrDescr[5];?></p>
                </li>
            </ul>
        </div>

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
    <div onclick="window.location.href='../php/homeImageReload.php'"><img src="../img/reload.jpg" class="reload"></div>
    <a href="javascript:window.scrollTo( 0, 0 );" ><img src="../img/top.jpg" class="top"></a>
</ul>


<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript" src='../js/script.js'></script>



<script type="text/javascript">
    //轮播
    jQuery(".slideBox").slide({
        mainCell: ".bd ul",
        effect: "leftLoop",
        vis: "auto",
        autoPlay: true,
        trigger: "mouseover"
    });


</script>
<script type="text/javascript" src="../js/image.js"></script>


</body>
</html>
