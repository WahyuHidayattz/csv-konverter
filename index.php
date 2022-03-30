<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel=" shortcut icon" type="image/png" href="images/icon.png" />
    <title>CSV Tools</title>
</head>

<body class="flex flex-col selection:bg-sky-200 selection:text-slate-800">

    <!-- content -->
    <div class="flex flex-col w-full min-h-screen">
        <!-- navbar -->
        <div class="sticky top-0 flex flex-col items-center justify-between gap-6 px-4 py-8 bg-white shadow-lg shadow-gray-500/10 md:px-8 lg:px-32 md:flex-row">
            <a href="" class="text-xl font-bold hover:underline decoration-sky-500">CSV Tools</a>
            <div class="flex flex-row flex-wrap items-center gap-6">
                <a href="#fitur" class="transition duration-300 border-b-2 border-b-white hover:border-b-sky-500 decoration-sky-500 hover:text-sky-600">Apa Fiturnya</a>
                <a href="#demo" class="transition duration-300 border-b-2 border-b-white hover:border-b-sky-500 decoration-sky-500 hover:text-sky-600">Demo</a>
                <a href="#about" class="transition duration-300 border-b-2 border-b-white hover:border-b-sky-500 decoration-sky-500 hover:text-sky-600">Tentang</a>
                <a href="tools.php" class="px-4 py-1 text-white transition duration-200 rounded-full bg-sky-500 hover:bg-sky-400">Coba Sekarang</a>
            </div>
        </div>

        <!-- content -->
        <div class="flex flex-col items-center justify-center flex-grow gap-12 px-4 md:px-8 lg:px-32 lg:grid lg:grid-cols-7 ">
            <div class="flex flex-col items-start col-span-3 gap-6 ">
                <h1 class="text-4xl leading-snug">Baca file <span class="font-bold text-sky-500">CSV</span> Anda, dengan cepat dan mudah <span class="font-semibold">dibaca</span></h1>
                <span>Pengen liat file CSV kamu tapi males buka excel ? gampang, tinggal upload file CSV kamu disini dan langsung terlihat hasilnya.</span>
                <div class="flex flex-row items-center gap-4">
                    <a href="tools.php" class="flex flex-row items-center gap-2 px-4 py-2 text-white transition duration-200 rounded-full shadow-lg bg-sky-500 hover:bg-sky-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        Coba Sekarang
                    </a>
                    <a href="#fitur" class="flex flex-row items-center gap-2 px-4 py-2 transition duration-200 bg-white border border-gray-200 rounded-full shadow-lg text-sky-500 hover:bg-sky-100 hover:border-sky-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Apa fiturnya ?
                    </a>
                </div>
            </div>
            <div class="flex-col items-center justify-center hidden h-full col-span-4 lg:flex">
                <div class="flex flex-col items-center justify-center w-full rounded-full bg-[url('../images/blob.svg')] bg-cover bg-center">
                    <img src="images/notebook.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center gap-12 px-4 py-16 md:px-8 lg:px-32 text-slate-300 bg-slate-900">
        <span class="py-2 text-xl font-semibold border-b-2 border-b-sky-500" id="fitur">Fitur yang ditawarkan</span>
        <ul class="grid w-full grid-cols-1 gap-8 lg:grid-cols-3 xl:grid-cols-4 md:grid-cols-2">
            <li class="group">
                <div class="flex flex-col justify-center h-full gap-2 px-6 py-6 transition duration-300 border rounded-md shadow-lg bg-slate-800 border-slate-700 text-slate-300 group-hover:border-sky-500">
                    <span class="font-semibold text-slate-100">Mudah dibaca</span>
                    Data CSV kamu mudah dibaca dibanding pake text editor doang
                </div>
                <div class="flex flex-col items-center justify-center w-10 h-10 px-4 py-4 text-xl font-semibold transition duration-300 -translate-x-4 -translate-y-6 rounded-full shadow-lg bg-sky-500 text-slate-800 group-hover:bg-sky-400">
                    1
                </div>
            </li>
            <li class="group">
                <div class="flex flex-col justify-center h-full gap-2 px-6 py-6 transition duration-300 border rounded-md shadow-lg bg-slate-800 border-slate-700 text-slate-300 group-hover:border-sky-500">
                    <span class="font-semibold text-slate-100">Cepat</span>
                    Takut kuota abis ? gk bakalan file CSV tuh rata-rata kecil gk gede ukurannya.
                </div>
                <div class="flex flex-col items-center justify-center w-10 h-10 px-4 py-4 text-xl font-semibold transition duration-300 -translate-x-4 -translate-y-6 rounded-full shadow-lg bg-sky-500 text-slate-800 group-hover:bg-sky-400">
                    2
                </div>
            </li>
            <li class="group">
                <div class="flex flex-col justify-center h-full gap-2 px-6 py-6 transition duration-300 border rounded-md shadow-lg bg-slate-800 border-slate-700 text-slate-300 group-hover:border-sky-500">
                    <span class="font-semibold text-slate-100">Aman</span>
                    Tentusaja aman, sistem disini gk pake database dll, jadi siapa yang upload juga gk bakal kethuan.
                </div>
                <div class="flex flex-col items-center justify-center w-10 h-10 px-4 py-4 text-xl font-semibold transition duration-300 -translate-x-4 -translate-y-6 rounded-full shadow-lg bg-sky-500 text-slate-800 group-hover:bg-sky-400">
                    3
                </div>
            </li>
            <li class="group">
                <div class="flex flex-col justify-center h-full gap-2 px-6 py-6 transition duration-300 border rounded-md shadow-lg bg-slate-800 border-slate-700 text-slate-300 group-hover:border-sky-500">
                    <span class="font-semibold text-slate-100">Gambar dari form</span>
                    Yap, kamu juga bisa secara lihat gambar pada response google form (csv) tanpa perlu ramas rumus. Asalkan folder gambar di publish public.
                </div>
                <div class="flex flex-col items-center justify-center w-10 h-10 px-4 py-4 text-xl font-semibold transition duration-300 -translate-x-4 -translate-y-6 rounded-full shadow-lg bg-sky-500 text-slate-800 group-hover:bg-sky-400">
                    4
                </div>
            </li>
        </ul>
    </div>

    <!-- demo -->
    <div class="flex flex-col items-center gap-12 px-4 py-16 md:px-8 lg:px-32 text-slate-300 bg-slate-900">
        <span class="py-2 text-xl font-semibold border-b-2 border-b-sky-500" id="demo">Demo</span>
        <div class="flex flex-col items-center gap-8 lg:grid lg:grid-cols-6 lg:gap-12">
            <div class="flex flex-col col-span-2 gap-6 text-xl">
                <h1 class="text-2xl font-semibold text-white ">Demo Video</h1>
                Saksikanlah demo penggunaan web ini, kalo anda tahu sebenarnya ini lumayan luar biasa. Bisa membantu kamu menyelesaikan pekerjaan kantor dan survey google form.
            </div>
            <div class="w-full col-span-4">
                <iframe width="560" height="315" src="data/demo.mp4" frameborder="0" allowfullscreen class="object-cover object-center w-full h-full overflow-hidden border shadow-lg outline-none aspect-video bg-slate-700 border-slate-600"></iframe>
                </iframe>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>