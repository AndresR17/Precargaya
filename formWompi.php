<?php if (isset($_SESSION['user'])) : ?>
        <div id="divWompi" class="hidden">

            <form id="formWompi" action="https://checkout.wompi.co/p/" method="GET">
                <!-- OBLIGATORIOS -->
                <input type="hidden" name="public-key" value="pub_test_TWj13GmeFpTJYr4iPuZadTjFghK4d68z" />
                <input type="hidden" name="currency" value="COP" />
                <input type="hidden" id="precioWompi" name="amount-in-cents" />
                <input type="hidden" id="refWompi" name="reference" />
                <input type="hidden" id="hashWompi" name="signature:integrity" />

                <!-- OPCIONALES -->
                <input type="hidden" name="redirect-url" value="<?= BASE_URL . "operaciones" ?>" />
                <input type="hidden" id="timeWompi" name="expiration-time" />
                <input type="hidden" id="nameWompi" name="customer-data:full-name" />
                <input type="hidden" id="numWompi" name="customer-data:phone-number" />
                <input type="hidden" id="docWompi" name="customer-data:legal-id" />
                <input type="hidden" id="tipoDocWompi" name="customer-data:legal-id-type" />
                <button id="formButtonWompi" class="flex text-white text-base py-2 px-4 bg-blue-900 rounded-md hover:bg-blue-800" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="#233876" class="w-6 h-6 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                    Paga con<span class="font-semibold ml-1">Wompi</span>
                </button>
            </form>
        </div>
    <?php endif; ?>