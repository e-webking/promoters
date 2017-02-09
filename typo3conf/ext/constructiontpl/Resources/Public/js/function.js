(function($) {
     $("div#menu").mmenu({
       "offCanvas": {
            position: "right"
       }
    });
    $(".modal").on("hidden.bs.modal", function() {
        $(this).removeData('bs.modal');
    });
    
//    $('#dtid').DataTable();

    $('.ls-modal').on('click', function(e){
      e.preventDefault();
      var remote_content = e.currentTarget.href;
      $('#modal-response').on('show.bs.modal', function () {
          $(this).find('.modal-content').load(remote_content);
      }).modal('show');
      
      return false;
    });
})(jQuery);