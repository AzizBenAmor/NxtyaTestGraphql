<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

final readonly class RegisterAdmin
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $admin=new Admin();
        $admin->name = $args['name'];
        $admin->email = $args['email'];
        $admin->password = Hash::make($args['password']);
        $admin->save();

        $token= $admin->createToken('admin')->plainTextToken;
        $response=['Admin created Successfully','token'=>$token];
        return $token;
    }
}
