<script src="/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/assets/vendor/libs/popper/popper.js"></script>
<script src="/assets/vendor/js/bootstrap.js"></script>
<script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/assets/vendor/libs/hammer/hammer.js"></script>
<script src="/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="/assets/vendor/js/menu.js"></script>

<script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@livewireScripts
<script type="text/javascript">
  window.livewire.on('closeModal', () => {
      $('#createDataModal').modal('hide');
      $('#updateDataModal').modal('hide');
      $('#generarModal').hide();
       $('#updateModal').modal('hide');
  });
</script>
<script>
function closeAlert(event){
  let element = event.target;
  while(element.nodeName !== "BUTTON"){
    element = element.parentNode;
  }
  element.parentNode.parentNode.removeChild(element.parentNode);
  }
</script>

<script>
  Livewire.on('alert',function(title,message,icon){
       var timerInterval;
            Swal.fire({
              title: title,
              text: message,
              icon: icon,

              timer: 2000,
              customClass: {
                confirmButton: 'btn btn-primary'
              },
              buttonsStyling: false,
              willOpen: function () {
                timerInterval = setInterval(function () {

                }, 100);
              },
              willClose: function () {
                clearInterval(timerInterval);
              }
            }).then(function (result) {
              if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.timer
              ) {
                console.log('I was closed by the timer');
              }
      });
  })
</script>
@stack('scripts')


