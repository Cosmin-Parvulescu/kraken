<?php

namespace App\Http\Controllers\Admin\Description\MediaGallery;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Description\Description;
use App\Kraken\Description\MediaGallery;

use App\Kraken\Description\Helpers\MediaItemManager;

class MediaGalleryController extends Controller
{
    private $mediaItemManager;
  
    public function __construct(MediaItemManager $mediaItemManager) {
      $this->mediaItemManager = $mediaItemManager;
    }
  
    public function create($tenantId, $descriptionId)
    {
        return view('admin.description.mediagallery.create', ['tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function store(Request $request, $tenantId, $descriptionId)
    {
        $description = Description::findOrFail($descriptionId);
      
        $mediaGallery = new MediaGallery;      
        $mediaGallery->fill($request->all());
      
        $description->mediaGallery()->save($mediaGallery);
      
        if ($request->hasFile('images'))
        {
          $this->mediaItemManager->addMediaItems($tenantId, $mediaGallery, $request->file('images'));
        }
      
        return redirect()->action('Admin\Description\MediaGallery\MediaGalleryController@show', [$tenantId, $descriptionId, $mediaGallery->id]);
    }

    public function show($tenantId, $descriptionId, $id)
    {
        return $this->edit($tenantId, $descriptionId, $id);
    }

    public function edit($tenantId, $descriptionId, $id)
    {
        $mediaGallery = MediaGallery::findOrFail($id);
      
        return view('admin.description.mediagallery.edit', ['mediaGallery' => $mediaGallery, 'tenantId' => $tenantId, 'descriptionId' => $descriptionId]);
    }

    public function update(Request $request, $tenantId, $descriptionId, $id)
    {
        $mediaGallery = MediaGallery::findOrFail($id);
        $mediaGallery->fill($request->all());
          
        $mediaGallery->save();
      
        if ($request->hasFile('images'))
        {
          $this->mediaItemManager->addMediaItems($tenantId, $mediaGallery, $request->file('images'));
        }
      
        return redirect()->action('Admin\Description\MediaGallery\MediaGalleryController@show', [$tenantId, $descriptionId, $id]);
    }
  
    public function destroy($tenantId, $descriptionId, $id)
    {
        $mediaGallery = MediaGallery::findOrFail($id);
        $mediaGallery->delete();
      
        return redirect()->action('Admin\Description\DescriptionController@show', [$tenantId, $descriptionId]);
    }
}
