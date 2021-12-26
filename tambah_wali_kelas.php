			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?></h4>
                </div>
                <div class="card-body">
					<form method="post" action="proses_tambah_wk.php">
					<div class="form-group">
						<label>NIP / NUPTK</label>
						<input type="text" class="form-control" name="nip_nuptk">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama_wk">
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="tmpt_lhr">
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="text" class="form-control" name="tgl_lhr">
					</div>
					<div class="form-group">
						<label>Wali Kelas</label>
						<select name="id_kelas" class="form-control col-md-1">
								<?php
								$tampil=mysql_query("select * from tbkelas");
								while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_kelas] selected>$w[kelas]</option>";
								}
								echo"</select>";
								?>
					</div>
					<div class="form-group">
						<label>Tahun Pelajaran</label>
						<select name="id_thpelajaran" class="form-control col-md-2">
								<?php
								$tampil=mysql_query("select * from tbth_pelajaran");
								while($w=mysql_fetch_array($tampil)){
								echo "<option value=$w[id_thpelajaran] selected>$w[th_pelajaran]</option>";
								}
								echo"</select>";
								?>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Simpan"> 
						<input type="reset" class="btn btn-danger" value="Batal">
					</div>
					</form>
				</div>
              </div>