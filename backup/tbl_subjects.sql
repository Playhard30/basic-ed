/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bed_enrollment

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-05-25 12:06:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subjects`;
CREATE TABLE `tbl_subjects` (
  `subject_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(25) DEFAULT NULL,
  `subject_description` varchar(100) DEFAULT '',
  `grade_level_id` int(12) NOT NULL,
  PRIMARY KEY (`subject_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_subjects
-- ----------------------------
INSERT INTO `tbl_subjects` VALUES ('10', 'KRAP', 'Reading & Phonics', '3');
INSERT INTO `tbl_subjects` VALUES ('11', 'KLAS', 'Language & Spelling', '3');
INSERT INTO `tbl_subjects` VALUES ('12', 'KMAT', 'Mathematics', '3');
INSERT INTO `tbl_subjects` VALUES ('13', 'KFIL', 'Filipino', '3');
INSERT INTO `tbl_subjects` VALUES ('14', 'KHAS', 'Health & Science', '3');
INSERT INTO `tbl_subjects` VALUES ('15', 'KAP', 'Araling Panlipunan', '3');
INSERT INTO `tbl_subjects` VALUES ('16', 'KCE', 'Computer Education', '3');
INSERT INTO `tbl_subjects` VALUES ('17', 'KMAP', 'M.A.P.E.H', '3');
INSERT INTO `tbl_subjects` VALUES ('18', 'KPEN', 'Penmanship', '3');
INSERT INTO `tbl_subjects` VALUES ('19', 'PKRAP', 'Reading & Phonics', '2');
INSERT INTO `tbl_subjects` VALUES ('20', 'PKLAS', 'Language & Spelling', '2');
INSERT INTO `tbl_subjects` VALUES ('21', 'PKMAT', 'Mathematics', '2');
INSERT INTO `tbl_subjects` VALUES ('22', 'PKHAS', 'Health & Science', '2');
INSERT INTO `tbl_subjects` VALUES ('23', 'PKCE', 'Computer Education', '2');
INSERT INTO `tbl_subjects` VALUES ('24', 'PKMAP', 'M.A.P.E.H', '2');
INSERT INTO `tbl_subjects` VALUES ('25', 'PKPEN', 'Penmanship', '2');
INSERT INTO `tbl_subjects` VALUES ('26', 'NRAP', 'Reading & Phonics', '1');
INSERT INTO `tbl_subjects` VALUES ('27', 'NLAS', 'Language & Spelling', '1');
INSERT INTO `tbl_subjects` VALUES ('28', 'NMAT', 'Mathematics', '1');
INSERT INTO `tbl_subjects` VALUES ('29', 'NHAS', 'Health & Science', '1');
INSERT INTO `tbl_subjects` VALUES ('30', 'NCE', 'Computer Education', '1');
INSERT INTO `tbl_subjects` VALUES ('31', 'NMAP', 'M.A.P.E.H', '1');
INSERT INTO `tbl_subjects` VALUES ('32', 'NPEN', 'Penmanship', '1');
INSERT INTO `tbl_subjects` VALUES ('33', 'G1CA', 'Communication Arts (English)', '4');
INSERT INTO `tbl_subjects` VALUES ('34', 'G1FIL', 'Filipino', '4');
INSERT INTO `tbl_subjects` VALUES ('35', 'G1MT', 'Mother Tongue', '4');
INSERT INTO `tbl_subjects` VALUES ('36', 'G1MAT', 'Mathematics', '4');
INSERT INTO `tbl_subjects` VALUES ('37', 'G1SCI', 'Science', '4');
INSERT INTO `tbl_subjects` VALUES ('38', 'G1AP', 'Araling Panlipunan', '4');
INSERT INTO `tbl_subjects` VALUES ('39', 'G1MAP', 'M.A.P.E.H', '4');
INSERT INTO `tbl_subjects` VALUES ('40', 'G1CL', 'Values Education / Christian Living', '4');
INSERT INTO `tbl_subjects` VALUES ('41', 'G1CE', 'Computer Education', '4');
INSERT INTO `tbl_subjects` VALUES ('42', 'G2CAE', 'Communication Arts (English)', '5');
INSERT INTO `tbl_subjects` VALUES ('43', 'G2CAF', 'Communication Arts (Filipino)', '5');
INSERT INTO `tbl_subjects` VALUES ('44', 'G2MT', 'Mother Tongue', '5');
INSERT INTO `tbl_subjects` VALUES ('45', 'G2MAT', 'Mathematics', '5');
INSERT INTO `tbl_subjects` VALUES ('46', 'G2SCI', 'Science', '5');
INSERT INTO `tbl_subjects` VALUES ('47', 'G2AP', 'Araling Panlipunan', '5');
INSERT INTO `tbl_subjects` VALUES ('48', 'G2MAP', 'M.A.P.E.H', '5');
INSERT INTO `tbl_subjects` VALUES ('49', 'G2CL', 'Values Education / Christian Living', '5');
INSERT INTO `tbl_subjects` VALUES ('50', 'G2CE', 'Computer Education', '5');
INSERT INTO `tbl_subjects` VALUES ('51', 'G3CAE', 'Communication Arts (English)', '6');
INSERT INTO `tbl_subjects` VALUES ('52', 'G3CAF', 'Communication Arts (Filipino)', '6');
INSERT INTO `tbl_subjects` VALUES ('53', 'G3MT', 'Mother Tongue', '6');
INSERT INTO `tbl_subjects` VALUES ('54', 'G3MAT', 'Mathematics', '6');
INSERT INTO `tbl_subjects` VALUES ('55', 'G3SCI', 'Science', '6');
INSERT INTO `tbl_subjects` VALUES ('56', 'G3AP', 'Araling Panlipunan', '6');
INSERT INTO `tbl_subjects` VALUES ('57', 'G3MAP', 'M.A.P.E.H', '6');
INSERT INTO `tbl_subjects` VALUES ('58', 'G3CL', 'Values Education / Christian Living', '6');
INSERT INTO `tbl_subjects` VALUES ('59', 'G3CE', 'Computer Education', '6');
INSERT INTO `tbl_subjects` VALUES ('60', 'G4CAE', 'Communication Arts (English)', '7');
INSERT INTO `tbl_subjects` VALUES ('61', 'G4CAF', 'Communication Arts (Filipino)', '7');
INSERT INTO `tbl_subjects` VALUES ('62', 'G4MAT', 'Mathematics', '7');
INSERT INTO `tbl_subjects` VALUES ('63', 'G4SCI', 'Science', '7');
INSERT INTO `tbl_subjects` VALUES ('64', 'G4AP', 'Araling Panlipunan', '7');
INSERT INTO `tbl_subjects` VALUES ('65', 'G4HEL', 'H.E.L.E', '7');
INSERT INTO `tbl_subjects` VALUES ('66', 'G4MAP', 'M.A.P.E.H', '7');
INSERT INTO `tbl_subjects` VALUES ('67', 'G4CL', 'Values Education / Christian Living', '7');
INSERT INTO `tbl_subjects` VALUES ('68', 'G4CE', 'Computer Education', '7');
INSERT INTO `tbl_subjects` VALUES ('69', 'G5CAE', 'Communication Arts (English)', '8');
INSERT INTO `tbl_subjects` VALUES ('70', 'G5CAF', 'Communication Arts (Filipino)', '8');
INSERT INTO `tbl_subjects` VALUES ('71', 'G5MAT', 'Mathematics', '8');
INSERT INTO `tbl_subjects` VALUES ('72', 'G5SCI', 'Science', '8');
INSERT INTO `tbl_subjects` VALUES ('73', 'G5AP', 'Araling Panlipunan', '8');
INSERT INTO `tbl_subjects` VALUES ('74', 'G5HEL', 'H.E.L.E', '8');
INSERT INTO `tbl_subjects` VALUES ('75', 'G5MAP', 'M.A.P.E.H', '8');
INSERT INTO `tbl_subjects` VALUES ('76', 'G5CL', 'Values Education / Christian Living', '8');
INSERT INTO `tbl_subjects` VALUES ('77', 'G5CE', 'Computer Education', '8');
INSERT INTO `tbl_subjects` VALUES ('78', 'G6CAE', 'Communication Arts (English)', '9');
INSERT INTO `tbl_subjects` VALUES ('79', 'G6CAF', 'Communication Arts (Filipino)', '9');
INSERT INTO `tbl_subjects` VALUES ('80', 'G6MAT', 'Mathematics', '9');
INSERT INTO `tbl_subjects` VALUES ('81', 'G6SCI', 'Science', '9');
INSERT INTO `tbl_subjects` VALUES ('82', 'G6AP', 'Araling Panlipunan', '9');
INSERT INTO `tbl_subjects` VALUES ('83', 'G6HEL', 'H.E.L.E', '9');
INSERT INTO `tbl_subjects` VALUES ('84', 'G6MAP', 'M.A.P.E.H', '9');
INSERT INTO `tbl_subjects` VALUES ('85', 'G6CL', 'Values Education / Christian Living', '9');
INSERT INTO `tbl_subjects` VALUES ('86', 'G6CE', 'Computer Education', '9');
INSERT INTO `tbl_subjects` VALUES ('87', 'G7CAE', 'Communication Arts (English)', '10');
INSERT INTO `tbl_subjects` VALUES ('88', 'G7CAF', 'Communication Arts (Filipino)', '10');
INSERT INTO `tbl_subjects` VALUES ('89', 'G7MAT', 'Mathematics', '10');
INSERT INTO `tbl_subjects` VALUES ('90', 'G7SCI', 'Science', '10');
INSERT INTO `tbl_subjects` VALUES ('91', 'G7AP', 'Araling Panlipunan', '10');
INSERT INTO `tbl_subjects` VALUES ('92', 'G7HEL', 'H.E.L.E', '10');
INSERT INTO `tbl_subjects` VALUES ('93', 'G7CL', 'Values Education / Christian Living', '10');
INSERT INTO `tbl_subjects` VALUES ('94', 'G7CE', 'Computer Education', '10');
INSERT INTO `tbl_subjects` VALUES ('95', 'G7EES', 'Elective (Environmental Science)', '10');
INSERT INTO `tbl_subjects` VALUES ('96', 'G7EA', 'Elective (Algebra)', '10');
INSERT INTO `tbl_subjects` VALUES ('97', 'G7S', 'Scouting', '10');
INSERT INTO `tbl_subjects` VALUES ('98', 'G8CAE', 'Communication Arts (English)', '11');
INSERT INTO `tbl_subjects` VALUES ('99', 'G8CAF', 'Communication Arts (Filipino)', '11');
INSERT INTO `tbl_subjects` VALUES ('100', 'G8MAT', 'Mathematics', '11');
INSERT INTO `tbl_subjects` VALUES ('101', 'G8SCI', 'Science', '11');
INSERT INTO `tbl_subjects` VALUES ('102', 'G8AP', 'Araling Panlipunan', '11');
INSERT INTO `tbl_subjects` VALUES ('103', 'G8HEL', 'H.E.L.E', '11');
INSERT INTO `tbl_subjects` VALUES ('104', 'G8MAP', 'M.A.P.E.H', '11');
INSERT INTO `tbl_subjects` VALUES ('105', 'G8CL', 'Values Education / Christian Living', '11');
INSERT INTO `tbl_subjects` VALUES ('106', 'G8CE', 'Computer Education', '11');
INSERT INTO `tbl_subjects` VALUES ('107', 'G9CAE', 'Communication Arts (English)', '12');
INSERT INTO `tbl_subjects` VALUES ('108', 'G9CAF', 'Communication Arts (Filipino)', '12');
INSERT INTO `tbl_subjects` VALUES ('109', 'G9MAT', 'Mathematics', '12');
INSERT INTO `tbl_subjects` VALUES ('110', 'G9SCI', 'Science', '12');
INSERT INTO `tbl_subjects` VALUES ('111', 'G9AP', 'Araling Panlipunan', '12');
INSERT INTO `tbl_subjects` VALUES ('112', 'G9HEL', 'H.E.L.E', '12');
INSERT INTO `tbl_subjects` VALUES ('113', 'G9MAP', 'M.A.P.E.H', '12');
INSERT INTO `tbl_subjects` VALUES ('114', 'G9CL', 'Values Education / Christian Living', '12');
INSERT INTO `tbl_subjects` VALUES ('115', 'G9CE', 'Computer Education', '12');
INSERT INTO `tbl_subjects` VALUES ('116', 'G10CAE', 'Communication Arts (English)', '13');
INSERT INTO `tbl_subjects` VALUES ('117', 'G10CAF', 'Communication Arts (Filipino)', '13');
INSERT INTO `tbl_subjects` VALUES ('118', 'G10MAT', 'Mathematics', '13');
INSERT INTO `tbl_subjects` VALUES ('119', 'G10SCI', 'Science', '13');
INSERT INTO `tbl_subjects` VALUES ('120', 'G10AP', 'Araling Panlipunan', '13');
INSERT INTO `tbl_subjects` VALUES ('121', 'G10TLE', 'Technology and Livelihood Economics', '13');
INSERT INTO `tbl_subjects` VALUES ('122', 'G10MAP', 'M.A.P.E.H', '13');
INSERT INTO `tbl_subjects` VALUES ('123', 'G10CL', 'Values Education / Christian Living', '13');
INSERT INTO `tbl_subjects` VALUES ('124', 'G10CE', 'Computer Education', '13');
INSERT INTO `tbl_subjects` VALUES ('125', 'G10CAT', 'CITIZEN ARMY TRAINING', '13');
