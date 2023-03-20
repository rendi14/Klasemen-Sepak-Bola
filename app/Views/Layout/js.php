    <!-- BEGIN: JS Assets-->
    <script src="../dist/js/app.js"></script>
    <script src="../dist/js/main.js"></script>

    <!-- alert -->
    <script src="../dist/alert/sweetalert2.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Alert Content -->
    <script>
        $(function() {
            <?php if (session()->has("success")) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '<?= session("success") ?>'
                })
            <?php } ?>
        });
    </script>

    <script>
        $(function() {

            <?php if (session()->has("error")) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session("error") ?>'
                })
            <?php } ?>
        });
    </script>

    <script>
        $(function() {

            <?php if (session()->has("warning")) { ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning!',
                    text: '<?= session("warning") ?>'
                })
            <?php } ?>
        });
    </script>

    <script>
        $(function() {

            <?php if (session()->has("info")) { ?>
                Swal.fire({
                    icon: 'info',
                    title: 'Hi!',
                    text: '<?= session("info") ?>'
                })
            <?php } ?>
        });
    </script>
    <!-- end alert -->
    </body>

    </html>