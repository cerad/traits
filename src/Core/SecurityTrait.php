<?php

namespace App\Core;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

trait SecurityTrait
{
    /** @var AuthorizationCheckerInterface */
    protected $authChecker;

    /**
     * @param AuthorizationCheckerInterface $authChecker
     * @required
     */
    public function setAuthChecker(AuthorizationCheckerInterface $authChecker)
    {
        $this->authChecker = $authChecker;
    }
    protected function isGranted($attributes, $subject = null): bool
    {
        return $this->authChecker->isGranted($attributes, $subject);
    }
    protected function denyAccessUnlessGranted($attributes, $subject = null, string $message = 'Access Denied.')
    {
        if (!$this->isGranted($attributes, $subject)) {
            $exception = $this->createAccessDeniedException($message);
            $exception->setAttributes($attributes);
            $exception->setSubject($subject);

            throw $exception;
        }
    }
    protected function createNotFoundException(string $message = 'Not Found', \Exception $previous = null): NotFoundHttpException
    {
        return new NotFoundHttpException($message, $previous);
    }
    protected function createAccessDeniedException(string $message = 'Access Denied.', \Exception $previous = null): AccessDeniedException
    {
        return new AccessDeniedException($message, $previous);
    }
}