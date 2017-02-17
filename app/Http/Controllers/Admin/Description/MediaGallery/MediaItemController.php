<?php

namespace App\Http\Controllers\Admin\Description\MediaGallery;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kraken\Description\MediaGallery;
use App\Kraken\Description\MediaItem;

use App\Kraken\Description\Helpers\MediaItemManager;

class MediaItemController extends Controller
{
    private $mediaItemManager;
  
    public function __construct(MediaItemManager $mediaItemManager) {
      $this->mediaItemManager = $mediaItemManager;
    }

    public function show($tenantId, $descriptionId, $mediaGalleryId, $id)
    {
        return $this->edit($tenantId, $descriptionId, $mediaGalleryId, $id);
    }

    public function edit($tenantId, $descriptionId, $mediaGalleryId, $id)
    {
        $mediaItem = MediaItem::findOrFail($id);
      
        return view('admin.description.mediagallery.mediaitem.edit', ['mediaItem' => $mediaItem, 'tenantId' => $tenantId, 'descriptionId' => $descriptionId, 'mediaGalleryId' => $mediaGalleryId]);
    }

    public function update(Request $request, $tenantId, $descriptionId, $mediaGalleryId, $id)
    {
        $mediaItem = MediaItem::findOrFail($id);
        $mediaItem->fill($request->all());
          
        $mediaItem->save();
      
        if ($request->hasFile('image'))
        {
            $this->mediaItemManager->updateMediaItem($mediaItem->id, $request->file('image'));
        }
      
        return redirect()->action('Admin\Description\MediaGallery\MediaItemController@show', [$tenantId, $descriptionId, $mediaGalleryId, $id]);
    }
  
    public function destroy($tenantId, $descriptionId, $mediaGalleryId, $id)
    {
        $this->mediaItemManager->deleteMediaItem($id);
      
        return redirect()->action('Admin\Description\MediaGallery\MediaGalleryController@show', [$tenantId, $descriptionId, $mediaGalleryId]);
    }
}
