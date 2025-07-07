<?php

namespace App\Modules\User\Domain\Entities;

use App\Modules\User\Domain\ValueObjects\Email;

class User
{
    public function __construct(
        public string $user_id,
        public string $firstName,
        public string $lastName,
        public Email $email,
        public string $user_Role,
    )
    {}
}