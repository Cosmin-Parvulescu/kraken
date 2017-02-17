<?php
  namespace App\Kraken\Description\Helpers;

  use App\Kraken\Description\MediaGallery;
  use App\Kraken\Description\MediaItem;
  use Storage;

  class MediaItemManager {
    private $storage;
    
    public function __construct(Storage $storage) {
      $this->storage = $storage;
    }
    
    public function addMediaItems($tenantId, $mediaGallery, $files) {
      foreach($files as $file) {
        $this->addMediaItem($tenantId, $mediaGallery, $file);
      }
    }
    
    public function addMediaItem($tenantId, $mediaGallery, $file) {
      $mediaItemFilename = $this->saveMediaItem($tenantId, $file);
      
      $newMediaItem = new MediaItem;
      $newMediaItem->mime = $file->getClientMimeType();
      $newMediaItem->path = $mediaItemFilename;
      
      $mediaGallery->mediaItems()->save($newMediaItem);
    }
    
    public function updateMediaItem($tenantId, $mediaItemId, $file) {
      $newMediaItemFilename = $this->saveMediaItem($tenantId, $file);
      
      $mediaItem = MediaItem::findOrFail($mediaItemId);
      $mediaItem->path = $newMediaItemFilename;
      
      $mediaItem->save();
    }
    
    public function deleteMediaItem($mediaItemId) {
      $mediaItem = MediaItem::findOrFail($mediaItemId);
      $mediaItem->delete();
    }
    
    private function saveMediaItem($tenantId, $file) {
      $clientExt = $file->getClientOriginalExtension();          
      $generatedFilename = uniqid() . '.' . strtolower($clientExt);
      
      Storage::put($tenantId . '/mediaitems/' . $generatedFilename, file_get_contents($file->getRealPath()));
      
      return $generatedFilename;
    }
  }