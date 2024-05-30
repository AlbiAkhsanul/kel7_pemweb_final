<h1>Tambah Penalti</h1>

<form method="POST" enctype="multipart/form-data" action="<?= BASEURL ?>/penalty/add/<?= $data['order_id'] ?>">
    <label for="penalty_type">Jenis Penalti:</label>
    <input type="text" name="penalty_type" id="penalty_type" required>

    <label for="penalty_amount">Biaya Penalti:</label>
    <input type="number" name="penalty_amount" id="penalty_amount" step="0.01" required>

    <label for="penalty_photo">Foto Penalti:</label>
    <input type="file" name="penalty_photo" id="penalty_photo" required>

    <button type="submit">Tambah Penalti</button>
</form>