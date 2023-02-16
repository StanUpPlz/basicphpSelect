<?php
include 'connect.php';
if(isset($_POST['PlaceCode']) && $_POST['PlaceCode'] == 'PlaceCode'){
    $place = $_POST['place'];
    $sql = "SELECT * FROM tbl_place_detail de  WHERE de.PlaceCode = '".$place."'";
    $result = $conn->query($sql);
    if($result>0){
        echo '<option value="0">ไม่ระบุหน่วยย่อย</option>';
    }
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value ="'.$row["SubPlaceCode"].'">'.$row["SubDescription"].'</option>';
    }

}   

if(isset($_POST['Otmain']) && $_POST['Otmain'] == 'Otmain'){
    $otmain1 = $_POST['otmain'];
    $sql = "SELECT DISTINCT ot.OT_MAIN1_CODE FROM personel p LEFT JOIN ot_sdt1_lookup ot ON p.Place = ot.Place WHERE HIDE = 'N' AND Flag_del = 'N' AND p.Place = '".$otmain1."' AND HIDE = 'N'";
    $result = $conn->query($sql);
    if($result>0){
        echo '<option value="0">ไม่ระบุ</option>';
    } 
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value ="'.$row["OT_MAIN1_CODE"].'">'.$row["OT_MAIN1_CODE"].'</option>';
    }

}   

if(isset($_POST['Otmain2']) && $_POST['Otmain2'] == 'Otmain2'){
    $otmain2 = $_POST['otmain2'];
    $sql = "SELECT DISTINCT ot.OT_MAIN2_CODE FROM personel p LEFT JOIN ot_sdt1_lookup ot ON p.Place = ot.Place WHERE HIDE = 'N' AND Flag_del = 'N' AND p.Place = '".$place."' AND ot.OT_MAIN1_CODE = '".$otmain2."' AND HIDE = 'N'";
    $result = $conn->query($sql);
    if($result>0){
        echo '<option value="0">ไม่ระบุ</option>';
    } 
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value ="'.$row["OT_MAIN2_CODE"].'">'.$row["OT_MAIN2_CODE"].'</option>';
    }

}   

if(isset($_POST['Otmain3']) && $_POST['Otmain3'] == 'Otmain3'){
    $place = $_POST['place'];
    $otmain = $_POST['otmain'];
    $otmain3 = $_POST['otmain3'];

    // echo ($place);
    // echo ($otmain);
    // echo ($otmain3);
    $sql = "SELECT
    ot2.OT_SDT1_GROUP_CODE,CONCAT_WS(' / ',ot1.OT_SDT1_NAME,ot1.OT_QTY_HOUR,CONCAT(LEFT(ot1.OT_TIME_BG,2),'.00',' - ',LEFT(ot1.OT_TIME_END,2),'.00'))as OTTIME
    ,ot1.HIDE,ot1.OT_TIME_BG,ot1.OT_TIME_END
FROM
   ot_sdt1_lookup ot1
   LEFT JOIN ot_sdt2_lookup ot2 ON ot1.OT_SDT1_GROUP_CODE = ot2.OT_SDT1_GROUP_CODE 
WHERE
   ot1.Place = '".$place."' 
   AND ot1.OT_MAIN1_CODE = '".$otmain."' 
   AND ot1.OT_MAIN2_CODE = '".$otmain3."' 
   AND ot1.HIDE = 'N' 
   AND ot1.Flag_del = 'N' 
   AND ot2.HIDE = 'N' 
   AND ot2.Flag_del = 'N'
   GROUP BY OT_SDT1_GROUP_CODE ASC
   ";
    $result = $conn->query($sql);
    if($result>0){
        echo '<option value="0">ไม่ระบุ</option>';
    } 
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value ="'.$row["OT_SDT1_GROUP_CODE"].'" bg ="'.$row["OT_TIME_BG"].'" en="'.$row["OT_TIME_END"].'">'.$row["OTTIME"].'</option>';
    }

}  



 ?>
