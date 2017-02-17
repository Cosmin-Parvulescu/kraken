<?php

namespace App\Http\Controllers\Admin\Description\Staff;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Description\Description;
use App\Kraken\Description\Staff;

class StaffController extends Controller
{
    public function create($tenantId, $descriptionId)
    {
        return view('admin.description.staff.create', ['tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function store(Request $request, $tenantId, $descriptionId)
    {
        $description = Description::findOrFail($descriptionId);
      
        $staff = new Staff;      
        $staff->fill($request->all());
      
        $description->staff()->save($staff);
      
        return redirect()->action('Admin\Description\Staff\StaffController@show', [$tenantId, $descriptionId, $staff->id]);
    }

    public function show($tenantId, $descriptionId, $id)
    {
        return $this->edit($tenantId, $descriptionId, $id);
    }

    public function edit($tenantId, $descriptionId, $id)
    {
        $staff = Staff::findOrFail($id);
      
        return view('admin.description.staff.edit', ['staff' => $staff, 'tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function update(Request $request, $tenantId, $descriptionId, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->fill($request->all());
      
        $staff->save();
      
        return redirect()->action('Admin\Description\Staff\StaffController@show', [$tenantId, $descriptionId, $id]);
    }
  
    public function destroy($tenantId, $descriptionId, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
      
        return redirect()->action('Admin\Description\Staff\DescriptionController@show', [$tenantId, $descriptionId]);
    }
}
