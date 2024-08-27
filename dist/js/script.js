// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Ubah Kategori
$(document).on("click", "#btneditkategori", function () {
    document.getElementById("formeditkategori").style.display = "block";
    var id_kat = $(this).data('id');
    var nama_kat = $(this).data('nama');


    $("#formeditkategori #ideditkat").val(id_kat);
    $("#formeditkategori #kategori").val(nama_kat);
});

// Image Preview
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').attr('src', event.target.result);
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

$("#foto").change(function () {
    imagePreview(this);
});

// Favicon Preview
function faviconPreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview_icon').attr('src', event.target.result);
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

$("#favicon").change(function () {
    faviconPreview(this);
});

// Get filename foto
$('#foto').on('change', function () {
    var fileName = $(this).val().replace('C:\\fakepath\\', "");
    $(this).next('.filename_foto').html(fileName);
});

// Get filename favicon
$('#favicon').on('change', function () {
    var fileName = $(this).val().replace('C:\\fakepath\\', "");
    $(this).next('.filename_favicon').html(fileName);
});

// Memanggil CKEditor5 + CKFinder
document.addEventListener("DOMContentLoaded", function (event) {
    var numb = 1;
    do {
        ClassicEditor
            .create(document.querySelector('.editor-berita' + numb), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'outdent', 'indent', '|', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo'],
                heading: {
                    options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    }
                    ]
                },
                language: 'id'
            })
            .catch(error => {
                console.error(error);
            });
        numb++;
    }
    while (numb <= 4);
});