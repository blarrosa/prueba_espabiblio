#Probado el 11/oct/2014
ALTER TABLE %prfx%member ADD COLUMN cel varchar(15) DEFAULT NULL;
ALTER TABLE %prfx%member ADD COLUMN pass_user char(32) DEFAULT NULL;
ALTER TABLE %prfx%member ADD COLUMN born_dt date NOT NULL;
ALTER TABLE %prfx%member ADD COLUMN other text DEFAULT NULL;
UPDATE %prfx%member SET last_activity_dt=NOW();
ALTER TABLE %prfx%lookup_hosts CHANGE pw context VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE %prfx%lookup_hosts ADD pw VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER user ;
ALTER TABLE %prfx%lookup_hosts CHANGE `charset` `schema` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '';
ALTER TABLE %prfx%biblio CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_copy CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_copy_fields CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_copy_fields_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_field CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_hold CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_status_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%biblio_status_hist CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%cdd CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%cdu CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%checkout_privs CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%collection_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%cover_options CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%cutter CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%ibic CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%lookup_hosts CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%lookup_settings CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%material_type_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%material_usmarc_xref CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%mbr_classify_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%member CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;	
ALTER TABLE %prfx%member_account CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%member_fields CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;	
ALTER TABLE %prfx%member_fields_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER TABLE %prfx%session CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;	
ALTER TABLE %prfx%settings CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%staff CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%theme CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%transaction_type_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%usmarc_block_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%usmarc_indicator_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%usmarc_subfield_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;		
ALTER TABLE %prfx%usmarc_tag_dm CHARACTER SET utf8, COLLATE utf8_general_ci, ENGINE = MYISAM;
ALTER DATABASE %prfx% DEFAULT CHARACTER SET utf8  COLLATE utf8_general_ci;