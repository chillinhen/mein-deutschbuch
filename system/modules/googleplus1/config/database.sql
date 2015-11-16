-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************

-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `googleplusone_count` char(1) NOT NULL default '', 
  `googleplusone_differenthref` char(1) NOT NULL default '',
  `googleplusone_href` varchar(255) NOT NULL default '',
  `googleplusone_size` char(1) NOT NULL default 'd',
  `googleplusone_loading` char(1) NOT NULL default '',
  `googleplusone_language` varchar(255) NOT NULL default ''
) ENGINE=MyISAM default CHARSET=utf8;

CREATE TABLE `tl_module` (
  `googleplusone_count` char(1) NOT NULL default '', 
  `googleplusone_differenthref` char(1) NOT NULL default '',
  `googleplusone_href` varchar(255) NOT NULL default '',
  `googleplusone_size` char(1) NOT NULL default 'd',
  `googleplusone_loading` char(1) NOT NULL default '',
  `googleplusone_language` varchar(255) NOT NULL default ''
) ENGINE=MyISAM default CHARSET=utf8;