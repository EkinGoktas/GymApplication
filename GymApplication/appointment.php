<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EKOSPOR WEBSİTESİ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    require 'baglanti.php';
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ad = $_POST['ad'] ?? null;
        $email = $_POST['email'] ?? null;
        $antrenor = $_POST['antrenor'] ?? null;
        $hizmet = $_POST['hizmet'] ?? null;
        $tarih = $_POST['tarih'] ?? null;
        $saat = $_POST['saat'] ?? null;

        if (empty($ad) || empty($email) || empty($antrenor) || empty($hizmet) || empty($tarih) || empty($saat)) {
            $message = '<div class="alert alert-danger">Lütfen tüm alanları doldurun.</div>';
        } else {
            $sql = "INSERT INTO randevular (ad, e_posta, antrenor, hizmet, tarih, saat) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $baglanti->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ssssss", $ad, $email, $antrenor, $hizmet, $tarih, $saat);
                if ($stmt->execute()) {
                    $message = '<div class="alert alert-success">Randevu başarıyla oluşturuldu.</div>';
                } else {
                    $message = '<div class="alert alert-danger">Bir hata oluştu. Lütfen tekrar deneyin.</div>';
                }
            } else {
                $message = '<div class="alert alert-danger">Veritabanı hatası oluştu.</div>';
            }
        }
    }
    ?>
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+90585961214</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>Oof@gmail.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a href="https://www.facebook.com/?locale=tr_TR" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/?lang=tr" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://tr.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="text-body px-2" href="giris.html"><button class="btn btn-primary rounded-pill">Giriş Yap</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><img src="img/about-img.png" id="logo" /></i>EKOSPOR</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Anasayfa</a>
                        <a href="about.html" class="nav-item nav-link">Hakkımızda</a>
                        <a href="service.html" class="nav-item nav-link">Hizmetler</a>
                        <a href="price.html" class="nav-item nav-link">Fiyatlar</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Diğer</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Ekip</a>
                                <a href="appointment.html" class="dropdown-item">Randevu</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">İletişim</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Randevu</h5>
                        <h1 class="display-4">Randevu Alın</h1>
                    </div>
                    <p class="text-white mb-5">İstediğiniz gün ve saate göre uygun randevuyu alabilirsiniz. Çalışmak istediğiniz bir antrenör bulunuyorsa seçip işleme bu şekilde devam edebilirsiniz. Gerekli adımları gerçekleştirdikten sonra randevunuz başarıyla tamamlanır. Herhangi bir sorun durumunda iletişime geçebilirsiniz.</p>
                    <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="team.html">Antrenör Bul</a>
                    <a href="#team.html"><a class="btn btn-outline-dark rounded-pill py-3 px-5" href="about.html">Bilgi Al</a></a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Randevu Alanı</h1>
                        <?php if (!empty($message)) echo $message; ?>
                        <form method="post" action="">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="antrenor" style="height: 55px;">
                                        <option selected>Antrenör Seçin</option>
                                        <option value="Antrenör 1">Tuna Tavus</option>
                                        <option value="Antrenör 2">Claressa Shields</option>
                                        <option value="Antrenör 2">Ömer Faruk Müftüoğlu</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="hizmet" style="height: 55px;">
                                        <option selected>Hizmet Seçin</option>
                                        <option value="Kardiyo">Kardiyo</option>
                                        <option value="Kardiyo">Ağırlık Antremanı</option>
                                        <option value="Kardiyo">Pilates</option>
                                        <option value="Yoga">Yoga</option>
                                        <option value="Kardiyo">Havuz</option>
                                        <option value="Kardiyo">Spa</option>
                                        <option value="Kardiyo">Diyetisyen Danışmanı</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="ad" placeholder="Adınız" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="Mail" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="date" class="form-control bg-light border-0" name="tarih" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="time" class="form-control bg-light border-0" name="saat" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Randevu Oluştur</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">İletişime Geçin</h4>
                    <p class="mb-4">İletişim adresleri üzerinden hızlı bir şekilde iletişime geçin.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Sokak, Balçova, İzmir</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>Oof@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+90585961214</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Bağlantılar</h4>
                    <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right me-2"></i>Anasayfa</a>
                        <a class="text-light mb-2" href="about.html"><i class="fa fa-angle-right me-2"></i>Hakkımızda</a>
                        <a class="text-light mb-2" href="service.html"><i class="fa fa-angle-right me-2"></i>HizmetLer</a>
                        <a class="text-light mb-2" href="team.html"><i class="fa fa-angle-right me-2"></i>Ekip</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Blog</a>
                        <a class="text-light" href="contact.php"><i class="fa fa-angle-right me-2"></i>İletişim</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Popüler Bağlantılar</h4>
                    <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="index.html"><i class="fa fa-angle-right me-2"></i>Anasayfa</a>
                        <a class="text-light mb-2" href="about.html"><i class="fa fa-angle-right me-2"></i>Hakkımızda</a>
                        <a class="text-light mb-2" href="service.html"><i class="fa fa-angle-right me-2"></i>HizmetLer</a>
                        <a class="text-light mb-2" href="team.html"><i class="fa fa-angle-right me-2"></i>Ekip</a>
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Blog</a>
                        <a class="text-light" href="contact.php"><i class="fa fa-angle-right me-2"></i>İletişim</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-primary text-uppercase mt-4 mb-3">Bizi Takip Edin</h5>
                    <div class="d-flex">
                        <a href="https://www.facebook.com/?locale=tr_TR" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/?lang=tr" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://tr.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Ekin Sıla Göktaş</a></p>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
