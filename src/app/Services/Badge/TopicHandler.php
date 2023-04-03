<?PhP 
namespace App\Services\Badge;

use App\Models\Badge;
use App\Models\UserStatus;
use App\Services\Badge\Contract\AbstractHandler;

class TopicHandler extends AbstractHandler{
    public function handle(UserStatus $userStatus)
    {
        if($userStatus->isDirty('topic_count')) $this->applyBadge($userStatus);

        parent::handle($userStatus);
    }

    protected function getAvailableBadges($userStatus)
    {
        return Badge::Topic()->where('required_points' , '<=' , $userStatus->topic_count)->get();
    }
}
