<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25/08/2018
 * Time: 2:24 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Feedback extends Model{

//
//    const CREATED_AT = 'creation_date';
//    const UPDATED_AT = 'last_update';

    use Notifiable;

    protected $fillable = ['text'];
    protected $table = 'feedbacks';
    public function user(){
        return $this->belongsTo("App\User");
    }
}