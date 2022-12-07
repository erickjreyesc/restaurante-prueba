<?php

namespace App\Traits;

use App\Models\Param\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

trait FileTrait
{
    use WithFileUploads; 

    public $identificador;
    public $directorio = 'actas/';

    public function setFiles(Model $model, $files)
    {
        if (!is_null($files)) {
            foreach ($files as $key => $filenew) {
                $directory = $this->directorio . $this->setDirectory($model->codigo);
                $pathdir = $filenew->store($directory, 'public');
                $model->archivo()->create([
                    'media_link'  =>  $pathdir,
                    'media_titulo'  => $this->setDirectory($model->codigo) . '_' . ($key + 1),
                    'mime_type'  => $filenew->getMimeType(),
                ]);
            }
        }
    }

    public function destroyDirectory($codigo)
    {
        Storage::deleteDirectory($this->directorio . $this->setDirectory($codigo));
    } 

    public function destroyFileModel(Media $media)
    {
        Storage::disk('public')->delete($media->media_link);
        $media->delete();
    }

    public function destroyFile(Media $media)
    {
        $media->delete();
    }
}
