<?php
$url = $_GET['url'];
$domain = unserialize(file_get_contents("up/domain.txt"));
$home = $domain['domain'];
$namehome = $domain['name_domain'];
$no = 'no';
if ($url == 'laporan-dmca') {
    $title = 'Laporan DMCA';
}
if ($url == 'ketentuan-layanan') {
    $title = 'Ketentuan Layanan';
}
if ($url == 'kontak') {
    $title = 'Kontak';
}
if ($url == 'tentang-kami') {
    $title = 'Tentang Kami';
}
if ($url == 'kebijakan-pribadi') {
    $title = 'Kebijakan Pribadi';
}
include 'inc/header.php';
?>
<section id="content" class="home-content animated">
    <section class="wrapper">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-content content animated">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="content-music">

                            <?php
                            if ($url == 'laporan-dmca') {
                                echo '<h1 class="h1_top">LAPORAN DMCA</h1>';

                                include 'function/curl.php';
                                if (!empty($_POST['name'])) {

                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $title = $_POST['title'];
                                    $ip = $_POST['ipinfo'];
                                    $des = $_POST['description'];
                                    $url = $_POST['url'];

                                    if (empty($_POST['company'])) {
                                        $company = '';
                                    } else {
                                        $company = $_POST['company'];
                                    }

                                    if (empty($_POST['licensed'])) {
                                        $licensed = '';
                                    } else {
                                        $licensed = $_POST['licensed'];
                                    }

                                    $arr = array(
                                        '_wpcf7' => 18,
                                        '_wpcf7_container_post' => 19,
                                        '_wpcf7_locale' => 'vi',
                                        '_wpcf7_unit_tag' => 'wpcf7-f18-p19-o1',
                                        '_wpcf7_version' => '5.0.3',
                                        'company' => $company,
                                        'ip-info' => $ip,
                                        'your-name' => $name,
                                        'email' => $email,
                                        'your-subject' => $title,
                                        'licensed' => $licensed,
                                        'description' => $des,
                                        'location-dmca' => $url,
                                    );

                                    $data = trim(http_build_query($arr));
                                    $data = str_replace('&amp;', '&', $data);

                                    $cc = new cURL();
                                    $html = $cc->post('https://dmca.rdrctng.com/wp-json/contact-form-7/v1/contact-forms/18/feedback', $data);

                                    if (preg_match('/(mail_sent|Success)/i', $html)) {
                                        echo '<div class="alert-box"><div class="alert alert-success">
  <strong>Success! </strong>Sent successfully mail. Please wait for response.
</div></div>';
                                    } else {
                                        echo '<div class="alert-box"><div class="alert alert-warning">
  <strong>Error! </strong>Email not sent. Please check again.
</div></div>';
                                    }
                                }

                                function check_ip() {
                                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                                        $ipInfo = $_SERVER['HTTP_CLIENT_IP'];
                                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                                        $ipInfo = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                    } else {
                                        $ipInfo = $_SERVER['REMOTE_ADDR'];
                                    }
                                    return $ipInfo;
                                }

                                function check_country() {

                                    $ip = check_ip();
                                    if (isset($_COOKIE['cook_ct'])) {
                                        $country = $_COOKIE['cook_ct'];
                                    } else {
                                        $urlRequest = 'http://ip.mfile.us/byip?ip=' . $ip;
                                        $country = file_get_contents($urlRequest);
                                        setcookie("cook_ct", $country, time() + 365 * 86400, "/", "thcoupon.net");
                                    }
                                    return $country;
                                }

                                $ip = check_ip() . ' - ' . check_country();
                                ?>
                                <style>
                                    .h1_top {
                                        float: left;
                                        width: 100%;
                                        font-size: 23px;
                                        padding-top: 15px;
                                        padding-left: 30px;
                                    }

                                    .wpcf7 {
                                        float: left;
                                        width: 100%;
                                        margin-top: 30px;
                                        padding-left: 50px;
                                    }

                                    .alert-box {
                                        padding: 0 50px;
                                    }
                                    .alert {
                                        float: left;
                                        width: 100%;
                                        margin: 30px 0 0;
                                    }

                                    .required {
                                        color: #cc1314;
                                    }

                                    .input-text {
                                        width: 100%;
                                        padding: 7px;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        margin-top: 6px;
                                        margin-bottom: 16px;
                                        resize: vertical;
                                        font-weight: normal;
                                    }

                                    .btn_submit {
                                        background-color: #ec650a;
                                        color: white;
                                        padding: 12px 20px;
                                        border: none;
                                        border-radius: 4px;
                                    }

                                    .btn_submit:hover {
                                        background-color: #ce5e13;
                                    }

                                    @media (max-width: 767px) {
                                        .h1_top, .alert-box, .wpcf7 {
                                            padding: 0;
                                        }
                                    }
                                </style>

                                <div role="form" class="wpcf7" id="wpcf7-f5-p9-o1" lang="vi" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <form action="" method="post" class="contact_form">
                                        <p>
                                            <label>Nama: <span class="required">*</span><br />
                                                <input type="text" name="name" value="" size="50" class="input-text" placeholder="Nama" required />
                                            </label>
                                        </p>
                                        <input type="hidden" name="ipinfo" value="<?php echo $ip; ?>"/>
                                        <p>
                                            <label>E-mail: <span class="required">*</span><br />
                                                <input type="email" name="email" value="" size="50" class="input-text" placeholder="E-mail" required />
                                            </label>
                                        </p>
                                        <p>
                                            <label>Nama Perusahaan:<br />
                                                <input type="text" name="company" value="" size="50" class="input-text" placeholder="Nama Perusahaan" />
                                            </label>
                                        </p>
                                        <p>
                                            <label>Subyek: <span class="required">*</span><br />
                                                <input type="text" name="title" value="" size="50" class="input-text" placeholder="Subyek" required />
                                            </label>
                                        </p>
                                        <p>
                                            <label>Isi pesan: <span class="required">*</span><br />
                                                <textarea name="description" cols="50" rows="5" class="input-text" required></textarea>
                                            </label>
                                        </p>
                                        <p>
                                            <label>Materi hak cipta:<br />
                                                <textarea name="licensed" cols="50" rows="5" class="input-text"></textarea>
                                            </label>
                                        </p>
                                        <p>
                                            <label>Lokasi materi melanggar (URL): <span class="required">*</span><br />
                                                <textarea name="url" cols="50" rows="5" class="input-text" placeholder="https://contoh.com" required></textarea>
                                            </label>
                                        </p>
                                        <p><input type="submit" value="KIRIM" class="btn_submit" /></p>
                                    </form>
                                </div>
                                <?php
                            } if ($url == 'ketentuan-layanan') {
                                echo '<h1 class="h1_top">Ketentuan Penggunaan</h1>';
                                ?>
                                <style>
                                    .service-box {
                                        float: left;
                                        width: 100%;
                                        margin-top: 30px;
                                    }
                                    .service-box ul {
                                        margin: auto;
                                        padding-left: 25px;
                                        margin-bottom: 10px;
                                    }
                                    .service-box ul li {
                                        list-style: circle;
                                    }
                                </style>
                                <div class="service-box">
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Selamat datang di situs <?php echo $namehome ?>. </span><span style="vertical-align: inherit;">Untuk menggunakan situs web ini, silakan baca Ketentuan Penggunaan ini dengan sexama. </span><span style="vertical-align: inherit;">Dengan menggunakan situs ini, Anda setuju dengan ketentuan dan ketentuan ini. </span><span style="vertical-align: inherit;"><?php echo $namehome ?> dapat merevisi syarat dan ketentuan ini kapan saja dengan halaman ini. </span><span style="vertical-align: inherit;">Andaman.</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Penguin adalah siapa saja yang dapat mengakses situs web untuk menggunakan situs web atau sumber daya di situs web untuk mencari informasi dan informasi terkait.</span></span>

                                    <strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Kekayaan Intelektual Hak</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> Andari memiliki using hak untuk review situs Penyanyi ATAU situs Sumber Daya untuk review Penyanyi Dari situs web ATAU tujuan Pribadi non-Komersial Andari Sendiri, menyalin Artikel di situs web Andari sumbernya Tanpa menentukan. </span><span style="vertical-align: inherit;">Kami mengijinkan penggunaan ini bersama dengan memunculkan informasi dan menjaga (url / url) </span><span style="vertical-align: inherit;">lainnya PENGGUNAAN, termasuk menyalin, memodifikasi, mempublikasi ulang ATAU Beroperasi keseluruhan sebagian, Transmisi, Distribusi, Perizinan, Penjualan ATAU pun APA publikasi Sumber Daya Dilarang Tanpa Izin sebelumnya tertulis. </span><span style="vertical-align: inherit;">pra-perbaikan oleh <?php echo $namehome ?></span></span>

                                    <strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Penggunaanlimited</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> <?php echo $namehome ?> tidak menerima penggunaan situs web atau sumber daya web untuk membuat halikut:</span></span>
                                    <ul>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Penggunaan materi dari izin kami.</span></span></li>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Penguinan sumber daya di situs web untuk perdagangan ilegal</span></span></li>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Mentransfer file komputer yang terinfeksi yang merusak komputer lain.</span></span></li>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Gunakan robot, spider, atau perakkat otomatis apa pun, dan / atau untuk memutar dan mengumpulkan sumber daya. </span><span style="vertical-align: inherit;">Teks kami.</span></span></li>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Gunakan perangkat, perangkat lunak, dan / atau proses apa pun untuk menggunakan atau mengoperasikan situs web operasi.</span></span></li>
                                        <li><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Setiap tindakan yang kami anggap tidak pantas.</span></span></li>
                                    </ul>
                                    <strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">TENTANG Penyanyi KETENTUAN</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> Kami Penyanyi DAPAT mengubah persyaratan ATAU pun Yang persyaratan Berlaku Untuk apa Tambahan Suatu materi, seperti untuk review mencerminkan undang-undang ATAU hearts perubahan perubahan Kami PADA Sumber Daya. </span><span style="vertical-align: inherit;">Anda harus selalu mencari tahu tentang ketentuan-ketentuan ini. </span><span style="vertical-align: inherit;">Kami akan memposting pemberitahuan modifikasi pembayaran di halaman ini. </span><span style="vertical-align: inherit;">Kami akan memposting istilah yang berbeda dalam Layanan yang berlaku.</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Terima kasih!</span></span>

                                </div>
                                <?php
                            } if ($url == 'kontak') {
                                echo '<h1 class="h1_top">Hubungi Kami</h1>';
                                ?>
                                <style>
                                    .contact-box {
                                        float: left;
                                        width: 100%;
                                        margin-top: 30px;
                                    }
                                </style>
                                <div class="contact-box">
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Untuk informasi lebih lanjut hubungi kami di:</span></span>
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Petugas Privasi  </span></span></p>
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NCT Holdings, Inc. </span></span></p>
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">47 Cortlandt Street, Level 27  </span></span></p>
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">New York, NY 10009  </span></span></p>
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Email: privacy@tainhac.biz</span></span></p>
                                </div>
                                <?php
                            } if ($url == 'tentang-kami') {
                                echo '<h1 class="h1_top">Tentang Kami</h1>';
                                ?>
                                <style>
                                    .about-box {
                                        float: left;
                                        width: 100%;
                                        margin-top: 30px;
                                    }
                                </style>
                                <div class="about-box">
                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Kami menawarkan musik gratis, dengan menggunakan suara benar-benar bebas. </span>
                                    </p>
                                    <span style="vertical-align: inherit;">Pengguna dapat mendengarkan komputer secara online dan di-download atau telepon untuk pemasangan cincin.</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Untuk serie iPhone, Anda perlu menginstalnya untuk iTunes. Produsen ini hanya lebih mudah, tetapi untuk saluran hanya men-download ke komputer Anda dan instalasi normal.</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">.</span></span>

                                    <strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Hormat kami, terima kasih.</span></span></strong>
                                </div>
                                <?php
                            } if ($url == 'kebijakan-pribadi') {
                                echo '<h1 class="h1_top">Kebijakan Pribadi</h1>';
                                ?>
                                <style>
                                    .privacy-box {
                                        float: left;
                                        width: 100%;
                                        margin-top: 30px;
                                    }
                                </style>
                                <div class="privacy-box"><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NCT Holdings, Inc. </span><span style="vertical-align: inherit;">atau memungkinkan menghubungi kami, dengan platform pendeteksi konten seluler terkemuka. </span><span style="vertical-align: inherit;">.</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">. </span><span style="vertical-align: inherit;">. </span><span style="vertical-align: inherit;">Masukkan ke dalam kebijakan privasi ini dengan referensi.</span></span>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">1. JENIS-JENIS INFORMASI <?php echo $namehome ?> DIKEMBALIKAN?</span></span></p>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">- Informasi Yang diberikan pengguna:</span></span></p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">  Kami memiliki information Andari Tertentu Ketika memberikan kami: such as inviting participation, JIKA Andari mengatur profil akun Andari, Andari DAPAT nama di memberikan, email Alamat Andari Dan PT Kelahiran Tanggal Manfaat musik Dan seperti Andari Acara favorit TV. </span><span style="vertical-align: inherit;">Beberapa informasi dapat digunakan untuk mengidentifikasi atau menghubungi secara langsung informasi-pribadi yang disebut sebagai informasi identitas pribadi.</span></span>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">- Informasi dari Pengguna Layanan</span></span></p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">  : Kami mengumpulkan informasi yang tidak dapat secara otomatis dari pengguna layanan kami. </span><span style="vertical-align: inherit;">Internet adalah Internet. (IP), perangkat pengidentificasi, sistem operasi, jaringan informasi seluler, jenis peramban, posisi pengguna, pencatatan tepat sebelum sebelum, kompilasi menavigasi dan segera setelah kehilangan situs, dan informasi lokasi salah (misalnya, kota atau kode pos).</span></span>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">- Penciptaan Konten:</span></span></p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">  Kami menyediakan pengguna untuk menulis, mengedit foto dan audio, dan memberikan pendapat. </span><span style="vertical-align: inherit;">Postingan Lipat dengan Layanan Kami. </span><span style="vertical-align: inherit;">Selain itu, posting mungkin dilakukan dengan mengajukan sub-direktori Anda. </span><span style="vertical-align: inherit;">Kapan Anda menggunakan informasi pribadi Anda di situs web atau aplikasi yang dapat diakses oleh penerbit, informasi tersebut akan tersedia untuk umum dan dapat diakses oleh orang lain. </span><span style="vertical-align: inherit;">.</span></span>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">2. BAGAIMANA SAYA MENGGUNAKAN <?php echo $namehome ?>?</span></span></p>

                                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">- Informasi Yang diberikan pengguna</span></span></p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">  : Kami DAPAT Yang diidentifikasi Pribadi using information Yang Kami hearts simpan berkas TENTANG Andari, Dan lain Yang Kami peroleh information Dari sebelumnya Saat ini Dan sebelumnya AKTIVITAS Andari di dalamnya. </span><span style="vertical-align: inherit;">Untuk LAYANAN: MENYEDIAKAN Produk Yang Andari Dan LAYANAN butuhkan, Mengelola akun Andari Dan Andari Memberi Dukungan pelanggan, communicate Untuk mencegah Andari Yang Andari TENTANG LAYANAN Produk ATAU PADA mungkin tertarik Andari, Dan LAYANAN Pantau Kepatuhan Terhadap KETENTUAN.</span></span>

                                    <p>- Informasi Identitas Pribadi:</p> Dari penggunaan Layanan kami. <?php echo $namehome ?> analisis non-ikan mengidentifikasi informasi yang dikumpulkan dari pengguna situs untuk lebih memahami bagaimana layanan kami digunakan dan untuk membantu menyesuaikan konten dan beriklan di layanan. Dengan mengenali pola dan tren yang kami gunakan, kami dapat merancang layanan kami dengan lebih baik untuk meningkatkan pengalaman pengguna, baik konten maupun kemudahan penggunaan. Kami juga dapat berbagi informasi agregat dengan pihak ketiga, termasuk konsultan, pengiklan, dan investor, untuk tujuan melakukan analisis bisnis secara umum.

                                    <p>- Cookie &amp; Preferensi Pengguna:</p> Cookie adalah file teks tersimpan untuk situs web dan beberapa aplikasi seluler. Kami menggunakan cookie dan teknologi serupa di Situs Web dan Aplikasi Seluler untuk melacak layanan yang Anda gunakan untuk menyimpan nama pengguna dan kata sandi Anda, untuk merekam preferensi pengguna Anda, untuk Buat Anda tetap masuk ke situs ini dan Aplikasi Seluler, dan untuk menyesuaikan konten dan iklan yang Anda lihat saat menggunakan layanan kami. Anda dapat membatasi penggunaan cookie dan perangkat penyimpanan yang serupa melalui browser Anda atau opsi sistem operasi seluler Anda. Harap dicatat bahwa menghapus atau memblokir cookie dapat berdampak negatif pada fungsionalitas layanan kami.

                                    <p>3. IKLAN PIHAK KETIGA</p>

                                    Kami menggunakan perusahaan iklan pihak ketiga untuk menayangkan iklan ketika Anda mengunjungi situs web dan menggunakan gadget. Perusahaan-perusahaan ini dapat menggunakan informasi ini ketika Anda mengunjungi situs ini dan situs web lain dan aplikasi seluler lainnya untuk menyediakan iklan pada barang dan layanan yang mungkin menarik bagi Anda.

                                    Beberapa pengiklan kami memungkinkan Anda membeli konten seperti nada dering. Untuk memfasilitasi pembelian konten semacam itu, pengiklan kami dan mitra mereka dapat memperoleh informasi tambahan. Harap dicatat bahwa informasi ini dapat digunakan sesuai dengan kebijakan privasi pengiklan, yang mungkin berbeda dari kebijakan privasi <?php echo $namehome ?>.

                                    <p>4. MENGHAPUS INFORMASI</p>

                                    <?php echo $namehome ?> tidak menyewakan, menjual, atau membagikan informasi pribadi Anda dengan pihak ketiga yang tidak terafiliasi tanpa persetujuan Anda. Kami dapat, bagaimanapun, berbagi informasi pribadi dengan kontraktor yang dapat dipercaya pihak ketiga. Kontraktor pihak ketiga dilarang menggunakan informasi untuk tujuan selain melakukan layanan untuk <?php echo $namehome ?>.

                                    <?php echo $namehome ?> dapat mengungkapkan informasi Anda kepada pihak ketiga ketika diminta untuk melakukannya oleh hukum dan untuk menyelidiki, memblokir, atau mengambil tindakan terkait dugaan, atau praktik yang dilarang. Ini termasuk, tetapi tidak terbatas pada, penipuan dan situasi yang melibatkan potensi bahaya keamanan fisik. Kami berhak untuk mengungkapkan informasi agregat, non-identitas pribadi yang dikumpulkan kepada pihak ketiga untuk tujuan apa pun.

                                    <p>5. PERUBAHAN DALAM INFORMASI PRIBADI - IDENTIFIKASI</p>

                                    Anda setiap saat meninjau atau dapat mengubah informasi pribadi Anda dengan masuk ke pengaturan akun Anda. Atas permintaan Anda melalui pengaturan akun Anda, kami akan menonaktifkan atau menghapus akun Anda dan informasi dari database kontak kami tunduk pada kebijakan penonaktifan kami dan hukum saat ini. Harap perhatikan bahwa kami mungkin diminta untuk menyimpan sebagian dari semua informasi Anda di server kami, bahkan setelah Anda menghapus akun Anda.

                                    <p>6. KEAMANAN INFORMASI</p>

                                    Kami memastikan keamanan dan penggunaan informasi Anda, personel, dan elektronik fisik yang wajar untuk melindunginya dari kehilangan, pencurian, perubahan, atau penyalahgunaan. Namun, perlu diketahui bahwa bahkan tindakan keamanan terbaik pun tidak dapat sepenuhnya menghilangkan semua risiko. Kami tidak dapat menjamin bahwa hanya orang yang berwenang yang akan melihat informasi Anda. Kami tidak bertanggung jawab atas perilaku curang pihak ketiga dari pengaturan keamanan atau tindakan keamanan apa pun.

                                    <p>7. ANAK-ANAK</p>

                                    Kami tidak mengumpulkan atau menyimpan informasi pribadi dari siapa pun yang berusia di bawah 13 tahun kecuali atau kecuali sebagaimana diizinkan oleh hukum. Setiap orang yang memberikan informasi pribadi melalui Situs Web mewakili kita bahwa dia berusia 13 tahun atau lebih. Jika kami mengetahui bahwa kami telah menerima informasi pribadi dari seseorang yang berusia di bawah 13 tahun, <?php echo $namehome ?> akan melakukan upaya yang wajar untuk menghapus informasi dari catatan kami.

                                    <p>8. PERUBAHAN KEBIJAKAN PRIVASI</p>

                                    <?php echo $namehome ?> dapat, atas kebijakannya sendiri, mengubah kebijakan privasinya dari waktu ke waktu. Setiap dan semua perubahan pada kebijakan privasi kami akan tercermin di sini, dan versi baru yang diperbarui akan diposting di bagian atas kebijakan privasi.

                                    <p>HUBUNGI KAMI</p>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Jika Anda memeki klien tentang masalah privasi kami, silakan hubungi staf kami di:</span></span>

                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Petugas Privasi  </span></span> </p>
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">NCT Holdings, Inc. </span></span> </p>
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">47 Cortlandt Street, Level 27  </span></span> </p>
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">New York, NY 10009  </span></span> </p>
                                    <span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Email: privacy@<?php echo $namehome; ?></span></span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
include 'inc/footer.php';
?>
