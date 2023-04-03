<?PhP 
namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserStatus;
use App\Services\Badge\Contract\AbstractHandler;

class XpHandler extends AbstractHandler{
    public function handle(UserStatus $userStatus)
    {
        if($userStatus->isDirty('xp_count')) $this->applyBadge($userStatus);

        parent::handle($userStatus);
    }

    protected function getAvailableBadges($userStatus)
    {
        return Badge::Xp()->where('required_points' , '<=' , $userStatus->xp_count)->get();
    }
}
