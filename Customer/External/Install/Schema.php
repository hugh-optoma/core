<?php
namespace Df\Customer\External\Install;
use Magento\Framework\DB\Adapter\Pdo\Mysql as Adapter;
use Magento\Framework\DB\Adapter\AdapterInterface as IAdapter;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
abstract class Schema implements InstallSchemaInterface {
	/**
	 * 2016-06-04
	 * @used-by \Df\Customer\External\InstallSchema::install()
	 * @return string
	 */
	abstract public function fId();

	/**
	 * 2016-06-04
	 * @used-by \Df\Customer\External\InstallSchema::install()
	 * @return string
	 */
	abstract public function fName();

	/**
	 * 2015-10-06
	 * @override
	 * @see InstallSchemaInterface::install()
	 * @param SchemaSetupInterface $setup
	 * @param ModuleContextInterface $context
	 * @return void
	 */
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$setup->startSetup();
		$this->_conn = $setup->getConnection();
		// 2015-10-10
		// Не хочу проблем из-за идиотов с длинными именами, поэтому пусть будет 255.
		$this->column($this->fName(), 'varchar(255) DEFAULT NULL');
		// 2016-06-04
		// Идентификатор может быть длинным, например «amzn1.account.AGM6GZJB6GO42REKZDL33HG7GEJA»
		$this->column($this->fId(), 'varchar(255) DEFAULT NULL');
		$this->_install();
		$setup->endSetup();
	}

	/**
	 * 2016-06-05
	 * @param string $name
	 * @param string $definition
	 * @return void
	 */
	protected function column($name, $definition) {
		$this->_conn->addColumn($this->table(), $name, $definition);
	}

	/**
	 * 2016-06-05
	 * @return string
	 */
	private function table() {
		if (!isset($this->{__METHOD__})) {
			$this->{__METHOD__} = df_table('customer_entity');
		}
		return $this->{__METHOD__};
	}

	/**
	 * 2016-06-05
	 * @used-by \Df\Customer\External\Install\Schema::conn()
	 * @used-by \Df\Customer\External\Install\Schema::install()
	 * @var Adapter|IAdapter
	 */
	private $_conn;

	/**
	 * 2016-06-05
	 * @used-by \Df\Customer\External\Install\Schema::install()
	 * @see \Dfe\FacebookLogin\Setup\InstallSchema::_install()
	 * @return void
	 */
	protected function _install() {}
}