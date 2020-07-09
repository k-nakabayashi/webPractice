<?php
namespace App\Responder\Admin;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Facades\Auth as UserModel;
use  App\Responder\InterfaceResponder;

class PostResponder implements InterfaceResponder {

    protected $response;
    protected $view;
    protected $data;

    public function __construct(Response $response, ViewFactory $veiw) {
        $this->response = $response;
        $this->view =  $veiw;
    }

    public function getResponse(string $path, $data = null) {

        $this->response->setStatusCode(Response::HTTP_OK);
        $this->response->setContent(
            $this->view->make($path, compact('data'))
        );
        return $this->response;

    }
}
