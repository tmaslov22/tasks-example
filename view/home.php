<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>


<div class="container pt-5">
    <div class="text-right">
    <?php if(!$isAdmin) { ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
            Войти в админку
        </button>
    <?php } else { ?>
        <a class="link" href="/sign-out">Выйти из админки</a>
    <?php } ?>
    </div>
<h1>Таски</h1>
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addTask">
        Добавить таск
    </button>
<div class="row">
    <div class="col-12">сортировки по
        <a href="/change-order-by?by=user_name"><?php if($orderBy == 'user_name') { echo $order_type == 'desc' ? '↑' :'↓'; }?>имени пользователя</a>,
        <a href="/change-order-by?by=email"><?php if($orderBy == 'email') { echo $order_type == 'desc' ? '↑' :'↓'; }?>email</a> и
        <a href="/change-order-by?by=completed"><?php if($orderBy == 'completed') { echo $order_type == 'desc' ? '↑' :'↓'; }?>статусу</a></div>
</div>
<div class="row">
<?php foreach ($tasks as $task) { ?>
<div class="col-4">
    <div class="card " style="width: 18rem;">
        <div class="card-body" data-task="<?=$task->id?>">
            <h5 class="card-title"><?=$task->name?></h5>
            <p class="card-text">Автор: <?=$task->user_name?></p>
            <p class="card-text" data-task-completed="false">Выполнил: <?= $task->completed ?'да':'нет'?></p>
            <? if($task->admin_edited) { ?><p class="card-text">Редакция админа: да</p><? } ?>
            <p class="card-text">Email: <?=$task->email?></p>
            <p class="card-text" data-task-description=""><?=$task->descriptionPrint?></p>
            <?php if ($isAdmin) { ?>
                <button type="button" class="btn btn-outline-primary" data-task-btn="<?=$task->id?>" data-toggle="modal" data-target="#editTask">
                    Редактировать
                </button>
            <?php } ?>
        </div>
    </div>
</div>
<? } ?>
</div>

<div class="row mt-5">
    <div class="col-6"><?= $prev ? "<a href='{$prev}'> <- Туда</a>":'' ?></div>
    <div class="col-6 text-right"><?= $next ? "<a href='{$next}'>Сюда -></a>":'' ?></div>
</div>



</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Войти в админку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/auth/" method="post">
                    <div class="form-group">
                        <label >Login</label>
                        <input type="text" name="login" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input name="password" type="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addTask" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление таска</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/task" method="post">
                    <div class="form-group">
                        <label >Имя</label>
                        <input type="text" name="user_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Текст</label>
                        <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование таска</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" data-task-edit-form="">

            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $('#editTask').on('show.bs.modal', function (e) {
        var task_id = $(e.relatedTarget).data('task-btn');
        $.get('/task-edit-form/' + task_id, function(result) {
            $('[data-task-edit-form]').html(result);
        }).fail(function() {
            alert( "error" );
        });
    })

    $('#editTask').on('hidden.bs.modal', function (e) {
        $('[data-task-edit-form]').html('');
    })
</script>
</body>
</html>
