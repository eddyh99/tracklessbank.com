    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url() ?>assets/js/adm/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- AUTO NUMERIC -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.8.2/autoNumeric.js"></script>

    <?php
    if (isset($extra)) {
        $this->load->view($extra);
    }
    ?>

    <script>
$(".money-input").autoNumeric('init', {
    aSep: ',',
    aDec: '.',
    aForm: true,
    vMax: '99999999999.99',
    vMin: '0.00'
});

function input(ele) {
    var amount = parseFloat(ele.value);
    $(ele).change(function() {
        if (isNaN(amount) == isNaN()) {
            $(this).val(parseFloat(0).toFixed(2));
        } else {
            var news = amount.toLocaleString("en-US", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            $(this).val(news);
        }
    });
}
    </script>

    </body>

    </html>