<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    

    

</head>
  <body>
    <br>
    <br>
    <br>

    <div class ="container">

      <select class="form-select" id="PlaceCode" name="PlaceCode" aria-label="Default select example" >
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
      <option selected value="">ระบุหน่วยย่อย</option>";
    </select> 
    </div>

    
    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain" name="otmain" aria-label="Default select example" >
      <option selected  value="">เวรประจำเดือน</option>";  
    </select> 
    
    </div>

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain2" name="otmain2" aria-label="Default select example" >
      <option selected value="">เจ้าหน้าที่</option>";
            
    </select> 
    </div>

    <br>
    <br>
    <br>
    <div class ="container">
    <select class="form-select" id="otmain3" name="otmain3" aria-label="Default select example" >
      <option selected value="">ประเภทเวร</option>";
            
    </select> 
    </div>
    
      <br>
      <br>
    <div class ="container" id="show"  name="show">
     
    </div>

    <!-- <div class="container">
					<table class="table">
						
						<thead>
							<tr>
							<th>ID</th>
							<th>ชื่อ</th>
							<th>ลงเวร</th>
							</tr>
						</thead>
						<tbody id="showvalue">
						
						</tbody>
					</table>
					<span id="test"></span>
				</div> -->

    

   <!-- <script type="text/javascript" src="script1.js"></> -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <?php include "script1.php" ?>
  </body>
</html>