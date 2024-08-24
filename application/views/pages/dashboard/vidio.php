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
    <title><?=$title?></title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-montserrat text-sm bg-white dark:bg-zinc-900 " >
    <div class="flex min-h-screen  2xl:mx-auto 2xl:border-x-2 2xl:border-gray-200 dark:2xl:border-zinc-700 ">
        <!-- Left Sidebar -->
        <?=$sidebar?>
        <!-- Left Sidebar -->

        <main class=" flex-1 py-10  px-5 sm:px-10 ">
            <header class=" font-bold text-lg flex items-center  gap-x-3 md:hidden mb-12 relative pl-10">
                <span id="button-sidebar" onclick="MenuSidebar();" class="mr-6 transition-all duraton-1000 hover:text-red z-50 absolute left-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                      </svg>
                </span>

            </header>
            <section class="relative">
                <nav class="flex space-x-6 text-gray-400 font-medium">
                    <a onclick="Menu1();" id="menu1" class="hover:text-gray-700 cursor-pointer text-gray-700 dark:hover:text-white">Video Project Based Learning</a>
                </nav>
                <div id="news-element">
                <div class="items-center w-96 right-3 top-0 absolute content-center flex ">
                        <span class="text-gray-400 absolute left-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input id="searchbox" type="text" value="" class="text-xs ring-1 bg-white ring-gray-200 dark:ring-zinc-600 focus:ring-red-300 pl-10 pr-5 text-gray-600 dark:text-white  py-3 rounded-lg w-full outline-none focus:ring-1" placeholder="Cari Judul Video...">
                    </div>
                    <div  class="w-full h-screen relative overflow-scroll px-1 scrollbar">
                        <div id="list-artikel" class="mt-7 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-40"> 
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>

</body>

</html>
<div id="myModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
  <!-- Overlay untuk latar belakang -->
  <div class="fixed inset-0 bg-black opacity-50"></div>
  <div class="flex items-center justify-center min-h-screen">
    <div class="relative bg-white w-full md:w-[70%] rounded-lg shadow-lg">
      <!-- Konten modal -->
        <h1 class="text-2xl mt-2 font-bold mb-4 text-center text-gray-700">Input Nilai</h1>
        <hr class="border-2">
      <div class="p-8 px-20">
      <form method="post" action="<?=base_url('Vidio/updateNilai');?>">
  <!-- Input fields -->
  <div class="flex gap-4" id="judul-base-learning">
    Terjadi Kesalahan
  </div>
  <div class="w-full h-auto mt-4 relative">
    <input type="number" value="1" class="hidden" name="jumlah-mahasiswa" id="jumlah-mahasiswa">
    <div class="text-gray-400 mb-4 font-bold uppercase">Mahasiswa Terlibat</div>
    <div id="mahasiswa-terlibat" class="">
      Terjadi Kesalahan
    </div>
  </div>
  <!-- Textarea for feedback -->
  <div id="feedback-dosen" class="w-full h-auto mt-4 relative">
    <label for="feedback" class="text-gray-400 mb-4 font-bold uppercase">Umpan Balik</label>
    <textarea name="umpan balik" id="feedback" rows="4" class="w-full p-2 border rounded-md"></textarea>
  </div>
  <!-- Buttons to close modal and submit form -->
  <div class="flex justify-end">
    <button type="submit" class="bg-blue-400 py-1 mr-2 hover:bg-blue-500 transition-all duration-1000 text-white text-md font-normal rounded-md px-1 w-20">Simpan</button>
    <button type="button" id="closeModalButton" class="bg-red-400 py-1 hover:bg-red-500 transition-all duration-1000 text-white text-md font-normal rounded-md px-1 w-20">Batal</button>
  </div>
</form>

    </div>
  </div>
</div>
<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>

  // Ambil elemen modal dan tombol terkait
  const modal = document.getElementById('myModal');
  const closeModalButton = document.getElementById('closeModalButton');

  function closeModal() {
    modal.classList.add('hidden');
  }

  function openModal(kode){
    $.ajax({
            url: "<?php echo base_url('Vidio/getGradingDetail'); ?>",
            type: "GET",
            dataType: 'json',
            data: {no: kode},
            success: function(response) {
                    $("#judul-base-learning").html(`
                    <div class="w-[92%]">
                    <label for="name" class="block text-sm font-medium text-gray-400">Judul Project Based Learning</label>
                        <input type="text" id="pbl" name="pbl" readonly value="${response.pbl}" class="hidden">
                        <input type="text" id="name" readonly value="${response.judul}" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 outline-none dark:focus:border-blue-500">
                    </div>
                    <div class="w-[8%]">
                    <label for="nilai" class="block text-sm font-medium text-gray-400">Nilai</label>
                        <input type="number" min="1" name="nilai" max=100 id="nilai" value="${response.nilai}" class="border border-gray-300 text-gray-900 text-md outline-none rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                        `
                    );
                    $("#mahasiswa-terlibat").empty();
                    $("#feedback").html(response.feedback);
                    $.each(response.siswa, function(index, item) {
                    $("#mahasiswa-terlibat").append(`
                       <div class="flex gap-4">
                       <div id='nama-1' class="mb-2">
                            
                            <input type="text" value="${item.nama}" id="nama-mahasiswa-1" name="nama-mahasiswa-1" readonly class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-60 xl:w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div id='program-studi-1' class="mb-2">
                            
                            <input type="text" value="${item.prodi}" name="program-studi-1" readonly class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full lg:w-60 xl:w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        
                        </div>
                        <div id='nim-1' class="mb-2">
                            
                            <input type="text" id="nim-mahasiswa-1" name="nim-mahasiswa-1" value="${item.nim}" readonly class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                       <div>
                        `
                    );
                });
                modal.classList.remove('hidden');
            }
        });
  }

  closeModalButton.addEventListener('click', closeModal);


var indicatorSidebar = $("#menu-indicator-sidebar");
var sidebar = $("#sidebar");
var buttonSidebar = $("#button-sidebar");


    document.addEventListener('DOMContentLoaded', function() {
       showUserVidio();
    });

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

    function showUserVidio(){
        $.ajax({
            url: "<?php echo base_url('Vidio/getVidio'); ?>",
            type: "GET",
            dataType: 'json',
            data: {},
            success: function(response) {
                $.each(response.data, function(index, item) {
                    $("#list-artikel").append(`
                        <div class="bg-white border custom-card relative shadow-sm w-full h-auto">
                            <div class="h-full mb-20 relative"> 
                                <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
                                <div class="bg-transparent w-24 h-10 absolute top-62 left-3">
                                    <div class="grid text-md text-black grid-cols-2 gap-2"> 
                                        <div><i class="fa-solid fa-eye"></i> ${item.view}</div>
                                        <div><i class="fa-solid fa-thumbs-up"></i> ${item.like}</div>
                                    </div>
                                </div>
                                <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-full px-2 py-1 absolute top-4 left-5 w-auto z-50">${item.tanggal}</div>
                                <div class="text-white bg-blue-500 rounded-full w-auto absolute top-60 px-2 py-1 text-center font-semibold right-5">${item.nama}</div>
                            <div>
                            <div class="max-h-20 mt-5 w-full overflow-auto scrollbar">
                              <h1 class="text-xl text-gray-700 font-bold ml-2">${item.judul}</h1>
                              </div>
                              <h1 class="font-small ml-2 mt-2 uppercase text-gray-700 text-xs">${item.kategori}</h1>  
                              <div class="max-h-40 px-2 text-gray-700 overflow-auto scrollbar text-justify">
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
                        `
                    );
                });
            }
        });
    }
    
    var search = document.getElementById("searchbox");
        search.addEventListener('keyup', function () {
            var Key = search.value;
            $.ajax({
            url: "<?php echo base_url('Vidio/searchUserVidio'); ?>",
            type: "GET",
            dataType: 'json',
            data: {
                key : Key
            },
            success: function(response) {
                $("#list-artikel").empty();
                $.each(response.data, function(index, item) {
                        $("#list-artikel").append(`
                        <div class="bg-white border custom-card relative shadow-sm w-full h-auto">
                                <div class="h-full mb-20 relative"> 
                                    <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
                                    <div class="bg-transparent w-24 h-10 absolute top-62 left-3">
                                        <div class="grid text-md text-black grid-cols-2 gap-2"> 
                                            <div><i class="fa-solid fa-eye"></i> ${item.view}</div>
                                            <div><i class="fa-solid fa-thumbs-up"></i> ${item.like}</div>
                                        </div>
                                    </div>
                                    <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-full px-2 py-1 absolute top-4 left-5 w-auto z-50">${item.tanggal}</div>
                                    <div class="text-white bg-blue-500 rounded-full w-auto absolute top-60 px-2 py-1 text-center font-semibold right-5">${item.nama}</div>
                                <div>
                                <div class="max-h-20 mt-5 w-full overflow-auto scrollbar">
                                <h1 class="text-xl text-gray-700 font-bold ml-2">${item.judul}</h1>
                                </div>
                                <h1 class="font-small ml-2 mt-2 uppercase text-gray-700 text-xs">${item.kategori}</h1>  
                                <div class="max-h-40 px-2 text-gray-700 overflow-auto scrollbar text-justify">
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
                            `
                        );
                    });
                }
        });
        }); 
</script>