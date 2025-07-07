<?php
namespace App\Modules\User\Infrastructure\Persistence\Eloquent;

use App\Modules\User\Infrastructure\Persistence\Eloquent\UserModel;
use App\Modules\User\Domain\Entities\User;
use App\Modules\User\Domain\ValueObjects\Email;

class UserRepository
{
    public function all(): array
    {
        return UserModel::all()->map(fn ($u) => new User(
            $u->user_id, $u->firstName, $u->lastName, new Email($u->email), $u->user_Role
        ))->toArray();
    }

    public function find(string $id): ?User
    {
        $u = UserModel::find($id);
        if (!$u) return null;

        return new User($u->user_id, $u->firstName, $u->lastName, new Email($u->email), $u->user_Role);
    }

    public function create(User $user): User
    {
        $m = UserModel::create([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => (string)$user->email,
            'user_Role' => $user->user_Role,
        ]);

        return new User($m->user_id, $m->firstName, $m->lastName, new Email($m->email), $m->user_Role);
    }

    public function update(string $id, User $user): ?User
    {
        $m = UserModel::find($id);
        if (!$m) return null;

        $m->update([
            'firstName' => $user->firstName,
            'lastName' => $user->lastName,
            'email' => (string)$user->email,
            'user_Role' => $user->user_Role,
        ]);

        return new User($m->user_id, $m->firstName, $m->lastName, new Email($m->email), $m->user_Role);
    }

    public function delete(string $id): bool
    {
        return UserModel::where('user_id', $id)->delete() > 0;
    }
}
