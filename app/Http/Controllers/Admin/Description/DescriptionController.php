<?php

namespace App\Http\Controllers\Admin\Description;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tenant;
use App\Kraken\Description\Description;

class DescriptionController extends Controller
{
    public function create($tenantId)
    {
        return view('admin.description.create', ['tenantId' => $tenantId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $tenantId)
    {
        $tenant = Tenant::findOrFail($tenantId);
      
        $description = new Description;      
        $description->fill($request->all());
      
        $tenant->description()->save($description);
        $tenant->modules()->attach(1);
      
        return redirect()->action('Admin\Description\DescriptionController@show', [$tenantId, $tenant->description->id]);
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tenantId, $id)
    {
        return $this->edit($tenantId, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tenantId, $id)
    {
        $description = Description::findOrFail($id);
      
        return view('admin.description.edit', ['description' => $description, 'tenantId' => $tenantId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenantId, $id)
    {
        $description = Description::findOrFail($id);
        $description->fill($request->all());
      
        $description->save();
      
        return redirect()->action('Admin\Description\DescriptionController@show', [$tenantId, $id]);
    }
  
    public function destroy($tenantId, $id)
    {
        $description = Description::findOrFail($id);
        $description->delete();
      
        return redirect()->action('Admin\TenantController@index');
    }
}