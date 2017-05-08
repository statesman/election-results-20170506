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

 Date: 11/10/2016 16:12:20 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `Travis_20161108`
-- ----------------------------
DROP TABLE IF EXISTS `Travis_20161108`;
CREATE TABLE `Travis_20161108` (
  `Precinct_name` varchar(255) DEFAULT NULL,
  `Split_name` varchar(255) DEFAULT NULL,
  `Reporting_flag` int(11) DEFAULT NULL,
  `Update_count` int(11) DEFAULT NULL,
  `Pct_Id` int(11) DEFAULT NULL,
  `Pct_seq_nbr` int(11) DEFAULT NULL,
  `Reg_voters` int(11) DEFAULT NULL,
  `Turn_Out` float DEFAULT NULL,
  `Contest_Id` int(11) DEFAULT NULL,
  `Contest_seq_nbr` int(11) DEFAULT NULL,
  `Contest_title` varchar(255) DEFAULT NULL,
  `Contest_party_name` varchar(255) DEFAULT NULL,
  `Selectable_Options` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `candidate_name` varchar(255) DEFAULT NULL,
  `Candidate_Type` varchar(255) DEFAULT NULL,
  `cand_seq_nbr` int(11) DEFAULT NULL,
  `Party_Code` varchar(255) DEFAULT NULL,
  `total_ballots` int(11) DEFAULT NULL,
  `total_votes` int(11) DEFAULT NULL,
  `total_under_votes` int(11) DEFAULT NULL,
  `total_over_votes` int(11) DEFAULT NULL,
  `absentee_ballots` int(11) DEFAULT NULL,
  `absentee_votes` int(11) DEFAULT NULL,
  `absentee_under_votes` int(11) DEFAULT NULL,
  `absentee_over_votes` int(11) DEFAULT NULL,
  `early_ballots` int(11) DEFAULT NULL,
  `early_votes` int(11) DEFAULT NULL,
  `early_under_votes` int(11) DEFAULT NULL,
  `early_over_votes` int(11) DEFAULT NULL,
  `election_ballots` int(11) DEFAULT NULL,
  `election_votes` int(11) DEFAULT NULL,
  `election_under_votes` int(11) DEFAULT NULL,
  `election_over_votes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
