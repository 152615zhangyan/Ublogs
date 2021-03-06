<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;


class Artcal_detail extends Model
{	
	//获取文章列表表单
    public $table = 'artical_detail';

    //关联的表的主键
    public $primaryKey = 'id';
    public $timestamps = false;

    //不允许数据表被批量操作的字段
    public $guarded = [];
   
    public function list ()
    {
    	return $this->belongsTo('App\Http\Models\Artical_list','art_id','id');
    }
}
