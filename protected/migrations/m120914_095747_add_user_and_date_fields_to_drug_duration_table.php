<?php

class m120914_095747_add_user_and_date_fields_to_drug_duration_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('drug_duration','last_modified_user_id','int(10) unsigned NOT NULL DEFAULT 1');
		$this->addColumn('drug_duration','last_modified_date','datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'');
		$this->addForeignKey('drug_duration_last_modified_user_id_fk','drug_duration','last_modified_user_id','user','id');
		$this->addColumn('drug_duration','created_user_id','int(10) unsigned NOT NULL DEFAULT 1');
		$this->addForeignKey('drug_duration_created_user_id_fk','drug_duration','created_user_id','user','id');
		$this->addColumn('drug_duration','created_date','datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'');
	}

	public function down()
	{
		$this->dropForeignKey('drug_duration_created_user_id_fk','drug_duration');
		$this->dropForeignKey('drug_duration_last_modified_user_id_fk','drug_duration');
		$this->dropColumn('drug_duration','created_date');
		$this->dropColumn('drug_duration','created_user_id');
		$this->dropColumn('drug_duration','last_modified_date');
		$this->dropColumn('drug_duration','last_modified_user_id');
	}
}
