<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function findById($id)
    {
        return $this->user->find($id);
    }

    public function songs()
    {
        return $this->catalogable() ? $this->catalogable()->songs : $this->purchasedSongs();
    }

    public function purchasedSongs()
    {
        return $this->user->purchased();
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);

        $user->update($data);

        return $user;
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    /*
     * Protected Methods
     * -----------------
     */

    protected function catalogable()
    {
        return $this->user->entity->catalogable ?: $this->user->entity->catalogable;
    }
}