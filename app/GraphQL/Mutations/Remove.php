<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Visitor;

final readonly class Remove
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $visitor=Visitor::withTrashed()->where('email',$args['email'])->first();
        $visitor->forceDelete();

        return 'Visitor has been Removed';
    }
}
