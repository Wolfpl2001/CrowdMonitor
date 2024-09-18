<?php

namespace App\Http\Controllers;

use App\Models\evenementnow;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Cam;

class EvenementController extends Controller
{
    public function index()
    {
        $selectedevent = Event::find(1)->toArray(); // bug: get first event a user may monitor
        $eventdata = Cam::orderBy('Tijd', 'DESC')->first();
        $allevents = Event::all()->toArray();
        $eventarray =  ["eventData" => $eventdata, "gekozenEvenement" => $selectedevent, "evenementen" => $allevents];
        return $eventarray;
    }
    public function event()
    {
        $events = Event::all();
        return view("events", compact('events'));
    }
    public function GetEventData(Request $request)
    {
        $eventsnow = evenementnow::all();
        $events = EvenementController::index();
        $postData = $request->all();
        $event = Cam::where('EvenementID', $postData['id'])->first()->toArray();
        $eventarray = ["eventData" => $event, "gekozenEvenement" => $events['gekozenEvenement'], "evenementen" => $events['evenementen']];
        return $eventarray;
    }
    public function store(Request $request)
    {
        $data = $request->toArray();
        echo '<PRE>';
        print_r($data);
        echo '</PRE>';

        $event = Event::create([
            'max_visitors' => 1000, //$data['max_visitors'],
            'start' => $data['start'],
            'end' => $data['end'],            
            'event_name' => $data['event_name'],
            'city' => $data['city'],
            'user_id' => '1',
        ]);
        $selectedevent = Event::where('event_name', $data['event_name'])
        ->where('stad', $data['stad'])
        ->where('start', $data['start'])
        ->first()
        ->toArray();
        $eventdata = Cam::create([
            'event_id' => $selectedevent['id'],
            'inflow' => $data['inflow'],
            'outflow' => $data['outflow'],
            'temperature' => $data['temperature'],
            'time' => now(),
            'weather_description' => $data['weather_description'],
            'weather' => $data['weather'],
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
        /**
     * Common method to retrieve event data based on ID
     *
     * @param int $id
     * @return array
     */
    public function getEventDataById($id)
    {
        // Get the selected event
        $selectedEvent = Event::find($id ?: 1);

        if (!$selectedEvent) {
            // Handle the case where the event is not found
            abort(404, 'Event not found');
        }

        // Get event data for the selected event
        $eventData = Cam::where('EvenementID', $selectedEvent->id)->first();

        if (!$eventData) {
            // Handle the case where event data is not found
            abort(404, 'Event data not found');
        }

        $allevents = Event::all();

        return [
            "eventData" => $eventData->toArray(),
            "gekozenEvenement" => $selectedEvent->toArray(),
            "evenementen" => $allevents->toArray()
        ];
    }
}
