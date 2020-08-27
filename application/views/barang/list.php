<div class="col-md-12">
        <?php if ($this->session->flashdata('pangbeja')) {echo $this->session->flashdata('pangbeja');}?>
  <a href="javascript:void(0)" onclick="location.href='<?=base_url()?>barang/addBarang'" type="button" class="btn btn-info" rel="tooltip" title="tambah data barang"><i class="fa fa-plus"></i></a>
  <?php if (empty($all)) {echo null;} else {?>
  <table id="tabelBarang" class="table table-bordered table-striped table-responsive bg-light">
    <thead class="bg-success">
      <tr class="font-italic" style="color: white;">
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Stok</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;foreach ($all as $barang) { ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$barang['foto']?></td>
        <td><?=$barang['nama']?></td>
        <td><?=$barang['harga_beli']?></td>
        <td><?=$barang['harga_jual']?></td>
        <td><?=$barang['stok']?></td>
        <td>
           <button type="button" onclick='previewImage("<?=base_url()?>penyimpanan_file/images/<?=$barang['foto']?>");' rel="tooltip" title="view image" class="btn btn-outline-dark btn-sm"><i class="fa fa-eye"></i></button>
        </td>
        <td>
          <a href="javascript:void(0)" onclick="location.href='<?= base_url()?>barang/editBarang/<?=encrypt_url($barang['id'])?>/<?=encrypt_url('tbl_barang')?>'" type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </td>
        <td>
          <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url()?>barang/deleteBarang/<?=encrypt_url($barang['id'])?>/<?=encrypt_url('tbl_barang')?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
<?php }?>
</div>

<!-- Modal View Img -->
<div class="modal fade" id="viewImg">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img id="image-preview" style="width: 100%; height: 100%" alt="view image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
// preview di tag img
    function previewImage(nilai) {
      $("#viewImg").modal();
      $("#image-preview").attr('src', nilai);
       // document.getElementById("image-preview").src = nilai;
    }
</script>