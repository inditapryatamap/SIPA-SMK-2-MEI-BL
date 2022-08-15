</div>
</div>
<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
    <div class="kt-footer__copyright">
       {{ date("Y") }}&nbsp;&copy;&nbsp;<a href="#" target="_blank"
          class="kt-link">SIPA - Sistem Pengajuan Tempat PKL</a>
    </div>
    <div class="kt-footer__menu">
       <a href="https://teknokrat.ac.id/" target="_blank"
          class="kt-footer__menu-link kt-link">Universitas Teknokrat Indonesia</a>
    </div>
 </div>
</div>
</div>
</div>
<div id="kt_scrolltop" class="kt-scrolltop">
<i class="fa fa-arrow-up"></i>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@include('pembimbing-lapang.frame.script')
<script src="./assets/js/demo1/pages/components/extended/sweetalert2.js" type="text/javascript"></script>
<script>
   function logout() {
      swal.fire({
            title: 'Apakah Anda ingin keluar SIPA ?',
            text: "Anda harus login kembali untuk masuk ke sistem",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Keluar',
            cancelButtonText: 'Batalkan',
            reverseButtons: true
      }).then(function(result){
            if (result.value) {
               swal.fire(
                  'Berhasil',
                  'Mengarahkan ke halaman login',
                  'success'
               )
               window.location.href = window.location.origin + '/logout'
            } else if (result.dismiss === 'cancel') {
               swal.fire(
                  'Dibatalkan',
                  'Logout dibatalkan',
                  'error'
               )
            }
      });
   }
</script>
</body>
</html>