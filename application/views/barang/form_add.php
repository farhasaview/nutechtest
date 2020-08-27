<div class="col-md-12 bg-light"><br>
<?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
<h3><?=$title?></h3><hr>

<form action="<?=base_url()?>barang/aksiTambahBarang/<?=encrypt_url('tbl_barang')?>" method="post" enctype="multipart/form-data" data-toggle="validator">

  <div class="form-group">

    <img id="image-preview" style="width: 100%; height: 100%">

    <label for="logo">Logo</label>

    <input type="file" accept=".jpg,.jpeg,.png" id="image-source" name="foto" onchange="previewImage();" class="form-control-file">

  </div>

  <div class="form-group">
    <label for="nama">Nama Barang</label>
    <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
  </div>

  <div class="form-group">
    <label for="harga_beli">Harga Beli</label>
    <input type="text" name="harga_beli" maxlength="15" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
  </div>
  <div class="form-group">
    <label for="harga_jual">Harga Jual</label>
    <input type="text" name="harga_jual" maxlength="15" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
  </div>
  <div class="form-group">
    <label for="stok">Stok</label>
    <input type="text" name="stok" maxlength="15" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
  </div>

  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>

</form>

</div>



<script>

  function previewImage() {

    document.getElementById("image-preview").style.display = "block";

    var oFReader = new FileReader();

     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

 

    oFReader.onload = function(oFREvent) {

      document.getElementById("image-preview").src = oFREvent.target.result;

    };

  };

</script>