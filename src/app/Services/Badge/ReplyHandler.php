<?PhP 
namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserStatus;
use App\Services\Badge\Contract\AbstractHandler;

class ReplyHandler extends AbstractHandler{
    public function handle(UserStatus $userStatus)
    {
        if($userStatus->isDirty('reply_count')) $this->applyBadge($userStatus);

        parent::handle($userStatus);
    }

    public function applyBadge(UserStatus $userStatus)
    {
        $availableBadges = Badge::Reply()->where('required_points' , '<=' , $userStatus->reply_count)->get();

        $userBadges = $userStatus->user->badges;
        
        $notRecivedBadges = $availableBadges->diff($userBadges);

        if($notRecivedBadges->isEmpty()) return ;
        
        $userStatus->user->badges()->attach($notRecivedBadges);
    }
}