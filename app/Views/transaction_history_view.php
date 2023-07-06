<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
use App\Models\TransaksiDetailModel;
use App\Models\ProdukModel;
?>
<!-- transaction_history_view.php -->
<section class="section">
    <div class="container">
        <h2>Transaction History</h2>

        <?php if (!empty($transactions)) : ?>
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Purchased Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                            <td><?= $transaction['id'] ?></td>
                            <td><?= number_to_currency($transaction['total_harga'],'IDR') ?></td>
                            <td><?php if($transaction['status']==0) {
                                    echo "Diproses";
                                } else if($transaction['status']==1) {
                                    echo "Dikirim";
                                } else {
                                     echo "Selesai";
                                 }?></td>
                            <td><?= $transaction['created_date'] ?></td>
                            <td>
                                <?php
                                $modelTransaksiDetail = new TransaksiDetailModel();
                                $transactionDetails = $modelTransaksiDetail->where('id_transaksi', $transaction['id'])->findAll();

                                if (!empty($transactionDetails)) {
                                    foreach ($transactionDetails as $transactionDetail) {
                                        $modelBarang = new ProdukModel();
                                        $barang = $modelBarang->find($transactionDetail['id_barang']);

                                        if ($barang) {
                                            echo '<p>' . $barang['nama'] . ' (Quantity: ' . $transactionDetail['jumlah'] . ')</p>';
                                        }
                                    }
                                } else {
                                    echo '<p>No items found for this transaction.</p>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No transactions found.</p>
        <?php endif; ?>
    </div>
</section>


<?= $this->endSection() ?>
