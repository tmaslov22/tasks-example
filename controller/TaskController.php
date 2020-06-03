<?php

namespace Controller;

use Core\Helper;
use Illuminate\Http\Request;
use Model\Task;

class TaskController extends BaseController
{
    function create(Request $request)
    {
        $task = new Task();

        $task->user_name = $request->get('user_name');
        $task->email = $request->get('email');
        $task->description = $request->get('description');

        $task->save();
        echo 'Вы добавили новый таск! Ожидайте загрузки..';
        $url = $_SERVER['HTTP_REFERER'];
        header( "Refresh:1; url=$url", true, 303);
        exit();
    }

    function edit(Request $request, $id)
    {
        $this->checkAuth();
        $task = Task::findOrFail($id);
        $task->update([
            'description' => $request->post('description'),
            'completed' => $request->boolean('completed')
        ]);
        echo 'Вы изменили таск';
        Helper::redirectBack();
    }

    function editForm($id)
    {
        $this->checkAuth();
        $task = Task::findOrFail($id);
        ob_start();
        require __DIR__ . '/../view/edit_form.php';
        echo ob_get_clean();
    }

    private function checkAuth()
    {
        if(!isset($_SESSION['is_admin'])) {
            echo '403 error. Вам нужно зайти как администратор.';
            exit();
        }
    }
}