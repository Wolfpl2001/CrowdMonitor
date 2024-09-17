<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/pages/events.css">
    <title>Events Page</title>
</head>

<body>
    <div class="parent">
        <div class="header">
            <!-- Header Content Here -->
        </div>
        <div class="events-list">
            <h2>Events List</h2>

            @forelse ($events as $event)
            <div class="event-item">
                <h3>{{ $event->EventNaam }}</h3>
                <p>Start Date and Time: {{ $event->Start }}</p>
                <p>End Date and Time: {{ $event->Eind }}</p>
                <p>Max Visitors: {{ $event->MaxBezoekers }}</p>
                <p>City: {{ $event->Stad }}</p>

                <a href="{{ route('weather.index', ['id' => $event->id, 'city' => $event->Stad]) }}">View Weather</a>

                <form method="POST" action="{{ route('events.destroy', ['id' => $event->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Delete</button>
                </form>
            </div>
            @empty
            <p>No events available</p>
            @endforelse
        </div>

        <div class="events-container">
            <h2>Create Event</h2>

            <form method="POST" action="{{ route('events.store') }}">
                @csrf

                <label for="eventnaam">Event Name:</label>
                <input type="text" id="eventnaam" name="eventnaam" required>

                <label for="start">Start Date and Time:</label>
                <input type="datetime-local" id="start" name="start" required>

                <label for="eind">End Date and Time:</label>
                <input type="datetime-local" id="eind" name="eind" required>

                <label for="maxbezoekers">Max Visitors:</label>
                <input type="number" id="maxbezoekers" name="maxbezoekers" required>

                <label for="instroom">Instroom:</label>
                <input type="number" id="instroom" name="instroom" required>

                <label for="uitstroom">Uitstroom:</label>
                <input type="number" id="uitstroom" name="uitstroom" required>

                <label for="temperature">Temperatuur:</label>
                <input type="number" id="temperature" name="temperature" required>

                <label for="weather_description">Weer Beschrijving:</label>
                <input type="number" id="weather_description" name="weather_description" required>

                <label for="weer">Weer:</label>
                <input type="number" id="weer" name="weer" required>

                <label for="stad">City:</label>
                <input type="text" id="stad" name="stad" required>

                <button type="submit">Create Event</button>
            </form>
        </div>
    </div>
</body>

</html>