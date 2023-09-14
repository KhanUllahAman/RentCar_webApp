-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 07:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2023-08-02 17:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(20, 'shayan@gmail.com', 21, '2023-08-02', '2023-08-15', 'Mercedez', 1, '2023-08-02 16:44:13'),
(21, 'shayan@gmail.com', 20, '2023-08-02', '2023-08-29', 'Corvette', 1, '2023-08-02 17:23:19'),
(22, 'shayan@gmail.com', 15, '2023-08-02', '2024-08-02', 'BMW', 0, '2023-08-02 17:25:49'),
(23, 'shayan@gmail.com', 18, '2023-08-02', '2023-08-05', 'GTR', 0, '2023-08-02 17:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(2, 'BMW', '2017-06-18 16:24:50', NULL),
(10, 'NISSAN', '2023-08-02 15:05:19', '2023-08-02 15:06:07'),
(11, 'AUDI', '2023-08-02 15:05:53', NULL),
(12, 'Mercedes', '2023-08-02 15:07:13', '2023-08-02 16:16:42'),
(13, 'LAMBORGHINI', '2023-08-02 15:08:11', NULL),
(14, 'CORVETTE', '2023-08-02 16:08:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Spersious', 'mhasan0316@gmail.com', '03165222222');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(8, 'shaiby', 'shaiby@gmail.com', '12345678911', 'Good Job!', '2023-08-02 16:57:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																				<p align=\"justify\"><br></p>\r\n										\r\n										'),
(2, 'Privacy Policy', 'privacy', '<div style=\"text-align: center;\"><ul><ul><li><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-weight: bold; text-align: justify; background-color: initial;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span></li></ul></ul></div>										'),
(3, 'About Us ', 'aboutus', '																				<div style=\"text-align: justify;\"><br></div>\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'aman@gmail.com', '2023-07-17 07:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(3, 'aman@gmail.com', 'hello this is amazing website enjoy the website', '2023-07-09 12:50:50', 1),
(31, 'shayan@gmail.com', 'Trusted and amaizing website facilities,\r\nI am appriciate Shayan Siddque and Aman Khan', '2023-08-02 17:19:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `ProfilePicture` varchar(250) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `ProfilePicture`, `RegDate`, `UpdationDate`) VALUES
(52, 'shayan', 'shayan@gmail.com', 'bc854861ea4788668252d0248112aacc', '0316203676', '21/5/2023', 'shah faisal colony 4/45', 'Karachi', 'Pakistan', 'img/profile_images/shayan@gmail.com_1690996527_shayan.png', '2023-08-02 16:40:59', '2023-08-02 17:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(10, 'Nissan', 3, 'Body Style: The Nissan 350 is a luxury performance sedan known for its sleek and distinctive four-door coupe design.\r\n AMG Tuning: As an Nissan 350 model, the CLS 63 comes with several performance enhancements, including a sport-tuned suspension, larger brakes, and AMG-specific styling cues.', 300, 'Petrol', 2011, 2, 'car19.jpg', 'car20.jpg', 'car21.jpg', 'car22.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-16 11:57:18', NULL),
(11, 'Lamborghini Huracan Spyder', 1, ' Body Style: The Lamborghini Huracan Spyder is a luxury performance sedan known for its sleek and distinctive four-door coupe design.', 500, 'Petrol', 2021, 2, 'car24.jpg', 'car25.jpg', 'car26.jpg', 'car27.jpg', 'car28.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-07-16 12:04:10', NULL),
(12, 'Mazda RX-8', 1, ' Body Style: The Mazda RX-8 is a luxury performance sedan known for its sleek and distinctive four-door coupe design.\r\n AMG Tuning: As an Mazda RX-8 model, the CLS 63 comes with several performance enhancements, including a sport-tuned suspension, larger brakes, and AMG-specific styling cues.', 800, 'Diesel', 2012, 2, 'car11.jpg', 'car12.jpg', 'car13.jpg', 'car14.jpg', 'car17.jpg', 1, 1, 1, NULL, 1, 1, NULL, 1, 1, 1, 1, 1, '2023-07-19 09:09:48', NULL),
(13, 'Mazda RX-8', 1, 'Body Style: The Mazda RX-8 is a luxury performance sedan known for its sleek and distinctive four-door coupe design.', 500, 'Diesel', 2012, 2, 'car36.jpg', 'car37.jpg', 'car38.jpg', 'car39.jpg', 'car40.jpg', 1, 1, 1, 1, 1, NULL, 1, NULL, 1, 1, 1, 1, '2023-07-23 09:20:16', NULL),
(14, 'Mazda RX-8', 1, 'Body Style: The Mazda RX-8 is a luxury performance sedan known for its sleek and distinctive four-door coupe design.', 500, 'Diesel', 2012, 2, 'car36.jpg', 'car37.jpg', 'car38.jpg', 'car39.jpg', 'car40.jpg', 1, 1, 1, 1, 1, NULL, 1, NULL, 1, 1, 1, 1, '2023-07-23 11:33:03', NULL),
(15, ' BMW 3.0 CSL', 2, 'The BMW 3.0 CSL celebrates the 50th anniversary of the same nameplate that became an iconic vehicle for the brand in the ‘70s. Only 50 units of this reincarnation will be built for worldwide consumption, and are most likely already all spoken for. The two-door, two-seat BMW 3.0 CSL is equipped with a twin-turbocharged 3.0L inline-six that belts out 552 horsepower (560 PS) and 406 pound-feet of torque, while weight will be kept as low as possible thanks to extensive use of carbon fibre reinforced plastic. No word on price, but rumours have it that it will be in the vicinity of 750,000 euros.', 5000, 'Petrol', 2023, 4, 'car30.jpg', 'car31.jpg', 'car32.jpg', 'car33.jpg', 'car35.jpg', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-02 15:14:17', NULL),
(16, ' BMW 2 Series', 2, 'The BMW 2 Series is offered in two body styles in the United States, and only in Canada. The 2 Series coupe has been redesigned last year, keeping its rear-wheel-biased drivetrain and is available in 230i configuration with a 255-hp turbo 2.0L four, or as the M240i xDrive with a 382-hp turbo 3.0L six. The BMW M2 is back, introduced in the fall of 2022 and boasting a twin-turbo 3.0L six with 453 horsepower and 406 pound-feet of torque. It can be chosen with a six-speed manual transmission or an eight-speed automatic. Meanwhile, the 2 Series Gran Coupe soldiers on in the U.S., but has been dropped in Canada. It’s built on a front-drive platform and is available in 228i and 228i xDrive trims with a 228-hp turbo 2.0L four, as well as the M235i xDrive with a 301-hp turbo 2.0L engine.', 7000, 'Diesel', 2023, 4, 'car47.jpg', 'car48.jpg', 'car46.jpg', 'car45.jpg', 'car47.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, 1, '2023-08-02 15:18:04', NULL),
(17, 'Nissan Altima', 10, 'Firmly ensconced in third place in the mid-size sedan class, every now and then the Nissan Altima jumps up to first in monthly sales. For a time, the Altima was Nissan’s best-selling vehicle, before being ousted by the Rogue SUV during the growing crossover craze. Debuting in 1993 as one of the smaller offerings in the mid-size sedan class, the Altima’s success came as it gradually grew and updated its styling during the next decade. It distinguished itself from appliance-like mid-size sedans with its sporty air — if more in appearance than in driving dynamics. A few performance-oriented versions have been offered over the years, with suspension modifications and increased power.', 10000, 'Petrol', 2022, 4, 'car19.jpg', 'car20.jpg', 'car21.jpg', 'car22.jpg', 'car19.jpg', 1, NULL, 1, 1, 1, NULL, 1, 1, 1, 1, 1, NULL, '2023-08-02 15:31:12', NULL),
(18, 'Nissan GT-R', 10, 'For a car never sold new in the U.S., the Nissan Skyline GT-R has an enviable reputation here. Enthusiasts know it as a movie and video-game star, and even as a surprisingly common matchbox car. The GT-R first appeared in Japan as the top-spec performance Skyline back in 1969. It faded away in the early \'70s before returning in 1989. The GT-R finally hit U.S. dealerships as a 2009 model, but at that point was no longer the ultimate Skyline but rather a standalone high-performance model. Its defining characteristics include a hand-built, twin-turbo V-6 engine, rear-biased all-wheel drive, a dual-clutch transmission, 2+2 seating and chunky coupe styling. The nearly two-ton GT-R excels on the track but isn’t as well-rounded as some of its competitors. ', 6000, 'Diesel', 2023, 4, 'car39.jpg', 'car38.jpg', 'car40.jpg', 'car36.jpg', 'car37.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, '2023-08-02 15:34:47', NULL),
(19, 'AUDI R8', 11, 'The Audi R8, based on the Audi Le Mans quattro concept car (designed by Frank Lamberty and Julian Hoenig) first appeared at the 2003 International Geneva Motor Show and the 2003 Frankfurt International Motor Show. The R8 road car was officially launched at the Paris Auto Show on 30 September 2006. There was some confusion with the name, which the car shares with the 24 Hours of Le Mans winning R8 Le Mans Prototype (LMP). Initial models included the R8 4.2 FSI coupé (with a V8 engine) and R8 5.2 FSI coupé (with a V10 engine). Convertible models, called the Spyder by the manufacturer, were introduced in 2008, followed by the high-performance GT model introduced in 2011. The Motorsport variants of the R8 were also subsequently introduced from 2008 onwards.', 5000, 'Diesel', 2020, 4, 'audi 1.jpg', 'audi 2.jpg', 'audi 1.jpg', 'audi 2.jpg', 'audi 1.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-02 15:57:09', '2023-08-02 16:03:26'),
(20, 'Chevrolet Corvette', 14, 'Corvette Racing is an American auto racing team established in 1999 by General Motors and Pratt & Miller for the purposes of competing in sports car racing internationally. Corvette Racing is an official racing program for General Motors and their Chevrolet Corvette production car, having utilized four generations of the Corvette to develop racing cars, although racing programs involving the Corvette have been endorsed by General Motors to varying degrees since 1956. The team is known for its iconic yellow livery and its passionate American fanbase.', 8000, 'CNG', 2019, 2, 'c1.jpg', 'c2.jpg', 'c3.jpg', 'c1.jpg', 'c2.jpg', 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, 1, '2023-08-02 16:14:04', NULL),
(21, 'Mercedes-Benz', 12, 'Mercedes-Benz AG produces consumer luxury vehicles and commercial vehicles badged as Mercedes-Benz. From November 2019 onwards, Mercedes-Benz-badged heavy commercial vehicles (trucks and buses) are managed by Daimler Truck, a former part of the Mercedes-Benz Group turned into an independent company in late 2021. In 2018, Mercedes-Benz was the largest brand of premium vehicles in the world, having sold 2.31 million passenger cars.', 7500, 'Diesel', 2019, 4, 'car1.jpg', 'car3.jpg', 'car5.jpg', 'car4.jpg', 'car6.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-02 16:20:29', NULL),
(22, 'Mercedes-Benz G-Class', 12, 'In November 2019, Daimler AG announced that Mercedes-Benz, until that point a company marque, would be spun off into a separate, wholly owned subsidiary called Mercedes-Benz AG. The new subsidiary would manage the Mercedes-Benz car and van business. Mercedes-Benz-badged trucks and buses would be part of the Daimler Truck AG subsidiary.\r\n\r\nFor information relating to the three-pointed star symbol of the brand, see under the title Daimler-Motoren-Gesellschaft, including the merger into Daimler-Benz.\r\n\r\nIn May 2022, Mercedes-Benz announced that it has recently sold the most expensive car at the price of $142 million (€135 million). The car is a very rare 1955 Mercedes-Benz SLR that has been kept in the German automaker\'s collection and bought by a private owner. Mercedes in an announcement said that the sale will be used to establish the Mercedes-Benz Fund.', 4500, 'Petrol', 2023, 4, 'car50.jpg', 'car49.jpg', 'car50.jpg', 'car49.jpg', 'car50.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-02 16:25:08', NULL),
(23, 'Lamborghini Huracan', 13, 'The Huracán maintains the 5.2-litre naturally aspirated Audi/Lamborghini V10 engine with an additional 0.2 litres, compared to the Gallardo, tuned to generate a maximum power output of 449 kW (602 hp; 610 PS). To ensure its balance and performance, the car is mid-engined. The engine has both direct fuel injection and multi-point fuel injection. It combines the benefits of both of these systems; it is the first time this combination is used in a V10 engine. To increase its efficiency, the Huracán\'s engine also includes a start-stop system.[citation needed] The firing order of the engine is 1, 6, 5, 10, 2, 7, 3, 8, 4, 9. This is printed on a metal plate on the top of the engine, as with all other Lamborghini models.', 12000, 'Petrol', 2023, 2, 'car24.jpg', 'car23.jpg', 'car26.jpg', 'car28.jpg', 'car27.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-08-02 16:33:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
