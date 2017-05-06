<?php
/**
 * Created by PhpStorm.
 * User: ft
 * Date: 2017/5/3
 * Time: 下午9:25
 */
session_start();

require 'connection.php';
require 'function.php';


$loginuser = $_SESSION['loginuser'];
$requestid = $_GET["requestid"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Start a project</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body{
            background: url("images/darkblue.jpg") no-repeat center center scroll;
            background-size: cover;
        }

        .completerequest{
            position: relative;
            margin-top: 200px;
            margin-left: auto;
            margin-right: auto;
            width: 1200px;
            height: 800px;
            text-align: center;
            color: white;
        }
        span.form-margin{
            margin-left: 30px;
            margin-right: 20px;
        }
        .form-margin{
            margin-left: 100px;
            margin-right: 100px;
        }

        .btn-margin{
            margin-left: 100px;
        }
        .sample{
            overflow: hidden;
            width: 100px;
            height: 100px;
        }
        .ava-block{
            width: 110px;
            height: 110px;
        }
        .avatar::after {
            content: "";

        }
        .user_icon{
            margin: 0 5px;
            width: 20px;
            height: 20px;
            display: inline;
            padding: 0;
            border: 1px solid rgba(0,0,0,0);
        }


        .blockmargin{

            margin-left: auto;
            margin-right: auto;
        }

        #sampleupload{

            margin-left: auto;
            margin-right:auto;

        }

    </style>
</head>
<div>





<div class="navbar-default navbar-fixed-top">
    <div class = "container">

        <div class ="navbar-header">
            <button class ="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand">Spring Board</a>

        </div>

        <div class="collapse navbar-collapse">

            <ul class ="nav navbar-nav">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="explore.php">Explore</a></li>
                <li><a href ="fundrequest.php">Start a project</a></li>
            </ul>

            <?php

            if(isset($loginuser)){

                //echo "welcome $loginuser ";

                //echo " <button type=\"button\" class =\"btn btn-danger\" onclick=\"window.location.href='logout.php'\">Bye Bitch</button>";



                $query0 = $conn->prepare("SELECT Avatar FROM UserProfiles WHERE UID = ?");
                $query0->bind_param("s", $loginuser);
                $query0->execute();
                $query0->bind_result($icon);
                $query0->fetch();
                $query0->close();




                echo"<div class=\"navbar-text navbar-right dropdown\">
                    <img src=\"$icon\" class = \"thumbnail user_icon\">
                    
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                   $loginuser<span class=\"caret\" ></span></a>
                    <ul class=\"dropdown-menu\">
                      <li><a href = \"profile.php?userid=$loginuser\"> My Profile </a></li>
                      <li><a href = \"editProfile.php\"> Settings</a></li>
                      <li><a href = \"logout.php\"> Log Out </a></li>
                  </ul>
                </div>";


            }else{


                ?>

                <form class="navbar-form navbar-right" method="POST" action="loginCheck.php">

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Username" name="loginname">

                        <input type="password" class="form-control" placeholder="*****" name="password">

                        <input type="submit" class="btn btn-success"  value="Log In">

                    </div>

                    <button type="button" class ="btn btn-danger" onclick="window.location.href='signup.php'">Sign Up</button>

                </form>



                <?php
            }
            ?>

        </div>
    </div>
</div>

<div class="completerequest" ">



        <div class="row">
            <h1 >One more step...</h1>
            <br>
        </div>

        <div class="container blockmargin">
            <div class="col-md-6 col-md-offset-3 text-center">

                <form method="post" action="">
                <div class="form-group form-margin">

                    <div class = "row">
                    <label class="control-label"><h3>Select Tags for your project：</h3></label>
                    <br><br/>
                        <input type="checkbox" name="tags[]" value="Art"><label> Art </label>
                        <input type="checkbox" name="tags[]" value="Books"><label> Books </label>
                        <input type="checkbox" name="tags[]" value="Comedy"><label> Comedy </label>
                        <input type="checkbox" name="tags[]" value="Culture"><label> Culture </label>
                        <input type="checkbox" name="tags[]" value="Dance"><label> Dance </label>
                    <br>
                        <input type="checkbox" name="tags[]" value="Drama"><label> Drama </label>
                        <input type="checkbox" name="tags[]" value="Education"><label> Education </label>
                        <input type="checkbox" name="tags[]" value="Entertainment"><label> Entertainment </label>
                        <input type="checkbox" name="tags[]" value="Fashion"><label> Fashion </label>
                    <br>
                        <input type="checkbox" name="tags[]" value="Fitness"><label> Fitness </label>
                        <input type="checkbox" name="tags[]" value="Food"><label> Food </label>
                        <input type="checkbox" name="tags[]" value="Games"><label> Games </label>
                        <input type="checkbox" name="tags[]" value="Hiphop"><label> Hiphop </label>
                        <input type="checkbox" name="tags[]" value="Jazz"><label> Jazz </label>
                        <input type="checkbox" name="tags[]" value="Life"><label> Life </label>
                    <br>
                        <input type="checkbox" name="tags[]" value="Movie"><label> Movie </label>
                        <input type="checkbox" name="tags[]" value="Music"><label> Music </label>
                        <input type="checkbox" name="tags[]" value="Mystery"><label> Mystery </label>
                        <input type="checkbox" name="tags[]" value="Photography"><label> Photography </label>
                        <input type="checkbox" name="tags[]" value="Pop"><label> Pop </label>
                    <br>
                        <input type="checkbox" name="tags[]" value="Rock"><label> Rock </label>
                        <input type="checkbox" name="tags[]" value="Sci-Fi"><label> Sci-Fi </label>
                        <input type="checkbox" name="tags[]" value="Show"><label> Show </label>
                        <input type="checkbox" name="tags[]" value="Technology"><label> Technology </label>
                        <input type="checkbox" name="tags[]" value="Travel"><label> Travel </label>
                    </div>

                    <br/><br/>


                    <div class = "row">


                        <label class="control-label"><h3>And....upload some samples </h3></label>
                        <br/><br/>

                        <input type="file" name="sample" id="sampleupload" >
                        <input type="hidden" name="samplepath">


                        <br/>


                            <textarea placeholder="Description" name="sampledscrp"></textarea>


                    </div>
                    <br/>

                    <button  type="submit" class="btn btn-success" >Complete Request</button>
                </div>
                </form>

                <?php




                $alltags = $_POST["tags"];

                if (!empty($alltags)){

                    echo "The tags are insert";
                    foreach($alltags as $tag){
                        //echo '<br />'.htmlentities($tag);

                        $tagquery = $conn->prepare("INSERT INTO Label(ProjID, Tag) VALUES ('$requestid','$tag')");

                        $tagquery -> execute();
                        $tagquery ->close();

                    }
                }

                if (isset($_POST['sample'])) {

                    $samplepath = "Materials/" . basename($_FILES['sample']['name']);

                    move_uploaded_file($_FILES["sample"]["tmp_name"], $samplepath);



                    $samplename = basename($_FILES['sample']['name']);

                    $sampletime = date('Y-m-d H:i:s');
                    $sampledscrp = $_POST['sampledscrp'];



                    $materialquery = $conn->prepare("INSERT INTO Materials(MName, UID, MPath, UploadTime, MDescription) 
                                                            VALUES ('$samplename','$loginuser','$samplepath','$sampletime','$sampledscrp')");
                    $materialquery -> execute();
                    $materialquery ->close();


                    $samplequery = $conn->prepare("INSERT INTO Attach(ProjID) VALUES ('$requestid')");
                    $samplequery -> execute();
                    $samplequery ->close();




                }


                ?>


            </div>

        </div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>

















