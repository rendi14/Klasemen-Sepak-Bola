<?= $this->extend('/Layout/template');  ?>

<?= $this->section('content'); ?>

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-xl font-semibold mt-10">
        Klub Sepakbola
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" class=" btn btn-primary shadow-md mr-2">Tambah Data Klub</button>


        </div>

        <!-- BEGIN: Data Klub -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger">
                    !!!! Ada Kesalahan Input Data Yaitu :
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }
            ?>

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">No</th>
                        <th class="text-center whitespace-nowrap">Nama Klub</th>
                        <th class="text-center whitespace-nowrap">Kota Klub</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($klub as $klubdata) :
                    ?>
                        <tr class="intro-x">
                            <td class="w-10 text-center font-medium"><?= $nomor; ?></td>
                            <td class="text-center font-medium"><?= $klubdata['Nama_klub']; ?></td>
                            <td class="text-center font-medium"><?= $klubdata['Kota_klub']; ?></td>
                        </tr>
                    <?php $nomor++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data Klub -->
    </div>

    <!-- BEGIN: Modal Toggle -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <form action="/tambahklub" method="post" class="theme-form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Form Tambah Data Klub</h2>
                    </div> <!-- END: Modal Header -->

                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label font-medium">Nama Klub</label>
                            <input name="Nama_klub" id="modal-form-1" type="text" class="form-control" placeholder="Persib">
                        </div>
                        <div class="col-span-12 sm:col-span-6"> <label for="modal-form-3" class="form-label font-medium pt-5">Kota Klub</label>
                            <input name="Kota_klub" id="modal-form-3" type="text" class="form-control" placeholder="Bandung">
                        </div>
                    </div>
                    <!-- END: Modal Body -->

                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Kembali</button>
                        <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    </div> <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->


</div>
<!-- END: Content -->
<?= $this->endSection() ?>