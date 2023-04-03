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

    protected function getAvailableBadges($userStatus)
    {
        return Badge::Reply()->where('required_points' , '<=' , $userStatus->reply_count)->get();
    }
}