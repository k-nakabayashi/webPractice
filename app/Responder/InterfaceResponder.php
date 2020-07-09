<?php
namespace App\Responder;

interface InterfaceResponder {

    public function getResponse(string $path, $data = null);
}
