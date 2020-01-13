<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-user"></i> Orang Tua</div>
		<table class="table table-bordered table-striped table-hover" id = "table-datatable" style="">
    <thead>
      <tr>
      	<th>No</th>
      	<th>NISN Pendaftar</th>
        <th>Nama Ayah</th>
        <th>NIK Ayah</th>
        <th>No. Telp</th>
        <th>Pendidikan Terkahir</th>
        <th>Pekerjaan</th>
        <th>Penghasilan</th>
        
        <th>Nama Ibu</th>
        <th>NIK Ibu</th>
        <th>No. Telp</th>
        <th>Pendidikan Terkahir</th>
        <th>Pekerjaan</th>
        <th>Penghasilan</th>
        
        <th>Nama Wali</th>
        <th>NIK Wali</th>
        <th>No. Telp</th>
        <th>Pendidikan Terkahir</th>
        <th>Pekerjaan</th>
        <th>Penghasilan</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($orangtua as $data) {
      ?>
      <tr>
      	<td><?php echo $no++; ?></td>
      	<td><a href="<?php echo base_url().'admin/pendaftar_detail/'.$data->nisn; ?>"><?php echo $data->nisn ?></td>

      	<td><?php if ($data->nama_ayah === null || $data->nama_ayah == "" ) { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo ucwords($data->nama_ayah);
                        }?></td>

        <td><?php if ($data->nik_ayah === null || $data->nik_ayah == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->nik_ayah;
                        }?></td>

        <td><?php if ($data->no_telp_ayah === null || $data->no_telp_ayah == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->no_telp_ayah;
                        }?></td>

        <td><?php if ($data->pendidikan_ayah === null || $data->pendidikan_ayah == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pendidikan_ayah;
                        }?></td>

        <td><?php if ($data->pekerjaan_ayah === null || $data->pekerjaan_ayah == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pekerjaan_ayah;
                        }?></td>

        <td><?php if ($data->penghasilan_ayah === null || $data->penghasilan_ayah == "" ) { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo 'Rp. '.number_format($data->penghasilan_ayah,0,",",".");
                        }?></td>
<!-- Data Ibu -->
        <td><?php if ($data->nama_ibu === null || $data->nama_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo ucwords($data->nama_ibu);
                        }?></td>

        <td><?php if ($data->nik_ibu === null || $data->nik_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->nik_ibu;
                        }?></td>

        <td><?php if ($data->no_telp_ibu === null || $data->no_telp_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->no_telp_ibu;
                        }?></td>

        <td><?php if ($data->pendidikan_ibu === null || $data->pendidikan_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pendidikan_ibu;
                        }?></td>

        <td><?php if ($data->pekerjaan_ibu === null || $data->pekerjaan_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pekerjaan_ibu;
                        }?></td>

        <td><?php if ($data->penghasilan_ibu === null || $data->penghasilan_ibu == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->penghasilan_ibu;
                        }?></td>
<!-- Data Wali -->
        <td><?php if ($data->nama_wali === null || $data->nama_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo ucwords($data->nama_wali);
                        }?></td>

        <td><?php if ($data->nik_wali === null || $data->nik_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->nik_wali;
                        }?></td>

        <td><?php if ($data->no_telp_wali === null || $data->no_telp_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->no_telp_wali;
                        }?></td>

        <td><?php if ($data->pendidikan_wali === null || $data->pendidikan_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pendidikan_wali;
                        }?></td>

        <td><?php if ($data->pekerjaan_wali === null || $data->pekerjaan_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->pekerjaan_wali;
                        }?></td>

        <td><?php if ($data->penghasilan_wali === null || $data->penghasilan_wali == "") { 
                            echo 'Tidak ada data';
                          }
                        else {
                          echo $data->penghasilan_wali;
                        }?></td>

        <td nowrap="nowrap">
        	<a class="btn btn-info" href="<?php echo base_url().'admin/pendaftar_detail/'.$data->nisn; ?>"><i class="fas fa-search-plus"></i> Detail</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
	</div>
</div>