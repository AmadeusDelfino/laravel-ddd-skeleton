<?php


namespace App\Infrastructure\Services\Handlers;


use App\Infrastructure\Models\Model;
use Illuminate\Support\Facades\Validator;

abstract class UpdateHandler extends BaseHandler
{
    /**
     * @var Model
     */
    protected $model;

    public function __invoke(array $arguments = []): Model
    {
        $this->validate($arguments);

        $arguments = $this->preProcess($arguments);
        $this->model = (new $this->model)->findOrFail($arguments['reference_id']);
        $this->model->update($arguments);
        $postProcessed = $this->postProcess($this->model, $arguments);
        $this->fireEvents($postProcessed);

        return $postProcessed;
    }

    protected function preProcess(array $arguments): array {
        return $arguments;
    }

    protected function postProcess(Model $model, array $arguments) {
        return $model;
    }
}
