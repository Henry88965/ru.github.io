<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Buy 敗|賣場</title>
        <link rel="stylesheet" type="text/css"
              href="style/shop.css">
    </head>
    
    <body>
        <header class="had ft">
            <a href="D0414.php"><img class="logo" src="images/buy_girl.png" alt="Buy"></a>
            <nav>
                <ul class="navcs">
                    <li><a href="shop.php">首頁</a></li>
                    <li><a href="dessert.php">甜品</a></li>
                    <li><a href="cloth.php">衣服</a></li>
                    <li><a href="jewelry.php">飾品</a></li>
                    <li><a href="#">購物車</a></li>
                    <li>
                        <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
                            <input type ="submit" value="登出">
                            <input type="hidden" name="logout" value="true">
                        </form>
                    </li>
                </ul>
                
                <?php
                    session_start();
                    if(isset($_POST['logout'])&& $_POST['logout']==true){
                        unset($_SESSION['login']);
                        header("Refresh:0.000005; url=door.php");
                        exit; 
                    }
                    if($_SESSION['login']!=true){
                     header("Loction: shop.php");   
                    }
                    echo $_SESSION['un'];
                //echo "Welcom";
                ?>
            
            </nav>
        </header>
        <div class="all">
        <div class="item_area">
            <div class = "product_area">
                <div class = "product_card more"><h2>甜點</h2></div>
                <div class = "product_card right">
                    <a href="dessert.php">查看更多>></a>
                </div>
                
            </div>
            <div class = "product_area X1">
                <div class="product_card ">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 5,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 6,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 7,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                 <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 8,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 9,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
            </div>
            <div class = "product_area ">
                <div class = "product_card more"><h2>衣服</h2></div>
                <div class = "product_card right"><a href="cloth.php">查看更多>></a>
                </div>
            </div>
            <div class = "product_area X1">
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 0,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart(衣服1)">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 1,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 2,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 3,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 4,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
            </div>
            <div class = "product_area ">
                <div class = "product_card more"><h2>飾品</h2></div>
                <div class = "product_card right"><a href="jewelry.php">查看更多>></a>
                </div>
            </div>
            <div class = "product_area X1">
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 10,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 11,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 12,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 13,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
                <div class="product_card">
                    <?php
                            include("member_connect.php");
                            $count=0;
                            $ql="SELECT * FROM `goods` limit 14,1";
                            $enc=mysqli_query($cons, "SET Names 'utf-8'");
                            $res=mysqli_query($cons, $ql);
                            $meta=mysqli_fetch_assoc($res);
                                
                                
                            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 100px></td>";
                            echo "<h3>". $meta['G-name']. "</h3>";
                            echo "<p>價錢：". $meta['G-money']. "</p>";
                          
                                
                        ?>
                    <button onclick="addcart()">加入購物車</button>
                </div>
            </div>
        </div>
        
        <div class="cart">
            <h2>購物車</h2>
            <p>目前沒有商品</p>
        </div>
        </div>
    
        
        <script>
            
            function addcart(product){
                alert("已加入購物車");
                
            }
            
        </script>
    </body>

</html>