<div class="container-fluid">

  <div class="col-md-12 border bg-white mt-3 p-3 mb-3">
    <div class="mb-4 pb-2 border-bottom">
      <div class="d-flex justify-content-between">
        <strong>UJIAN</strong>
        <!-- Waktu Ujian -->
        <div class="text-center d-inline-flex">
          <p>Sisa Waktu :&nbsp;</p>
          <p id="waktu"></p>
          <script type="text/javascript">
          function submitform()
          {
            document.getElementById("jawaban").submit();
          }
          </script>

          <script>
          // Set the date we're counting down to
          var bulan = new Date().getMonth() + 1,
              tanggal = new Date().getDate(),
              tahun = new Date().getFullYear(),
              countDownDate = new Date(bulan + " " + tanggal + ", " + tahun + " " + "22:00:00").getTime();

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
              
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
              
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
              
            // Output the result in an element with id="demo"
            document.getElementById("waktu").innerHTML = hours + " Jam "
            + minutes + " Menit " + seconds + " Detik";
              
            // If the count down is over, write some text 
            if (distance <= 0) {
              clearInterval(x);
              document.getElementById("waktu").innerHTML = "Waktu Habis !";
              submitform();
              // location.replace("<?php echo base_url().'pendaftar' ?>")
            }
          }, 1000);
          </script>

        </div>  
      </div>
    </div>

    <div class="col-md-12">
      <form method="POST" action="<?php echo base_url().'ujian/simpan' ?>" on enctype="multipart/form-data" id ="jawaban">
      <!-- Soal -->
      <?php $no = 1;
      foreach ($soal as $s) { ?>
        <div class="mb-2">
          <p><strong><?php echo $no.'. '.$s['soal'] ?></strong></p>
          <input type="hidden" name="soal_no<?php echo $no ?>" value="<?php echo $s['kd_soal'] ?>">
        </div>

        <!-- Jawaban -->
        <?php 
        $kd_soal = $s['kd_soal'];
        $jawaban = $this->db->query("SELECT * FROM ujian_jawaban where ujian_jawaban.kd_soal='$kd_soal' ORDER BY RAND()")->result_array();
        foreach ($jawaban as $j) { ?>
            <div class="form-check ml-3">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jawaban_no<?php echo $no ?>" value="<?php echo $j['kd_jawaban']; ?>"><?php echo $j['jawaban']; ?>
              </label>
            </div>
        <?php } ?>
        <div class="mb-4"></div>
      <?php $no++;
      } ?>
      <div class="d-flex align-items-center justify-content-center">
        <button class="btn btn-primary" type="submit" id="simpan_jawaban">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
