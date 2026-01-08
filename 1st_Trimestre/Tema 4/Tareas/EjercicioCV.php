<?php
/* =========================================
 TAREA 1: CREA TU "BASE DE DATOS" EN PHP
========================================= */

// --- TAREA 1.1: DATOS PERSONALES (UD3) ---
$nombreCompleto = "Antonio Cordero";
$tituloProfesional = "Desarrollador Aplicaciones Web";
$emailContacto = "antoniocorderomn@email.com";
$telefono = "+34 621 37 38 45";
$disponibleParaEmpezar = true;

// --- TAREA 1.2: RESUMEN Y HABILIDADES (UD4) ---
$resumenProfesional = "Soy desarrollador web con un año de práctica creando aplicaciones dinámicas con JavaScript y frameworks modernos. Destaco por mi capacidad de resolver problemas, aprendizaje rápido y trabajo en equipo.";

$habilidades = [
    "PHP",
    "NodeJS",
    "React",
    "Angular",
    "JavaScript",
    "HTML5",
    "CSS3",
    "MySQL",
    "Git"
];

// --- TAREA 1.3: REDES SOCIALES (UD4) ---
$redesSociales = [
    "LinkedIn" => "https://www.linkedin.com/in/antcordero/",
    "GitHub" => "https://github.com/antcordero",
    "Instagram" => "https://instagram.com/acm"
];

// --- TAREA 1.4: EXPERIENCIA LABORAL (UD4 - Nivel Alto) ---
$experiencia = [
    [
        "puesto" => "Prácticas Desarrollador Backend",
        "empresa" => "Avanade",
        "periodo" => "Enero 2025 -  Febrero 2025",
        "tareas" => [
            "Desarrollo de aplicaciones de escritorio con C# y .NET",
            "Optimización de bases de datos MySQL",
            "Gestión de despliegues con Docker"
        ]
    ]
];

// --- TAREA 1.5: FORMACIÓN (UD4 - Nivel Alto) ---
$formacion = [
    [
        "titulo" => "Técnico Superior Desarrollo de Aplicaciones Web",
        "institucion" => "CESUR",
        "periodo" => "2024 - Actualidad"
    ],
    [
        "titulo" => "Técnico Superior Laboratorio de Análisis y Control de Calidad",
        "institucion" => "Universidad Laboral de Málaga",
        "periodo" => "2017 - 2019"
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>CV Dinámico PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9e9e9;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 40px;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0 0 5px 0;
            font-size: 2.8em;
        }
        .header h2 {
            margin: 0;
            font-weight: 300;
            font-size: 1.6em;
            color: #1abc9c;
        }
        .contact-info {
            font-size: 0.9em;
            margin-top: 15px;
            color: #bdc3c7;
        }
        .contact-info span { margin: 0 10px; }
        .main-content {
            display: flex;
            padding: 30px;
        }
        .sidebar {
            flex: 1;
            padding-right: 30px;
            border-right: 2px solid #f4f4f4;
        }
        .cv-content {
            flex: 2;
            padding-left: 30px;
        }
        .cv-section {
            margin-bottom: 25px;
        }
        .cv-section h3 {
            color: #2c3e50;
            border-bottom: 2px solid #1abc9c;
            padding-bottom: 5px;
            margin-top: 0;
        }
        .estado {
            padding: 12px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .estado.contratable {
            background: #d4edda; color: #155724;
        }
        .estado.no-contratable {
            background: #f8d7da; color: #721c24;
        }
        .skills-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }
        .skill-item {
            background: #f0f0f0;
            color: #333;
            padding: 5px 12px;
            border-radius: 15px;
            margin: 4px;
            font-size: 0.9em;
        }
        .job, .education-item {
            margin-bottom: 20px;
        }
        .job h4, .education-item h4 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .job-company, .education-institution {
            color: #1abc9c;
            font-weight: bold;
            font-size: 1em;
            margin-bottom: 5px;
        }
        .job-period, .education-period {
            font-size: 0.85em;
            color: #777;
            font-style: italic;
        }
        .job-tasks {
            padding-left: 20px;
            font-size: 0.95em;
        }
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px 30px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        footer a {
            color: white;
            text-decoration: none;
            margin: 0 12px;
            font-size: 1.1em;
            transition: color 0.3s;
        }
        footer a:hover {
            color: #1abc9c;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>
                <?php echo $nombreCompleto; ?>
            </h1>
            <h2>
                <?php echo $tituloProfesional; ?>
            </h2>
            <div class="contact-info">
                <span>
                    <?php echo $emailContacto; ?>
                </span> | 
                <span>
                    <?php echo $telefono; ?>
                </span>
            </div>
        </header>
        <div class="main-content">
            <aside class="sidebar">
                <div class="cv-section">
                    <h3>Disponibilidad</h3>
                    <?php
                    if($disponibleParaEmpezar){
                        echo '<div class="estado contratable">¡Disponible para empezar!</div>';
                    }else{
                        echo '<div class="estado no-contratable">No disponible actualmente</div>';
                    }
                    ?>
                </div>
                <div class="cv-section">
                    <h3>Habilidades Técnicas</h3>
                    <ul class="skills-list">
                        <?php
                        foreach($habilidades as $habilidad){
                            echo '<li class="skill-item">' . $habilidad . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </aside>
            <main class="cv-content">
                <div class="cv-section" id="resumen">
                    <h3>Resumen Profesional</h3>
                    <p>
                        <?php echo $resumenProfesional; ?>
                    </p>
                </div>
                <div class="cv-section" id="experiencia">
                    <h3>Experiencia Laboral</h3>
                    <?php
                    foreach($experiencia as $trabajo){
                        echo '<div class="job">';
                        echo '<h4>' . $trabajo["puesto"] . '</h4>';
                        echo '<div class="job-company">' . $trabajo["empresa"] . '</div>';
                        echo '<div class="job-period">' . $trabajo["periodo"] . '</div>';
                        echo '<ul class="job-tasks">';
                        foreach($trabajo["tareas"] as $tarea){
                            echo '<li>' . $tarea . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="cv-section" id="formacion">
                    <h3>Formación</h3>
                    <?php
                    foreach($formacion as $curso){
                        echo '<div class="education-item">';
                        echo '<h4>' . $curso["titulo"] . '</h4>';
                        echo '<div class="education-institution">' . $curso["institucion"] . '</div>';
                        echo '<div class="education-period">' . $curso["periodo"] . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </main>
        </div>
        <footer class="footer">
            <?php
            foreach($redesSociales as $red => $url){
                echo '<a href="' . $url . '" target="_blank">' . $red . '</a>';
            }
            ?>
        </footer>
    </div>
</body>
</html>
