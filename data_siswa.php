			  <div class="card">
                <div class="card-header">
                  <h4>
				  <?php if ($level != "Wali Kelas"){ ?>
				  <small><a href="index.php?hal=tambah_data_siswa" class="btn btn-primary"><i class="fa fa-plus"></i></a></small>
				  <?php } ?>
				  <?=getAddress();?></h4>
                </div>
				
                <div class="card-body">
				
				<form method="get" action="">
				<div class="form-group">
					<input type="hidden" name="hal" value="data_siswa">
					<input type="text" name="cari" placeholder="Masukan kata kunci..." class="form-control">
				</div>
				</form>
				
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
						  <th>NIS</th>
                          <th>Nama Lengkap</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Tanggal Lahir</th>
						  <?php if (($level != "Wali Kelas") and ($level != "Kurikulum")){ ?>
                          <th>Aksi</th>
						  <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  if (isset($_GET['nohal'])){
						  $nohal = $_GET['nohal'];
					  } else {
						  $nohal = 1;
					  }
					  $ph = 10;
					  $start = ($nohal - 1) * $ph;
					  $no = $start+1;
					  
					  if ($level == "Wali Kelas"){
						$la = mysql_query("select * from tbsiswa where id_kelas='".$dwakel['id_kelas']."' limit $start,$ph");
					  } else {
						$la = mysql_query("select * from tbsiswa limit $start,$ph");
					  }
					  while ($da = mysql_fetch_array($la)){
					  ?>
                        <tr>
                          <th scope="row"><?=$no;?></th>
						  <td><?=$da['NIS'];?></td>
                          <td><?=$da['nm_lengk_siswa'];?></td>
                          <td><?=$da['jenis_kelamin'];?></td>
                          <td><?=$da['tmpt_lhr_siswa'];?>, <?=$da['tgl_lhr_siswa'];?></td>
						  <?php if (($level != "Wali Kelas") and ($level != "Kurikulum")){ ?>
                          <td>
						  <a href="index.php?hal=data_diri_bukuinduk&ids=<?php echo $da ['id_siswa'];?>" class="label label-info">Detail</a>
						  <a href="index.php?hal=edit_siswa&edit=<?php echo $da ['id_siswa'];?>" class="label label-primary">Edit</a> 
						  <a href="hapus.php?data=siswa&id=<?=$da['id_siswa'];?>" class="label label-warning" onclick="return confirm('Yakin Hapus ini?')">Hapus</a>
						  </td>
						  <?php } ?>
                        </tr>
					  <?php
					  $no++;
					  }
					  
					  if ($level == "Wali Kelas"){
					  $lb = mysql_query("select * from tbsiswa where id_kelas='".$dwakel['id_kelas']."'");
					  } else {
					  $lb = mysql_query("select * from tbsiswa");
					  }
					  
					  $jd = mysql_num_rows($lb);
					  $jumhal = ceil($jd/$ph);
					  ?>
                      </tbody>
                    </table>
                  </div>
				  <?php
				  include "pagination.php";
				  pagination($jumhal,$nohal,"data_siswa");
				  ?>
                </div>
              </div>