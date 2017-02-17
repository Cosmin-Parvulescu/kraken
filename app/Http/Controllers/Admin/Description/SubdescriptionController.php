<?php

namespace App\Http\Controllers\Admin\Description;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Description\Description;
use App\Kraken\Description\Subdescription;

class SubdescriptionController extends Controller
{
    public function create($tenantId, $descriptionId)
    {
        return view('admin.description.subdescription.create', ['tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function store(Request $request, $tenantId, $descriptionId)
    {
        $description = Description::findOrFail($descriptionId);
      
        $subdescription = new Subdescription;      
        $subdescription->fill($request->all());
      
        $description->subdescriptions()->save($subdescription);
      
        return redirect()->action('Admin\Description\SubdescriptionController@show', [$tenantId, $descriptionId, $subdescription->id]);
    }

    public function show($tenantId, $descriptionId, $id)
    {
        return $this->edit($tenantId, $descriptionId, $id);
    }

    public function edit($tenantId, $descriptionId, $id)
    {
        $subdescription = Subdescription::findOrFail($id);
      
        return view('admin.description.subdescription.edit', ['subdescription' => $subdescription, 'tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function update(Request $request, $tenantId, $descriptionId, $id)
    {
        $subdescription = Subdescription::findOrFail($id);
        $subdescription->fill($request->all());
      
        $subdescription->save();
      
        return redirect()->action('Admin\Description\SubdescriptionController@show', [$tenantId, $descriptionId, $id]);
    }
  
    public function destroy($tenantId, $descriptionId, $id)
    {
        $subdescription = Subdescription::findOrFail($id);
        $subdescription->delete();
      
        return redirect()->action('Admin\Description\DescriptionController@show', [$tenantId, $descriptionId]);
    }
}
