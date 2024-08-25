<?php

$message = $this->session->flashdata('msg_sweetalert');

if (isset($message)) {
    echo $message;
    $this->session->unset_userdata('msg_sweetalert');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title><?= $title ?></title>
    <style>
        /*The @import rule is used to import an external CSS file containing font styles from the Google Fonts API "Poppins" family, specifying styles, weights and loading optimization.*/
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,500;1,300&display=swap');

        /* The selector (.Login-button) styles an HTML element with the class "Login-button" by applying a linear gradient background on the left side, with a color transition from "rebeccapurple" to "dodgerblue". */
        .Login-button {
            background: linear-gradient(to right, #5234b3, #03a9f4);
        }

        /* Hovering over the element triggers a visual effect of a linear gradient in the background, changing color, creating an effect when interacting with the button. */
        .Login-button:hover {
            background: linear-gradient(to right, #8138f6ad, #03a8f4ab);
        }

        /* Defining the font of the texts */
        h2,
        p {
            font-family: 'Poppins', sans-serif;
        }

        /* Changes color when hovering the mouse over the link */
        a:hover {
            color: #1445e8;
        }
    </style>
</head>

<body class="">
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!--Login container-->
        <div class="bg-[#7ad3f62a] flex rounded-2xl shadow-lg max-w-3xl p-4">
            <!--Form-->
            <div class="sm:w-1/2 px-16">
                <h2 class="font-bold text-2xl text-[#4527a5] text-center">Registrasi</h2>
                <p class="text-sm mt-7 text-[#6c57b1] text-opacity-70 text-center">Masukan data dengan benar.</p>

                <!--Data entry group-->
                <form class="flex flex-col gap-4" method="POST" action="">
                    <input class="p-2 mt-8 rounded-xl border" type="text" name="email" placeholder="intan.duano@example.com" value="<?= set_value('email') ?>">
                    <?php echo form_error('email', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                    <input class="p-2 mt-2 rounded-xl border" type="text" name="nim" placeholder="Masukan NIM anda..." value="<?= set_value('nim') ?>">
                    <?php echo form_error('nim', '<small class="text-muted"><font color="red">', '</font></small>'); ?>
                    <div class="relative">
                        <input class="p-2 mt-2 rounded-xl border w-full" id="password" type="password" name="password" placeholder="Masukan kata sandi...">
                        <!--SVG Eye-->
                        <svg onclick="showpass()" class="bi bi-eye-fill absolute top-1/4 right-4 
                    translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </div>

                    <button class="Login-button rounded-xl text-white py-2">Registrasi</button>
                </form>

                <div class="mt-10 grid grid-cols-3 items-center text-gray-400">
                    <hr class="border-gray-400">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-400">
                </div>
                <!-- 
            <p class="mt-5 text-xs border-b border-gray-400 py-4">
               <a href="<?= base_url('forgot-pass'); ?>">Forgot Your password?</a>
            </p> -->

                <div class="mt-3 text-xs flex justify-between items-cente">
                    <p>
                        <a href="<?= base_url('login'); ?>">Sudah punya akun?</a>
                    </p>
                    <a href="<?= base_url('login'); ?>">
                        <button class="py-2 px-5 bg-white border rounded-xl">Login</button>

                    </a>
                </div>
            </div>

            <!--Image-->
            <div class="sm:block hidden w-1/2">
                <img class="sm:block hidden rounded-2xl" src="<?= base_url('assets/styles/loginAsset/img/image.png') ?>" alt="img-login">
            </div>
        </div>
        <!--===============-->
    </section>
</body>

</html>

<script>
    function showpass() {
        let input = $("#password")
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }
</script>
<script src="<?= base_url('assets/dashboard/dist/js/adminlte.min.js') ?>"></script>

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