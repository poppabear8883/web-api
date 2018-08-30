<?php

namespace App\Repositories;

use App\Label;
use App\Contracts\LabelRepositoryInterface;
use App\Traits\isProfilable;

class LabelRepository extends BaseRepository implements LabelRepositoryInterface
{
    use isProfilable;

    /**
     * @var string $class
     */
    protected $class = Label::class;

    /**
     * @var Label
     */
    protected $label;

    public function __construct(Label $label)
    {
        $this->label = $label;
    }

    public function class()
    {
        return $this->class;
    }

    public function model()
    {
        return $this->label;
    }

    public function all()
    {
        return $this->model()->all();
    }

    public function findById($id)
    {
        return $this->model()->find($id);
    }

    public function create(array $data)
    {
        $model = $this->model()->create([]);

        $this->profilable()->create([
            'moniker' => $data['moniker'],
            'city' => $data['city'],
            'territory' => $data['territory'],
            'country_code' => $data['country_code'],
            'profile_url' => $data['profile_url'],
            'profilable_id' => $model->id,
            'profilable_type' => $this->class
        ]);

        return $model;
    }

    public function update($id, array $data)
    {
        $model = $this->findById($id);

        $this->profilable()->update($model->profile->id, $data);

        return $model;
    }

    public function profile()
    {
        $this->artist->profile();
    }
}