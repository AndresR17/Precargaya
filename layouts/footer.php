<footer class="mt-16 space-y-6 flex flex-col px-8 py-8 bg-gray-800">
    <div class="flex justify-evenly">
        <a href="<?= BASE_URL; ?>" class="flex items-center space-x-2">
            <!-- <img src="<?= BASE_URL . 'img/logo-antes.jpg'; ?>" class="h-10 rounded" alt="logo recargaya!" /> -->
            <p class="flex text-2xl font-bold whitespace-nowrap text-gray-200 flex-col mb-0">RECARGAYA
                <span class="text-sm font-normal">Tu satisfaccion es nuestro mayor objetivo</span>
            </p>
        </a>

        <div class="flex flex-col">
            <p class="text-gray-200 text-center text-xl mb-6 font-bold">Síguenos en</p>
            <div class="flex justify-evenly space-x-8">
                <a href="https://web.facebook.com/profile.php?id=100094769269248" target="_blank" class="flex items-center space-x-1 hover:scale-110 transition">
                    <img src="<?= BASE_URL . 'img/footer/Facebook_Logo_Primary.png' ?>" class="w-8 h-8 rounded-lg">
                    <p class="text-gray-200">Facebook</p>
                </a>
                <a href="https://www.instagram.com/recargaya_col/" target="_blank" class="flex items-center space-x-1 hover:scale-110 transition">
                    <img src="<?= BASE_URL . 'img/footer/Instagram_Glyph_Gradient.png' ?>" class="w-8 h-8 rounded-lg">
                    <p class="text-gray-200">Instagram</p>
                </a>
                <a href="" target="_blank" class="flex items-center space-x-1 hover:scale-110 transition">
                    <img src="<?= BASE_URL . 'img/footer/Logo.png' ?>" class="w-8 h-8 rounded-lg">
                    <p class="text-gray-200">Telegram</p>
                </a>
            </div>
        </div>
    </div>

    <div class="flex justify-center py-6">
        <p class="border-b border-gray-600 w-9/12"></p>
    </div>

    <div class="flex justify-evenly items-center">
        <!-- <p class="text-gray-400 text-center text-sm font-semibold mr-2 text-justify mb-2 2xl:mb-0">Aviso: <span class="font-normal">Nuestros servicios están disponibles únicamente para personas mayores de 18 años. Por favor, juega de manera responsable.</span>
        </p> -->
        <a href="public/TÉRMINOS Y CONDICIONES – RecargaYa.pdf" target="_blank" class="flex items-center text-gray-300 hover:underline font-semibold">
            Terminos y condiciones
        </a>
        <p class="text-gray-400 text-sm text-center font-normal">Copyright &copy <?= date('Y') ?> RecargaYa</p>

    </div>

    <div class="mb-8 xl:hidden"></div>
</footer>

<script type="module" src="<?= BASE_URL . 'src/js/formLogin.js' ?>"></script>
<script type="module" src="<?= BASE_URL . 'src/js/formRegistro.js' ?>"></script>

</body>

</html>