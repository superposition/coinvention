/**
* Custom Js for image select in customizer
*
* @package Business_Page
*/
 jQuery(document).ready(function($) {
    $('#business-page-img-container li label img').click(function(){    	
        $('#business-page-img-container li').each(function(){
            $(this).find('img').removeClass ('business-page-radio-img-selected') ;
        });
        $(this).addClass ('business-page-radio-img-selected') ;
    });                    
});
