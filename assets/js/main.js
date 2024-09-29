


$('.msg-hide').fadeOut(5000);

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

/* ========= search location with ajax=========== */
$('#locationsearch').keyup(function(){
    var live = $(this).val();
    if(live != ''){
      $.ajax({
        url:"includes/search_ajax.php",
        method:"POST",
        data:{search:live},
        dataType:"text",
        success:function(data){
          $("#statuslive").html(data);
        }
      });
    }else{
      $("#statuslive").html("data not found");
      $("#statuslive").html("");
    }
  });
  /*========= End search location with ajax ==============*/
  
  /* ========= search Pharmacy with ajax=========== */
    $('#pharmacySearch').keyup(function(){
        var live = $(this).val();
        if(live != ''){
        $.ajax({
            url:"includes/search_vendor.php",
            method:"POST",
            data:{search_pharmacy:live},
            dataType:"text",
            success:function(data){
            $("#pharmacyResultShow").html(data);
            }
        });
        }else{
        $("#pharmacyResultShow").html("data not found");
        $("#pharmacyResultShow").html("");
        }
    });
  /*========= End search Pharmacy with ajax ==============*/ 
  
  /* ========= search Medicine with ajax=========== */
    $('#medicinesearch').keyup(function(){
        var live = $(this).val();
        if(live != ''){
        $.ajax({
            url:"includes/search_medicine.php",
            method:"POST",
            data:{search_medicine:live},
            dataType:"text",
            success:function(data){
            $("#statuslivemedicine").html(data);
            }
        });
        }else{
        $("#statuslivemedicine").html("data not found");
        $("#statuslivemedicine").html("");
        }
    });
  /*========= End search Medicine with ajax ==============*/

    
    
    

   

