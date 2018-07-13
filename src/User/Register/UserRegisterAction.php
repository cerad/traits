<?php
/**
 * Created by PhpStorm.
 * User: ahundiak
 * Date: 7/13/18
 * Time: 2:26 PM
 */

namespace App\User\Register;


use Cerad\Core\ActionInterface;
use Symfony\Component\HttpFoundation\Response;

class UserRegisterAction implements ActionInterface
{
    public function __invoke(UserRegisterForm $form)
    {
        return new Response($form->render());
    }
}