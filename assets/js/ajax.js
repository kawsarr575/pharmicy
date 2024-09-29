


// Delete category 
$(document).on("click","table.category .delete-btn",function(){  
    if (confirm("Are you sure delete this ?")) {  
         var id = $(this).attr('data-id');  
         $.ajax({  
              url : "../includes/ajax.php",  
              type:"POST",  
              cache:false,  
              data:{cat_id:id},
              success:function(data){ }
         });
         
         var tr = $(this).closest("tr");
         tr.css("background-color", "#FF3700");
         tr.fadeOut(1000, function() {
             tr.remove();
         });
    }  
}); 
// End delete category

// Delete vendor 
$(document).on("click","table.vendor .delete-btn",function(){  
    if (confirm("Are you sure delete this ?")) {  
         var id = $(this).attr('data-id');   
         $.ajax({  
              url : "../includes/ajax.php",
              type:"POST",  
              cache:false,  
              data:{user_id:id},
              success:function(data){ }
         });

         var tr = $(this).closest("tr");
         tr.css("background-color", "#FF3700");
         tr.fadeOut(1000, function() {
             tr.remove();
         });
    }  
});
// End delete vendor


// Delete Product
$(document).on("click","table.product .delete-btn",function(){  
    if (confirm("Are you sure delete this ?")) {  
         var id = $(this).attr('data-id');  
         $.ajax({  
              url : "../includes/ajax.php", 
              type:"POST",  
              cache:false,  
              data:{product_id:id},
              success:function(data){ }
         });

         var tr = $(this).closest("tr");
         tr.css("background-color", "#FF3700");
         tr.fadeOut(1000, function() {
             tr.remove();
         });
    }  
});
// End delete product

// Delete Location
$(document).on("click","table.location .delete-btn",function(){  
    if (confirm("Are you sure delete this ?")) {  
         var id = $(this).attr('data-id');   
         $.ajax({  
              url : "../includes/ajax.php", 
              type:"POST",  
              cache:false,  
              data:{location_id:id},
              success:function(data){ }
         });

         var tr = $(this).closest("tr");
         tr.css("background-color", "#FF3700");
         tr.fadeOut(1000, function() {
             tr.remove();
         });
    }  
});
// End delete Location

// Delete Order
$(document).on("click","table.order .delete-btn",function(){  
    if (confirm("Are you sure delete this ?")) {  
         var id = $(this).attr('data-id');   
         $.ajax({  
              url : "../includes/ajax.php", 
              type:"POST",  
              cache:false,  
              data:{order_id:id},
              success:function(data){ }
         });

         var tr = $(this).closest("tr");
         tr.css("background-color", "#FF3700");
         tr.fadeOut(1000, function() {
             tr.remove();
         });
    }  
});
// End delete Order