<!DOCTYPE html>

<html lang="en">

  <!-- load header and sekaligus menu navigasi navbar -->

  <?php $this->load->view('template/header'); ?>

  <!-- end of load header and sekaligus menu navigasi navbar -->



    <!-- warna Silver -->

<div style="background-color: #C0C0C0;"><br>

    <!-- Page Content -->

    <div class="container">

      <div class="row">

        <?php $this->load->view($content);?>

      </div>

    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  </div>

    <!-- end of Page Content -->



    <!-- load footer isi nya javascript -->

    <?php $this->load->view('template/footer'); ?>

    <!-- end of load footer -->

</html>

