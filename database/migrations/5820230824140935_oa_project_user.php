<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class OaProjectUser extends Migrator
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
        $table = $this->table('project_user', ['engine' => 'InnoDB', 'collation' => 'utf8mb4_0900_ai_ci', 'comment' => '项目成员表' ,'id' => 'id','signed' => true ,'primary_key' => ['id']]);
        $table->addColumn('uid', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => false,'comment' => '项目成员id',])
			->addColumn('project_id', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => null,'signed' => false,'comment' => '关联项目id',])
			->addColumn('admin_id', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => false,'comment' => '创建人',])
			->addColumn('create_time', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => false,'comment' => '创建时间',])
			->addColumn('delete_time', 'integer', ['limit' => MysqlAdapter::INT_REGULAR,'null' => false,'default' => 0,'signed' => false,'comment' => '移除时间',])
            ->create();
    }
}
