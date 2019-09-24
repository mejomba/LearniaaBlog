<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'pk_post';


   public function GetListAllNameColumns_ForTable()
   {
      return  [ 'pk_post' => 'کلید پست',
                'pk_categories' => 'کلید دسته بندی',
                'pk_tags' => 'کلید تگ',
                'title' => 'عنوان',
                'pk_writers' => 'کلید نویسنده',
                'pic_content' => 'تصویر شاخص',
                'status' => 'وضعیت',
                
                ] ;
   }



    public function category()
    {
       return $this->hasOne(Category::class,'pk_categoies');
    }

    public function Tag()
    {
       return $this->hasOne(Tag::class,'pk_tags');
    }

    public function writer()
    {
       return $this->hasOne(User::class,'pk_users','pk_writers');
    }


    

    

   
}
