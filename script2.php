<script>

$(function () {
    
    $('.select2').select2()({
      allowClear: true,
      tags: true
    })

  
  })


    function place(){
        var place = $('#PlaceCode').val();
        // alert("dd");
        $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{place:place,PlaceCode:"PlaceCode"},
          success: function(response){    
          document.getElementById('Subplace').innerHTML = response;   
         }
        
        });

    }

    function otmain(){
        var otmain = $("#PlaceCode").val();
        
      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{otmain:otmain,Otmain:"Otmain"},
          success: function(response){ 
          document.getElementById('otmain').innerHTML = response;   
         }
        });


    }

    function otmain2(){
        var otmain2 = $("#otmain").val();

      $.ajax({
        type: "POST",
        url: "backphp.php",
        data:{otmain2:otmain2,Otmain2:"Otmain2"},
          success: function(response){
          document.getElementById('otmain2').innerHTML = response;   
         }
        });


    }

    function otmain3(){
        var place = $('#PlaceCode').val();
        var otmain = $('#otmain').val();
        var otmain3 = $('#otmain2').val();

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

    function ppot(){
      var place = $('#PlaceCode').val();
      var otmain = $('#otmain').val();
      var otmain2 = $('#otmain2').val();
      var otmain3 = $('#otmain3').val();

      // console.log(place);
      // console.log(otmain);
      // console.log(otmain2);
      // console.log(otmain3);

      $.ajax({
        type: "POST",
        url: "layout2.php",
        dataType:"html",
        data:{place:place,otmain:otmain,otmain2:otmain2,otmain3:otmain3,Otmain4:"Otmain4"},
          success: function(response){

           document.getElementById('show').innerHTML = response;
           
         }
        });

    }

    
    function mount(){
      var mount = $('#mount').val();
      
        $.ajax({
          type: "POST",
          url: "layout2.php",
          data : {mount:mount,Mount:"Mount"},
          success: function(response){
            document.getElementById('date').innerHTML=response
            
          }
        });

    }

    function qty(){
      var qtydate = document.getElementById('date').value;
      var place = $('#PlaceCode').val();
      var subplace = document.getElementById('Subplace').value;
      var otmain = $('#otmain').val();
      var otmain2 = $('#otmain2').val();
      var otmain3 = $('#otmain3').val();
      var qtymount = document.getElementById('mount').value;
      
      
      // var ot_bg = document.querySelector('#otmain3').getAttribute('bg');
      // var ot_en = document.querySelector('#otmain3').getAttribute('en');

      // console.log(qtymount);
      // console.log(place);
      // console.log(subplace);
      // console.log(otmain);
      // console.log(otmain2);
      // console.log(otmain3);
      // console.log(qtydate);

      // console.log(ot_bg);
      // console.log(ot_bg);


      $.ajax({
        type: "POST",
        url: "layout2.php",
        dataType:"html",
        data:{place:place,otmain:otmain,otmain2:otmain2,otmain3:otmain3,qtydate:qtydate,qtymount:qtymount,subplace:subplace,qty:"qty"},
          success: function(response){
            // console.log(response);
            document.getElementById('show').innerHTML = response;
            

         }
        });
     


    }

    

    function ppot1(count){
      var ot_qty = $('#data2'+ count).val();
      var idoth = "00000000000";
      var pid = $('#data2'+ count).attr('Npid');
      var place = $('#PlaceCode').val();
      var subplace = $('#Subplace').val();
      var ot_type = $('#otmain3').val();
      var ot_year = $('#mount').val();
      var ot_rate = $('#data2'+ count).attr('Mpid');
      var ot_date = $('#date').val();
      var amount = ot_qty * ot_rate;
      var mainposition = $('#data2'+ count).attr('Opid');
      var ot_hour = $('#data2'+ count).attr('Qpid');
      var hind = 'N';
      var Cal_flag = 'N';
      var use_pay_flag = 'N';
      var MatchPay_FLAG = 'N';
      var MatchPay_FLAG_Group = 'N';
      var Close_System_Flag = 'N';
      var ot_bg = $('#data2'+ count).attr('NBG');
      var ot_en = $('#data2'+ count).attr('NEN');

      // console.log(ot_qty);
      // console.log(idoth);
      // console.log(pid);
      // console.log(place);
      // console.log(subplace);
      // console.log(ot_type);
      // console.log(ot_year);
      // console.log(ot_rate);
      // console.log(ot_date);
      // console.log(amount);
      // console.log(ot_bg);
      // console.log(ot_en);
     


      $.ajax({
        type: "POST",
        url: "layout2.php",
        data: {ot_qty:ot_qty,idoth:idoth,pid:pid,place:place,subplace:subplace,ot_type:ot_type,ot_year:ot_year,ot_rate:ot_rate,ot_date:ot_date,ot_date:ot_date,amount:amount
          ,mainposition:mainposition,ot_hour:ot_hour,hind:hind,Cal_flag:Cal_flag,use_pay_flag:use_pay_flag,MatchPay_FLAG:MatchPay_FLAG,MatchPay_FLAG_Group:MatchPay_FLAG_Group,Close_System_Flag:Close_System_Flag,ot_bg:ot_bg,ot_en:ot_en,ppot1:"ppot1"},
        success: function(response){ 

          // console.log(response); 

          if(response == 'y'){
            toastr.success('บันทึกเรียบร้อย', '', {timeOut: 1000}) 
          }else if(response == 'n'){
            toastr.error('เวลาตรงกัน', '', {timeOut: 1000})
          }else{
            toastr.error('บันทึกลมเหลว', '', {timeOut: 1000})
          }
             

        }


        });
    }

   
  
    
            


</script>