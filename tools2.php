<?php
include 'function.php';

$ipaddress = $_SERVER['HTTP_CLIENT_IP']
    ?? $_SERVER["HTTP_CF_CONNECTING_IP"] # when behind cloudflare
    ?? $_SERVER['HTTP_X_FORWARDED']
    ?? $_SERVER['HTTP_X_FORWARDED_FOR']
    ?? $_SERVER['HTTP_FORWARDED']
    ?? $_SERVER['HTTP_FORWARDED_FOR']
    ?? $_SERVER['REMOTE_ADDR']
    ?? '0.0.0.0';

$show_data = false;
$show_error = false;

if (isset($_POST['submit'])) {
    if (!file_exists("output/$ipaddress/")) {
        mkdir("output/$ipaddress");
    }
    if (!file_exists("upload/$ipaddress/")) {
        mkdir("upload/$ipaddress");
    }
    $file_name = "upload/$ipaddress/input-form.csv";
    $file_extension = strtolower(pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION));

    if ($file_extension != "csv") {
        $show_error = true;
        $info_message = "Harap pastikan file yang kamu upload berupa file csv, (.csv)";
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $file_name)) {
            $show_data = true;
            $info_message = "Response Form berhasil di parse :) ";
        } else {
            $show_error = true;
            $info_message = "Gagal upload file, cobalah beberapa saat lagi.";
        }
        if ($show_data == true) {
            $file_data_csv = readCSV("upload/$ipaddress/input-form.csv");
            $header = array_keys($file_data_csv[0]);
            $drive_image = "https://drive.google.com/uc?export=view&id=";
        }
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel=" shortcut icon" type="image/png" href="images/icon.png" />
    <script src="assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
    <script src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <title>CSV Tools</title>
</head>

<body class="flex flex-col selection:bg-sky-200 selection:text-slate-800 ">
    <!-- navbar -->
    <!-- <div class="flex flex-col items-center justify-between gap-6 px-4 py-8 bg-white shadow-gray-500/10 md:flex-row lg:px-32 md:px-8">
        <a href="index.php" class="text-xl font-bold hover:underline decoration-sky-500">CSV Tools</a>
        <div class="flex flex-row flex-wrap items-center gap-6">
            <a href="#about" class="transition duration-300 border-b-2 border-b-white hover:border-b-sky-500 decoration-sky-500 hover:text-sky-600">Tentang</a>
            <a href="data/pendataan-buah-buahan.csv" class="px-4 py-1 text-white transition duration-200 rounded-full bg-sky-500 hover:bg-sky-400">Download Sample CSV</a>
        </div>
    </div> -->

    <!-- content -->
    <div class="flex flex-col flex-grow w-full max-h-screen min-h-screen overflow-auto text-gray-600 ">

        <!-- toolbar -->
        <div class="flex flex-col items-end gap-4 px-4 py-8 border-2 border-gray-300 border-dashed lg:items-center lg:grid-cols-5 md:px-8 lg:px-32 lg:grid -center border-t-gray-200">
            <div class="flex-row items-center justify-center hidden col-span-2 gap-4 lg:flex">
                <span>Pilih dan upload file CSV dari google form kamu di kolom kanan dan setelah itu tekan tombol konvert.</span>
                <div class="flex flex-col items-center justify-center w-12 h-12 text-white rounded-full bg-sky-500 aspect-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </div>
            </div>
            <form action="" method="POST" class="flex flex-col items-end col-span-3 gap-4" enctype="multipart/form-data">
                <input type="file" name="upload" class="text-sm border bordr-gray-300 rounded-full p-1 file:px-3 file:py-1.5 file:text-sm file:bg-sky-200 file:border-none  file:outline-none file:rounded-full">
                <button name="submit" class="px-4 py-1 text-white transition duration-300 rounded-full bg-sky-500 hover:bg-sky-400">Konvert</button>
            </form>
        </div>

        <!-- contents -->

        <div class="flex flex-col flex-grow w-full h-full gap-6 px-4 py-16 overflow-auto md:px-8 lg:px-32 ">

            <!-- content of tables -->

            <!-- content if fail upload data (invalid type file) -->
            <?php if ($show_error == true) : ?>
                <div class="flex flex-col items-center gap-20 lg:grid lg:grid-cols-5">
                    <img src="images/failed.svg" alt="" class="w-full col-span-2 max-w-[300]">
                    <div class="flex flex-col col-span-3 gap-2">
                        <h1 class="text-4xl font-semibold text-gray-800">
                            Gagal Parsing CSV
                        </h1>
                        <span class="text-red-500">Upload file yang extensinya CSV saja.</span>
                    </div>
                </div>
            <?php endif; ?>

            <!-- content if sucess upload data -->
            <?php if ($show_data == true) : ?>
                <!-- table output -->
                <div class="flex flex-col h-full bg-white border shadow-lg border-r-gray-200">
                    <div class="flex flex-row items-center justify-end px-6 py-3 font-semibold text-gray-800 md:justify-between">
                        <span class="hidden md:flex">Data berhasil di parsing.</span>
                        <div class="flex flex-row items-center gap-2 px-3 overflow-hidden text-gray-500 transition duration-200 border border-gray-300 rounded-full hover:border-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text" id="search" placeholder="Cari.." class="px-2 py-1.5 transition duration-200 outline-none focus:border-gray-700">
                        </div>
                    </div>
                    <div class="flex flex-col max-h-full overflow-auto bg-white">
                        <table class="w-full text-xs text-left text-gray-500" id="myTable">
                            <thead class="sticky top-0 text-xs text-gray-800 uppercase bg-gray-100 border-t border-b border-t-gray-200 border-b-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <?php foreach ($header as $head) : ?>
                                        <th scope="col" class="px-6 py-3">
                                            <?= $head; ?>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700" id="table">
                                <?php $i = 1; ?>
                                <?php foreach ($file_data_csv as $data) : ?>
                                    <tr class="bg-white border-b hover:bg-gray-100">
                                        <td scope='col' class='px-6 py-3'><?= $i++; ?></td>
                                        <?php foreach ($header as $head) : ?>
                                            <?php
                                            if (str_containsx($data[$head], "https://drive.google.com/")) {
                                                echo "<td scope='col' class='px-6 py-3'><a href='" . $drive_image .  preg_replace("/.+?(id=)/", "", $data[$head]) . "' target='_blank'><img src='" . $drive_image .  preg_replace("/.+?(id=)/", "", $data[$head])  . "'  width='120' class='object-cover object-center bg-white border border-gray-200 rounded-md shadow-md aspect-video min-w-[100]' alt='Refresh low gambar gk muncul'/></a></td>";
                                            } else {
                                                echo "<td scope='col' class='px-6 py-3 whitespace-nowrap'>" . $data[$head] . "</td>";
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php endif; ?>

        </div>

    </div>


    <script>
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
</body>

</html>