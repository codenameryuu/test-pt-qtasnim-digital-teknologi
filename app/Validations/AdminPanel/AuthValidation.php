<?php

namespace App\Validations\AdminPanel;

use Illuminate\Support\Facades\Hash;

use App\Helpers\MessageHelper;

use App\Models\User;

class AuthValidation
{
    /**
     ** Authenticate validation.
     *
     * @param $request
     * @return object
     */
    public function authenticate($request)
    {
        $user = User::firstWhere('email', $request->email);

        // * Check email is available
        if (empty($user)) {
            $status = false;
            $statusNotify = 'danger';
            $message = 'Email tidak ditemukan !';

            $result = (object) [
                'status' => $status,
                'statusNotify' => $statusNotify,
                'message' => $message
            ];

            return $result;
        }

        // * Check password is correct
        if (!Hash::check($request->password, $user->password)) {
            $status = false;
            $statusNotify = 'danger';
            $message = 'Password salah !';

            $result = (object) [
                'status' => $status,
                'statusNotify' => $statusNotify,
                'message' => $message
            ];

            return $result;
        }

        $status = true;
        $message = MessageHelper::validateSuccess();

        $result = (object) [
            'status' => $status,
            'message' => $message
        ];

        return $result;
    }
}
