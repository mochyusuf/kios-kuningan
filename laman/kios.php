        <div class="container-fluid" style="margin-top : 30px">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
								<th>Nomor</th>
								<th>Nama</th>
								<th>Luas</th>
								<th>Telepon</th>
								<th>Harga</th>
								<th>Alamat</th>
								<th>Fasilitas</th>
								<th>Latitude</th>
								<th>Longitude</th>
								<th>Aksi</th>
                            </tr>
                        </thead>
						<?php
							$sql = "SELECT * FROM kios ";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$i = 1;
							while($row = $stmt->fetch()){?>
								<tr>
								<td><?=$i;?></td>
								<td><?=$row['nama_kios'];?></td>
								<td><?=$row['luas_kios'];?> m<sup>2</sup></td>
								<td><?=$row['nomor_telepon'];?></td>
								<td><?=rupiah($row['harga_pembayaran']) ?> / <?=$row['jenis_pembayaran'];?></td>
								<td><?=cutText(strip_tags(html_entity_decode($row["alamat"])),20);?></td>
								<td><?=cutText(strip_tags(html_entity_decode($row["fasilitas"])),20);?></td>
								<td><?=$row['latitude'];?></td>
								<td><?=$row['longitude'];?></td>
									<td>
									<a class="btn btn-info" href="?laman=gambar_kios&kios=<?=$row["id_kios"];?>">Gambar</a>
									<a class="btn btn-warning" href="?laman=ubah_kios&kios=<?=$row["id_kios"];?>">Ubah</a>
                                    <a class="btn btn-danger" id="<?php echo $row["id_kios"]; ?>" onclick="return Delete(this)">Hapus</a>
								</td>
							</tr>
							<?php 
							$i++;}
						?>
                    </table>
                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>

        </div>

  <script>
  function Delete(temp) {
    var jawab = confirm("Anda Yakin Akan Menghapus Data ?");
    if (jawab == true) {
      var id = temp.getAttribute("id");  
                $.ajax({  
                        url:"laman/kios/delete.php",  
                        method:"post",  
                        data:{id:id},  
                        success:function(data){  
                          // alert(data);
                            if (data == "Berhasil") {
                                alert("Data Berhasil Dihapus");
                                location.reload(true);
                            }else if (data = "Tidak Dapat Dihapus") {
                                alert("Data Tidak Dapat Dihapus");
                            } else {
                              alert("Error");
                            } 
                        }  
                }); 
    }
  }
    </script>