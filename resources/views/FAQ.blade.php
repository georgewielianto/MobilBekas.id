<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/FAQ.css" rel="stylesheet" />
    <title>FAQ - MobilBekas.id</title>
</head>

<body>
    <section id="section_faq" class="section_faq">
        <h1>Frequently Asked Questions</h1>
        <ul>
            <li>
                <div class="question">
                    <span>Apakah mobil yang dijual di sini memiliki garansi?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Kebijakan garansi tergantung pada penjual dan jenis mobil. Pastikan untuk menghubungi penjual sebelum claim garansi.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah saya bisa melakukan test drive sebelum membeli?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Ya, Anda dapat mengatur jadwal test drive dengan penjual setelah menghubungi mereka melalui website.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah saya perlu membayar uang muka?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Tentu saja anda harus membayar uang muka, Setelah itu anda baru boleh test drive. </span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah ada layanan pembiayaan atau kredit mobil?
                    </span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Ya, kami bekerja sama dengan beberapa lembaga pembiayaan yang dapat membantu Anda mendapatkan kredit mobil.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Bagaimana cara memastikan kondisi mobil yang akan dibeli?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Kami menyarankan untuk melakukan pemeriksaan menyeluruh dan mengatur inspeksi mobil dengan mekanik terpercaya sebelum membeli.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah harga mobil bisa dinegosiasi?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Anda bisa berdiskusi langsung dengan penjual untuk menegosiasikan harga.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Bagaimana cara mengetahui spesifikasi dan fitur mobil?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Spesifikasi dan fitur mobil tercantum dalam deskripsi setiap mobil yang diiklankan. Anda juga bisa menghubungi penjual untuk informasi lebih detail.
                    </span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah ada layanan pengiriman mobil ke luar kota?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Saat ini kami belum bisa melayani pengiriman ke luar kota.</span>
                </div>
            </li>
            <li>
                <div class="question">
                    <span>Apakah aman melakukan membeli mobil disini?</span>
                    <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                </div>
                <div class="answer">
                    <span>Sudah 100% aman!!!</span>
                </div>
            </li>

        </ul>

        <p>(+62)85767861578</p>
    </section>

    <div class="footer">
        <a href="{{ route('home') }}" id="backButton" class="back-button">Back to Home</a>
    </div>

    <script>
        const questions = document.querySelectorAll('.question');
        questions.forEach(function(question) {
            question.addEventListener('click', function() {
                question.classList.toggle('open');
            });
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>