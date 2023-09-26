<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

final readonly class LogoutVisitor
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        auth()->guard('visitor-api')->user()->tokens()->delete();
        return 'Visitor Desconnected Succesfully';
    }
}
