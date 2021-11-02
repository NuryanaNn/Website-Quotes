<!doctype html>
<html lang="en">

<?php require 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Quotes Berhasil Di Tambahkan);
                document.location.href ='index.php';
                </script>
        ";
    } else {
        echo "
            <script>
                alert('Quotes Gagal Di Tambahkan);
                document.location.href ='index.php';
                </script>
        ";
    }
}


$kata = query("SELECT * FROM tb_kata LIMIT 1");

// Konfigurasi
$jumlahDataPerHalaman = 1;
$jumlahData = count(query("SELECT * FROM tb_kata"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$kata = query("SELECT * FROM tb_kata LIMIT $awalData, $jumlahDataPerHalaman");



?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <link rel="stylesheet" href="style.css">
    <title>Quotes</title>
</head>

<body>
    <div class="quotes">
        <div class="isi">
            <?php $i = 1; ?>
            <?php foreach ($kata as $row) : ?>
                <p>"<?= $row["kata"]; ?>"</p>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        <p><i>Author "<?= $row["author"]; ?>" </i></p>
    </div>

    <div class="btns">
        <ul>
            <li><button type="button" class="" data-toggle="modal" data-target="#staticBackdrop">
                    <ion-icon name="add-circle-outline"></ion-icon>
                </button></li>
            <li><a href="https://github.com/NuryanaNn"><button>
                        <ion-icon name="logo-github"></ion-icon>
                    </button></a></li>
            <li><button type="button" class="" data-toggle="modal" data-target="#staticBackdrop">
                    <ion-icon name="logo-facebook"></ion-icon>
                </button></li>
            <li><button type="button" class="" data-toggle="modal" data-target="#staticBackdrop">
                    <ion-icon name="logo-instagram"></ion-icon>
                </button></li>
        </ul>
    </div>
    <div class="footer">
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <!--navigasi-->
                <?php if ($halamanAktif > 1) : ?>
                    <li class="page-item"><a class="page-link" a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a></li>
                <?php endif; ?></li>

                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?></li>
                    <?php if ($i == $halamanAktif) : ?></li>
                        <li class="page-item"><a class="page-link" a href="?halaman=<?= $i; ?>" style="font-weight:bold; color:red;"><?= $i; ?></a>
                        <?php else : ?>
                        <li class="page-item"><a class="page-link" a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item"><a class="page-link" a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
                        <?php endif; ?>
            </ul>
        </div>

        <p></p>



        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Hallo Users :)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="modal-body">
                            <div class="input-group">
                                <textarea class="form-control" name="kata" aria-label="With textarea" placeholder="Masukan Quotes"></textarea>
                            </div>

                            <div class="input-group mt-3">
                                <input type="text" class="form-control" name="author" aria-label="text" placeholder="Nama Anda"></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <ion-icon name="close-circle-outline"></ion-icon>
                            </button>
                            <button type="submit" class="btn btn-primary" name="submit">
                                <ion-icon name="checkmark-circle-outline"></ion-icon>
                            </button>
                        </div>
                </div>
            </div>
        </div>
</body>

</html>