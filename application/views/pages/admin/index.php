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
        <?=$sidebar?>

        <main class=" flex-1 py-10  px-5 sm:px-10 ">
            <header class=" font-bold text-lg flex items-center  gap-x-3 md:hidden mb-12 relative pl-10">
                <span id="button-sidebar" onclick="MenuSidebar();" class="mr-6 transition-all duraton-1000 hover:text-red z-50 absolute left-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                      </svg>
                </span>

            </header>
            <section class="relative">
                <div id="news-element">
                <div class="items-center w-96 right-3 top-0 absolute content-center flex ">
                    </div>
                    <div  class="w-full mt-10 h-screen relative overflow-scroll px-1 scrollbar">
                        <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-md border dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pengguna</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jabatan</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Verified</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Bergabung</th>
                                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list-reviewer">
                                   
                                    <?php foreach($user->result() as $item){?>
                                        <tr>
                                        <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                        <div>
                                            <img src="<?=base_url('assets/images/profile/'.$item->profile);?>" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="user1" />
                                        </div>
                                            <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white"><?=$item->firstname?> <?=$item->lastname?></h6>
                                            <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400"><?=$item->email?></p>
                                            </div>
                                        </div> 
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80"><?=$item->role?></p>
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b-0 shadow-transparent">
                                        <span class="px-2 py-1 border rounded-full text-white <?php if($item->verified){echo "bg-green-400";}else{echo "bg-red-500";}?> font-semibold"><?=$item->verified?></span>
                                        </td>
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b-0 shadow-transparent">
                                        <span class="px-2 py-1 border rounded-full bg-gray-500 text-white font-semibold"><?=$item->status?></span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"><?=$item->bergabung?></span>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <a class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"> <a href="<?=base_url('edit-user/'.$item->userid);?>">Edit</a> </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
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
                $.each(response.data, function(index, item) {
                    $("#list-reviewer").append(`
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
                            <div class=" h-20 w-full overflow-auto scrollbar">
                              <h1 class="text-xl font-bold ml-2">${item.judul}</h1>
                              </div>
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
            $("#list-reviewer").empty();
            $.each(response.data, function(index, item) {
                    $("#list-reviewer").append(`
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
                            <div class=" h-20 w-full overflow-auto scrollbar">
                              <h1 class="text-xl font-bold ml-2">${item.judul}</h1>
                              </div>
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
    }); 
</script>