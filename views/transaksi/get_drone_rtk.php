<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "db_p2h_survey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$merekId = $_POST['merek_id'];

$sql = "SELECT no_seri FROM aset_survey WHERE nama_aset = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $merekId);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result !== false) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $no_seri = $row['no_seri'];

            // Mengirim respons sebagai JSON dengan harga dan stok
            echo json_encode(array('no_seri' => $no_seri));
        } else {
            echo "error";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error in preparing statement: " . $conn->error;
}

$conn->close();
