<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Test
 *
 * @package App
 * @property string $title
*/
class Test extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'result','created_at'];

   

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
