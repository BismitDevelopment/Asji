/* multi upload jquery */
$.noConflict();
jQuery( document ).ready(function( $ ) {
    // $(".btn-success").click(function(){ 
    //     var html = $(".clone").html();
    //     $(".increment").after(html);
    // });
    
    // $("body").on("click",".btn-danger",function(){ 
    //     $(this).parents(".control-group").remove();
    // });

    
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd'
    });
    CKEDITOR.replace( 'event_description' );
});


/* date picker jquery */

/* CKEditor jquery */