
<script > 
$(document).ready(function() {
   $('#PlaceCode').change(function(){
      var place = $(this).val();
      
      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{place:place,PlaceCode:"PlaceCode"},
          success: function(response){    
          document.getElementById('Subplace').innerHTML = response;   
         }
        });
   }
   );
  

  
  $('#PlaceCode').change(function(){
      var otmain = $(this).val();
      
      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{otmain:otmain,Otmain:"Otmain"},
          success: function(response){ 
          document.getElementById('otmain').innerHTML = response;   
         }
        });
   }
   );
 

 
  $('#otmain').change(function(){
      var otmain2 = $(this).val();
      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{otmain2:otmain2,Otmain2:"Otmain2"},
          success: function(response){
          document.getElementById('otmain2').innerHTML = response;   
         }
        });
   }
   );
  

  
  $('#otmain2').change(function(){
      var place = $('#PlaceCode').val();
      var otmain = $('#otmain').val();
      var otmain3 = $(this).val();
      
    //   alert(place);
    //   alert(otmain);
    //   alert(otmain3);

      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{place:place,otmain:otmain,otmain3:otmain3,Otmain3:"Otmain3"},
          success: function(response){ 
            // console.log(response);
            // alert(response);
            document.getElementById('otmain3').innerHTML = response;
            
         }
        });
   }
   );
  

 
  $('#otmain3').change(function(){
      var place = $('#PlaceCode').val();
      var otmain = $('#otmain').val();
      var otmain2 = $('#otmain2').val();
      var otmain3 = $(this).val();
      
    //   alert(place);
    //   alert(otmain);
    //   alert(otmain2);
    //   alert(otmain3);

      $.ajax({
        type: "POST",
        url: "layout2.php",
         dataType:"html",
        data:{place:place,otmain:otmain,otmain2:otmain2,otmain3:otmain3,Otmain4:"Otmain4"},
          success: function(response){

            // console.log(response);
            
          //   let text = response;
          //   let res = $.parseJSON(text);
          //  console.log(res);
          //  let  resu = "<input type='text' class='form-control' id='inputvalue' value='121'>";
            // for (let i = 0; i < res.length; i++) {
            //   resu += "<tr>"+nPID
            //    "<td>"+res[i][1]+"</td>"+
            //    "<td>"+res[i][0]+"</td>"+
            //    "<td><input type='text' class='form-control' id='inputvalue' nPID ="+res[i][1]+" ></input></td>"+
            //    "</tr>"
            // }

           document.getElementById('show').innerHTML = response;
           
           
             //console.log(resu);
         }
        });
        
   });



  
  // $('#inputvalue').change(function(){
  //    var input = $(this).val();
  //    console.log('1234');
  //     alert('kk');
  //   //   alert(otmain);
  //   //   alert(otmain3);

     
  //  }
  //  );

    // $("#data2").change(function(){
    //   alert('kk');

    // })
   
  });


</script>


