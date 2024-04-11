<?php foreach($bayar as $bayar) : ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pesanan</h1>
            <hr>
            <table class="table table-bordered">
                <tr></tr>
                    <th>No. Invoice</th>
                    <td><?= $bayar['pembayaran_id'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?= $bayar['pembayaran_waktu'] ?></td>
                </tr>
                <tr>
                    <th>Nama Pemesan</th>
                    <td><?= $bayar['pembayaran_nama_pemesan'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $bayar['pembayaran_alamat'] ?></td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td><?= $bayar['pembayaran_no_wa'] ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><?= $bayar['pembayaran_total'] ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $bayar['pembayaran_status'] ?></td>
                </tr>
        </div>
    </div>
</div>

<?php endforeach; ?>