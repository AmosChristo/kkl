<?php
date_default_timezone_set("Asia/Jakarta");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function base_url($url = "")
{
    if (empty($url)) {
        return 'http://localhost:8080/mpti/';
    }

    return 'http://localhost:8080/mpti/' . $url;
}

function slug($url)
{
    $url = preg_replace('~[^\\pL\d]+~u', '-', $url);
    $url = trim($url, '-');
    $url = iconv('utf-8', 'us-ascii//TRANSLIT', $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-\w]+~', '', $url);
    if (empty($url)) {
        return 'n-a';
    }
    return $url;
}

function tgl_indo($tanggal, $cetak_hari = false, $cetak_jam = false, $hari_only = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $split = explode(' ', $tanggal);
    $tgl = explode('-', $split[0]);
    $jam = explode(':', $split[1]);

    $tgl_indo = $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];

    if ($cetak_hari == true && $cetak_jam == false) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }

    if ($cetak_hari == true && $cetak_jam == true) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo . ' | ' . $jam[0] . ':' . $jam[1] . ' WIB';
    }

    if ($cetak_hari == false && $cetak_jam == true) {
        return $tgl_indo . ' | ' . $jam[0] . ':' . $jam[1] . ' WIB';
    }

    if ($cetak_hari == false && $cetak_jam == false && $hari_only == true) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num];
    }

    return $tgl_indo;
}


function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . "...";
    }
    return $text;
}

function img_encode($url)
{
    $img = file_get_contents($url);
    $base64 = base64_encode($img);

    return $base64;
}

function set_cookie($nama, $value, $hari)
{
    setcookie($nama, $value, time() + (60 * 60 * 24 * $hari), '/');
}

function unset_cookie($nama)
{
    setcookie($nama, '', 0, '/');
}

function cek_cookie($nama)
{
    include 'koneksi.php';
    if (isset($_COOKIE[$nama])) {
        $value = $_COOKIE[$nama];
        $ambil = $koneksi->query("SELECT * FROM user WHERE $nama = '$value'");
        $_SESSION['user'] = $ambil->fetch_assoc();
    }
}

function cvt_no($nohp)
{
    // kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")", "", $nohp);
    // kadang ada penulisan no hp 0811.239.345
    $nohp = str_replace(".", "", $nohp);

    // cek apakah no hp mengandung karakter + dan 0-9
    if (!preg_match('/[^+0-9]/', trim($nohp))) {
        // cek apakah no hp karakter 1-3 adalah +62
        if (substr(trim($nohp), 0, 3) == '+62') {
            $hp = trim($nohp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif (substr(trim($nohp), 0, 1) == '0') {
            $hp = '+62' . substr(trim($nohp), 1);
        }
    }
    print $hp;
}
