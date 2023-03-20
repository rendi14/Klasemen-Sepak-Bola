<?= $this->extend('/Layout/template');  ?>

<?= $this->section('content'); ?>

<!-- BEGIN: Content -->
<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Data Hasil Pertandingan Sepakbola
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-10">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button data-tw-toggle="modal" data-tw-target="#large-modal-size-preview" class=" btn btn-primary shadow-md mr-2">Tambah Satu Pertandingan</button>

            <div class="w-60 sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="relative text-slate-500">
                    <button data-tw-toggle="modal" data-tw-target="#large-modal-size-previewbanyak" class=" btn btn-warning shadow-md mr-2">Tambah Banyak Pertandingan</button>
                </div>
            </div>
        </div>

        <!-- BEGIN: Large Modal Content -->
        <div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <h2 class="modal-body p-5 font-medium text-base mr-auto">Masukan Satu Pertandingan </h2>
                    <form action="/tambahpertandingan" id="inputpertandingansatu" method="post" class="theme-form" enctype="multipart/form-data">
                        <div class="overflow-x-auto">
                            <table class="table -mt-2 table-auto border-collapse ">
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="klubasatu" id="klubasatu" class="form-select w-52 h-10" aria-label="select example">
                                                <option selected="" disabled="" value="">-- Pilih Klub 1 --</option>
                                                <?php
                                                foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skora" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" placeholder="Skor Klub 1">
                                        </td>

                                        <td>
                                            <H3 class="pt-2">
                                                <b>
                                                    VS
                                                </b>
                                            </H3>
                                        </td>

                                        <td>
                                            <select name="klubbsatu" id="klubbsatu" class="form-select w-52 h-10" aria-label="select example">
                                                <option selected="" disabled="" value="">-- Pilih Klub 2 --</option>

                                                <?php foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skorb" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" placeholder="Skor Klub 2">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 ">Kembali</button>
                            <button type="submit" class="btn btn-primary w-20">Simpan</button>
                        </div> <!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div> <!-- END: Large Modal Content -->


        <!-- BEGIN: Large Modal Content banyak -->
        <div id="large-modal-size-previewbanyak" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <h2 class="modal-body p-5 font-medium text-base mr-auto">Masukan Satu Pertandingan Atau Lebih </h2>

                    <form action="/simpanbanyak" method="post" id="inputpertandingan" class="theme-form" enctype="multipart/form-data">
                        <div class="overflow-x-auto">
                            <table class="table -mt-2 table-auto border-collapse ">
                                <tbody id="tabel_tambah">
                                    <tr>
                                        <td>
                                            <select name="kluba[]" class="form-select w-50 h-10" aria-label="select example">
                                                <option selected="" disabled="" value="">-- Pilih Klub 1 --</option>
                                                <?php
                                                foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skora[]" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" required placeholder="Skor Klub 1">
                                        </td>

                                        <td>
                                            <H3 class="pt-2">
                                                <b>
                                                    VS
                                                </b>
                                            </H3>
                                        </td>

                                        <td>
                                            <select name="klubb[]" class="form-select w-50 h-10" aria-label="select example">
                                                <option selected="" disabled="" value="">-- Pilih Klub 2 --</option>

                                                <?php foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skorb[]" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" required placeholder="Skor Klub 2">

                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary" id="btn_tambahform">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 ">Kembali</button>
                            <button type="submit" class="btn btn-primary w-20">Simpan</button>
                        </div> <!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div> <!-- END: Large Modal Content -->


    </div>

    <div class="overflow-x-auto pt-10">
        <table class="table  table-report -mt-2 table-auto border-collapse ">

            <?php $no = 1;
            foreach ($pertandingan as $data) : ?>
                <tbody>
                    <tr>
                        <td class="text-center font-bold">
                            <div>
                                <?= $data['kluba']; ?>
                            </div>
                        </td>

                        <td class="text-center">
                            <H3 class="pt-2 btn btn-primary w-16">
                                <b>
                                    <?= $data['skora']; ?>
                                    VS
                                    <?= $data['skorb']; ?>
                                </b>
                            </H3>
                        </td>

                        <td class="text-center font-bold">
                            <div>
                                <?= $data['klubb']; ?>
                            </div>
                        </td>

                    </tr>
                </tbody>
            <?php $no++;
            endforeach; ?>
        </table>
    </div>



    <!-- END: Content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        const inputpertandingansatu = document.getElementById('inputpertandingansatu')
        const klubasatu = document.getElementsByName('klubasatu')[0]
        const klubbsatu = document.getElementsByName('klubbsatu')[0]

        const checkinputsatu = (ev) => {
            if (klubasatu && klubbsatu && klubasatu.value == klubbsatu.value) {
                klubasatu.setCustomValidity("invalid")
                klubbsatu.setCustomValidity("invalid")

                $(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Klub 1 Dan Klub 2 Tidak Boleh Sama'
                    })
                });

                ev.preventDefault()
                ev.stopPropagation()
            } else {
                klubasatu.setCustomValidity("")
                klubbsatu.setCustomValidity("")
            }
        }

        inputpertandingansatu.addEventListener("change", checkinputsatu, false)
        inputpertandingansatu.addEventListener("submit", checkinputsatu, false)
    </script>

    <script>
        const inputpertandingan = document.getElementById('inputpertandingan')
        const kluba = document.getElementsByName('kluba[]')[0]
        const klubb = document.getElementsByName('klubb[]')[0]

        const checkinput = (ev) => {
            if (kluba && klubb && kluba.value == klubb.value) {
                kluba.setCustomValidity("invalid")
                klubb.setCustomValidity("invalid")

                $(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Klub 1 Dan Klub 2 Tidak Boleh Sama'
                    })
                });

                ev.preventDefault()
                ev.stopPropagation()
            } else {
                kluba.setCustomValidity("")
                klubb.setCustomValidity("")
            }
        }

        inputpertandingan.addEventListener("change", checkinput, false)
        inputpertandingan.addEventListener("submit", checkinput, false)
    </script>

    <script>
        // Ketika document sudah ready
        $(document).ready(function() {
            console.log($('#tabel_tambah').length);

            var jumlah = 1;
            var jumlahskora = 1;

            var jumlahklubb = 2;
            var jumlahskorb = 2;

            $('#btn_tambahform').click(function(e) {
                // Append form baru
                $('#tabel_tambah').append(
                    `<tr>
                                        <td>
                                            <select name="kluba[]" class="form-select w-50 h-10" aria-label="select example">
                                                <option value="">Pilih Klub ` + ((++jumlah * 2) - 1) + `</option>
                                                <?php
                                                foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skora[]" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" placeholder="Skor Klub ` + ((++jumlahskora * 2) - 1) + `">
                                        </td>

                                        <td>
                                            <H3 class="pt-2">
                                                <b>
                                                    VS
                                                </b>
                                            </H3>
                                        </td>

                                        <td>
                                            <select name="klubb[]" class="form-select w-50 h-10" aria-label="select example">
                                                <option value="">Pilih Klub ` + ((++jumlahklubb * 2) - 2) + `</option>
                                                <?php foreach ($klub as $klubdata) : ?>
                                                    <option value=<?= $klubdata['id']; ?>><?= $klubdata['Nama_klub']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>

                                        <td>
                                            <input name="skorb[]" id="modal-form-3" type="number" class="form-control-noborder w-24 h-6" placeholder="Skor Klub ` + ((++jumlahskorb * 2) - 2) + `">
                                        </td>

                                    <td>
                                        <button type="button" class="btn btn-danger" id="btn_hapusform">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                    </tr>
                                    
                                    
            `)
            })
        })

        // Pada dokumen jika ada, dan jalankan ketika btn_hapusform ditekan
        $(document).on('click', '#btn_hapusform', function(e) {
            $(this).parents('tr').remove(); +
            jumlah - 3;
        })
    </script>
    <?= $this->endSection() ?>