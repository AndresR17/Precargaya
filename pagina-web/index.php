<?php session_start(); 
    require_once('./config/main.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>RecargaYA!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <div class="container">
            <a href="#"><img src="./img/logo-antes.jpg" class="menu-icono" alt="logo de empresa"></a>


            <a href="#" class="navbar-brand"><span>RecargaYa!</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarS"
                aria-controls="navbarS" aria-expanded="false" aria-label="Toggle-navegation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarS">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a href="#servicios" class="nav-link">Servicios</a>
                    </li>

                    <li class="nav-item">
                        <a href="#aliados" class="nav-link" >Aliados</a>
                    </li>

                    <li class="nav-item">
                        <a href="https://wa.link/xtfpkd" target="_blank" class="nav-link">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a href="https://wa.link/xtfpkd" class="nav-link" target="_blank">Ayuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="carouselE" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>

            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="1" aria-current="true"
                aria-label="Slide 2"></button>

            <button type="button" data-bs-target="#carouselE" data-bs-slide-to="2" aria-current="true"
                aria-label="Slide 3"></button>


        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="./img/img.1.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>Recarga tu cuenta </h5>
                    <p>
                        ¿Qué es RecargaYA?
                        RecargaYA es una de las plataformas de recarga y retiros de premios nacional más usada en
                        Colombia.
                    </p>
                    <a href="https://wa.link/xtfpkd" class="btn btn-primary mt-3" target="_blank">CAJERO OFICIAL</a>

                </div>
            </div>

            <div class="carousel-item">
                <img src="./img/img.2.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>Retirar Ahora!</h5>
                    <p>CON LA CONFIANZA DE MÁS DE 100 MIL PERSONAS EN TODO COLOMBIA
                        solo basta tener conexión a internet y podrás
                        utilizar nuestros servicios de recargas y retiros. Hemos realizado miles de transferencias en
                        línea desde 2022
                    </p>
                    <a href="https://wa.link/xtfpkd" class="btn btn-primary mt-3" target="_blank">CAJERO OFICIAL</a>

                </div>
            </div>

            <div class="carousel-item ">
                <img src="./img/img.3.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption">
                    <h5>deposita ahora!</h5>
                    <p>
                        El 99% de los depositos y retiros realizados con RecargaYA son procesados entre 1 a 5 minutos y
                        con 0% de comisiones

                    </p>
                    <a href="https://wa.link/xtfpkd" class="btn btn-primary mt-3" target="_blank">CAJERO OFICIAL</a>

                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselE" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselE" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="about section-padding">

        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="./img/img.down.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text text-white">
                        <h2>RecargaYA! <br>Acompañandote en los mejores momentos.</h2>
                        <p>
                            No importa si estas en tu casa, trabajo u oficina solo basta tener conexión a internet y
                            podrás utilizar nuestros servicios de recargas y retiros. Hemos realizado miles de
                            transferencias en línea desde 2022
                        </p>
                        <a href="https://wa.link/xtfpkd" class="btn btn-primary"  target="_blank">Mas Informacion</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id="servicios" class="services section-padding">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-whithe pb-5">
                        <h2>Nuestros Servicios </h2>
                        <p>Enviar una recarga en línea o bien dicho de otra manera, RECARGAR O RETIRAR PREMIOS de una
                            aplicación de apuestas, nunca fue tan fácil como lo es con RecargaYA.
                            Además de recibir dinero en efectivo en nuestras sedes comerciales, nos especializamos en
                            las transferencias en línea por medio de NEQUI, DAVIPLATA y BANCOLOMBIA, de esta manera
                            dando oportunidades a nuestro público Colombiano poder interactuar inclusive con plataformas
                            internacionales que operan en diferentes monedas, como Euros, Dólar entre otras muchas
                            opciones.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-cash"></i>
                            <h3 class="card-title">Retiros</h3>
                            <p class="load">
                                ¡Descubre la comodidad de retirar dinero cuando quieras y donde quieras con Nequi
                                Daviplata y Bancolombia!

                                Queremos hacerte la vida más fácil y accesible, por eso te invitamos a aprovechar la
                                conveniencia de nuestros cajeros . Retira efectivo de tu cuenta Nequi
                                Daviplata y Bancolombia en cualquier momento, sin importar la hora o el lugar.


                            </p>
                            <a href="https://wa.link/xtfpkd" target="_blank"><button
                                    class="btn bg-primary text-white">Mas informacion</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-bank"></i>
                            <h3 class="card-title">Depositos</h3>
                            <p class="load">
                                ¡Descubre la conveniencia de realizar tus depósitos en Nequi Daviplata y Bancolombia,
                                cuando lo necesites y donde lo desees!

                                Te extendemos una amigable invitación para aprovechar la comodidad que ofrecen nuestros
                                cajeros. Depositando en tu cuenta Nequi Daviplata y Bancolombia, podrás
                                realizar transacciones en cualquier momento del día, sin restricciones de horario ni
                                ubicación.
                            </p>
                            <a href="https://wa.link/xtfpkd" target="_blank"><button
                                    class="btn bg-primary text-white">Mas informacion</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-laptop"></i>
                            <h3 class="card-title">Ayuda</h3>
                            <p class="load">
                                ¡Queremos que sepas que estamos aquí para ayudarte en todo momento!

                                Nos complace brindarte asistencia y apoyo en tus
                                movimientos financieras. Ya sea que tengas preguntas sobre tus cuentas, necesites
                                realizar transacciones o requieras ayuda con algún servicio, nuestro equipo está listo
                                para ayudarte.
                            </p>
                            <a href="https://wa.link/xtfpkd" target="_blank"><button
                                    class="btn bg-primary text-white">Mas informacion</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="aliados" class="portafolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-white pb-5">
                        <h2>Aliados</h2>
                        <p>La colaboración con nuestros Aliados se basa en un sólido compromiso con la calidad. Su
                            enfoque
                            meticuloso y atención a los detalles han elevado nuestros estándares, asegurando que
                            entreguemos productos y servicios de alta categoría a nuestros clientes.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-dark pb-2">
                        <div class="card-body text-white">
                            <div class="img-aria mb-4">
                                <img src="./img/1xBet (2).webp" class="img-fluid" alt="">
                            </div>
                            <h3>1XBET</h3>
                            <p>¡DALE AL BOTON PARA REGISTRARTE CON NOSOSTROS!</p>
                            <a href="https://affpa.top/L?tag=d_1838183m_97c_&site=1838183&ad=97" target="_blank"><button
                                    class="btn bg-primary text-white">Registrame!</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-dark pb-2">
                        <div class="card-body text-white">
                            <div class="img-aria mb-4">
                                <img src="./img/betwinner (1).png" class="img-fluid" alt="">
                            </div>
                            <h3>BETWINNER</h3>
                            <p>¡DALE AL BOTON PARA REGISTRARTE CON NOSOSTROS!</p>
                            <a href="https://betwinner-189796.top/es?btag=d_91983m_510625c_bw_MrjngF7MW7aJqBMLP3Kpj6"
                                target="_blank"><button class="btn bg-primary text-white">Registrame!</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-dark pb-2">
                        <div class="card-body text-white">
                            <div class="img-aria mb-4">
                                <img src="./img/22Bet (1).png" class="img-fluid" alt="">
                            </div>
                            <h3>22BET</h3>
                            <p>¡DALE AL BOTON PARA REGISTRARTE CON NOSOSTROS!</p>
                            <a href="https://welcome.toptrendyinc.com/redirect.aspx?pid=83130&bid=1562&lpid=104" target="_blank"><button
                                    class="btn bg-primary text-white">Registrame!</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="team section-padding">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-white pb-3">
                        <h2>NUESTROS ANALISTAS DEPORTIVOS EXPERTOS</h2>
                        <p>
                        <p>
                            ¡Descubre con nosotros las predicciones deportivas más precisas y confiables! Nuestro equipo
                            de expertos está aquí para ofrecerte análisis detallados y recomendaciones acertadas.
                            Apuesta con seguridad y vive la emoción del deporte sabiendo que estás respaldado por los
                            mejores en predicciones deportivas. ¡Confía en nosotros para una experiencia ganadora!
                        </p>

                        </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-text text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="./img/person 1" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">Roberto</h3>
                            <p class="card-text">
                                El Visionario de las Estadísticas.
                                En las oficinas de nuestro equipo, todos reconocen a Roberto como el visionario de las
                                estadísticas. Su mente analítica y su habilidad para interpretar datos deportivos la han
                                convertido en una figura destacada en el mundo de las predicciones. Sus colegas lo
                                llaman "La Enciclopedia Deportiva" por su asombroso conocimiento. Cuando Roberto habla,
                                todos escuchan, y sus predicciones se han ganado la reputación de ser inquebrantables.
                            </p>
                            <p class="socials">
                                <a href=""><i class="bi bi-twitter text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-facebook text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-instagram text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-youtube text-white mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-text text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="./img/person 2.jpeg" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">Luis</h3>
                            <p class="card-text">
                                El Estratega Inigualable. En una esquina de la sala, encontrarás a Luis, el estratega
                                inigualable. Su enfoque
                                táctico para analizar cada movimiento en los deportes lo ha llevado a ser conocido como
                                "El Arquitecto de las Predicciones". Luis no solo ve el juego, sino que anticipa cada
                                estrategia y despliegue, dando a sus seguidores una ventaja única en sus apuestas
                            </p>
                            <p class="socials">
                                <a href=""><i class="bi bi-twitter text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-facebook text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-instagram text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-youtube text-white mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-text text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="./img/person 3.jpeg" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">Maria</h3>
                            <p class="card-text">
                                La Intuición en Estado Puro. Al otro lado de la sala, se encuentra Maria, conocida como
                                "La Intuitiva". Su capacidad
                                para sentir las vibraciones del deporte la coloca en otro nivel. Maria confía en su
                                intuición y experiencia para ofrecer predicciones que sorprenden a todos. Ha ganado el
                                apodo de "La Sacerdotisa Deportiva", ya que parece tener una conexión especial con los
                                eventos deportivos.
                            </p>
                            <p class="socials">
                                <a href=""><i class="bi bi-twitter text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-facebook text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-instagram text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-youtube text-white mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-text text-center bg-dark">
                        <div class="card-body text-white">
                            <img src="./img/person 4.avif" class="img-fluid rounded-circle" alt="">
                            <h3 class="card-title py-2">Rogger</h3>
                            <p class="card-text">
                                El Gurú de la Actualidad. Finalmente, está Rogger, el gurú de la actualidad deportiva.
                                Con su dedicación a
                                mantenerse al día con cada noticia y evento relevante, Rogger se ha ganado el título de
                                "El Oráculo del Deporte". Sus predicciones van más allá de las estadísticas,
                                incorporando el análisis de la actualidad para proporcionar una visión completa y
                                precisa.

                                Estos cuatro maestros del análisis y la predicción forman un equipo imparable, cada uno
                                aportando su propia perspectiva única. Juntos, ofrecen a nuestros seguidores la garantía
                                de las predicciones más acertadas y emocionantes en el mundo del deporte.
                            </p>
                            <p class="socials">
                                <a href=""><i class="bi bi-twitter text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-facebook text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-instagram text-white mx-1"></i></a>
                                <a href=""><i class="bi bi-youtube text-white mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact section-padding">

        <div class="container mt-5 md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center text-white pb-5">
                        <h2>REGISTRARTE</h2>
                        <p>Agradecemos tu colaboración al compartir tus comentarios. Juntos, trabajaremos para
                            garantizar que tu experiencia con nosotros sea siempre positiva y satisfactoria.
                        </p>
                    </div>
                </div>
            </div>

        
            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                    <form class="bg-dark p-4 m-auto"  method="POST" id="formClientes">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="text-white">Nombre: </label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    <div id="resName"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="lastname" class="text-white">Apellidos:</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname">
                                    <div id="resLastName"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="date" class="text-white">Fecha de nacimiento:</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                    <div id="resDate"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="text-white">Correo:</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    <div id="resEmail"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="phone" class="text-white">Telefono:</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                    <div id="resPhone"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea class="form-control" name="text" placeholder="Deja tu comentario"
                                        rows="3" id="text"></textarea>
                                        <div id="resText"></div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg btn-block" 
                                value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>© 2024 RecargaYA</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <div class="footer-links">
                        <a href="#">Inicio</a>
                        <a href="#aliados">Aliados</a>
                        <a href="#servicios">Servicios</a>
                        <a href="https://wa.link/xtfpkd">Contacto</a>
                    </div>
                    <div class="footer-social">
                        <a href="https://web.facebook.com/profile.php?id=100094769269248" target="_blank">Facebook</a>
                        <a href="https://wa.link/xtfpkd" target="_blank">Whatsapp</a>
                        <a href="https://www.instagram.com/recargaya_col/" target="_blank">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php BorrarErrores(); ?>
    <script src="./js/formClientes.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>