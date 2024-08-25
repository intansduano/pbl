<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <!-- Container for demo purpose -->

    <div class="container mx-auto mt-8 p-4">
        <!-- Video Player -->
        <div class="relative rounded-lg overflow-hidden mb-8 custom-card">
            <!-- Video -->
            <iframe class="w-full h-[55vh]" src="<?= $pbl->link ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <!-- Video Information -->
        <div class="flex items-center justify-between mb-4">
            <!-- Title -->
            <h2 class="text-3xl font-bold text-gray-800"><?= $pbl->judul_pbl ?></h2>
            <a href="<?= base_url('assets/file/media/' . $pbl->media); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                File Media
            </a>

            <!-- Share Button -->
        </div>
        <div class="text-gray-600 mb-4 font-semibold uppercase"><i class="fa-solid fa-location-dot"></i> <?= $pbl->nama_mitra ?></div>

        <!-- Owner Information -->
        <div class="flex mx-auto relative justify-beatwean">
            <a href="<?= base_url('user/' . $penulis->username); ?>">
                <div class="flex mb-4">
                    <!-- Owner Photo -->
                    <img src="<?= base_url('assets/images/profile/' . $penulis->profile); ?>" alt="Owner Photo" class="w-10 h-10 rounded-full mr-4">
                    <!-- Owner Name -->
                    <p class="text-gray-700 font-semibold"><?= $penulis->firstname ?> <?= $penulis->lastname ?></p>
                </div>
            </a>
            <!-- Video Statistics -->
            <div class="flex mb-8 absolute right-0">
                <!-- Like Count -->
                <button onclick="like();" class="flex items-center bg-white py-2 mr-2 hover:scale-105 transition-all duration-300 group px-4 rounded-md shadow-md">
                    <i id="button-like" class="fa-solid fa-thumbs-up <?= $liked ?> group-hover:text-blue-500"></i>
                    <span id="likes" class="text-gray-700 ml-2"><?= $like ?></span>
                </button>
            </div>
        </div>
        <div class="mt-3 mb-4">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <p class="mb-3"><?= $view ?> <i class="fas fa-eye"></i> - <span class="italic text-gray-600"><?= tanggal($pbl->tanggal); ?></span></p>
                </div>
                <div class="text-right">
                    <h6 class="text-gray-600 my-1 font-bold uppercase">Dosen Pengampuh:</h6>
                    <p class="text-gray-600 my-1 font-semibold uppercase"><?= $dosen->firstname . ' ' . $dosen->lastname ?></p>
                </div>
            </div>

            <div class="text-gray-600 my-1 font-bold uppercase">Mahasiswa Terlibat</div>

            <div class="relative overflow-x-auto text-center">
                <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center rounded-s-lg">
                                Nama Mahasiswa
                            </th>
                            <th scope="col" class="px-6 text-center py-3">
                                Program Studi
                            </th>
                            <th scope="col" class="px-6 py-3 text-center rounded-e-lg">
                                NIM
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index = 0;
                        foreach ($mahasiswa->result() as $item) {
                            $index++; ?>
                            <tr class="bg-white dark:bg-gray-800 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $item->nama ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $item->prodi ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $item->nim ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-gray-600 my-1 font-bold uppercase pt-10 pb-3">Deskripsi / Latar Belakang</div>
            <p class="text-gray-600"><?= html_entity_decode($pbl->deskripsi) ?></p>
        </div>



        <h2 class="text-2xl font-bold mb-4 mt-4 pt-7">Komentar</h2>
        <!-- Comment -->
        <div class="mb-4 container border custom-card p-4 shadow-md rounded-lg">
            <textarea id="comment" class="w-full p-2 border rounded-lg" placeholder="Masukkan komentar Anda"></textarea>
        </div>

        <button onclick="sendComment()" class="bg-blue-500 custom-card text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
            Kirim Komentar
        </button>
        <div id="display-chat" class="mt-7 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-20 gap-y-5">
        </div>

        <h2 class="text-2xl font-bold mb-4 mt-4 pt-10">Video Serupa</h2>
        <!-- Similar Videos -->
        <div id="related-vidio" class="mt-7 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-20 gap-y-5">
        </div>

    </div>

</body>

</html>
<input type="text" value="<?= $pbl->no_pbl ?>" id="no_pbl" class="hidden">
<input type="text" value="<?= $liked ?>" id="liked" class="hidden">
<input type="text" value="<?= $pbl->jurusan ?>" id="jurusan" class="hidden">


<script>
    document.addEventListener('DOMContentLoaded', function() {
        showSimilarVidio();
        showComment();
    });

    function sendComment() {
        var pbl = $("#no_pbl").val();
        var Comment = $("#comment").val();
        var login = <?= json_encode($this->session->userdata('logged_in')); ?>; // Memeriksa apakah pengguna sudah login

        if (!login) {
            Swal.fire({
                title: "Gagal",
                text: "Anda Tidak Sedang Login",
                icon: "error"
            });
        } else {
            if (Comment.trim() == "") {
                Swal.fire({
                    title: "Silahkan Memasukkan Komentar Anda",
                    icon: "warning",
                    showClass: {
                        popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                    `
                    },
                    hideClass: {
                        popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                    `
                    }
                });
            } else {
                $.ajax({
                    url: "<?php echo base_url('Vidio/sendComment'); ?>",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        pbl: pbl,
                        comment: Comment
                    },
                    success: function(response) {
                        showComment();
                        $("#comment").val("");
                    }
                });
            }
        }
    }

    function showComment() {
        var pbl = $("#no_pbl").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/showComment/'); ?>" + pbl,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response && response.data) {
                    $("#display-chat").empty(); // Kosongkan div sebelum menambahkan komentar
                    $.each(response.data, function(index, item) {
                        // Periksa apakah data komentar memiliki nilai yang diharapkan
                        if (item.id_comment && item.nama_pengguna && item.tanggal && item.isi) {
                            $("#display-chat").append(`
                            <div class="bg-white relative custom-card p-4 rounded-lg shadow-md pb-5">
                                <input value="${item.id_comment}" class="hidden" id="comment-${index}" type="text">
                                <div class="flex items-center mb-4">
                                    <img src="${item.profile}" class="w-8 h-8 rounded-full mr-2" alt="User Profile">
                                    <div>
                                        <h3 class="text-sm font-semibold">${item.nama_pengguna}</h3>
                                    </div>
                                    <div class="absolute right-2 top-1">
                                        <i><span class="bg-blue-100 rounded-full text-xs text-gray-600 p-5 m-2 mr-4">${item.tanggal}</span></i>
                                    </div>
                                </div>
                                <div class="h-auto w-full mb-2 ml-10">
                                    <p class="text-gray-700">${item.isi}</p>
                                </div>
                                <div id="comment-card-${index}" class="absolute bottom-0 text-center h-10 w-20 right-1 mx-auto">
                               
                                </div>
                            </div>
                        `);
                        } else {
                            console.error("Data komentar tidak lengkap:", item);
                        }
                    });
                } else {
                    console.error("Data komentar tidak ditemukan atau format tidak sesuai");
                }
            },
            error: function(xhr, status, error) {
                console.error("Gagal memuat komentar:", error);
                // Anda bisa menambahkan pesan error ke pengguna di sini jika diinginkan
            }
        });
    }

    function deleteComment(id_comment) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Komentar ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                var no_pbl = $("#no_pbl").val(); // pastikan no_pbl ada di elemen dengan ID no_pbl
                $.ajax({
                    url: "<?php echo base_url('Vidio/deleteComment'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id_comment: id_comment,
                        no_pbl: no_pbl
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                "Dihapus!",
                                "Komentar Anda telah dihapus.",
                                "success"
                            );
                            showComment(); // Refresh komentar setelah penghapusan
                        } else {
                            Swal.fire(
                                "Gagal!",
                                response.message || "Terjadi kesalahan saat menghapus komentar.",
                                "error"
                            );
                        }
                    }
                });
            }
        });
    }

    function like() {
        var kode = $("#no_pbl").val();
        var liked = $("#liked").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/likes'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                artikel: kode
            },
            success: function(response) {
                $("#likes").empty();
                $("#likes").append(response.like);
                $("#button-like").css('color', response.liked);
            }
        });
    }

    function showSimilarVidio() {
        var Jurusan = $("#jurusan").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/getSimilarVidio'); ?>",
            type: "GET",
            dataType: 'json',
            data: {
                jurusan: Jurusan
            },
            success: function(response) {
                $("#related-vidio").empty()
                $.each(response.data, function(index, item) {
                    $("#related-vidio").append(`
<div class="bg-white border custom-card relative shadow-sm w-full h-auto">
    <div class="h-full mb-20 relative">
        <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
        <div class="bg-transparent w-24 h-10 absolute top-80 left-7">
            <div class="grid text-md text-black grid-cols-2 gap-4">
                <div><i class="fa-solid fa-eye"></i> ${item.view}</div>
                <div><i class="fa-solid fa-thumbs-up"></i> ${item.like}</div>
            </div>
        </div>
        <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-full px-2 py-1 absolute top-4 left-5 w-auto z-50">${item.tanggal}</div>
        <div class="text-white bg-blue-500 rounded-full w-auto absolute top-60 px-2 py-1 text-center font-semibold right-5">${item.nama}</div>
        <div>
            <div class="max-h-20 mt-20 ml-5 w-full overflow-auto scrollbar">
                <h1 class="text-xl text-gray-700 font-bold ml-2">${item.judul}</h1>
            </div>
            <h1 class="font-small ml-7 mr-5 pt-5 uppercase text-gray-700 text-xs">${item.kategori}</h1>
            <div class="max-h-40 px-2 ml-5 pt-2 mr-5 text-gray-700 overflow-auto scrollbar text-justify">
                <p class="w-full">${item.deskripsi}</p>
            </div>
            <div class="absolute bottom-2 flex justify-between h-10 w-full absolute px-14 mx-auto">
                <a href='${item.urlselengkapnya}'>
                    <div class="text-black border border-gray-800 rounded-full px-3 py-2 font-semibold text-center">Selengkapnya</div>
                </a>
                ${item.nilai}
            </div>
        </div>
    </div>
    `);
                });
            }
        });

    }
</script>
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
</script>

<style>
    ::-webkit-scrollbar {
        width: 10px;
        background-color: #F3F4F6;
    }

    ::-webkit-scrollbar-thumb {
        background-color: grey;
    }

    ::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .scrollbar {
        scrollbar-color: transparent transparent;
        /* Warna thumb dan track scrollbar */
        scrollbar-width: thin;
        /* Lebar scrollbar */
    }
</style>