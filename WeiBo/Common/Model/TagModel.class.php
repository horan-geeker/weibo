<?php
/**
 * Created by PhpStorm.
 * User: He
 * Date: 2016/6/1
 * Time: 14:19
 */
namespace Common\Model;

use Think\Model;

class TagModel extends Model\RelationModel
{
    protected $tableName = 'tags';

    protected $_link = [

        'posts' => [
            'class_name'=>'Post',
            'mapping_type'=>self::MANY_TO_MANY,
            'relation_table'=>'post_tags',
            'foreign_key'=>'tag_id',
            'relation_foreign_key'  =>  'post_id',
        ],
    ];
}