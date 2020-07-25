(function($){
    


 $("#post_contact_form").submit(function(e){
      e.preventDefault();
      $(this).validate();
      var valid = $(this).valid();
      if (!valid) {
 				alert('Please fill the empty Fields');
 				 return false;
 				 }
 		else
 		{ 
      var serialize_form = jQuery(this).serialize();
                $.ajax({
                    type:"POST",
                    url: customscript.ajaxurl,
                    data: serialize_form,
                    dataType : 'json',
                      success: function (response) {
                        if (response.status) {
                          alert(response.message);
                          location.reload();
                        }
                        else{
                          alert(response.message);
                        }
                          },
                      error: function(errorThrown) { 
                          console.log(errorThrown);
                          alert('Oops Something Went Wrong');
                  }       
                  });
            }
  });


})(jQuery);









