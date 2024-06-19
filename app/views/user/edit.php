<a href="<?= BASEURL . "/user/details/" . $data['user']['user_id'] ?>">Kembali</a>
<form action="<?= BASEURL . "/user/update/" . $data['user']['user_id'] ?>" method="post">
    <label for="nama_user">Nama:</label>
    <input type="text" name="nama_user" value="<?= $data['user']['nama_user'] ?>" id=""><br>
    <label for="no_telp_user">Nomor Telepon:</label>
    <input type="text" name="no_telp_user" value="<?= $data['user']['no_telp_user'] ?>" id=""><br>
    <label for="email_user">Email:</label>
    <input type="text" name="email_user" value="<?= $data['user']['email_user'] ?>" id=""><br>
    <label for="password_baru">Password Baru:</label>
    <input type="password" name="password_baru" id=""><br>
    <label for="konfirmasi_password_baru">Konfirmasi Password Baru:</label>
    <input type="password" name="konfirmasi_password_baru" id=""><br>
    <label for="password_lama">Password:</label>
    <input type="password" name="password_lama" id=""><br>
    <button type="submit" name="edit">Submit</button>
</form>