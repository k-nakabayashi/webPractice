<?


namespace App\Responder;

use Illuminate\Http\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Facades\Auth as UserModel;

class PostResponder implements InterfaceResponder {

    protected $response;
    protected $view;
    protected $data;

    public function __construct(Response $response, ViewFactory $veiw, $data = null) {
        $this->response = $response;
        $this->view =  $veiw;
        $this->data = $data;
    }

    public function __invoke() {

        $this->response->setStatusCode(Response::HTTP_OK);

        return $this->response;

    }
}
