<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación API - Torneo de Fútbol</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8fafc;
            color: #1a202c;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #4a5568;
            margin-top: 30px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
            font-size: 1rem;
            color: #2d3748;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.875rem;
            color: #718096;
        }
        /* Enlaces */
        a {
            color: #3182ce;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #2b6cb0;
        }
        .bg-gray-100 {
            background-color: #f7fafc;
        }
        .text-gray-900 {
            color: #1a202c;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Documentación API - Torneo de Fútbol</h1>

        <h2>1. Equipos</h2>
        <ul>
            <li><strong>GET /equipos</strong> - Lista todos los equipos.</li>
            <li><strong>GET /equipos/{id}</strong> - Obtiene los detalles de un equipo.</li>
            <li><strong>POST /equipos</strong> - Crea un nuevo equipo.</li>
            <li><strong>PUT /equipos/{id}</strong> - Actualiza un equipo existente.</li>
            <li><strong>DELETE /equipos/{id}</strong> - Elimina un equipo.</li>
            <li><strong>GET /equipos/{equipo_id}/jugadores</strong> - Lista los jugadores de un equipo.</li>
            <li><strong>GET /equipos/{equipo_id}/goles</strong> - Total de goles de un equipo.</li>
            <li><strong>GET /equipos/{equipo_id}/partidos-ganados</strong> - Partidos ganados por un equipo.</li>
        </ul>

        <h2>2. Jugadores</h2>
        <ul>
            <li><strong>GET /jugadores</strong> - Lista todos los jugadores.</li>
            <li><strong>GET /jugadores/{id}</strong> - Obtiene los detalles de un jugador.</li>
            <li><strong>POST /jugadores</strong> - Crea un nuevo jugador.</li>
            <li><strong>PUT /jugadores/{id}</strong> - Actualiza un jugador existente.</li>
            <li><strong>DELETE /jugadores/{id}</strong> - Elimina un jugador.</li>
            <li><strong>GET /jugadores/{id}/detalles</strong> - Detalles completos de un jugador.</li>
        </ul>

        <h2>3. Partidos</h2>
        <ul>
            <li><strong>GET /partidos</strong> - Lista todos los partidos.</li>
            <li><strong>GET /partidos/{id}</strong> - Detalles de un partido.</li>
            <li><strong>POST /partidos</strong> - Crea un nuevo partido.</li>
            <li><strong>PUT /partidos/{id}</strong> - Actualiza un partido existente.</li>
            <li><strong>DELETE /partidos/{id}</strong> - Elimina un partido.</li>
            <li><strong>GET /partidos/equipos/{equipo1_id}/{equipo2_id}</strong> - Historial entre dos equipos.</li>
            <li><strong>GET /partidos/{partido_id}/resultado</strong> - Resultado de un partido.</li>
        </ul>

        <h2>4. Resultados</h2>
        <ul>
            <li><strong>GET /resultados</strong> - Lista todos los resultados.</li>
            <li><strong>GET /resultados/{id}</strong> - Detalles de un resultado.</li>
            <li><strong>POST /resultados</strong> - Crea un nuevo resultado.</li>
            <li><strong>PUT /resultados/{id}</strong> - Actualiza un resultado existente.</li>
            <li><strong>DELETE /resultados/{id}</strong> - Elimina un resultado.</li>
        </ul>

        <footer>
            <p>API desarrollada para la gestión de torneos de fútbol. Todos los derechos reservados.</p>
        </footer>
    </div>

</body>
</html>
