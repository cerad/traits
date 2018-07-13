<?php

namespace App\Controller;


use App\Core\RouterTrait;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    use RouterTrait;

    public function index()
    {
        $url = $this->generateUrl('test');

        $html = <<<EOT
<!DOCTYPE html>
<html>
  <head><title>Traits</title></head>
  <body><div>Traits Content {$url}</div></body>
</html>
EOT;

        return new Response($html);
    }
}