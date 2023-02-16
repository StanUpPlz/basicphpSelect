
<script>
function select_sub_dept()
{
  var id_event = "subdept_get";
  var main_dept = $('#main_dept').val();
  document.getElementById('sub_dept').innerHTML = "<option value='0'>-------- กรุณาเลือก --------</option>";
  // document.getElementById('type_emp').innerHTML = "<option value=''>-------- กรุณาเลือก --------</option>";
  // document.getElementById('type_subot').innerHTML = "<option value=''>-------- กรุณาเลือก --------</option>";



          $.ajax({
               type: "POST",
               url: "duty_event.php",
               dataType:'html',
               data:{
                 id_event: id_event,
                 main_dept:main_dept
               },
               success: function (response) {

                 if(response=="")
                 {
                   document.getElementById("sub_dept").disabled  = true;
                 }
                 else
                 {
                   document.getElementById("sub_dept").disabled  = false;
                   document.getElementById('sub_dept').innerHTML = response;
                   $('#sub_dept').select2('open');
                 }
                 // get_dept_doc();
               }
          });
}
</script>