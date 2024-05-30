<h1>Daftar Penalti</h1>

<table>
    <thead>
        <tr>
            <th>ID Penalti</th>
            <th>ID Pesanan</th>
            <th>Jenis Penalti</th>
            <th>Biaya Penalti</th>
            <th>Foto Penalti</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['penalties'] as $penalty) : ?>
            <tr>
                <td><?= $penalty['penalty_id'] ?></td>
                <td><?= $penalty['order_id'] ?></td>
                <td><?= $penalty['jenis_penalty'] ?></td>
                <td><?= $penalty['biaya_penalty'] ?></td>
                <td><img src="<?= BASEURL ?>/img/penalties/<?= $penalty['foto_penalty'] ?>" alt="Foto Penalti"></td>
                <td>
                    <a href="<?= BASEURL ?>/penalty/edit/<?= $penalty['penalty_id'] ?>">Edit</a>
                    <a href="<?= BASEURL ?>/penalty/delete/<?= $penalty['penalty_id'] ?>" onclick="return confirm('Yakin ingin menghapus penalti ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= BASEURL ?>/penalty/add/<?= $data['order_id'] ?>">Tambah Penalti</a>