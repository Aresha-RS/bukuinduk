			  <div class="card">
                <div class="card-header">
                  <h4>Edit Kelas</h4>
                </div>
                <div class="card-body">
					
					<?php
						$ik = $_GET['edit'];
						$tampil=mysql_query("select * from tbkelas where id_kelas ='$ik'"); 
						$data=mysql_fetch_array($tampil);
					?> 
					<form method="post" action="proses_edit_kelas.php?ik=<?php echo $data['id_kelas']; ?>">
					<div class="form-group">
						<label>Kelas</label>
						<select name="kelas" id="select" class="form-control">
							  <?php
							  if ($data['kelas']=="VII")
							  {
								$opt1="selected";
							  }
							  else 	
							  {
								$opt1="";
							  }
							  if ($data['kelas']=="VIII")
							  {
								$opt2="selected";
							  }
							  else
							  {
								$opt2="";
							  }
							   if ($data['kelas']=="IX")
							  {
								$opt3="selected";
							  }
							  else
							  {
								$opt3="";
							  }
							  ?>
				              <option>&nbsp;</option>
                              <option value="VII" <?php echo "$opt1";?>>VII</option>
                              <option value="VIII" <?php echo "$opt2";?>>VIII</option> 
							  <option value="IX" <?php echo "$opt3";?>>IX</option>
                              </select>
					</div>
					<div class="form-group">
						<label>Ruang</label>
						<input type="text" class="form-control" name="ruang" value="<?php echo $data['ruang'];?>">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Edit"> 
						<input type="reset" class="btn btn-danger" value="Batal">
					</div>
					</form>
				</div>
              </div>