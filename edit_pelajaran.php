			  <div class="card">
                <div class="card-header">
                  <h4>Edit Pelajaran</h4>
                </div>
                <div class="card-body">
					
					<?php
						$idp = $_GET['edit'];
						$tampil=mysqli_query($connect,"select * from tbpelajaran where id_pelajaran ='$idp'"); 
						$data=$tampil->fetch_array(MYSQLI_ASSOC);
					?> 
					<form method="post" action="proses_edit_pel.php?idp=<?php echo $data['id_pelajaran']; ?>">
					<div class="form-group">
						<label>Nama Pelajaran</label>
						<input type="text" class="form-control" name="nama_pelajaran" value="<?php echo $data['nama_pelajaran'];?>">
					</div>
					<div class="form-group">
						<label>KKM Kelas VII</label>
						<input type="text" class="form-control" name="kkm_7" value="<?php echo $data['kkm_7'];?>">
					</div>
					<div class="form-group">
						<label>KKM Kelas VIII</label>
						<input type="text" class="form-control" name="kkm_8" value="<?php echo $data['kkm_8'];?>">
					</div>
					<div class="form-group">
						<label>KKM Kelas IX</label>
						<input type="text" class="form-control" name="kkm_9" value="<?php echo $data['kkm_9'];?>">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Edit"> 
						<input type="reset" class="btn btn-danger" value="Batal">
					</div>
					</form>
				</div>
              </div>