
        <div class="container-fluid margin-top">
          <div class="animated fadeIn">
            <!--/.row-->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Gambar <strong>Kios</strong></h3>
                  </div>
                  <div class="card-body collapse show" id="collapseExample">
                            <script type="text/template" id="qq-template-manual-trigger">
        <div style="overflow-y: block; !important" class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector qq-upload-button btn btn-success">
                    <div>Tambah</div>
                </div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <div class="row">
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="500" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                        <img style="margin : 20px" class="qq-thumbnail-selector img-fluid" qq-max-size="500" qq-server-scale>
                    </div>
                    <div style="display : none !important">
                        <span class="qq-upload-file-selector id_gambar"></span>
                    </div>
                    <!-- <div style="width:100px"> -->
                        <!-- <span class="qq-upload-file-selector"></span> -->
                        <!-- <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="qqfilename"></span> -->
                        <!-- <input class="qq-edit-filename-selector qq-edit-filename form-control" tabindex="0" name="qqfilename" type="text" placeholder="qqfilename"> -->
                    <!-- </div> -->
                    <div class="col-md-12 col-lg-2">
                        <!-- <span class="qq-upload-size-selector qq-upload-size"></span> -->
                        <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel btn btn-danger">Cancel</button>
                        <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete btn btn-danger">Delete</button>
                        <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    </div>
                </div>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <!-- <form id="fileupload" class="needs-validation" novalidate  enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"> -->
                    
    <form id="fileupload" class="needs-validation" novalidate  enctype="multipart/form-data"  method="post">
        <div id="file-drop-area"></div>
    </form>
	
	<script>
        // $('.fileinput').fileinput();
        var multiFileUploader = new qq.FineUploader({
            element: document.getElementById("file-drop-area"),
            template: 'qq-template-manual-trigger',
            multiple: true,
            request: {
                endpoint: <?=BASE_URL?>+'config/fine-uploader/endpoint.php',
            },
            session: {
                params: {
                    id_kios: "<?=$_GET['kios']?>"
                },
                endpoint: <?=BASE_URL?>+'config/fine-uploader/endpointFile.php',
            },
            callbacks: {
                // onSessionRequestComplete: function() {
                //     var id_kiosText = "<?=$_GET['kios']?>";
                //     // console.log(id_kiosText);
                //     this.setParams({id_kios : id_kiosText})
                // },
                onComplete: function(id, fileName) {
                    // window.location.replace('<?php echo BASE_URL; ?>admin/panel/produk.php');
                },
				onDeleteComplete: function(id, fileName) {
					console.log("XX");
                    // window.location.replace('<?php echo BASE_URL; ?>admin/panel/produk.php');
                },
                onUpload: function(id) {
                    var fileContainer = this.getItemByFileId(id)
                    var id_kiosText = "<?=$_GET['kios']?>";
                    this.setParams({id_kios : id_kiosText}, id)
                },
                onSubmitDelete: function(id){
                    var fileContainer = this.getItemByFileId(id)
                    var IDInput = fileContainer.querySelector('.id_gambar')
                    var id_gambarText = IDInput.innerHTML
                    this.setParams({id_gambar : id_gambarText}, id);
					//console.log(id_gambarText)
                },
                onAllComplete: function(id){
                    //window.location.replace('<?php echo BASE_URL; ?>admin/panel/produk.php');
                }
            },
            validation: {
                allowedExtensions: ['jpeg', 'jpg', 'gif','png','bmp'],
                itemLimit: 100,
                sizeLimit: 512000 // 50 kB = 50 * 1024 bytes
            },
            autoUpload: true,
            debug: true,
            deleteFile: {  
                method : "POST",    
                _method : "POST",            
                enabled: true,
                forceConfirm: true,
                endpoint: <?=BASE_URL?>+'config/fine-uploader/Delete.php',
            }
        });

        // qq(document.getElementById("submit_button")).attach("click", function() {
        //     multiFileUploader.uploadStoredFiles();
        // });
    </script>
                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>

        </div>