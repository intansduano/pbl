<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <style>
    ::-webkit-scrollbar {
      width: 10px;
      /* Lebar scrollbar */
      background-color: transparent;
      /* Warna latar belakang scrollbar */
    }

    ::-webkit-scrollbar-thumb {
      background-color: transparent;
      /* Warna thumb (bagian yang dapat digerakkan) scrollbar */
    }

    ::-webkit-scrollbar-track {
      background-color: transparent;
      /* Warna track (bagian yang tidak dapat digerakkan) scrollbar */
    }

    .scrollbar {
      scrollbar-color: transparent transparent;
      /* Warna thumb dan track scrollbar */
      scrollbar-width: thin;
      /* Lebar scrollbar */
    }

    .course-card {
      background-color: #F3F4F6;
    }

    .course-image {
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
      text-align: center;
    }

    .my-popup-size {
      width: 400px;
      height: 150px;
      font-size: 12px;
    }
  </style>
</head>

<body class="bg-white">

  <section class="w-full md:px-10">
    <!-- search box -->

    <div class="pt-4 text-gray-800">
      <div class="w-full mx-auto">
        <div class="md:flex md:flex-row-reverse md:items-center">
          <div class="relative md:w-80">
            <input id="searchbox" type="text" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="Cari...">
            <button class="absolute top-0 right-0 mt-2 mr-2 focus:outline-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="mt-1" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="py-4 w-full mx-auto">

      <div id="main-content w-full mx-auto" class="mb-7">
        <!-- Trending -->
        <h1 class="text-3xl font-bold ml-2 md:ml-10">PBL - <?= $_SESSION['jurusan'] ?></h1>

        <div id="vidio-terbaru" class="w-full px-2 h-auto overflow-auto pb-5 grid grid-cols-1 md:grid-cols-2 gap-5 md:px-4 py-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

        </div>

      </div>

  </section>
</body>

</html>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    showVidioTerbaru();
  });


  function showVidioTerbaru() {
    $.ajax({
      url: "<?php echo base_url('Vidio/getVidioJurusan'); ?>",
      type: "GET",
      dataType: 'json',
      data: {},
      success: function(response) {
        $("#vidio-terbaru").empty();
        $.each(response.data, function(index, item) {
          $("#vidio-terbaru").append(`
                  <div class="bg-white border custom-card relative shadow-sm w-full h-auto">
                            <div class="h-full mb-20 relative"> 
                                <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
                                <div class="bg-transparent w-24 h-10 absolute top-80 left-7">
                                    <div class="grid text-md text-black grid-cols-2 gap-2"> 
                                        <div><i class="fa-solid fa-eye"></i> ${item.view}</div>
                                        <div><i class="fa-solid fa-thumbs-up"></i> ${item.like}</div>
                                    </div>
                                </div>
                                <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-full px-2 py-1 absolute top-4 left-5 w-auto z-50">${item.tanggal}</div>
                                <div class="text-white bg-blue-500 rounded-full w-auto absolute top-60 px-2 py-1 text-center font-semibold right-5">${item.nama}</div>
                            <div>
                            <div class="max-h-20 mt-10 w-full overflow-auto scrollbar">
                              <h1 class="text-xl text-gray-700 font-bold mt-5 ml-7">${item.judul}</h1>
                              </div>
                              <h1 class="font-small ml-7 mt-2 uppercase text-gray-700 text-xs">${item.kategori}</h1>  
                              <div class="max-h-40 px-2 ml-5 text-gray-700 overflow-auto scrollbar text-justify">
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
  var search = document.getElementById("searchbox");
  search.addEventListener('keyup', function() {
    var Key = search.value;
    if (Key == "") {
      showVidioTerbaru();
    } else {
      $.ajax({
        url: "<?php echo base_url('Vidio/searchVidioJurusan'); ?>",
        type: "GET",
        dataType: 'json',
        data: {
          key: Key
        },
        success: function(response) {
          $("#vidio-terbaru").empty();
          $.each(response.data, function(index, item) {
            $("#vidio-terbaru").append(`
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
                        `);
          });
        }
      });
    }
  });
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