<div class="row">
    <div class="col-md-12">
        <form action="" id="form-filter">
            <div class="row">
                <div class="col-md-4 form-group">
                    <select name="input" id="inputan" class="form-control">
                        <option value="0">YANG TIDAK BEKERJA</option>
                        <option value="1">YANG SEDANG BEKERJA</option>
                        <option value="2">ANGKATAN KERJA</option>
                        <option value="3">USIA 57 KEATAS</option>
                        <option value="4">USIA 0 - 6 TATHUN</option>
                        <option value="5">USIA 18 - 56 TATHUN</option>
                        <!-- <option value="3">USIA 56  KEATAS</option> -->
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                Laki-Laki : <span id="laki"></span>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                Perempuan : <span id="perem"></span>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                Total : <span id="total"></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 card">
        <div class="card-body">
            <div class="user-status table-responsive">
                <table class="table table-bordered table-hover" id="data">
                    <thead>
                        <tr>
                            <th scope="col">NO KK</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">LAHIR</th>
                            <th scope="col">TANGGAL LAHIR</th>
                            <th scope="col">UMUR</th>
                            <th scope="col">PEKERJAAN</th>
                            <th scope="col">PEND TERAKHIR</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">AYAH</th>
                            <th scope="col">IBU</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">RT</th>
                            <th scope="col">RW</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var data_table = $('#data').DataTable({
        "ajax": "",
        "columns": [{
                "data": "NO_KK"
            },
            {
                "data": "NIK"
            },
            {
                "data": "NAMA_LENGKAP"
            },
            {
                "data": "TMP_LHR"
            },
            {
                "data": "TGL_LHR"
            },
            {
                "data": "umur"
            },
            {
                "data": "KERJA"
            },
            {
                "data": "DIDIK"
            },
            {
                "data": "JK"
            },
            {
                "data": "AYAH"
            },
            {
                "data": "IBU"
            },
            {
                "data": "ALAMAT"
            },
            {
                "data": "RT"
            },
            {
                "data": "RW"
            },

        ]
    });
    $("#form-filter").submit(function(e) {
        let data = $("#inputan option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url("Angkatan_kerja/filter/") ?>" + data,
            dataType: "json",
            success: function(response) {
                $("#laki").html(response.laki);
                $("#perem").html(response.perem);
                $("#total").html((response.laki += response.perem));
            }
        })
        data_table.ajax.url("<?= base_url("Angkatan_kerja/filter/") ?>" + $("#inputan option:selected").val()).load();

        e.preventDefault();
    });
</script>