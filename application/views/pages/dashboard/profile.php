<?php

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
  echo $message;
  $this->session->unset_userdata('msg_sweetalert');
}

?>

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


<!DOCTYPE html>
<html lang="en" :class="isDark ? 'dark' : 'light'" x-data="{ isDark: false }">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="Intan Duano">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style/style.css" rel="stylesheet">
  <meta name="author" content="Intan Duano">
  <title><?= $title ?></title>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-montserrat text-sm bg-white dark:bg-zinc-900 ">
  <div class="flex min-h-screen  2xl:mx-auto 2xl:border-x-2 2xl:border-gray-200 dark:2xl:border-zinc-700 ">
    <!-- Left Sidebar -->
    <?= $sidebar ?>
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
        <div class="w-full p-6 mx-auto">
          <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
              <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl border shadow-lg bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                  <div class="flex items-center">
                    <button onclick="saveData()" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Save</button>
                  </div>
                </div>
                <div class="flex-auto p-6">
                  <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">User Information</p>
                  <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                      <div class="mb-4">
                        <label for="username" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nim/Username</label>
                        <input type="text" readonly value="<?= $dataUser->username ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                      </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                      <div class="mb-4">
                        <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email</label>
                        <input type="text" id="email" value="<?= $dataUser->email ?>" readonly class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                      </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                      <div class="mb-4">
                        <label for="firstname" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">First name</label>
                        <input type="text" id="firstname" name="firstname" value="<?= $dataUser->firstname ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                      </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                      <div class="mb-4">
                        <label for="lastname" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Last name</label>
                        <input type="text" id="lastname" name="lastname" value="<?= $dataUser->lastname ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                      </div>
                    </div>

                  </div>
                  <div class="mb-4">
                    <label for="slogan" class="block text-sm font-medium text-gray-600">Slogan:</label>
                    <textarea name="slogan" id="slogan" cols="30" class="mt-1 p-2 w-full border rounded-md" rows="5"><?= $detailUser->slogan ?></textarea>
                  </div>
                  <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                  <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Contact Information</p>
                  <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                      <div class="mb-4">
                        <label for="alamat" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat</label>
                        <textarea id="alamat" name="alamat" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"><?= $detailUser->alamat ?></textarea>
                      </div>
                    </div>
                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                      <div class="mb-4">
                        <label for="deskripsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat</label>
                        <textarea id="deskripsi" name="deskripsi" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"><?= $detailUser->alamat ?></textarea>
                      </div>
                    </div>

                  </div>

                  <p class="leading-normal uppercase dark:text-white dark:opacity-60 mb-2 text-sm">About me</p>
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                    <div class="mb-4">
                      <label for="whatsapp" class="block text-sm font-medium text-gray-600">WhatsApp</label>
                      <input type="text" placeholder="6285161542103" id="whatsapp" name="whatsapp" value="<?= $detailUser->whatsapp ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                      <label for="telpon" class="block text-sm font-medium text-gray-600">Telpon:</label>
                      <input type="text" placeholder="6285161542103" id="telpon" name="telpon" value="<?= $detailUser->no_telpon ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                      <label for="facebook" class="block text-sm font-medium text-gray-600">Facebook</label>
                      <input type="text" placeholder="https://www.facebook.com/polimdo.official/" id="facebook" name="facebook" value="<?= $detailUser->facebook ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                      <label for="instagram" class="block text-sm font-medium text-gray-600">Instagram</label>
                      <input type="text" placeholder="https://www.instagram.com/tans.smith/" id="instagram" name="instagram" value="<?= $detailUser->instagram ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                      <label for="twitter" class="block text-sm font-medium text-gray-600">Twitter</label>
                      <input type="text" placeholder="https://twitter.com/PoltekManado" id="twitter" name="twitter" value="<?= $detailUser->twitter ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                      <label for="linkedin" class="block text-sm font-medium text-gray-600">LinkedIn</label>
                      <input type="text" placeholder="https://www.linkedin.com/in/intanduano2710/" id="linkedin" name="linkedin" value="<?= $detailUser->lingkedin ?>" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </form>

      <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <img class="w-full rounded-t-2xl" src="<?= base_url('assets/images/bg-profile.jpg') ?>" alt="profile cover image">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-4/12 max-w-full px-3 flex-0 ">
              <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                <a href="javascript:;">
                  <img class="h-36 w-36  rounded-full" src="<?= base_url('assets/images/profile/' . $dataUser->profile); ?>" id="second-profile" alt="profile image">
                </a>
              </div>
            </div>
          </div>
          <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
            <div class="flex justify-between">
              <label for="change-profile" class="px-3 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                Ganti Profile
                <input type="file" id="change-profile" onchange="changepic()" accept="image/*" class="hidden">
              </label>
            </div>
          </div>
          <p class="text-gray-600 font-bold ml-2 text-center">Bergabung Sejak: <span class="italic font-normal"><?= tanggal($detailUser->bergabung) ?></span></p>
          <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
        </div>
      </div>
  </div>
  </div>
  </div>

  </main>

  </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">

<script>
  var indicatorSidebar = $("#menu-indicator-sidebar");
  var sidebar = $("#sidebar");
  var buttonSidebar = $("#button-sidebar");


  function MenuSidebar() {
    if (indicatorSidebar.val() == 0) {
      sidebar.css("left", "1px")
      buttonSidebar.css('left', '200px')
      indicatorSidebar.val(1);
    } else {
      sidebar.css("left", "")
      buttonSidebar.css('left', '')
      indicatorSidebar.val(0);
    }
  }

  function changepic() {
    let fileInput = document.getElementById('change-profile');
    if (fileInput.files && fileInput.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        $("#profile-pic").attr("src", e.target.result);
      };
      reader.readAsDataURL(fileInput.files[0]);

      const formData = new FormData();
      formData.append("file", fileInput.files[0]);

      $.ajax({
        url: '<?= base_url('Dashboard/upload_file'); ?>',
        type: 'POST',
        data: formData,
        processData: false,
        dataType: 'json',
        contentType: false,
        success: function(response) {
          notify('success', response.message);
          $("#second-profile").attr("src", response.img);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          const response = JSON.parse(jqXHR.responseText);
          notify('error', response.error);
        }
      });
    }
  }

  function notify(notif_icon, notif_title) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: notif_icon,
      title: notif_title
    });
  }
</script>