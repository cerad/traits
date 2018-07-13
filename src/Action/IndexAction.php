<?php

namespace App\Action;


use App\Core\RouterTrait;
use App\Core\SecurityTrait;
use Symfony\Component\HttpFoundation\Response;

class IndexAction implements ActionInterface
{
    use RouterTrait;
    use SecurityTrait;

    public function __invoke()
    {
        $granted = $this->isGranted('ROLE_USER');
        $granted = $granted ? 'Granted' : 'Not Granted';

        $url = $this->generateUrl('test');

        $html = <<<EOT
<!DOCTYPE html>
<html>
  <head><title>Traits</title></head>
  <body><div>Index Action {$url} {$granted}</div></body>
</html>
EOT;

        return new Response($html);
    }
}