			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?></h4>
                </div>
                <div class="card-body">
					<form method="post" action="proses_tambah_pelajaran.php">
					<div class="form-group">
						<label>Nama Pelajaran</label>
						<input type="text" class="form-control" name="nama_pelajaran" required ="required" id="pelajaran">
					</div>
					<div class="form-group">
						<label>KKM Kelas VII</label>
						<input type="text" class="form-control" name="kkm_7" required ="required" id="kkm7">
					</div>
					<div class="form-group">
						<label>KKM Kelas VIII</label>
						<input type="text" class="form-control" name="kkm_8" required ="required" id="kkm8">
					</div>
					<div class="form-group">
						<label>KKM Kelas IX</label>
						<input type="text" class="form-control" name="kkm_9" required ="required" id="kkm9">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Simpan"> 
						<input type="reset" class="btn btn-danger" value="Batal">
					</div>
					</form>
				</div>
              </div>