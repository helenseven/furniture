/*
 Navicat Premium Data Transfer

 Source Server         : docker
 Source Server Type    : MySQL
 Source Server Version : 50738
 Source Host           : localhost:3307
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50738
 File Encoding         : 65001

 Date: 29/08/2022 16:12:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Sofas');
INSERT INTO `categories` VALUES (2, 'Tables');
INSERT INTO `categories` VALUES (3, 'Lighting');
INSERT INTO `categories` VALUES (4, 'Decor');
INSERT INTO `categories` VALUES (5, 'Garden');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `numberOf` int(11) NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (1, 'Beds', 895.00, 6, 1, 'Orsa', 'Double Ottoman Storage Bed, Oat Cotton & Linen Mix', 'img/item-1.jpg');
INSERT INTO `goods` VALUES (2, 'Tables', 425.00, 2, 2, 'Clover', 'Acacia Wood 22 Bottle Wall Mounted Wine Rack, Natural Ash Wood', 'img/item-2.jpg');
INSERT INTO `goods` VALUES (3, 'Commodes', 170.00, 5, 2, 'Damien', 'Bedside Table, Oak Effect & Black', 'img/item-4.jpg');
INSERT INTO `goods` VALUES (4, 'Shelfs', 78.00, 1, 2, 'Lomond', 'Lift Top Coffee Table with Storage, Mango Wood and Black', 'img/item-3.jpg');
INSERT INTO `goods` VALUES (5, 'Coffee Tables', 360.00, 2, 2, 'Zaragoza', 'Organic Coffee Table, Walnut', 'img/item-5.jpg');
INSERT INTO `goods` VALUES (6, 'Sofas', 1250.00, 3, 1, 'Scott', '2 Seater Sofa, Large, Grass Cotton Velvet', 'img/item-6.jpg');
INSERT INTO `goods` VALUES (7, 'Sofas', 449.00, 2, 1, 'Luciano', '3 Seater Sofa, Orleans Blue', 'img/item-7.jpg');
INSERT INTO `goods` VALUES (8, 'Sofas', 1075.00, 3, 1, 'Henrietta', '3 Seater Sofa, Twilight Blue Recycled Velvet', 'img/item-8.jpg');
INSERT INTO `goods` VALUES (9, 'Lamp Shades', 30.00, 2, 3, 'Edna', 'Glass Easyfit Shade, Blush', 'img/item-9.jpg');
INSERT INTO `goods` VALUES (10, 'Floor Lamps', 170.00, 3, 3, 'Bow', 'Large Arc Overreach Floor Lamp, Chrome & White Marble', 'img/item-10.jpg');
INSERT INTO `goods` VALUES (11, 'Table Lamps', 60.00, 4, 3, 'Briz', 'Table Lamp, Antique Brass & Grey', 'img/item-11.jpg');
INSERT INTO `goods` VALUES (12, 'Ceiling Lights', 225.00, 2, 3, '\r\nGlobe', 'Chandelier Pendant, Brass & Opal', 'img/item-12.jpg');
INSERT INTO `goods` VALUES (13, 'Mirrors', 165.00, 5, 4, 'Arles', 'Octagonal Wall Mirror, 80 cm, Brushed Brass', 'img/item-13.jpg');
INSERT INTO `goods` VALUES (14, 'Wall Art', 90.00, 2, 4, 'Kimchi', 'Framed Print by We Made Something Nice, A2', 'img/item-14.jpg');
INSERT INTO `goods` VALUES (15, 'Vases', 40.00, 3, 4, 'Wavy', 'Vase, Charcoal & White Concrete', 'img/item-15.jpg');
INSERT INTO `goods` VALUES (16, 'Clocks', 55.00, 2, 4, 'Rowell', 'Pendulum Clock 45 x 60cm, Black & Brass', 'img/item-16.jpg');
INSERT INTO `goods` VALUES (17, 'Tables', 290.00, 3, 5, 'Rhonda', 'Garden Round Coffee Table, Natural Stone & Polyweave', 'img/item-17.jpg');
INSERT INTO `goods` VALUES (18, 'Garden Accessories', 35.00, 4, 5, 'Lorita', 'Set of 2 Planters with Stands, Black Weave', 'img/item-18.jpg');
INSERT INTO `goods` VALUES (19, 'Garden Tables', 175.00, 3, 5, 'Soriano', 'Garden Set of 2 Dining Chairs, Green', 'img/item-19.jpg');
INSERT INTO `goods` VALUES (20, 'Garden Chairs', 825.00, 4, 5, 'Jonah', 'Garden 3 seater Sofa, Dark Grey Poly Rattan', 'img/item-20.jpg');

-- ----------------------------
-- Table structure for shopping_cart
-- ----------------------------
DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE `shopping_cart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `numberOf` int(11) NULL DEFAULT NULL,
  `date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shopping_cart
-- ----------------------------
INSERT INTO `shopping_cart` VALUES (1, '1', 2, 5, '2022-08-10 23:26:14');
INSERT INTO `shopping_cart` VALUES (2, '3', 1, 2, '2022-08-05 21:28:04');
INSERT INTO `shopping_cart` VALUES (3, '4', 1, 1, '2022-08-07 21:28:25');
INSERT INTO `shopping_cart` VALUES (4, '2', 2, 1, '2022-08-10 21:28:44');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Lenore', 'lenor@gmail.com', '1111');
INSERT INTO `users` VALUES (2, 'Anton', 'anton@gmail.com', '1234');
INSERT INTO `users` VALUES (3, 'Valerii', 'valerii@gmail.com', '1111');
INSERT INTO `users` VALUES (4, 'Bob', 'test@mail.ua', '18');
INSERT INTO `users` VALUES (5, 'Test', 'pewebir879@meidir.com', '1234567');

SET FOREIGN_KEY_CHECKS = 1;
