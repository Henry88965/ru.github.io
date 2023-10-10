<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Buy Buy Buy">
        <title> 登入入口</title>
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
                <form name="test" method="post" action="#"> name：<br><input type="text" name="name" ><br> 
            
                mail：<br><input type="text" name="mail" ><br> 

                <input  type="submit" value="submit">
                <input  type="button" value="sign up" onclick="window.location.href='sing.php'"/>
                
                </form>
                
                <?php
                session_start();
                
                include("member_connect.php");
                $ql="Select M_name, M_mail From member";
                $enc=mysqli_query($cons, "SET NAMES 'utf8'");
                
                $name="";
                $mail="";
                if(isset($_POST["name"])&& isset($_POST["mail"])){
                    $name=$_POST["name"];
                    $mail=$_POST["mail"];
                }
                if($name!="" && $mail!=""){
                    $ql.=" where M_name= '" . $name . "' AND M_mail= '" . $mail. " ' ";
                    //echo $ql;
                    $res=mysqli_query($cons, $ql);
                    $n=mysqli_num_rows($res);
                    echo $n;
                    if($n!=0){
                        $_SESSION["login"]=true;
                        $_SESSION["un"]=$name;
                        $_SESSION["pwd"]=$mail;
                        header("Location: shop.php");
                    }
                    else{
                        echo "帳密錯誤";
                        $_SESSION["login"]=false;
                    }
                }
                mysqli_close($cons);
                
                ?>
            </div>
        </div>
    </body>

</html>