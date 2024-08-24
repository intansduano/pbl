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
            
           
            <form action="" method="post">
            <section class="max-w-4xl mx-auto h-full overflow-hidden border rounded-lg shadow-lg relative">
                <div class="absolute right-1 z-50 top-6">
                  <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Simpan Data</button>
                </div>
                <div class="bg-white px-5 py-5">

                <div class="w-full h-auto  mt-9">
                      <div class="grid grid-cols-1 gap-3">
                        <div class="mb-4">
                          <label for="oldpass" class="block text-sm font-medium text-gray-600">Password Lama:</label>
                          <input <?= set_value('oldpass') ?> required type="password" id="oldpass" placeholder="Password Lama" name="oldpass" class="mt-1 p-2 w-full border rounded-md">
  	                      <?php echo form_error('oldpass', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-4">
                          <label for="newpass" class="block text-sm font-medium text-gray-600">Password Baru:</label>
                          <input <?= set_value('newpass') ?> required type="password" id="newpass" placeholder = "Password Baru" name="newpass" class="mt-1 p-2 w-full border rounded-md">
  	                      <?php echo form_error('newpass', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                        <div class="mb-4">
                          <label for="konfirmasi" class="block text-sm font-medium text-gray-600">Konfirmasi Password:</label>
                          <input  type="password" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password" class="mt-1 p-2 outline-none cursor-default w-full border rounded-md">
  	                      <?php echo form_error('konfirmasi', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                        </div>
                      </div>
                    </div>

                </div>
            </section>
            </form>

        </main>

    </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>
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
</script>