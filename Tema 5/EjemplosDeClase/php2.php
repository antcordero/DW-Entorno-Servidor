<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP: Wicked Edition 🧙‍♀️</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Cinzel:wght@400;700&family=Urbanist:wght@400;700;900&display=swap');

        :root {
            --elphaba-green: #50c878;
            --glinda-pink: #ffb7c5;
            --oz-emerald: #046307;
            --shiz-gold: #ffd700;
        }

        body {
            font-family: 'Urbanist', sans-serif;
            background-color: #1a1a1a;
            color: #e2e8f0;
            background-image: radial-gradient(circle at 10% 20%, #1a472a 0%, #000000 90%);
        }

        .font-magic { font-family: 'Cinzel', serif; }
        .font-code { font-family: 'Fira Code', monospace; }

        /* Efecto Mágico */
        .magic-text {
            background: linear-gradient(to right, var(--elphaba-green), var(--glinda-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .code-tooltip {
            position: relative;
            cursor: help;
            border-bottom: 2px dashed var(--elphaba-green);
        }
        
        .code-tooltip:hover::after {
            content: attr(data-tip);
            position: absolute;
            bottom: 120%;
            left: 50%;
            transform: translateX(-50%);
            background: #0f172a;
            color: var(--elphaba-green);
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            white-space: pre-wrap;
            width: max-content;
            max-width: 250px;
            box-shadow: 0 0 15px var(--elphaba-green);
            z-index: 50;
            border: 1px solid var(--elphaba-green);
        }

        .tab-active {
            border-left: 4px solid var(--elphaba-green);
            background: linear-gradient(90deg, rgba(80, 200, 120, 0.2) 0%, transparent 100%);
            color: var(--elphaba-green);
        }

        .shiz-border {
            border: 1px solid #333;
            box-shadow: 0 0 20px rgba(80, 200, 120, 0.1);
        }

        .visible-content { display: block; animation: fadeIn 0.8s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Burbujas Glinda */
        .bubble {
            position: absolute;
            background: rgba(255, 183, 197, 0.1);
            border-radius: 50%;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- HEADER WICKED -->
    <header class="bg-black/80 backdrop-blur-md border-b border-green-900 p-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="text-4xl">🧙‍♀️</div>
                <div>
                    <h1 class="font-magic text-xl md:text-2xl text-white magic-text font-bold">SHIZ UNIVERSITY: PHP</h1>
                    <p class="text-xs text-green-400">Departamento de Hechicería y Backend</p>
                </div>
            </div>
            <div class="hidden md:block">
                <span class="text-xs text-pink-300 italic">"Everyone deserves the chance to code..."</span>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto w-full p-4 md:p-8 grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- SIDEBAR DE NIVELES (GRIMMORIE) -->
        <aside class="lg:col-span-3 bg-black/50 rounded-xl shiz-border h-fit sticky top-24 overflow-hidden backdrop-blur-sm">
            <div class="p-4 bg-green-900/20 border-b border-green-900/50">
                <h2 class="font-magic text-green-400"><i class="fa-solid fa-book-journal-whills"></i> Temario Shiz</h2>
            </div>
            <nav class="flex flex-col p-2 space-y-1">
                <button onclick="loadLevel(0)" id="btn-lvl-0" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors flex items-center gap-3 tab-active text-white">
                    <span class="text-xs font-mono text-pink-400">ACTO I</span> Intro Oz
                </button>
                <button onclick="loadLevel(1)" id="btn-lvl-1" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors text-gray-400 flex items-center gap-3">
                    <span class="text-xs font-mono text-green-600">HECHIZO 1</span> Sintaxis (Echo)
                </button>
                <button onclick="loadLevel(2)" id="btn-lvl-2" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors text-gray-400 flex items-center gap-3">
                    <span class="text-xs font-mono text-green-600">HECHIZO 2</span> Variables ($)
                </button>
                <button onclick="loadLevel(3)" id="btn-lvl-3" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors text-gray-400 flex items-center gap-3">
                    <span class="text-xs font-mono text-green-600">HECHIZO 3</span> Lógica (Popular)
                </button>
                <button onclick="loadLevel(4)" id="btn-lvl-4" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors text-gray-400 flex items-center gap-3">
                    <span class="text-xs font-mono text-green-600">HECHIZO 4</span> Pociones (Arrays)
                </button>
                <button onclick="loadLevel(5)" id="btn-lvl-5" class="text-left px-4 py-3 rounded hover:bg-white/5 transition-colors text-gray-400 flex items-center gap-3">
                    <span class="bg-gradient-to-r from-green-600 to-emerald-900 text-xs px-2 py-1 rounded font-mono text-white">FINAL</span> Defying Gravity
                </button>
            </nav>
            
            <div class="mt-8 p-4 text-center">
                <i class="fa-solid fa-hat-wizard text-4xl text-green-800 mb-2"></i>
                <p id="wicked-quote" class="text-xs text-gray-500 italic font-serif">"Lo que es rosa va con lo que es verde."</p>
            </div>
        </aside>

        <!-- AREA DE CONTENIDO -->
        <section class="lg:col-span-9 flex flex-col gap-6">
            
            <!-- CONTENEDOR PRINCIPAL -->
            <div id="level-container" class="bg-black/60 rounded-xl shiz-border p-6 md:p-8 min-h-[500px] relative backdrop-blur-md">
                <!-- El contenido se inyecta con JS -->
            </div>

        </section>

    </main>

    <!-- TEMPLATES -->
    
    <!-- LEVEL 0: INTRO -->
    <template id="tpl-lvl-0">
        <div class="visible-content text-center">
            <h2 class="text-4xl font-magic text-white mb-4">No One Mourns The Wicked</h2>
            <p class="text-xl text-green-400 mb-8 font-serif italic">"¿La gente nace siendo mala programadora, o se hace?"</p>

            <div class="grid md:grid-cols-2 gap-8 text-left">
                <div class="space-y-4">
                    <p class="text-gray-300">
                        Bienvenido a <strong>Shiz University</strong>. Aquí no aprendemos a volar con escobas, aprendemos a volar con <strong>PHP</strong>.
                    </p>
                    <p class="text-gray-300">
                        Al igual que Elphaba tiene un poder oculto, PHP es el motor oculto detrás del 77% de Internet. Es incomprendido, a veces odiado (como nuestra bruja verde), pero increíblemente poderoso.
                    </p>
                    <div class="bg-pink-900/20 border border-pink-500/30 p-4 rounded-lg mt-4">
                        <h4 class="text-pink-300 font-bold mb-1"><i class="fa-solid fa-wand-sparkles"></i> Lección de Madame Morrible:</h4>
                        <p class="text-sm text-pink-100">"El código PHP se ejecuta en el servidor (Oz), nadie lo ve en el navegador (Kansas) a menos que tú decidas mostrarlo."</p>
                    </div>
                </div>
                <div class="flex justify-center items-center relative">
                    <div class="absolute inset-0 bg-green-500/20 blur-3xl rounded-full"></div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP Logo" class="w-48 relative z-10 drop-shadow-[0_0_15px_rgba(80,200,120,0.8)]">
                </div>
            </div>
            
            <button onclick="loadLevel(1)" class="mt-12 bg-gradient-to-r from-green-700 to-green-900 hover:from-green-600 hover:to-green-800 text-white font-magic py-3 px-8 rounded-full shadow-[0_0_20px_rgba(80,200,120,0.4)] transition-all transform hover:scale-105">
                Mirar al Cielo del Oeste (Empezar)
            </button>
        </div>
    </template>

    <!-- LEVEL 1: SINTAXIS -->
    <template id="tpl-lvl-1">
        <div class="visible-content">
            <h2 class="text-3xl font-magic text-white mb-2">Hechizo 1: Invocación (Echo)</h2>
            <div class="h-1 w-20 bg-green-600 mb-6"></div>
            
            <p class="text-gray-400 mb-6">Para que un hechizo funcione, debes pronunciarlo en voz alta.</p>

            <div class="bg-[#1e1e1e] rounded-lg p-6 border-l-4 border-green-500 font-code text-sm shadow-2xl">
                <span class="text-red-400">&lt;?php</span> <span class="text-gray-500">// Inicio del pergamino</span><br><br>
                
                <span class="text-gray-500">// Glinda intentando enseñar a Elphaba a ser popular:</span><br>
                <span class="code-tooltip text-blue-400 font-bold" data-tip="El comando mágico para que el texto APAREZCA en pantalla.">echo</span> 
                <span class="text-yellow-300">"¡Vamos a ser populares!"</span><span class="text-white">;</span> <br><br>

                <span class="text-gray-500">// Elphaba respondiendo sarcásticamente:</span><br>
                <span class="text-blue-400">echo</span> 
                <span class="text-yellow-300">"Lo que tú digas, rubia."</span><span class="text-white">;</span>
                <span class="code-tooltip text-red-500 font-bold text-xl align-middle" data-tip="¡CUIDADO! Sin el punto y coma, el hechizo explota y convierte al Mago en una cabra.">;</span><br><br>
                
                <span class="text-red-400">?&gt;</span>
            </div>

            <div class="mt-8 flex flex-col md:flex-row gap-6 items-center">
                <div class="flex-1 text-sm text-gray-300">
                    <p class="mb-2"><i class="fa-solid fa-triangle-exclamation text-yellow-500"></i> <strong>Reglas del Grimmerie:</strong></p>
                    <ul class="list-disc list-inside space-y-1 ml-2">
                        <li>Todas las instrucciones terminan con <code>;</code></li>
                        <li>Los textos (hechizos verbales) van entre comillas <code>""</code></li>
                    </ul>
                </div>
                <div class="flex-1 text-center">
                    <button onclick="runSpell('lvl1')" class="bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all">
                        <i class="fa-solid fa-wand-magic-sparkles"></i> Lanzar Hechizo
                    </button>
                </div>
            </div>

            <div id="output-lvl1" class="mt-6 bg-white text-black font-serif p-6 rounded-lg hidden shadow-[0_0_30px_rgba(255,255,255,0.2)] border-2 border-pink-300 text-center">
                <p class="text-xl text-pink-600 font-bold mb-2">✨ Resultados ✨</p>
                <p>¡Vamos a ser populares! Lo que tú digas, rubia.</p>
            </div>
        </div>
    </template>

    <!-- LEVEL 2: VARIABLES -->
    <template id="tpl-lvl-2">
        <div class="visible-content">
            <h2 class="text-3xl font-magic text-white mb-2">Hechizo 2: Ingredientes ($)</h2>
            <p class="text-gray-400 mb-6">Guardando la esencia de las cosas en frascos.</p>

            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <p class="mb-4">
                        En PHP, los frascos (variables) siempre llevan la etiqueta <strong>$</strong>. No importa si guardas ojos de tritón o zapatos de rubí.
                    </p>
                    <div class="bg-green-900/30 p-4 rounded border border-green-600/30">
                        <h4 class="text-green-400 font-bold mb-2">Inventario de Elphaba:</h4>
                        <ul class="text-sm space-y-2 font-code">
                            <li><span class="text-purple-400">$nombre</span> = "Elphaba";</li>
                            <li><span class="text-purple-400">$colorPiel</span> = "Verde";</li>
                            <li><span class="text-purple-400">$nivelMagia</span> = 9000;</li>
                            <li><span class="text-purple-400">$esMalvada</span> = false;</li>
                        </ul>
                    </div>
                </div>
                <div class="bg-[#1e1e1e] p-6 rounded-xl border border-gray-700 font-code text-xs md:text-sm">
                    <span class="text-gray-500">// Concatenando (Mezclando ingredientes con el punto .)</span><br><br>
                    <span class="text-blue-400">echo</span> <span class="text-purple-400">$nombre</span> <span class="text-white">.</span> <span class="text-yellow-300">" es de color "</span> <span class="text-white">.</span> <span class="text-purple-400">$colorPiel</span><span class="text-white">;</span>
                    <br><br>
                    <span class="text-gray-500">// Resultado: "Elphaba es de color Verde"</span>
                    <br><br>
                    <span class="text-gray-500">// Truco de Magia Avanzado (Comillas Dobles):</span><br>
                    <span class="text-blue-400">echo</span> <span class="text-yellow-300">"$nombre tiene nivel $nivelMagia"</span><span class="text-white">;</span>
                    <br>
                    <span class="text-gray-500">// PHP es listo y encuentra las variables dentro.</span>
                </div>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-400 mb-2">Prueba a cambiar el color de piel:</p>
                <input type="text" id="input-skin" value="Verde" class="bg-black border border-green-600 text-green-400 p-2 rounded text-center mb-2">
                <button onclick="runPotion()" class="block mx-auto bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded">Mezclar Poción</button>
                
                <div id="potion-result" class="mt-4 text-xl font-magic min-h-[30px] text-white"></div>
            </div>
        </div>
    </template>

    <!-- LEVEL 3: CONTROL -->
    <template id="tpl-lvl-3">
        <div class="visible-content">
            <h2 class="text-3xl font-magic text-white mb-2">Hechizo 3: Popular (IF/ELSE)</h2>
            <p class="text-gray-400 mb-6">La lógica de Glinda para decidir quién se sienta con ella.</p>

            <div class="flex flex-col gap-6">
                <div class="bg-pink-900/10 p-6 rounded-xl border border-pink-500/30">
                    <p class="text-pink-200 italic mb-4">"No se trata de aptitud, se trata de la forma en que te ven..."</p>
                    
                    <div class="font-code text-sm bg-black/50 p-4 rounded border border-pink-900">
                        <span class="text-purple-400">$estilo</span> <span class="text-white">=</span> <span class="text-orange-400">10</span><span class="text-white">;</span><br>
                        <span class="text-purple-400">$hablaBien</span> <span class="text-white">=</span> <span class="text-blue-400">true</span><span class="text-white">;</span><br><br>
                        
                        <span class="text-purple-400">if</span> <span class="text-white">(</span><span class="text-purple-400">$estilo</span> <span class="text-white">></span> <span class="text-orange-400">8</span> <span class="text-red-400">&&</span> <span class="text-purple-400">$hablaBien</span><span class="text-white">) {</span><br>
                        &nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-300">"¡Te enseñaré a ser popular!"</span><span class="text-white">;</span><br>
                        <span class="text-white">}</span> <span class="text-purple-400">elseif</span> <span class="text-white">(</span><span class="text-purple-400">$estilo</span> <span class="text-white">></span> <span class="text-orange-400">5</span><span class="text-white">) {</span><br>
                        &nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-300">"Tienes potencial, cariño."</span><span class="text-white">;</span><br>
                        <span class="text-white">}</span> <span class="text-purple-400">else</span> <span class="text-white">{</span><br>
                        &nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-300">"Lo siento, la mesa está llena."</span><span class="text-white">;</span><br>
                        <span class="text-white">}</span>
                    </div>
                </div>

                <!-- Interactive Glinda -->
                <div class="grid grid-cols-2 gap-4 bg-white/5 p-4 rounded-lg items-center">
                    <div class="text-center">
                        <label class="block text-xs text-pink-300 mb-1">Tu nivel de Estilo (0-10)</label>
                        <input type="range" id="style-level" min="0" max="10" value="5" class="w-full accent-pink-500" oninput="document.getElementById('style-val').innerText = this.value">
                        <span id="style-val" class="text-white font-bold">5</span>
                    </div>
                    <div class="text-center">
                        <button onclick="checkPopularity()" class="bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded-full w-full">
                            Preguntar a Glinda
                        </button>
                    </div>
                    <div class="col-span-2 text-center mt-2">
                        <p id="glinda-response" class="text-lg font-magic text-pink-200 min-h-[30px]">...</p>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- LEVEL 4: ARRAYS -->
    <template id="tpl-lvl-4">
        <div class="visible-content">
            <h2 class="text-3xl font-magic text-white mb-2">Hechizo 4: El Grimmerie (Arrays)</h2>
            <p class="text-gray-400 mb-6">El libro de hechizos es básicamente un Array gigante.</p>

            <div class="space-y-6">
                <!-- Lista Simple -->
                <div class="bg-green-900/10 border-l-4 border-green-600 p-4">
                    <h3 class="text-xl text-green-300 font-bold mb-2">1. Lista de Hechizos (Array Indexado)</h3>
                    <p class="text-xs text-gray-400 mb-2">Solo una lista. Se accede por número (empezando en 0).</p>
                    <div class="font-code text-sm bg-black p-3 rounded text-gray-300">
                        <span class="text-purple-400">$hechizos</span> = [<span class="text-yellow-300">"Levitar"</span>, <span class="text-yellow-300">"Transformar"</span>, <span class="text-yellow-300">"Desafiar Gravedad"</span>];<br>
                        <span class="text-gray-500">// Elphaba quiere el tercero:</span><br>
                        echo <span class="text-purple-400">$hechizos</span>[<span class="text-orange-400">2</span>]; <span class="text-gray-500">// "Desafiar Gravedad"</span>
                    </div>
                </div>

                <!-- Diccionario -->
                <div class="bg-pink-900/10 border-l-4 border-pink-500 p-4">
                    <h3 class="text-xl text-pink-300 font-bold mb-2">2. Características (Array Asociativo)</h3>
                    <p class="text-xs text-gray-400 mb-2">Etiqueta => Valor. Como una ficha de personaje.</p>
                    <div class="font-code text-sm bg-black p-3 rounded text-gray-300">
                        <span class="text-purple-400">$nessarose</span> = [<br>
                        &nbsp;&nbsp;<span class="text-yellow-300">"titulo"</span> => <span class="text-yellow-300">"Bruja del Este"</span>,<br>
                        &nbsp;&nbsp;<span class="text-yellow-300">"calzado"</span> => <span class="text-yellow-300">"Plateado"</span>,<br>
                        &nbsp;&nbsp;<span class="text-yellow-300">"camina"</span> => <span class="text-blue-400">false</span><br>
                        ];<br>
                        echo <span class="text-purple-400">$nessarose</span>[<span class="text-yellow-300">"titulo"</span>];
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- LEVEL 5: INTRO POO -->
    <template id="tpl-lvl-5">
        <div class="visible-content">
            <h2 class="text-3xl font-magic text-white mb-2">FINAL: Defying Gravity (Objetos)</h2>
            <div class="h-1 w-full bg-gradient-to-r from-green-500 to-black mb-6"></div>

            <p class="text-gray-300 mb-6">
                Ha llegado el momento. Ya no seguimos reglas sueltas. Vamos a crear la definición de lo que significa ser una <strong>Bruja</strong>.
            </p>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Concepto -->
                <div class="space-y-4">
                    <div class="bg-green-900/20 p-4 rounded border border-green-500/50">
                        <h3 class="font-bold text-green-400 text-lg">Class Bruja {}</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Es el molde. Todas las brujas tienen un sombrero y una escoba. Pero cada una vuela diferente.
                        </p>
                    </div>
                    <div class="bg-pink-900/20 p-4 rounded border border-pink-500/50">
                        <h3 class="font-bold text-pink-400 text-lg">new Bruja()</h3>
                        <p class="text-sm text-gray-300 mt-2">
                            Es cuando creamos a una específica (Instanciar). <br>
                            <code>$elphaba = new Bruja();</code>
                        </p>
                    </div>
                </div>

                <!-- Código -->
                <div class="bg-[#151515] p-6 rounded-xl border-2 border-green-600 shadow-[0_0_25px_rgba(80,200,120,0.15)] font-code text-xs">
                    <span class="text-purple-400">class</span> <span class="text-yellow-300">Bruja</span> <span class="text-white">{</span><br>
                    &nbsp;&nbsp;<span class="text-purple-400">public</span> <span class="text-purple-400">$poder</span><span class="text-white">;</span><br><br>
                    
                    &nbsp;&nbsp;<span class="text-purple-400">public</span> <span class="text-purple-400">function</span> <span class="text-blue-400">volar</span><span class="text-white">() {</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-purple-400">if</span> (<span class="text-purple-400">$this</span>-><span class="text-purple-400">poder</span> > <span class="text-orange-400">100</span>) {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-300">"¡Desafiando la Gravedad!"</span><span class="text-white">;</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;} <span class="text-purple-400">else</span> {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-400">echo</span> <span class="text-yellow-300">"Viajando en burbuja."</span><span class="text-white">;</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;}<br>
                    &nbsp;&nbsp;<span class="text-white">}</span><br>
                    <span class="text-white">}</span><br><br>

                    <span class="text-gray-500">// El Momento Clímax:</span><br>
                    <span class="text-purple-400">$elphaba</span> <span class="text-white">=</span> <span class="text-purple-400">new</span> <span class="text-yellow-300">Bruja</span><span class="text-white">();</span><br>
                    <span class="text-purple-400">$elphaba</span>-><span class="text-purple-400">poder</span> <span class="text-white">=</span> <span class="text-orange-400">999</span><span class="text-white">;</span><br>
                    <span class="text-purple-400">$elphaba</span>-><span class="text-blue-400">volar</span><span class="text-white">();</span>
                </div>
            </div>

            <div class="mt-8 text-center animate-bounce">
                <span class="text-4xl">🧹 ✨ 🌪️</span>
                <p class="text-green-400 font-magic mt-2">¡Felicidades! Has completado el Primer Año en Shiz.</p>
            </div>
        </div>
    </template>

    <script>
        // Citas de Wicked
        const quotes = [
            "Todos merecen la oportunidad de volar.",
            "Lo que es rosa va con lo que es verde.",
            "¡Desafiando la gravedad!",
            "¿Estás contenta ahora?",
            "Nadie llora a los malvados.",
            "Algo ha cambiado dentro de mí.",
            "Juntas somos ilimitadas."
        ];

        // Función para cargar niveles
        function loadLevel(levelIndex) {
            // Update active styling
            document.querySelectorAll('aside nav button').forEach((btn, idx) => {
                if(idx === levelIndex) {
                    btn.classList.add('tab-active', 'text-white');
                    btn.classList.remove('text-gray-400');
                    // Add sparkle effect
                } else {
                    btn.classList.remove('tab-active', 'text-white');
                    btn.classList.add('text-gray-400');
                }
            });

            // Load Content
            const container = document.getElementById('level-container');
            const templateId = `tpl-lvl-${levelIndex}`;
            const template = document.getElementById(templateId);
            
            if (template) {
                container.innerHTML = template.innerHTML;
            }

            // Random Quote
            const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];
            document.getElementById('wicked-quote').innerText = `"${randomQuote}"`;
        }

        // --- INTERACCIONES ---

        // Level 1: Run Spell
        function runSpell() {
            const out = document.getElementById('output-lvl1');
            out.classList.remove('hidden');
            out.classList.add('animate-pulse');
            setTimeout(() => out.classList.remove('animate-pulse'), 1000);
        }

        // Level 2: Potion
        function runPotion() {
            const skin = document.getElementById('input-skin').value;
            const res = document.getElementById('potion-result');
            res.innerHTML = `Elphaba es de color <span style="color:${skin === 'Verde' ? '#50c878' : 'white'}">${skin}</span>`;
            if(skin.toLowerCase() === 'verde') {
                res.innerHTML += " 🧙‍♀️ (¡Correcto!)";
            } else {
                res.innerHTML += " 🤔 (¿Estás seguro?)";
            }
        }

        // Level 3: Glinda Logic
        function checkPopularity() {
            const style = document.getElementById('style-level').value;
            const res = document.getElementById('glinda-response');
            
            if (style > 8) {
                res.innerHTML = '<span class="text-green-400">"¡Te enseñaré a ser popular!" ✨👗</span>';
            } else if (style > 5) {
                res.innerHTML = '<span class="text-pink-300">"Tienes potencial, cariño." 💅</span>';
            } else {
                res.innerHTML = '<span class="text-gray-400">"Lo siento, la mesa está llena." 🚫</span>';
            }
        }

        // Init
        document.addEventListener('DOMContentLoaded', () => {
            loadLevel(0);
        });

    </script>
</body>
</html>