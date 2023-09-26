<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Visitor;

final readonly class SoftDelete
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $visitor=Visitor::where('email',$args['email'])->first();
        if (!$visitor) {
         
            return 'visitor already deleted';
        
        }
        $visitor->delete();

        return 'Visitor has been deleted';
    }
}
