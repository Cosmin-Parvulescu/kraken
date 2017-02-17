<?php
  namespace App\Kraken\Core\Helpers;

  use App\Kraken\Core\Pictogram;
  use Storage;

  class PictogramManager {
    private $storage;
    
    public function __construct(Storage $storage) {
      $this->storage = $storage;
    }
    
    public function addOrUpdatePictogram($tenantId, $pictogramable, $file) {
      $pictogramFilename = $this->savePictogram($tenantId, $pictogramable, $file);
      
      if($pictogramable->pictogram != null) {
        $pictogramable->pictogram->delete();
      }
      
      $newPictogram = new Pictogram;
      $newPictogram->path = $pictogramFilename;
      
      $pictogramable->pictogram()->save($newPictogram);
    }
    
    private function savePictogram($tenantId, $pictogramable, $file) {
      $clientExt = $file->getClientOriginalExtension();          
      $generatedFilename = uniqid() . '.' . strtolower($clientExt);
      
      Storage::put($tenantId . '/pictograms/' . $generatedFilename, file_get_contents($file->getRealPath()));
      
      if($pictogramable->pictogram != null) {
        $storagePath = $tenantId . '/pictograms/' . $pictogramable->pictogram->path;
        
        if(Storage::exists($storagePath)) {
          Storage::delete($storagePath);
        }
      }
      
      return $generatedFilename;
    }
  }