<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!--toastr-->
    <link rel="stylesheet" href="toastr.min.css" />

    <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <!-- Or for RTL support -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    

</head>
  <body>

    <div class="containner">
    <span id ="alert11">
    </div>
    
    </span>
    
    <br>
    <br>
    <br>

    <div class ="container">

      <select class="form-select"  id="PlaceCode" name="PlaceCode" aria-label="Default select example"  onchange="place();otmain()">
          <?php
          include 'connect.php';
          $sql = "SELECT Description,PlaceCode FROM tbl_place order by Description" ;
          $result = $conn->query($sql);
          ?>
            <option selected disabled id="">--กรุณาเลือก--</option>";
             <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?=$row['PlaceCode']?>"><?=$row['Description'] ?></option>
             <?php } ?>
    </select> 

    </div>

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="Subplace" name="Subplace" aria-label="Default select example" >
      <option selected value="0">ระบุหน่วยย่อย</option>";
    </select> 
    </div>

    
    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain" name="otmain" aria-label="Default select example"  onchange="otmain2();">
      <option selected  value="">เวรประจำเดือน</option>";  
    </select> 
    
    </div>

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain2" name="otmain2" aria-label="Default select example" onchange="otmain3();">
      <option selected value="">เจ้าหน้าที่</option>";
            
    </select> 
    </div>

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain3" name="otmain3" aria-label="Default select example" onchange="ppot()">
      <option selected value="">ประเภทเวร</option>";
            
    </select> 
    </div>
    

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="mount" name="mount" aria-label="Default select example" onchange="mount()">
      <?php 

        $txt_year = date('Y')+542;
        $txt_year1 = date('Y')+543;

      ?>
        <option selected value="0">--เลือกเดือน--</option>";
        <option value="<?=$txt_year."01" ?>"><?=$txt_year." / "."01"?></option>";
        <option value="<?=$txt_year."02" ?>"><?=$txt_year." / "."02"?></option>";
        <option value="<?=$txt_year."03" ?>"><?=$txt_year." / "."03"?></option>";
        <option value="<?=$txt_year."04" ?>"><?=$txt_year." / "."04"?></option>";
        <option value="<?=$txt_year."05" ?>"><?=$txt_year." / "."05"?></option>";
        <option value="<?=$txt_year."06" ?>"><?=$txt_year." / "."06"?></option>";
        <option value="<?=$txt_year."07" ?>"><?=$txt_year." / "."07"?></option>";
        <option value="<?=$txt_year."08" ?>"><?=$txt_year." / "."08"?></option>";
        <option value="<?=$txt_year."09" ?>"><?=$txt_year." / "."09"?></option>";
        <option value="<?=$txt_year."10" ?>"><?=$txt_year." / "."10"?></option>";
        <option value="<?=$txt_year."11" ?>"><?=$txt_year." / "."11"?></option>";
        <option value="<?=$txt_year."12" ?>"><?=$txt_year." / "."12"?></option>";
        <option value="<?=$txt_year1."01" ?>"><?=$txt_year1." / "."01"?></option>";
        <option value="<?=$txt_year1."02" ?>"><?=$txt_year1." / "."02"?></option>";
        <option value="<?=$txt_year1."03" ?>"><?=$txt_year1." / "."03"?></option>";
        <option value="<?=$txt_year1."04" ?>"><?=$txt_year1." / "."04"?></option>";
        <option value="<?=$txt_year1."05" ?>"><?=$txt_year1." / "."05"?></option>";
        <option value="<?=$txt_year1."06" ?>"><?=$txt_year1." / "."06"?></option>";
        <option value="<?=$txt_year1."07" ?>"><?=$txt_year1." / "."07"?></option>";
        <option value="<?=$txt_year1."08" ?>"><?=$txt_year1." / "."08"?></option>";
        <option value="<?=$txt_year1."09" ?>"><?=$txt_year1." / "."09"?></option>";
        <option value="<?=$txt_year1."10" ?>"><?=$txt_year1." / "."10"?></option>";
        <option value="<?=$txt_year1."11" ?>"><?=$txt_year1." / "."11"?></option>";
        <option value="<?=$txt_year1."12" ?>"><?=$txt_year1." / "."12"?></option>";
        
        
              
   
    </select> 
    </div>
    
    <br>
    <br>
    <br>
      <div class="container">
        <select class = "form-select" id = "date" onchange="qty();">
        <option selected value="">วัน</option>
        </select>
      </div>


      <br>
      <br>
    <div class ="container" id="show"  name="show">
     
    </div>

  
    
      

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- toastr -->
    <script src="toastr.min.js"></script>
    <!-- Scripts select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

      
    <?php include "script2.php" ?>
  </body>
</html>