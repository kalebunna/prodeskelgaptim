<div class="row">
    <div class="col-md-12">
        <form action="" id="form-filter">
            <div class="row">
                <div class="col-md-4 form-group">
                    <select name="input" id="inputan" class="form-control">
                        <option value="0">PILIH INPUTAN</option>
                        <option value="1">Usia 3 - 6 tahun yang belum masuk TK </option>
                        <option value="2">Usia 3 - 6 tahun yang sedang TK/play group </option>
                        <option value="3">Usia 7 - 18 tahun yang tidak pernah sekolah </option>
                        <option value="4">Usia 7 - 18 tahun yang sedang sekolah </option>
                        <option value="5">Usia 18 - 56 tahun tidak pernah sekolah </option>
                        <option value="6">Usia 18 - 56 tahun pernah SD tetapi tidak tamat </option>
                        <option value="7">Usia 12 - 56 tahun tidak tamat SLTP </option>
                        <option value="8">Usia 18 - 56 tahun tidak tamat SLTA </option>
                        <option value="9">Tamat SD/sederajat </option>
                        <option value="10">Tamat SMP/sederajat </option>
                        <option value="11">Tamat SMA/sederajat </option>
                        <option value="12">Tamat D-1/sederajat </option>
                        <option value="13">Tamat D-2/sederajat </option>
                        <option value="14">Tamat D-3/sederajat </option>
                        <option value="15">Tamat S-1/sederajat </option>
                        <option value="16">Tamat S-2/sederajat </option>
                        <option value="17">Tamat S-3/sederajat </option>
                        <option value="18">Tamat SLB A </option>
                        <option value="19">Tamat SLB C </option>
                        <option value="20">Tamat SLB B </option>
                    </select>
                </div>
                <div class="col-md-1 form-group">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
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
		"columns": [
            {
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
        $.ajax({
			type: "GET",
			url: "<?= base_url("pendidikan/filter/") ?>" + $("#inputan option:selected").val() +"/"+  $("#tahun option:selected").val(),
			dataType: "json",
			success: function(response) {
				$("#laki").html(response.laki);
				$("#perem").html(response.perem);
				$("#total").html((response.laki += response.perem));
			}
		})
        data_table.ajax.url("<?= base_url("pendidikan/filter/") ?>" + $("#inputan option:selected").val() +"/"+  $("#tahun option:selected").val()).load();
        
		e.preventDefault();
    });
</script>