<?php

namespace App\Http\Controllers\Admin\Contact\Timetable;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Contact\Contact;
use App\Kraken\Contact\Timetable;

class TimetableController extends Controller
{
    public function create($tenantId, $contactId)
    {
        return view('admin.contact.timetable.create', ['tenantId' => $tenantId, 'contactId' => $contactId]);
    }

    public function store(Request $request, $tenantId, $contactId)
    {
        $contact = Contact::findOrFail($contactId);

        $timetable = new Timetable;
        $timetable->fill($request->all());

        $contact->timetable()->save($timetable);

        return redirect()->action('Admin\Contact\Timetable\TimetableController@show', [$tenantId, $contactId, $timetable->id]);
    }

    public function show($tenantId, $contactId, $id)
    {
        return $this->edit($tenantId, $contactId, $id);
    }

    public function edit($tenantId, $contactId, $id)
    {
        $timetable = Timetable::findOrFail($id);

        return view('admin.contact.timetable.edit', ['timetable' => $timetable, 'tenantId' => $tenantId, 'contactId' => $contactId]);
    }

    public function update(Request $request, $tenantId, $contactId, $id)
    {
        $timetable = Timetable::findOrFail($id);
        $timetable->fill($request->all());

        $timetable->save();

        return redirect()->action('Admin\Contact\Timetable\TimetableController@show', [$tenantId, $contactId, $id]);
    }

    public function destroy($tenantId, $contactId, $id)
    {
        $timetable = Timetable::findOrFail($id);
        $timetable->delete();

        return redirect()->action('Admin\Contact\Timetable\ContactController@show', [$tenantId, $contactId]);
    }
}
