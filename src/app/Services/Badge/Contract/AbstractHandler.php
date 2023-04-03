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

    protected function applyBadge($userStatus)
    {
        $availableBadges = $this->getAvailableBadges($userStatus);
        
        $userBadges = $userStatus->user->badges;
        
        $notRecivedBadges = $availableBadges->diff($userBadges);

        if($notRecivedBadges->isEmpty()) return ;
        
        $userStatus->user->badges()->attach($notRecivedBadges);
    }

    abstract protected function getAvailableBadges($userBadges);
}
