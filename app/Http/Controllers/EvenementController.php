<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\EvenementData;

class EvenementController extends Controller
{
    public function index()
    {
        $selectedevent = Evenement::find(1)->toArray(); // bug: get first event a user may monitor
        $eventdata = EvenementData::orderBy('Tijd', 'DESC')->first();
        $allevents = Evenement::all()->toArray();
        $eventarray =  ["eventData" => $eventdata, "gekozenEvenement" => $selectedevent, "evenementen" => $allevents];
        return $eventarray;
    }
    public function event()
    {
        $events = Evenement::all();
        return view("events", compact('events'));
    }
    public function GetEventData(Request $request)
    {
        $events = EvenementController::index();
        $postData = $request->all();
        $event = EvenementData::where('EvenementID', $postData['id'])->first()->toArray();
        $eventarray = ["eventData" => $event, "gekozenEvenement" => $events['gekozenEvenement'], "evenementen" => $events['evenementen']];
        return $eventarray;
    }
    public function store(Request $request)
    {
        $data = $request->toArray();

        $event = Evenement::create([
            'MaxBezoekers' => $data['maxbezoekers'],
            'Start' => $data['start'],
            'Eind' => $data['eind'],
            'AdresID' => '1',
            'EventNaam' => $data['eventnaam'],
            'Stad' => $data['stad'],
            'UserID' => '1',
        ]);
        $selectedevent = Evenement::where('EventNaam', $data['eventnaam'])
        ->where('Stad', $data['stad'])
        ->where('Start', $data['start'])
        ->first()
        ->toArray();
        $eventdata = EvenementData::create([
            'EvenementID' => $selectedevent['id'],
            'Instroom' => $data['instroom'],
            'Uitstroom' => $data['uitstroom'],
            'temperature' => $data['temperature'],
            'Tijd' => now(),
            'weather_description' => $data['weather_description'],
            'Weer' => $data['weer'],
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function destroy(Evenement $event)
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
        $selectedEvent = Evenement::find($id ?: 1);

        if (!$selectedEvent) {
            // Handle the case where the event is not found
            abort(404, 'Event not found');
        }

        // Get event data for the selected event
        $eventData = EvenementData::where('EvenementID', $selectedEvent->id)->first();

        if (!$eventData) {
            // Handle the case where event data is not found
            abort(404, 'Event data not found');
        }

        $allevents = Evenement::all();

        return [
            "eventData" => $eventData->toArray(),
            "gekozenEvenement" => $selectedEvent->toArray(),
            "evenementen" => $allevents->toArray()
        ];
    }
}