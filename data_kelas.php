			  <div class="card">
                <div class="card-header">
                  <h4><small><a href="index.php?hal=tambah_data_kelas" class="btn btn-primary"><i class="fa fa-plus"></i></a></small> <?=getAddress();?></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
				  <form method="get" action="">
				<div class="form-group">
					<input type="hidden" name="hal" value="data_admin">
					<input type="text" name="cari" placeholder="Masukan kata kunci..." class="form-control">
				</div>
				</form>
				
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Kelas</th>
                          <th>Ruang</th>
						  <th width="15%"><center>Aksi</center></th>
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
					  $la = mysql_query("select * from tbkelas order by ruang Asc limit $start,$ph");
					  while ($da = mysql_fetch_array($la)){
					  ?>
                        <tr>
                          <th scope="row"><?=$no;?></th>
                          <td><?=$da['kelas'];?></td>
                          <td><?=$da['ruang'];?></td>
						  <td>
						  <a href="index.php?hal=info_kelas&idk=<?php echo $da ['id_kelas'];?>" class="label label-success">Info</a> 
						  <a href="index.php?hal=edit_kelas&edit=<?php echo $da ['id_kelas'];?>" class="label label-primary">Edit</a> 
						  <a href="hapus.php?data=kelas&id=<?=$da['id_kelas'];?>" class="label label-warning" onclick="return confirm('Yakin Hapus ini?')">Hapus</a>
                        </tr>
					  <?php
					  $no++;
					  }
					  $lb = mysql_query("select * from tbkelas");
					  $jd = mysql_num_rows($lb);
					  $jumhal = ceil($jd/$ph);
					  ?>
                      </tbody>
                    </table>
                  </div>
				  <?php
				  include "pagination.php";
				  pagination($jumhal,$nohal,"data_kelas");
				  ?>
				</div>
              </div>