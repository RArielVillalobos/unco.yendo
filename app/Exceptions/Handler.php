<?php

namespace App\Exceptions;


use App\Traits\ApiResponser;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //

    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //return parent::render($request, $exception);
        if($exception instanceof ValidationException){
            $this->convertValidationExceptionToResponse($exception,$request);
        }
        if($exception instanceof ModelNotFoundException){
            //las excepciones de tipo ModelNotFoundException nos permite acceder al modelo que no se pudo encontrar

            $model=strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("no existe ninguna instancia  {$model} con el legajo  especificado",404);
        }
        //@ŧodo revistar esta excepción
        if($exception instanceof FatalThrowableError){
            //$model=strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("no existe ninguna instancia con el legajo  especificado",404);
        }
        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }
        if($exception instanceof AuthorizationException){
            return $this->errorResponse('No posee permisos para ejecutar esta acción',403);
        }
        if($exception instanceof NotFoundHttpException){
            return $this->errorResponse('No se encontro la url especificada',404);
        }
        if($exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse('El metodo especificado en la petición no es válido',405);
        }
        //controlaremos de forma general cualquier excepcion http
        //controlaremos cualquier otra excepcion
        if($exception instanceof HttpException){
            return $this->errorResponse($exception->getMessage(),$exception->getCode());
        }
        //Excepcion de tipo QueryException(por ej se quiere eliminar un regostrp de la bd que esta relacionado a otro)
        if($exception instanceof QueryException){
            //dd($exception);
            $codigo=$exception->errorInfo[1];
            if($codigo==1451){
                //como es un conflicto, no se puede realizar la eliminacion debido a otros probleas dentro de sistema, el codigo retornado sera 409
                return $this->errorResponse('No se puede eliminar de forma permanente el recurso,esta relacionado con algún otro',409);
            }
        }
        //si  estamos en debug retornamos la respuesta html tipica
        if(config('app.debug')){
            return parent::render($request, $exception);
        }
        //si estamos en prod solo mostramos mensaje y el codigo
        return $this->errorResponse('Falla inesperada.Intente luego',500);
    }
}
