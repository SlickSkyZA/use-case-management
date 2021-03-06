<?php

namespace Modules\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Models\ComplementarySteps;

class Complementary extends Model
{

    /**
     * @var string
     */
    protected $table = 'informacao_complementar';

    /**
     * @var string
     */
    protected $primaryKey = 'id_informacao_complementar';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @param array $request
     * @param int $id_passos
     * @param int $id_sistema
     */
    public function newSave($request, $id_passos, $id_sistema)
    {
        if (count($request) > 0) {
            foreach ($request as $value) {
                if ($value) {
                    $complementaryModel = new Complementary();
                    $pieces = explode('|', $value);

                    $complementaryModel->identificador = $pieces[0];
                    $complementaryModel->descricao     = $pieces[1];
                    $complementaryModel->id_sistema    = $id_sistema;
                    $complementaryModel->save();

                    $complementaryModel->id_informacao_complementar;

                    $steps = new ComplementarySteps();
                    $steps->id_informacao_complementar = $complementaryModel->id_informacao_complementar;
                    $steps->id_passos = $id_passos;
                    $steps->save();
                }
            }
        }
    }
}
