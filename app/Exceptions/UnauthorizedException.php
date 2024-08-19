<?php

namespace App\Exceptions;

class UnauthorizedException extends BusinessException
{
    public static function forPermissions(array $permissions): self
    {
        $permStr = implode(', ', $permissions);
        $message = 'Seu login não possui permissão para acessar esta área. As permissões necessárias são '.$permStr;

        $exception = new static(403, $message, null, []);
        $exception->requiredPermissions = $permissions;

        return $exception;
    }

    public static function forLicense(): self
    {
        $message = 'Sua Licença está expirada, acesse o menu Configurações / Financeiro / Assinatura do sistema para regularizar e ter acesso a todas as funções!';

        $exception = new static(403, $message, null, []);

        return $exception;
    }

    public static function notLoggedIn(): self
    {
        $message = 'Efetue login para continuar.';
        return new static(401, $message, null, []);
    }

}
