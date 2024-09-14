-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: CityLibrarySYS
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `BookID` char(8) NOT NULL,
  `ISBN` char(10) NOT NULL,
  `Title` varchar(80) NOT NULL,
  `Author` varchar(35) NOT NULL,
  `Genre` varchar(20) NOT NULL,
  `Publication` date NOT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Status` enum('A','R','C') NOT NULL,
  `LibraryID` tinyint(4) NOT NULL,
  PRIMARY KEY (`BookID`),
  KEY `LibraryID` (`LibraryID`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`LibraryID`) REFERENCES `libraries` (`LibraryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('A0000000','812911612X','Animal Farm','George Orwell','Novel','1945-08-17','Animal Farm depicts a group of animals who rebel against humans and become their own masters. Things work smoothly at first, and the animals revel in their freedom and have equality. However, the pigs become power-hungry and become the new oppressors of the animals.','R',1),('A0000001','1368051472','Percy Jackson and the Olympians, Book One: The Lightning Thief','Rick Riordan','Fiction','2005-06-28','The Lightning Thief is a light-hearted fantasy about a modern 12-year-old boy who learns that his true father is Poseidon, the Greek god of the sea. Percy sets out to become a hero by undertaking a quest across the United States to find the entrance to the Underworld and stop a war between the gods.','A',2),('A0000002','0141182636','The Great Gatsby','Francis Scott Fitzgerald','Novel','1925-04-10','Set in the Jazz Age around New York City and the fictional Long Island towns of West Egg and East Egg, The Great Gatsby tells the story of Jay Gatsby, a self-made man who dreams of turning back time to regain his first love, Daisy Buchanan.','A',3),('A0000003','9385887300','Pride and Prejudice','Jane Austen','Classics','1813-06-28','Follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.','A',4),('A0000004','009955545X','In the Sea There Are Crocodiles','Fabio Geda','Biographical Fiction','2010-04-22','When a ten-year-old boy s village in Afghanistan falls prey to Taliban rule, his mother shepherds the boy across the border into Pakistan but has to leave him there all alone to fend for himself. Thus begins Enaiat s remarkable and often punishing five-year ordeal.','A',5),('A0000005','0062073486','And Then There Were None','Agatha Christie','Murder Mystery','1939-11-06','Ten strangers, with dark secrets, are invited to an isolated island. As the guests start dying one by one, the survivors must uncover the killer s identity before it s too late.','A',1),('A0000006','1503280780','Moby-Dick','Herman Melville','Adventure Fiction','1851-10-18','The story follows Captain Ahab s self-destructive obsession with the white whale called Moby Dick, even as it endangers his crew.','A',2),('A0000007','0141439572','The Picture of Dorian Gray','Oscar Wilde','Gothic Fiction','1890-07-01','The story follows the life of a young man named Dorian Gray, who has his portrait painted by a talented artist named Basil Hallward. Dorian becomes enamoured with his own beauty and wishes that he could remain young and handsome forever, while his portrait would age in his place.','A',3),('A0000008','8809792688','Mystery tales','Edgar Allan Poe','Mystery','1908-01-01','Posthumous compilations of writings by American author, essayist and poet Edgar Allan Poe and was the first complete collection of his works specifically restricting itself to his suspenseful and related tales.','A',4),('A0000009','8862562586','The Wide Window','Daniel Handler','Gothic Fiction','2000-02-25','The three Baudelaire orphans have been set up with a new guardian, Aunt Josephine. She s afraid of everything, including cooking food, and thus only serves cold food, insists on correcting everyone s grammar, and lives in a house that s nearly falling into a lake, of which she s also afraid.','A',5),('A0000010','1517022290','A Christmas Carol','Charles Dickens','Novel','1843-12-19','The tale follows the journey of a selfish, callous and miserable man called Ebenezer Scrooge, \nas he is forced to reflect upon his life and deeds by four ghosts who visit him on the night of Christmas Eve.','A',1),('A0000011','0141345659','The Fault In Our Stars','John Green','Romance','2012-01-10','A young adult fiction novel that narrates the story of a 16-year-old girl who is diagnosed with cancer. She joins a support group where she meets Augustus, \nand there is a rollercoaster of emotions throughout this novel as the relationship between Hazel and Augustus develops.','A',2),('A0000012','0440993717','The Wave','Todd Strasser','Novel','1981-01-01','The Wave is based on a true story that occurred in a high school in Palo Alto, California, in 1969. \nThe powerful forces of group pressure that pervaded many historic movements such as Nazism are recreated in the classroom when history teacher Burt Ross introduces a new system to his students.','A',3),('A0000013','0241447429','The Boy In The Striped Pyjamas','John Boyne','Novel','2006-01-05','The plot concerns a German boy named Bruno whose father is the commandant of Auschwitz and Bruno s friendship with a Jewish detainee named Shmuel.','A',4),('A0000014','0141315180','The Diary Of A Young Girl','Annelies Marie Frank','Autobiography','1947-06-25','The Diary of a Young Girl is the story of Anne Frank, a Jewish teenager who lived in hiding in Amsterdam during the Holocaust.','A',5),('A0000015','8820055902','The Book Thief','Markus Zusak','Historical Fiction','2005-01-01','The Book Thief is a story narrated by a compassionate Death who tells us about Liesel,\na girl growing up in Germany during World War II. She steals books, learns to read, and finds comfort in words. She and Max, the Jew her family protects, are the only main characters that survive the war.','A',1),('A0000016','0060935464','To Kill a Mockingbird','Harper Lee','Gothic Fiction','1960-07-11','The book is both a young girl s coming-of-age story and a darker drama about the roots and consequences of racism and prejudice, probing how good and evil can coexist within a single community or individual.','A',2),('A0000017','1853260010','Wuthering Heights','Emily Bronte','Novel','1847-12-14','It follows the life of Heathcliff, a mysterious gypsy-like person, from childhood (about seven years old) to his death in his late thirties. Heathcliff rises in his adopted family and then is reduced to the status of a servant, running away when the young woman he loves decides to marry another.','A',3),('A0000018','0452284236','1984','George Orwell','Novel','1949-06-08','The book is set in 1984 in Oceania, one of three perpetually warring totalitarian states (the other two are Eurasia and Eastasia). Oceania is governed by the all-controlling Party, which has brainwashed the population into unthinking obedience to its leader, Big Brother.','A',4),('A0000019','0679734503','Crime and Punishment','Fyodor Dostoevsky','Classics','1866-12-01','Crime and Punishment is a psychological novel exploring the motives and consequences of a young man s decision to commit murder, and his eventual redemption through love and suffering.','A',5),('A0000020','0141439564','Great Expectations','Charles Dickens','Novel','1861-07-01','Great Exhibition or the Crystal Palace Exhibition (in reference to the temporary structure in which it was held), was an international exhibition that took place in Hyde Park, London, from 1 May to 15 October 1851. The event was organized by Henry Cole and Prince Albert.','A',1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libraries`
--

DROP TABLE IF EXISTS `libraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libraries` (
  `LibraryID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `LibraryName` varchar(25) NOT NULL,
  `Street` varchar(25) NOT NULL,
  `Town` varchar(15) NOT NULL,
  `County` varchar(15) NOT NULL,
  `Eircode` char(7) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Supervisor` varchar(35) NOT NULL,
  PRIMARY KEY (`LibraryID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libraries`
--

LOCK TABLES `libraries` WRITE;
/*!40000 ALTER TABLE `libraries` DISABLE KEYS */;
INSERT INTO `libraries` VALUES (1,'City Central Library','Maple Avenue','Galway City','Galway','A65F4E8','(091)6631111','central.library@example.ie','John Smith'),(2,'County Library','Main Street','Ennis','Clare','V93E0X2','(065)1234564','county.library@example.ie','Zelda Hyrule'),(3,'Curiosity Corner Library','Corner Street','Miltown Malbay','Clare','V93E0X9','(065)6354728','curiosity.coner.library@example.ie','Dara Leonard'),(4,'Riverbank Library','Riverside Avenue','Loughrea','Galway','A65F4E2','(091)1234567','riverbank.library@example.ie','Luigi Bros'),(5,'Shannon Library','First Avenue','Shannon','Clare','A65F4E9','(065)7654321','shannon.library@example.ie','Martha Kelly'),(6,'Coastal Library','Ocean View Drive','Salthill','Galway','H91A7K2','(091)9876543','coastal.library@example.ie','Sarah O\'Connor'),(7,'Village Library','Village Road','Oughterard','Galway','H91B2F3','(091)8765432','village.library@example.ie','Michael Murphy'),(8,'Hilltop Library','Mountain Way','Caherlistrane','Galway','H91D2K5','(091)7654321','hilltop.library@example.ie','Eileen Walsh');
/*!40000 ALTER TABLE `libraries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loanitems`
--

DROP TABLE IF EXISTS `loanitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loanitems` (
  `BookID` char(8) NOT NULL,
  `LoanID` smallint(6) NOT NULL,
  `ActualReturnDate` date DEFAULT NULL,
  `Status` enum('O','L') NOT NULL,
  PRIMARY KEY (`BookID`,`LoanID`),
  KEY `LoanID` (`LoanID`),
  CONSTRAINT `loanitems_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`),
  CONSTRAINT `loanitems_ibfk_2` FOREIGN KEY (`LoanID`) REFERENCES `loans` (`LoanID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loanitems`
--

LOCK TABLES `loanitems` WRITE;
/*!40000 ALTER TABLE `loanitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `loanitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loans` (
  `LoanID` smallint(6) NOT NULL AUTO_INCREMENT,
  `MemberID` char(8) NOT NULL,
  `LoanDate` date NOT NULL,
  `ExpDate` date NOT NULL,
  PRIMARY KEY (`LoanID`),
  KEY `MemberID` (`MemberID`),
  CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loans`
--

LOCK TABLES `loans` WRITE;
/*!40000 ALTER TABLE `loans` DISABLE KEYS */;
/*!40000 ALTER TABLE `loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `MemberID` char(7) NOT NULL,
  `Forename` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `DoB` date NOT NULL,
  `Street` varchar(25) NOT NULL,
  `Town` varchar(15) NOT NULL,
  `County` varchar(15) NOT NULL,
  `Eircode` char(7) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(35) DEFAULT NULL,
  `Status` enum('A','I') NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES ('A000000','Sophia','Loren','1956-05-15','Galway Street','Galway City','Galway','A65F4E2','0612345678','not.sophia.loren@gmail.it','A'),('A000001','Mario','Rossi','1966-06-23','Tenth Street','Limerick City','Limerick','A65F4E1','0687654321','mariorossin1@gmail.com','I'),('A000002','Luigi','Bros','1986-09-06','Bros Street','Shannon','Clare','A65F4E3','0611223344','luigibros@yahoo.com','A'),('A000003','Bríd','Nolan','1962-11-30','Barrows Rapids Suite 65','Miltown Malbay','Clare','V95PH39','0600998833','b.nolan@futureshadow.org','A'),('A000004','Dara','Mcgowan','2000-10-08','Satterfield Shores Apt K2','Boganmouth','Limerick','V94VHW3','0637649166','dara.mcgowan@example.ie','A');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-28  8:19:31
