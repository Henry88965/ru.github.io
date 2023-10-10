<?php
    echo "檔案名稱：" . $_FILES['uf']['name'] . "<br>";
    echo "檔案名稱：" . $_FILES['uf']['type'] . "<br>";
    echo "檔案名稱：" . $_FILES['uf']['size'] . "<br>";
    echo "檔案名稱：" . $_FILES['uf']['tmp_name'] . "<br>";
    $dt = $_FILES['uf']['tmp_name'];
    $dn = $_FILES['uf']['name'];

    move_uploaded_file($dn. "." . $dn);
?>
