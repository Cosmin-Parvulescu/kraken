<?php

namespace App\Http\Controllers\Admin\Contact;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tenant;
use App\Kraken\Contact\Contact;

class ContactController extends Controller
{
    public function create($tenantId)
    {
        return view('admin.contact.create', ['tenantId' => $tenantId]);
    }

    public function store(Request $request, $tenantId)
    {
        $tenant = Tenant::findOrFail($tenantId);

        $contact = new Contact;
        $contact->fill($request->all());

        $tenant->contact()->save($contact);
        $tenant->modules()->attach(3);

        return redirect()->action('Admin\Contact\ContactController@show', [$tenantId, $tenant->contact->id]);
    }

    public function show($tenantId, $id)
    {
        return $this->edit($tenantId, $id);
    }

    public function edit($tenantId, $id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contact.edit', ['contact' => $contact, 'tenantId' => $tenantId]);
    }

    public function update(Request $request, $tenantId, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->fill($request->all());

        $contact->save();

        return redirect()->action('Admin\Contact\ContactController@show', [$tenantId, $id]);
    }

    public function destroy($tenantId, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->action('Admin\TenantController@index');
    }
}