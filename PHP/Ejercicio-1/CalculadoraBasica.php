<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora con JavaScript</title>
    <link type="text/css" href="CalculadoraBasica.css" rel="stylesheet">
</head>

<body>
    <?php
        $miCalculadora = new Calculadora();
    ?>

    <h2>Calculadora básica</h2>
    <form action="#" method="POST">
        <div class="calculadora">
            <tr>
                <td colspan="4">
                    <input type="hidden" id="resultado" value="<?php echo $miCalculadora->resultadoPublico; ?>" >
                </td>
            </tr>
            <tr>
                <td><button type="submit" id="mrc" class="gris">mrc</button></td>
                <td><button type="submit" id="mNegative" class="gris">m-</button></td>
                <td><button type="submit" id="mPositive" class="gris">m+</button></td>
                <td><button type="submit" id="division" class="operacion">/</button></td>
            </tr>
            <tr>
                <td><button type="submit" id="siete">7</button></td>
                <td><button type="submit" id="ocho">8</button></td>
                <td><button type="submit" id="nueve">9</button></td>
                <td><button type="submit" id="multiplicacion" class="operacion">*</button></td>
            </tr>
            <tr>
                <td><button type="submit" id="cuatro">4</button></td>
                <td><button type="submit" id="cinco">5</button></td>
                <td><button type="submit" id="seis">6</button></td>
                <td><button type="submit" id="resta" class="operacion">-</button></td>
            </tr>
            <tr>
                <td><button type="submit" id="uno">1</button></td>
                <td><button type="submit" id="dos">2</button></td>
                <td><button type="submit" id="tres">3</button></td>
                <td><button type="submit" id="suma" class="operacion">+</button></td>
            </tr>
            <tr>
                <td><button type="submit" id="cero">0</button></td>
                <td><button type="submit" id="punto">.</button></td>
                <td><button type="submit" id="reset">C</button></td>
                <td><button type="submit" id="calcular">=</button></td>
            </tr>
        </table>
    </form>
    <footer>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
    </footer>
</body>

</html>

<?php
class Calculadora
{
    public $resultadoPublico;


    public function __construct()
    {
        $this->memoria = 0;
        $this->memopriaAux = 0;
        $this->memoriaLimpia = true;
    }



    public function numero($boton)
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += $boton;
        } else {
            $_SESSION['contador'] = $boton;
        }
        $this->pintar();
    }

    public function mrc()
    {
        if (isset($_SESSION['memoria'])) {
            $this->resultadoPublico = $_SESSION['memoria'];
        }
    }

    public function mNegative()
    {
        if (isset($_SESSION['memoria'])) {
            $_SESSION['memoria'] = eval($_SESSION['memoria'] - $this->resultadoPublico);
        } else {
            $_SESSION['memoria'] = eval(0 - $this->resultadoPublico);
        }
    }

    public function mPositive()
    {
        if (isset($_SESSION['memoria'])) {
            $_SESSION['memoria'] = eval($this->resultadoPublico + $_SESSION['memoria']);
        } else {
            $_SESSION['memoria'] = $this->resultadoPublico;
        }
    }

    public function division()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += "/";
        }
        $this->pintar();
    }

    public function multiplicacion()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += "*";
        }
        $this->pintar();
    }

    public function suma()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += "+";
        }
        $this->pintar();
    }

    public function resta()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += "-";
        }
        $this->pintar();
    }

    public function reset()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] = "";
        }
        $this->pintar();
    }

    public function punto()
    {
        if (isset($_SESSION['contador'])) {
            $_SESSION['contador'] += ".";
        }
        $this->pintar();
    }

    public function pintar()
    {
        $this->resultadoPublico = $_SESSION['contador'];
    }

    public function calcular()
    {
        $this->resultadoPublico = eval($_SESSION['contador']);
    }
}

if (count($_POST) > 0) {

    if (isset($_POST["mrc"])) {
        $miCalculadora->mrc();
    }
    if (isset($_POST["mNegative"])) {
        $miCalculadora->mNegative();
    }
    if (isset($_POST["mPositive"])) {
        $miCalculadora->mPositive();
    }
    if (isset($_POST["division"])) {
        $miCalculadora->division();
    }
    if (isset($_POST["siete"])) {
        $miCalculadora->numero(7);
    }
    if (isset($_POST["ocho"])) {
        $miCalculadora->numero(8);
    }
    if (isset($_POST["nueve"])) {
        $miCalculadora->numero(9);
    }
    if (isset($_POST["multiplicacion"])) {
        $miCalculadora->multiplicacion();
    }
    if (isset($_POST["cuatro"])) {
        $miCalculadora->numero(4);
    }
    if (isset($_POST["cinco"])) {
        $miCalculadora->numero(5);
    }
    if (isset($_POST["seis"])) {
        $miCalculadora->numero(6);
    }
    if (isset($_POST["resta"])) {
        $miCalculadora->resta();
    }
    if (isset($_POST["uno"])) {
        $miCalculadora->numero(1);
    }
    if (isset($_POST["dos"])) {
        $miCalculadora->numero(2);
    }
    if (isset($_POST["tres"])) {
        $miCalculadora->numero(3);
    }
    if (isset($_POST["suma"])) {
        $miCalculadora->suma();
    }
    if (isset($_POST["cero"])) {
        $miCalculadora->numero(0);
    }
    if (isset($_POST["punto"])) {
        $miCalculadora->punto();
    }
    if (isset($_POST["reset"])) {
        $miCalculadora->reset();
    }
    if (isset($_POST["calcular"])) {
        $miCalculadora->calcular();
    }
}

?>