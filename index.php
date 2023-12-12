<?php

use Master\menu;
use Master\spjperjadin;
use Master\spjnarasumber;
use Master\spjmamin;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$spjperjadin = new spjperjadin($dataKoneksi);
$spjnarasumber = new spjnarasumber($dataKoneksi);
$spjmamin = new spjmamin($dataKoneksi);

$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">CRUD OOP</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di SPJ TIK";
            } elseif ($target == "spjperjadin") {
                if ($act == "tambah_spjperjadin") {
                    echo $spjperjadin->tambah();
                } elseif ($act == "simpan_spjperjadin") {
                    if ($spjperjadin->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    }
                } elseif ($act == "edit_spjperjadin") {
                    $id = $_GET['id'];
                    echo $spjperjadin->edit($id);
                } elseif ($act == "update_spjperjadin") {
                    if ($spjperjadin->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    }
                } elseif ($act == "delete_spjperjadin") {
                    $id = $_GET['id'];
                    if ($spjperjadin->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=spjperjadin'
                        </script>";
                    }
                }else{ 
                    echo $spjperjadin->index();
                }

                    echo "Hai, Selamat Datang di SPJ TIK";
            } elseif ($target == "spj_narasumber") {
                if ($act == "tambah_spjnarasumber") {
                    echo $spjnarasumber->tambah();
                } elseif ($act == "simpan_spjnarasumber") {
                    if ($spjnarasumber->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    }
                    if (!isset($target) or $target == "home") {
                        echo "Hai, Selamat Datang di SPJ TIK";
                    }
                     } elseif ($act == "edit_spjnarasumber") {
                    $id = $_GET['id'];
                    echo $spjnarasumber->edit($id);
                  } elseif ($act == "update_spjnarasumber") {
                    if ($spjnarasumber->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    }
                } elseif ($act == "delete_spjnarasumber") {
                    $id = $_GET['id'];
                    if ($spjnarasumber->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=spj_narasumber'
                        </script>";
                    }
                }else{ 
                    echo $spjnarasumber->index();
                }
            } elseif ($target == "spjmamin") {
                if ($act == "tambah_spjmamin") {
                    echo $spjmamin->tambah();
                } elseif ($act == "simpan_spjmamin") {
                    if ($spjmamin->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    }
                    if (!isset($target) or $target == "home") {
                        echo "Hai, Selamat Datang di SPJ TIK";
                    }
                     } elseif ($act == "edit_spjmamin") {
                    $id = $_GET['id'];
                    echo $spjmamin->edit($id);
                  } elseif ($act == "update_spjmamin") {
                    if ($spjmamin->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    }
                } elseif ($act == "delete_spjmamin") {
                    $id = $_GET['id'];
                    if ($spjmamin->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=spjmamin'
                        </script>";
                    }
                }else{ 
                    echo $spjmamin->index();
                }
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>