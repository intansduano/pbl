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
    <meta name="author" content="Intan Duano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <meta name="author" content="Intan Duano">
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
 
                </div>

            </section>
        </main>
    </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>

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
            url: "<?php echo base_url('Vidio/getPrivateVidio'); ?>",
            type: "GET",
            dataType: 'json',
            data: {},
            success: function(response) {
                $("#news-element").empty();
                $("#news-element").append(`
                    <div  class="w-full h-screen relative overflow-scroll px-1 scrollbar">
                        <div id="list-artikel" class="mt-7 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-20 gap-y-5"> 
                        </div>
                    </div>
                `);
            
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
</script>