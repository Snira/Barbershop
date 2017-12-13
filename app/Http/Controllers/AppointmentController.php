<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class AppointmentController extends Controller
{
    public function index()
    {
        return new AppointmentCollection(Appointment::paginate());
    }

    public function show($id)
    {
        return new AppointmentResource(Appointment::find($id));
    }

    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->barber = $request->barber;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->created_at = Carbon::now();
        $appointment->updated_at = Carbon::now();

        $appointment->save();

        return new AppointmentResource($appointment);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->barber = $request->barber;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->created_at = Carbon::now();
        $appointment->updated_at = Carbon::now();

        $appointment->save();

        return new AppointmentResource($appointment);
    }

    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return response('Deleted.', 204);
    }

}
