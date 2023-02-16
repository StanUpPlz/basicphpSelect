<?php 
include "connect.php";

if(isset($_POST['Otmain4']) && $_POST['Otmain4'] == 'Otmain4'){
    $place = $_POST['place'];
    $otmain = $_POST['otmain'];
    $otmain2 = $_POST['otmain2'];
    $otmain3 = $_POST['otmain3'];
    

    // echo ($place);
    // echo ($otmain);
    // echo ($otmain2);
    // echo ($otmain3);

  $sql = "SELECT 
	CONCAT(FirstName,' ',LastName)as Fname ,p.PID,ot1.OT_TIME_BG,ot1.OT_TIME_END,ot2.OT_RATE,p.MainPositionCode,ot1.OT_QTY_HOUR,ot1.TYPE_SDT,ot1.OT_TIME_BG,ot1.OT_TIME_END
FROM
	personel p
	LEFT JOIN ot_sdt1_lookup ot1 ON p.Place = ot1.Place
	LEFT JOIN ot_sdt2_lookup ot2 ON ot1.OT_SDT1_GROUP_CODE = ot2.OT_SDT1_GROUP_CODE 
WHERE
			ot1.HIDE = 'N' 
	AND ot1.Flag_del = 'N' 
	AND ot2.HIDE = 'N' 
	AND ot2.Flag_del = 'N'
	AND p.Place = '".$place."'
	AND ot1.OT_MAIN1_CODE ='".$otmain."'
	AND OT_MAIN2_CODE ='".$otmain2."'
	AND ot1.OT_SDT1_GROUP_CODE = '".$otmain3."'	
    GROUP BY Fname ASC ";
    
    $result = $conn->query($sql); 
    // $result = $result->fetch_assoc();  
    // $row = array();
    // while ($row = $result->fetch_all()) {
    //     $row = $row;
    //     $row = json_encode($row);
    //     echo $row;
    // }

                    //echo '<input type="text" class="form-control" id="data2" value ="" placeholder="ลงเวร" onchange="ppot1()">';
					echo'<table width="80%" class="table table-striped table-bordered table-hover">';		
						echo '<thead>';
						echo '<tr class="info">';
							echo'<th>ID</th>';
                            echo'<th>ชื่อ</th>';
                            echo'<th>ลงเวร</th>';
						echo'</tr>';
						echo'</thead>';					
						echo'<tbody>';
                        $count = 1;
						while($row = $result->fetch_assoc()){
						echo'<tr>';
							    echo'<td>';
                                echo $row['PID'];
                                echo '</td>';
                                echo'<td>';
                                echo $row['Fname'];
                                echo  '</td>';
                                echo'<td>';
                                echo '<input type="text" class="form-control '.$row['PID'].'" count="'.$count.'" id="data2'.$count.'" placeholder="ลงเวร" NEN="'.$row['OT_TIME_END'].'" NBG="'.$row['OT_TIME_BG'].'" Npid="'.$row['PID'].'" Mpid="'.$row['OT_RATE'].'" Opid="'.$row['MainPositionCode'].'" Qpid="'.$row['OT_QTY_HOUR'].'" Ppid="'.$row['TYPE_SDT'].'" onchange="ppot1('.$count.');">';
                                echo  '</td>';
                                echo'</tbody>';					
							echo'</tr>';					
                            $count ++;};
                            
}  


if (isset($_POST['qty']) && $_POST['qty'] =='qty') {

    $place = $_POST['place'];
    $subplace =$_POST['subplace'];
    $otmain = $_POST['otmain'];
    $otmain2 = $_POST['otmain2'];
    $otmain3 = $_POST['otmain3'];
    $otmount = $_POST['qtymount'];
    $otdate = $_POST['qtydate'];

 $sq = "SELECT DISTINCT
	ot1.OT_TIME_BG,
	ot1.OT_TIME_END,
	ot1.OT_SDT1_GROUP_CODE 
FROM
	personel p
	LEFT JOIN ot_sdt1_lookup ot1 ON p.Place = ot1.Place
	LEFT JOIN ot_sdt2_lookup ot2 ON ot1.OT_SDT1_GROUP_CODE = ot2.OT_SDT1_GROUP_CODE 
WHERE
	ot1.HIDE = 'N' 
	AND ot1.Flag_del = 'N' 
	AND ot2.HIDE = 'N' 
	AND ot2.Flag_del = 'N' 
	AND p.Place = '".$place."' 
	AND ot1.OT_MAIN1_CODE = '".$otmain."' 
	AND OT_MAIN2_CODE = '".$otmain2."' 
	AND ot1.OT_SDT1_GROUP_CODE = '".$otmain3."'";

    $result1 = $conn->query($sq);

    // $bg;
    // $en;

    while($row1 = $result1->fetch_assoc()){
        $bg =  $row1['OT_TIME_BG'];
        $en = $row1['OT_TIME_END'];
    } 
    
    // echo $bg;
    // echo $en;
    
    
    



    $sql = "SELECT 
	CONCAT(FirstName,' ',LastName)as Fname ,p.PID,ot1.OT_TIME_BG,ot1.OT_TIME_END,ot2.OT_RATE,p.MainPositionCode,ot1.OT_QTY_HOUR,ot1.TYPE_SDT,ot1.OT_TIME_BG,ot1.OT_TIME_END,
	(SELECT OT_QTY FROM personel pe LEFT JOIN ot_d d ON pe.PID = d.PID WHERE OT_TYPE = '".$otmain3."' AND TIME_END ='".$en."' AND TIME_BG ='".$bg."' AND OT_DATE ='".$otdate."' AND pe.PID = p.PID LIMIT 1) AS qty
FROM
	personel p
	LEFT JOIN ot_sdt1_lookup ot1 ON p.Place = ot1.Place
	LEFT JOIN ot_sdt2_lookup ot2 ON ot1.OT_SDT1_GROUP_CODE = ot2.OT_SDT1_GROUP_CODE 
WHERE
			ot1.HIDE = 'N' 
	AND ot1.Flag_del = 'N' 
	AND ot2.HIDE = 'N' 
	AND ot2.Flag_del = 'N'
	AND p.Place = '".$place."'
	AND ot1.OT_MAIN1_CODE ='".$otmain."'
	AND OT_MAIN2_CODE ='".$otmain2."'
	AND ot1.OT_SDT1_GROUP_CODE = '".$otmain3."'	";
    
    $result = $conn->query($sql); 
   
  
					echo'<table width="80%" class="table table-striped table-bordered table-hover">';		
						echo '<thead>';
						echo '<tr class="info">';
							echo'<th>ID</th>';
                            echo'<th>ชื่อ</th>';
                            echo'<th>ลงเวร</th>';
						echo'</tr>';
						echo'</thead>';					
						echo'<tbody>';
                        $count = 1;
						while($row = $result->fetch_assoc()){
						echo'<tr>';
							    echo'<td>';
                                echo $row['PID'];
                                echo '</td>';
                                echo'<td>';
                                echo $row['Fname'];
                                echo  '</td>';
                                echo'<td>';
                                echo '<input type="text" class="form-control '.$row['PID'].'" count="'.$count.'" id="data2'.$count.'" placeholder="'.$row['qty'].'" NEN="'.$row['OT_TIME_END'].'" NBG="'.$row['OT_TIME_BG'].'" Npid="'.$row['PID'].'" Mpid="'.$row['OT_RATE'].'" Opid="'.$row['MainPositionCode'].'" Qpid="'.$row['OT_QTY_HOUR'].'" Ppid="'.$row['TYPE_SDT'].'" onchange="ppot1('.$count.')">';
                                echo  '</td>';
                                echo'</tbody>';					
							echo'</tr>';					
                            $count ++;};

    

    
   

}


if (isset($_POST['Mount']) && $_POST['Mount'] =='Mount') {
    $mount = $_POST['mount'];
    // echo ($mount);
    $sql = "SELECT  DISTINCT OT_DATE,RIGHT(OT_DATE,2) as dateot FROM ot_d WHERE left(OT_DATE,6) = '".$mount."' ORDER BY dateot ASC";

    $result = $conn->query($sql);
    if($result>0){
        echo '<option value="0">เลือกวัน</option>';
    } 
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value ="'.$row["OT_DATE"].'">'.$row["dateot"].'</option>';
    }
}


if (isset($_POST['ppot1']) && $_POST['ppot1'] =='ppot1') {
    $ot_qty = $_POST['ot_qty'];
    $idoth = $_POST['idoth'];
    $pid = $_POST['pid'];
    $place = $_POST['place'];
    $subplace = $_POST['subplace'];
    $ot_type = $_POST['ot_type'];
    $ot_year = $_POST['ot_year'];
    $ot_rate = $_POST['ot_rate'];
    $ot_date = $_POST['ot_date'];
    $amount = $_POST['amount'];
    $mainposition = $_POST['mainposition'];
    $ot_hour = $_POST['ot_hour'];
    $hind = $_POST['hind'];
    $Cal_flag = $_POST['Cal_flag'];
    $use_pay_flag = $_POST['use_pay_flag'];
    $MatchPay_FLAG = $_POST['MatchPay_FLAG'];
    $MatchPay_FLAG_Group = $_POST['MatchPay_FLAG_Group'];
    $Close_System_Flag = $_POST['Close_System_Flag'];
    $ot_bg = $_POST['ot_bg'];
    $ot_en = $_POST['ot_en'];

    // echo $ot_bg;


    
    if($ot_qty == '1'|| $ot_qty == '0'){

        $ot_bg1 = (int)$ot_bg;
        $ot_en1 = (int)$ot_en;

    //เช็คเวลา
        $sqlc = "SELECT
        PID,OT_QTY,TIME_BG,TIME_END
    FROM
      ot_d 
    WHERE
        PID = '".$pid."'
        AND PLACE = '".$place."'  
        AND OT_DATE = '".$ot_date."' 
         '";
        $resualC = $conn->query($sqlc);
        if (!empty($resualC)){
            while($rowc = $resulC->fetch_assoc()){
            $r_bg = (int)$rowc['TIME_BG'];
            $r_en = (int)$rowc['TIME_END'];

            if($r_bg <= $ot_en1 && $r_en >=  $ot_bg1){
                echo "n";
                exit();
                }
        }
        }

        //
                    $sql1 = "SELECT
                    PID,OT_QTY,TIME_BG,TIME_END
                FROM
                ot_d 
                WHERE
                    PID = '".$pid."'
                    AND PLACE = '".$place."' 
                    AND OT_TYPE = '".$ot_type."' 
                    AND OT_DATE = '".$ot_date."' 
                    AND TIME_BG = '".$ot_bg."'
                    AND TIME_END = '".$ot_en."'";

                        $resual = $conn->query($sql1);
                        while($row = $resual -> fetch_assoc()){
                            $r = $row['PID'];
                        }
                        if(empty($r)){
                            $sql = "INSERT INTO ot_d(id_ot_h,PID,MainPositionCode,YEARMONTH,PLACE,SubPlaceCode,OT_TYPE,TIME_BG,TIME_END,OT_RATE,OT_DATE,OT_QTY,OT_AMOUNT,OT_QTY_HOUR,Cal_flag,use_pay_flag,MatchPay_FLAG,MatchPay_FLAG_Group,Close_System_Flag,HIDE)
                                    VALUES('$idoth','$pid','$mainposition','$ot_year','$place','$subplace','$ot_type','$ot_bg','$ot_en',' $ot_rate','$ot_date','$ot_qty','$amount','$ot_hour','$Cal_flag','$use_pay_flag','$MatchPay_FLAG','$MatchPay_FLAG_Group','$Close_System_Flag','$hind')";
                                if (mysqli_query($conn, $sql)) {
                                    echo "y";
                                } else {
                                    echo "";
                                }
                        }else{ 
                                $sql1 = "UPDATE ot_d SET OT_QTY = '".$ot_qty."' WHERE PID = '".$pid."' AND PLACE = '".$place."' AND OT_TYPE = '".$ot_type."' AND OT_DATE = '".$ot_date."' AND TIME_BG = '".$ot_bg."' AND TIME_END = '".$ot_en."'";
                            if($conn->query($sql1)){
                                echo "y";
                                } else {
                                    echo "";
                                }
                        
                            
                        }
                            

                
            
          
            
        }

}

?>