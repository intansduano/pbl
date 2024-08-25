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
    <title><?= $title ?></title>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
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
            <section class="relative">
                <h2 class="text-2xl font-bold mb-4">Penilaian Reviewer</h2>

                <div class="text-gray-700 font-normal px-3 text-md lg:text-lg w-full">
                    <div class="w-full flex uppercase text-center h-auto bg-gray-100">
                        <div class="w-[5%]  pt-4 border bg-gray-100">
                            <h2>NO</h2>
                        </div>
                        <div class="w-[40%] border pt-4">
                            <h2>Ketentuan</h2>
                        </div>
                        <div class="w-[20%] border">
                            <h2>Status</h2>
                            <hr class="border  ">
                            <div class="grid grid-cols-2">
                                <div class="border-x">Sesuai</div>
                                <div class="boder-x">Belum Sesuai</div>
                            </div>
                        </div>
                        <div class="w-[35%] border pt-4">
                            Umpan balik
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>1</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Judul Project-Based-Learning</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="judul-1" class="flex items-center mr-4">
                                <input type="radio" id="judul-1" value="1" name="judul" <?php if ($penilaian->judul_pbl == 1) {
                                                                                            echo "checked";
                                                                                        } else {
                                                                                            echo "disabled";
                                                                                        } ?> class="hidden-radio mx-auto" />
                            </label>

                            <label for="judul-2" class="flex items-center border-l">
                                <input type="radio" id="judul-2" value="0" name="judul" <?php if ($penilaian->judul_pbl == 0) {
                                                                                            echo "checked";
                                                                                        } else {
                                                                                            echo "disabled";
                                                                                        } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-judul" cols="30" rows="3" id="judul" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->judul_pbl ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>2</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Profile Mahasiswa</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="profile-mahasiswa-1" class="flex items-center mr-4">
                                <input type="radio" id="profile-mahasiswa-1" value="1" name="profile-mahasiswa" <?php if ($penilaian->profile_mahasiswa == 1) {
                                                                                                                    echo "checked";
                                                                                                                } else {
                                                                                                                    echo "disabled";
                                                                                                                } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="profile-mahasiswa-2" class="flex items-center border-l">
                                <input type="radio" id="profile-mahasiswa-2" value="0" name="profile-mahasiswa" <?php if ($penilaian->profile_mahasiswa == 0) {
                                                                                                                    echo "checked";
                                                                                                                } else {
                                                                                                                    echo "disabled";
                                                                                                                } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-profile-mahasiswa" id="komentar-profile-mahasiswa" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->profile_mahasiswa ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>3</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Profile Mitra</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="profile-mitra-1" class="flex items-center mr-4">
                                <input type="radio" id="profile-mitra-1" value="1" name="profile-mitra" <?php if ($penilaian->profile_mitra == 1) {
                                                                                                            echo "checked";
                                                                                                        } else {
                                                                                                            echo "disabled";
                                                                                                        } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="profile-mitra-2" class="flex items-center border-l">
                                <input type="radio" id="profile-mitra-2" value="0" name="profile-mitra" <?php if ($penilaian->profile_mitra == 0) {
                                                                                                            echo "checked";
                                                                                                        } else {
                                                                                                            echo "disabled";
                                                                                                        } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-profile-mitra" id="komentar-profile-mitra" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->profile_mitra ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>4</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Pengampu Mata Kuliah</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="pengampuh-1" class="flex items-center mr-4">
                                <input type="radio" id="pengampuh-1" value="1" name="pengampuh-matakuliah" <?php if ($penilaian->pengampuh == 1) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "disabled";
                                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="pengampuh-2" class="flex items-center border-l">
                                <input type="radio" id="pengampuh-2" value="0" name="pengampuh-matakuliah" <?php if ($penilaian->pengampuh == 0) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "disabled";
                                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-pengampuh-matakuliah" id="komentar-pengampuh-matakuliah" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->pengampuh ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>5</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Latar Belakang Pemilihan Proyek dan Lokasi</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="latar-belakang-1" class="flex items-center mr-4">
                                <input type="radio" id="latar-belakang-1" value="1" <?php if ($penilaian->latar_belakang == 1) {
                                                                                        echo "checked";
                                                                                    } else {
                                                                                        echo "disabled";
                                                                                    } ?> name="latar-belakang" class="hidden-radio mx-auto" />
                            </label>
                            <label for="latar-belakang-2" class="flex items-center border-l">
                                <input type="radio" id="latar-belakang-2" value="0" name="latar-belakang" <?php if ($penilaian->latar_belakang == 0) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "disabled";
                                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-latar-belakang" id="komentar-latar-belakang" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->latar_belakang ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>6</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Langkah Langkah PBL</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="langkah-1" class="flex items-center mr-4">
                                <input type="radio" id="langkah-1" value="1" <?php if ($penilaian->langkah_langkah_pbl == 1) {
                                                                                    echo "checked";
                                                                                } else {
                                                                                    echo "disabled";
                                                                                } ?> name="langkah-langkah" class="hidden-radio mx-auto" />
                            </label>
                            <label for="langkah-2" class="flex items-center border-l">
                                <input type="radio" id="langkah-2" value="0" name="langkah-langkah" <?php if ($penilaian->langkah_langkah_pbl == 0) {
                                                                                                        echo "checked";
                                                                                                    } else {
                                                                                                        echo "disabled";
                                                                                                    } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-langkah-pbl" id="komentar-langkah-pbl" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->langkah_langkah_pbl ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>7</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Problem Solving</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="problem-solving-1" class="flex items-center mr-4">
                                <input type="radio" id="problem-solving-1" value="1" name="problem-solving" <?php if ($penilaian->problem_solving == 1) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "disabled";
                                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="problem-solving-2" class="flex items-center border-l">
                                <input type="radio" id="problem-solving-2" value="0" name="problem-solving" <?php if ($penilaian->problem_solving == 0) {
                                                                                                                echo "checked";
                                                                                                            } else {
                                                                                                                echo "disabled";
                                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-problem-solving" id="komentar-problem-solving" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->problem_solving ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>8</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Learning Process & Skills</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="learning-1" class="flex items-center mr-4">
                                <input type="radio" id="learning-1" value="1" name="learning" <?php if ($penilaian->learning_process_dan_skills == 1) {
                                                                                                    echo "checked";
                                                                                                } else {
                                                                                                    echo "disabled";
                                                                                                } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="learning-2" class="flex items-center border-l">
                                <input type="radio" id="learning-2" value="0" name="learning" <?php if ($penilaian->learning_process_dan_skills == 0) {
                                                                                                    echo "checked";
                                                                                                } else {
                                                                                                    echo "disabled";
                                                                                                } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-learning-process" id="komentar-learning-process" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->learning_process_dan_skills ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>

                    <div class="w-full flex text-left h-auto bg-white">
                        <div class="w-[5%] border text-center py-3 bg-white">
                            <h2>9</h2>
                        </div>
                        <div class="w-[40%] border py-3 pl-2">
                            <h2>Penutup</h2>
                        </div>
                        <div class="w-[20%] border grid grid-cols-2">
                            <label for="penutup-1" class="flex items-center mr-4">
                                <input type="radio" id="penutup-1" value="1" name="penutup" <?php if ($penilaian->penutup == 1) {
                                                                                                echo "checked";
                                                                                            } else {
                                                                                                echo "disabled";
                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                            <label for="penutup-2" class="flex items-center border-l">
                                <input type="radio" id="penutup-2" value="0" name="penutup" <?php if ($penilaian->penutup == 0) {
                                                                                                echo "checked";
                                                                                            } else {
                                                                                                echo "disabled";
                                                                                            } ?> class="hidden-radio mx-auto" />
                            </label>
                        </div>
                        <div class="w-[35%] border pt-4 flex p-2 gap-3">
                            <textarea readonly name="komentar-penutup" id="komentar-penutup" cols="30" rows="3" class="bg-blue-50 w-full p-1 border-2 text-sm rounded-md border-blue-300" placeholder="Sample"><?= $komentar->penutup ?></textarea>
                            <!-- <button class="text-white bg-blue-500 h-8 hover:bg-blue-700 rounded-lg px-2 py-1 text-center w-14 ">Kirim</button> -->
                        </div>
                    </div>
                    <h2 class="text-2xl mt-3 font-bold mb-4">Feedback Dosen</h2>
                    <textarea readonly class="bg-white w-full p-1 border-2 text-sm rounded-md border-blue-300"><?= $pbl->feedback ?></textarea>

                    <div>
                        <h2 class="text-2xl mt-10 font-bold mb-4">Edit Proyek</h2>
                        <div class="container my-6 px-2 relative mx-auto md:px-6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="number" name="element" readonly value="3" id="element" class="hidden">
                                <div class="relative w-full mx-auto">
                                    <div class="w-full p-6 mx-auto">
                                        <div class="flex flex-wrap -mx-3">
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                                                <div class="relative flex flex-col min-w-0 break-words bg-white border shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                                                        <div class="flex items-center">
                                                            <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Informasi Video PBL</div>
                                                            <button type="submit" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Simpan</button>
                                                        </div>
                                                    </div>
                                                    <div class="flex-auto p-6">
                                                        <div class="flex flex-wrap -mx-3">
                                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                                <div class="mb-4">
                                                                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Judul Video</div>
                                                                    <input type="text" required name="artikel-title" id="artikel-title" placeholder="Judul Video Anda" value="<?= $pbl->judul_pbl ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                                    <?php echo form_error('artikel-title', '<h1 class="absolute ml-10 bg-black text-md mt-20"><font class="text-blue-100 mt-20"></font></h1>'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                                <div class="mb-4">
                                                                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Program Studi</div>
                                                                    <select id="artikel-kategori" name="artikel-kategori" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option value="<?= $pbl->jurusan ?>"><?= $pbl->jurusan ?></option>
                                                                        <option disabled>---------------</option>
                                                                        <option value="Sarjana Terapan Teknik Informatika">Sarjana Terapan Teknik Informatika</option>
                                                                        <option value="Sarjana Terapan Teknik Listrik">Sarjana Terapan Teknik Listrik</option>
                                                                        <option value="Diploma Tiga Teknik Listrik">Diploma Tiga Teknik Listrik</option>
                                                                        <option value="Diploma Tiga Teknik Komputer">Diploma Tiga Teknik Komputer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                                <div class="mb-4">
                                                                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Dosen Pengampuh MK</div>
                                                                    <input type="text" id="input-dosen-pengampuh" class="hidden" value="<?= $pembina->userid ?>" required name="input-dosen-pengampuh">
                                                                    <input type="text" value="<?= $pembina->firstname . ' ' . $pembina->lastname ?>" id="dosen-pengampuh" placeholder="Contoh: Nama Dosen Pengampuh" autocomplete="off" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <div id="suggestions" class="absolute z-50 bg-white w-auto"></div>
                                                                </div>
                                                            </div>
                                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                                <div class="mb-4">
                                                                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nama Mitra</div>
                                                                    <input type="text" value="<?= $pbl->nama_mitra ?>" name="nama-mitra" placeholder="Contoh: Politeknik Negeri Manado" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                                                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Informasi Tambahan</p>
                                                        <div class="flex flex-wrap -mx-3">
                                                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                                <div class="mb-4">
                                                                    <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Deskripsi / Latar Belakang Pemilihan proyek / latar belakang pemilihan lokasi</div>
                                                                    <textarea required name="artikel-deskripsi-1" id="artikel-deskripsi-1" cols="30" rows="16" placeholder="Deskripsi Video Anda.." class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= html_entity_decode($pbl->deskripsi) ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-full h-auto relative">
                                                            <input type="number" value="<?= $jumlah ?>" class="hidden" name="jumlah-mahasiswa" id="jumlah-mahasiswa">
                                                            <div class="text-gray-600 mb-4 font-bold uppercase">Mahasiswa Terlibat</div>
                                                            <div id="mahasiswa-terlibat" class="grid grid-cols-3 mb-4 gap-4">
                                                                <?php $index = 0;
                                                                foreach ($mahasiswa->result() as $item) {
                                                                    $index++; ?>
                                                                    <input type="text" value="<?= $item->no ?>" class="hidden" name="no-<?= $index ?>" id="no-<?= $index ?>">
                                                                    <div id='nama-<?= $index ?>' class="mb-2">
                                                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nama Mahasiswa <?= $index ?></div>
                                                                        <input type="text" value="<?= $item->nama ?>" placeholder="Nama Mahasiswa <?= $index ?>" id="nama-mahasiswa-<?= $index ?>" name="nama-mahasiswa-<?= $index ?>" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                    <div id='program-studi-<?= $index ?>' class="mb-2">
                                                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Program Studi</div>
                                                                        <select id="program-studi-<?= $index ?>" name="program-studi-<?= $index ?>" class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option value="<?= $item->prodi ?>"><?= $item->prodi ?></option>
                                                                            <option disabled>---------------</option>
                                                                            <option value="Sarjana Terapan Teknik Informatika">Sarjana Terapan Teknik Informatika</option>
                                                                            <option value="Sarjana Terapan Teknik Listrik">Sarjana Terapan Teknik Listrik</option>
                                                                            <option value="Diploma Tiga Teknik Listrik">Diploma Tiga Teknik Listrik</option>
                                                                            <option value="Diploma Tiga Teknik Komputer">Diploma Tiga Teknik Komputer</option>
                                                                        </select>
                                                                    </div>
                                                                    <div id='nim-<?= $index ?>' class="mb-2">
                                                                        <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Nim</div>
                                                                        <input type="text" value="<?= $item->nim ?>" id="nim-mahasiswa-<?= $index ?>" name="nim-mahasiswa-<?= $index ?>" placeholder="Contoh: 21024137" required class="border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="container p-5">
                                                        <div class="mb-2">
                                                            <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Original Link</div>
                                                            <input name="original-link" id="original-link" type="text" placeholder="Contoh: <iframe width='560' height='315' src='https://www.youtube.com/embed/fSE4laODlng?si=t_WqD1XcIv6A01d5' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>" class="relative w-full px-1 outline-blue-500 py-3 border text-left pl-3 text-md font-normal rounded-lg">
                                                            <div class="mt-4 mb-4">
                                                                <a onclick="extractLink();" class="bg-transparent mx-auto cursor-pointer hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                                    Extract Link
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <div class="text-gray-400 mb-2 ml-2 font-medium uppercase">Link</div>
                                                            <input name="link" value="<?= $pbl->link ?>" id="link" required type="text" placeholder="Contoh: https://www.youtube.com/watch?v=o5jq..." class="relative w-full px-1 outline-blue-500 py-3 border text-left pl-3 text-md font-normal rounded-lg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                                                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                                    <img class="w-full h-96 rounded-t-2xl" src="<?= base_url('assets/images/thumbnail/' . $pbl->sampul); ?>" id="preview-image-1" alt="profile cover image">
                                                    <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                                                        <div class="flex justify-between">
                                                            <label for="Image-1" class="px-3 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                                                Pilih Sampul
                                                                <input type="file" id="Image-1" name="Image-1" onchange="previewImage(1)" accept="image/*" class="hidden">
                                                            </label>
                                                            <label for="media" class="px-3 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-blue-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                                                Pilih Media
                                                                <input type="file" id="media" name="media" onchange="previewMedia()" accept="application/pdf" class="hidden">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <a href="<?= base_url('assets/file/media/' . $pbl->media); ?>">
                                                        <div id="text-media" class="text-gray-400 text-center ml-2 font-medium uppercase"><?= $pbl->media ?></div>
                                                    </a>
                                                    <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                                                    <div class="text-gray-400 text-center ml-2 font-medium uppercase"><?= $status ?></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- <div class="mt-2">
                        <h2 class="text-2xl font-bold mb-4">Komentar Reviewer</h2>
                        <div id="display-chat" class="grid grid-cols-1 max-h-screen md:grid-cols-2 lg:grid-cols-3 gap-4 overflow-auto scrollbar">

                        </div>
                    </div> -->
                </div>

            </section>
        </main>
    </div>

</body>

</html>

<input type="number" value="0" class="hidden" id="menu-indicator-sidebar">
<input type="text" value="<?= $pbl->no_pbl ?>" class="hidden" id="pbl">

<script>
    CKEDITOR.replace('artikel-deskripsi-1');

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

    function previewMedia() {
        var input = document.getElementById('media');
        var text = document.getElementById('text-media');
        var file = input.files[0];

        // Check if a file is selected
        if (file) {
            text.textContent = file.name;
        } else {
            text.textContent = 'No file selected';
        }
    }

    function extractLink() {
        var originalLink = $("#original-link").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/extractLink'); ?>",
            type: "POST",
            dataType: 'json',
            data: {
                link: originalLink
            },
            success: function(response) {
                $("#link").val(response);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        showComment();
    });


    function showComment() {
        var pbl = $("#pbl").val();
        $.ajax({
            url: "<?php echo base_url('Vidio/showComment/'); ?>" + pbl,
            type: "GET",
            dataType: 'json',
            success: function(response) {
                $("#display-chat").empty();
                $.each(response.data, function(index, item) {
                    $("#display-chat").append(`
                    <div class="bg-white border relative p-4 rounded-md shadow-md pb-16">
                    <input value="${item.id_comment}" class="hidden" id="comment-${index}" type="text">
                        <div class="flex items-center mb-4">
                            <img src="${item.profile}" class="w-8 h-8 rounded-full mr-2">
                            <div>
                                <h3 class="text-sm font-semibold">${item.nama_pengguna} </h3>
                            </div>
                            <div class="absolute right-2 top-1">
                            <span class="text-xs text-gray-600">${item.tanggal}</span>
                            </div>
                        </div>
                        <div class="h-auto w-full mb-2">
                        <p class="text-gray-700">${item.isi}</p>
                        </div>
                        <div id="comment-card-${index}" class="absolute bottom-0 text-center h-10 w-20 right-1 mx-auto ">
                        </div>
                    </div>
                `);
                });
            }
        });
    }
</script>

<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>