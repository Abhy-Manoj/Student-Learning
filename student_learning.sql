-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 12:51 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`id`, `uid`, `domain`, `working_status`, `about`, `cover_image`) VALUES
(1, 4, 'Machine Learning', 'working professional', 'I am a Data Scientist with a strong background in software engineering; and used to handling a variety of data pipelines and databases, included unstructured ones. I have prototyped four products, and I am looking for product oriented role (also consulting), possibly building from scratch.', 'dream_big_and_work-119831.jpg'),
(2, 5, 'Software Engineer ', 'working professional', 'Working Professional ', ''),
(3, 1, '', '', '', ''),
(4, 2, '', '', '', ''),
(5, 3, '', '', '', ''),
(6, 4, '', '', '', ''),
(7, 5, '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `uid`, `title`, `image`, `description`, `date`) VALUES
(1, 5, 'ChatGPT Generates Formulaic Academic Text, Can Be Picked Up by Existing AI-Detection Tools: Study', 'artificial.png', 'Academic style content produced by ChatGPT is relatively formulaic and would be picked up by many existing AI-detection tools, despite being more sophisticated than those produced by previous innovations, according to a new study.\r\n\r\nHowever, the findings should serve as a wake-up call to university staff to think about ways to explain to students and minimise academic dishonesty, researchers from Plymouth Marjon University and the University of Plymouth, UK, said.\r\n\r\nChatGPT, a Large Language Machine (LLM) touted as having the potential to revolutionise research and education, has also prompted concerns across the education sector about academic honesty and plagiarism.', 'March 27, 2023  12:53 PM'),
(2, 5, 'Microsoft Said to Threaten to Restrict Rival Search Engines Data Access Over AI Chat Products', 'openai.png', 'Microsoft Corp. has threatened to cut off access to its internet-search data, which it licenses to rival search engines if they dont stop using it as the basis for their own artificial intelligence chat products, according to people familiar with the dispute.\r\n\r\nThe software maker licenses the data in its Bing search index â€” a map of the internet that can be quickly scanned in real-time â€” to other companies that offer web searches, such as Apollo Global Management Inc.s Yahoo and DuckDuckGo. In February, Microsoft integrated a cousin of ChatGPT, OpenAIs AI-powered chat technology, into Bing.\r\n\r\nRivals quickly moved to roll out their own AI chatbots as the hype built around the buzzy technology. This week, Alphabet Inc.s Google publicly released Bard, its conversational AI product. DuckDuckGo, a search engine that emphasizes privacy, introduced DuckAssist, a feature that uses artificial intelligence to summarize answers to search queries. You.com and Neeva Inc. â€” two newer search engines that debuted in 2021 â€” have also debuted AI-fueled search services, YouChat and NeevaAI.', 'March 27, 2023  12:55 PM'),
(3, 5, 'The impact of ChatGPT and generative AI on jobs of today and tomorrow\n', 'aw.png', 'The furore around ChatGPT and other innovations in generative AI â€” be it Googleâ€™s Bard or other new AI image tools â€” can be equally exciting for some and overwhelming for many others.\r\n\r\nFrom the point of jobs, let us look at the two sides of the story: the companiesâ€™ side and the jobseekersâ€™ side.', 'March 27, 2023  13:00 PM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `certficates`
--

INSERT INTO `certficates` (`id`, `user_id`, `title`, `description`, `image`) VALUES
(1, 5, 'aws', 'passed in 2020', 'flower.png'),
(2, 5, 'redhat', 'passed in 2022', 'about-left-image.png'),
(3, 1, 'redhat', 'passed in 2022', 'about-left-image.png');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `project_id`, `comment`, `date`) VALUES
(2, 5, 3, 'super project..relevent topic', 'March 30, 2023  09:41 AM'),
(3, 2, 3, 'super project..relevent topic', 'March 30, 2023  09:41 AM'),
(4, 5, 1, 'bad', 'March 30, 2023  10:16 AM'),
(5, 4, 3, 'thanks for your response', 'March 30, 2023  10:27 AM'),
(6, 5, 4, 'good project', 'April 12, 2023  19:28 PM'),
(7, 5, 6, 'good project for disease prediction', 'April 12, 2023  19:39 PM'),
(8, 5, 6, 'rr', 'April 12, 2023  19:41 PM'),
(9, 5, 6, 'qqq', 'April 12, 2023  19:42 PM'),
(10, 5, 4, 'wert', 'April 12, 2023  19:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Computer Science Engineering'),
(2, 'Computer Science (AI)'),
(3, 'Electronics and Communication Engineering'),
(4, 'Electrical and Electronics Engineering'),
(5, 'Civil Engineering');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uid`, `username`, `password`, `type`) VALUES
(6, 1, 'ASI19CS002', 'ASI19CS002', 'student'),
(7, 2, 'ASI19CS007', 'ASI19CS007', 'student'),
(8, 5, 'ASI19CS013', 'ASI19CS013', 'student');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `uid`, `title`, `keywords`, `abstract`, `file`, `date`, `status`) VALUES
(2, 5, 'fraud detection     ', 'machine learning, random forest algorithm, fraud detection', 'Credit card frauds are easy and friendly targets. E-commerce and many other online sites have increased the online payment modes, increasing the risk for online frauds. Increase in fraud rates, researchers started using different machine learning methods to detect and analyse frauds in online transactions. The main aim of the paper is to design and develop a novel fraud detection method for Streaming Transaction Data, with an objective, to analyse the past transaction details of the customers and extract the behavioural patterns. Where cardholders are clustered into different groups based on their transaction amount. Then using sliding window strategy , to aggregate the transaction made by the cardholders from different groups so that the behavioural pattern of the groups can be extracted respectively. Later different classifiers  are trained over the groups separately. And then the classifier with better rating score can be chosen to be one of the best methods to predict frauds. Thus, followed by a feedback mechanism to solve the problem of concept drift . In this paper, we worked with European credit card fraud dataset.', 'disease.pdf', 'April 14, 2023  14:07 PM', 'private'),
(3, 5, 'social Distancing', 'Machine learning, deep learning, ai', 'Social distancing refers to a host of public health measures aimed at reducing social interaction between people based on touch or physical proximity. It is a non-pharmaceutical intervention to slow the spread of infectious diseases in the communities. It becomes particularly important as a community mitigation strategy before vaccines or drugs become widely available. This essay describes how a protracted adherence to social distancing guidelines could affect the Indian society. Changes are expected in some of the prevalent cultural norms such as personal space and common good. Gender relations within the family are likely to change in favour of greater sharing of domestic responsibilities between men and women. Older adults may particularly experience stress due to social distancing because of their physical dependency and emotional vulnerability. Working patterns are likely to become more flexible and promotive of social distancing. Human interaction based on digital technology is likely to increase. The implications for public health in India due to such changes are also discussed.', 'NELLIMALA PLAN.pdf', 'April 14, 2023  13:58 PM', 'public'),
(4, 5, 'Women Safety', 'andriod, safety, machine ', 'Womenâ€™s safety is a big concern which has been the most important topic till date. Women safety matters a lot whether at home, outside the home or working place. Few crimes against ladies particularly rape cases were terribly dread and fearful. Most of the women of various ages, till this day are being subjected to violence, domestic abuse, and rape. As ladies ought to travel late night generally, itâ€™s necessary to remain alert and safe. Although the government is taking necessary measures for their safety, still, there are free safety apps for women that can help them to stay safe. Most of the females these days carry their smartphone with them, so it is necessary to have at least one the personal safety apps installed. Such a security app for ladies will definitely facilitate in a way or the opposite. This is user-friendly application that can be accessed by anyone who has installed it in their smart phones. Our intention is to provide you with fastest and simplest way to contact your nearest help. In this system user needs to feed three contact numbers, in case of emergency on moving the phone up and down thrice, the system sends SMS and calls on one of the numbers feeded into the system with the location. The phone starts vibrating and siren starts ringing. This features for both everyday safety and real emergencies, making it an ultimate tool for all.', 'doc.pdf', 'April 11, 2023  17:12 PM', 'public'),
(6, 5, 'Disease Prediction', 'machine learning, random forest algorithm, disease detection', 'This article aims to implement a robust machine-learning model that can efficiently predict the disease of a human, based on the symptoms that he/she possesses. ', 'disease.pdf', 'April 11, 2023  17:18 PM', 'public'),
(7, 1, 'Disease Prediction', 'machine learning, random forest algorithm, disease detection', 'This article aims to implement a robust machine-learning model that can efficiently predict the disease of a human, based on the symptoms that he/she possesses. ', 'disease.pdf', 'April 11, 2023  17:18 PM', 'public');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `department`, `username`, `password`, `image`) VALUES
(1, 'Aakash A Nair', 'aakashnair2001@gmail.com', '8893622920', 'Male', '2001-04-20', '1', 'ASI19CS002', 'ASI19CS002', 'Aakash A Nair.jpeg'),
(2, 'Abhijith Manoj', 'abhy2817@gmail.com', '8075531983', 'Male', '2000-11-23', '2', 'ASI19CS007', 'ASI19CS007', 'Abhijith Manoj.jpg'),
(5, 'Aishwarya Baiju', 'roshanjose23@gmail.com', '7355612288', 'Male', '2000-04-01', '4', 'ASI19CS013', 'ASI19CS013', 'Aishwarya Baiju_.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
