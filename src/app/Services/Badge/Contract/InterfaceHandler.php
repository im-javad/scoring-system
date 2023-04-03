<?PhP 
namespace App\Services\Badge\Contract;

use App\Models\UserStatus;

interface InterfaceHandler{
    public function setNextHandler(InterfaceHandler $handler);
    public function handle(UserStatus $userStatus);
}
