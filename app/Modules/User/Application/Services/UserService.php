<?php
namespace App\Modules\User\Application\Services;

use Illuminate\Support\Str;
use App\Modules\User\Domain\Entities\User;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Infrastructure\Persistence\Eloquent\UserRepository;

class UserService
{
    public function __construct(private UserRepository $repo) {}

    public function all(): array
    {
        return $this->repo->all();
    }

    public function find(string $id): ?User
    {
        return $this->repo->find($id);
    }

    public function create(string $firstName, string $lastName, string $email, string $role): User
    {
        return $this->repo->create(new User(
            (string) Str::uuid(), $firstName, $lastName, new Email($email), $role
        ));
    }

    public function update(string $id, string $firstName, string $lastName, string $email, string $role): ?User
    {
        return $this->repo->update($id, new User(
            $id, $firstName, $lastName, new Email($email), $role
        ));
    }

    public function delete(string $id): bool
    {
        return $this->repo->delete($id);
    }
}
