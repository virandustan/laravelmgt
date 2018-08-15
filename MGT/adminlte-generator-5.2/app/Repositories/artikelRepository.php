<?php

namespace App\Repositories;

use App\Models\artikel;
use InfyOm\Generator\Common\BaseRepository;

class artikelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'judul',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return artikel::class;
    }
}
