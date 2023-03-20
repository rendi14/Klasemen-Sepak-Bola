<?= $this->extend('/Layout/template');  ?>

<?= $this->section('content'); ?>

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-xl font-semibold mt-10">
        Klasemen Sepakbola
    </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">


        <!-- BEGIN: Data Klasemen -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible pt-5">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">No</th>
                        <th class="text-center whitespace-nowrap">Klub</th>
                        <th class="text-center whitespace-nowrap">Ma</th>
                        <th class="text-center whitespace-nowrap">Me</th>
                        <th class="text-center whitespace-nowrap">S</th>
                        <th class="text-center whitespace-nowrap">K</th>
                        <th class="text-center whitespace-nowrap">GM</th>
                        <th class="text-center whitespace-nowrap">GK</th>
                        <th class="text-center whitespace-nowrap">Point</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($klasemen as $klasemendata) :
                    ?>
                        <tr class="intro-x">
                            <td class="w-10 text-center font-medium"><?= $nomor; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Nama_klub']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Main']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Menang']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Seri']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Kalah']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Goal_Menang']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Goal_Kalah']; ?></td>
                            <td class="text-center font-medium"><?= $klasemendata['Point']; ?></td>
                        </tr>
                    <?php $nomor++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data Klasemen -->
    </div>
</div>
<!-- END: Content -->
<?= $this->endSection() ?>