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
      <div class="login">
         <img src="<?=base_url('assets/styles/loginAsset/img/login-bg.png')?>" alt="image" class="login__bg">

         <form action="<?=$url?>" class="login__form text-center relative">
            <h1 class="login__title"><?=$text?></h1>
            <img src="<?=$logo?>" class="mx-auto"/>
            <h3 class="mb-7 mt-4 font-semibold"><?=$pesan?></h3>
            
            <button type="submit" class="relative left-0 right-0 login__button hover:bg-[#3C2A80]"><?=$button?></button>

         </form>
      </div>
   </body>
</html>