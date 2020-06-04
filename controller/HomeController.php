<?php
namespace Controller;

use Core\Helper;
use Illuminate\Http\Request;
use Model\Task;

class HomeController extends BaseController
{
    function home(Request $request)
    {

        $orderBy = 'id';
        if (isset($_SESSION['order_by'])) {
            $orderBy = $_SESSION['order_by'];
        }

        $order_type= 'asc';

        if(isset($_SESSION['order_desc'])) {
            $order_type = 'desc';
        }

        $tasks = Task::orderBy($orderBy, $order_type)->paginate(3);
        $isAdmin = isset($_SESSION['is_admin']);

        $paginator = $tasks->toArray();
        $next = $paginator['next_page_url'];
        $prev = $paginator['prev_page_url'];

        ob_start();
        require __DIR__ . '/../view/home.php';
        echo ob_get_clean();
    }

    function auth(Request $request)
    {
        $url = 'http://'.$_SERVER['HTTP_HOST'];
        header( "Refresh:1; url=$url", true, 303);
        if($request->post('login') == 'admin' && $request->post('password') == '123') {
            $_SESSION['is_admin'] = true;
            echo 'Вы успешно вошли! Ожидайте перезагрузку..';
        } else {
            echo 'Ошибка логина или пароля... Ожидайте перезагрузку..';
        }
        exit();
    }

    function signOut() {
        unset($_SESSION['is_admin']);
        Helper::redirectToHome();
    }

    function changeOrderBy(Request $request) {

        $by = $request->post('by');
        if(!in_array($by, ['user_name', 'email', 'completed'])) {
            echo 'Unknown order by '; exit();
        }

        if(isset($_SESSION['order_by'])) {
            if($_SESSION['order_by'] == $by) {
                if(isset($_SESSION['order_desc'])) {
                    unset($_SESSION['order_desc']);
                } else {
                    $_SESSION['order_desc'] = true;
                }
            }
        }

        $_SESSION['order_by'] = $by;


        Helper::redirectBack(0);
    }
}