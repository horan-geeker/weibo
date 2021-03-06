<?php

use Phinx\Migration\AbstractMigration;

class Think extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $users = $this->table('users');
        $users->addColumn('username', 'string', array('limit' => 20))
            ->addColumn('password', 'string', array('limit' => 40))
            ->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('first_name', 'string', array('limit' => 30))
            ->addColumn('last_name', 'string', array('limit' => 30))
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->addIndex(array('username', 'email'), array('unique' => true))
            ->create();

        $posts = $this->table('posts');
        $posts->addColumn('user_id', 'integer', array('signed' => true))
            ->addColumn('title', 'string', array('limit' => 40))
            ->addColumn('content', 'string', array('limit' => 100))
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->addForeignKey('user_id','users','id')
            ->create();

        $tags = $this->table('tags');
        $tags->addColumn('name', 'string', array('limit' => 40))
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->create();

        $table = $this->table('post_tags');
        $table->addColumn('tag_id', 'integer',['signed'=>true])
            ->addColumn('post_id', 'integer',['signed'=>true])
            ->addForeignKey('tag_id','tags','id')
            ->addForeignKey('post_id','posts','id')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->create();

        $table = $this->table('roles');
        $table->addColumn('name', 'string')
            ->addColumn('description', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->addIndex(array('name'), array('unique' => true))
            ->create();

        $admins = $this->table('admins');
        $admins->addColumn('name', 'string', array('limit' => 20))
            ->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('password', 'string', array('limit' => 40))
            ->addColumn('role_id', 'integer', array('signed' => true))
            ->addForeignKey('role_id','roles','id')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->addIndex(array('email'), array('unique' => true))
            ->create();

        $table = $this->table('permissions');
        $table->addColumn('name', 'string')
            ->addColumn('description', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->addIndex(array('name'), array('unique' => true))
            ->create();

        $table = $this->table('role_permissions');
        $table->addColumn('role_id', 'integer',['signed'=>true])
            ->addColumn('permission_id', 'integer',['signed'=>true])
            ->addForeignKey('role_id','roles','id')
            ->addForeignKey('permission_id','permissions','id')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', array('null' => true))
            ->create();
    }

}
