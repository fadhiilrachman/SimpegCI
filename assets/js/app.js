function data_izin_edit_or_add_new() {
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'data_izin/nama_izin_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_namaizin).text(data[row].nama_izin));
            }
        });
    });
}

function data_pegawai_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/pegawai_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIP",
                data: 'nip'
            },
            {
                title: "Tempat Lahir",
                data: 'tempat_lahir'
            },
            {
                title: "Tanggal Lahir",
                data: 'tanggal_lahir'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Pendidikan Terakhir",
                data: 'pendidikan_terakhir'
            },
            {
                title: "Status Perkawinan",
                data: 'status_perkawinan'
            },
            {
                title: "Status Pegawai",
                data: 'status_pegawai'
            },
            {
                title: "Nama Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Nama Bidang",
                data: 'nama_bidang'
            },
            {
                title: "Agama",
                data: 'agama'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. KTP",
                data: 'no_ktp'
            },
            {
                title: "No. Rumah",
                data: 'no_rumah'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengangkatan",
                data: 'tanggal_pengangkatan'
            },
            {
                title: "Action",
                data: 'id'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id']) {
                var id = data['id'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_admin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/admin_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'namalengkap'
            },
            {
                title: "Type",
                data: 'type'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Action",
                data: 'id_user'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_user']) {
                var id = data['id_user'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/admin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/admin/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_jabatan_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/jabatan_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Action",
                data: 'id_jabatan'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_jabatan']) {
                var id = data['id_jabatan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/jabatan/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/jabatan/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_bidang_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/bidang_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Bidang",
                data: 'nama_bidang'
            },
            {
                title: "Action",
                data: 'id_bidang'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_bidang']) {
                var id = data['id_bidang'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/bidang/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/bidang/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_namaizin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/namaizin_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Action",
                data: 'id_namaizin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_namaizin']) {
                var id = data['id_namaizin'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/nama_izin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/nama_izin/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function konfirmasi_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'konfirmasi_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Nama Pengguna",
                data: 'nama'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/accept/' + id + '\';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/reject/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-close-circle-outline"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Nama Pengguna",
                data: 'nama'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_izin_index() {
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'daftar_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                if (data['n_status'] !== 'rejected') {
                    html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                }
                if (data['n_status'] == 'approved') {
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                }
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_izin_ajukan() {
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'daftar_izin/nama_izin_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_namaizin).text(data[row].nama_izin));
            }
        });
    });
}
$(document).ready(function() {
    switch (true) {
        case (window.location.href.indexOf('/data_master/admin') != -1):
            data_admin_index();
            break;
        case (window.location.href.indexOf('/data_master/jabatan') != -1):
            data_jabatan_index();
            break;
        case (window.location.href.indexOf('/data_master/bidang') != -1):
            data_bidang_index();
            break;
        case (window.location.href.indexOf('/data_master/pegawai') != -1):
            data_pegawai_index();
            break;
        case (window.location.href.indexOf('/daftar_izin/ajukan') != -1 || window.location.href.indexOf('/daftar_izin/edit') != -1):
            daftar_izin_ajukan();
            break;
        case (window.location.href.indexOf('/daftar_izin') != -1):
            daftar_izin_index();
            break;
        case (window.location.href.indexOf('/data_master/nama_izin') != -1):
            data_namaizin_index();
            break;
        case (window.location.href.indexOf('/konfirmasi_izin') != -1):
            konfirmasi_izin_index();
            break;
        case (window.location.href.indexOf('/data_izin/edit') != -1 || window.location.href.indexOf('/data_izin/add_new') != -1):
            data_izin_edit_or_add_new();
            break;
        case (window.location.href.indexOf('/data_izin') != -1):
            data_izin_index();
            break;
    }
});