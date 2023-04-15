<?php

if(!function_exists('checkSlug')){

    function checkSlug($model,$id)
    {
        return app('\\App\\Models\\'.$model)::where('id',$id)->first()->id;
    }

}

if(!function_exists('checkApp')){

    function checkApp($model,$id)
    {
        return $model::where('id',$id)->first()->id;
    }
    
}

?>
