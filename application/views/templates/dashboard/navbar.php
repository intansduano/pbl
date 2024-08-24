<!DOCTYPE html>
<html lang="in">
  <head>
    <style>
       .text-logo {
          font-family: "Poppins", sans-serif;
          font-size: 30px;
          font-weight: 800;
          display: block;
          color: #545454;
        }
       .text-logo a:hover {
          color: #545454;
        }
            </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
  </head>
  <body>
    <nav class="bg-white hidden-print z-50 w-full border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-md">
      <div class="max-w-screen flex flex-wrap items-center justify-between border mx-auto md:px-10 p-4">
        <a href="<?=base_url('/');?>" class="flex decoration-none items-center">
            <img src="<?=base_url('assets/images/logo/logos/polimdo.png');?>" class="h-16 w-16 mr-3" alt="codewithfaraz Logo" />
            <span class="text-logo">Project Base Learning</span>
        </a>
        <button id="navbar-toggle" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
          <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="<?=base_url('/');?>" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent <?php if($_SESSION['page'] == 'home'){echo "text-blue-700";}else{echo "text-gray-900";}?>">Home</a>
            </li>
            <li>
              <button id="dropdownNavbarLink1" data-dropdown-toggle="dropdownNavbar1" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Panduan <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar1" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton1">
                              <li>
                                <a target='blank' href="<?=base_url('assets/file/panduan1.pdf');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Panduan Penyelenggaraan PBL</a>
                              </li>
                              <li>
                                <a target='blank' href="<?=base_url('assets/file/template.pdf');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Template Video</a>
                              </li>
                            </ul>
                        </div>
                    </li>
                      <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent <?php if($_SESSION['page'] == 'vidio'){echo "text-blue-700";}else{echo "text-gray-900";}?>">Video <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg></button>
              <div id="dropdownNavbar" class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700 dark:divide-gray-600">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="<?=base_url('vidios/teknik-informatika');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sarjana Terapan Teknik Informatika</a>
                    </li>
                    <li>
                      <a href="<?=base_url('vidios/teknik-listrik');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sarjana Terapan Teknik Listrik</a>
                    </li>
                    <li>
                      <a href="<?=base_url('vidios/teknik-listrik-d3');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Diploma Tiga Teknik Listrik</a>
                    </li>
                    <li>
                      <a href="<?=base_url('vidios/teknik-komputer');?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Diploma Tiga Teknik Komputer</a>
                    </li>
                  </ul>
              </div>
          </li>
            <li>
              <a href="<?=base_url('/kontak');?>" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent <?php if($_SESSION['page'] == 'contack'){echo "text-blue-700";}else{echo "text-gray-900";}?>">Contact</a>
            </li>
            <li>
              <?php 
              if ($_SESSION['logged_in'] == true){
              ?>
                  <a href="<?=base_url('/dashboard')?>" class="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 mx-auto w-8 border rounded-full  " viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>     
                  </a>
              <?php 
                } else {?>
              <div>
                  <a href="<?=base_url('login');?>" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent <?php if($_SESSION['page'] == 'login'){echo "text-blue-700";}else{echo "text-gray-900";}?>">Masuk</a>
              <?php 
                }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <script>document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('navbar-toggle');
    const menu = document.getElementById('navbar-dropdown');

    const dropdownButton = document.getElementById('dropdownNavbarLink');
    const dropdownMenu = document.getElementById('dropdownNavbar');

    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });

    button.addEventListener('click', function () {
      menu.classList.toggle('hidden');
    });

    const button1 = document.getElementById('navbar-toggle1');
    const menu1 = document.getElementById('navbar-dropdown1');

    const dropdownButton1 = document.getElementById('dropdownNavbarLink1');
    const dropdownMenu1 = document.getElementById('dropdownNavbar1');

    dropdownButton1.addEventListener('click', () => {
      dropdownMenu1.classList.toggle('hidden');
    });

    button1.addEventListener('click', function () {
      menu1.classList.toggle('hidden');
    });
  });
  
  </script>
  </body>
</html>