<?php
/**
 * Created by PhpStorm.
 * User: ahundiak
 * Date: 7/13/18
 * Time: 2:25 PM
 */

namespace App\User\Register;


use Cerad\Core\RouterTrait;

class UserRegisterForm
{
    use RouterTrait;

    public function render() : string
    {
        $url = $this->generateUrl('test');
        return 'Register ' . $url;
    }
}