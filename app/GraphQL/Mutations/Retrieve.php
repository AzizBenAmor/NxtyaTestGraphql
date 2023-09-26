<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Visitor;

final readonly class Retrieve
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $visitor=Visitor::onlyTrashed()->where('email',$args['email'])->first();

        if (!$visitor) {
            
            return 'the visitor is not deleted';

        }

        $visitor->deleted_at=null;
        $visitor->update();

        return 'visitor retrieved successfully';
    }
}
