<?php
// KOneksi
$conn = mysqli_connect("localhost", "root", "", "db_quotes");

// Query data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tambah Quotes
function tambah($data)
{
    global $conn;
    $kata = htmlspecialchars($data["kata"]);
    $author = htmlspecialchars($data["author"]);

    $query = "INSERT INTO tb_kata
                VALUES
                ('', '$kata', '$author')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
