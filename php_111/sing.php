<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Buy Buy Buy">
        <title> 註冊入口</title>
        <link rel="icon" type="image/png" href="images/buy_girl.png">
        
        <link rel="stylesheet" type="text/css"
              href="style/D0414.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
        
    </head>
    
    <body>
        <div class="bgs">
            <header class="had ft">
                <a href="D0414.php"><img class="logo" src="images/buy_girl.png" alt="Buy"></a>
                <nav>
                    <ul class="navcs">
                        <li><a href="#">關於我們</a></li>
                    </ul>
                </nav>
            </header>
            <div class="name ft">
                <form name="test" method="post" action="#"> 
                name：<br><input type="text" name="name" ><br> 
            
                mail：<br><input type="text" name="mail" ><br> 
                phone number：<br><input type="text" name="number" ><br> 
                address：<br><input type="text" name="address" ><br> 

                <input  type="submit" value="submit">
                <input  type="button" value="log in" onclick="window.location.href='door.php'"/>
                
                </form>
                
                <?php
                session_start();
                
                include("member_connect.php");
                $ql="Select M_name, M_mail From member";
                $enc=mysqli_query($cons, "SET NAMES 'utf8'");
                
                $name="";
                $mail="";
                $number="";
                $address="";
                if(isset($_POST["name"])&& isset($_POST["mail"])&&isset($_POST["number"])&&isset($_POST["address"])){
                    $name=$_POST["name"];
                    $mail=$_POST["mail"];
                    $number=$_POST["number"];
                    $address=$_POST["address"];
                }
                if($name!="" && $mail!=""){
                    $ql="INSERT INTO `member`( `M_name`, `M_mail`, `M_phone`, `M_address`) VALUES ('{$name}','{$mail}','{$number}','{$address}')";
                    mysqli_query($cons,$ql);
                    echo "註冊成功，請按登入進行登入";
                   
                }
                mysqli_close($cons);
                
                ?>
            </div>
        </div>
    </body>

</html>