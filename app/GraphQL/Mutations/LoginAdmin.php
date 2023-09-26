<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final readonly class LoginAdmin
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = Admin::where('email', $args['email'])->first();

        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('admin')->plainTextToken;
    
    }
}
