<?PhP 
namespace App\Services\Badge;

use App\Models\UserStatus;

class ApplierBadges{
    public function run(UserStatus $userStatus)
    {
        $xpHandler = resolve(XpHandler::class);
        
        $xpHandler->handle($userStatus);
    }
}
