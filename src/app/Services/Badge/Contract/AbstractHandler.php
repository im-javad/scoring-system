<?PhP 
namespace App\Services\Badge\Contract;

use App\Models\UserStatus;

abstract class AbstractHandler implements InterfaceHandler{
    protected $nextHandler;
    
    public function setNextHandler(InterfaceHandler $handler)
    {
        $this->nextHandler = $handler;

        return $handler;
    }
    
    public function handle(UserStatus $userStatus)
    {
        if($this->nextHandler) return $this->nextHandler->handle($userStatus);

        return ;
    }
}
