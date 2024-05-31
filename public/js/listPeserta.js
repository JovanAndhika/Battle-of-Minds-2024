
$(document).on("click", "#buktiBtn", function () {
    var userId = $(this).data("user-id");

    const options = {
        placement: 'bottom-right',
        backdrop: 'dynamic',
        closable: true,
        onHide: () => {
            console.log('modal is hidden');
        },
        onShow: () => {
            console.log('modal is shown');
        },
        onToggle: () => {
            console.log('modal has been toggled');
        },
    };

    const instanceOptions = {
        id: 'modal-pembayaran',
        override: true
    };

    $.ajax({
        url: "/admin/getPembayaranUsers/" + userId,
        type: "GET",
        success: function (response) {
            $('.gambar-pembayaran').attr('src', response);


            $("#modal-pembayaran").show();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$(document).on('click', '#closePembayaran', function () {
    $('#modal-pembayaran').hide();
});

$(document).on('click', '#dataBtn', function() {
    var userId = $(this).data("user-id");

    $.ajax({
        url: "/admin/getDataUsers/" + userId,
        type: "GET",
        success: function (response) {
            var body = '<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">' +
            'Nama member 1 :' + response.user.namaSatu + '<br>' + 
            'Kontak member 1 :' + response.user.kontakSatu + 
            '<br>' + 
            'Foto kartu pelajar member 1:' + 
            '<img class="gambar-pembayaran" src="' + response.user.kartuPelajarSatu + '" alt="">' +
            '</p>' + 
            '<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">' +
            'Nama member 2 :' + response.user.namaDua + '<br>' + 
            'Kontak member 2 :' + response.user.kontakDua + 
            '<br>' + 
            'Foto kartu pelajar member 2:' + 
            '<img class="gambar-pembayaran" src="' + response.user.kartuPelajarDua + '" alt="">' +
            '</p>' + 
            '<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">' +
            'Nama member 3 :' + response.user.namaTiga + '<br>' + 
            'Kontak member 3 :' + response.user.kontakTiga + 
            '<br>' + 
            'Foto kartu pelajar member 3:' + 
            '<img class="gambar-pembayaran" src="' + response.user.kartuPelajarTiga + '" alt="">' +
            '</p>'

            $('.modal-body').empty();
            $('.modal-body').append(body);
            $('#modal-peserta').attr('role', 'dialog');


            $("#modal-peserta").show();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$(document).on('click', '#closeData', function () {
    $('#modal-peserta').hide();
});