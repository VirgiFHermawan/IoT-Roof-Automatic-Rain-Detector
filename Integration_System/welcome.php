<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website Integration System</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Dashboard IoT</a>
                <a href="#" class="tombol-menu">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#detail">Detail</a></li>
                    <li><a href="#tools">Tools</a></li>
                    <li><a href="#software">Software</a></li>
                    <li><a href="#contact">About Us</a></li>
                    <li><a href="logout.php" class="tbl-biru">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="https://i.postimg.cc/KYcLzz00/Coding-workshop-amico.png" />
            <div class="kolom">
                <p class="deskripsi">Dashboard IoT Roof Automatic Rain Detector </p>
                <h2>CCIT FTUI
                </h2>
                <p>The following is a dashboard that we created for users, so they can see the conditions that have been read by the sensor</p>
                <p><a href="card.php" class="tbl-pink">Go To Dashboard!</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="detail">
            <div class="kolom">
                <p class="deskripsi">About This Project</p>
                <h2>Automatic Roof Rain Detector</h2>
                <p>The rain alarm project is a simple but very useful project that detects rain and automatically triggers a servo to perform roof closing. The sensor acts like a simple switch where the switch closes when it rains and normally opens when the rain stops.</p>
                <p>This project will trigger servo when it rains so we can perform some actions for rainwater and this can also be used in cars when the detector detects rain, it will automatically activate the windshield wiper of the vehicle</p>
                <p><a href="Paper Integration System - IOT ROOF AUTOMATIC RAIN DETECTOR - 4ISA2 - Group 3.pdf" class="tbl-biru">Learn More</a></p>
            </div>
            <img
                src="https://www.iotreadysolutions.com/wp-content/uploads/2019/10/Group_7-1.svg" />
        </section>

        <!-- untuk tutors -->
        <section id="tools">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Tools</p>
                    <h2>IoT Tools in This Project</h2>
                    <p>and these are some pictures of the tools we made in this project</p>
                </div>

                <div class="tutor-list">
                    <div class="kartu-tutor">
                        <img
                            src="https://www.losant.com/hs-fs/hubfs/Blog/Top_ESP8266/HiLetGo900x500.jpg?width=666&name=HiLetGo900x500.jpg" />
                        <p>Mikrocontroller ESP8266</p>
                    </div>
                    <div class="kartu-tutor">
                        <img
                            src="https://ae01.alicdn.com/kf/HTB1b6W7HFXXXXc1aXXXq6xXFXXXp/Baru-DHT11-Suhu-dan-Kelembaban-Relatif-Sensor-Modul-DHT11-Temperature-Humidity-Sensor.jpg" />
                        <p>DHT11 Sensor</p>
                    </div>
                    <div class="kartu-tutor">
                        <img
                            src="https://hackster.imgix.net/uploads/attachments/781988/module-de-sonde-de-detection-temps-de-pluie-pour-arduino_ZymdMZ02r7.jpg?auto=compress%2Cformat&w=900&h=675&fit=min" />
                        <p>Rain Sensor</p>
                    </div>
                    <div class="kartu-tutor">
                        <img
                            src="https://fit.labs.telkomuniversity.ac.id/wp-content/uploads/sites/37/2017/08/servo.jpg" />
                        <p>Motor Servo</p>
                    </div>
                    <div class="kartu-tutor">
                        <img
                            src="https://ecadio.com/image/cache/catalog/modulsensor/modul-ldr/jual-modul-sensor-cahaya-untuk-arduino-800x800.jpg" />
                        <p>Light Sensor</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="software">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Software</p>
                    <h2>Software</h2>
                    <p>and for the software and database that we use in this project are as follows</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img
                            src="https://cdn.worldvectorlogo.com/logos/visual-studio-code-1.svg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="http://appinventor.mit.edu/explore/sites/explore.appinventor.mit.edu/files/ai-bee-logo.png" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://theme.zdassets.com/theme_assets/2148942/6bdefaf710d85c6de0206ffbf1b0da3572f839ba.png" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://logowiki.net/uploads/logo/m/mysql.svg" />
                    </div>
                    <div class="kartu-partner">
                        <img
                            src="https://belajaritmudah.files.wordpress.com/2019/01/firebase.png" />
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>CEP-CCIT FTUI</h3>
                    <p>Continuing Education Program–Center for Computing and Information Technology Fakultas Teknik Universitas Indonesia</p>
                </div>
                <div class="footer-section">
                    <h3>About Us</h3>
                    <p>Siti Rayhannah - 2020010094</p>
                    <p>Virgi Febrian H - 2020010102</p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Gedung Enginering Center Lt. 1, FTUI Kampus Baru UI Depok, Jalan Prof. DR. Ir R. Roosseno, Kukusan, Kecamatan Beji, Kota Depok, Jawa Barat</p>
                    <p>Kode Pos: 16425</p>
                </div>
                <div class="footer-section">
                    <h3>Social</h3>
                    <p><b>Github :</b><a href=""> Source Code</a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2022. <b>Group 3 : CEP-CCIT </b> All Rights Reserved.
        </div>
    </div>
</body>
</html>