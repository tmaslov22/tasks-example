<form action="/task/<?=$task->id?>" method="post">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="completed" id="defaultCheck1" <?=$task->completed ?'checked':''?>>
        <label class="form-check-label" for="defaultCheck1">
            Выполнил
        </label>
    </div>
    <div class="form-group">
        <label for="description">Текст</label>
        <textarea class="form-control" id="description" rows="3" name="description" required><?=$task->descriptionPrint?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>