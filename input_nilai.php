			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?></h4>
                </div>
                <div class="card-body">
				
					<form method="get" action="">
					<div class="form-group">
					<div class="input-group">
						<input type="hidden" name="hal" value="input_nilai">
						<input type="text" class="form-control" name="nm" placeholder="Cari Siswa ....">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
							<a href="index.php?hal=pilihsiswa" class="btn btn-primary"><i class="fa fa-address-book"></i></a>
						</span>
						</div>
					</div>
					</form>
				
					<?php
					if (isset($_GET['nm'])){
					$lsiswa = mysql_query("select * from tbsiswa,tbkelas where tbsiswa.id_kelas=tbkelas.id_kelas and tbsiswa.nm_lengk_siswa = '".$_GET['nm']."'");
					$dsiswa = mysql_fetch_array($lsiswa);
					?>
					
					<form method="post" action="proses_input_nilai.php">
					<table class="table table-striped">
					<tr>
						<td width="20%">Nama Siswa</td>
						<td><?=$dsiswa['nm_lengk_siswa'];?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td><?=$dsiswa['kelas'];?> <?=$dsiswa['ruang'];?></td>
					</tr>
					<tr>
						<td>No. Induk</td>
						<td><?=$dsiswa['NIS'];?></td>
					</tr>
					<tr>
						<td>NISN</td>
						<td><?=$dsiswa['nisn'];?></td>
					</tr>
					<tr>
						<td>Th. Pelajaran</td>
						<td><?=$th_pelajaran;?></td>
					</tr>
					<tr>
						<td>Semester</td>
						<td>
						<select name="semester" class="form-control" style="width:70px">
						<?php
						for ($i=1;$i<=6;$i++){
						$ls = mysql_query("select * from tbnilai,tbsiswa where tbnilai.id_siswa=tbsiswa.id_siswa and tbnilai.semester='$i' and tbsiswa.nm_lengk_siswa = '".$_GET['nm']."'");
						$js = mysql_num_rows($ls);
						
						if ($js == 0){
						?>
							<option><?=$i;?></option>
						<?php
						}
						}
						?>
						</select>
						</td>
					</tr>
					</table>
				
					<input type="hidden" value="<?=$dsiswa['id_siswa'];?>" name="ids">
					<input type="hidden" value="<?=$_GET['nm'];?>" name="nm">
					<input type="hidden" value="<?=$th_pelajaran;?>" name="th_pel">
					<table class="table table-bordered">
					<tr>
						<th width="5%">No</th>
						<th>Mata Pelajaran</th>
						<th width="10%">KI 3 <br>Pengetahuan</th>
						<th width="10%">KI 4 <br>Keterampilan</th>
						<th width="18%">KI 1&2 Sikap <br>Sosial & Spiritual</th>
					</tr>
					<tr>
						<th colspan="2">Kelompok A</th>
						<td colspan="3">Isi Nilai</td>
					</tr>
					<?php
					$no_a=1;
					$lpel_a = mysql_query("select * from tbpelajaran where kelompok = 'A'");
					while ($dpel_a = mysql_fetch_array($lpel_a)){
					?>
					<tr>
						<td><?=$no_a++;?></td>
						<td><?=$dpel_a['nama_pelajaran'];?></td>
						<td><input type="text" name="a_n_peng[]" class="form-control" placeholder="Nilai"></td>
						<td><input type="text" name="a_n_ket[]" class="form-control" placeholder="Nilai"></td>
						<td>
						<input type="hidden" name="a_pel[]" value="<?=$dpel_a['id_pelajaran'];?>">
						<select class="form-control" name="a_n_sikap[]">
							<option>Sangat Baik</option>
							<option>Baik</option>
							<option>Cukup</option>
							<option>Kurang</option>
						</select>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<th colspan="2">Kelompok B</th>
						<td colspan="3" >Isi Nilai</td>
					</tr>
					<?php
					$no_b=1;
					$lpel_b = mysql_query("select * from tbpelajaran where kelompok = 'B'");
					while ($dpel_b = mysql_fetch_array($lpel_b)){
					?>
					<tr>
						<td><?=$no_b++;?></td>
						<td><?=$dpel_b['nama_pelajaran'];?></td>
						<td><input type="text" name="b_n_peng[]" class="form-control" placeholder="Nilai"></td>
						<td><input type="text" name="b_n_ket[]" class="form-control" placeholder="Nilai"></td>
						<td>
						<input type="hidden" name="b_pel[]" value="<?=$dpel_b['id_pelajaran'];?>">
						<select class="form-control" name="b_n_sikap[]">
							<option>Sangat Baik</option>
							<option>Baik</option>
							<option>Cukup</option>
							<option>Kurang</option>
						</select>
						</td>
					</tr>
					<?php } ?>
					<tr>
					<td colspan="4"></td>
					<td><input type="submit" value="Simpan" class="btn btn-block btn-primary"></td>
					</tr>
					</table>
					</form>
					
					<?php } ?>
				</div>
              </div>