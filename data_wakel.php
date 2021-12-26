			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?></h4>
                </div>
                <div class="card-body">
				<form method="get" action="">
				<div class="form-group">
					<input type="hidden" name="hal" value="data_wakel">
					<input type="text" name="cari" placeholder="Masukan kata kunci..." class="form-control">
				</div>
				</form>
				
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP/NUPTK</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Kelas</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  if (isset($_GET['nohal'])){
						  $nohal = $_GET['nohal'];
					  } else {
						  $nohal = 1;
					  }
					  $ph = 5;
					  $start = ($nohal - 1) * $ph;
					  $no = $start+1;
					  $la = mysqli_query($connect,"select * from tbwali_kelas, tbadmin where tbwali_kelas.username=tbadmin.username limit $start,$ph");
					  while ($da = $la->fetch_array(MYSQLI_ASSOC)){
					  
					  $la2 = mysqli_query($connect,"select * from tbkelas where id_kelas = '".$da['id_kelas']."'");
					  $da2 = $la2->fetch_array(MYSQLI_ASSOC)
					  ?>
                        <tr>
                          <th scope="row"><?=$no;?></th>
                          <td><?=$da['nip_nuptk'];?></td>
                          <td><?=$da['nama_lengkap'];?></td>
                          <td><?=$da['tempat_lahir'];?>, <?=$da['tgl_lahir'];?></td>
                          <td><?=$da2['kelas'];?> <?=$da2['ruang'];?></td>
                          <td>
						  <a href="index.php?hal=pilih_kelas&username=<?php echo $da['username'];?>" class="label label-primary">Pilih Kelas</a> 
						  <a href="hapus.php?data=wakel&id=<?=$da['username'];?>" class="label label-warning" onclick="return confirm('Yakin Hapus ini?')">Hapus</a>
						  </td>
                        </tr>
					  <?php
					  $no++;
					  }
					  $lb = mysqli_query($connect,"select * from tbwali_kelas");
					  $jd = mysqli_num_rows($lb);
					  $jumhal = ceil($jd/$ph);
					  ?>
                      </tbody>
                    </table>
                  </div>
				  <?php
				  include "pagination.php";
				  pagination($jumhal,$nohal,"data_wakel");
				  ?>
				</div>
              </div>