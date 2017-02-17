<?php

namespace App\Http\Controllers\Admin\Description\Staff;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Storage;

use App\Kraken\Core\Pictogram;

use App\Kraken\Description\Description;
use App\Kraken\Description\Staff;
use App\Kraken\Description\StaffMember;

use App\Kraken\Core\Helpers\PictogramManager;

class StaffMemberController extends Controller
{
    private $pictogramManager;
  
    public function __construct(PictogramManager $pictogramManager) {
      $this->pictogramManager = $pictogramManager;
    }
    public function create($tenantId, $descriptionId, $staffId)
    {
        return view('admin.description.staff.staffmember.create', ['tenantId' => $tenantId, 'descriptionId' => $descriptionId, 'staffId' => $staffId]);
    }

    public function store(Request $request, $tenantId, $descriptionId, $staffId)
    {
        $staff = Staff::findOrFail($staffId);
      
        $staffMember = new StaffMember;      
        $staffMember->fill($request->all());
      
        $staff->staffMembers()->save($staffMember);
      
        if ($request->hasFile('pictogram'))
        {
          $this->pictogramManager->addOrUpdatePictogram($tenantId, $staffMember, $request->file('pictogram'));
        }
        
        return redirect()->action('Admin\Description\Staff\StaffMemberController@show', [$tenantId, $descriptionId, $staffId, $staffMember->id]);
    }

    public function show($tenantId, $descriptionId, $staffId, $id)
    {
        return $this->edit($tenantId, $descriptionId, $staffId, $id);
    }

    public function edit($tenantId, $descriptionId, $staffId, $id)
    {
        $staffMember = StaffMember::findOrFail($id);
      
        return view('admin.description.staff.staffmember.edit', ['staffMember' => $staffMember, 'tenantId' => $tenantId, 'descriptionId' => $descriptionId, 'staffId' => $staffId]);
    }

    public function update(Request $request, $tenantId, $descriptionId, $staffId, $id)
    {
        $staffMember = StaffMember::findOrFail($id);
        $staffMember->fill($request->all());
        $staffMember->save();
      
        if ($request->hasFile('pictogram'))
        {
          $this->pictogramManager->addOrUpdatePictogram($tenantId, $staffMember, $request->file('pictogram'));
        }
      
        return redirect()->action('Admin\Description\Staff\StaffMemberController@show', [$tenantId, $descriptionId, $staffId, $id]);
    }
  
    public function destroy($tenantId, $descriptionId, $staffId, $id)
    {
        $staffMember = StaffMember::findOrFail($id);
        $staffMember->delete();
      
        return redirect()->action('Admin\Description\Staff\StaffController@show', [$tenantId, $descriptionId, $staffId]);
    }
}
