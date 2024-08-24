<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Project Based Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto max-w-4xl py-8 bg-white rounded-lg shadow-md mt-20 relative">
        <!-- Kop Polimdo -->
        <div class="text-center flex mb-8">
            <div class="w-[20%]">
            <img src="<?=base_url('assets/images/logo/logos/polimdo.png');?>" class="h-32 w-32 mx-auto mb-2" />
            </div>
            <div class="w-[80%] bg-white h-20 pt-4">
                    <h1 class="text-3xl font-serif">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN POLITEKNIK NEGERI MANADO</h1>
                    <p class="text-xs">Alamat Kantor: Kampus Politeknik, JL. Raya Politeknik Kel. Buh, Manado PO BOX 1256 - 95252</p>
                    <p class="text-xs">Tel: (0431) 815212, 815212 Fax. (0431) 811568, 815192, 815144</p>
                    <p class="text-xs">Website: www.polimdo.ac.id Email : <span class="undeline">informasi@polimdo.ac.id</span></p>
            </div>
        </div>
        <div class="bg-black w-full h-1"></div>

        <div class="text-center mb-4">
        <h1 class="text-3xl uppercase font-serif mt-4">Project Based Learning</h1>
        </div>
        <!-- Informasi Project Based Learning -->
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Informasi Project Based Learning</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full ">
                    <tbody class="bg-white ">
                        <tr>
                            <td class="font-bold pr-9">Judul</td>
                            <td class="font-bold pr-9">:</td>
                            <td><?=$detail->judul_pbl?></td>
                        </tr>
                        <tr>
                            <td class="font-bold pr-9">Dosen Pengampuh</td>
                            <td class="font-bold pr-9">:</td>
                            <td><?=$dosen->firstname.' '.$dosen->lastname?></td>
                        </tr>
                        <tr>
                            <td class="font-bold pr-9">Latar Belakang</td>
                            <td class="font-bold pr-9">:</td>
                            <td><?=html_entity_decode($detail->deskripsi)?></td>
                        </tr>
                        <tr>
                            <td class="font-bold pr-9">Tanggal</td>
                            <td class="font-bold pr-9">:</td>
                            <td><?=tanggal($detail->tanggal);?></td>
                        </tr>
                        <tr>
                            <td class="font-bold pr-9">Nilai Project</td>
                            <td class="font-bold pr-9">:</td>
                            <td><?=$detail->nilai?></td>
                        </tr>
                        <tr>
                            <td class="font-bold pr-4">Nilai Huruf</td>
                            <td class="font-bold pr-4">:</td>
                            <td><?=$nilai?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Daftar Mahasiswa Terlibat -->
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Mahasiswa Terlibat</h2>
            <div class="relative overflow-x-auto text-center">
                <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center rounded-s-lg">
                                Nama Mahasiswa
                            </th>
                            <th scope="col" class="px-6 text-center py-3">
                                Program Studi
                            </th>
                            <th scope="col" class="px-6 py-3 text-center rounded-e-lg">
                                Nim
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $index=0; foreach ($laporan->result() as $item) { $index++;?>
                        <tr class="bg-white dark:bg-gray-800 text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?=$item->nama?>
                            </th>
                            <td class="px-6 py-4">
                            <?=$item->prodi?>
                            </td>
                            <td class="px-6 py-4">
                            <?=$item->nim?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Keterangan Nilai -->
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Keterangan Nilai:</h2>
            <ul>
                <li><span class="font-bold">81-100 (A):</span> Amat Baik</li>
                <li><span class="font-bold">66-80 (B):</span> Baik</li>
                <li><span class="font-bold">56-65 (C):</span> Cukup</li>
                <li><span class="font-bold">46-55 (D):</span> Kurang</li>
                <li><span class="font-bold">0-45 (E):</span> Sangat Kurang</li>
            </ul>
        </div>
        <div class="text-center absolute right-5 bottom-3">
            <button onclick="printPage()" class="inline-block hidden-print bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">Download Report <i class="fa-solid fa-download"></i></button>
        </div>

    </div>
</body>

</html>
<script>
    function printPage() {
        window.print();
    }
</script>