<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $booking = Booking::get();
        $service = Service::get();
        $user = User::where('level', 'Pelanggan','Dokter')->latest()->get();

        return view('admin.booking.index',[
            'bookings' => $booking,
            'users' => $user,
            'services' => $service,
        ]);
    }

    public function update(Request $request, $id)
    {
        $services = Service::get();
        $dokters = User::where('level',  'Dokter')->latest()->get();
        $pasiens = User::where('level', 'Pelanggan',)->latest()->get();
        $bookings = Booking::find($id);

        return view('admin.booking.edit',[
            'service' => $services,
            'dokter' => $dokters,
            'pasien' => $pasiens,
            'booking' => $bookings,
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
