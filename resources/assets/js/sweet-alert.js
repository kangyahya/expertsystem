'use strict';

(function () {
  $('.show_confirm').click(function(event){
    const form =  $(this).closest("form");
    const name = $(this).data("name");
    event.preventDefault();
    Swal({
      title: `Are you sure you want to delete this record?`,
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
})();
