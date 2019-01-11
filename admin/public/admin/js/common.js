$(document).ready(function(){
    
    $('a.delete').on('click',function(e){
        
        e.preventDefault();
        
       if(confirm("Do you want to delete this record?")){
           window.location.href = $(this).attr('name')
       }
       return false;
    });
    
});


