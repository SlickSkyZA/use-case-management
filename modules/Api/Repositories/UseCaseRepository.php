<?php

namespace Modules\Api\Repositories;

use Modules\Api\Repositories\UseCase\UseCaseWithActors;

class UseCaseRepository extends Repository implements UseCaseWithActors
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return '\Modules\Api\Models\UseCase';
    }

    public function findByIdSistema($id)
    {
        return $this->getModel()->where('id_sistema', $id);
    }

    public function getData()
    {
        // TODO: Implement getData() method.
    }
}
