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


      <form action="" method="post" enctype="multipart/form-data">
        <section class="w-full h-full relative">
          <div class="absolute right-1 z-50 top-6">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Simpan Data</button>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="bg-white px-5  border rounded-lg shadow-lg py-5">

              <div class="bg-white border shadow-md mb-4 relative pt-4 w-full mx-auto lg:w-[80%] h-[50vh] rounded-lg">
                <div class="w-96 mx-auto h-96 relative rounded-full border">
                  <img id="preview-image-1" src="<?= base_url('assets/images/profile/' . $dataUser->profile); ?>" class="w-96 shadow-md mx-auto h-96 relative rounded-full border" alt="">
                </div>
                <div class="absolute left-1 bottom-1">
                  <div class="text-center">
                    <p class="text-gray-600 font-bold ml-2">Bergabung Sejak: <span class="italic font-normal"><?= tanggal($detailUser->bergabung) ?></span></p>
                  </div>
                </div>
                <div class="absolute right-1 bottom-2">
                  <input type="file" accept=".jpeg, .jpg, .png" name="Image-1" class="hidden" id="Image-1" onchange="previewImage(1)">
                  <label class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent w-28 text-center rounded" for="Image-1">Pilih Profile</label>
                </div>
              </div>

              <div class="w-full h-auto  mt-2">

                <div class="mb-4">
                  <label for="slogan" class="block text-sm font-medium text-gray-600">Slogan:</label>
                  <textarea name="slogan" id="slogan" cols="30" class="mt-1 p-2 w-full border rounded-md" rows="5"><?= $detailUser->slogan ?></textarea>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                  <div class="mb-4">
                    <label for="firstname" class="block text-sm font-medium text-gray-600">Firstname:</label>
                    <input required type="text" id="firstname" name="firstname" value="<?= $dataUser->firstname ?>" class="mt-1 p-2 w-full border rounded-md">
                  </div>
                  <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-600">Lastname:</label>
                    <input required type="text" id="lastname" name="lastname" value="<?= $dataUser->lastname ?>" class="mt-1 p-2 w-full border rounded-md">
                  </div>
                  <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                    <input type="email" id="email" readonly value="<?= $dataUser->email ?>" class="mt-1 p-2 outline-none cursor-default w-full border rounded-md">
                  </div>
                  <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
                    <input type="text" id="username" name="username" value="<?= $dataUser->username ?>" class="mt-1 p-2 w-full border rounded-md">
                  </div>
                </div>
              </div>
            </div>

            <div class="bg-white  border rounded-lg shadow-lg relative pt-14 p-6 ">
              <div class="grid grid-cols-2 gap-2">
                <div class="mb-2">
                  <div class="text-gray-400 mb-2 ml-2 font-medium uppercase"><i>Role</i></div>
                  <select id="role" name="role" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="<?= $dataUser->role ?>"><?= $dataUser->role ?></option>
                    <option disabled>---------------</option>
                    <option value="dosen">dosen</option>
                    <option value="pengguna">pengguna</option>
                    <option value="reviewer">reviewer</option>
                    <option value="admin">admin</option>
                  </select>
                </div>
                <div class="mb-2">
                  <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Status</div>
                  <select id="status" name="status" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="<?= $dataUser->status ?>"><?= $dataUser->status ?></option>
                    <option disabled>---------------</option>
                    <option value="active">active</option>
                    <option value="suspend">suspend</option>
                    <option value="blocked">blocked</option>
                  </select>
                </div>
              </div>
              <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat:</label>
                <textarea name="alamat" id="alamat" cols="30" class="mt-1 p-2 w-full border rounded-md" rows="3"><?= $detailUser->alamat ?></textarea>
              </div>
              <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" class="mt-1 p-2 w-full border rounded-md" rows="6"><?= $detailUser->deskripsi ?></textarea>
              </div>
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

  function previewImage(data) {
    var input = document.getElementById('Image-' + data);
    var preview = document.getElementById('preview-image-' + data);
    var text = document.getElementById('text-' + data);
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
      text.style.display = "none";
    };

    reader.readAsDataURL(file);
  }
</script>