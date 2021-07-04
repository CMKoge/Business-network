-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 09:46 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_and_pet`
--

CREATE TABLE `animal_and_pet` (
  `typ_id` int(11) NOT NULL,
  `animal_clinic_and_medicine` tinyint(1) NOT NULL,
  `pet` tinyint(1) NOT NULL,
  `farm_animal` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `acl_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `beauty_and_cosmetic`
--

CREATE TABLE `beauty_and_cosmetic` (
  `typ_id` int(11) NOT NULL,
  `ladies_salon` tinyint(1) NOT NULL,
  `gents_salon` tinyint(1) NOT NULL,
  `salon_equipment` tinyint(1) NOT NULL,
  `cosmetic` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_and_stationary`
--

CREATE TABLE `book_and_stationary` (
  `typ_id` int(11) NOT NULL,
  `preschool_to_grade_5` tinyint(1) NOT NULL,
  `o/l` tinyint(1) NOT NULL,
  `a/l` tinyint(1) NOT NULL,
  `novel_and_short_story` tinyint(1) NOT NULL,
  `school_requirement` tinyint(1) NOT NULL,
  `office_requirement` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `biz_id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `owner_first_name` varchar(25) NOT NULL,
  `owner_last_name` varchar(15) NOT NULL,
  `owner_address_line_1` varchar(10) NOT NULL,
  `owner_address_line_2` varchar(20) NOT NULL,
  `owner_address_line_3` varchar(20) NOT NULL,
  `owner_address_city` varchar(15) NOT NULL,
  `owner_contatc_no` int(11) NOT NULL,
  `biz_address_line_1` varchar(10) NOT NULL,
  `biz_address_line_2` varchar(20) NOT NULL,
  `biz_address_line_3` varchar(20) NOT NULL,
  `biz_address_city` varchar(15) NOT NULL,
  `biz_contact_no` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE `business_profile` (
  `prf_id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `poster_slogen` tinytext NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `www_link` varchar(255) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_and_vehicles`
--

CREATE TABLE `car_and_vehicles` (
  `typ_id` int(11) NOT NULL,
  `vehicles_sales` tinyint(1) NOT NULL,
  `spare_parts` tinyint(1) NOT NULL,
  `tyre_shop` tinyint(1) NOT NULL,
  `modification` tinyint(1) NOT NULL,
  `service_station` tinyint(1) NOT NULL,
  `repair_and_garage` tinyint(1) NOT NULL,
  `taxi_and_cab_service` tinyint(1) NOT NULL,
  `rent_a_car_service` tinyint(1) NOT NULL,
  `driving_school` tinyint(1) NOT NULL,
  `filling_station` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `type` varchar(7) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `permission`) VALUES
(1, 'cstusr', '{\r\n\"rate\": 1,\r\n\"review\": 1\r\n}'),
(2, 'bizusr', '{\r\n\"rate\": 0,\r\n\"review\": 0\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `content` tinytext NOT NULL,
  `date_time` datetime NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commercial_and_industy`
--

CREATE TABLE `commercial_and_industy` (
  `typ_id` int(11) NOT NULL,
  `industrial_tool_and_machinary` tinyint(1) NOT NULL,
  `raw_material` tinyint(1) NOT NULL,
  `office_equipment` tinyint(1) NOT NULL,
  `power_generators_solar_panel_and_boiler` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consumer_electronic`
--

CREATE TABLE `consumer_electronic` (
  `typ_id` int(11) NOT NULL,
  `computer_and_game_console` tinyint(1) NOT NULL,
  `tv_audio_and_video` tinyint(1) NOT NULL,
  `kitchen_appliances_and_refregirators` tinyint(1) NOT NULL,
  `networking` tinyint(1) NOT NULL,
  `printers_toners_and_catridge` tinyint(1) NOT NULL,
  `ironing_and_laundry` tinyint(1) NOT NULL,
  `repair` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cst_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `display_name` varchar(25) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `typ_id` int(11) NOT NULL,
  `tution_institute` tinyint(1) NOT NULL,
  `individual_class` tinyint(1) NOT NULL,
  `group_class` tinyint(1) NOT NULL,
  `hall_class` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entertainment_and_toy`
--

CREATE TABLE `entertainment_and_toy` (
  `typ_id` int(11) NOT NULL,
  `game_cafe` tinyint(1) NOT NULL,
  `movie_theater` tinyint(1) NOT NULL,
  `toy_shop` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_and_party`
--

CREATE TABLE `event_and_party` (
  `typ_id` int(11) NOT NULL,
  `event_plan` tinyint(1) NOT NULL,
  `caters` tinyint(1) NOT NULL,
  `decoration` tinyint(1) NOT NULL,
  `festive_goods` tinyint(1) NOT NULL,
  `photography_and_videography` tinyint(1) NOT NULL,
  `cultural_requirement` tinyint(1) NOT NULL,
  `music_and_entertainment` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_is` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fashion_and_clothing`
--

CREATE TABLE `fashion_and_clothing` (
  `typ_id` int(11) NOT NULL,
  `womens_ware` tinyint(1) NOT NULL,
  `gents_wara` tinyint(1) NOT NULL,
  `kids_ware` tinyint(1) NOT NULL,
  `fabric_and_bathic` tinyint(1) NOT NULL,
  `handloom` tinyint(1) NOT NULL,
  `tailor_shops` tinyint(1) NOT NULL,
  `garments` tinyint(1) NOT NULL,
  `foot_ware` tinyint(1) NOT NULL,
  `bag` tinyint(1) NOT NULL,
  `jewelray_and_watches` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `typ_id` int(11) NOT NULL,
  `micro_credit` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fitness_and_sports`
--

CREATE TABLE `fitness_and_sports` (
  `typ_id` int(11) NOT NULL,
  `fitness_center_and_gym` tinyint(1) NOT NULL,
  `yoga` tinyint(1) NOT NULL,
  `sports_ware` tinyint(1) NOT NULL,
  `trophy_and_medal` tinyint(1) NOT NULL,
  `sports_club` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_and_drink`
--

CREATE TABLE `food_and_drink` (
  `typ_id` int(11) NOT NULL,
  `restaurant` tinyint(1) NOT NULL,
  `cafe` tinyint(1) NOT NULL,
  `juice_bar_and_coolspot` tinyint(1) NOT NULL,
  `take_away` tinyint(1) NOT NULL,
  `hotel` tinyint(1) NOT NULL,
  `liquor_and_wine_stores` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `home_and_living`
--

CREATE TABLE `home_and_living` (
  `typ_id` int(11) NOT NULL,
  `kitchen_and_dining` tinyint(1) NOT NULL,
  `home_decoration` tinyint(1) NOT NULL,
  `bedding` tinyint(1) NOT NULL,
  `furniture` tinyint(1) NOT NULL,
  `house_keeping_supplies` tinyint(1) NOT NULL,
  `bathroom` tinyint(1) NOT NULL,
  `drycleaning_and_laundry` tinyint(1) NOT NULL,
  `lightning` tinyint(1) NOT NULL,
  `lawn_and_garden` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `album_name` tinytext NOT NULL,
  `date_time` datetime NOT NULL,
  `prf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_and_healthcare`
--

CREATE TABLE `medical_and_healthcare` (
  `typ_id` int(11) NOT NULL,
  `channeling_center_and_dispensary` tinyint(1) NOT NULL,
  `pharmacy` tinyint(1) NOT NULL,
  `laboratory` tinyint(1) NOT NULL,
  `ayurveda_treatments` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nfy_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `typ_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `professional_service`
--

CREATE TABLE `professional_service` (
  `typ_id` int(11) NOT NULL,
  `software_app_dev_and_maintain` tinyint(1) NOT NULL,
  `web_dev_and_maintain` tinyint(1) NOT NULL,
  `graphic_design` tinyint(1) NOT NULL,
  `house_plan_and_architecture_design` tinyint(1) NOT NULL,
  `law_and_legal` tinyint(1) NOT NULL,
  `astrology` tinyint(1) NOT NULL,
  `surviouring` tinyint(1) NOT NULL,
  `security_cctv` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rte_id` int(11) NOT NULL,
  `rank` int(2) NOT NULL,
  `date_time` datetime NOT NULL,
  `biz_id` int(11) NOT NULL,
  `cst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registerd_business`
--

CREATE TABLE `registerd_business` (
  `reg_id` int(11) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `reg_address_line_1` varchar(10) NOT NULL,
  `reg_address_line_2` varchar(20) NOT NULL,
  `reg_address_line_3` varchar(20) NOT NULL,
  `reg_address_city` varchar(15) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rew_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_time` datetime NOT NULL,
  `biz_id` int(11) NOT NULL,
  `cst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studio_and_printing`
--

CREATE TABLE `studio_and_printing` (
  `typ_id` int(11) NOT NULL,
  `colour_lab` tinyint(1) NOT NULL,
  `wristband_mug_suvinior_printing` tinyint(1) NOT NULL,
  `audio_and_visual_studio` tinyint(1) NOT NULL,
  `photo_studio` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `sgs_id` int(11) NOT NULL,
  `suggestion` text NOT NULL,
  `date_time` datetime NOT NULL,
  `biz_id` int(11) NOT NULL,
  `cst_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tracked_business`
--

CREATE TABLE `tracked_business` (
  `trk_id` int(11) NOT NULL,
  `biz_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `travel_and_leisure`
--

CREATE TABLE `travel_and_leisure` (
  `typ_id` int(11) NOT NULL,
  `tourist_guide` tinyint(1) NOT NULL,
  `adventure_and_camping` tinyint(1) NOT NULL,
  `lodge_and_guest_house` tinyint(1) NOT NULL,
  `spa` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `display_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `date` datetime NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `typ_id` int(11) NOT NULL,
  `wedding_plan` tinyint(1) NOT NULL,
  `beauticians_and_bridal_salon` tinyint(1) NOT NULL,
  `bridal_ware` tinyint(1) NOT NULL,
  `grooms_ware_and_tailor` tinyint(1) NOT NULL,
  `banquet_hall` tinyint(1) NOT NULL,
  `poruwa_flora_and_hall_decoration` tinyint(1) NOT NULL,
  `cake_structre_and_wedding_cake` tinyint(1) NOT NULL,
  `photography_and_videography` tinyint(1) NOT NULL,
  `cater` tinyint(1) NOT NULL,
  `cultural_requirement` tinyint(1) NOT NULL,
  `music_and_entertainment` tinyint(1) NOT NULL,
  `wedding_stationary` tinyint(1) NOT NULL,
  `other` varchar(25) NOT NULL,
  `biz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_and_pet`
--
ALTER TABLE `animal_and_pet`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`acl_id`);

--
-- Indexes for table `beauty_and_cosmetic`
--
ALTER TABLE `beauty_and_cosmetic`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `book_and_stationary`
--
ALTER TABLE `book_and_stationary`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`biz_id`);

--
-- Indexes for table `business_profile`
--
ALTER TABLE `business_profile`
  ADD PRIMARY KEY (`prf_id`);

--
-- Indexes for table `car_and_vehicles`
--
ALTER TABLE `car_and_vehicles`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `commercial_and_industy`
--
ALTER TABLE `commercial_and_industy`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `consumer_electronic`
--
ALTER TABLE `consumer_electronic`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cst_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `entertainment_and_toy`
--
ALTER TABLE `entertainment_and_toy`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `event_and_party`
--
ALTER TABLE `event_and_party`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `fashion_and_clothing`
--
ALTER TABLE `fashion_and_clothing`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `fitness_and_sports`
--
ALTER TABLE `fitness_and_sports`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `food_and_drink`
--
ALTER TABLE `food_and_drink`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `home_and_living`
--
ALTER TABLE `home_and_living`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `medical_and_healthcare`
--
ALTER TABLE `medical_and_healthcare`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nfy_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `professional_service`
--
ALTER TABLE `professional_service`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rte_id`);

--
-- Indexes for table `registerd_business`
--
ALTER TABLE `registerd_business`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rew_id`);

--
-- Indexes for table `studio_and_printing`
--
ALTER TABLE `studio_and_printing`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`sgs_id`);

--
-- Indexes for table `tracked_business`
--
ALTER TABLE `tracked_business`
  ADD PRIMARY KEY (`trk_id`);

--
-- Indexes for table `travel_and_leisure`
--
ALTER TABLE `travel_and_leisure`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`typ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_and_pet`
--
ALTER TABLE `animal_and_pet`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `acl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beauty_and_cosmetic`
--
ALTER TABLE `beauty_and_cosmetic`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_and_stationary`
--
ALTER TABLE `book_and_stationary`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `biz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_profile`
--
ALTER TABLE `business_profile`
  MODIFY `prf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_and_vehicles`
--
ALTER TABLE `car_and_vehicles`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commercial_and_industy`
--
ALTER TABLE `commercial_and_industy`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumer_electronic`
--
ALTER TABLE `consumer_electronic`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entertainment_and_toy`
--
ALTER TABLE `entertainment_and_toy`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_and_party`
--
ALTER TABLE `event_and_party`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fashion_and_clothing`
--
ALTER TABLE `fashion_and_clothing`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fitness_and_sports`
--
ALTER TABLE `fitness_and_sports`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_and_drink`
--
ALTER TABLE `food_and_drink`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_and_living`
--
ALTER TABLE `home_and_living`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_and_healthcare`
--
ALTER TABLE `medical_and_healthcare`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nfy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional_service`
--
ALTER TABLE `professional_service`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rte_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registerd_business`
--
ALTER TABLE `registerd_business`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rew_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studio_and_printing`
--
ALTER TABLE `studio_and_printing`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `sgs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracked_business`
--
ALTER TABLE `tracked_business`
  MODIFY `trk_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_and_leisure`
--
ALTER TABLE `travel_and_leisure`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
