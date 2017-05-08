/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50628
 Source Host           : localhost
 Source Database       : election

 Target Server Type    : MySQL
 Target Server Version : 50628
 File Encoding         : utf-8

 Date: 11/10/2016 16:12:42 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `williamson_20161108`
-- ----------------------------
DROP TABLE IF EXISTS `williamson_20161108`;
CREATE TABLE `williamson_20161108` (
  `contest_id` int(11) DEFAULT NULL,
  `candidate_number` int(11) DEFAULT NULL,
  `precinct_name` int(11) DEFAULT NULL,
  `registered_voters` int(11) DEFAULT NULL,
  `number_votes` int(11) DEFAULT NULL,
  `votes_group_1` int(11) DEFAULT NULL,
  `votes_group_2` int(11) DEFAULT NULL,
  `votes_group_3` int(11) DEFAULT NULL,
  `votes_group_4` int(11) DEFAULT NULL,
  `votes_group_5` int(11) DEFAULT NULL,
  `party_code` varchar(255) DEFAULT NULL,
  `district_type_id` varchar(255) DEFAULT NULL,
  `district_code` varchar(255) DEFAULT NULL,
  `Contest_title` varchar(255) DEFAULT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `precinct` varchar(255) DEFAULT NULL,
  `district_name` varchar(255) DEFAULT NULL,
  `votes_allowed` int(11) DEFAULT NULL,
  `referendum_flag` varchar(255) DEFAULT NULL,
  `cr_code` varchar(255) DEFAULT NULL,
  `lf_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
