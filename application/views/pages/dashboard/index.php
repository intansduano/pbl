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
                    <a onclick="Menu1();" id="menu1" class="hover:text-gray-700 cursor-pointer text-gray-700 dark:hover:text-white">Video Project Based Learning Anda</a>
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
            url: "<?php echo base_url('Vidio/getVidio'); ?>",
            type: "GET",
            dataType: 'json',
            data: {},
            success: function(response) {
                $("#news-element").empty();
                $("#news-element").append(`
                    <div class="items-center w-96 right-3 top-0 absolute content-center flex ">
                        <span class="text-gray-400 absolute left-4 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" value="" class="text-xs ring-1 bg-white ring-gray-200 dark:ring-zinc-600 focus:ring-red-300 pl-10 pr-5 text-gray-600 dark:text-white  py-3 rounded-lg w-full outline-none focus:ring-1" placeholder="Search Video...">
                    </div>
                    <div  class="w-full h-screen relative overflow-scroll px-1 scrollbar">
                        <div id="list-artikel" class="mt-7 grid grid-cols-2 sm:grid-cols-4 gap-x-5 gap-y-5"> 
                        </div>
                    </div>
                `);
            
                $.each(response.data, function(index, item) {
                    $("#list-artikel").append(`
                        <div class="bg-white border  custom-card relative rounded-lg shadow-sm w-full h-auto">
                            <div class="h-full mb-20 pb-14 relative"> 
                                <img class="h-72 w-full rounded-t-lg border" src="${item.img}">
                                <div class="bg-white shadow-sm text-gray-800 font-semibold rounded-sm px-2 absolute top-2 left-1 w-auto z-50">${item.tanggal}</div>
                                
                                <div class='overlay h-72'>
                                    <div class='overlay-content'>
                                        <a href="${item.urlediting}" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <a href="${item.urlselengkapnya}" class="mt-4 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Selengkapnya</a>
                                    </div>
                                </div>
                            <div>
                                <h1 class="text-xl font-bold ml-2">${item.judul}</h1>
                                <div class="h-6 w-72 absolute left-0 right-0 bottom-7 mx-auto py-2 pb-10 mb-3">
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
                        `
                    );
                });
            }
        });
    }
</script>