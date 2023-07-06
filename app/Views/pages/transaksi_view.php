<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
use App\Models\TransaksiDetailModel;
use App\Models\ProdukModel;
if(session()->getFlashData('success')){
?> 
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(session()->getFlashData('failed')){
?> 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('failed') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
                    <tr>
                        <th>Transaksi ID</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Purchased Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaksis as $transaksi) : ?>
                        <tr>
                            <td><?= $transaksi['id'] ?></td>
                            <td><form action="<?= base_url('transaksi/edit/'.$transaksi['id']) ?>" method="post">
                            <div class="form-group">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option <?php if($transaksi['status']==0){echo "selected"; } else { echo "";}?> value="0">Diproses</option>
                                        <option <?php if($transaksi['status']==1){echo "selected"; } else { echo "";}?> value="1">Dikirim</option>
                                        <option <?php if($transaksi['status']==2){echo "selected"; } else { echo "";}?> value="2">Selesai</option>
                                </select>
                            </div>
                                
                                </form>
                            </td>
                            <td><?= number_to_currency($transaksi['total_harga'],'IDR') ?></td>
                            <td><?= $transaksi['created_date'] ?></td>
                            <td>
                                <?php
                                $modelTransaksiDetail = new TransaksiDetailModel();
                                $transaksiDetails = $modelTransaksiDetail->where('id_transaksi', $transaksi['id'])->findAll();

                                if (!empty($transaksiDetails)) {
                                    foreach ($transaksiDetails as $transaksiDetail) {
                                        $modelBarang = new ProdukModel();
                                        $barang = $modelBarang->find($transaksiDetail['id_barang']);

                                        if ($barang) {
                                            echo '<p>' . $barang['nama'] . ' (Quantity: ' . $transaksiDetail['jumlah'] . ')</p>';
                                        }
                                    }
                                } else {
                                    echo '<p>No items found for this transaksi.</p>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
<!-- End Table with stripped rows -->

<?= $this->endSection() ?>