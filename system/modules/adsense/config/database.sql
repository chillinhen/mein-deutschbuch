-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_modules`
-- 

CREATE TABLE `tl_module` (
  `adsense_clientid` varchar(255) NOT NULL default '',
  `adsense_adslot` varchar(255) NOT NULL default '',
  `adsense_height` int(10) NOT NULL default '0',
  `adsense_width` int(10) NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
