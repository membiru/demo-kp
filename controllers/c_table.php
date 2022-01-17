
<!-- Table Project Row-->
<div class="row gx-0 mb-4 mb-lg-5 align-items-center">
    <div class="col-xl-8 col-lg-7">

        <table id="tabel-data" class="table table-striped table-dark table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">TEXT</th>
                    <th scope="col">PREDIKSI KATEGORI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prediksi = '';
                
                $tampilkan = $tbl -> tampilkanTable();
                while($data = $tampilkan -> fetch_object()){
                    switch($data->prediction){
                        case '1':
                          $prediksi = 'Energi Pangan dan Maritim';
                          break;
                        case '2':
                          $prediksi = 'Infrastruktur dan Transportasi';
                          break;
                        case '3':
                          $prediksi = 'Kesehatan';
                          break;
                        case '4':
                          $prediksi = 'Pariwisata dan Lingkungan Hidup';
                          break;
                        case '5':
                          $prediksi = 'Pendidikan';
                          break;
                        case '6':
                          $prediksi = 'Reformasi birokrasi';
                          break;
                        default:
                          $prediksi = 'null';
                    }
                ?>
                <tr>
                    <th scope="row"> <?= $data->id?> </th>
                    <td> <?= $data->date?> </td>
                    <td> <?= $data->text?> </td>
                    <td> <?= $prediksi?> </td>
                </tr>
                <?php  
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="featured-text text-center text-lg-left">
            <h4>History's Table</h4>
            <p class="text-black-50 mb-0">Berisi tentang tabel riwayat text yang pernah diklasifikasikan</p>
        </div>
    </div>
</div>