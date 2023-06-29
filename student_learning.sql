-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 07:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE IF NOT EXISTS `bio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `working_status` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`id`, `uid`, `domain`, `working_status`, `about`, `cover_image`) VALUES
(1, 4, 'Machine Learning', 'working professional', 'I am a Data Scientist with a strong background in software engineering; and used to handling a variety of data pipelines and databases, included unstructured ones. I have prototyped four products, and I am looking for product oriented role (also consulting), possibly building from scratch.', 'dream_big_and_work-119831.jpg'),
(2, 5, 'Software Engineer ', 'working professional', 'Working Professional ', 'dream_big_and_work-119831.jpg'),
(3, 1, 'COMPUTER SCIENCE', 'student', 'Student at ASIET', ''),
(4, 2, 'Business Analyst', 'Student', 'Working on a hilarious project!', ''),
(5, 3, '', '', '', ''),
(8, 6, 'AI, ML', 'Male', 'Btech student expert in machine learning algorithms.', ''),
(10, 7, '', '', '', ''),
(13, 8, '', '', '', ''),
(14, 9, '', '', '', ''),
(15, 10, '', '', '', ''),
(16, 11, 'Data Scientist', 'Student', 'ASIETian!', ''),
(17, 12, 'Artificial Intelligence', 'Student', 'A good student!', ''),
(18, 13, '', '', '', ''),
(19, 14, '', '', '', ''),
(20, 6, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `uid`, `title`, `image`, `description`, `date`) VALUES
(1, 5, 'ChatGPT Generates Formulaic Academic Text, Can Be Picked Up by Existing AI-Detection Tools: Study', 'artificial.png', 'Academic style content produced by ChatGPT is relatively formulaic and would be picked up by many existing AI-detection tools, despite being more sophisticated than those produced by previous innovations, according to a new study.\r\n\r\nHowever, the findings should serve as a wake-up call to university staff to think about ways to explain to students and minimise academic dishonesty, researchers from Plymouth Marjon University and the University of Plymouth, UK, said.\r\n\r\nChatGPT, a Large Language Machine (LLM) touted as having the potential to revolutionise research and education, has also prompted concerns across the education sector about academic honesty and plagiarism.', 'March 27, 2023  12:53 PM'),
(2, 5, 'Microsoft Said to Threaten to Restrict Rival Search Engines Data Access Over AI Chat Products', 'openai.png', 'Microsoft Corp. has threatened to cut off access to its internet-search data, which it licenses to rival search engines if they dont stop using it as the basis for their own artificial intelligence chat products, according to people familiar with the dispute.\r\n\r\nThe software maker licenses the data in its Bing search index â€” a map of the internet that can be quickly scanned in real-time â€” to other companies that offer web searches, such as Apollo Global Management Inc.s Yahoo and DuckDuckGo. In February, Microsoft integrated a cousin of ChatGPT, OpenAIs AI-powered chat technology, into Bing.\r\n\r\nRivals quickly moved to roll out their own AI chatbots as the hype built around the buzzy technology. This week, Alphabet Inc.s Google publicly released Bard, its conversational AI product. DuckDuckGo, a search engine that emphasizes privacy, introduced DuckAssist, a feature that uses artificial intelligence to summarize answers to search queries. You.com and Neeva Inc. â€” two newer search engines that debuted in 2021 â€” have also debuted AI-fueled search services, YouChat and NeevaAI.', 'March 27, 2023  12:55 PM'),
(3, 5, 'The impact of ChatGPT and generative AI on jobs of today and tomorrow', 'aw.png', 'The furore around ChatGPT and other innovations in generative AI â€” be it Googleâ€™s Bard or other new AI image tools â€” can be equally exciting for some and overwhelming for many others.\r\n\r\nFrom the point of jobs, let us look at the two sides of the story: the companiesâ€™ side and the jobseekersâ€™ side.', 'May 19, 2023  00:58 AM'),
(4, 2, 'Student Community Learning Platform', 'R.jpg', 'Ive done a project for my Final Semester. The title of the project was Student Community Learning Platform. The main idea of the project is to implement an online platform where students of a particular college can share their projects and research done on any particular technology over a secure network which is locally hosted and is accessible only to students and staff of a particular institution. The motto behind the project is to help build an interactive student/staff community where each user is able to showcase their talents and knowledge gained over an online platform. The content that can be uploaded ranges from any personal project, project ideas, blogs on new technology learnt or any research done on any tech related topics. With the implementation of such a platform the main advantages are for the students as it helps them to refer to works done in the past as well as to connect with the students who own the content for any further queries and doubts. The user is able to upload his/hers personal projects, and other certified projects as well as tech-blogging and has space to display research work and shareable information related to technology. Applicable to all departments across college as it showcases anything innovative that can be put forward for other department students to access.', 'May 17, 2023  11:04 AM'),
(6, 2, '5G Technology in India', '5G-Timeline-Graphics-01.png', '5G is designed to not only deliver faster, better mobile broadband services compared to 4G LTE, but can also expand into new service areas such as mission-critical communications and connecting the massive IoT. This is enabled by many new 5G NR air interface design techniques, such as a new self-contained TDD subframe design.\r\n\r\nThe coming of the age 5G technology will provide hassle free coverage in remote areas across the country that will help in boosting energy efficiency, spectrum and network efficiency.  5G will also usher in the era of technology advances in the country such as Virtual Reality (VR), Augmented Reality (AR) and more. These technologies will have an end-to-end effect on multiple sectors â€“ healthcare, agriculture, education, disaster management and others.', 'May 17, 2023  19:34 PM'),
(7, 1, 'Student Help Desk', 'IT-help-desk.jpg', 'A Student helpdesk system is used to provide user assistance to the students and staff members. Student Helpdesk system provides a simple interface for maintenance of student information. It can be used by educational institutions to maintain the records. The creation and management of accurate up-to-date information is critically important. Student Helpdesk deals with all kinds of information regarding the student. The system utilizes user authentication and displays information that are necessary for individual student. The systems features a complex logging systems to track all the user access and ensure the conformance of data access guidelines and are expected to increase the efficiency of Student Helpdesk System. Thereby, it decreases the efforts needed to access and deliver the information', 'May 19, 2023  00:31 AM'),
(8, 2, 'Why you should protect your privacy', 'Incognito.jpg', 'In our increasingly digital age, many common services require you to provide some of your personal information. Unfortunately, these services donâ€™t always treat your data with respect, and often, if something is â€œfree,â€ then youâ€™re probably paying for it through the sale of your information. Worse, sometimes a legitimate site will get hacked and your otherwise private info ends up online and ready to abuse.\r\n\r\nOne way or another, details about you, your life, and your family may end up in the hands of a data broker or accessible on a people search website. In some cases, potential employers will use information from brokers or people search to look into your history.\r\n\r\nHowever, these same sources could also be used to stalk someone or dox them. Your name, address, phone number, and even connections to family members can potentially be posted online without your notice.\r\n\r\nWith so much potentially at stake between your familyâ€™s personal safety and the chance of identity theft or fraud, keeping your sensitive information off the internet is simply the wise thing to do.', 'June 19, 2023  12:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `certficates`
--

CREATE TABLE IF NOT EXISTS `certficates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `certficates`
--

INSERT INTO `certficates` (`id`, `user_id`, `title`, `description`, `image`) VALUES
(2, 5, 'redhat', 'passed in 2022', 'about-left-image.png'),
(7, 2, 'CS Association - Technical Coordinator', 'certificate of appreciation', 'Certificate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `message` text NOT NULL,
  `userid` int(20) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `reply` text NOT NULL,
  `reply_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sid`, `message`, `userid`, `date_time`, `reply`, `reply_date`) VALUES
(17, 2, 'Hello', 1, '01-06-2023 10:06:15', '', ''),
(28, 2, 'This is the message from Aishwarya to Aakash', 5, '01-06-2023 17:06', '', ''),
(29, 2, 'Abhijith*', 5, '01-06-2023 17:06', '', ''),
(30, 2, 'Message from Abhijith to Aakash', 1, '01-06-2023 17:06', '', ''),
(31, 5, 'Hi this is a message from Aishwarya to Aakash', 1, '01-06-2023 17:06', '', ''),
(32, 5, 'hello', 1, '01-06-2023 18:06', '', ''),
(45, 5, 'This is a message from Aiswarya to Abhijith', 2, '01-06-2023 20:06', '', ''),
(47, 5, '--Testing-- Msg recieved! This is a msg from Abhy to Aishwarya', 2, '02-06-2023 07:06', '', ''),
(48, 5, '-- user flip --', 2, '02-06-2023 07:06', '', ''),
(49, 2, '-- Working --', 5, '02-06-2023 07:06', '', ''),
(50, 2, 'Hello', 5, '02-06-2023 10:06', '', ''),
(53, 2, 'hello dude', 5, '02-06-2023 14:06', '', ''),
(54, 2, '--Check--', 5, '02-06-2023 10:06', '', ''),
(63, 2, 'This is a big test used to test the message alignment !!! Adding some more', 1, '02-06-2023 14:12', '', ''),
(65, 2, 'Checking the date', 5, '02-06-2023 14:38', '', ''),
(68, 2, '-- Testing the date & time --', 5, '02-06-2023 15:25', '', ''),
(69, 5, 'Hello from Aysh', 1, '02-06-2023 16:26', '', ''),
(70, 5, 'ðŸ˜', 1, '02-06-2023 16:27', '', ''),
(71, 5, '-- Testing date & time --', 2, '02-06-2023 16:42', '', ''),
(88, 2, '--Checking real time--', 1, '05-06-2023 01:12', '', ''),
(90, 5, '-- Testing real-time --', 2, '05-06-2023 01:16', '', ''),
(91, 2, '-- Realtime--', 5, '05-06-2023 01:17', '', ''),
(92, 5, '--Checking--', 2, '05-06-2023 01:18', '', ''),
(109, 2, 'New message', 5, '06-06-2023 23:57', '', ''),
(110, 1, 'Check the message', 2, '08-06-2023 21:16', '', ''),
(123, 1, 'Realtime working', 2, '08-06-2023 21:35', '', ''),
(124, 2, 'Scroll working', 1, '08-06-2023 21:36', '', ''),
(125, 1, 'Working?', 2, '08-06-2023 21:47', '', ''),
(126, 1, 'or not', 2, '08-06-2023 21:47', '', ''),
(127, 2, 'ok', 1, '08-06-2023 21:48', '', ''),
(130, 2, 'ok', 5, '14-06-2023 22:28', '', ''),
(131, 2, 'hello', 1, '15-06-2023 12:01', '', ''),
(132, 1, 'ðŸ˜’', 2, '15-06-2023 12:01', '', ''),
(133, 2, 'hi da', 1, '15-06-2023 12:04', '', ''),
(134, 5, 'hi', 6, '15-06-2023 12:14', '', ''),
(135, 2, 'Hello', 5, '16-06-2023 11:51', '', ''),
(137, 2, 'Hello', 5, '16-06-2023 12:22', '', ''),
(138, 5, 'Hi', 2, '16-06-2023 12:23', '', ''),
(139, 5, 'hi', 6, '16-06-2023 13:56', '', ''),
(140, 5, 'Hi dude', 8, '16-06-2023 13:57', '', ''),
(141, 5, 'Hi, my name is Abhijith.', 2, '16-06-2023 15:11', '', ''),
(142, 2, 'hello nice to meet you', 10, '19-06-2023 12:32', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `project_id`, `comment`, `date`) VALUES
(7, 5, 6, 'good project for disease prediction', 'April 12, 2023  19:39 PM'),
(11, 2, 10, 'Good Project', 'May 18, 2023  09:14 AM');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Computer Science Engineering'),
(2, 'Computer Science (AI)'),
(3, 'Electronics and Communication Engineering'),
(4, 'Electrical and Electronics Engineering'),
(5, 'Civil Engineering'),
(6, 'Biomedical');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uid`, `username`, `password`, `type`) VALUES
(6, 1, 'ASI19CS002', 'ASI19CS002', 'student'),
(7, 2, 'ASI19CS007', 'ASI19CS007', 'student'),
(8, 5, 'ASI19CS013', 'ASI19CS013', 'student'),
(12, 6, 'ASI19CS001', 'ASI19CS001', 'student'),
(13, 7, 'ASI19CS003', 'ASI19CS003', 'student'),
(14, 8, 'ASI19CS004', 'ASI19CS004', 'student'),
(15, 9, 'ASI19CS005', 'ASI19CS005', 'student'),
(16, 10, 'ASI19CS006', 'ASI19CS006', 'student'),
(17, 11, 'ASI19CS008', 'ASI19CS008', 'student'),
(18, 12, 'ASI19CS009', 'ASI19CS009', 'student'),
(19, 13, 'ASI19CS010', 'ASI19CS010', 'student'),
(20, 14, 'ASI19CS022', 'ASI19CS022', 'student'),
(21, 6, '', '', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `uid`, `title`, `keywords`, `abstract`, `file`, `date`, `status`) VALUES
(2, 5, 'fraud detection     ', 'machine learning, random forest algorithm, fraud detection', 'Credit card frauds are easy and friendly targets. E-commerce and many other online sites have increased the online payment modes, increasing the risk for online frauds. Increase in fraud rates, researchers started using different machine learning methods to detect and analyse frauds in online transactions. The main aim of the paper is to design and develop a novel fraud detection method for Streaming Transaction Data, with an objective, to analyse the past transaction details of the customers and extract the behavioural patterns. Where cardholders are clustered into different groups based on their transaction amount. Then using sliding window strategy , to aggregate the transaction made by the cardholders from different groups so that the behavioural pattern of the groups can be extracted respectively. Later different classifiers  are trained over the groups separately. And then the classifier with better rating score can be chosen to be one of the best methods to predict frauds. Thus, followed by a feedback mechanism to solve the problem of concept drift . In this paper, we worked with European credit card fraud dataset.', 'disease.pdf', 'April 14, 2023  14:07 PM', 'private'),
(3, 5, 'Social Distancing ', 'Machine learning, deep learning, ai', 'Social distancing refers to a host of public health measures aimed at reducing social interaction between people based on touch or physical proximity. It is a non-pharmaceutical intervention to slow the spread of infectious diseases in the communities. It becomes particularly important as a community mitigation strategy before vaccines or drugs become widely available. This essay describes how a protracted adherence to social distancing guidelines could affect the Indian society. Changes are expected in some of the prevalent cultural norms such as personal space and common good. Gender relations within the family are likely to change in favour of greater sharing of domestic responsibilities between men and women. Older adults may particularly experience stress due to social distancing because of their physical dependency and emotional vulnerability. Working patterns are likely to become more flexible and promotive of social distancing. Human interaction based on digital technology is likely to increase. The implications for public health in India due to such changes are also discussed.', 'NELLIMALA PLAN.pdf', 'May 20, 2023  00:51 AM', 'public'),
(4, 5, 'Women Safety', 'andriod, safety, machine ', 'Womenâ€™s safety is a big concern which has been the most important topic till date. Women safety matters a lot whether at home, outside the home or working place. Few crimes against ladies particularly rape cases were terribly dread and fearful. Most of the women of various ages, till this day are being subjected to violence, domestic abuse, and rape. As ladies ought to travel late night generally, itâ€™s necessary to remain alert and safe. Although the government is taking necessary measures for their safety, still, there are free safety apps for women that can help them to stay safe. Most of the females these days carry their smartphone with them, so it is necessary to have at least one the personal safety apps installed. Such a security app for ladies will definitely facilitate in a way or the opposite. This is user-friendly application that can be accessed by anyone who has installed it in their smart phones. Our intention is to provide you with fastest and simplest way to contact your nearest help. In this system user needs to feed three contact numbers, in case of emergency on moving the phone up and down thrice, the system sends SMS and calls on one of the numbers feeded into the system with the location. The phone starts vibrating and siren starts ringing. This features for both everyday safety and real emergencies, making it an ultimate tool for all.', 'doc.pdf', 'April 11, 2023  17:12 PM', 'public'),
(7, 1, 'Disease Prediction', 'machine learning, random forest algorithm, disease detection', 'This article aims to implement a robust machine-learning model that can efficiently predict the disease of a human, based on the symptoms that he/she possesses. ', 'disease.pdf', 'April 11, 2023  17:18 PM', 'public'),
(8, 2, 'Student Community Learning Platform ', 'Collaborative Filter, Server hosting, Machine Learning, Student Community, Learning Platform', 'The main idea of the project is to implement an online platform where students of a particular college can share their projects and research done on any particular technology over a secure network which is locally hosted and is accessible only to students and staff of a particular institution. The motto behind the project is to help build an interactive student/staff community where each user is able to showcase their talents and knowledge gained over an online platform. The content that can be uploaded ranges from any personal project, project ideas, blogs on new technology learnt or any research done on any tech related topics. This paper covers the various Filtering algorithms & Server hosting. Towards the end of the paper, the future scopes are also discussed.', 'Group 2 - Survey Paper.pdf', 'May 17, 2023  14:51 PM', 'public'),
(10, 8, 'DETECTION OF DOS ATTACKS TOWARDS WI-FI', 'Wi-fi, DoS attacks, intrusion detection', 'WLANs are widely employable in several networking applications because of their mobility, flexibility and availability. With the advent of Internet of Things(IoT) , wi-fi enabled devices have become ubiquitous everywhere especially to set up smart environments such as smart homes ,smart cities, agriculture ,smart healthcare ,etc. Unfortunately, WLANS are susceptible to a wide array of wireless security attacks â€“ say Man In The Middle attacks where an attacker inserts a rogue access point into a vulnerable network. With the WPA3 device gaining popularity ,this opens another way for the attackers to cause potential harm. In a resource-constrained environment , we need an adequate, effective and lightweight mechanism to ensure defence against such deauthentication and disassociation attacks.', 'GRP12_SURVEY PAPER.pdf', 'May 12, 2023  09:44 AM', 'public'),
(11, 13, 'Analysis and Design of a Semi-Active Muffler', 'Acoustics, Analysis, Design, Mechanics, Resonator', 'In this work, a flow reversal resonator fitted with a short-circuit duct connecting the inlet and outlet is analysed and used as a tuneable muffler element, aimed to be used use in a semi-active muffler on an IC-engine.\r\nThe work done can be divided into 3 main parts. 1), a study of what type of valve that could be used to change the acoustical properties of the short-circuit duct. 2), Design of a flow reversal resonator with a controllable valve as the short-circuit. 3), experimental validation in a flow acoustic test rig.\r\nThe flow reversal resonator with a controllable valve as short-circuit is successfully validated to work as tuneable muffler element during laboratory conditions. The same valve concept is simulated in a full scale concept but not validated experimentally on a running IC-engine.', 'group 8.pdf', 'May 12, 2023  09:55 AM', 'public'),
(12, 2, 'Air pollution monitoring system usingÂ IoT', 'Iot, air pollution, sensor', 'Nowadays, the air quality is inferior in almost all metropolitan cities due to air pollution. Due to this human health is getting deteriorated and a lot of diseases have broken out.\r\nAir pollution monitoring systems using IoT can help in measuring air quality by leveraging the internet. In this project, LCD will display air quality in PPM constantly to monitor it regularly while saving essential logs for future usage. Whenever air quality degrades from a benchmark, the system triggers an alarm with the help of MQ135 and MQ6 sensors. These sensors can detect harmful gases in the air and measure the exact amountÂ inÂ realÂ time.', 'GR3.pdf', 'June 15, 2023  19:38 PM', 'private'),
(13, 2, 'Catalytic Potential of Metal-Organic Frameworks for Sustainable Chemistry ', 'Metal-Organic Frameworks, Catalysis, Sustainable Chemistry', 'This project investigates the catalytic properties of metal-organic frameworks (MOFs) for sustainable chemistry. MOFs are porous materials composed of metal ions coordinated to organic ligands, offering unique structural and chemical characteristics that make them attractive catalysts.\r\n\r\nThe research focuses on assessing the viability of MOFs as catalysts for environmentally friendly chemical transformations. Synthesis, characterization, and evaluation of MOFs in oxidation, hydrogenation, and C-C bond formation reactions are conducted. Advanced characterization techniques and mechanistic investigations provide insights into the catalytic pathways and reaction mechanisms.\r\n\r\nBy exploring the catalytic potential of MOFs, this research contributes to the development of sustainable chemistry practices. The findings inform the design and synthesis of novel MOF-based catalysts, enabling more efficient and selective chemical reactions in various industrial processes.', 'Catalytic Potential of Metal.pdf', 'June 19, 2023  13:05 PM', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE IF NOT EXISTS `reaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `project_id`) VALUES
(1, 5, 7),
(2, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `department`, `username`, `password`, `image`) VALUES
(1, 'Aakash A Nair', 'aakashnair2001@gmail.com', '8893622920', 'Male', '2001-04-20', '1', 'ASI19CS002', 'ASI19CS002', 'Aakash A Nair.jpeg'),
(2, 'Abhijith Manoj', 'abhy2817@gmail.com', '8075531983', 'Male', '2000-11-23', '2', 'ASI19CS007', 'ASI19CS007', 'Abhijith Manoj.jpg'),
(5, 'Aishwarya Baiju', 'ayshubaiju7@gmail.com', '7355612288', 'Female', '2000-04-01', '4', 'ASI19CS013', 'ASI19CS013', 'Aishwarya Baiju_.jpg'),
(6, 'Aadhithyanarayanan', 'aadhithyaanil5@gmail.com', '9061639117', 'Male', '2023-05-11', '1', 'ASI19CS001', 'ASI19CS001', '2023-05-11-07-43-07ASI19CS001.jpg'),
(7, 'Abhay Krishnan', 'abhayk@mail.co', '4541458915', 'Male', '2023-05-11', '1', 'ASI19CS003', 'ASI19CS003', '2023-05-22-09-45-222023-05-11-07-44-01ASI19CS003.jpg'),
(8, 'Abhay Sankar K', 'abhaykanjoor@gmail.com', '4512357896', 'Male', '2023-05-11', '1', 'ASI19CS004', 'ASI19CS004', '2023-05-22-09-45-362023-05-11-07-44-40ASI19CS004.jpg'),
(9, 'Abhijith E S', 'abhijithes@mail.co', '2145879632', 'Male', '2023-05-11', '1', 'ASI19CS005', 'ASI19CS005', '2023-05-22-09-45-552023-05-11-07-45-41ASI19CS005.jpg'),
(10, 'Abhijith Jaideep', 'abhijiithjaideep176@gmail.com', '2135468423', 'Male', '2023-05-11', '1', 'ASI19CS006', 'ASI19CS006', '2023-05-11-07-46-28ASI19CS006.jpg'),
(11, 'Abhishek Hareeshan', 'abhishek@mail.co', '9562171963', 'Male', '2023-05-11', '1', 'ASI19CS008', 'ASI19CS008', '2023-05-22-09-46-162023-05-11-07-47-38ASI19CS008.jpg'),
(12, 'Abin P Fransis', 'abin@mail.co', '9446740358', 'Male', '2023-05-11', '1', 'ASI19CS009', 'ASI19CS009', '2023-05-22-09-46-422023-05-11-07-48-19ASI19CS009.jpg'),
(13, 'Adith Menon', 'adithmenonc@gmail.com', '4578632192', 'Male', '2023-05-11', '1', 'ASI19CS010', 'ASI19CS010', '2023-05-22-09-47-062023-05-11-07-48-55ASI19CS010.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
