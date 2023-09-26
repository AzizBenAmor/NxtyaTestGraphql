<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Visitor;
use Illuminate\Support\Facades\Hash;

final readonly class RegisterVisitor
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $visitor=new Visitor();
        $visitor->name =  $args['name'];
        $visitor->email =$args['email'];
        $visitor->password = Hash::make($args['password']);
        $visitor->save();

        $token= $visitor->createToken('visitor')->plainTextToken;
        
        return $token;
    }
}
