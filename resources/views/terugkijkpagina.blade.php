<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Van Rijt</title>

    <link rel="stylesheet" href="../css/pages/terugkijk.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    @vite (['resources/sass/app.scss'])


</head>

<body class="dashboard">


    <div class="profile">
        <div class="profilePicture"></div>
        <div class="profileText">VanRijt</div>
    </div>

    <div class="eventDropdown">
        <h2 class="eventDropdownarrow"><box-icon id="icons" name='chevron-down'></box-icon><span class="eventText">24-11-2023</span></h2>
        <ul class="dropdownOptions">
            <li>22-11-2023</li>
            <li>5-5-2023</li>
            <li>1-3-2023</li>
        </ul>
    </div>



    <div class="grid-container">

        <?php
        $current = 379;
        $max = 1225;

        $currentAngle = ($current / $max) * 360;

        echo '
            <div class="DataViewCircle">
            <h2 class="blockTextCounter">Piek bezoekersaantal</h2>
            <div class="CircularProgress" style="background: conic-gradient(#E03076 ' . $currentAngle . 'deg, #EEF1F6 0deg);">
                <div class="ProgressValue">
                <div class="CurrentValue">piek: ' . $current . '</div> 
                <div class="MaxValue">
                    <p class="Max">max:</p>
                    <p class="MaxNumber">' . $max . '</p>
                </div>
                </div>
            </div>
            </div>
            ';
        ?>


        <div class="block">
            <h2 class="blockText">Tijd van piek</h2>
            <h2 class="blockinfoText">{{ $eventData['Instroom'] }}</h2>
        </div>

        <div class="block">
            <h2 class="blockText">Gemiddeld aantal</h2>
            <h2 class="blockinfoText">{{ $eventData['Uitstroom'] }}</h2>
        </div>

    </div>



    <div id="graph-container">
        <canvas id="myLineChart" width="700" height="100"></canvas>
    </div>

    <div id="weather-info"></div>

    <script src="../js/graph.js"></script>



</body>

</html>