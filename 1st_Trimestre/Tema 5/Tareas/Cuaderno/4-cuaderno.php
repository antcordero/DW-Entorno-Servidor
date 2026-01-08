<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuaderno Técnico: Desarrollo Backend</title>
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --success: #27ae60;
            --bg: #f4f7f6;
            --text: #333;
            --code-bg: #282c34;
            --code-text: #abb2bf;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0;
        }

        header {
            background: var(--primary);
            color: white;
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            -webkit-print-color-adjust: exact; 
            print-color-adjust: exact;
        }

        header h1 { margin: 0; font-size: 2.5rem; }
        header p { margin-top: 10px; font-size: 1.1rem; opacity: 0.9; }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Tarjetas de Bloques */
        .block {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--secondary);
            page-break-inside: avoid;
        }

        .block h2 {
            color: var(--primary);
            margin-top: 0;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        /* Ejercicios */
        .exercise {
            background: #fdfdfd;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            page-break-inside: avoid;
        }

        .exercise h3 {
            color: var(--secondary);
            margin-top: 0;
            display: flex;
            align-items: center;
        }

        .tag {
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .tag.hard { background: var(--accent); }

        /* Código */
        pre {
            background: var(--code-bg);
            color: var(--code-text);
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Consolas', 'Monaco', monospace;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* Inputs para alumnos */
        .student-input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fafafa;
            font-family: inherit;
            box-sizing: border-box;
        }

        textarea.student-input {
            min-height: 100px;
            resize: vertical;
        }

        /* BOTÓN DE DESCARGA */
        .download-section {
            text-align: center;
            margin: 50px 0;
            padding: 20px;
            background: #e8f8f5;
            border-radius: 10px;
            border: 1px dashed var(--success);
        }

        .btn-pdf {
            background-color: var(--success);
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-pdf:hover {
            background-color: #219150;
            transform: translateY(-2px);
        }

        /* Rúbrica */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: var(--primary);
            color: white;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            color: #777;
            font-size: 0.9rem;
        }

        /* ESTILOS PARA IMPRESIÓN (PDF) */
        @media print {
            body { background-color: white; color: black; }
            .container { width: 100%; max-width: 100%; margin: 0; padding: 0; }
            .download-section, footer { display: none !important; }
            .student-input {
                border: none;
                border-bottom: 1px solid #000;
                background: white;
                resize: none;
                padding: 0;
                margin-top: 5px;
            }
            .block, header { box-shadow: none; }
            .block { border: 1px solid #ddd; }
            .block { page-break-inside: avoid; }
            h1, h2, h3 { page-break-after: avoid; }
        }
    </style>
    
    <script>
        function guardarPDF() {
            window.print();
        }
    </script>
</head>
<body>

<header>
    <h1>Cuaderno Técnico: Desarrollo Web</h1>
    <p>Arquitectura Servidor • PHP • Programación Orientada a Objetos</p>
</header>

<div class="container">

    <div class="block" style="border-left-color: #2ecc71;">
        <h2>📝 Datos del Alumno</h2>
        <label><strong>Nombre Completo:</strong></label>
        <input type="text" class="student-input" placeholder="Escribe tu nombre aquí...">
        <label style="margin-top: 15px; display:block;"><strong>Fecha de Entrega:</strong></label>
        <input type="date" class="student-input">
    </div>

    <div class="block">
        <h2>1. Arquitectura y Entorno de Trabajo</h2>
        <p>Comprender dónde se ejecuta nuestro código y cómo configurarlo es el primer paso para ser desarrollador.</p>

        <div class="exercise">
            <h3>🚀 Reto 1: El viaje de la Petición <span class="tag">Investigación</span></h3>
            <p>Un usuario escribe <code>www.mitienda.com</code> en su navegador. Describe técnicamente los 4 pasos que ocurren hasta que ve la web. Debes usar términos como <em>DNS, Petición HTTP, Servidor Web (Apache) y Renderizado</em>.</p>
            <textarea class="student-input" placeholder="Respuesta: 1. El navegador..."></textarea>
        </div>

        <div class="exercise">
            <h3>🛠️ Reto 2: Despliegue con Git <span class="tag">Práctica</span></h3>
            <p>Imagina que te incorporas a un proyecto ya empezado. Escribe la secuencia exacta de comandos de consola para:</p>
            <ol>
                <li>Descargar el código a tu ordenador.</li>
                <li>Crear una rama de trabajo llamada <code>mi-funcionalidad</code>.</li>
                <li>Subir tus cambios al repositorio remoto.</li>
            </ol>
            <textarea class="student-input" placeholder="Respuesta: git clone..."></textarea>
        </div>
    </div>

    <div class="block">
        <h2>2. Lógica de Programación y Algoritmos</h2>
        <p>El servidor toma decisiones. Aquí practicaremos cómo controlar el flujo de la información.</p>

        <div class="exercise">
            <h3>🕵️ Reto 3: Debugging Mental <span class="tag">Análisis</span></h3>
            <p>Analiza el siguiente código sin ejecutarlo. ¿Qué imprimirá por pantalla y <strong>por qué</strong>?</p>
<pre>
$x = "50";
$y = 50;
if ($x === $y) {
    echo "Son idénticos";
} elseif ($x == $y) {
    echo "Son equivalentes";
} else {
    echo "Son distintos";
}
</pre>
            <textarea class="student-input" placeholder="Respuesta: Imprimirá... porque..."></textarea>
        </div>

        <div class="exercise">
            <h3>🎟️ Reto 4: La Taquilla Inteligente <span class="tag">Código</span></h3>
            <p>Crea un script PHP que calcule el precio de una entrada de cine (Precio base: 8€).</p>
            <ul>
                <li>Si es miércoles: -2€.</li>
                <li>Si tiene "Carnet Joven": -10%.</li>
                <li>Ambos descuentos son acumulables.</li>
            </ul>
            <textarea class="student-input" placeholder="Respuesta: &lt;?php ... ?&gt;"></textarea>
        </div>

        <div class="exercise">
            <h3>🔢 Reto 5: Tabla de Multiplicar Dinámica <span class="tag hard">Lógica Anidada</span></h3>
            <p>No queremos una lista simple. Genera una <strong>Tabla HTML (<code>&lt;table&gt;</code>)</strong> completa que muestre las tablas de multiplicar del 1 al 10.</p>
            <ul>
                <li>Usa bucles <code>for</code> anidados (uno para filas, otro para celdas).</li>
                <li>El cruce de fila/columna debe mostrar el resultado.</li>
                <li>Las celdas donde el resultado sea par deben tener fondo gris (CSS inline).</li>
            </ul>
            <textarea class="student-input" placeholder="Respuesta: &lt;?php ... ?&gt;"></textarea>
        </div>
    </div>

    <div class="block">
        <h2>3. Estructuras de Datos (Arrays)</h2>
        <p>La información real viene en listas y colecciones. Aprende a manipularlas.</p>

        <div class="exercise">
            <h3>📋 Reto 6: Gestión de Inventario <span class="tag">Arrays Simples</span></h3>
            <p>Tienes un array: <code>$stock = [10, 5, 20, 0, 15];</code></p>
            <p>Escribe un script que:</p>
            <ol>
                <li>Elimine los productos con stock 0 (usa unset).</li>
                <li>Ordene la lista de mayor a menor cantidad (usa funciones de ordenación).</li>
                <li>Añada un nuevo producto con stock 50 al final.</li>
            </ol>
            <textarea class="student-input" placeholder="Respuesta..."></textarea>
        </div>

        <div class="exercise">
            <h3>🎓 Reto 7: Boletín de Notas Digital <span class="tag hard">Multidimensional</span></h3>
            <p>Gestiona las notas de 3 alumnos usando un <strong>Array Multidimensional Asociativo</strong>.</p>
            <p>Estructura: <code>Nombre Alumno => [Asignatura => Nota]</code>.</p>
            <p>Debes recorrerlo con foreach e imprimir una ficha HTML por alumno que muestre su <strong>Nota Media</strong>. Si la media es suspenso (< 5), el nombre debe salir en rojo.</p>
            <textarea class="student-input" placeholder="Respuesta..."></textarea>
        </div>
    </div>

    <div class="block">
        <h2>4. Programación Orientada a Objetos (POO)</h2>
        <p>El estándar de la industria. Modelamos la realidad con Clases y Objetos seguros.</p>

        <div class="exercise">
            <h3>🔒 Reto 8: Seguridad de Datos <span class="tag">Concepto</span></h3>
            <p>¿Por qué definimos las propiedades de una clase como <code>private</code> en lugar de <code>public</code>? Explica qué problema evita esto y cómo accedemos a los datos entonces (Getters/Setters).</p>
            <textarea class="student-input" placeholder="Respuesta..."></textarea>
        </div>

        <div class="exercise">
            <h3>🏦 Reto 9: Simulador Bancario <span class="tag hard">POO Completa</span></h3>
            <p>Crea una clase <code>CuentaBancaria</code> en un archivo aparte.</p>
            <ul>
                <li><strong>Propiedades:</strong> titular (public), saldo (private).</li>
                <li><strong>Constructor:</strong> Inicia titular y saldo.</li>
                <li><strong>Método retirar($cantidad):</strong> Resta saldo solo si hay suficiente dinero (if). Si no, muestra error.</li>
                <li><strong>Script de prueba:</strong> Crea una cuenta con 100€, intenta sacar 200€ (error) y luego saca 50€ (éxito).</li>
            </ul>
            <textarea class="student-input" placeholder="Respuesta..."></textarea>
        </div>

        <div class="exercise">
            <h3>🃏 Reto 10: Juego de Cartas <span class="tag hard">Reto Final</span></h3>
            <p>Combina Arrays y POO. Crea una clase <code>Carta</code> (palo, número).</p>
            <p>Genera una baraja de 40 cartas usando bucles. Barájala aleatoriamente (busca función <code>shuffle</code>) y reparte las 5 primeras cartas en pantalla.</p>
            <textarea class="student-input" placeholder="Respuesta..."></textarea>
        </div>
    </div>

    <div class="block" style="border-left-color: #8e44ad;">
        <h2>🏆 Rúbrica de Evaluación</h2>
        <p>Así es como se evaluará tu trabajo. Revisa esta tabla antes de entregar.</p>
        
        <table>
            <thead>
                <tr>
                    <th>Criterio</th>
                    <th>Nivel Básico (Insuficiente)</th>
                    <th>Nivel Medio (Aceptable)</th>
                    <th>Nivel Pro (Excelente)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Sintaxis PHP</strong></td>
                    <td>Errores frecuentes (falta <code>;</code>, <code>$</code>). Código desordenado.</td>
                    <td>Código funcional. Indentación básica correcta.</td>
                    <td>Código limpio, comentado y siguiendo estándares.</td>
                </tr>
                <tr>
                    <td><strong>Lógica</strong></td>
                    <td>Uso excesivo de variables innecesarias. Copia/pega evidente.</td>
                    <td>Uso correcto de bucles y condicionales básicos.</td>
                    <td>Lógica eficiente. Uso de bucles anidados y validaciones.</td>
                </tr>
                <tr>
                    <td><strong>Datos</strong></td>
                    <td>Solo usa variables sueltas. No entiende arrays.</td>
                    <td>Maneja arrays simples y los recorre con foreach.</td>
                    <td>Domina arrays multidimensionales y asociativos complejos.</td>
                </tr>
                <tr>
                    <td><strong>Objetos (POO)</strong></td>
                    <td>Usa clases como simples contenedores. Todo público.</td>
                    <td>Entiende Clases vs Objetos. Usa constructor básico.</td>
                    <td>Aplica encapsulamiento (private/getters) y lógica de métodos.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="download-section">
        <p>¿Has terminado todos los ejercicios? ¡Genial!</p>
        <p>Pulsa el botón, selecciona <strong>"Guardar como PDF"</strong> en la impresora y envíalo por email al profesor.</p>
        <button class="btn-pdf" onclick="guardarPDF()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
            Generar PDF para Enviar
        </button>
    </div>

</div>

<footer>
    <p>Módulo: Desarrollo Web en Entorno Servidor • Curso 2025/2026</p>
</footer>

</body>
</html>