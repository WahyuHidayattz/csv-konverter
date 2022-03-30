<?php

//=============================================================
//
// Function untuk mempermudah operasi PHP
//
//=============================================================

//=============================================================
// Koneksi , untuk koneksi ke SQL dan tarik Rows dari table
//=============================================================
function koneksi($host, $user, $pass, $db)
{
    return mysqli_connect($host, $user, $pass, $db);
}

function query($koneksi, $string)
{
    $array = [];
    $query = mysqli_query($koneksi, $string);
    if (mysqli_affected_rows($koneksi) > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
            $array[] = $data;
        }
    }

    return $array;
}


//=============================================================
// Fungsi untuk membaca file CSV yang ada di server
//=============================================================
function readCSV($path)
{
    $rows = array_map('str_getcsv', file($path));
    $header = array_shift($rows);
    $csv = [];
    foreach ($rows as $row) {
        $csv[] = array_combine($header, $row);
    }
    return $csv;
}

//============================================================
// Fungsi untuk menulis file CSV
//============================================================
function writeCSV($array, $targetfilename)
{
    $file = fopen($targetfilename, "w");
    foreach ($array as $data) {
        fputcsv($file, $data);
    }

    fclose($file);
}


//=============================================================
// Fungsi untuk melookup value dari data array
// Seperti vlookup di excel
//=============================================================
function vlookup($lookup, $array)
{
    $res = "";
    foreach ($array as $key => $value) {
        if ($lookup == $key) {
            $res = $value;
        }
    }

    return $res;
}


//=============================================================
// Fungsi untuk memanggil master item (plu)
//=============================================================

function masterplu()
{
    return readCSV("../laporan/files/master-plu.csv");
}

function convertDayName($oldname)
{
    $hari = [
        "Mon" => "Senin",
        "Tue" => "Selasa",
        "Wed" => "Rabu",
        "Thu" => "Kamis",
        "Fri" => "Jumat",
        "Sat" => "Sabtu",
        "Sun" => "Minggu"
    ];

    return vlookup($oldname, $hari);
}



function str_containsx($haystack, $needle)
{
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}


// fungsi untuk format number
function numfor($string)
{
    return number_format($string);
}

function numdec($string)
{
    return number_format($string, 2, ".", "");
}


// fungsi untuk koneksi ke server 
function mysqlserver4()
{
    return koneksi("192.168.90.4", "root", "123456", "dev");
}

function mysqlserverlocal()
{
    return koneksi("localhost", "wahyu", "123", "wahyu");
}

function mysqlserver26()
{
    return koneksi("192.168.89.26", "root", "123456", "eis");
}

function mysqlserver225()
{
    return koneksi("192.168.89.225", "root", "cabang123", "poscabang");
}

function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
}

function validatedate2($date)
{
    if (str_containsx($date, '-')) {
        return true;
    }
    return false;
}
