-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 05:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'vegetables'),
(2, 'fruits'),
(3, 'dairy'),
(4, 'meat');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `user_mob` int(100) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `user_name`, `subject`, `user_mob`, `user_email`, `content`) VALUES
(31, 'CE B 07 Blessy Thomas', 'hi how r you im blessy', 2147483647, 'blessytho18ce@student.mes.ac.in', 'ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc'),
(32, 'CE B 07 Blessy Thomas', 'hi how r you im blessy', 2147483647, 'blessytho18ce@student.mes.ac.in', 'ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc'),
(33, 'CE B 07 Blessy Thomas', 'hi how r you im blessy', 2147483647, 'blessytho18ce@student.mes.ac.in', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(34, 'Blessy Thomas', 'hi how r you im blessy', 2147483647, 'blessytho18ce@student.mes.ac.in', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(35, 'Blessy Thomas', 'hi how r you im blessy', 2147483647, 'blessythomas20000@gmail.com', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_item_name` varchar(250) NOT NULL,
  `order_item_quantity` int(11) NOT NULL,
  `order_item_price` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `order_total_amount` double(12,2) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_expiry_month` varchar(30) NOT NULL,
  `card_expiry_year` varchar(30) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `card_holder_number` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(250) NOT NULL,
  `customer_pin` varchar(30) NOT NULL,
  `customer_state` varchar(250) NOT NULL,
  `customer_country` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `c_id`, `name`, `desc`, `price`, `rrp`, `weight`, `quantity`, `img`, `date_added`) VALUES
(1, 2, 'Raspberries', '<p>approx 250g per pack</p><br>\r\n<p><b>Storage Instructions:</b> Best stored dry at 4°C. Can be frozen.</p><br>\r\n\r\n<p>Raspberries aren\'t just delicious, they are also extremely good for you. One cup of raspberries contains over 50% of the minimum recommended Vitamin C intake, and this fruit also contains good levels of Vitamin K and Manganese, important for bone health.</p>\r\n\r\n', '160.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/04/1901_16-Amazing-Benefits-Of-Raspberries-For-Skin-Hair-And-Health_shutterstock_391474411.jpg', '2020-11-07 15:56:54'),
(2, 2, 'Green Apples', '<p><b>Storage Instructions:<b> 0°C</p><br>\r\n<p>Green Apple, also known as Granny Smith is crisp with lemon-like tartness. It is firm, medium-grained and has bright white flesh and is excellent for pie baking or can be eaten as a whole.</p><br>\r\n<p>Green Apples are a rich source of antioxidants and naturally low in calories. High in dietary fibre, they are recommended as part of weight-loss diets.</p>', '100.00', '120.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/06/Top-26-Amazing-Benefits-Of-Green-Apples-For-Skin-Hair-And-Health-1.jpg', '2020-11-07 16:32:09'),
(3, 2, 'Valencia oranges', '<p><b>Storage Instructions:<b> 5°C</p><br>\r\n\r\n<p>Valencia oranges are the sweeter and juicier variety of this popular citrus fruit. Unlike navel oranges, valencia oranges contain a few seeds.</p> As a result, Valencia oranges being better for juicing, as the seeds contain an anti-oxidant that means the juice from the orange can be stored in the fridge for days, even weeks, without becoming bitter. </p>', '160.00', '200.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/11/The-12-Incredible-Health-Benefits-Of-Oranges-.jpg', '2020-11-07 16:32:09'),
(4, 2, 'Pomegranate', '<p><b>Storage Instructions:</b> 6°C<p><br>\r\n<p>Pomegranate has a juicy cluster of sparkling, opaque, red coloured seeds which taste sweet.</p>\r\n<p>It can be used for topping desserts and to make juices and fruit salads.<p>\\r\\n\r\n<p>Pomegranate juice lowers bad cholesterol and raises good cholesterol, reduces the risk of heart disease while giving a boost of energy and freshness.</p>', '89.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/07/15-Health-Benefits-Of-Pomegranate-Juice.jpg', '2020-11-07 16:40:04'),
(5, 2, 'Banana', '<p><b>Storage Instructions:</b> 13°C</p><br>\r\n<p>Fresh bananas with bright yellow skin and a smooth texture.</p>\r\n<p>They are a powerhouse of nutrients, boost the immune system and keep bones strong. They also ease digestion and help prevent stomach ulcers.<p>', '40.00', '90.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2014/07/3365-Can-I-Eat-Bananas-If-I-Have-Diabetes-ss.jpg', '2020-11-07 16:40:04'),
(6, 2, 'strawberry', '<p>approx 250g</p><br>\r\n\r\n<p><b>Storage Instructions:</b> 2°C</p><br>\r\n\r\n<p>\r\nStrawberries are a highly nutritious fruit, loaded with vitamin C and powerful antioxidants. Enjoy our fresh strawberries for their characteristic aroma, bright red colour, juicy texture, and sweetness.</p><br>', '55.00', '60.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/09/21-Best-Benefits-Of-Strawberries-For-Skin-Hair-And-Health.jpg', '2020-11-07 16:50:19'),
(7, 2, 'pineapple', '<p>Available in pcs</p><br>\r\n<p><b>Storage Instructions:</b> 8°C</p><br>\r\n\r\n<p>Pineapples are a large juicy tropical fruit consisting of aromatic edible yellow flesh. Ideal for panning out a variety of desserts or simply tossing it with some paprika to make a zingy treat. Pineapples are bursting with minerals and vitamins, especially Vitamin C</p>', '100.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2015/08/1516_Is-Pineapple-Effective-For-Upset-Stomach.jpg\r\n', '2020-11-07 18:54:07'),
(8, 2, 'Black Grapes', '<p>Black grapes, which are known for their velvety colour and sweet flavour, are packed with nutrients and antioxidants.</p>\r\n<p>\r\nApart from being a favourite as a standalone fruit or in salads, black grapes can also be cooked in a variety of ways to make sauces, jams, compotes, desserts and more.</p>', '65.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/08/9-Powerful-Reasons-You-Must-Eat-Black-Grapes.jpg', '2020-11-07 18:54:07'),
(9, 2, 'watermelon', '<p>With greenish-black to smooth dark green surface, Fresh watermelons are globular in shape and are freshly picked for you directly from our farmers.</p><br>\r\n<p>The juicy, sweet and grainy textured flesh is filled with 12-14% of sugar content, making it a healthy alternative to sugary carbonated drinks. Flesh colour of these watermelons are pink to red with dark brown/black seeds.</p>', '60.00', '80.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/09/2115-What-Is-Watermelon-Diet-And-What-Are-Its-Benefits-is.jpg', '2020-11-07 18:59:35'),
(10, 2, 'kiwi', '<p>The kiwifruit, originally known as the Chinese gooseberry, is full of nutrients and low in calories.</p><br>\r\n<p>Kiwis are known as a health food due to their high Vitamin C content, but they also contain other nutrients.</p>', '40.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/12/Kiwifruit-12-Powerful-Benefits-Including-Cancer-Prevention-And-Diabetes-Treatment.jpg', '2020-11-07 18:59:35'),
(11, 2, 'cherries', '<p>Cherries are also a good source of fibre, which helps keep your digestive system healthy by fueling beneficial gut bacteria and promoting bowel regularity</p>\r\n\r\n', '30.00', '0.00', '250g', 10, 'https://cdn2.stylecraze.com/wp-content/uploads/2013/08/591_13-Best-Benefits-Of-Black-Cherries-For-Skin-Hair-And-Health_iStock-827654834.jpg', '2020-11-07 19:03:28'),
(12, 2, 'mangoes', '<p>The variety is a jumbo-sized, green mango known for its sweet and tangy flavour.</p><br><p>To test for ripeness and if this mango is ready to eat, give it a light squeeze. if the fruit gives a little, it is ready. If it is still hard, put it in a paper bag to ripen for a few days.</p>', '100.00', '0.00', '250g', 10, 'https://www.supermarketperimeter.com/ext/resources/0722-mangoes.jpg?1595428736', '2020-11-07 19:03:28'),
(13, 4, 'Whole Chicken ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p>Organic foods are grown and processed differently than conventional food products.</p>\r\n<p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.Eating organic chicken can help limit your exposure to pesticides and chemical fertilizers</p>\\r\\n', '500.00', '750.00', '1kg', 10, 'https://cdn.shopify.com/s/files/1/2698/6542/products/Whole_Meat_Online_Shop_Chicken_Griller_raw_700x.jpg', '2020-11-07 19:06:39'),
(14, 4, 'Chicken Breasts ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p>Organic foods are grown and processed differently than conventional food products.</p><p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '189.00', '250.00', '500g', 10, 'https://i2.wp.com/betterlife-market.com/wp-content/uploads/2018/06/chicken-breasts-e1528198838872.jpg', '2020-11-07 19:12:54'),
(15, 4, 'Chicken Thigh ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available in:</b> 4pcs</p><br>\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '189.00', '299.00', '500g', 10, 'https://linehopper.ca/wp-content/uploads/2020/04/thighs.jpg', '2020-11-07 19:12:54'),
(16, 4, 'Chicken Wings ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available in:</b> 4pcs</p><br>\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '119.00', '0.00', '500g', 10, 'https://cdn.opentaste.sg/p/?id=16217865.0-3c2b1b647a355adeadac24023f38a537&size=620x620&format=jpg', '2020-11-07 19:29:17'),
(17, 4, 'Chicken Liver ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available in:</b> 4pcs</p><br>\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '85.00', '90.00', '500g', 0, 'https://i0.wp.com/betterlife-market.com/wp-content/uploads/2018/06/chicken-liver-e1528197288285.jpg?fit=472%2C402&ssl=1\'', '2020-11-07 19:29:17'),
(18, 4, 'Chicken Legs ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available:</b> 2pcs</p><br>\r\n\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>\r\n ', '149.00', '0.00', '500g', 10, 'https://www.luluhypermarket.com/medias/1458705-01.jpg-1200Wx1200H?context=bWFzdGVyfGltYWdlc3w1MTI4MjF8aW1hZ2UvanBlZ3xpbWFnZXMvaGJhL2gzYi9oMDAvOTMxMTI4NzYwNzMyNi5qcGd8OTNkNjVhODhmMTg2YjlhMDIxMTM1ZDVkYjIxNWViNDZjOWJhOWQ2YWEyOTA2NDU1YmEyYTc0NjQxNjI2N2I5Mw', '2020-11-07 19:35:18'),
(19, 4, 'Chicken Drumsticks ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available:</b> 6pcs</p><br>\r\n\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>\r\n ', '255.00', '300.00', '1kg', 10, 'https://www.freshease.in/image/cache/catalog/Freshease/Chicken/Drumstick_n-550x550.JPG', '2020-11-07 19:35:18'),
(20, 4, 'Chicken Gizzard ', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available:</b> 15pcs</p><br>\r\n\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '149.00', '249.00', '1kg', 10, 'https://cdnprod.mafretailproxy.com/cdn-cgi/image/format=auto,onerror=redirect/sys-master-prod/h8e/ha4/8977243504670/1440765_1.jpg_480Wx480H', '2020-11-07 19:40:49'),
(21, 4, 'Chicken Sausages', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available:</b> 6pcs in 1 pack</p><br>\r\n\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '120.00', '130.00', 'per pack', 10, 'https://republicofchicken.in/wp-content/uploads/2020/02/Chicken-Sausages-600x600-compressed.jpg', '2020-11-07 19:40:49'),
(22, 4, 'Lamb Rack ', '<p><b>Storage Instructions:</b> Store chilled between 1°C - 4°C</p><br>\r\n<p><b>Available:</b> 6pcs<p><br>\r\n<p>Enjoy restaurant quality cuts of sweet and tender New Zealand lamb at home.</p>\r\n<p>The lamb chop is a versatile cut to serve any occasion. Naturally lean, these lamb chops are a simple, healthy and delicious option for any meal during the week<p>', '469.00', '899.00', '500g', 10, 'https://cdn.shopify.com/s/files/1/0108/1019/6027/products/Butcher_Toowoomba_Fresh_Lamb_Rack_480x.jpg?v=1585357468', '2020-11-07 19:46:07'),
(23, 4, 'Diced Lamb ', '<p><b>Storage Instructions:</b> Store chilled between 1°C - 4°C</p><br>\r\n<p><b>Available:</b> 6pcs<p><br>\r\n<p>Enjoy restaurant quality cuts of sweet and tender New Zealand lamb at home.</p>\r\n<p>The lamb chop is a versatile cut to serve any occasion. Naturally lean, these lamb chops are a simple, healthy and delicious option for any meal during the week<p>', '470.00', '0.00', '500g', 9, 'https://cdn.shopify.com/s/files/1/0108/1019/6027/products/Lamb-Diced_480x.jpg', '2020-11-07 19:46:07'),
(24, 4, 'Chicken Mortadella', '<p><b>Storage Instructions:</b> 0-5°C</p><br>\r\n<p><b>Available:</b> 1 pack</p><br>\r\n\r\n<p>Organic foods are grown and processed differently than conventional food products.<p></p>Chickens are fed organic feed and receive a balanced diet of mixed organic, non-genetically modified grains.</p>', '600.00', '0.00', '1kg', 3, 'https://s3-eu-west-1.amazonaws.com/elgrocerstaging/products/photos/000/046/863/medium/2502378000005.jpg?1521371720', '2020-11-07 19:48:18'),
(25, 3, 'Amul Butter', '<p><b>Storage Instructions:</b> at 4^c or below</p><br>\r\n<p><b>Available in:</b> 1 pack</p><br>\r\n<p>Pasteurized Amul butter is a delicious bread spread, an essential ingredient of baking and a known enhancer for many food items.</p>\r\n<p> This smooth creamy chunk from the house of Amul can be added to sauce, Indian gravy.</p>', '225.95', '235.00', '500g', 10, 'https://5.imimg.com/data5/OC/OF/MY-9101930/amul-butter-500x500.jpg', '2020-11-26 23:59:03'),
(26, 3, 'Amul Taaza Milk', '<p><b>Storage Instructions:</b> Cool and dry conditions with ambient temperature</p><br>\r\n<p><b>Available:</b> 1 pack contains 12 milk cartons</p><br>\r\n<p>Creating toned milk is an Indian born process that involves adding water, skim milk and skim milk powder to buffalos milk in order to bring down the excess fat that the body does not need.</p><p> This kind of processing is carried out by Amul in way that keeps the calcium, protein and mineral content intact by simply removing the empty calories as the essential fats are preserved for good bone health.</p>', '64.00', '0.00', '1L', 10, 'https://greenleafonline.net/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/i/m/imilk1lamul3174xx290216_3_b.jpg', '2020-11-27 01:14:18'),
(27, 3, 'Amul Cheese', '<p><b>Storage Conditions:</b> Refrigerated at 4^c or below and do, not deep freeze.</p><br>\r\n<p><b>Available:</b> 5 slices in one pack</p><br>\r\n<p>Amul Pasteurised Processed Cheddar Cheese is made from Cheese, Sodium Citrate, Common Salt, Citric Acid, permitted natural colour - Annatto. </p><p>Emulsifier and Class II preservatives. It is made from graded cow/buffalo milk using microbial rennet. </p>  ', '105.00', '100.00', '200g', 10, 'https://www.ducem.ae/image/cache/catalog/Amul/amul%20cheese%20slice-1100x1100w.jpg.webp', '2020-11-27 01:25:27'),
(28, 3, 'Malai Paneer', '<p><b>Storage Conditions:</b> refrigerated</p><br>\r\n<p><b>Available:</b> 1pack contains 10 pcs</p><br>\r\n<p>Amul Fresh Paneer is made from pure milk, hygienically packed untouched by hand. It adheres to FASSI norms. Amul fresh paneer is a rich source of Protein.</p> ', '74.25', '75.00', '200g', 10, 'https://4.imimg.com/data4/VG/BU/MY-8058573/99-600x600-500x500.jpg', '2020-11-27 01:48:24'),
(29, 3, 'Amul Chocolate Fudge', '<p><b>Storage Conditions:</p> Freeze</p><br>\r\n\r\n<p>Amul brings you Premium Creme Almond fudge ice cream, a premium for quality dessert for all occasion.</p><p> This is a perfect summertime treat for everyone and with the premium quality ensured, you can consume it without any worries<p>', '40.00', '0.00', '125ml', 10, 'https://5.imimg.com/data5/CA/SO/GLADMIN-24502382/creme-rich-chocolate-fudge-ice-cream-500x500.png', '2020-11-27 01:48:24'),
(30, 3, 'Amul Shrikhand elaichi', '<p><b>Storage conditions:</b> refrigerated</p><br>\r\n\r\n<p>Amul Srikhand Badam Pista is a semi-soft sweetly sour product prepared from lactic fermented curd is quite popular in the north and western part of India and is normally served as a dessert.</p><p> This tasty and delightful combination of cream, new curd, sugar and pasteurized milk; the taste is rich and it leaves a soft creamy touch on the palate.</p>', '100.00', '0.00', '500g Box', 10, 'https://images-na.ssl-images-amazon.com/images/I/71StUKXMC7L._SL1500_.jpg', '2020-11-27 01:58:25'),
(31, 3, 'Amul Almond fudge ', '<p><b>Storage conditions:</b> freeze</p><br>\r\n\r\n<p>Amul brings you Premium Creme Almond fudge ice cream, a premium for quality dessert for all occasion. This is a perfect summer time treat for everyone and with the premium quality ensured, you can consume it without any worries</p>', '45.00', '0.00', '125ml', 10, 'https://assetscdn1.paytm.com/images/catalog/product/F/FA/FASAMUL-ICE-CREBIGB985832593288B6/1562080929813_0.jpg?imwidth=320&impolicy=hq', '2020-11-27 02:16:28'),
(32, 3, 'Amul Fresh Cream', '<p><b>Storage conditions:</b> cool and dry place</p>\r\n<br>\r\n<p>Amul Fresh Cream has been processed to give smooth, consistency and makes mouth-watering preparations. Amul fresh cream sterilized at high temperature and packed aseptically to give safe, rich cream which stays fresh until... Made of fresh & Pure Milk cream.</p>', '197.00', '200.00', '1L', 10, 'https://citybasketstore.com/wp-content/uploads/2019/12/IFreshCream1ltrAMUL3166XX290216_3_B.jpg', '2020-11-27 02:24:13'),
(33, 3, 'Amul Mithai Mate', '<p><b>Storage conditions:</b>refrigerated</p>\r\n<br>\r\n<p>Amul Mithai Mate is much more creamier than competitors available in market Made of Pure Milk FAT Available in very convenient easy to open pack Can be made several milk-based dessert in minutes.</p>', '55.44', '56.00', '200g', 10, 'https://assetscdn1.paytm.com/images/catalog/product/F/FA/FASAMUL-MITHAI-BIGB985832EA38201/1562081412921_0.jpg?imwidth=320&impolicy=hq', '2020-11-27 02:29:17'),
(34, 3, 'nestle Milk Powder', '<p>Kickstart your mornings in the best possible way by sipping a steaming cup of tea or coffee, prepared using the Nestle Everyday Dairy Whitener milk powder. </p><p>This milk powder dissolves completely in your favourite beverage and also gives a thick consistency so you can enjoy a tasty cup of tea/coffee with your family. </p><p>Once opened, transfer the contents of this pack into an airtight container to prevent the milk powder from turning into lumps.</p>Also, keep the container in a cool, dry, and hygienic place at all times. ', '455.00', '490.00', '1kg', 5, 'https://www.basketor.com/pub/media/catalog/product/cache/9c625a5e4f7ab3c97b131c674665ff0a/b/1/b180000461.jpg', '2020-11-27 02:35:01'),
(35, 3, 'Amul masti butter milk', '<p><b>Storage conditions:<b> Under refrigeration(below 8^c)</p>\r\n<br>\r\n<p>Amul Prolife Buttermilk is a refreshing milk based natural drink. It is an easy to use low-calorie drink that refreshes you immediately with goodness of nature.</p><p> It contains probiotic bacteria that improve immunity and digestion.</p>', '195.00', '0.00', '200ml', 5, 'https://www.localitree.com/wp-content/uploads/2018/10/Amul.jpg', '2020-11-27 02:50:33'),
(36, 1, 'Bell Pepper', '<p><b>Storage instruction:</b></p>\r\nTo keep your Bell Peppers tasting great longer, store them in your refrigerator crisper drawer. In the fridge, raw Bell Peppers will last between 1 and 2 weeks. Cooked Bell Peppers will typically last 3-5 days.</p><br>\r\n\r\n<p>Red, Orange, and Yellow Bell Peppers are full of great health benefits—they’re packed with vitamins and low in calories! They are an excellent source of vitamin A, vitamin C, and potassium.</p><p> Bell Peppers also contain a healthy dose of fiber, folate, and iron.</p>', '45.00', '100.00', '250g', 10, 'https://upload.wikimedia.org/wikipedia/commons/8/85/Green-Yellow-Red-Pepper-2009.jpg', '2020-11-27 19:51:16'),
(37, 1, 'Broccoli', '<p><b>Storage instruction:</b>\r\nTo store, mist the unwashed heads, wrap loosely in damp paper towels, and refrigerate. Use within 2 to 3 days. Do not store broccoli in a sealed container or plastic bag.</p><br>\r\n<p>Broccoli is high in many nutrients, including fibre, vitamin C, vitamin K, iron, and potassium. It also boasts more protein than most other vegetables</p>', '100.00', '0.00', '250g', 10, 'https://cdn.apartmenttherapy.info/image/fetch/f_auto,q_auto:eco,c_fill,g_auto,w_800,h_400/https%3A%2F%2Fstorage.googleapis.com%2Fgen-atmedia%2F3%2F2012%2F03%2Fd852987f86aeae8b65926f9e7a260c28285ea744.jpeg', '2020-11-27 20:00:35'),
(38, 1, 'Cauliflower', '<p><b>Storage and Uses</b>\r\nRefrigerate in a loosely sealed plastic bag. It keeps well for up to 7 days. Do not store florets for more than 5 days. Cooked and used in soups, rice, curries, gobi parathas( flatbreads), one of the most liked recipes.</p><br>\r\n<p>Cauliflower is made up of tightly bound clusters of soft, crumbly, sweet cauliflower florets that form a dense head. Resembling a classic tree, the florets are attached to a central edible white trunk which is firm and tender.</p>', '30.00', '37.50', '200g-400g', 10, 'https://i1.wp.com/www.eatthis.com/wp-content/uploads//media/images/ext/407850298/whole-cauliflower.jpg?fit=1024%2C750&ssl=1', '2020-11-27 20:29:54'),
(39, 1, 'Green Chilli - Medium', '<b>Storage Instruction:</b>\r\n<p>To preserve green chillies for a longer period, store them in zip lock bags.</p><p> Just remove the stem part of the chillies and transfer them inside a zip lock bag. Place the bag inside a refrigerator and use the green chillies as and when required.</p>', '11.25', '18.75', '250g', 10, 'https://static.toiimg.com/photo/71877128.cms', '2020-11-27 20:35:15'),
(40, 1, 'Onions', '<p><b>Storage Instruction:</b>\r\nWhole onions and shallots are best stored in a cool, dry, dark and well-ventilated room. Ideal places include the pantry, cellar, basement or garage. Peeled onions can be stored in the fridge for 10–14 days, while sliced or cut onions can be refrigerated for 7–10 days</p>', '64.00', '92.50', '1kg', 5, 'https://images.financialexpress.com/2020/01/1-186.jpg', '2020-11-27 20:39:10'),
(41, 1, 'Potatoes', '<b>Storage Instruction:</b>\r\n<p>Store potatoes in a cool, well-ventilated place.</p>\r\n<p>Keep potatoes out of the light.</p>\r\n<p>Colder temperatures lower than 50 degrees, such as in the refrigerator, cause a potato\'s starch to convert to sugar, resulting in a sweet taste and discoloration when cooked.</p>', '65.00', '0.00', '1kg', 10, 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/are-potatoes-healthy-1570222022.jpg?crop=1.00xw:0.752xh;0.00160xw,0.248xh&resize=1200:*', '2020-11-27 20:43:38'),
(42, 1, 'Pumpkins', '<b>Product Description:</b>\r\n<p>Pumpkin is high in vitamins and minerals while being low in calories. It’s also a great source of beta-carotene, a carotenoid that your body converts into vitamin A</p><br>\r\n<b>Storage Instruction:</b>\r\n<p>Pumpkins should be stored in a cool, dry place. Ideal temperatures are between 50° and 60° F and relative humidity of 50 - 70%</p>', '30.00', '65.00', '200g', 10, 'https://dolcevitawellnessspa.com/wp-content/uploads/2017/10/PumpkinPeel.jpg', '2020-11-27 20:49:59'),
(43, 1, 'Tomatoes', '<b>Product Description:</b>\r\n<p>Fresh tomatoes are low in carbs. The carb content consists mainly of simple sugars and insoluble fibres. These fruits are mostly made up of water</p><br>\r\n<b>Storage Instruction:</b>\r\n<p>Refrigerate them properly (below 41°F) to maintain safe storage. Store freshly cut tomatoes in an airtight plastic container or zip-top bag in the refrigerator. It is best to use them as soon as possible, within 2-3 days. Just remember, refrigeration is necessary whenever you cut into a fresh tomato!</p>', '10.50', '0.00', '500g', 10, 'https://img.etimg.com/thumb/width-1200,height-900,imgsize-194822,resizemode-1,msid-65605440/industry/cons-products/food/prices-of-tomatoes-plunges-to-rs-2-per-kg.jpg', '2020-11-27 20:49:59'),
(44, 1, 'Brinjal', '<b>Product Description:</b>\r\n<p>The eggplant, or aubergine, provides fibre and a range of nutrients. This low-calorie vegetable features in the Mediterranean diet.</p>\r\n<b>Storage Instruction:</b>\r\n<p>Cut the eggplant into approximately one-inch-thick rounds, bake in a 350°F for about 15 to 20 minutes, depending on the size of the eggplant, just until tender. Once cool, place the slices between wax paper to prevent sticking, and store in freezer bags or containers</p>', '40.00', '0.00', '500g', 10, 'https://3.imimg.com/data3/YF/TW/MY-4057379/brinjal-250x250.jpg', '2020-11-27 20:58:20'),
(45, 1, 'Lady Finger', '', '13.86', '18.75', '500g', 10, 'https://img3.exportersindia.com/product_images/bc-full/dir_81/2428679/lady-finger-1382627.jpg', '2020-11-27 20:58:20'),
(46, 1, 'Cabbage', '<b>Product Description:</b>\r\n<p>Cabbage contains powerful antioxidants that may help reduce inflammation. Cabbage is a low-calorie vegetable that is rich in vitamins, minerals and antioxidants.</p><br>\r\n<b>Storage Instruction:</b>\r\n<p>To store cabbage in the refrigerator, remove loose leaves and clip the cabbage so a short stem remains, then wrap the head in a damp paper towel, and place it in a perforated plastic bag in the vegetable crisper section of the refrigerator.</p>', '35.00', '0.00', '500g to 800g ', 10, 'https://edge.bonnieplants.com/www/tiny/uploads/20200810205518/bonnie-hybrid-cabbage-480x360.jpg', '2020-11-27 21:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `item_mc_gross` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL DEFAULT '',
  `address_street` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mobile` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(512) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile`, `address`, `password`, `pincode`) VALUES
(6, 'Blessy', 'Thomas', 'blessythomas20000@gmail.com', '9136355932', 'new panvel, navi mumbai, Maharastra', '1b76cd80ac151d6e11a5909b8ccd6e61', 123456),
(7, 'Binsy', 'Thomas', 'binsythomas2002@gmail.com', '9136245930', 'new panvel, navi mumbai, Maharastra', '68eeceba5e8cec12af2f0679190ab54a', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_c_id` (`c_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txn_id` (`txn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_c_id` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
