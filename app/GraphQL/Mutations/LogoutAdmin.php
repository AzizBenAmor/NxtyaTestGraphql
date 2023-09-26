<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

final readonly class LogoutAdmin
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        auth()->guard('admin-api')->user()->tokens()->delete();
        return 'Admin Desconnected Succesfully';
    }
}
