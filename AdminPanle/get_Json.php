<?php

    $conn = mysqli_connect("localhost", "root", "", "shohoz_bus");

    //Bus Json ................
    $busSql = "SELECT * From buses";
    $resultBookingSql = mysqli_query($conn, $busSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    $busJson = json_encode($arr);


    // Admin JSON
    $adminSql = "SELECT * from users";
    $resultAdminSql = mysqli_query($conn, $adminSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultAdminSql))
        $arr[] = $row;
    $adminJson = json_encode($arr);

?>