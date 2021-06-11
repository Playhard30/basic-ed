/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bed_enrollment

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-10 20:29:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_online_reg`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_online_reg`;
CREATE TABLE `tbl_online_reg` (
  `or_id` int(10) NOT NULL AUTO_INCREMENT,
  `stud_type` varchar(100) NOT NULL,
  `grade_level_id` int(20) NOT NULL,
  `strand_id` int(20) DEFAULT NULL,
  `lrn` varchar(100) NOT NULL,
  `student_lname` varchar(100) NOT NULL DEFAULT '',
  `student_fname` varchar(100) NOT NULL DEFAULT '',
  `student_mname` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL,
  `date_birth` varchar(100) NOT NULL,
  `place_birth` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender_id` int(10) DEFAULT NULL,
  `nationality` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `cellphone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `focc` varchar(100) NOT NULL,
  `fcontact` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `mocc` varchar(100) NOT NULL,
  `mcontact` varchar(100) NOT NULL,
  `month_inc` varchar(100) NOT NULL,
  `no_siblings` varchar(100) NOT NULL,
  `guardname` varchar(100) NOT NULL,
  `gaddress` varchar(100) NOT NULL,
  `gcontact` varchar(100) NOT NULL,
  `last_sch` varchar(100) NOT NULL,
  `prev_grade_level` varchar(100) NOT NULL,
  `sch_year` varchar(100) NOT NULL,
  `sch_address` varchar(100) NOT NULL,
  `academic_year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `remark` varchar(50) DEFAULT '',
  PRIMARY KEY (`or_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_online_reg
-- ----------------------------
