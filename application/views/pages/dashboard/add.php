<?php 

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
	echo $message;
	$this->session->unset_userdata('msg_sweetalert');
}

?>


<!DOCTYPE html>
<html lang="en" :class="isDark ? 'dark' : 'light'" x-data="{ isDark: false }">

<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <title><?=$title?></title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-montserrat text-sm bg-white dark:bg-zinc-900 " >
    <div class="flex min-h-screen 2xl:mx-auto 2xl:border-x-2 2xl:border-gray-200 dark:2xl:border-zinc-700 ">
        <!-- Left Sidebar -->
        <?=$sidebar?>
        <!-- Left Sidebar -->

        <form action="" method="POST" enctype="multipart/form-data">
    <input type="number" name="element" readonly value="3" id="element" class="hidden">    
    <div class="relative w-full mx-auto">
        <div class="w-full p-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                            <div class="flex items-center">
                                <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Informasi Video PBL</div>
                                <button type="submit" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Tambah</button>
                            </div>
                        </div>
                        <div class="flex-auto p-6">
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Judul Video</div>
                                        <input type="text" required name="artikel-title" id="artikel-title" placeholder="Judul Video Anda" value="<?= set_value('artikel-title') ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                        <div id="related-judul" class="text-black md:w-[80%] relative left-0 right-0 mx-auto w-full bg-white mt-2 h-auto rounded-lg z-10 pl-3">
                                            <?php echo form_error('artikel-title', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>
                                        </div>  
                                    </div>  
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Program Studi</div>
                                        <select id="artikel-kategori" name="artikel-kategori" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option disabled>Program Studi</option>
                                            <option disabled>---------------</option>
                                            <option value="Sarjana Terapan Teknik Informatika">Sarjana Terapan Teknik Informatika</option>
                                            <option value="Sarjana Terapan Teknik Listrik">Sarjana Terapan Teknik Listrik</option>
                                            <option value="Diploma Tiga Teknik Listrik">Diploma Tiga Teknik Listrik</option>
                                            <option value="Diploma Tiga Teknik Komputer">Diploma Tiga Teknik Komputer</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Dosen Pengampuh MK</div>
                                        <input type="text" id="input-dosen-pengampuh" class="hidden" required name="dosen-pengampuh">
                                        <input type="text" id="dosen-pengampuh" placeholder="Contoh: Nama Dosen Pengampuh" autocomplete="off" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <div id="suggestions" class="absolute z-50 bg-white w-auto"></div>
                                    </div>  
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nama Mitra</div>
                                        <input type="text" name="nama-mitra" placeholder="Contoh: Politeknik Negeri Manado" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>  
                                </div>
                            </div>
                            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Tambahan</p>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Deskripsi / Latar Belakang Pemilihan proyek / latar belakang pemilihan lokasi</div>
                                        <textarea required name="artikel-deskripsi-1" id="artikel-deskripsi-1" cols="30" rows="16" placeholder="Deskripsi Video Anda.." class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full h-auto relative">
                                <input type="number" value="1" class="hidden" name="jumlah-mahasiswa" id="jumlah-mahasiswa">
                                <a onclick="addMahasiswa();" type="button" class="bg-transparent md:absolute right-16 hover:bg-blue-500 text-blue-700 font-semibold cursor-pointer hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Tambah</a>
                                <a onclick="removeMahasiswa();" type="button" class="bg-transparent md:absolute right-0 hover:bg-red-500 cursor-pointer text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">Hapus</a>
                                <div class="text-gray-600 mb-4 font-bold uppercase">Mahasiswa Terlibat</div>
                                <div id="mahasiswa-terlibat" class="grid grid-cols-3 mb-4 gap-4">
                                    <div id='nama-1' class="mb-2">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nama Mahasiswa 1</div>
                                        <input type="text" placeholder="Nama Mahasiswa 1" value="<?= $getUser->firstname . ' ' . $getUser->lastname ?>" id="nama-mahasiswa-1" name="nama-mahasiswa-1" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div id='program-studi-1' class="mb-2">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Program Studi</div>
                                        <select id="program-studi-1" name="program-studi-1" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option disabled>Program Studi</option>
                                            <option disabled>---------------</option>
                                            <option value="Sarjana Terapan Teknik Informatika">Sarjana Terapan Teknik Informatika</option>
                                            <option value="Sarjana Terapan Teknik Listrik">Sarjana Terapan Teknik Listrik</option>
                                            <option value="Diploma Tiga Teknik Listrik">Diploma Tiga Teknik Listrik</option>
                                            <option value="Diploma Tiga Teknik Komputer">Diploma Tiga Teknik Komputer</option>
                                        </select>
                                    </div>
                                    <div id='nim-1' class="mb-2">
                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nim</div>
                                        <input type="text" id="nim-mahasiswa-1" name="nim-mahasiswa-1" placeholder="Contoh: 20024101" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Original Link</div>
                                <input name="original-link" id="original-link" type="text" placeholder="Contoh: &lt;iframe width='560' height='315' src='https://www.youtube.com/embed/fSE4laODlng?si=t_WqD1XcIv6A01d5' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen&gt;&lt;/iframe&gt;" class="relative w-full px-1 outline-blue-500 py-3 border text-left pl-3 text-md font-normal rounded-lg">
                            </div>
                            <div class="mt-4 mb-4">
                                <a onclick="extractLink();" type="button" class="bg-transparent mx-auto cursor-pointer hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                    Extract Link
                                </a>
                            </div>
                            <div>
                                <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Link</div>
                                <input name="link" id="link" required type="text" placeholder="Contoh: https://www.youtube.com/watch?v=o5jq..." class="relative w-full px-1 outline-blue-500 py-3 border text-left pl-3 text-md font-normal rounded-lg">
                            </div>
                            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <img class="w-full h-96 rounded-t-2xl" src="<?= base_url('assets/images/carousel-3.jpg') ?>" id="preview-image-1" alt="profile cover image">
                        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                            <div class="flex justify-between">
                                <label for="Image-1" class="px-3 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                    Pilih Sampul
                                    <input type="file" id="Image-1" name="Image-1" onchange="previewImage(1)" accept="image/*" class="hidden">
                                </label>
                                <label for="media" class="px-3 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                    Pilih Media
                                    <input type="file" id="media" name="media" onchange="previewMedia()" accept="application/pdf" class="hidden">
                                </label>
                            </div>
                        </div>
                        <h4 id="text-media" class="text-center font-semibold text-sm">Belum ada Media (format file berupa pdf)</h4>
                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>

$(document).ready(function() {
    let keys = $("#artikel-title").val();
        if(keys == ""){
        $("#related-judul").empty();
        $('#btn-save').prop('disabled', true).css({
            'background-color': 'grey',
            'color': 'white',
            'cursor': 'not-allowed'
        });
        $('#btn-save').prop('disabled', true);
        }
        
    $('#dosen-pengampuh').keyup(function() {
        var inputValue = $(this).val();
        $.ajax({
            url: 'Dashboard/dosenPengampuh',
            type: 'GET',
            dataType: 'json',
            data: { key: inputValue },
            success: function(response) {
                $('#suggestions').empty();
                $.each(response.data, function(index,item) {
                    $('#suggestions').append(`<div onclick="suggest('${item.userid}','${item.suggestion}');" class="text-gray-900 text-md z-50 block hover:border bg-white cursor-pointer border-2 hover:bg-blue-100 w-full p-2.5">${item.suggestion}</div>`);
                });
            },
            error: function(xhr, status, error) {
                // Tanggapan error
                console.error(error);
            }
        });
    });

    $('#artikel-title').keyup(function (){
        let keys = $("#artikel-title").val();
        if(keys == ""){
        $("#related-judul").empty();
        $('#btn-save').prop('disabled', true).css({
            'background-color': 'grey',
            'color': 'white',
            'cursor': 'not-allowed'
        });
        $('#btn-save').prop('disabled', true);
        }else{
        $.ajax({
            url: "<?php echo base_url('Dashboard/checkJudul'); ?>",
            type: "GET",
            dataType: 'json',
            data: { key: keys },
            success: function(response) {
                $("#related-judul").empty();
                if (response.data) {
                    // Tampilkan judul-judul yang memiliki kemiripan
                    $.each(response.hasilPerbandingan, function(index, item) {
                        index++
                        $("#related-judul").append(`<div>${index}. ${item.judul}, Kemiripan: ${item.kemiripan}%</div>`);
                    });
                    $('#btn-save').prop('disabled', true).css({
                        'background-color': 'grey',
                        'color': 'white',
                        'cursor': 'not-allowed'
                    });
                    $('#btn-save').prop('disabled', true);
                } else {
                    // Tidak ada judul yang memiliki kemiripan
                    $("#related-judul").html(`<div>Tidak ada judul yang memiliki kemiripan.</div>`);
                    $('#btn-save').prop('disabled', false).removeClass('btn-disabled').addClass('btn-default').css({
                        'background-color': '',
                        'color': '',
                        'cursor': ''
                    });
                    $('#btn-save').prop('disabled', false);
                    }
            },
            error: function(xhr, status, error) {
                console.error("Terjadi kesalahan saat mengirim permintaan: " + error);
            }
        });
        }
    })
});

function suggest(kode,nama){
    $("#input-dosen-pengampuh").val(kode);
    $("#dosen-pengampuh").val(nama);
    $('#suggestions').empty();
}

var indicatorSidebar = $("#menu-indicator-sidebar");
var sidebar = $("#sidebar");
var buttonSidebar = $("#button-sidebar");

    function MenuSidebar(){
        if(indicatorSidebar.val() == 0){
            sidebar.css("left","1px")
            buttonSidebar.css('left','200px')
            indicatorSidebar.val(1);
        }else{
            sidebar.css("left","")
            buttonSidebar.css('left','')
            indicatorSidebar.val(0);
        }
    }
    function previewImage(data) {
        var input = document.getElementById('Image-'+data);
        var preview = document.getElementById('preview-image-'+data);
        var text = document.getElementById('text-'+data);
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            text.style.display="none";
        };

        reader.readAsDataURL(file);
    }

    function previewMedia() {
    var input = document.getElementById('media');
    var text = document.getElementById('text-media');
    var file = input.files[0];

    // Check if a file is selected
    if (file) {
        text.textContent = file.name;
    } else {
        text.textContent = 'No file selected';
    }
}


CKEDITOR.replace('artikel-deskripsi-1');
   
   function extractLink(){
    var originalLink = $("#original-link").val();
    $.ajax({
        url: "<?php echo base_url('Vidio/extractLink'); ?>",
        type: "POST",
        dataType: 'json',
        data: {
            link: originalLink
        },
        success: function(response) {
            $("#link").val(response);
         }
    });
   }
   var mahasiswa = $("#jumlah-mahasiswa");
   function addMahasiswa(){
        var currentValue = parseInt(mahasiswa.val());
        var newValue = currentValue < 20 ? currentValue + 1 : 20;
        if(newValue < 20){
            mahasiswa.val(newValue);
            $("#mahasiswa-terlibat").append(`
                <div id='nama-${newValue}' class="mb-2">
                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nama Mahasiswa ${newValue}</div>
                    <input type="text" placeholder="Nama Mahasiswa ${newValue}" id="nama-mahasiswa-${newValue}" name="nama-mahasiswa-${newValue}" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div id='program-studi-${newValue}' class="mb-2">
                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Program Studi</div>
                    <select id="program-studi-${newValue}" name="program-studi-${newValue}" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled>Program Studi</option>
                        <option disabled>---------------</option>
                        <option value="Sarjana Terapan Teknik Informatika">Sarjana Terapan Teknik Informatika</option>
                        <option value="Sarjana Terapan Teknik Listrik">Sarjana Terapan Teknik Listrik</option>
                        <option value="Diploma Tiga Teknik Listrik">Diploma Tiga Teknik Listrik</option>
                        <option value="Diploma Tiga Teknik Komputer">Diploma Tiga Teknik Komputer</option>
                    </select>
                </div>
                <div id='nim-${newValue}' class="mb-2">
                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nim</div>
                    <input type="text" id="nim-mahasiswa-${newValue}" name="nim-mahasiswa-${newValue}" placeholder="Contoh: 21024137" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
        `);
        }
    }
    function removeMahasiswa(){
        var currentValue = parseInt(mahasiswa.val());
        if (currentValue > 1) {
        $("#nama-" + currentValue).remove();
        $("#program-studi-" + currentValue).remove();
        $("#nim-" + currentValue).remove();

        // Mengupdate nilai currentValue hanya jika lebih besar dari 2
        var newValue = currentValue > 2 ? currentValue - 1 : 1;
        mahasiswa.val(newValue);
    }
    }
</script>
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
