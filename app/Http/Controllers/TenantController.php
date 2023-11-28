<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\PreUser;
use App\Mail\TenantCreated;
use App\Events\UserProcessedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenants.index', [
            'tenants' => Tenant::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $preusers = PreUser::find($request->id);

        return view('tenants.create', compact('preusers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $data = $request->all();
        $keyToRemove = 'pre_user_id';
        $dataWithoutKey = $request->except($keyToRemove);

        $tenant = Tenant::create($dataWithoutKey);
        $tenant->domains()->create([
            'domain' => $request->get('id').'.'.'bftbcs.com',
        ]);

        $this->changeStatusPre($request->pre_user_id);
        $this->sendNotification($request->pre_user_id,$request->get('id'));
        $this->triggerSeeder();

        return redirect()->route('tenants.index')
        ->with('success', 'Compañia creada exitosamente');
    }

    public function changeStatusPre($id) {
        PreUser::where('id',$id)->update(['is_active' => 0]);
    }

    public function sendNotification($id, $domain){
        $preUser = PreUser::find($id);

        Mail::to($preUser->email)->send(new TenantCreated($domain));
    }

    public function triggerSeeder() {
        event(new UserProcessedEvent());
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        $data = DB::select('SELECT * FROM '.$tenant->tenancy_db_name.'.bookings');
        return view('tenants.show', compact('data','tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'id' => 'required|unique:tenants,id,'.$tenant->id,
        ]);
        $tenant->update([
            'id' => $request->get('id'),
        ]);
        $tenant->domains()->update([
            'domain' => $request->get('id').'.'.'bftbcs.com',
        ]);

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index');
    }
}
