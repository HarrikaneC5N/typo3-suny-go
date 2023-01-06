#
# Table structure for table 'tx_eannuaires_domain_model_fiche'
#

CREATE TABLE tx_excellent_domain_model_product (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

    name varchar(255) DEFAULT '' NOT NULL,
    description text NOT NULL,
    quantity int(11) DEFAULT '0' NOT NULL,
                
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)
);

CREATE TABLE tx_sjroffers_domain_model_organization (
   uid int(11) unsigned DEFAULT 0 NOT NULL auto_increment,
   pid int(11) DEFAULT 0 NOT NULL,

   name varchar(255) NOT NULL,
   address text NOT NULL,
   telephone_number varchar(80) NOT NULL,
   telefax_number varchar(80) NOT NULL,
   url varchar(80) NOT NULL,
   email_address varchar(80) NOT NULL,
   description text NOT NULL,
   image varchar(255) NOT NULL,
   contacts int(11) NOT NULL,
   offers int(11) NOT NULL,
   administrator int(11) NOT NULL,

   tstamp int(11) unsigned DEFAULT 0 NOT NULL,
   crdate int(11) unsigned DEFAULT 0 NOT NULL,
   deleted tinyint(4) unsigned DEFAULT 0 NOT NULL,
   hidden tinyint(4) unsigned DEFAULT 0 NOT NULL,
   sys_language_uid int(11) DEFAULT 0 NOT NULL,
   l18n_parent int(11) DEFAULT 0 NOT NULL,
   l18n_diffsource mediumblob NOT NULL,
   fe_group int(11) DEFAULT 0 NOT NULL,

   PRIMARY KEY (uid),
   KEY parent (pid),
);


--
-- name varchar(29) NOT NULL,
--    quality int(2) NOT NULL,
--