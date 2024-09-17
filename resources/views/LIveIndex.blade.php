<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/pages/LiveIndex.css">
    <script src="../js/navbar.js"></script>
    <script src="../js/kiesevent-dropdown.js"></script>
    <script src="../js/pagemenu-dropdown.js"></script>
    <script src="{{ asset('js/time.js') }}"></script>
    <script src="{{ asset('js/weather.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>LiveIndex</title>
</head>

<body>
    <div class="parent">
        <div class="header">
            <!-- Profile -->
            <div class="profile">
                <div class="profilelogo">
                    <img src="../images/VanrijtLogo.jpg" alt="Profile">
                </div>
                <h3 class="profiletxt">VanRijt</h3>
            </div>
            <!-- Navbar -->
            <div class="topnav" id="Topnav">
                <div class="pagemenu">
                    <button class="pagebtn" onclick="pageMenu()">
                        <img src="../images/mobile-icon.png" class="mobile">
                    </button>
                    <div id="pagecontent" class="pagemenu-content">
                        <a href="#account" class="account-item">Accounts</a>
                        <a href="/events" class="event-item">Events</a>
                    </div>
                    <a href="#account" class="account">Accounts</a>
                    <a href="/events" class="event">Events</a>
                </div>
                <div class="dropmenu">
                    <button class="kiesevent" onclick="dropMenu()">
                        <img class="dropdown" src="../images/dropdown.png">
                        <h2>Kies evenement</h2>
                    </button>
                    <form method="POST" action="{{ route('loadEvent') }}" id="dropcontent" class="dropdown-content">
                        @csrf
                            @foreach ($evenementResult['evenementen'] as $event)
                            <button type='submit' name='id' value="{{$event['id']}}">{{$event['EventNaam'] }}</button>
                            @endforeach
                    </form>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="navResponsive()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class="livedata">
            <div class="actueelbezoek">
                <h2>Actuele bezoekers</h2>
                <?php
                    $max = $evenementResult['gekozenEvenement']['MaxBezoekers'];
                    $current = 13731;

                    $currentAngle = ($current / $max) * 360;
                ?>
                <div class="CircularProgress"
                    style="background: conic-gradient(#E03076 {{ $currentAngle }}deg, #EEF1F6 0deg);">
                    <div class="ProgressValue">
                        <div class="CurrentValue">Huidig: {{ $current }}</div>
                        <div class="MaxValue">
                            <p class="Max">Max:</p>
                            <p class="MaxNumber">{{ $evenementResult['gekozenEvenement']['MaxBezoekers'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bezoek">
                <h2>Bezoekeraantal:</h2>
                <h1>14423</h1>
            </div>
            <div class="instroom">
                <h2>Instroom</h2>
                <h1>{{ $evenementResult['eventData']['Instroom'] }}</h1>
            </div>
            <div class="uitstroom">
                <h2>Uitstroom</h2>
                <h1>{{ $evenementResult['eventData']['Uitstroom'] }}</h1>
            </div>
            <div class="trend">
                <h2>Trend</h2>
                @if($evenementResult['eventData']['Instroom'] > $evenementResult['eventData']['Uitstroom'])
                <h3>Instromend</h3>
                <img src='../images/trending-up.png'>
                @elseif($evenementResult['eventData']['Uitstroom'] > $evenementResult['eventData']['Instroom'])
                <h3>Uitstromend</h3>
                <img src='../images/trending-down.png'>
                @else($evenementResult['eventData']['Uitstroom'] == $evenementResult['eventData']['Instroom'])
                <h3>Gelijk</h3>
                <img src='../images/trending-same.png'>
                @endif
            </div>
        </div>
        <div class="grafiek">
            <div class="grafiekcontainer">
                <div id="graph-container">
                    <canvas id="myLineChart" width="700" height="200"></canvas>
                </div>
                <script>
                    const labels = ['12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'INSTROOM',
                            data: [888, 420, 500, 150, 700, 873, 879, 423, 245, 999],
                            fill: false,
                            borderColor: 'rgb(4, 160, 181)',
                            tension: 0.1
                        },
                        {
                            label: 'UITSTROOM',
                            data: [43, 650, 520, 800, 421, 240, 372, 344, 131, 982],
                            fill: false,
                            borderColor: 'rgb(224, 48, 118)',
                            tension: 0.1
                        }
                        ]
                    };
                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    };
                    const ctx = document.getElementById('myLineChart').getContext('2d');
                    const myChart = new Chart(ctx, config);
                </script>
            </div>
        </div>
        <div class="sidebar">
            <div class="realTimeClock">
                <p id="currentTime" class="clock"></p>
            </div>
            <div class="weatherblock">
                @if (!empty($weatherResult['temperatureCelsius']))
                    <p>Temperature: {{ $weatherResult['temperatureCelsius'] }} °C</p>
                    <p>Description: {{$weatherResult['weatherDescription'] }}</p>
                @else
                    <p>Invalid event or city</p>
                @endif
            </div>
            <div class="break">
                <h2>Informatie</h2>
            </div>
            <div class="eventtotalpeoplecount">
                <div class="eventinfo">
                    <h2>Herfstfestival</h2>
                    <p>Instroom: <span class="bluespan">{{ $evenementResult['eventData']['Instroom'] }}</span></p>
                    <p>Uitstroom: <span class="pinkspan">{{ $evenementResult['eventData']['Uitstroom'] }}</span></p>
                </div>
            </div>
            <div class="visitorcount">
                <div class="changevisitorcount">
                    <h2>Bezoekers</h2>
                    <p>Huidige aantal: <span class="bluespan">13731</span></p>
                    <p>Piek: <span class="bluespan">14331</span></p>
                    <p>Maximale aantal: <span class="pinkspan" id="maxAmount">{{ $evenementResult['gekozenEvenement']['MaxBezoekers']
                            }}</span></p>

                    <form id="amountForm" action="{{ url('/changeAmount') }}" method="GET">
                        @csrf
                        <input class="wijzigenbutton" type="submit" value="Wijzigen">
                    </form>

                </div>
            </div>
        </div>
        <script>
            document.getElementById('weatherForm').addEventListener('submit', function (event) {
                event.preventDefault();
                getWeather();
            });

            document.getElementById('amountForm').addEventListener('submit', function (event) {
                event.preventDefault();
                changeAmount();
            });
        </script>

    </div>
    </div>
</body>

</html>