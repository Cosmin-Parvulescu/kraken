<?php

namespace App\Http\Controllers\Admin\Contact\Timetable;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Contact\Timetable;
use App\Kraken\Contact\TimetableItem;

class TimetableItemController extends Controller
{
    public function create($tenantId, $contactId, $timetableId)
    {
        return view('admin.contact.timetable.timetableitem.create', ['tenantId' => $tenantId, 'contactId' => $contactId, 'timetableId' => $timetableId]);
    }

    public function store(Request $request, $tenantId, $contactId, $timetableId)
    {
        $timetable = Timetable::findOrFail($timetableId);

        $timetableItem = new TimetableItem;
        $timetableItem->fill($request->all());

        $timetable->timetableItems()->save($timetableItem);

        return redirect()->action('Admin\Contact\Timetable\TimetableItemController@show', [$tenantId, $contactId, $timetableId, $timetableItem->id]);
    }

    public function show($tenantId, $contactId, $timetableId, $id)
    {
        return $this->edit($tenantId, $contactId, $timetableId, $id);
    }

    public function edit($tenantId, $contactId, $timetableId, $id)
    {
        $timetableItem = TimetableItem::findOrFail($id);

        return view('admin.contact.timetable.timetableitem.edit', ['timetableItem' => $timetableItem, 'tenantId' => $tenantId, 'contactId' => $contactId, 'timetableId' => $timetableId]);
    }

    public function update(Request $request, $tenantId, $contactId, $timetableId, $id)
    {
        $timetableItem = TimetableItem::findOrFail($id);
        $timetableItem->fill($request->all());
        $timetableItem->save();

        return redirect()->action('Admin\Contact\Timetable\TimetableItemController@show', [$tenantId, $contactId, $timetableId, $id]);
    }

    public function destroy($tenantId, $contactId, $timetableId, $id)
    {
        $timetableItem = TimetableItem::findOrFail($id);
        $timetableItem->delete();

        return redirect()->action('Admin\Contact\Timetable\TimetableController@show', [$tenantId, $contactId, $timetableId]);
    }
}
