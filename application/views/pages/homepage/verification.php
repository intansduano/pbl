<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

      <link rel="stylesheet" href="<?=base_url('assets/styles/loginAsset/css/styles.css')?>">

      <title><?=$title?></title>
   </head>
   <body class="">

   <form action="<?=$url?>">
   <div class="flex items-center justify-center min-h-screen bg-blue-100">
        <!-- Card Container -->
        <div
            class="relative flex flex-col m-6 space-y-10 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0 md:m-0">
            <!-- Left Side -->
            <div class="p-6 md:p-20">
                <!-- Top Content -->
                <h2 class="font-mono mb-5 text-4xl font-bold">Verifikasi Email</h2>
                <p class="max-w-sm mb-12 font-sans font-light text-gray-600"><?=$pesan?></p>
                
                <div class="flex flex-col items-center justify-between mt-6 space-y-6 md:flex-row md:space-y-0">
                    <button type="submit"
                        class="w-full md:w-auto flex justify-center items-center p-6 space-x-4 font-sans font-bold text-white rounded-md shadow-lg px-9 bg-blue-500 shadow-blue-100 hover:bg-opacity-90 shadow-sm hover:shadow-lg border transition hover:-translate-y-0.5 duration-150">
                        <span><?=$button?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                            <line x1="13" y1="18" x2="19" y2="12" />
                            <line x1="13" y1="6" x2="19" y2="12" />
                        </svg>
                    </button>
                </div>
            </div>
             <img src="https://images.unsplash.com/photo-1666361759686-ce64c9e1d1b9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                alt="" class="w-[430px] hidden md:block md:rounded-r-2xl" />
        </div>
    </div>
   </form>
   </body>
</html>