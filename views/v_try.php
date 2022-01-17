<section class="try-section" id="try">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-10 col-lg-8 mx-auto text-center">

                <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">Masukkan text yang ingin di klasifikasikan!</h2>
                <form action ="" method="post" class="form-signup" id="formData" >
                    
                    <!-- Text input-->
                    <div class="row input-group-newsletter">
                        <div class="col"><input required class="form-control" id="textData" type="text" name="textData" placeholder="MASUKAN TEKS LAPORAN..." aria-label="Masukkan text laporan..." /></div>
                        <div class="col-auto"><input type="submit" class="btn btn-primary" id="submitButton" name="tambah"/></button></div>

                    </div>

                </form>

                <?php 
                    if (@$_POST['tambah']) {
                        $text = $connection->conn->real_escape_string($_POST['textData']);
                        $tbl->tambah($text);
                    }
                ?>

            </div>
        </div>
        <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
    </div>

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script>
        $("#formData").on("submit", (function(e){
            $.ajax({
                type : 'POST',
                data : $('#formData').serialize(),
                success : function(data) {
                    window.location = "result.php";
                }
            });
        }));
    </script>
</section>


