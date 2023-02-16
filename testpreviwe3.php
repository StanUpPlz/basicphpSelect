<?php

$main_dept = $_POST["main_dept"];
    $list_maindept = "SELECT a.*
                        FROM tbl_place_detail a
                        WHERE a.PlaceCode = '".$main_dept."'
                        AND a.Cancel = 'N'
                        ORDER BY a.PlaceCode ASC";
    $qry_maindept =  mysqli_query($link_pay,$list_maindept);
    $num_rows = mysqli_num_rows($qry_maindept);
    if($num_rows>0){
    echo "<option value='0'>กรณีไม่ระบุหน่วยย่อย</option>";}
    while($row1 = mysqli_fetch_array($qry_maindept,MYSQLI_ASSOC))
    {
      echo "<option value='".trim($row1["SubPlaceCode"])."'>".trim($row1["SubDescription"])."</option>";
    }

    ?>