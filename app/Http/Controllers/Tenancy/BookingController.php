<?php

namespace App\Http\Controllers\Tenancy;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenancy.bookings.index', [
            'bookings' => Booking::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = ['Llegada'=>'Llegada', 'Salida'=>'Salida', 'Traslado' => 'Traslado'];

        return view('tenancy.bookings.create', [
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'pax' => 'required',
            'service' => 'required',
            'client_name' => 'required',
            'hotel' => 'required',
            'flight' => 'required'
        ]);
        $booking = Booking::create($request->all());
        return redirect()->to('bookings');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $services = ['Llegada'=>'Llegada', 'Salida'=>'Salida', 'Traslado' => 'Traslado'];
        return view('tenancy.bookings.edit', compact('booking','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('bookings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
