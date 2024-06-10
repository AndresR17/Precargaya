    <footer class="mt-16 space-y-6 flex flex-col 2xl:flex-row justify-between items-center px-8 py-6 bg-gray-800">
        <p class="text-gray-300 text-base text-center font-semibold">&copy RecargaYa</p>
        <div class="flex items-center flex-col space-y-4 xl:space-y-2">
            <div class="flex flex-col 2xl:flex-row items-center">
                <p class="text-gray-300 font-semibold mr-2 text-justify mb-2 2xl:mb-0">Aviso: <span class="font-normal">Nuestros servicios están disponibles únicamente para personas mayores de 18 años. Por favor, juega de manera responsable.</span></p>
                <img src="<?= BASE_URL . 'img/footer/prohibido.png' ?>" class="w-8 h-6 rounded-lg hover:scale-110 transition">
            </div>
            <a href="public/TÉRMINOS Y CONDICIONES – RecargaYa.pdf" target="_blank" class="flex items-center text-gray-300 hover:underline font-semibold">
                Terminos y condiciones
            </a>
        </div>
        <div class="flex space-x-6">
            <a href="https://web.facebook.com/profile.php?id=100094769269248" target="_blank" class="hover:scale-110 transition"><img src="<?= BASE_URL . 'img/footer/Facebook_Logo_Primary.png' ?>" class="w-8 h-8 rounded-lg"></a>
            <a href="https://www.instagram.com/recargaya_col/" target="_blank" class="hover:scale-110 transition"><img src="<?= BASE_URL . 'img/footer/Instagram_Glyph_Gradient.png' ?>" class="w-8 h-8 rounded-lg"></a>
            <a href="" target="_blank" class="hover:scale-110 transition"><img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" class="w-8 h-8 rounded-lg"></a>
        </div>
        <div class="mb-8 xl:hidden"></div>
    </footer>

    <script type="module" src="<?= BASE_URL . 'src/js/formLogin.js' ?>"></script>
    <script type="module" src="<?= BASE_URL . 'src/js/formRegistro.js' ?>"></script>

    </body>

    </html>