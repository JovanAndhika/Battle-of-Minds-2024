
$(document).on("click", "#buktiBtn", function () {
    var userId = $(this).data("user-id");
    var header = $(this).data('header');
    var nama_modal;

    if (header == 'ktm') {
        nama_modal = 'Modal Foto KTM Peserta'
    } else if (header == 'bayar') {
        nama_modal = 'Modal Pembayaran Peserta'
    }
    $('.data-header').empty();
    $('.data-header').append(nama_modal);

    // const options = {
    //     placement: 'bottom-right',
    //     backdrop: 'dynamic',
    //     closable: true,
    //     onHide: () => {
    //         console.log('modal is hidden');
    //     },
    //     onShow: () => {
    //         console.log('modal is shown');
    //     },
    //     onToggle: () => {
    //         console.log('modal has been toggled');
    //     },
    // };

    // const instanceOptions = {
    //     id: 'modal-pembayaran',
    //     override: true
    // };

    $.ajax({
        url: "/admin/getPembayaranUsers/" + userId,
        type: "GET",
        data: {
            modal: header,
            nomor: $(this).data('nomor-user')
        },
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

$(document).on('click', '#dataBtn', function () {
    var userId = $(this).data("user-id");

    $.ajax({
        url: "/admin/getDataUsers/" + userId,
        type: "GET",
        success: function (response) {
            var body = '<h1 class="flex justify-center text-xl font-bold"> Email : ' + response.user.emailPerwakilan + '</h1>' +
                '<table class="w-full text-sm text-left rtl:text-right">'+
                '<thead class="text-xs uppercase" >'+
                    '<tr class="border-b border-gray-200">'+
                        '<th scope="col" class="px-6 py-3 border-e">No</th>'+
                        '<th scope="col" class="px-6 py-3 border-e">Nama Member</th>'+
                        '<th scope="col" class="px-6 py-3 border-e">Kontak Member</th>'+
                        '<th scope="col" class="px-6 py-3">Foto Member</th>'+
                    '</tr>'+
            '</thead>'+
                '<tbody>'+
                    '<tr class="border-b border-gray-200">'+
                        '<td class="px-6 py-4 border-e">1</td>' +
                        '<td class="px-6 py-4 border-e">' + response.user.namaSatu + '</td>'+
                        '<td class="px-6 py-4 border-e">' + response.user.kontakSatu + '</td>'+
                        '<td class="px-6 py-4"><button type="button" data-user-id="'+ userId +'" data-nomor-user="1" data-header="ktm" id="buktiBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">View Foto</button></td>'+
                    '</tr>'+
                    '<tr class="border-b  border-gray-200">'+
                        '<td class="px-6 py-4 border-e">2</td>' +
                        '<td class="px-6 py-4 border-e">' + response.user.namaDua + ' </td>'+
                        '<td class="px-6 py-4 border-e">' + response.user.kontakDua + '</td>'+
                        '<td class="px-6 py-4"><button type="button" data-user-id="'+ userId +'" data-nomor-user="2" data-header="ktm" id="buktiBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">View Foto</button></td>'+
                    '</tr>'+
                    '<tr class="border-b border-gray-200">'+
                        '<td class="px-6 py-4 border-e">3</td>' +
                        '<td class="px-6 py-4 border-e">' + response.user.namaTiga + '</td>'+
                        '<td class="px-6 py-4 border-e">' + response.user.kontakTiga + '</td>'+
                        '<td class="px-6 py-4"><button type="button" data-user-id="'+ userId +'" data-nomor-user="3" data-header="ktm" id="buktiBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">View Foto</button></td>'+
                    '</tr>'+
                '</tbody>'+
        '</table>';

            $('.modal-body').empty();
            $('.modal-body').append(body);
            $('#modal-peserta').attr('role', 'dialog');
            $('.data-header').empty();


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