
        <div class="container-fluid margin-top">
          <div class="animated fadeIn">
            <!--/.row-->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Ubah <strong>Kios</strong> </h3>
                  </div>
                  <div class="card-body collapse show" id="collapseExample">
				  <?php
                        if (isset($_GET['kios']) && $_GET['kios'] != '') {
                        $id = $_GET['kios'];
                        $sql = "SELECT * FROM kios WHERE id_kios = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':id',$id);
                        $stmt->execute();
                        $row = $stmt->fetch();
                    ?>
                    <form class="form-horizontal" novalidate  enctype="multipart/form-data"  action="<?=BASE_URL."laman/kios/action/edit.php"?>" method="post">
						<input type="hidden" name="id" value="<?=$row['id_kios']?>"/>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                            <div class="col-md-9">
                            <input type="text" id="nama_kios" name="nama_kios" class="form-control" data-validation="required" value="<?=$row['nama_kios']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Luas (m<sup>2</sup>)</label>
                            <div class="col-md-9">
								<input class="form-control" type="number" name="luas_kios" data-validation="number" required="required" value="<?=$row['luas_kios']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="textarea-input">Alamat</label>
                            <div class="col-md-9">
                            <textarea id="textarea-input" name="alamat" rows="5" class="form-control" required="required" data-validation="length" data-validation-length="max5000"><?=$row['alamat']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="textarea-input">Fasilitas</label>
                            <div class="col-md-9">
                            <textarea id="textFasilitas" name="fasilitas" rows="5" class="form-control" required="required" data-validation="length" data-validation-length="max5000"><?=$row['fasilitas']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Telepon</label>
                            <div class="col-md-9">
								<input  class="form-control" name="nomor_telepon" type="number" data-validation="number" required="required" value="<?=$row['nomor_telepon']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="textarea-input">Harga</label>
                            <div class="col-md-9">
								<input class="form-control" type="number" name="harga_pembayaran" data-validation="number" required="required"  value="<?=$row['harga_pembayaran']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="select1">Pembayaran</label>
                            <div class="col-md-9">
                            <select id="select1" name="jenis_pembayaran" class="form-control" data-validation="required">
								<option value="bulanan" <?php echo ($row['jenis_pembayaran'] == "bulanan") ? "selected" : "" ; ?> >/ Bulan</option>
								<option value="tahunan" <?php echo ($row['jenis_pembayaran'] == "tahunan") ? "selected" : "" ; ?> >/ Tahun</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Latitude</label>
                            <div class="col-md-9">
                            <input type="number" id="latitude" name="latitude" class="form-control" data-validation="number" required="required" value="<?=$row['latitude']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input">Longitude</label>
                            <div class="col-md-9">
                            <input type="number" id="longitude" name="longitude" class="form-control" data-validation="number" required="required" value="<?=$row['longitude']?>">
                            </div>
                        </div>
                        
                        <span class="metadata-marker" style="display: none;" data-region_tag="html-body"></span>    
                        <div id="map" style="height : 300px"></div>
                      <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Ubah</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
						<?php } ?>
            <!--/.row-->
          </div>
        </div>

        <span class="metadata-marker" style="display: none;" data-region_tag="script-body"></span>   
    <script> 
      var map, infoWindow, intervalId, marker;
      function load() {
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-6.976209, 108.483081),
          zoom: 14
        });
        infoWindow = new google.maps.InfoWindow;

        // Trigger downloadUrl at an interval
        intervalId = setInterval(triggerDownload, 1000);
        marker = new google.maps.Marker();
      }

      function triggerDownload() {
        var point = new google.maps.LatLng(
            parseFloat(document.getElementById('latitude').value),
            parseFloat(document.getElementById('longitude').value));
        console.log("Update "+point.lat());
        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = document.getElementById('nama_kios').value
        console.log("Update "+document.getElementById('nama_kios').value);
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));

        marker.setMap(map);
        marker.setPosition(point);
        marker.addListener('click', function() {
          infoWindow.setContent(infowincontent);
          infoWindow.open(map, marker);
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?=ENV_KEY?>&callback=load">