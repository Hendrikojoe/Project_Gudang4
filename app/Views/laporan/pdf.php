<h2>Laporan Gudang</h2>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Laporan</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($laporan as $l): ?>
        <tr>
            <td><?= $l['id'] ?></td>
            <td><?= $l['nama_laporan'] ?></td>
            <td><?= $l['deskripsi'] ?></td>
            <td><?= $l['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>