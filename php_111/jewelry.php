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
                //echo "Welcom";
                ?>
            
            </nav>
        </header>
        <div class="all">
        <div class="item_area">
            <div class = "product_area">
                <div class = "product_card more"><h2>飾品</h2></div>
                
                
            </div>
            <div class = "product_area X1">
                <div class="product_card ">
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
                    <button onclick="addcart('飾品1')">加入購物車</button>
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
                    <button onclick="addcart('飾品2')">加入購物車</button>
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
                    <button onclick="addcart('飾品3')">加入購物車</button>
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
                    <button onclick="addcart('飾品4')">加入購物車</button>
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
                    <button onclick="addcart('飾品5')">加入購物車</button>
                </div>
            </div>
            
        </div>
        
        <div class="cart">
            <h2>購物車</h2>
            <p>目前沒有商品</p>
        </div>
    </div>
        
        <script>
            var cartItem=[];
            
            function addcart(product){
                cartItem.push(product);
                updatecart();
            }
            
            function updatecart(){
                var cart=document.querySelector('.cart')
                var cartcontext='';
                cartcontext+='<h2>購物車</h2>';
                cartcontext+='<ul>';
                for(var i=0;i<cartItem.length;i++){
                    cartcontext+='<li>'+cartItem[i]+'</li>';
                }
                cartcontext+='</ul>';
                cartcontext+='<button onclick="deletcart()">清除購物車</button>';
                cart.innerHTML=cartcontext;
                
            }
            
            function deletcart(){
                cartItem=[]
                var cart=document.querySelector('.cart')
                var cartcontext='';
                cartcontext+='<h2>購物車</h2>';
                cartcontext+='<p>目前沒有商品</p>';
                cart.innerHTML=cartcontext;
            }
            
        
        </script>
    </body>

</html>