<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Appointment as AppointmentResource;
use App\Http\Resources\AppointmentCollection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::paginate();
        return new AppointmentCollection($appointments);
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);
        if(!$appointment)
        {
            return response()->json(['message'=>'Resource not found'], 404);

        }
        return new AppointmentResource($appointment);
    }

    public function store(Request $request)
    {
        $contentType = $request->header('content-type');
        if(!$request->barber || !$request->date || !$request->time )
        {
            return response()->json(['message'=>'Incorrect format or empty values'], 400);

        }

        $appointment = new Appointment();
        $appointment->barber = $request->barber;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->created_at = Carbon::now();
        $appointment->updated_at = Carbon::now();

        $appointment->save();

        return response($appointment, 201)
        ->header('Content-Type', $contentType);
    }

    public function update(Request $request, $id)
    {
        $contentType = $request->header('content-type');

        if(!$request->barber || !$request->date || !$request->time )
        {
            return response()->json(['message'=>'Incorrect format or empty values'], 400);

        }

        $appointment = Appointment::findOrFail($id);
        $appointment->barber = $request->barber;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->created_at = Carbon::now();
        $appointment->updated_at = Carbon::now();

        $appointment->save();

        return response($appointment, 201)
            ->header('Content-Type', $contentType);
    }

    public function destroy(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return response('Deleted.', 204);
    }

}
