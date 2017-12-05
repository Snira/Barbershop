<?php

namespace App\Http\Controllers;

use App\Appointment;
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
        return Appointment::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Appointment::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Appointment::findOrFail($id);
        $article->delete();

        return 204;
    }

}
