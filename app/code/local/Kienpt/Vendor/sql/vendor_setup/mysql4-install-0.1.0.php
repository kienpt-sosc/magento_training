<?php
// echo "Running This Upgrad: ".get_class($this)."\n <br/> \n";
$installer = $this;
$installer->startSetup();
$installer->run("
	DROP TABLE `kienpt_vendor`;
    CREATE TABLE `{$installer->getTable('kienpt_vendor')}` (
      `vendor_id` int(11) NOT NULL auto_increment,
      `name` varchar(50) NOT NULL,
      `email` varchar(100) NOT NULL,
      `address` text NOT NULL,
      `contact` varchar(20) NOT NULL,
      `description` text NOT NULL,
      PRIMARY KEY  (`vendor_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;    
");
$installer->endSetup();