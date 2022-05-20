<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chocolate Quente</title>
</head>

<header>
    <a href="index.html" class="logo"><i class="fas fa-coffee"></i>Receitinhas</a>
    <div id="menu-bar" class="fas fa-bars"></div>
    <nav class="navbar">
        <a href="index.html">Menu</a>
        <a href="#order">Contato</a>
    </nav>

</header>
<body>
<section class="home" id="home">
    <div class="content">
        <h1>Chocolate Quente</h1>

        <h3>Modo de preparo:</h2>
        <ul>
            <li>Coloque em um liquidificador o leite, o chocolate em pó, açúcar e o amido de milho e bata até que a mistura fique homogênea.</li>
            <li>Despeje a mistura em uma panela, acrescente a canela e misture até ferver.</li>
            <li>Retire a canela, desligue o fogo, acrescente o creme de leite e misture bem.</li>
        </ul>
        <h3>Gere a sua receita com quantidades personalizadas!</h2>
        <br>    
    </div>

   
</section>
<section class="popular" id="popular">
<form method="POST">
        <label>Quantidade de porções desejadas:</label>
        <input type="number" name="qtdP" required>
        <label>Quantidade de cozinheiros(as) envolvidos:</label>
        <input type="number" name="qtdCoz" required>
        <label>Insira quanto você irá cobrar por cada chocolate quente:</label>
        <input type="number" name="preco" required>
        <input type="submit" name="submit" value="GERAR">
    </form>
</section>
    

    <!--
      1 Xícara de Leite
      3 Colheres de Sopa de Chocolate em pó
      2 Colheres de Sopa de Açúcar
      2 Colheres de Sopa de Amido de milho
      1 Pau de canela
      1/2 Xícara de Creme de leite

      tempo de preparo 10min

      MERCADO 1 = ASUN
      MERCADO 2 = NACIONAL SUPERMERCADOS
      MERCADO 3 = CARREFOUR
    -->

    <?php
       if(isset($_POST["submit"])) {
            //------------------------------Receita
            $qtdP = $_POST["qtdP"];
            $qtdCoz = $_POST["qtdCoz"];
            $leite = $qtdP;
            $choco = $qtdP * 3;
            $sugar = $qtdP * 2;
            $amido = $qtdP * 2;
            $canela = 1;
            $cremeLeite = 0.5 * $qtdP;

            $tempoP = (10*$qtdP) / $qtdCoz;
            if($tempoP < 10) $tempoP = 10;
            $tempoP = ceil($tempoP);
            //------------------------------Receita

            //------------------------------Financeiro
            $preco = $_POST["preco"];
                
                //---media de xícara 240ml, cerca de 4 xícaras por litro de leite
                $leiteR = ceil($leite/4);

                $leiteCusto = array((4.29*$leiteR), (4.99*$leiteR), (4.79*$leiteR));
                $leiteCustoP = array((4.29*($leite/4)), (4.99*($leite/4)), (4.79*($leite/4)));
                //---xícara de leite 240ml, cerca de 4 xícaras por litro de leite

                //---colher de sopa de chocolate em po 6 gramas, cerca de 33 colheres de sopa por pacote de 200g
                $chocoR = ceil($choco/33);

                $chocoCusto = array((19.50*$chocoR), (19.99*$chocoR), (19.19*$chocoR));
                $chocoCustoP = array((19.50*($choco/33)), (19.99*($choco/33)), (19.19*($choco/33)));
                //---colher de sopa de chocolate em po 6 gramas, cerca de 33 colheres de sopa por pacote de 200g

                //---colher de sopa de açúcar 10 gramas, cerca de 100 colheres de sopa por kilo
                $sugarR = ceil($sugar/100);

                $sugarCusto = array((4.48*$sugarR), (5.99*$sugarR), (4.29*$sugarR));
                $sugarCustoP = array((4.48*($sugar/100)), (5.99*($sugar/100)), (4.29*($sugar/100)));
                //---colher de sopa de açúcar 10 gramas, cerca de 100 colheres de sopa por kilo

                //---colher de sopa de amido de milho 9 gramas, cerca de 22 colheres de sopa por pacote de 200g
                $amidoR = ceil($amido/22);

                $amidoCusto = array((4.79*$amidoR),(4.39*$amidoR), (4.38*$amidoR));
                $amidoCustoP = array((4.79*($amido/22)),(4.39*($amido/22)), (4.38*($amido/22)));
                //---colher de sopa de amido de milho 9 gramas, cerca de 22 colheres de sopa por pacote de 200g

                //---Sempre 1 canela, não importa quantidade
                $canelaCusto = array(5.98, 4.99, 3.79);
                $canelaCustoP = array((5.98/8), (4.99/8), (3.79/8));
                //---Sempre 1 canela, não importa quantidade

                //---meia xícara de creme de leite 121g, cerca de 1 xícara(2 metades) por caixa de creme de leite
                $cremeLeiteR = ceil($cremeLeite);

                $cremeCusto = array((2.89*$cremeLeiteR), (3.99*$cremeLeiteR), (3.59*$cremeLeiteR));
                $cremeCustoP = array((2.89*$cremeLeite), (3.99*$cremeLeite), (3.59*$cremeLeite));
                //---meia xícara de creme de leite 121g, cerca de 1 xícara(2 metades) por caixa de creme de leite
            
            $custoP = array(($leiteCustoP[0]) + ($chocoCustoP[0]) + ($sugarCustoP[0]) + ($amidoCustoP[0]) + ($canelaCustoP[0]) + ($cremeCustoP[0]), 
            ($leiteCustoP[1]) + ($chocoCustoP[1]) + ($sugarCustoP[1]) + ($amidoCustoP[1]) + ($canelaCustoP[1]) + ($cremeCustoP[1]), 
            ($leiteCustoP[2]) + ($chocoCustoP[2]) + ($sugarCustoP[2]) + ($amidoCustoP[2]) + ($canelaCustoP[2]) + ($cremeCustoP[2]));
            $lucroM1 = ($preco*$qtdP)-$custoP[0];
            $lucroM2 = ($preco*$qtdP)-$custoP[1];
            $lucroM3 = ($preco*$qtdP)-$custoP[2];


            $lucros = array(number_format($lucroM1, 2), number_format($lucroM2, 2), number_format($lucroM3, 2));
            //------------------------------Financeiro

            echo "
                <h3>Tempo de preparo: $tempoP minutos.</h3>

                <h3>Ingredientes:</h3>
                <ul>
                    <li>$leite xícara(s) de leite;</li>
                    <li>$choco colher(es) de sopa de chocolate em pó;</li>
                    <li>$sugar colher(es) de sopa de açúcar;</li>
                    <li>$amido colher(es) de sopa de amido de milho;</li>
                    <li>$canela pau(s) de canela;</li>
                    <li>$cremeLeite xícara(s) de creme de leite.</li>
                </ul>

                <h2>Financeiro</h2>

                <br>
                
                <table>    
                <tr>
                    <th></th>
                    <th>Quantidade</th>
                    <th>Asun</th>
                    <th>Nacional Supermercados</th>
                    <th>Carrefour</th>
                </tr>
                <tr>
                    <th>Leite</th>
                    <td> $leiteR </td>
                    <td>R$ $leiteCusto[0]</td>
                    <td>R$ $leiteCusto[1]</td>
                    <td>R$ $leiteCusto[2]</td>
                </tr>
                <tr>
                    <th>Chocolate em Pó</th>
                    <td> $chocoR </td>
                    <td>R$ $chocoCusto[0]</td>
                    <td>R$ $chocoCusto[1]</td>
                    <td>R$ $chocoCusto[2]</td>
                </tr>
                <tr>
                    <th>Açúcar</th>
                    <td> $sugarR </td>
                    <td>R$ $sugarCusto[0]</td>
                    <td>R$ $sugarCusto[1]</td>
                    <td>R$ $sugarCusto[2]</td>
                </tr>
                <tr>
                    <th>Amido de Milho</th>
                    <td> $amidoR </td>
                    <td>R$ $amidoCusto[0]</td>
                    <td>R$ $amidoCusto[1]</td>
                    <td>R$ $amidoCusto[2]</td>
                </tr>
                <tr>
                    <th>Canela</th>
                    <td> 1 </td>
                    <td>R$ $canelaCusto[0]</td>
                    <td>R$ $canelaCusto[1]</td>
                    <td>R$ $canelaCusto[2]</td>
                </tr>
                <tr>
                    <th>Creme de Leite</th>
                    <td> $cremeLeiteR </td>
                    <td>R$ $cremeCusto[0]</td>
                    <td>R$ $cremeCusto[1]</td>
                    <td>R$ $cremeCusto[2]</td>
                </tr>
                <tr>
                    <td style='padding: 9px;'></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Custo de Produção (Un.)</th>
                    <td>1</td>
                    <td>R$ " . number_format(($custoP[0]/$qtdP), 2) . "</td>
                    <td>R$ " . number_format(($custoP[1]/$qtdP), 2) . "</td>
                    <td>R$ " . number_format(($custoP[2]/$qtdP), 2) . "</td>
                </tr>
                <tr>
                    <th>Custo de Produção</th>
                    <td>$qtdP</td>
                    <td>R$ " . number_format($custoP[0], 2) . "</td>
                    <td>R$ " . number_format($custoP[1], 2) . "</td>
                    <td>R$ " . number_format($custoP[2], 2) . "</td>
                </tr>
                <tr>
                    <th>Lucro/Prejuízo</th>
                    <td></td>
                    <td>R$ $lucros[0]</td>
                    <td>R$ $lucros[1]</td>
                    <td>R$ $lucros[2]</td>
                </tr>
                </table>
            ";
       }
    ?>

<section class="footer">
    <div class="share">
        <a href="https://pt-br.facebook.com/receitinhas/" class="btn">Facebook</a>
        <a href="https://twitter.com/search?q=receitinhas&src=typed_query" class="btn">Twitter</a>
        <a href="https://www.instagram.com/explore/tags/receitinhas/" class="btn">Instagram</a>
    </div>

    <h1 class="credit"> Desenvolvido por<span> Arthur de Oliveira, Isadora Munari, Gustavo Martins, Nicolas Danone, Pedro Ferri e Rodriggo Michelsen </span> | Todos os direitos reservados! </h1>
</section>

<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<script src="js/script.js"></script>

<!-- <div class="loader-container">
    <img src="img/load2.gif" alt="">
</div> -->

</body>
</html>
