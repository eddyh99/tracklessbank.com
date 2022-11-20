<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<!-- Form JS -->
<script src="<?= base_url() ?>assets/js/form.js"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8TYM4CBBPQ"></script>
<?php
if (isset($extra)){
    $this->load->view($extra);
}
?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8TYM4CBBPQ');
</script>
</body>

</html>