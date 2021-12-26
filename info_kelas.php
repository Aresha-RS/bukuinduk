			<?php
			$lk = mysql_query("select * from tbkelas where id_kelas = '".$_GET['idk']."'");
			$dk = mysql_fetch_array($lk);
			
			$lb = mysql_query("select * from tbsiswa where id_kelas='0'");
			$jd = mysql_num_rows($lb);
			
			$thn_ajar = date("y").date("y")+1;
					  
			$lns = mysql_query("select right(NIS,3) as niss from tbsiswa order by NIS Desc");
			$dns = mysql_fetch_array($lns);
					  
			$lnis = mysql_query("select right(NIS,3) as niss from tbsiswa where id_kelas = '".$_GET['idk']."' order by NIS Desc");
			$dnis = mysql_fetch_array($lnis);
					  
			if ($dnis['niss'] == "" and $dns['niss'] != ""){
				$nis_tmp = $thn_ajar."07".$dns['niss']+1;
			} else if ($dns['niss'] == "") {
				$nis_tmp = $thn_ajar."07001";
			}
			?>
			  <div class="card">
                <div class="card-header">
                  <h4><?=getAddress();?> <?=$dk['kelas'];?> <?=$dk['ruang'];?></h4>
				</div>
				
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nis</th>
                          <th>Nama Lengkap</th>
                          <th>Jenis Kelamin</th>
                          <th>Tempat Tanggal Lahir</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
					  $no=1;
					  
					  $la = mysql_query("select * from tbsiswa where id_kelas = '".$_GET['idk']."' order by nm_lengk_siswa Asc");
					  while ($da = mysql_fetch_array($la)){
					  ?>
                        <tr>
                          <th scope="row"><?=$no;?></th>
						  <?php if (isset($_GET['bagi_nis'])){ ?>
						  <td>
						  <input type="hidden" value="<?=$da['id_siswa'];?>" name="id[]">
						  <input type="text" value="<?=$nis_tmp++;?>" name="nis[]" class="form-control" size="2">
						  </td>
						  <?php } elseif ($da['NIS'] != ""){ ?>
						  <td><?=$da['NIS'];?></td>
						  <?php } else { ?>
						  <td>-</td>
						  <?php } ?>
                          <td><?=$da['nm_lengk_siswa'];?></td>
                          <td><?=$da['jenis_kelamin'];?></td>
                          <td><?=$da['tmpt_lhr_siswa'];?>, <?=$da['tgl_lhr_siswa'];?></td>
                        </tr>
					  <?php
					  $no++;
					  }
					  ?>
                      </tbody>
                    </table>
					</form>
                  </div>
                </div>
              </div>