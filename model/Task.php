<?php
namespace Model;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $fillable = ['user_name', 'email', 'description', 'completed', 'admin_edited'];
    public $timestamps = false;

    public function getDescriptionPrintAttribute()
    {
        return htmlspecialchars($this->description);
    }
}