<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>
  </head>
  <body>
    
  <body class="text-gray-800 antialiased">
   
    <main class="profile-page">
      <section class="relative block" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50"
          ></span>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
      </section>
      <section class="relative py-16 ">
        <div class="container mx-auto px-4">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div
                  class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                >
                  <div class="relative">
                    <img
                      src="<?=base_url('assets/images/profile/'.$dataUser->profile);?>"
                      class="shadow-xl rounded-full w-52 h-52 align-middle border-none absolute -m-16 -ml-24 lg:-ml-28"
                      style="max-width: 400px;"
                    />a
                  </div>
                </div>
                <div
                  class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                >
                  <div class="py-6 px-3 mt-32 sm:mt-0">
                    <button
                      onclick="navigateToPage('<?=$dataUser->twitter?>')"
                      class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-twitter"></i></button
                    ><button
                      onclick="navigateToPage('<?=$dataUser->facebook?>')"
                      class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-facebook-square"></i></button
                    ><button
                      onclick="navigateToPage('<?=$dataUser->instagram?>')"
                      class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                      <i class="flex fab fa-instagram"></i></button
                    ><button
                      onclick="navigateToPage('<?=$dataUser->lingkedin?>')"
                      class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                    <i class="fa-brands fa-linkedin"></i>
                    </button>
                    <button
                    onclick="navigateToPageWa('<?=$dataUser->whatsapp?>')"
                      class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                      type="button"
                    >
                    <i class="fa-brands fa-whatsapp"></i>
                    </button>
                  </div>
                </div>
                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                  <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?=$dataUser->jumlah_pbl?></span
                      ><span class="text-sm text-gray-500">PBL</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?=$dataUser->jumlah_like?></span
                      ><span class="text-sm text-gray-500">Likes</span>
                    </div>
                    <div class="lg:mr-4 p-3 text-center">
                      <span
                        class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                        ><?=$dataUser->jumlah_komentar?></span
                      ><span class="text-sm text-gray-500">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-12">
                <h3
                  class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                >
                  <?=$dataUser->firstname?> <?=$dataUser->lastname?>
                </h3>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold"
                >
                  <?=$dataUser->slogan?>
                </div>
                <div class="mb-2 text-gray-700 italic mt-3">
                  " <?=$dataUser->deskripsi?> "
                </div>
              </div>
              <div class="mt-10 py-10 border-t border-gray-300 text-center">
                <div class="w-full ">
                  <div id="vidio-terbaru" class="w-full h-auto overflow-auto pb-5 grid grid-cols-1 md:grid-cols-2 gap-5 md:px-4 py-2 lg:grid-cols-3 xl:grid-cols-4">

              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

  </body>
</html>
<script>
  function navigateToPage(pageUrl) {
  window.location.href = pageUrl;
}
function navigateToPageWa(pageUrl) {
  window.location.href = 'https://api.whatsapp.com/send?phone='+pageUrl+'&text=';
}


document.addEventListener('DOMContentLoaded', function() {
    showVidioTerbaru();
  });


  function showVidioTerbaru(){
      $.ajax({
          url: "<?php echo base_url('Vidio/getVidioUser'); ?>",
          type: "GET",
          dataType: 'json',
          data: {
            userid : '<?=$dataUser->userid?>'
          },
          success: function(response) {
              $.each(response.data, function(index, item) {
                  $("#vidio-terbaru").append(`
                       <a href="${item.urlselengkapnya}" class="relative">
                        <div class="bg-white border relative rounded-lg shadow-md hover:scale-105 transition-all duration-300 w-full h-auto">
                              <div class="h-full mb-20 pb-10 relative">
                              <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
                              <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-md px-2 absolute top-1 left-1 w-auto z-50">${item.tanggal}</div>
                              <div>
                              <div class=" h-20 w-full overflow-auto scrollbar">
                              <h1 class="text-xl font-bold ml-2">${item.judul}</h1>
                              </div>
                              <div class="h-6 w-72 absolute left-0 right-0 bottom-0 mx-auto py-2">
                                  <div class="grid grid-cols-3 mx-auto px-4 ml-8">
                                      <div><i class="fa-solid fa-eye"></i> ${item.view}</div>
                                      <div><i class="fa-solid fa-thumbs-up"></i> ${item.like}</div>
                                      <div><i class="fa-solid fa-comment"></i> ${item.comment}</div>
                                  </div>
                                  <div class="text-center">
                                      <hr class="my-2 bg-blue-500 h-1">
                                      <h1 class="font-semibold">${item.kategori}</h1>  
                                  </div>
                              </div>
                              </div>
                              </div>
                          </div>
                        </a>
                      `
                  );
              });
          }
      });
  }

</script>