<?php

    include_once 'connect.php';

    //get
    if (isset($_GET['city_origin']) && isset($_GET['city_destiny'])) {
        $city_origin = $_GET['city_origin'];
        $city_destiny = $_GET['city_destiny'];
        $date_initial = $_GET['date_initial'];
        $date_and = $_GET['date_and'];
        //$coupon = $_GET['coupon'];
    
        // Construir a parte básica da consulta
        $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
    
        // Adicionar condição para date_initial, se não for vazio
        if ($date_initial !== '') {
            $sql_base .= " AND departure_date = '$date_initial'";
        }
    
        // Adicionar condição para date_and, se não for vazio
        if ($date_and !== '') {
            $sql_base .= " AND arrival_date = '$date_and'";
        }
    
        // $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
        // $sql = "$sql_base AND departure_date = '$date_initial' AND arrival_date = '$date_and'";
        $result = mysqli_query($connection, $sql);
    
    }else {
        echo "Erro de carregamento";
    }

    $alertMessage = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o formulário foi submetido via POST
        if (!empty($_POST['city_origin']) && !empty($_POST['city_destiny'])) {
            // Dados do formulário foram preenchidos corretamente
            $city_origin = $_POST['city_origin'];
            $city_destiny = $_POST['city_destiny'];
            $date_initial = $_POST['date_initial'];
            $date_and = $_POST['date_and'];

            $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
    
            // Adicionar condição para date_initial, se não for vazio
            if ($date_initial !== '') {
                $sql_base .= " AND departure_date = '$date_initial'";
            }
        
            // Adicionar condição para date_and, se não for vazio
            if ($date_and !== '') {
                $sql_base .= " AND arrival_date = '$date_and'";
            }

            //pesquisas 
            $sql_base = "SELECT * FROM travel WHERE origin = '$city_origin' AND destiny = '$city_destiny'";
            $sql = "$sql_base AND departure_date = '$date_initial' AND arrival_date = '$date_and'";
            $result = mysqli_query($connection, $sql);
            
        }

        // if (mysqli_num_rows($result) === 0) {
        //     echo '<script>alert("Nenhuma viagem encontrada!");</script>';
        // }
        
    }
?>
<html>
    <header>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="assets/styles/global.css">
        <link rel="stylesheet" type="text/css" href="assets/styles/register.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        </style>
        <!-- icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="assets/styles/busca.css" />
        <!--tecket 2-->
    </header>
    <body>
        <!-- navbar -->
        <nav>
            <div class="navbar-big">
                <a href="homePage.php"><img src="assets/images/teixeira_logo.png" width="auto" height="50px"/></a>
                <div>
                    <ul class="navbar-list">
                        <li class="ajuda-horarios" id="ajuda-horarios">Ajuda e horários 
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                            <div class="menu-suspenso-op" id="menu-suspenso-ajuda">
                                <div style="width: 200px; margin-right: 1rem;">
                                    <span style="font-weight: 500; font-size: 20px;color: black;">Ajuda</span>
                                    <p>Consulte as perguntas
                                        frequentes e os horários
                                        das nossas agências.
                                    </p>
                                </div>
                                <a href="#" style="text-decoration: none; color: black;"><div style="display: flex;justify-content: center; align-items: center; font-size: 15px; color: black;">
                                    Horários de guiches 
                                    <span class="material-symbols-outlined" style="margin-left: 5px;">
                                        schedule
                                    </span>
                                </div></a>
                            </div>
                        </li>
                        <a href="#" style="text-decoration: none; color: black; margin-left: 20px; margin-right: 20px;"><li>Nossos destinos</li></a>
                        <li class="login" id="login">Entrar na sua conta
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                            <div class="menu-suspenso-op" id="menu-suspenso-login" style="right: 1rem;">
                                <div class="menu-suspenso-op-colum1">
                                    <span>Olá, faça o seu login</span>
                                    <p>Com o seu login você tem
                                        acesso aos seus últimos
                                        pedidos, facilidades ao
                                        comprar e conteúdo exclusivo.
                                    </p>
                                    <button onclick="window.location.href='login.html'">
                                        Entrar na sua conta
                                        <span class="material-symbols-outlined">
                                            login
                                        </span>
                                    </button>
                                    <p>Cliente novo? 
                                        <a href="register.html" style="text-decoration: none; color: black; font-weight: 500;">Cadastre-se aqui</a>
                                    </p>
                                </div>
                                <div class="menu-suspenso-op-colum2">
                                    <a>
                                        Buscar pedido
                                        <span class="material-symbols-outlined">
                                            confirmation_number
                                            
                                        </span>
                                    </a>
                                    <hr>
                                    <a>
                                        Minha conta 
                                        <span class="material-symbols-outlined">
                                            person
                                        </span>
                                    </a>
                                    <a>
                                        Meus pedidos
                                        <span class="material-symbols-outlined">
                                            local_activity
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-small">

                <div class="menu-icon" id="menu-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>

                <a href="homePage.html"><img src="assets/images/teixeira_logo.png" width="auto" height="30px"/></a>

                <a href="#"><span class="material-symbols-outlined" style="font-weight: bold; font-size: 35px;margin-right: 20px; color: black;">account_circle</span></a>

                <div class="navbar-small-container" id="navbar-small-container">
                    <div class="navbar-small-container-list">
                        <!-- <a href="#">Buscar pedido</a>
                        <hr> -->
                        <a href="#">Nossos destinos</a>
                        <hr>
                        <a href="#">Horários de guichês</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- conteúdo -->
        <form action="" method="post" class="form">
            <label>Origem:</label>
            <select name="city_origin_search" required>
                <option <?php if ($city_origin === 'DIVINOPOLIS - MG') echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if ($city_origin === 'SÃO JOSÉ DO SALGADO - MG') echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if ($city_origin === 'ITAUNA - MG') echo 'selected'; ?>>ITAUNA - MG</option>
            </select>

            <label>Destino: </label>
            <select name="city_destiny_search" required>
                <option <?php if ($city_destiny === 'DIVINOPOLIS - MG') echo 'selected'; ?>>DIVINOPOLIS - MG</option>
                <option <?php if ($city_destiny === 'SÃO JOSÉ DO SALGADO - MG') echo 'selected'; ?>>SÃO JOSÉ DO SALGADO - MG</option>
                <option <?php if ($city_destiny === 'ITAUNA - MG') echo 'selected'; ?>>ITAUNA - MG</option>
            </select>
            <?php
                if(!empty($date_initial)&&!empty($date_and)&&!empty($coupon)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida" value="' . $date_initial . '"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno" value="' . $date_and . '"/>
                        <input type="text" name="coupon_search" placeholder="cupom" value="' . $coupon . '"/>
                    ';
                }else if(!empty($date_initial)&&!empty($date_and)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida" value="' . $date_initial . '"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno" value="' . $date_and . '"/>
                        <input type="text" name="coupon_search" placeholder="cupom"/>
                    ';
                }else if(!empty($date_initial)&&!empty($coupon)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida" value="' . $date_initial . '"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno"/>
                        <input type="text" name="coupon_search" placeholder="cupom" value="' . $coupon . '"/>
                    ';
                }else if(!empty($date_and)&&!empty($coupon)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno" value="' . $date_and . '"/>
                        <input type="text" name="coupon_search" placeholder="cupom" value="' . $coupon . '"/>
                    ';
                }else if(!empty($coupon)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno"/>
                        <input type="text" name="coupon_search" placeholder="cupom" value="' . $coupon . '"/>
                    ';
                }else if(!empty($date_initial)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida" value=""/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno"/>
                        <input type="text" name="coupon_search" placeholder="cupom"/>
                    ';
                }else if(!empty($date_and)){
                    echo '
                        <input type="date" name="date_initial_search" placeholder="Data de ida"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno" value="' . $date_and . '"/>
                        <input type="text" name="coupon_search" placeholder="cupom"/>
                    ';
                }else{
                    echo'
                        <input type="date" name="date_initial_search" plapceholder="Data de ida"/>
                        <input type="date" name="date_and_search" placeholder="Data de retorno"/>
                        <input type="text" name="coupon_search" placeholder="cupom"/>
                    ';
                }
            ?>
            <input class="button_form" name="submit" type="submit" value="Alterar busca"/>
        </form>

        


        
        <footer class="footer">
            <div class="footer-links-sociais">
                <img src="assets/images/teixeira_logo_branco.png" width="250px" height="auto" style="margin-bottom: 10px;">
                <label>
                    <img src="assets/images/facebook-icon.png" width="auto" height="30px" style="margin-right: 5px;"/>
                    Facebook
                </label>
                <label>
                    <img src="assets/images/instagram-icon.png" width="auto" height="30px" style="margin-right: 5px;"/>
                    Instagram
                </label>
            </div>

            <div class="footer-meios-de-pagamento">
                <span style="margin-bottom: 10px;font-weight: bold">MEIOS DE PAGAMENTO</span>
                <div style="display: flex; flex-direction: row;flex-wrap: wrap;">
                    <img src="assets/images/visa-icon.png" width="30px" height="auto" />
                    <img src="assets/images/american-express-icon.png" width="30px" height="auto" />
                    <img src="assets/images/mastercard-icon.png" width="30px" height="auto" />
                </div>
            </div>
            <div class="footer-phone-email">
                <span style="margin-bottom: 10px;font-weight: bold">COMPRE PELO TELEFONE</span>
                <label>
                    <img src="assets/images/phone-icon.png" width="20px" height="auto"/> 
                    (37) 3214-4070
                </label>
                <label>
                    <img src="assets/images/email-icon.png" width="20px" height="auto" style="margin-right: 5px;"/>
                    falecom@teixeiraturismo.com.br
                </label>
            </div>
            <div class="footer-atendimento">
                <span style="font-weight: bold">SAC (ATENDIMENTO AO CONSUMIDOR)</span><br>
                <div class="phone-atendimento">
                    (37) 3214-4070
                </div>
                <label>
                    <img src="assets/images/phone-icon.png" width="20px" height="auto" style="margin-right: 5px;"/>
                    0800 703 5203
                </label>
                para deficientes de fala e auditivos.
            </div>
        </footer>
        <script type="text/javascript" src="scripts/register.js"></script>
        <script type="text/javascript" src="scripts/global.js"></script>
    </body>
</html>