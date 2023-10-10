<!DOCTUPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Database connect</title>
    </head>
    
    <body>
        <?php
        include("con_DB.php");
        $ql="SELECT * FROM `goods`";
        
        echo "Query: ".$ql."<br><br><hr>";
        
        $enc=mysqli_query($cons, "SET Names 'utf-8'");
        $res=mysqli_query($cons, $ql);
        $n=mysqli_num_rows($res);
        echo "# of recrods: ".$n. "<br>";
        
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>name</th>";
        echo "<th>shoes</th>";
        echo "<th>img</th>";
        
        while($meta=mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>". $meta['G-name']. "</td>";
            echo "<td>". $meta['G-money']. "</td>";
            echo "<td><img src='../img/". $meta['G-photo'] .".jpg' width = 50px></td>";
            
        }
        mysqli_close($cons);
        
        ?>
    </body>


</html>