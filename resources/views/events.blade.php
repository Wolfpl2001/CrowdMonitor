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
                <h3>{{ $event->event_name }}</h3>
                <p>Start Date and Time: {{ $event->start }}</p>
                <p>End Date and Time: {{ $event->end }}</p>
                <p>Max Visitors: {{ $event->max_visitors }}</p>
                <p>City: {{ $event->city }}</p>

                <a href="{{ route('weather.index', ['id' => $event->id, 'city' => $event->city]) }}">View Weather</a>

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

                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" required>

                <label for="start">Start Date and Time:</label>
                <input type="datetime-local" id="start" name="start" required>

                <label for="end">End Date and Time:</label>
                <input type="datetime-local" id="end" name="end" required>

                <label for="max_visitors">Max Visitors:</label>
                <input type="number" id="max_visitors" name="max_visitors" required>

                <label for="inflow">Instroom:</label>
                <input type="number" id="inflow" name="inflow" required>

                <label for="outflow">Uitstroom:</label>
                <input type="number" id="outflow" name="outflow" required>

                <label for="temperature">Temperatuur:</label>
                <input type="number" id="temperature" name="temperature" required>

                <label for="weather_description">Weer Beschrijving:</label>
                <input type="number" id="weather_description" name="weather_description" required>

                <label for="wheather">Weer:</label>
                <input type="number" id="wheather" name="weather" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <button type="submit">Create Event</button>
            </form>
        </div>
    </div>
</body>

</html>