/*  ---------------------------------------------------
    Template Name: Male Fashion
    Description: Male Fashion - ecommerce teplate
    Author: Colorib
    Author URI: https://www.colorib.com/
    Version: 1.0
    Created: Colorib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.product__filter').length > 0) {
            var containerEl = document.querySelector('.product__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*-----------------------
        Hero Slider
    ------------------------*/
    $(".hero__slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_left'><span/>", "<span class='arrow_right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select").niceSelect();

    /*-------------------
        Radio Btn
    --------------------- */
    $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").on('click', function () {
        $(".product__color__select label, .shop__sidebar__size label, .product__details__option__size label").removeClass('active');
        $(this).addClass('active');
    });
    $(".product__details__option__warna label").on('click', function () {
        $(".product__details__option__warna label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
        Scroll
    --------------------- */
    $(".nice-scroll").niceScroll({
        cursorcolor: "#0d0d0d",
        cursorwidth: "5px",
        background: "#e5e5e5",
        cursorborder: "",
        autohidemode: true,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end


    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hours</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Minutes</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Seconds</p> </div>"));
    });

    /*------------------
        Magnific
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="fa fa-angle-up dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-down inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    var proQty = $('.pro-qty-2');
    proQty.prepend('<span class="fa fa-angle-left dec qtybtn"></span>');
    proQty.append('<span class="fa fa-angle-right inc qtybtn"></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    /*------------------
        Achieve Counter
    --------------------*/
    $('.cn_num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

})(jQuery);

// Embedly
document.querySelectorAll('oembed[url]').forEach(element => {
    // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
    // to discover the media.
    const anchor = document.createElement('a');

    anchor.setAttribute('href', element.getAttribute('url'));
    anchor.className = 'embedly-card';

    element.appendChild(anchor);
});

// Checkout Whatsapp
$(document).on('click', '.btn_checkout', function () {

    var wa_tuj = $("#wa_tujuan").val();
    var wa_harga = $("#wa_harga").val();
    var wa_produk = $("#wa_produk").val();
    var wa_nama = $("#wa_nama").val();
    var wa_email = $("#wa_email").val();
    var wa_nomor = $("#wa_nomor").val();
    var wa_pos = $("#wa_pos").val();
    var wa_alamat = $("#wa_alamat").val();
    var wa_jumlah = $("#wa_jumlah").val();
    //var wa_ukuran = $('input[name="ukuran"]:checked').val();
    //var wa_warna = $('input[name="warna"]:checked').val();

    var multiply = wa_harga * wa_jumlah;
    var wa_harga = wa_harga.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    var wa_total = multiply.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");


    if (wa_nama == null || wa_nama == "" || wa_email == null || wa_email == "" || wa_nomor == null || wa_nomor == "" || wa_pos == null || wa_pos == "" || wa_alamat == null || wa_alamat == "") {
        alert("Isi semua Formulir lalu klik Checkout.");
        return false;
    } else {
        /* Whatsapp Settings */
        var walink = 'https://web.whatsapp.com/send',
            phone = wa_tuj,
            walink2 = '*Halo saya ingin memesan*',
            text_yes = 'Terkirim.';

        /* Smartphone Support */
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var walink = 'whatsapp://send';
        }

        /* Final Whatsapp URL */
        var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '_*Detail Produk*_ : ' + '%0A' +
            '*[1] Nama Produk* : ' + wa_produk + '%0A' +
            '*[2] Quantity* : ' + wa_jumlah + ' Buah %0A' +
            //'*[3] Ukuran* : ' + wa_ukuran + '%0A' +
            //'*[4] Warna* : ' + wa_warna + '%0A%0A' +
            '_*Informasi Diri*_ : ' + '%0A' +
            '*[1] Nama* : ' + wa_nama + '%0A' +
            '*[2] Email* : ' + wa_email + '%0A' +
            '*[3] Nomor* : ' + wa_nomor + '%0A%0A' +
            '_*Informasi Pengiriman*_ : ' + '%0A' +
            '*[1] Kode Pos* : ' + wa_pos + '%0A' +
            '*[2] Alamat* : ' + wa_alamat + '%0A%0A' +
            '_*Total Pembayaran*_ : ' + '%0A' +
            '*[1] Harga Produk* : Rp.' + wa_harga + '%0A' +
            '*[2] Quantity* : ' + wa_jumlah + ' Buah %0A' +
            '*[3] Total Harga* : Rp.' + wa_total + '%0A%0A' +
            '_*Catatan*_ : ' + '%0A' +
            '_Total harga diatas belum termasuk ongkir. Untuk biaya ongkir akan diberitahuan setelah dilakukan pengecekan alamat. Terima Kasih._' + '%0A';

        /* Whatsapp Window Open */
        window.open(blanter_whatsapp, '_blank');
        alert(text_yes);
    };

});

// Contact Whatsapp
// Checkout Whatsapp
$(document).on('click', '.btn_contact', function () {
    var wa_nama = $("#wa_nama").val();
    var wa_email = $("#wa_email").val();
    var wa_pesan = $("#wa_pesan").val();
    var wa_tuj = $("#wa_tujuan").val();

    if (wa_email == null || wa_email == "" || wa_pesan == null || wa_pesan == "" || wa_nama == null || wa_nama == "") {
        alert("Isi semua Formulir lalu klik Message.");
        return false;
    } else {
        /* Whatsapp Settings */
        var walink = 'https://web.whatsapp.com/send',
            phone = wa_tuj,
            walink2 = '*Halo saya ingin bertanya*',
            text_yes = 'Terkirim.';


        /* Smartphone Support */
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var walink = 'whatsapp://send';
        }

        /* Final Whatsapp URL */
        var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
            '*Nama* : ' + wa_nama + '%0A' +
            '*Email* : ' + wa_email + '%0A%0A' +
            '*Isi Pesan* : ' + '%0A' + wa_pesan;

        /* Whatsapp Window Open */
        window.open(blanter_whatsapp, '_blank');
        alert(text_yes);
    };

});