<?php

namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Verify;

class IndexController extends Controller
{
    public function index()
    {
        $img = new Image();
        $img->open('./images/1.jpg');
        $param['width'] = $img->width();
        $param['height'] = $img->height();
        $param['type'] = $img->type();
        $param['mime'] = $img->mime();
        $param['size'] = $img->size();
//        dump($param);
//        $img->crop('0','0',($param['width']-400)/2,($param['height']-400)/2,400,400)->save('./images/3.jpg');
//        $img->thumb('300','300')->save('./images/3.jpg');
//        $img->water('./images/vip-icon.png')->save('./images/3.jpg');
//        $img->text('majialichen.com','./fonts/consola.ttf',20,'#cccccc',Image::IMAGE_WATER_NORTHWEST)->save('./images/3.jpg');

//        dump($_COOKIE);

    }

    public function code()
    {
        $verify = new Verify([
            'length' => 4
        ]);
        $verify->entry();
    }

    public function test()
    {
        $code = I('get.code');
        dump((new Verify())->check($code));
    }

}