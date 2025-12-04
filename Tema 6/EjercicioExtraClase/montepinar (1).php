<?php
// --- CONFIGURACIÓN DE LA JUNTA (BACKEND) ---
// Ocultar notificaciones de vecinos molestos (Errores leves)
error_reporting(E_ALL);
ini_set('display_errors', 1); // <--- AHORA SÍ TE DIRÁ QUÉ FALLA

// --- BASE DE DATOS DE PREGUNTAS (UD0 - UD6) ---
$preguntas = [
    // UD0: Conceptos Básicos
    1 => ["p" => "¿Qué es el protocolo HTTP según la normativa de la comunidad?", "opt" => ["Un tipo de marisco", "El lenguaje común entre clientes y servidores", "Un programa para hackear", "El nombre del conserje"], "c" => 1],
    2 => ["p" => "En la arquitectura Cliente-Servidor, ¿quién es el Cliente?", "opt" => ["El que pide el recurso (Navegador)", "El que cocina (Servidor)", "El que cobra la derrama", "La base de datos"], "c" => 0],
    3 => ["p" => "Si una web es dinámica (PHP), ¿dónde se ejecuta el código?", "opt" => ["En el monitor", "En el Cliente", "En el Servidor", "En el rellano"], "c" => 2],
    
    // UD1: Entorno de Trabajo
    4 => ["p" => "¿Qué significa XAMPP? (Pregunta de Trivial)", "opt" => ["Xenon, Apple, Mac, PC, Phone", "X-platform, Apache, MariaDB, PHP, Perl", "Xilófono, Amor, Mar, Paz, Pasión", "Ninguna de las anteriores"], "c" => 1],
    5 => ["p" => "¿Para qué sirve Git en nuestro edificio?", "opt" => ["Para limpiar la escalera", "Para controlar versiones y trabajo en equipo", "Para editar fotos", "Para crear bases de datos"], "c" => 1],
    6 => ["p" => "¿Cuál es la carpeta sagrada de XAMPP donde se guardan las webs?", "opt" => ["public_html", "www", "htdocs", "mis_cosas"], "c" => 2],
    7 => ["p" => "El puerto 80 es la puerta principal de...", "opt" => ["MySQL", "FTP", "Apache (HTTP)", "SSH"], "c" => 2],
    
    // UD2: PHP Básico
    8 => ["p" => "¿Cómo empiezan TODAS las variables en PHP? (Como el dinero del Recio)", "opt" => ["Con &", "Con %", "Con $", "Con @"], "c" => 2],
    9 => ["p" => "Para mostrar texto en pantalla (dar un grito en el patio) usamos...", "opt" => ["print_r", "echo", "return", "show"], "c" => 1],
    10 => ["p" => "¿Qué etiqueta cierra un bloque de PHP?", "opt" => ["?>", "</php>", "stop", "exit"], "c" => 0],
    11 => ["p" => "PHP es un lenguaje...", "opt" => ["Compilado (como C++)", "Interpretado (como el guion de Fermín)", "De marcas (como HTML)", "De estilos"], "c" => 1],
    
    // UD3: Estructuras de Control
    12 => ["p" => "¿Cuál es el operador de concatenación (unir frases)?", "opt" => ["+", ".", "&", ","], "c" => 1],
    13 => ["p" => "Si quiero evaluar una variable con muchos casos ('switch'), uso...", "opt" => ["case", "option", "check", "do"], "c" => 0],
    14 => ["p" => "¿Qué bucle repite el código MIENTRAS la condición sea verdadera?", "opt" => ["if", "foreach", "while", "switch"], "c" => 2],
    15 => ["p" => "Diferencia entre == y ===", "opt" => ["Ninguna", "=== compara valor y TIPO (Identidad)", "== es para asignar", "=== es para arrays"], "c" => 1],
    16 => ["p" => "La instrucción 'break' sirve para...", "opt" => ["Romper el ordenador", "Salir de un bucle o switch", "Saltar una línea", "Declarar variables"], "c" => 1],
    
    // UD4: Arrays
    17 => ["p" => "Un array en PHP es...", "opt" => ["Una lista ordenada", "Un mapa asociativo", "Ambas son correctas", "Ninguna"], "c" => 2],
    18 => ["p" => "¿Cómo se define un array vacío modernamente?", "opt" => ["\$a = array()", "\$a = []", "\$a = new Array()", "\$a = {}"], "c" => 1],
    19 => ["p" => "Si tengo \$vecinos = ['Recio', 'Enrique']; ¿Qué índice tiene 'Recio'?", "opt" => ["1", "0", "A", "-1"], "c" => 1],
    20 => ["p" => "¿Qué bucle es especialista en recorrer arrays?", "opt" => ["for", "while", "foreach", "do-while"], "c" => 2],
    21 => ["p" => "¿Cómo cuento cuántos morosos hay en un array?", "opt" => ["len()", "count()", "size()", "total()"], "c" => 1],
    22 => ["p" => "Para añadir un elemento al final de \$lista...", "opt" => ["\$lista[] = 'nuevo';", "push(\$lista, 'nuevo');", "\$lista.add('nuevo');", "\$lista += 'nuevo';"], "c" => 0],
    23 => ["p" => "Un array asociativo utiliza...", "opt" => ["Solo números", "Claves personalizadas (Strings)", "Colores", "Solo booleanos"], "c" => 1],
    24 => ["p" => "¿Qué función te muestra la estructura interna de un array (para depurar)?", "opt" => ["echo", "print", "var_dump()", "display()"], "c" => 2],
    
    // UD5: POO (Programación Orientada a Objetos)
    25 => ["p" => "¿Qué palabra clave define el 'molde' de los objetos?", "opt" => ["Object", "Class", "Function", "New"], "c" => 1],
    26 => ["p" => "¿Cómo creamos una nueva instancia (un nuevo vecino)?", "opt" => ["\$v = new Vecino();", "\$v = Vecino();", "\$v = create Vecino();", "\$v = class Vecino();"], "c" => 0],
    27 => ["p" => "¿Cómo se accede a una propiedad DENTRO de la clase?", "opt" => ["\$this->propiedad", "\$self::propiedad", "\$propiedad", "this.propiedad"], "c" => 0],
    28 => ["p" => "¿Qué visibilidad hace que una propiedad sea ACCESIBLE DESDE TODOS LADOS?", "opt" => ["private", "protected", "public", "hidden"], "c" => 2],
    29 => ["p" => "Si una propiedad es 'private', ¿quién puede tocarla?", "opt" => ["Cualquiera", "Solo la propia clase", "Las clases hijas", "El administrador"], "c" => 1],
    30 => ["p" => "¿Qué método mágico se ejecuta AL CREAR el objeto?", "opt" => ["__init", "__start", "__construct", "__main"], "c" => 2],
    31 => ["p" => "¿Qué es un Setter?", "opt" => ["Un método para modificar el valor de una propiedad", "Un método para leer", "Un tipo de variable", "Un error"], "c" => 0],
    32 => ["p" => "¿Qué es un Getter?", "opt" => ["Para modificar", "Para obtener/leer el valor de una propiedad", "Para borrar", "Para imprimir"], "c" => 1],
    33 => ["p" => "La herencia se define con la palabra...", "opt" => ["implements", "inherits", "extends", "parent"], "c" => 2],
    34 => ["p" => "Diferencia entre 'include' y 'require'", "opt" => ["Ninguna", "'require' detiene el script si falla (Fatal Error)", "'include' es más seguro", "'require' es solo para POO"], "c" => 1],
    35 => ["p" => "¿Qué pseudovariable usamos para referirnos al objeto actual?", "opt" => ["\$self", "\$this", "\$me", "\$object"], "c" => 1],
    
    // UD6: Formularios
    36 => ["p" => "¿Qué etiqueta HTML inicia el formulario?", "opt" => ["<input>", "<form>", "<submit>", "<field>"], "c" => 1],
    37 => ["p" => "¿Qué atributo indica el archivo PHP que recibirá los datos?", "opt" => ["src", "href", "action", "method"], "c" => 2],
    38 => ["p" => "¿Qué método envía los datos visibles en la URL?", "opt" => ["POST", "GET", "PUT", "HEAD"], "c" => 1],
    39 => ["p" => "¿Qué método es más seguro para enviar contraseñas?", "opt" => ["GET", "POST", "OPEN", "SECURE"], "c" => 1],
    40 => ["p" => "¿En qué array superglobal se guardan los datos enviados por POST?", "opt" => ["\$_GET", "\$_POST", "\$_REQUEST", "\$_SERVER"], "c" => 1],
    41 => ["p" => "¿Qué función comprueba si una variable existe y no es NULL?", "opt" => ["empty()", "isset()", "check()", "exists()"], "c" => 1],
    42 => ["p" => "¿Qué función comprueba si una variable existe pero está VACÍA (0, false, null)?", "opt" => ["isset()", "is_null()", "empty()", "void()"], "c" => 2],
    43 => ["p" => "El atributo 'name' en el input HTML...", "opt" => ["Es para CSS", "Es la clave en el array PHP (\$_POST['name'])", "No sirve para nada", "Es para JS"], "c" => 1],
    44 => ["p" => "¿Qué input permite elegir UNA opción entre varias?", "opt" => ["checkbox", "radio", "text", "file"], "c" => 1],
    45 => ["p" => "¿Qué input permite elegir VARIAS opciones?", "opt" => ["radio", "select", "checkbox", "button"], "c" => 2],
    
    // Mix General & Debugging
    46 => ["p" => "Si te sale 'Undefined variable', ¿qué pasa?", "opt" => ["Que te has olvidado el $", "Que estás usando una variable no creada", "Que el servidor está apagado", "Que Amador ha tocado algo"], "c" => 1],
    47 => ["p" => "Para subir ficheros, el form necesita...", "opt" => ["enctype='multipart/form-data'", "method='get'", "class='file'", "Nada especial"], "c" => 0],
    48 => ["p" => "¿El código PHP es visible para el usuario (Ver código fuente)?", "opt" => ["Sí, siempre", "No, el servidor lo procesa y devuelve HTML", "A veces", "Solo si pagas"], "c" => 1],
    49 => ["p" => "¿Qué hace 'header(\"Location: ...\")'?", "opt" => ["Pone un título", "Redirige a otra página", "Cierra la sesión", "Abre un popup"], "c" => 1],
    50 => ["p" => "Última: ¿Quién no limpia pescado?", "opt" => ["El conserje", "El mayorista (Antonio Recio)", "El concejal", "El pianista"], "c" => 1],
];

// --- PROCESAMIENTO DE LA DERRAMA (FORMULARIO) ---
$resultado = null;
$mensaje = "";
$clase_mensaje = "";

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aciertos = 0;
    $errores = []; // Guardaremos qué preguntas falló
    
    foreach ($preguntas as $id => $datos) {
        // Comprobamos si la respuesta existe en el POST
        if (isset($_POST["p$id"])) {
            if ($_POST["p$id"] == $datos['c']) {
                $aciertos++;
            } else {
                $errores[] = $id;
            }
        } else {
            $errores[] = $id; // Si no contesta, es error
        }
    }
    
    $nota = ($aciertos / count($preguntas)) * 10;
    
    // Lógica de Mensajes LQSA
    if ($nota < 5) {
        $mensaje = "¡SUSPENSO! Eres un ignorante de la vida. ¡Al cuarto de calderas! <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "suspenso";
    } elseif ($nota < 8) {
        $mensaje = "APROBADO. Un poquito de por favor, estudia más para llegar a vicepresidente. <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "aprobado";
    } else {
        $mensaje = "¡SOBRESALIENTE! Tienes el imperio, tienes el poder. ¡Mayorista, no limpio pescado! <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "sobresaliente";
    }
    
    $resultado = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junta de Propietarios - Examen PHP</title>
    <style>
        /* ESTILO VISUAL "LA QUE SE AVECINA" */
        :root {
            --azul-recio: #004d99;
            --amarillo-comunidad: #ffcc00;
            --rojo-amador: #cc0000;
            --verde-enrique: #2d862d;
            --gris-coque: #666666;
            --fondo-ladrillo: #f4e1d2;
        }

        body {
            font-family: 'Verdana', sans-serif;
            background-color: var(--fondo-ladrillo);
            background-image: linear-gradient(30deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(150deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(30deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(150deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(60deg, #e6cbb8 25%, transparent 25.5%, transparent 75%, #e6cbb8 75%, #e6cbb8), linear-gradient(60deg, #e6cbb8 25%, transparent 25.5%, transparent 75%, #e6cbb8 75%, #e6cbb8);
            background-size: 80px 140px;
            background-position: 0 0, 0 0, 40px 70px, 40px 70px, 0 0, 40px 70px;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: var(--azul-recio);
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid var(--amarillo-comunidad);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        h1 { margin: 0; font-size: 2.5em; text-transform: uppercase; text-shadow: 2px 2px 0 #000; }
        h2 { border-bottom: 2px solid var(--azul-recio); padding-bottom: 10px; color: var(--azul-recio); }

        .nav-bar {
            background: #333;
            display: flex;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-btn {
            background: none;
            border: none;
            color: white;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-btn:hover, .nav-btn.active {
            background-color: var(--amarillo-comunidad);
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            min-height: 600px;
        }

        .section { display: none; animation: fadeEffect 0.5s; }
        .section.active { display: block; }

        @keyframes fadeEffect { from {opacity: 0;} to {opacity: 1;} }

        /* PERSONAJES */
        .personaje-box {
            display: flex;
            margin-bottom: 25px;
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }
        
        .avatar {
            width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            font-weight: bold;
        }

        .contenido { padding: 20px; flex: 1; }
        
        .p-recio { border-color: var(--azul-recio); }
        .p-recio .avatar { background: var(--azul-recio); }
        
        .p-amador { border-color: var(--rojo-amador); }
        .p-amador .avatar { background: var(--rojo-amador); }
        
        .p-enrique { border-color: var(--verde-enrique); }
        .p-enrique .avatar { background: var(--verde-enrique); }

        /* CÓDIGO */
        pre {
            background: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            border-left: 5px solid var(--amarillo-comunidad);
        }
        code { color: #e06c75; font-weight: bold; }
        .comment { color: #98c379; font-style: italic; }

        /* EXAMEN */
        .pregunta-item {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-left: 4px solid var(--azul-recio);
        }
        .pregunta-titulo { font-weight: bold; font-size: 1.1em; display: block; margin-bottom: 10px; }
        .opcion { display: block; margin: 5px 0; cursor: pointer; padding: 5px; }
        .opcion:hover { background: #eef; }

        .btn-derrama {
            background-color: var(--rojo-amador);
            color: white;
            border: none;
            padding: 20px 40px;
            font-size: 1.5em;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
            box-shadow: 0 5px 0 #990000;
            transition: 0.2s;
        }
        .btn-derrama:hover { background-color: #aa0000; }
        .btn-derrama:active { transform: translateY(5px); box-shadow: none; }

        /* RESULTADOS */
        .resultado-panel {
            text-align: center;
            padding: 40px;
            border-radius: 20px;
            color: white;
            margin-bottom: 30px;
        }
        .suspenso { background: var(--rojo-amador); border: 5px solid #660000; }
        .aprobado { background: var(--azul-recio); border: 5px solid #003366; }
        .sobresaliente { background: var(--amarillo-comunidad); color: #333; border: 5px solid #cc9900; }
        
        .nota-final { font-size: 4em; font-weight: bold; margin: 10px 0; }

        /* TABLAS TEORÍA */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: var(--azul-recio); color: white; }

    </style>
</head>
<body>

<header>
    <h1>🏢 Mirador de Montepinar 🏢</h1>
    <p>Curso de Desarrollo Web en Servidor - "La que se avecina el examen"</p>
</header>

<div class="nav-bar">
    <button class="nav-btn active" onclick="cambiarPestana('teoria')">📘 Teoría (Enrique)</button>
    <button class="nav-btn" onclick="cambiarPestana('trucos')">💡 Trucos (Fermín)</button>
    <button class="nav-btn" onclick="cambiarPestana('minijuego')">⚡ Código (Amador)</button>
    <button class="nav-btn" onclick="cambiarPestana('examen')">📝 Examen (Junta)</button>
</div>

<div class="container">

    <?php if ($resultado): ?>
        <div class="resultado-panel <?php echo $clase_mensaje; ?>">
            <h2>📜 ACTA DE LA JUNTA</h2>
            <div class="nota-final"><?php echo number_format($nota, 1); ?></div>
            <h3><?php echo $mensaje; ?></h3>
            <p>Has acertado <?php echo $aciertos; ?> de <?php echo count($preguntas); ?> preguntas.</p>
            <button onclick="window.location.href='montepinar_final.php'" style="padding: 10px 20px; font-size: 1.2em; cursor: pointer;">Repetir Examen</button>
        </div>
    <?php endif; ?>

    <div id="teoria" class="section active">
        <h2>Apuntes del Concejal de Juventud y Tiempo Libre</h2>
        <p><em>"Atención, vecinos. Para aprobar hay que tener la mente fría."</em></p>

        <div class="personaje-box p-enrique">
            <div class="avatar">E</div>
            <div class="contenido">
                <h3>UD0 y UD1: El Entorno (La Arquitectura)</h3>
                <ul>
                    <li><strong>Cliente (Navegador):</strong> Pide la información (Request). Es como Maite pidiendo dinero.</li>
                    <li><strong>Servidor (Apache):</strong> Procesa y responde (Response). Es como yo haciendo las cuentas.</li>
                    <li><strong>HTTP:</strong> El idioma en el que se hablan.</li>
                    <li><strong>XAMPP:</strong> El kit de supervivencia. Trae Apache, MariaDB (Base de datos) y PHP.</li>
                    <li><strong>Git:</strong> Para guardar versiones del código y no perderlas como Coque las llaves.</li>
                </ul>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">R</div>
            <div class="contenido">
                <h3>UD2 y UD3: Sintaxis del Imperio (PHP Básico)</h3>
                <p><strong>Variables ($):</strong> Todas empiezan por el símbolo del dólar. <code>$pescado</code>, <code>$centollo</code>. PHP es 'poco tipado', traga con todo.</p>
                <p><strong>Echo:</strong> Para gritar el resultado al navegador. <code>echo "¡Marisco!";</code></p>
                <p><strong>Concatenar (.):</strong> Para unir frases usamos el punto. <code>"Hola" . " " . "Vecino"</code>.</p>
                <p><strong>Switch:</strong> Estructura para elegir. "Si es A, te confisco el felpudo. Si es B, te denuncio".</p>
            </div>
        </div>

        <div class="personaje-box p-amador">
            <div class="avatar">A</div>
            <div class="contenido">
                <h3>UD4: Arrays (La lista de la compra)</h3>
                <p>Hay dos tipos, vividor:</p>
                <ol>
                    <li><strong>Indexados (Con números):</strong> <code>$hijos = ["Pollo", "Carlota", "Nano"];</code> (El 0 es el Pollo).</li>
                    <li><strong>Asociativos (Con nombres):</strong> <code>$moto = ["marca" => "Honda", "color" => "Rojo"];</code></li>
                </ol>
                <p><strong>Foreach:</strong> El bucle para recorrerlos. <em>"Para cada cosa... salami".</em></p>
            </div>
        </div>

        <div class="personaje-box p-enrique">
            <div class="avatar">J</div>
            <div class="contenido">
                <h3>UD5: POO (Objetos y Clases - Psicoanálisis)</h3>
                <ul>
                    <li><strong>Clase (Class):</strong> El molde. La idea platónica de "Vecino".</li>
                    <li><strong>Objeto (New):</strong> El vecino real. <code>$berta = new Vecino();</code></li>
                    <li><strong>$this:</strong> Se refiere a uno mismo. Si Berta dice <code>$this->pecado</code>, es su pecado.</li>
                    <li><strong>Visibilidad:</strong>
                        <ul>
                            <li><code>Public</code>: Todo el mundo lo ve (Radio Patio).</li>
                            <li><code>Private</code>: Solo la clase lo ve (Secretos de confesión).</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">C</div>
            <div class="contenido">
                <h3>UD6: Formularios (El Buzón)</h3>
                <table>
                    <tr><th>Método</th><th>Descripción</th></tr>
                    <tr><td><strong>GET</strong></td><td>Los datos van en la URL. Inseguro. Rápido.</td></tr>
                    <tr><td><strong>POST</strong></td><td>Los datos van ocultos. Seguro. Para contraseñas y archivos.</td></tr>
                </table>
                <p>Recogemos los datos con los super-arrays: <code>$_POST['nombre_input']</code>.</p>
            </div>
        </div>
    </div>

    <div id="trucos" class="section">
        <h2>💡 Tips de Supervivencia (Fermín Trujillo)</h2>
        <p><em>"¡Tengo contactos en Silicon Valley! Ojo al dato:"</em></p>

        <div class="personaje-box p-amador">
            <div class="avatar">F</div>
            <div class="contenido">
                <h3>1. Isset vs Empty (El dilema del Cuqui)</h3>
                <p>Esto cae seguro en el examen.</p>
                <ul>
                    <li><code>isset($dinero)</code>: ¿Existe la variable dinero? (Sí, tengo la cartera, aunque esté vacía). Devuelve TRUE si está definida y no es NULL.</li>
                    <li><code>empty($dinero)</code>: ¿Tengo dinero real? (No, tengo 0). Devuelve TRUE si es 0, false, null o no existe.</li>
                </ul>
                <pre>
$cartera = 0;
isset($cartera); // TRUE (Existe la variable)
empty($cartera); // TRUE (Está vacía/cero)
                </pre>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">R</div>
            <div class="contenido">
                <h3>2. No te olvides del ;</h3>
                <p>En PHP, si no pones punto y coma al final, revienta todo como la pescadería sin aire acondicionado. <strong>¡Siempre ; al final!</strong></p>
            </div>
        </div>

        <div class="personaje-box p-enrique">
            <div class="avatar">E</div>
            <div class="contenido">
                <h3>3. Depurar Arrays (No uses echo)</h3>
                <p>Si intentas hacer <code>echo $array;</code> te saldrá la palabra "Array" y quedarás fatal en la junta. Usa:</p>
                <pre>var_dump($array); // Te dice todo
print_r($array); // Más bonito</pre>
            </div>
        </div>
    </div>

    <div id="minijuego" class="section">
        <h2>⚡ El Pinchito de Amador (Debug)</h2>
        <div class="personaje-box p-amador">
            <div class="avatar">A</div>
            <div class="contenido">
                <h3>¡Ayúdame a pinchar!</h3>
                <p>He hecho esta clase para ligar, pero siempre me sale "Salami... pero no". ¿Qué falla?</p>
<pre>
&lt;?php
class VividorFollador {
    public $nombre;
    <span class="comment">private</span> $dinero; // ¡OJO! Es privado

    public function __construct($n) {
        $this->nombre = $n;
        $this->dinero = 0; // Empiezo sin un duro
    }

    public function intentarLigar() {
        // Si tengo más de 50 euros, pincho
        if ($this->dinero > 50) {
            return "¡Pinchito!";
        } else {
            return "Salami, salami... pero no.";
        }
    }
}

$yo = new VividorFollador("Amador");
// $yo->dinero = 100; <span class="comment">// ESTO DA ERROR FATAL porque es private</span>
echo $yo->intentarLigar();
?&gt;
</pre>
                <p><strong>Solución:</strong></p>
                <ol>
                    <li>La propiedad <code>$dinero</code> es <strong>private</strong>. No puedes cambiarla desde fuera con <code>$yo->dinero = 100</code>.</li>
                    <li>Necesitas crear un método público (Setter) dentro de la clase: <code>public function setDinero($d) { $this->dinero = $d; }</code>.</li>
                    <li>Como está ahora, siempre vale 0, así que nunca entra en el IF del pinchito.</li>
                </ol>
            </div>
        </div>
    </div>

    <div id="examen" class="section">
        <h2>📝 Examen General de la Junta (50 Preguntas)</h2>
        <p>Responde con sabiduría o paga la derrama.</p>
        
        <form method="POST" action="montepinar_final.php">
            <?php foreach ($preguntas as $id => $p): ?>
                <div class="pregunta-item">
                    <span class="pregunta-titulo"><?php echo $id . ". " . $p['p']; ?></span>
                    <?php foreach ($p['opt'] as $key => $texto): ?>
                        <label class="opcion">
                            <input type="radio" name="p<?php echo $id; ?>" value="<?php echo $key; ?>" required>
                            <?php echo $texto; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            
            <button type="submit" class="btn-derrama">🗳️ Votar en la Junta (Corregir)</button>
        </form>
    </div>

</div>

<script>
    function cambiarPestana(id) {
        // Ocultar todas las secciones
        let secciones = document.getElementsByClassName('section');
        for (let i = 0; i < secciones.length; i++) {
            secciones[i].classList.remove('active');
        }
        
        // Desactivar botones
        let botones = document.getElementsByClassName('nav-btn');
        for (let i = 0; i < botones.length; i++) {
            botones[i].classList.remove('active');
        }

        // Mostrar la seleccionada
        document.getElementById(id).classList.add('active');
        
        // Activar botón correspondiente (truco simple buscando el onclick)
        let btnActivo = document.querySelector(`button[onclick="cambiarPestana('${id}')"]`);
        if(btnActivo) btnActivo.classList.add('active');
    }
</script>

</body>
</html>
<?php
// --- CONFIGURACIÓN DE LA JUNTA (BACKEND) ---
// Ocultar notificaciones de vecinos molestos (Errores leves)
error_reporting(E_ALL & ~E_NOTICE);

// --- BASE DE DATOS DE PREGUNTAS (UD0 - UD6) ---
$preguntas = [
    // UD0: Conceptos Básicos
    1 => ["p" => "¿Qué es el protocolo HTTP según la normativa de la comunidad?", "opt" => ["Un tipo de marisco", "El lenguaje común entre clientes y servidores", "Un programa para hackear", "El nombre del conserje"], "c" => 1],
    2 => ["p" => "En la arquitectura Cliente-Servidor, ¿quién es el Cliente?", "opt" => ["El que pide el recurso (Navegador)", "El que cocina (Servidor)", "El que cobra la derrama", "La base de datos"], "c" => 0],
    3 => ["p" => "Si una web es dinámica (PHP), ¿dónde se ejecuta el código?", "opt" => ["En el monitor", "En el Cliente", "En el Servidor", "En el rellano"], "c" => 2],
    
    // UD1: Entorno de Trabajo
    4 => ["p" => "¿Qué significa XAMPP? (Pregunta de Trivial)", "opt" => ["Xenon, Apple, Mac, PC, Phone", "X-platform, Apache, MariaDB, PHP, Perl", "Xilófono, Amor, Mar, Paz, Pasión", "Ninguna de las anteriores"], "c" => 1],
    5 => ["p" => "¿Para qué sirve Git en nuestro edificio?", "opt" => ["Para limpiar la escalera", "Para controlar versiones y trabajo en equipo", "Para editar fotos", "Para crear bases de datos"], "c" => 1],
    6 => ["p" => "¿Cuál es la carpeta sagrada de XAMPP donde se guardan las webs?", "opt" => ["public_html", "www", "htdocs", "mis_cosas"], "c" => 2],
    7 => ["p" => "El puerto 80 es la puerta principal de...", "opt" => ["MySQL", "FTP", "Apache (HTTP)", "SSH"], "c" => 2],
    
    // UD2: PHP Básico
    8 => ["p" => "¿Cómo empiezan TODAS las variables en PHP? (Como el dinero del Recio)", "opt" => ["Con &", "Con %", "Con $", "Con @"], "c" => 2],
    9 => ["p" => "Para mostrar texto en pantalla (dar un grito en el patio) usamos...", "opt" => ["print_r", "echo", "return", "show"], "c" => 1],
    10 => ["p" => "¿Qué etiqueta cierra un bloque de PHP?", "opt" => ["?>", "</php>", "stop", "exit"], "c" => 0],
    11 => ["p" => "PHP es un lenguaje...", "opt" => ["Compilado (como C++)", "Interpretado (como el guion de Fermín)", "De marcas (como HTML)", "De estilos"], "c" => 1],
    
    // UD3: Estructuras de Control
    12 => ["p" => "¿Cuál es el operador de concatenación (unir frases)?", "opt" => ["+", ".", "&", ","], "c" => 1],
    13 => ["p" => "Si quiero evaluar una variable con muchos casos ('switch'), uso...", "opt" => ["case", "option", "check", "do"], "c" => 0],
    14 => ["p" => "¿Qué bucle repite el código MIENTRAS la condición sea verdadera?", "opt" => ["if", "foreach", "while", "switch"], "c" => 2],
    15 => ["p" => "Diferencia entre == y ===", "opt" => ["Ninguna", "=== compara valor y TIPO (Identidad)", "== es para asignar", "=== es para arrays"], "c" => 1],
    16 => ["p" => "La instrucción 'break' sirve para...", "opt" => ["Romper el ordenador", "Salir de un bucle o switch", "Saltar una línea", "Declarar variables"], "c" => 1],
    
    // UD4: Arrays
    17 => ["p" => "Un array en PHP es...", "opt" => ["Una lista ordenada", "Un mapa asociativo", "Ambas son correctas", "Ninguna"], "c" => 2],
    18 => ["p" => "¿Cómo se define un array vacío modernamente?", "opt" => ["\$a = array()", "\$a = []", "\$a = new Array()", "\$a = {}"], "c" => 1],
    19 => ["p" => "Si tengo \$vecinos = ['Recio', 'Enrique']; ¿Qué índice tiene 'Recio'?", "opt" => ["1", "0", "A", "-1"], "c" => 1],
    20 => ["p" => "¿Qué bucle es especialista en recorrer arrays?", "opt" => ["for", "while", "foreach", "do-while"], "c" => 2],
    21 => ["p" => "¿Cómo cuento cuántos morosos hay en un array?", "opt" => ["len()", "count()", "size()", "total()"], "c" => 1],
    22 => ["p" => "Para añadir un elemento al final de \$lista...", "opt" => ["\$lista[] = 'nuevo';", "push(\$lista, 'nuevo');", "\$lista.add('nuevo');", "\$lista += 'nuevo';"], "c" => 0],
    23 => ["p" => "Un array asociativo utiliza...", "opt" => ["Solo números", "Claves personalizadas (Strings)", "Colores", "Solo booleanos"], "c" => 1],
    24 => ["p" => "¿Qué función te muestra la estructura interna de un array (para depurar)?", "opt" => ["echo", "print", "var_dump()", "display()"], "c" => 2],
    
    // UD5: POO (Programación Orientada a Objetos)
    25 => ["p" => "¿Qué palabra clave define el 'molde' de los objetos?", "opt" => ["Object", "Class", "Function", "New"], "c" => 1],
    26 => ["p" => "¿Cómo creamos una nueva instancia (un nuevo vecino)?", "opt" => ["\$v = new Vecino();", "\$v = Vecino();", "\$v = create Vecino();", "\$v = class Vecino();"], "c" => 0],
    27 => ["p" => "¿Cómo se accede a una propiedad DENTRO de la clase?", "opt" => ["\$this->propiedad", "\$self::propiedad", "\$propiedad", "this.propiedad"], "c" => 0],
    28 => ["p" => "¿Qué visibilidad hace que una propiedad sea ACCESIBLE DESDE TODOS LADOS?", "opt" => ["private", "protected", "public", "hidden"], "c" => 2],
    29 => ["p" => "Si una propiedad es 'private', ¿quién puede tocarla?", "opt" => ["Cualquiera", "Solo la propia clase", "Las clases hijas", "El administrador"], "c" => 1],
    30 => ["p" => "¿Qué método mágico se ejecuta AL CREAR el objeto?", "opt" => ["__init", "__start", "__construct", "__main"], "c" => 2],
    31 => ["p" => "¿Qué es un Setter?", "opt" => ["Un método para modificar el valor de una propiedad", "Un método para leer", "Un tipo de variable", "Un error"], "c" => 0],
    32 => ["p" => "¿Qué es un Getter?", "opt" => ["Para modificar", "Para obtener/leer el valor de una propiedad", "Para borrar", "Para imprimir"], "c" => 1],
    33 => ["p" => "La herencia se define con la palabra...", "opt" => ["implements", "inherits", "extends", "parent"], "c" => 2],
    34 => ["p" => "Diferencia entre 'include' y 'require'", "opt" => ["Ninguna", "'require' detiene el script si falla (Fatal Error)", "'include' es más seguro", "'require' es solo para POO"], "c" => 1],
    35 => ["p" => "¿Qué pseudovariable usamos para referirnos al objeto actual?", "opt" => ["\$self", "\$this", "\$me", "\$object"], "c" => 1],
    
    // UD6: Formularios
    36 => ["p" => "¿Qué etiqueta HTML inicia el formulario?", "opt" => ["<input>", "<form>", "<submit>", "<field>"], "c" => 1],
    37 => ["p" => "¿Qué atributo indica el archivo PHP que recibirá los datos?", "opt" => ["src", "href", "action", "method"], "c" => 2],
    38 => ["p" => "¿Qué método envía los datos visibles en la URL?", "opt" => ["POST", "GET", "PUT", "HEAD"], "c" => 1],
    39 => ["p" => "¿Qué método es más seguro para enviar contraseñas?", "opt" => ["GET", "POST", "OPEN", "SECURE"], "c" => 1],
    40 => ["p" => "¿En qué array superglobal se guardan los datos enviados por POST?", "opt" => ["\$_GET", "\$_POST", "\$_REQUEST", "\$_SERVER"], "c" => 1],
    41 => ["p" => "¿Qué función comprueba si una variable existe y no es NULL?", "opt" => ["empty()", "isset()", "check()", "exists()"], "c" => 1],
    42 => ["p" => "¿Qué función comprueba si una variable existe pero está VACÍA (0, false, null)?", "opt" => ["isset()", "is_null()", "empty()", "void()"], "c" => 2],
    43 => ["p" => "El atributo 'name' en el input HTML...", "opt" => ["Es para CSS", "Es la clave en el array PHP (\$_POST['name'])", "No sirve para nada", "Es para JS"], "c" => 1],
    44 => ["p" => "¿Qué input permite elegir UNA opción entre varias?", "opt" => ["checkbox", "radio", "text", "file"], "c" => 1],
    45 => ["p" => "¿Qué input permite elegir VARIAS opciones?", "opt" => ["radio", "select", "checkbox", "button"], "c" => 2],
    
    // Mix General & Debugging
    46 => ["p" => "Si te sale 'Undefined variable', ¿qué pasa?", "opt" => ["Que te has olvidado el $", "Que estás usando una variable no creada", "Que el servidor está apagado", "Que Amador ha tocado algo"], "c" => 1],
    47 => ["p" => "Para subir ficheros, el form necesita...", "opt" => ["enctype='multipart/form-data'", "method='get'", "class='file'", "Nada especial"], "c" => 0],
    48 => ["p" => "¿El código PHP es visible para el usuario (Ver código fuente)?", "opt" => ["Sí, siempre", "No, el servidor lo procesa y devuelve HTML", "A veces", "Solo si pagas"], "c" => 1],
    49 => ["p" => "¿Qué hace 'header(\"Location: ...\")'?", "opt" => ["Pone un título", "Redirige a otra página", "Cierra la sesión", "Abre un popup"], "c" => 1],
    50 => ["p" => "Última: ¿Quién no limpia pescado?", "opt" => ["El conserje", "El mayorista (Antonio Recio)", "El concejal", "El pianista"], "c" => 1],
];

// --- PROCESAMIENTO DE LA DERRAMA (FORMULARIO) ---
$resultado = null;
$mensaje = "";
$clase_mensaje = "";

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aciertos = 0;
    $errores = []; // Guardaremos qué preguntas falló
    
    foreach ($preguntas as $id => $datos) {
        // Comprobamos si la respuesta existe en el POST
        if (isset($_POST["p$id"])) {
            if ($_POST["p$id"] == $datos['c']) {
                $aciertos++;
            } else {
                $errores[] = $id;
            }
        } else {
            $errores[] = $id; // Si no contesta, es error
        }
    }
    
    $nota = ($aciertos / count($preguntas)) * 10;
    
    // Lógica de Mensajes LQSA
    if ($nota < 5) {
        $mensaje = "¡SUSPENSO! Eres un ignorante de la vida. ¡Al cuarto de calderas! <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "suspenso";
    } elseif ($nota < 8) {
        $mensaje = "APROBADO. Un poquito de por favor, estudia más para llegar a vicepresidente. <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "aprobado";
    } else {
        $mensaje = "¡SOBRESALIENTE! Tienes el imperio, tienes el poder. ¡Mayorista, no limpio pescado! <br> Nota: " . number_format($nota, 1);
        $clase_mensaje = "sobresaliente";
    }
    
    $resultado = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junta de Propietarios - Examen PHP</title>
    <style>
        /* ESTILO VISUAL "LA QUE SE AVECINA" */
        :root {
            --azul-recio: #004d99;
            --amarillo-comunidad: #ffcc00;
            --rojo-amador: #cc0000;
            --verde-enrique: #2d862d;
            --gris-coque: #666666;
            --fondo-ladrillo: #f4e1d2;
        }

        body {
            font-family: 'Verdana', sans-serif;
            background-color: var(--fondo-ladrillo);
            background-image: linear-gradient(30deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(150deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(30deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(150deg, #f4e1d2 12%, transparent 12.5%, transparent 87%, #f4e1d2 87.5%, #f4e1d2), linear-gradient(60deg, #e6cbb8 25%, transparent 25.5%, transparent 75%, #e6cbb8 75%, #e6cbb8), linear-gradient(60deg, #e6cbb8 25%, transparent 25.5%, transparent 75%, #e6cbb8 75%, #e6cbb8);
            background-size: 80px 140px;
            background-position: 0 0, 0 0, 40px 70px, 40px 70px, 0 0, 40px 70px;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: var(--azul-recio);
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 5px solid var(--amarillo-comunidad);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        h1 { margin: 0; font-size: 2.5em; text-transform: uppercase; text-shadow: 2px 2px 0 #000; }
        h2 { border-bottom: 2px solid var(--azul-recio); padding-bottom: 10px; color: var(--azul-recio); }

        .nav-bar {
            background: #333;
            display: flex;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-btn {
            background: none;
            border: none;
            color: white;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: 0.3s;
        }

        .nav-btn:hover, .nav-btn.active {
            background-color: var(--amarillo-comunidad);
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            min-height: 600px;
        }

        .section { display: none; animation: fadeEffect 0.5s; }
        .section.active { display: block; }

        @keyframes fadeEffect { from {opacity: 0;} to {opacity: 1;} }

        /* PERSONAJES */
        .personaje-box {
            display: flex;
            margin-bottom: 25px;
            border: 2px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
        }
        
        .avatar {
            width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            font-weight: bold;
        }

        .contenido { padding: 20px; flex: 1; }
        
        .p-recio { border-color: var(--azul-recio); }
        .p-recio .avatar { background: var(--azul-recio); }
        
        .p-amador { border-color: var(--rojo-amador); }
        .p-amador .avatar { background: var(--rojo-amador); }
        
        .p-enrique { border-color: var(--verde-enrique); }
        .p-enrique .avatar { background: var(--verde-enrique); }

        /* CÓDIGO */
        pre {
            background: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            border-left: 5px solid var(--amarillo-comunidad);
        }
        code { color: #e06c75; font-weight: bold; }
        .comment { color: #98c379; font-style: italic; }

        /* EXAMEN */
        .pregunta-item {
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-left: 4px solid var(--azul-recio);
        }
        .pregunta-titulo { font-weight: bold; font-size: 1.1em; display: block; margin-bottom: 10px; }
        .opcion { display: block; margin: 5px 0; cursor: pointer; padding: 5px; }
        .opcion:hover { background: #eef; }

        .btn-derrama {
            background-color: var(--rojo-amador);
            color: white;
            border: none;
            padding: 20px 40px;
            font-size: 1.5em;
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
            box-shadow: 0 5px 0 #990000;
            transition: 0.2s;
        }
        .btn-derrama:hover { background-color: #aa0000; }
        .btn-derrama:active { transform: translateY(5px); box-shadow: none; }

        /* RESULTADOS */
        .resultado-panel {
            text-align: center;
            padding: 40px;
            border-radius: 20px;
            color: white;
            margin-bottom: 30px;
        }
        .suspenso { background: var(--rojo-amador); border: 5px solid #660000; }
        .aprobado { background: var(--azul-recio); border: 5px solid #003366; }
        .sobresaliente { background: var(--amarillo-comunidad); color: #333; border: 5px solid #cc9900; }
        
        .nota-final { font-size: 4em; font-weight: bold; margin: 10px 0; }

        /* TABLAS TEORÍA */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: var(--azul-recio); color: white; }

    </style>
</head>
<body>

<header>
    <h1>🏢 Mirador de Montepinar 🏢</h1>
    <p>Curso de Desarrollo Web en Servidor - "La que se avecina el examen"</p>
</header>

<div class="nav-bar">
    <button class="nav-btn active" onclick="cambiarPestana('teoria')">📘 Teoría (Enrique)</button>
    <button class="nav-btn" onclick="cambiarPestana('trucos')">💡 Trucos (Fermín)</button>
    <button class="nav-btn" onclick="cambiarPestana('minijuego')">⚡ Código (Amador)</button>
    <button class="nav-btn" onclick="cambiarPestana('examen')">📝 Examen (Junta)</button>
</div>

<div class="container">

    <?php if ($resultado): ?>
        <div class="resultado-panel <?php echo $clase_mensaje; ?>">
            <h2>📜 ACTA DE LA JUNTA</h2>
            <div class="nota-final"><?php echo number_format($nota, 1); ?></div>
            <h3><?php echo $mensaje; ?></h3>
            <p>Has acertado <?php echo $aciertos; ?> de <?php echo count($preguntas); ?> preguntas.</p>
            <button onclick="window.location.href='montepinar_final.php'" style="padding: 10px 20px; font-size: 1.2em; cursor: pointer;">Repetir Examen</button>
        </div>
    <?php endif; ?>

    <div id="teoria" class="section active">
        <h2>Apuntes del Concejal de Juventud y Tiempo Libre</h2>
        <p><em>"Atención, vecinos. Para aprobar hay que tener la mente fría."</em></p>

        <div class="personaje-box p-enrique">
            <div class="avatar">E</div>
            <div class="contenido">
                <h3>UD0 y UD1: El Entorno (La Arquitectura)</h3>
                <ul>
                    <li><strong>Cliente (Navegador):</strong> Pide la información (Request). Es como Maite pidiendo dinero.</li>
                    <li><strong>Servidor (Apache):</strong> Procesa y responde (Response). Es como yo haciendo las cuentas.</li>
                    <li><strong>HTTP:</strong> El idioma en el que se hablan.</li>
                    <li><strong>XAMPP:</strong> El kit de supervivencia. Trae Apache, MariaDB (Base de datos) y PHP.</li>
                    <li><strong>Git:</strong> Para guardar versiones del código y no perderlas como Coque las llaves.</li>
                </ul>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">R</div>
            <div class="contenido">
                <h3>UD2 y UD3: Sintaxis del Imperio (PHP Básico)</h3>
                <p><strong>Variables ($):</strong> Todas empiezan por el símbolo del dólar. <code>$pescado</code>, <code>$centollo</code>. PHP es 'poco tipado', traga con todo.</p>
                <p><strong>Echo:</strong> Para gritar el resultado al navegador. <code>echo "¡Marisco!";</code></p>
                <p><strong>Concatenar (.):</strong> Para unir frases usamos el punto. <code>"Hola" . " " . "Vecino"</code>.</p>
                <p><strong>Switch:</strong> Estructura para elegir. "Si es A, te confisco el felpudo. Si es B, te denuncio".</p>
            </div>
        </div>

        <div class="personaje-box p-amador">
            <div class="avatar">A</div>
            <div class="contenido">
                <h3>UD4: Arrays (La lista de la compra)</h3>
                <p>Hay dos tipos, vividor:</p>
                <ol>
                    <li><strong>Indexados (Con números):</strong> <code>$hijos = ["Pollo", "Carlota", "Nano"];</code> (El 0 es el Pollo).</li>
                    <li><strong>Asociativos (Con nombres):</strong> <code>$moto = ["marca" => "Honda", "color" => "Rojo"];</code></li>
                </ol>
                <p><strong>Foreach:</strong> El bucle para recorrerlos. <em>"Para cada cosa... salami".</em></p>
            </div>
        </div>

        <div class="personaje-box p-enrique">
            <div class="avatar">J</div>
            <div class="contenido">
                <h3>UD5: POO (Objetos y Clases - Psicoanálisis)</h3>
                <ul>
                    <li><strong>Clase (Class):</strong> El molde. La idea platónica de "Vecino".</li>
                    <li><strong>Objeto (New):</strong> El vecino real. <code>$berta = new Vecino();</code></li>
                    <li><strong>$this:</strong> Se refiere a uno mismo. Si Berta dice <code>$this->pecado</code>, es su pecado.</li>
                    <li><strong>Visibilidad:</strong>
                        <ul>
                            <li><code>Public</code>: Todo el mundo lo ve (Radio Patio).</li>
                            <li><code>Private</code>: Solo la clase lo ve (Secretos de confesión).</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">C</div>
            <div class="contenido">
                <h3>UD6: Formularios (El Buzón)</h3>
                <table>
                    <tr><th>Método</th><th>Descripción</th></tr>
                    <tr><td><strong>GET</strong></td><td>Los datos van en la URL. Inseguro. Rápido.</td></tr>
                    <tr><td><strong>POST</strong></td><td>Los datos van ocultos. Seguro. Para contraseñas y archivos.</td></tr>
                </table>
                <p>Recogemos los datos con los super-arrays: <code>$_POST['nombre_input']</code>.</p>
            </div>
        </div>
    </div>

    <div id="trucos" class="section">
        <h2>💡 Tips de Supervivencia (Fermín Trujillo)</h2>
        <p><em>"¡Tengo contactos en Silicon Valley! Ojo al dato:"</em></p>

        <div class="personaje-box p-amador">
            <div class="avatar">F</div>
            <div class="contenido">
                <h3>1. Isset vs Empty (El dilema del Cuqui)</h3>
                <p>Esto cae seguro en el examen.</p>
                <ul>
                    <li><code>isset($dinero)</code>: ¿Existe la variable dinero? (Sí, tengo la cartera, aunque esté vacía). Devuelve TRUE si está definida y no es NULL.</li>
                    <li><code>empty($dinero)</code>: ¿Tengo dinero real? (No, tengo 0). Devuelve TRUE si es 0, false, null o no existe.</li>
                </ul>
                <pre>
$cartera = 0;
isset($cartera); // TRUE (Existe la variable)
empty($cartera); // TRUE (Está vacía/cero)
                </pre>
            </div>
        </div>

        <div class="personaje-box p-recio">
            <div class="avatar">R</div>
            <div class="contenido">
                <h3>2. No te olvides del ;</h3>
                <p>En PHP, si no pones punto y coma al final, revienta todo como la pescadería sin aire acondicionado. <strong>¡Siempre ; al final!</strong></p>
            </div>
        </div>

        <div class="personaje-box p-enrique">
            <div class="avatar">E</div>
            <div class="contenido">
                <h3>3. Depurar Arrays (No uses echo)</h3>
                <p>Si intentas hacer <code>echo $array;</code> te saldrá la palabra "Array" y quedarás fatal en la junta. Usa:</p>
                <pre>var_dump($array); // Te dice todo
print_r($array); // Más bonito</pre>
            </div>
        </div>
    </div>

    <div id="minijuego" class="section">
        <h2>⚡ El Pinchito de Amador (Debug)</h2>
        <div class="personaje-box p-amador">
            <div class="avatar">A</div>
            <div class="contenido">
                <h3>¡Ayúdame a pinchar!</h3>
                <p>He hecho esta clase para ligar, pero siempre me sale "Salami... pero no". ¿Qué falla?</p>
<pre>
&lt;?php
class VividorFollador {
    public $nombre;
    <span class="comment">private</span> $dinero; // ¡OJO! Es privado

    public function __construct($n) {
        $this->nombre = $n;
        $this->dinero = 0; // Empiezo sin un duro
    }

    public function intentarLigar() {
        // Si tengo más de 50 euros, pincho
        if ($this->dinero > 50) {
            return "¡Pinchito!";
        } else {
            return "Salami, salami... pero no.";
        }
    }
}

$yo = new VividorFollador("Amador");
// $yo->dinero = 100; <span class="comment">// ESTO DA ERROR FATAL porque es private</span>
echo $yo->intentarLigar();
?&gt;
</pre>
                <p><strong>Solución:</strong></p>
                <ol>
                    <li>La propiedad <code>$dinero</code> es <strong>private</strong>. No puedes cambiarla desde fuera con <code>$yo->dinero = 100</code>.</li>
                    <li>Necesitas crear un método público (Setter) dentro de la clase: <code>public function setDinero($d) { $this->dinero = $d; }</code>.</li>
                    <li>Como está ahora, siempre vale 0, así que nunca entra en el IF del pinchito.</li>
                </ol>
            </div>
        </div>
    </div>

    <div id="examen" class="section">
        <h2>📝 Examen General de la Junta (50 Preguntas)</h2>
        <p>Responde con sabiduría o paga la derrama.</p>
        
        <form method="POST" action="montepinar_final.php">
            <?php foreach ($preguntas as $id => $p): ?>
                <div class="pregunta-item">
                    <span class="pregunta-titulo"><?php echo $id . ". " . $p['p']; ?></span>
                    <?php foreach ($p['opt'] as $key => $texto): ?>
                        <label class="opcion">
                            <input type="radio" name="p<?php echo $id; ?>" value="<?php echo $key; ?>" required>
                            <?php echo $texto; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            
            <button type="submit" class="btn-derrama">🗳️ Votar en la Junta (Corregir)</button>
        </form>
    </div>

</div>

<script>
    function cambiarPestana(id) {
        // Ocultar todas las secciones
        let secciones = document.getElementsByClassName('section');
        for (let i = 0; i < secciones.length; i++) {
            secciones[i].classList.remove('active');
        }
        
        // Desactivar botones
        let botones = document.getElementsByClassName('nav-btn');
        for (let i = 0; i < botones.length; i++) {
            botones[i].classList.remove('active');
        }

        // Mostrar la seleccionada
        document.getElementById(id).classList.add('active');
        
        // Activar botón correspondiente (truco simple buscando el onclick)
        let btnActivo = document.querySelector(`button[onclick="cambiarPestana('${id}')"]`);
        if(btnActivo) btnActivo.classList.add('active');
    }
</script>

</body>
</html>
