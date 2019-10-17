(function ($) {
    $(function () {
	   //All the backend js for the plugin 
       
       /*
       Settings Tabs Switching 
       */
       $('.tfa-tabs-trigger').click(function(){
           $('.tfa-tabs-trigger').removeClass('tfa-active-trigger');
           $(this).addClass('tfa-active-trigger');
          var attr_id = $(this).attr('id');
          var arr_id = attr_id.split('-');
          var id = arr_id[1];
          $('.tfa-single-board-wrapper').hide();
          $('#tfa-'+id+'-board').show();
       });
       
	});
}(jQuery));