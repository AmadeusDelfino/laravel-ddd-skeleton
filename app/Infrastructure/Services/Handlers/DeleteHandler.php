<?php


namespace App\Infrastructure\Services\Handlers;


use App\Infrastructure\Models\Model;
use Illuminate\Support\Facades\Validator;

abstract class DeleteHandler extends BaseHandler
{
    protected $rules = [
        'owner_id' => 'required',
        'reference_id' => 'required',
    ];
    /**
     * @var Model
     */
    protected $model;
    protected $ownerColumn = '';

    public function __invoke(array $arguments = []): Model
    {
        $this->validate($arguments);

        $arguments = $this->preProcess($arguments);
        $this->model = new $this->model;
        $value = $this
            ->model
            ->where($this->ownerColumn, $arguments['owner_id'])
            ->where('id', $arguments['reference_id'])
            ->firstOrFail();
        $value->delete();
        $postProcessed = $this->postProcess($value, $arguments);
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
