<?php
// FILE SEMENTARA UNTUK MENGAMBIL BEBERAPA FUNCTION AUTH
session_start();

// Koneksi ke database
$db = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create($data)
{
    global $db;
    // Ambil data dari tiap elemen
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $semester = htmlspecialchars($data["semester"]);

    // Upload Gambar
    $foto = upload($npm);
    // Cek
    if (!$foto) {
        return false;
    }

    // Agar penulisan semester konstan
    if ($semester < "10") {
        if (mb_substr($semester, 0, 1) != 0) {
            $semester = "0" . $semester;
        }
    }
    // Query insert data
    $query = "INSERT INTO mahasiswa (npm,nama,prodi,semester,foto) VALUES
              ('$npm', '$nama', '$prodi', '$semester', '$foto')";
    mysqli_query($db, $query);
    // Mengembalikan nilai affected row untuk cek
    return mysqli_affected_rows($db);
}

function upload($npm)
{
    $fileName = $_FILES['foto']['name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileTmpLocation = $_FILES['foto']['tmp_name'];

    // Cek apakah gambar ada yang diupload
    if ($fileError === 4) {
        echo "
            <script>
                alert('Pilih foto Untuk Profile Mahasiswa');
            </script>
        ";

        return false;
    }

    // Cek apakah yang dikirim merupakan gambar
    $validImagaeExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    // Mengambil bagian ekstensi gambar saja (.jpg dll)
    $imageExtension = strtolower(end($imageExtension)); //Diubah menjadi huruf kecil
    if (!in_array($imageExtension, $validImagaeExtension)) {
        echo "
            <script>
                alert('Gunakan Tipe File Yang Valid (jpg,jpeg,png) ');
            </script>
        ";

        return false;
    }

    // Cek ukuran
    if ($fileSize > 1500000) {
        echo "
            <script>
                alert('Ukuran foto Terlalu Besar');
            </script>
        ";

        return false;
    }

    // Gambar siap diupload
    // Generate nama baru
    $fileNameNew = explode('.', $fileName);
    $fileNameNew = $fileNameNew[0] . $npm . '.' . end($fileNameNew);
    move_uploaded_file($fileTmpLocation, '../images/' . $fileNameNew);

    return $fileNameNew;
}

function delete($id)
{
    global $db;

    $query = "SELECT foto FROM mahasiswa WHERE Id = $id";
    $fileName = query($query);

    mysqli_query($db, "DELETE FROM mahasiswa WHERE Id =  $id");

    // Bila berhasil maka akan menghapus foto juga
    if (mysqli_affected_rows($db) > 0) {
        unlink('../images/' . $fileName[0]["foto"]);
    }

    return mysqli_affected_rows($db);
}

function unlinkImage($id)
{
    // Mencari Lokasi foto
    $query = "SELECT foto FROM mahasiswa WHERE Id = $id";
    $fileName = query($query);
    // Menghapus foto
    unlink('../images/' . $fileName[0]["foto"]);
}

function update($data, $id, $oldImage)
{
    global $db;

    // Ambil data dari tiap elemen
    $npm = htmlspecialchars($data["npm"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $semester = htmlspecialchars($data["semester"]);

    // Check user upload gambar baru
    if ($_FILES['foto']['error'] === 4) {
        $foto = $oldImage;
    } else {
        unlinkImage($id);
        $foto = upload($npm);
    }

    // Agar penulisan semester konstan
    if ($semester < "10") {
        if (mb_substr($semester, 0, 1) != 0) {
            $semester = "0" . $semester;
        }
    }
    // Query insert data
    $query = "UPDATE mahasiswa SET
                NPM = '$npm',
                Nama = '$nama',
                Prodi = '$prodi',
                Semester = '$semester',
                foto = '$foto'
              WHERE Id = $id
             ";
    mysqli_query($db, $query);
    // Mengembalikan nilai affected row untuk cek
    return mysqli_affected_rows($db);
}

function register($data)
{
    global $db;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $passwordConfirm = mysqli_real_escape_string($db, $data["passwordConfirm"]);

    // Cek username sudah ada apa belum
    $result = mysqli_query($db, "SELECT Username FROM users WHERE Username = '$username' ");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username Telah Dipakai, Coba Username Lain!');
                
            </script>
        ";
        return false;
    }

    // cek konfirmasi pass
    if ($password !== $passwordConfirm) {
        echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai!');
                
            </script>
        ";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Memasukan kedalam database
    mysqli_query($db, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($db);
}
