			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?></h4>
                </div>
                <div class="card-body">
					<form method="post" action="proses_tambah_kelas.php">
					<div class="form-group">
						<label>Kelas</label>
						<select class="form-control" name="kelas">
							<option>VII</option>
							<option>VIII</option>
							<option>IX</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ruang</label>
						<input type="text" class="form-control" name="ruang" required ="required" id="ruang">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Simpan"> 
						<input type="reset" class="btn btn-danger" value="Batal">
					</div>
					</form>
				</div>
              </div>