<?PhP 
namespace App\Services\Badge;

use App\Models\UserStatus;

class ApplierBadges{
    public function run(UserStatus $userStatus)
    {
        $xpHandler = resolve(XpHandler::class);
        
        $topicHandler = resolve(TopicHandler::class);

        $replyHandler = resolve(ReplyHandler::class);

        $xpHandler->setNextHandler($topicHandler)->setNextHandler($replyHandler);

        $xpHandler->handle($userStatus);
    }
}
