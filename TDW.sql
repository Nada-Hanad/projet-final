-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 19, 2023 at 11:23 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdw_php`
--
CREATE DATABASE IF NOT EXISTS `tdw_php` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tdw_php`;

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `username`, `mot_de_passe`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `AdminParams`
--

CREATE TABLE `AdminParams` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `valeur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AdminParams`
--

INSERT INTO `AdminParams` (`id`, `nom`, `valeur`) VALUES
(1, 'mainColor', '0,222,90'),
(2, 'ideeRecettePourcentage', '70');

-- --------------------------------------------------------

--
-- Table structure for table `Diaporama`
--

CREATE TABLE `Diaporama` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Diaporama`
--

INSERT INTO `Diaporama` (`id`, `url`) VALUES
(1, 'http://localhost/Projet_Final/public/recipe/2'),
(5, 'http://localhost/Projet_Final/public/recipe/1'),
(7, 'http://localhost/Projet_Final/public/news/show/1');

-- --------------------------------------------------------

--
-- Table structure for table `Etape`
--

CREATE TABLE `Etape` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `ordre` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Etape`
--

INSERT INTO `Etape` (`id`, `description`, `ordre`, `id_recette`) VALUES
(1, 'Faire revenir la viande dans de l\'huile. Ajouter les oignons faire revenir quelques minutes.', 1, 1),
(2, 'Ajouter les tomates mixées, le concentre de tomate ainsi que les epices et les légumes (carottes et cèleri).', 2, 1),
(3, 'Je laisse revenir le tout afin que la sauce s’imprègne d’épices.', 3, 1),
(4, 'Ajouter 1,5 L d\'eau ainsi que les pois-chiche couvrir et laisser cuire.', 4, 1),
(5, 'Quand la viande a presque cuit on ajoute le reste des légumes (courgettes, pomme de terre et navet). On continue la cuisson.', 5, 1),
(6, 'En fin de cuisson on rectifie l\'assaisonnement (je rajoute une pincée de cannelle en fin de cuisson). Place la viande dans un assiette.', 6, 1),
(7, 'Dresser le couscous dans une grande assiette creuse, placer la viande au centre, les légumes autour et arroser de sauce et pois chiche.', 7, 1),
(8, 'Accompagner de Lben', 8, 1),
(9, 'Retirer les graines de potimarron et le couper en gros cubes (garder la peau). Éplucher les pommes de terre et les couper en cubes. Émincer l\'oignon.', 1, 2),
(10, 'Faire fondre le beurre dans une poêle et ajouter l\'oignon. Ajouter les cubes de potimarron et les pommes de terre. Faire sauter à feu moyen pendant 20 minutes.', 2, 2),
(11, 'Retirer la poêle du feu et verser la crème liquide. Saler et poivrer et ajouter une pincée de muscade.', 3, 2),
(12, 'Transvaser le contenu de la poêle dans un plat à gratin. Parsemer de fromage.', 4, 2),
(13, 'Enfourner dans le four préchauffé à 180 C (350 F) environ 30 à 35 minutes ou jusqu’à ce que la surface soit dorée.', 5, 2),
(14, 'A la sortie du four laisser reposer 5 minutes avant de servir.', 6, 2),
(43, 'Éplucher et couper grossièrement les légumes.', 0, 906),
(44, 'Dans une cocotte faire revenir la viande préalablement coupée en petits morceaux avec de l’huile.', 1, 906),
(45, 'Ajouter l\'oignon haché ainsi que les les tomates et laisser revenir.\r\n', 2, 906),
(46, 'Ajouter les épices (curcuma, gingembre, paprika, cannelle, sel et poivre).\r\n', 3, 906),
(47, 'Incorporer les légumes ainsi que le céleri (branches et feuilles) et la coriandre.\r\n', 4, 906),
(48, 'Ajouter les pois chiches (j\'utilise les pois chiche en conserve que je rajoute en fin de cuisson). Verser l\'eau (environ 1L à 1,5L) et porter à ébullition pendant 20 min.\r\n', 5, 906),
(49, 'Ajouter le concentré de tomate. Fermer la cocotte et laisser cuire.\r\n', 6, 906),
(50, 'Une fois la viande et les légumes bien cuits, faire passer la chorba dans une passoire pour récupérer le bouillon.\r\n', 7, 906),
(51, 'Retirer les carottes, la courgette, le céleri, la viande et remettre le reste avec le bouillon. Passer ce que vous avez obtenu au moulin à légumes.\r\n', 8, 906),
(52, 'Porter le tout à ébullition et ajouter la botte de menthe (na3na3 l’ftour ficelée). Rectifier l’assaisonnement.\r\n', 9, 906),
(53, 'Ajouter les vermicelles tout en remuant sans baisser le feu. Les cheveux d\'ange cuisent très vite, il faut compter environ 10 min.\r\n', 10, 906),
(54, 'Si la chorba est assez liquide rajouter des cheveux d\'ange et si au contraire un peu épaisse ajouter un peu d\'eau chaude (selon le goût).\r\n', 11, 906),
(55, 'Retirer du feu et remettre Les morceaux de viande dans la soupe.\r\n', 12, 906),
(56, 'Avant de servir parsemer de cannelle et de feuille de menthe.\r\n', 13, 906),
(57, 'Faire chauffer l\'huile dans une marmite ou couscoussier c\'est plus pratique, ajouter les morceaux de poulet et faire dorer de tous les cotes.\r\n', 0, 907),
(58, 'Ajouter l\'oignon râpé ainsi que les épices. Laisser revenir quelques minutes.\r\n', 1, 907),
(59, 'Verser 1 L d\'eau l’eau ainsi que les pois chiches si elles sont trempes la veille (je rajoute a la fin des pois chiche en conserve) couvrir et laisser cuire.\r\n', 2, 907),
(60, 'Verser 2 c-a-soupe d’huile d’olives à la rechta fraîche et vérifier si la sauce commence a bouillir.\r\n', 3, 907),
(61, 'Disposer la rechta dans le haut du couscoussier et le même procédé que le couscous après la 1 ere évaporation laisser cuire 15 minutes.\r\n', 4, 907),
(62, 'Verser la rechta dans une gas3a ou un grand plat en général j\'utilise un grand moule a cake en métal.\r\n', 5, 907),
(63, 'Retirer une louche d\'eau de cuisson et asperger la rechta tout en la détachant.\r\n', 6, 907),
(64, 'Remettre la rechta dans le haut du couscoussier et à la 1 ère évaporation laisser cuire une quinzaine de minute.\r\n', 7, 907),
(65, 'Verser une seconde fois la rechta dans une gas3a, retirer le poulet ou la viande qui est cuite et ajouter les légumes coupées dans le sens de la longueur à la sauce, laisser cuire les légumes.\r\n', 8, 907),
(66, 'Quand les légumes sont cuits tester en enfonçant la lame du couteau qui doit traverser facilement, disposer la rechta dans un grand plat creux, déposer autour les légumes et arroser de sauce et pois chiche.\r\n', 9, 907),
(67, 'Faire bouillir un bol d\'eau le verser sur un citron coupé en rondelles laisser infuser jusqu’à refroidissement.', 0, 911),
(68, 'Dans une carafe ou une bouteille mettre le jus de 3 citrons, le sucre, la fleur d oranger et le lait. Bien mélanger.\r\n', 1, 911),
(69, 'Ajouter le citron infusé qui aura refroidit. Gouter et ajouter du sucre selon le gout de chacun.\r\n', 2, 911),
(70, 'Placer au frais jusqu’à moment du ftour.\r\n', 3, 911),
(83, 'Dans une poêle sur feu doux, faire fondre le beurre avec l’huile puis faire dorer l’oignon émincé. Ajouter la viande hachée, les épices, saler et poivrer puis remuer jusqu’à ce que la viande cuise et le liquide soit complètement absorbé. Retirer du feu puis ajouter la coriandre et le persil ciselé, l’oeuf battu en omelette et le fromage découpé en petits morceaux, laisser refroidir.', 0, 913),
(84, 'Faire fondre les 50 g de beurre .\r\n', 1, 913),
(85, 'Dérouler les feuilles de filo en prenant soin de les garder sous un linge propre pour éviter qu’elles se désechent .\r\nSur le plan de travail, déposer une feuilles de filo plier la en deux sur la longueur.', 2, 913),
(86, 'Déposer tout au long du bord de la feuille de filo 2 à 2,5 cm de farce. Rouler la feuille de pastilla autour de la farce pour obtenir un long boudin. Enrouler le boudin de Mhancha sur lui-même pour lui donner une forme d’escargot.\r\nRépéter l’opération pour obtenir 7 Mhancha.', 3, 913),
(87, 'Déposer les Mhancha sur une plat allant au four chemisé de papier cuisson, les badigeonner de smen ou de beurre fondu .', 4, 913),
(88, 'Faire cuire les Mhanche dans un four préchauffé à 190°C pendant environ 20 à 25 minutes jusqu’à ce qu’elles prennent une belle couleur dorée .', 5, 913),
(89, 'Servir les Mhancha nature ou décorées d’amandes effilées, de sucre glace et de cannelle.\r\nBonne réalisation et bonne dégustation !', 6, 913),
(90, 'Dans un saladier, mettez la semoule non cuite, le jus des citrons et l\'huile d\'olive.', 0, 912),
(91, 'Ajoutez-y les tomates coupées en petits morceaux, l\'oignon émincé, et les herbes hachées. Salez et poivrez.', 1, 912),
(92, 'Mélangez bien et laissez 2 heures au frais. La semoule va gonfler grâce à l\'huile d\'olive et au jus de citron. Mélangez bien avant de servir.', 2, 912),
(93, 'Et voilà, votre taboulé est prêt !', 3, 912),
(150, 'Dans une jatte mettez la farine, le sel et ajoutez le beurre fondu. Incorporez bien le gras en frottant le tout entre les mains, ajoutez la fleur d’oranger et l’eau pour obtenir une pâte souple.', 0, 914),
(151, 'Divisez la pâte en 8 parties égales et faites des boules. Couvrez avec un papier film et laissez reposer au moins 2h.', 1, 914),
(152, 'Mélangez tous les ingrédients de la farce y compris le beurre fondu. Sur un plan de travail farinez et étalez une boule de pâte avec un rouleau et tirez sur le bord avec les doigts sans la déchirer.', 2, 914),
(153, 'Beurrez un plateau et mettez la feuille de pâte sans l’abîmer VOIR PHOTOS', 3, 914),
(154, 'Beurrez la feuille de pâte avant de mettre la 2eme. Faites la même chose pour les 2 autres et versez ensuite la farce et couvrez avec les 4 feuilles de pâte que vous travaillez de la même façon que celles de base.', 4, 914),
(155, 'Beurrez la dernière feuille et commencez a tracer sans les couper les losanges de la baklawa. Piquer dans chaque losange une amande entière et coupez les.', 5, 914),
(156, 'Enfournez a 180° pour environ 50 minutes à 1 heure. Surveillez la cuisson régulièrement. A la sortie du four , arrosez la baklawa de miel jusqu’à ce qu’il dépasse la surface de la baklawa.', 6, 914),
(157, 'Laissez toute une nuit ou une journée pour qu’elle absorbe totalement le miel. Le lendemain coupé en losanges et mettes les baklawa dans des caissettes en  papiers.', 7, 914);

-- --------------------------------------------------------

--
-- Table structure for table `Fêtes`
--

CREATE TABLE `Fêtes` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `saison` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ingredient`
--

INSERT INTO `Ingredient` (`id`, `nom`, `description`, `image`, `saison`) VALUES
(1, 'Viande', 'La viande est une excellente source de protéines animales, dont la composition en acides aminés est équilibrée. Elles représentent en moyenne 20% du poids total de produit. La teneur en lipides varie avec les types de viande (de 3 à 23%). Ainsi les viandes blanches sont pauvres en graisses tandis que le porc et le bœuf sont plus riches. Cependant dans un même animal, les apports en lipides varient avec le morceau choisi. Par exemple, la noix de veau est beaucoup moins grasse que la côte de veau. Il y a autant d\'acides gras monoinsaturés (AGMI) que d\'acides gras saturés (AGS) et très peu d\'acides gras polyinsaturés (sauf dans le cœur, le foie ou les rognons). La viande contient aussi des acides gras trans (AGT) qui sont d\'origine naturelle, fabriqués dans le rumen des bœufs ou de l\'agneau. En plus de ses teneurs élevées en fer, la viande apporte du fer héminique. Il représente 50 à 80 % du fer de la viande selon les espèces et est mieux absorbé que le fer non héminique présent dans les légumes, les légumes secs ou les céréales. D’autre part, la viande améliore de deux à trois fois l’absorption du fer non héminique des autres aliments qui l’accompagne au cours du repas. La viande constitue l’une des meilleurs sources alimentaires de zinc avec à la fois des teneurs importants (2 à 7 mg/100g) et une très bonne biodisponibilité par rapport au zinc des autres sources d’aliment. Elle fait également partie des aliments qui contiennent le plus de sélénium soit 6 à 14 µg/100g pour les viandes en moyenne et jusqu’à 90 pour le foie ou 116 pour les rognons. La viande représente aussi une source majeure de vitamines PP, B6 et tout particulièrement la vitamine B12 qui est exclusivement présente dans les produits d’origine animale. Tous les morceaux de viande pou de produits tripiers sont riches en vitamine B12 : 100 g suffisent à couvrir 50 à 100 % des apports nutritionnels conseillés (ANC).', 'https://images.unsplash.com/photo-1565988845864-9e8e0ba7aa42?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80', ''),
(2, 'Pommes de terre', 'La pomme de terre est un légume considéré comme un féculent en raison de sa richesse en amidon (fécule). Si elle représente une bonne source de glucides complexes, elle offre également de bonnes teneurs en vitamine C et minéraux. Pour profiter de ses atouts nutritionnels, mieux vaut opter pour un mode de cuisson sans matière grasse, et la consommer avec sa peau. La cuisson est par ailleurs nécessaire à la bonne assimilation de son amidon.\r\nLa pomme de terre renferme 77% d’eau, contre plus de 90 % pour les légumes verts.\r\n\r\nSon taux de glucides est de 3 à 5 fois plus important que celui de la plupart des légumes frais. Ces glucides sont essentiellement constitués d’amidon (90 %), et de petites quantités de glucose, saccharose et fructose. Les protéines sont également  bien représentées. Les lipides en revanche ne sont présents qu’à l’état de traces.\r\n\r\nLa pomme de terre est source de vitamine C et de vitamines du groupe B, notamment B1 et B3.\r\n\r\nElle apporte aussi une quantité importante de minéraux : potassium, phosphore, magnésium ; ainsi que de nombreux oligo-éléments : fer, zinc, cuivre, manganèse…\r\nSes fibres sont peu abondantes (1g aux 100 g, contre 2,5 à 3,5 g pour les légumes verts).  Elles se composent d’hémicelluloses et de pectines.\r\n\r\nLes pommes de terre rouges et violettes renferment également des antioxydants : flavonoïdes (anthocyanines), lutéine et zéaxanthine.', 'https://images.unsplash.com/photo-1603048719539-9ecb4aa395e3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2084&q=80', ''),
(3, 'Carotte', 'Les bienfaits de la carotte proviennent pour beaucoup du béta-carotène qu\'elle contient. C\'est un puissant antioxydant qui lutte contre les radicaux libres responsables du vieillissement. Ainsi, il améliore l\'état de la peau en favorisant sa régénération et sa cicatrisation. Quelques gouttes d\'huile de carotte dans la crème de jour permet de nourrir et renforcer la peau contre les rayons du soleil, tout en lui apportant bonne mine grâce à ses pigments orangés. En application sur les cheveux, ses propriétés nourrissantes, régénératrices et réparatrices sont efficaces contre les cheveux secs et cassants mais aide également à maîtriser le volume des cheveux frisés et crépus. Par ailleurs, sa richesse en fibres joue un rôle important sur le bon fonctionnement du système digestif. Elle agit aussi bien en régulant le transit pour lutter contre la constipation que comme anti-diarrhéique, sous forme de soupe ou de purée, grâce au fort pouvoir de rétention d\'eau de ses fibres (et notamment la pectine). Celles-ci contribuent également à une sensation de satiété plus précoce qui ajoutée à sa faible teneur en calories et son pouvoir anti-cholesterol, font de la carotte un allié minceur. Le Programme National Nutrition Santé recommande de consommer chaque jour au moins 5 portions (de 80 g minimum) de fruits ou de légumes et de profiter au maximum de leur variété saisonnière. Une portion représente le volume d\'un poing fermé. Concernant les légumes c\'est par exemple : 1 carotte.\r\n\r\nQuel est son apport nutritionnel ?\r\nUne carotte crue est constituée majoritairement d\'eau (88 %)  et 7,6%  de glucides (7,6%  en moyenne). Cette concentration en glucides est supérieure aux celles des autres légumes. Par contre elle contient une faible teneur en protéines (0,6 %), et quasi nulle en lipides. Avec une concentration en fibres de 2,7%, la carotte est au dessus de la moyenne des légumes.  Par ailleurs, elle est très riche en vitamines et minéraux dont principalement la provitamine A ou béta carotène, les vitamines B9, C et E, le potassium et le calcium. ', 'https://images.unsplash.com/photo-1606355601253-61a57fe375e7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Y2Fycm90fGVufDB8MnwwfHw%3D&auto=format&fit=crop&w=800&q=60', ''),
(4, 'Oignon', 'L’oignon est un aromate universel, consommé dans toutes les régions du monde. Il en existe plusieurs variétés, dont certaines sont particulièrement riches en antioxydants. L’oignon fait partie de la grande famille des alliacés et, tout comme l’ail, on lui attribue certaines propriétés bénéfiques pour la santé. Côté cuisine, il est un ingrédient incontournable et se retrouve dans de nombreuses spécialités culinaires bien françaises.\r\n        L’oignon est une source de manganèse pour la femme, les besoins en manganèse étant supérieurs chez l’homme. Le manganèse agit comme cofacteur de plusieurs enzymes qui facilitent une douzaine de différents processus métaboliques. Il participe également à la prévention des dommages causés par les radicaux libres.\r\n\r\nDe plus, l’oignon est une source de vitamine B6. La vitamine B6, aussi appelée pyridoxine, fait partie de coenzymes qui participent au métabolisme des protéines et des acides gras ainsi qu’à la fabrication des neurotransmetteurs (messagers dans l’influx nerveux). Elle collabore également à la production des globules rouges et leur permet de transporter davantage d’oxygène. La pyridoxine est aussi nécessaire à la transformation du glycogène en glucose et elle contribue au bon fonctionnement du système immunitaire. Enfin, cette vitamine joue un rôle dans la formation de certaines composantes des cellules nerveuses.\r\n\r\nEnfin, l’oignon est une source de vitamine C. Le rôle que joue la vitamine C dans l’organisme va au-delà de ses propriétés antioxydantes; elle contribue aussi à la santé des os, des cartilages, des dents et des gencives. De plus, elle protège contre les infections, favorise l’absorption du fer contenu dans les végétaux et accélère la cicatrisation.', 'https://images.unsplash.com/photo-1620574387735-3624d75b2dbc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8b25pb258ZW58MHwyfDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(5, 'Courgette', 'Peu calorique, riche en eau (83,6 à 93,8 g/100g), la courgette apporte 16,5 kcal/100 crue et 15,5 kcal/100 g cuite1; 2, soit 0,8 à 0,7 % des apports énergétiques conseillés pour un adulte. Crue, elle est source de vitamine C, de vitamine B9 et contribue aux apports de potassium, manganèse et vitamines B2 et B6. Cuite, la courgette reste source de vitamine B9 et contribue aux apports de phosphore et cuivre. Elle se démarque par une teneur intéressante en lutéine et en zéaxanthine3,des caroténoïdes non facteurs de provitamine A.\r\n\r\nUne courgette pèse en moyenne 200 à 300 g.\r\nLa courgette est principalement constituée d’eau (83,6 % crue, 93,8 % cuite) : c’est un légume idéal pour contribuer aux apports en eau quotidiens. Ces derniers, estimés en moyenne à 2,5 litres par jour, sont assurés par l’eau de composition des aliments (1 litre) et l’eau de boisson (1,5 litre) sous toutes ses formes (eau, thé, café, tisanes….). Les 400 à 500 g de fruits et légumes recommandés par jour dans le cadre du Programme National Nutrition Santé5 apportent en moyenne 340 à 475 ml d’eau, soit le tiers voire la moitié de l’eau des aliments. Consommer quotidiennement une quantité suffisante de fruits et légumes est conseillé pour s’assurer de bons apports en eau et une bonne hydratation de l’organisme. De quoi nous motiver à inviter régulièrement la courgette dans nos menus.', 'https://images.unsplash.com/photo-1495026206962-e8b160431ffe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Y291cmdldHRlfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=800&q=60', ''),
(6, 'Pois chiche', 'Le pois chiche appartient à la famille des légumes secs1. Il concilie de nombreux atouts nutritionnels : un apport de protéines et de glucides, peu de matières grasses de bonne qualité, ainsi qu’une richesse en fibres et vitamine B9. Indispensable ingrédient du couscous ou du traditionnel houmous, il permet de créer de savoureuses recettes de l’apéritif au dessert.\r\n        Le pois chiche cuit apporte 147 kcal/100 g. C’est un bon contributeur à l’apport d’énergie, de protéines végétales, de glucides sous forme d’amidon, de fibres, de plusieurs minéraux (phosphore, cuivre, manganèse…) et de vitamine B9. Le pois chiche contient des polyphénols dont des flavonoïdes aux propriétés anti-oxydantes, ainsi que des phytostérols et des saponines qui participent à la prévention de maladies comme les maladies cardiovasculaires ou encore certains cancers.\r\n        Le pois chiche fait partie de la famille des légumes secs (lentilles, pois cassés, haricots rouges…) longtemps considérée comme « la protéine des pauvres ». Ses nombreux atouts en font aujourd’hui un partenaire pour notre santé.\r\n\r\n\r\n', 'https://images.unsplash.com/photo-1596564823703-d28706a620e8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cG9pcyUyMGNoaWNoZXxlbnwwfDB8MHx8&auto=format&fit=crop&w=800&q=60', ''),
(7, 'Cèleri', 'Ce légume riche en eau et faiblement calorique contient de nombreux nutriments protecteurs : fibres, minéraux et oligo-éléments, vitamines A, B, C et K, polyphénols anti-oxydants. Utilisé durant des siècles par plusieurs médecines traditionnelles, il apparaît préventif des maladies cardio-vasculaires, avec un intérêt particulier pour réguler la tension artérielle et semble avoir des effets neuro-protecteurs. Ses atouts pour la santé restent néanmoins à confirmer par des études cliniques. Très parfumé, il se prête à de multiples recettes et peut se déguster cru ou cuit, de l’apéritif au plat principal.\r\n        Très riche en eau, comportant moins de glucides que la moyenne des légumes, le céleri-branche est faiblement calorique. Il contient également moins de fibres que la moyenne des légumes. Il fournit une quantité notable de potassium. Il est source de vitamine B9 et riche en vitamine K. Il contribue en proportions non négligeables aux apports de calcium, cuivre, manganèse, bêta-carotène (pro-vitamine A), vitamines C, B2, B5 et B6. Il apporte en plus faible quantité d’autres minéraux et oligo-éléments (magnésium, fer, zinc…) ainsi que les vitamines E, B1, B3 et B8.', 'https://images.unsplash.com/photo-1476277540808-4885072ada84?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=983&q=80', ''),
(8, 'Navets', 'Le navet est un légume de la famille des crucifères, de forme bulbeuse et à chair blanche ; ses feuilles sont également comestibles. Il est originaire du bassin méditerranéen mais on retrouve également certaines variétés cultivées en Asie depuis des centaines d\'années. Souvent confondu avec le rutabaga, il a un goût plus neutre, il est facile à cuisiner et se marie avec une multitude d\'autres aliments.\r\n\r\nLe navet est caractérisé par une très grande teneur en eau et sa faiblesse calorique (21,1 Cal/100 g). Il bénéficie d’une bonne densité nutritionnelle (de minéraux, oligoéléments et vitamines).\r\nLe navet est source de potassium. Dans l’organisme, le potassium sert à équilibrer le pH du sang et à stimuler la production d’acide chlorhydrique par l’estomac, favorisant ainsi la digestion. Le navet est source de magnésium qui participe au développement osseux, à la construction des protéines, aux actions enzymatiques, à la contraction musculaire, à la santé dentaire et au fonctionnement du système immunitaire.\r\n\r\nLe rutabaga est une source de phosphore. Le phosphore constitue le deuxième minéral le plus abondant de l’organisme après le calcium. Il joue un rôle essentiel dans la formation et le maintien de la santé des os et des dents. De plus, il participe entre autres à la croissance et à la régénérescence des tissus et aide à maintenir à la normale le pH du sang. Finalement, le phosphore est l’un des constituants des membranes cellulaires.\r\n\r\n', 'https://images.unsplash.com/photo-1671613627651-5baa8e595cd6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8bmF2ZXRzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(9, 'Gingembre', 'Le gingembre est une plante tropicale originaire de l\'Asie. Depuis des millénaires, on utilise sa racine (rhizome) comme épice pour relever et agrémenter de nombreuses recettes, en plus de l\'utiliser comme plante médicinale. Le gingembre a la réputation d\'être aphrodisiaque...\r\n\r\nLe gingembre est principalement utilisé sous deux formes : frais ou séché, et réduit en une fine poudre. Sur les marchés traditionnels, on retrouve diverses variétés de gingembre qui diffèrent par leur saveur : plus ou moins sucrées, plus ou moins piquantes, plus ou moins citronnées. Il agrémente à merveille plusieurs préparations salées et sucrées, et il est aussi l\'épice principale dans un grand nombre de recettes d\'inspiration orientale et moyen-orientale.\r\n\r\nComme il est consommé en très petite quantité, l\'apport énergétique du gingembre est négligeable. Toutefois, il est un véritable concentré de sels minéraux et on lui reconnaît plusieurs qualités : il contient plus de 40 composés antioxydants, il est efficace pour traiter les nausées et les vomissements, entre autres pendant la grossesse, pris en infusion à la fin d\'un repas copieux, il aide à la digestion et ses propriétés anti-inflammatoires en font un allié dans le traitement des rhumes, grippes et refroidissements.', 'https://images.unsplash.com/photo-1606486746458-e44951581ade?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8Z2luZ2VyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(10, 'Curcuma', 'Le curcuma est un rhizome appartenant à la même famille que le gingembre mais qui se différencie de celui-ci par sa couleur orange vif. Surtout réputé pour ses multiples vertus santé, le curcuma se consomme frais ou moulu et permet la réalisation de recettes aussi saines que dépaysantes. \r\n        Le curcuma moulu est une source de fer. Chaque cellule du corps contient du fer. Ce minéral est essentiel au transport de l’oxygène et à la formation des globules rouges dans le sang. Il joue aussi un rôle dans la fabrication de nouvelles cellules, d’hormones et de neurotransmetteurs (messagers dans l’influx nerveux). Il est à noter que le fer contenu dans les aliments d’origine végétale (comme le curcuma) est moins bien absorbé par l’organisme que le fer contenu dans les aliments d’origine animale. L’absorption du fer des végétaux est toutefois favorisée lorsqu’il est consommé avec certains nutriments, telle la vitamine C.\r\n        Le curcuma moulu est également une source de manganèse. Le manganèse agit comme cofacteur de plusieurs enzymes qui facilitent une douzaine de différents processus métaboliques. Il participe également à la prévention des dommages causés par les radicaux libres.\r\n\r\n', 'https://images.unsplash.com/photo-1615485500834-bc10199bc727?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y3VyY3VtYXxlbnwwfDJ8MHx8&auto=format&fit=crop&w=800&q=60', ''),
(11, 'Cannelle', 'Connue depuis l’Antiquité, la cannelle est une substance végétale aromatique provenant de l\'écorce interne du cannelier. Sa forme d’origine ressemble à de petits tubes, mais on la consomme souvent moulue. Très appréciée pour sa saveur parfumée, elle est également riche en antioxydants bénéfiques pour la santé.\r\n\r\nContrairement à ce que l’on pourrait croire, la cannelle n’est pas dépourvue de nutriments. Au contraire, elle renferme des minéraux essentiels pour booster votre santé au quotidien. \r\nLa cannelle moulue est une bonne source de manganèse. Le manganèse agit comme cofacteur de plusieurs enzymes qui facilitent une douzaine de différents processus métaboliques. Il participe également à la prévention des dommages causés par les radicaux libres.\r\nGrâce à sa teneur exceptionnelle en antioxydants, minéraux et fibres, la cannelle est précieuse pour notre santé. D’ailleurs, elle est considérée comme un remède naturel dans de nombreuses régions du monde et intégrée à de nombreuses thérapeutiques sous forme de décoctions, d’infusions ou encore d’huiles essentielles. ', 'https://images.unsplash.com/photo-1601379758962-cadba22b1e3a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(12, 'Paprika', 'Le paprika est une poudre de piment doux utilisée en tant que condiment. Il est utilisé depuis des centaines d\'années dans la cuisine hongroise et espagnole, vous connaissez sans doute son goût mais connaissez-vous les nombreux bienfaits qui se cachent derrière cette épice colorée ?\r\n        Le paprika est une mine de bienfaits tout aussi intéressants les uns que les autres.\r\n\r\nLutte contre les infections\r\nC\'est la capsaïcine contenue dans le paprika qui va permettre à votre organisme de lutter efficacement contre les petits maux hivernaux.\r\n\r\n\r\n\r\nDiminution de la douleur\r\nDe récentes études ont démontré que la consommation régulière de paprika pouvait aider à diminuer les douleurs articulaires notamment liées à l\'arthrite.\r\n\r\nFavorise une bonne circulation sanguine\r\nConsommé régulièrement, le paprika permettra de favoriser une bonne circulation sanguine, à incorporer dans vos recettes donc si vous êtes sujet aux jambes lourdes par exemple.\r\n\r\nLutte contre l’anémie\r\nLe fer présent dans le paprika va permettre de transporter l\'oxygène à travers le corps, s\'il est associé à d\'autres sources alimentaires de fer (légumineuses, viande...) il vous permettra d\'éviter les anémies.\r\n\r\nUn bon apport de potassium\r\nUn bon apport en potassium vous permettra d\'optimiser la contraction des muscles et du cœur. Il joue également un rôle sur l\'influx nerveux.\r\n\r\n', 'https://images.unsplash.com/photo-1548368197-2fdad2455b9c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGFwcmlrYXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60', ''),
(13, 'Sel', 'Le sel, constitué en quasi-totalité de chlorure de sodium, est nécessaire au fonctionnement de l\'organisme. En consommer en excès peut toutefois favoriser le développement de certaines maladies. Découvrez les aliments riches en sel et nos recommandations pour limiter votre consommation.\r\n\r\nLe sel est en quasi-totalité constitué de chlorure de sodium (NaCl). Il contient également, en faible proportion, d’autres minéraux. Il peut être enrichi en iode ou en fluor.\r\nLes principales sources alimentaires de sodium sont le sel de table, les condiments et sauces ainsi que la charcuterie et le fromage.\r\n\r\nLa liste des aliments ayant une teneur élevée en sel figure dans la table de composition nutritionnelle des aliments Ciqual.\r\n\r\nLe sodium joue un rôle déterminant dans le maintien de l’équilibre hydrique entre l’intérieur et l’extérieur des cellules. Ce maintien est essentiel pour les transmissions nerveuses et les contractions musculaires. Il joue également un rôle important dans l’absorption intestinale du chlore, des acides aminés, du glucose et de l\'eau et dans leur réabsorption au niveau rénal.\r\n\r\nLe sodium est éliminé principalement par la voie urinaire et par la transpiration.\r\n\r\nUne carence sévère en sodium est associée à l’apparition d’œdèmes cérébraux, provoquant malaises, nausées, pertes de conscience et convulsions.', 'https://images.unsplash.com/photo-1606588347049-62bfd0c118d5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8c2FsdHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60', ''),
(14, 'Poivre', '« Le sel de l’existence est essentiellement dans le poivre qu’on y met. “ Alphonse Allais.\r\n\r\nLe poivre a de nombreuses vertus:\r\n\r\n#1 Il aide à la digestion et diminue les flatulences. \r\n\r\n#2 Il est également démontré qu’il a un effet aphrodisiaque. Il peut en effet provoquer une dilatation micro-vasculaire sur les organes sexuels, notamment au niveau de l\'utérus de la femme\r\n\r\n#3 Il aurait un effet direct sur les endomorphines et la pipérine augmente naturellement le taux de sérotonine ; en fait, en quelques mots, il rend heureux et serein!\r\n\r\n#4 Le poivre contient de nombreux minéraux, des oligo éléments et des vitamines, dont du potassium, du calcium, du magnésium, du phosphore, du fer, du manganèse, du zinc, du cuivre, du sélénium, de l’iode, des vitamines : E, A, B1, B2, B3, B6, B9\r\n\r\n#5 La pipérine et la graisse du poivre vont augmenter l’assimilation d’antioxydants tels que la vitamine C, le coenzyme Q 10, le curcuma, le bêta carotêne, le sélénium, et plus encore.\r\n\r\nEt quelques tips: \r\n\r\n- Petit truc pour juger de sa qualité: On reconnaît un poivre de qualité par sa graisse. En écrasant un grain sur une feuille de papier, une trace de graisse devrait apparaître s’il est de qualité !\r\n\r\n- Essayez de rajouter du poivre sur vos fraises. Leur goût ressortira d’autant plus! \r\n\r\n- Attention à toujours le moudre au dernier moment, afin qu\'il puisse développer pleinement ses arômes.', 'https://images.unsplash.com/photo-1574685379681-1aacfc4f22d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cG9pdnJlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(16, 'Concentre de tomat', '100 grammes de cet aliment représentent une valeur énergétique de 92 calories ou kilocalories (ou 386 kilojoules). En moyenne, les produits de la catégorie légumes apportent une valeur énergétique équivalente à 35 kilocalories.', 'https://images.unsplash.com/photo-1472476443507-c7a5948772fc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80', ''),
(17, 'Potimarron', 'Cousin asiatique du potiron, le potimarron est la star de nos assiettes d’automne et d’hiver. Si sa cote de popularité ne cesse de grimper en Europe, le potimarron a été introduit dans l’alimentation occidentale très tardivement. Qu’on le préfère en soupe, en tourte ou en purée, le potimarron est toujours aussi délicieux que nutritif, pour le plus grand bonheur des gourmands.\r\n        Avec seulement 38 kcal pour 100g, le potimarron est très peu calorique. Sa densité nutritionnelle, en revanche, est élevée. Pour commencer, le potimarron est une bonne source de glucides et de protéines végétales.', 'https://img.passeportsante.net/1200x675/2021-05-19/i107424-potimarron.webp', 'automne'),
(18, 'Crème fraîche liquide', 'La crème fraîche, cette matière grasse issue du lait de vache, fût appréciée très tôt par de nombreux peuples : nomades d\'Asie, Celtes, Vikings… En Europe, elle fut d\'abord servie sur les tables médiévales françaises, notamment pour accompagner les fromages frais, les légumes et les féculents. Son usage se généralise au XVIIIe siècle, puis elle s\'impose définitivement en cuisine au XIXe siècle.\r\nPour qu\'un produit soit appelé crème, il doit être issu de l\'écrémage d\'un lait entier et contenir au moins 30 % de MG. Les crèmes liquides allégées ne peuvent donc pas avoir la terminologie de crème.\r\nLa crème est une excellente source de calcium, qui contribue à la minéralisation et au renouvellement osseux. Elle contient également des lipides, de la vitamine A et du potassium. Malgré sa mauvaise réputation, la crème liquide fait partie des corps gras les moins caloriques (en comparaison avec le beurre, la margarine ou l\'huile). Elle a donc toute sa place, consommée avec modération, dans le cadre d\'une alimentation équilibrée. C\'est également le corps gras le plus riche en eau : sa teneur hydrique moyenne s\'élève à 65 %.', 'https://img-3.journaldesfemmes.fr/ILwMM8uhsKdfiUEIpAreK8YyBKc=/1500x/smart/dfded104856c4ba3a6889b1d37dbeb63/ccmcms-jdf/25122452.jpg', ''),
(19, 'Beurre', 'Le beurre est l\'une des matières grasses les plus utilisées en France et dont nous sommes les plus gros consommateurs à travers le monde. On le trouve doux ou salé et il peut même se trouver aromatisé dans certaines épiceries. Cru sur des tartines ou cuit dans des plats, c\'est l\'un des aliments de base de la cuisine française.\r\n        Le beurre est un aliment très riche en lipides (en particulier en acides gras saturés) donc calorique avec 753 Cal/100 g. Il est également riche en cholestérol, en béta-carotène et en vitamine D. En revanche, il brille par l’absence de vitamine C.', 'https://images.unsplash.com/photo-1589985270826-4b7bb135bc9d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YnV0dGVyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60', ''),
(20, 'Noix de muscade', 'La noix de muscade est une épice à la saveur chaude et légèrement sucrée qu\'il faut utiliser avec parcimonie car elle est puissante. On la retrouve dans de nombreux plats et dans des sauces telles que la béchamel. Elle est également utilisée pour ses bienfaits pour la santé.\r\n        La noix de muscade bénéficie d’une teneur remarquable en fibres et c’est une championne calorique avec 507 Cal/100 g.', 'https://img.passeportsante.net/1200x675/2021-05-03/i102108-noix-de-muscade-nu.webp', ''),
(24, 'Coriandre', 'Son usage dans les préparations culinaires en général n’est que la partie émergée de l’iceberg. À l’insu de beaucoup de personnes, la coriandre est remplie de potentiels avantages pour la santé que la plupart des gens ratent totalement, lorsqu’ils jettent cette garniture dans les poubelles, après avoir mangé leur repas. Elle détient onze composants d’huiles essentielles, six types d’acides (dont l’acide ascorbique, plus connu sous le nom de vitamine C), des minéraux et des vitamines, chacun disposant d’un certain nombre de propriétés avantageuses.', 'http://localhost/Projet_Final/storage/uploads/63c8cf972fe38lindsay-moe-WZzrQX5k2Ug-unsplash.jpg', 'anuelle'),
(27, 'Huile', 'L’huile de colza est une bonne source de vitamine K tandis que l’huile d’olive en est une source. La vitamine K est nécessaire pour la synthèse (fabrication) de protéines qui participent à la coagulation du sang (autant à la stimulation qu’à l’inhibition de la coagulation sanguine). Elle joue aussi un rôle dans la formation des os. En plus de se trouver dans l’alimentation, la vitamine K est fabriquée par les bactéries présentes dans l’intestin, d’où la rareté des carences en cette vitamine.', 'http://localhost/Projet_Final/storage/uploads/63c9038e5783droberta-sorge-uOBApnN_K7w-unsplash.jpg', 'anuelle'),
(28, 'Vermicelle', 'Vermicelle de soja cuite : 61 calories\r\n100 grammes de cet aliment représentent une valeur énergétique de 61 calories ou kilocalories (ou 257 kilojoules). En moyenne, les produits de la catégorie pâtes et semoules apportent une valeur énergétique équivalente à 200 kilocalories.', 'http://localhost/Projet_Final/storage/uploads/63c906d258de4istockphoto-453959031-612x612.jpg', 'anuelle'),
(29, 'Poulet', 'Parmi les nutriments contenus en bonne quantité dans la viande de poulet, nous pouvons citer les suivants :\r\n\r\nPhosphore. Le poulet est une excellente source de phosphore. Celui-ci constitue le deuxième minéral le plus abondant de l’organisme après le calcium. Il joue un rôle essentiel dans la formation et le maintien de la santé des os et des dents. De plus, il participe entre autres à la croissance et à la régénérescence des tissus et aide à maintenir à la normale le pH du sang. Finalement, le phosphore est l’un des constituants des membranes cellulaires ;\r\nZinc. Le poulet (viande brune) est une excellente source de zinc. La viande blanche, quant à elle, en est une bonne source pour la femme et une source pour l’homme, dont les besoins sont supérieurs. Le zinc participe notamment aux réactions immunitaires, à la fabrication du matériel génétique, à la perception du goût, à la cicatrisation des plaies et au développement du fœtus. Il interagit également avec les hormones sexuelles et thyroïdiennes. Dans le pancréas, il participe à la fabrication, à la mise en réserve et à la libération de l’insuline ;\r\nSélénium. Le poulet est une excellente source de sélénium. Ce minéral travaille avec l’une des principales enzymes antioxydantes, prévenant ainsi la formation de radicaux libres dans l’organisme. Il contribue aussi à convertir les hormones thyroïdiennes en leur forme active ;\r\nVitamine B3. Le poulet est une excellente source de vitamine B3. Appelée aussi niacine, la vitamineB3 participe à de nombreuses réactions métaboliques et contribue particulièrement à la production d\'énergie à partir des glucides, des lipides, des protéines et de l\'alcool que nous ingérons. Elle collabore aussi au processus de formation de l’ADN, permettant une croissance et un développement normaux.', 'http://localhost/Projet_Final/storage/uploads/63c90c5d8c847sophia-louw-w5l0oNGIxf4-unsplash.jpg', 'anuelle'),
(30, 'Rechta', 'Ce plat est généralement accompagné d\'une sauce blanche parfumée de cannelle. Les ingrédients principaux de la rechta sont les pâtes coupées en lanières fine fraîches, la viande, le poulet, les pois chiches, le navet et la courgette.', 'http://localhost/Projet_Final/storage/uploads/63c90d5a56071maxresdefault.jpg', 'anuelle'),
(31, 'Citron', 'Le citron a une faible valeur énergétique* car il apporte en moyenne 27,60 calories (kcal) pour 100 g, soit 118 kJ. D\'après les données de la table Ciqual 2020, le citron est le fruit le moins calorique. Un citron pèse en moyenne 120 g, il apporte donc 32,40 kcal.', 'http://localhost/Projet_Final/storage/uploads/63c90f3a68529eggbank-ohNxxapID_k-unsplash.jpg', 'ete'),
(32, 'Eau', 'L’eau est une ressource naturelle essentielle à la vie. Le stock d’eau douce planétaire existant est très faible si on le compare à la masse d’eau salée qui recouvre 70 % de la surface du globe. Cette eau douce précieuse est, non seulement, inéquitablement répartie, mais se raréfie. En 60 ans, sa consommation a été multipliée par six.\r\n\r\nAu niveau mondial, 71 % de cette eau disponible (pluie, réserve du sol) est utilisée pour l’irrigation des cultures.', 'http://localhost/Projet_Final/storage/uploads/63c90f9bf180ddavid-becker-rrfdqjJWwmU-unsplash.jpg', 'anuelle'),
(33, ' Sucre', '                            Le sucre blanc ne contient que des glucides et il est très riche : presque 400 calories par portion de 100 g. Lorsque c’est possible, il est préférable de le remplacer par du sucre brut (sucre brun) qui contient aussi des sels minéraux et certaines vitamines.\r\n\r\nLe sucre pur est aussi appelé « sucre rapide », car il fournit rapidement de l’énergie et peut donc être utilisé en cas d’effort intense ponctuel. Pour répartir l’énergie sur une longue période, on préfère toutefois les sucres lents (ceux contenus dans les céréales et autres féculents.)                            ', 'http://localhost/Projet_Final/storage/uploads/63c90ff2de46ealexander-grey-oKay0q7Pa30-unsplash.jpg', 'anuelle'),
(34, 'Lait', '100 grammes de cet aliment représentent une valeur énergétique de 46 calories ou kilocalories (ou 194 kilojoules). En moyenne, les produits de la catégorie laits apportent une valeur énergétique équivalente à 141 kilocalories.', 'http://localhost/Projet_Final/storage/uploads/63c9102e9faa5eiliv-aceron-_8bnn1GqX70-unsplash.jpg', 'anuelle'),
(35, 'Viande Haché', 'La viande hachée est particulièrement riche en protéines, qui jouent plusieurs rôles fondamentaux dans l\'organisme et permettent notamment le renouvellement et l\'augmentation de la masse musculaire et le maintien de l\'ossature. Ces protéines sont également impliquées dans le transport de l\'oxygène dans l\'organisme et la digestion. La viande hachée apporte aussi du fer \" héminique \", très bien absorbé par l\'organisme, et qui favorise l\'oxygénation du sang des cellules et des muscles.\r\n\r\nAutre atout, elle est riche en vitamine B12, essentielle pour le système nerveux, et qui joue un rôle dans le processus de division cellulaire. \r\n\r\nAttention toutefois à ne pas en abuser. Manger trop de viande rouge augmenterait le risque de cancer colorectal, et peut entraîner une hausse du taux de cholestérol, et conduire à des maladies cardio-vasculaires, surtout si elle est riche en matières grasses. Optez de préférence pour des steaks à 5 ou 10% de MG.', 'http://localhost/Projet_Final/storage/uploads/63c9160976957viande-hachee.jpeg', 'anuelle'),
(36, 'Persil', 'Les fines herbes ne sont habituellement pas consommées en grande quantité. Utilisées comme assaisonnements, elles ne peuvent alors pas procurer tous les bienfaits santé qui leur sont attribués. L’ajout de fines herbes de façon régulière et significative aux aliments permet de contribuer, ne serait-ce que de façon minime, à l’apport en antioxydants de l’alimentation. Par contre, la consommation de fines herbes à elle seule ne peut répondre aux besoins en antioxydants du corps.\r\n\r\nLa majorité des études sur les fines herbes ont été réalisées chez l’animal à partir d’extraits de la plante. L’extrait est utilisé afin d’être en mesure d’isoler et de concentrer les principes actifs, ainsi que pour comprendre les mécanismes d’action. Chez l’humain, il est difficile d’évaluer les effets santé de la consommation de fines herbes puisque les quantités consommées sont généralement faibles.', 'http://localhost/Projet_Final/storage/uploads/63c91705cae03i102130-persil-nu.webp', 'anuelle'),
(37, 'Oeuf', 'L\'œuf possède une composition nutritionnelle très intéressante. On le classe parmi les aliments protidiques, au même titre que la viande et le poisson. Il contient 12,7% de protéines parfaitement équilibrées en acides aminés essentiels. Environ 10% de lipides de bonne composition nutritionnelle. Côté minéraux, l\'œuf est riche en fer, en sélénium et en zinc. Côté vitamines, il regorge de vitamines liposolubles (A, D, E) ainsi que de vitamines du groupe B (B2, B9, B5 et B12). Enfin, les œufs contiennent des caroténoïdes antioxydants : lutéine et la xéaxanthine.', 'http://localhost/Projet_Final/storage/uploads/63c9179723a72i139020-comment-reconnaitre-un-oeuf-bio.jpeg', 'anuelle'),
(38, 'Farine', 'La farine est le produit pulvérulent obtenu à partir d\'un lot de blé sain, loyal et marchand, préparé en vue de la mouture et industriellement pur”. L\'amidon : (glucide) est insoluble dans l\'eau ; il en absorbe 1/3 de son poids et devient alors un empois visqueux et gélatineux.', 'http://localhost/Projet_Final/storage/uploads/63c91a9b0fbb5Farine blé.jpg', 'anuelle'),
(39, 'Pâte feuilletée', 'Les pâtes feuilletées sont des pâtes composées d\'une détrempe (farine + eau + sel et selon le cas matière grasse) et d\'un corps gras, successivement pliés entre eux pour constituer des couches indépendantes, s\'élevant à la cuisson en feuillets distincts.', 'http://localhost/Projet_Final/storage/uploads/63c91aed77031pate-feuilletee-inversee-felder.webp', 'anuelle'),
(40, 'Amande', 'On accorde une grande importance à l’amande pour son contenu élevé en phytostérols, en acides gras mono-insaturés, en protéines végétales, en fibres solubles, en vitamines et en minéraux. D’ailleurs, la Food and Drug Administration (FDA) des États-Unis permet depuis 2003 d’inscrire sur les étiquettes de produits alimentaires l’allégation suivante concernant les noix : « Des évidences laissent croire, mais ne prouvent pas, que la consommation d’une once et demie par jour de la plupart des noix, dans un régime alimentaire faible en gras saturés et en cholestérol, peut réduire le risque de maladies coronariennes ». Bien que les données scientifiques abondent quant aux effets bénéfiques reliés à la consommation d’amande, cette allégation n’est cependant pas permise ailleurs.', 'http://localhost/Projet_Final/storage/uploads/63c91b27ab9b0i101960-amande-nu.webp', 'anuelle'),
(41, 'Eau de rose', 'Bien que l\'eau de rose ait gagné en popularité au fil des ans en raison de ses bienfaits esthétiques, elle serait également intéressante comme traitement pour certaines maladies. Originaire d\'Iran, l\'eau de rose contient de10 à 50% d\'huile de rose, et plusieurs composants tels que les terpènes, les glycosides, les flavonoïdes, et les anthocyanines, tous bénéfiques pour la santé humaine.\r\n\r\nL’eau de rose aurait d’ailleurs des propriétés hypnotiques, analgésiques, antiépileptiques, respiratoires, cardiovasculaires, laxatives, antidiabétiques, antimicrobiennes, anti-inflammatoires et antioxydantes. Il est toutefois important de rappeler qu’aucune étude scientifique fiable ne s’est penchée sur les effets de ce produit. Il est donc recommandé de l’utiliser avec prudence, en complément d’un traitement adapté, et avec l’accord d’un·e professionnel·le de santé.', 'http://localhost/Projet_Final/storage/uploads/63c91ba8a06a4i106416-bienfaits-eau-rose-sante.webp', 'anuelle');

-- --------------------------------------------------------

--
-- Table structure for table `IngredientCuit`
--

CREATE TABLE `IngredientCuit` (
  `id` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `methode_de_cuissance` text NOT NULL,
  `healthy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `video` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`id`, `titre`, `description`, `image`, `video`) VALUES
(1, '   RATP et SNCF en grève', 'La perspective d’un « jeudi noir » dans les transports se confirme, à la veille de cette grande journée de mobilisation contre la réforme des retraites. Découvrez les prévisions de trafic de la RATP. \r\n    Ça se précise. Si depuis plusieurs jours gouvernement et syndicats préparent les Français à l’idée d’un « jeudi noir », les prévisions définitives communiquées ce mercredi à la veille de la grande mobilisation contre la réforme des retraites semblent confirmer le risque de « journée de galère ». Côté RATP, tous les syndicats représentatifs appellent en effet à participer au mouvement interprofessionnel de ce 19 janvier. En Île-de-France, le trafic des transports en commun sera donc, sans surprise, grandement perturbé.\r\n\r\nLes Franciliens sont appelés à privilégier le télétravail. Mais pour ceux qui n’ont pas le choix, découvrez les prévisions définitives de la RATP pour les RER, métros, bus et tramways.\r\n\r\n\r\n                                                                                                                    ', 'http://localhost/Projet_Final/storage/uploads/63c92fd27f251jato-young-zFLqXOECxKU-unsplash.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `NotationUtilisateur`
--

CREATE TABLE `NotationUtilisateur` (
  `id` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `NotationUtilisateur`
--

INSERT INTO `NotationUtilisateur` (`id`, `id_recette`, `id_utilisateur`, `note`) VALUES
(14, 912, 16, 5),
(16, 914, 16, 4),
(18, 906, 16, 3),
(19, 913, 17, 4),
(20, 1, 17, 1),
(21, 911, 17, 3),
(22, 913, 16, 3),
(23, 911, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `PreferenceUtilisateur`
--

CREATE TABLE `PreferenceUtilisateur` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PreferenceUtilisateur`
--

INSERT INTO `PreferenceUtilisateur` (`id`, `id_utilisateur`, `id_recette`) VALUES
(9, 16, 907),
(10, 16, 912),
(11, 16, 906),
(12, 17, 913);

-- --------------------------------------------------------

--
-- Table structure for table `Recette`
--

CREATE TABLE `Recette` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `video` text,
  `creator_id` int(11) DEFAULT NULL,
  `temps_preparation` int(11) NOT NULL,
  `temps_cuisson` int(11) NOT NULL,
  `temps_repos` int(11) DEFAULT NULL,
  `difficulte` int(11) NOT NULL,
  `categorie` text NOT NULL,
  `notation` int(11) DEFAULT NULL,
  `etat` text NOT NULL,
  `healthy` tinyint(1) NOT NULL,
  `calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Recette`
--

INSERT INTO `Recette` (`id`, `titre`, `description`, `image`, `video`, `creator_id`, `temps_preparation`, `temps_cuisson`, `temps_repos`, `difficulte`, `categorie`, `notation`, `etat`, `healthy`, `calories`) VALUES
(1, 'Couscous', 'A la maison, le couscous algérien c’est chaque dimanche, parfois je prépare le couscous aux légumes, d’autres fois au poulet. Mais celui que je préfère c’est le couscous kabyle el mesfouf aux fèves et petits pois arrose d’un bon filet d’huile d’olive et accompagne d’un bon verre de lben (babeurre)… le bonheur !!!', 'https://images.unsplash.com/photo-1541518763669-27fef04b14ea?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y291c2NvdXN8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60', '', NULL, 10, 55, 10, 4, 'Plats', 1, 'published', 1, 152),
(2, 'Gratin de potimarron', 'Un gratin de potimarron des plus savoureux plat économique et simple. Une recette d\'automne composée de pomme de terre, crème liquide et comté avec une pointe de noix de muscade.', 'https://img.cuisineaz.com/1024x768/2013/12/20/i7469-gratin-pdt-potiron-lardons.jpeg', '', NULL, 10, 35, 5, 4, 'Plats', 5, 'published', 1, 550),
(906, 'Chorba', 'Voici une Chorba algerienne {شوربة } qui est une soupe à base de vermicelle, bien parfumée aux épices : curcuma, gingembre et paprika et herbes : coriandre, celeri et menthe sauvage lui donne un savoureux goût subtile.', 'http://localhost/Projet_Final/storage/uploads/63c909d02b842la-chorba-cuisine-algerienne_thumb_2.jpg', NULL, NULL, 10, 50, 5, 3, 'Plats', 3, 'published', 0, 620),
(907, 'Rechta', 'Ce plat est généralement accompagné d\'une sauce blanche parfumée de cannelle. Les ingrédients principaux de la rechta sont les pâtes coupées en lanières fine fraîches, la viande, le poulet, les pois chiches, le navet et la courgette.', 'http://localhost/Projet_Final/storage/uploads/63c90e89a1e9amaxresdefault.jpg', NULL, NULL, 15, 50, 5, 4, 'Plats', NULL, 'published', 0, 532),
(911, 'Charbet', 'La cherbet ou sherbet (شربت ) est une citronnade algérienne présente sur toutes les tables durant le mois de ramadan. La meilleure cherbet est celle de la ville de Boufarik dont la recette reste secrète. C’est notre boisson préférée, elle s’est répandu sur tout le territoire algérien et se vend sur toutes les rues d’Alger.', 'http://localhost/Projet_Final/storage/uploads/63c911ff2cb76Lemonade-4.jpg', NULL, NULL, 10, 10, 30, 1, 'boissons', 4, 'published', 0, 20),
(912, 'Taboulé', '                                En accompagnement d\'un barbecue, pour un pique-nique ou un repas sans prise de tête, le taboulé sera parfait ! Bien frais, on se régale à déguster cette recette remplie de saveurs grâce aux herbes hachées.\r\nIci, pas de cuisson ! Il vous suffira simplement de mélanger vos aliments ensemble et de laisser gonfler la semoule de blé au réfrigérateur. Pratique, si vous n\'avez pas de four ;-)\r\nUne alternative parfaite aussi si vous souhaitez vous concocter une recette végétalienne sans complication ! Ajoutez les crudités de votre choix et c\'est parti pour le test vegan !                            ', 'http://localhost/Projet_Final/storage/uploads/63c9140f7103029053202ef1e632188531f93559ad73d.jpg', NULL, NULL, 5, 10, 5, 1, 'Entrees', NULL, 'published', 0, 60),
(913, 'Mhancha', '                                                                Mhancha un succulent met qui trouve son origine dans les villes du Maghreb en Algérie et au Maroc notamment, son nom arabe signifie serpentin ou serpentine à cause de sa forme, à la base c’est une recette sucrée des feuilles de pastilla enduites de smen ou de beurre fondu et enfermant une farce à base d’amandes parfumées à la cannelle. Celle-ci est cuite au four puis arrosée de miel, une pure merveille.                                                        ', 'http://localhost/Projet_Final/storage/uploads/63c91581180e7DSCF9609.jpg', NULL, NULL, 35, 40, 10, 1, 'Entrees', 4, 'published', 0, 120),
(914, 'Baklawa', '                                                                                                                                                                                                                                Le Baklawa existe en de nombreuses variantes, en fonction des terroirs et des régions.\r\nC\'est un dessert assez sucré et constitué de pâte phyllo, de sirop de sucre (remplacé par du miel en Grèce) et, selon les recettes, de pistaches, de noix ou de noisettes.\r\nSa préparation est longue à réaliser car elle est constituée de fines feuilles de pâte beurrées ou huilées une à une, superposées dans un plat rond ou carré, ou bien enroulées sur elles-mêmes.\r\nUn mélange de fruits secs, finement moulus, concassés est déposé entre les feuilles, lesquelles sont ensuite cuites puis trempées dans de l\'eau sucrée (avec du jus de citron pour éviter de caraméliser), du miel ou encore de l\'eau de fleur d\'oranger ou de rose. On y ajoute quelquefois des clous de girofle moulus.                                                                                                                                                                                                    ', 'http://localhost/Projet_Final/storage/uploads/63c91cd5ed6c9baklawa-6-sur-33.webp', NULL, NULL, 30, 60, 60, 5, 'Desserts', NULL, 'published', 0, 500);

-- --------------------------------------------------------

--
-- Table structure for table `RecetteFêtes`
--

CREATE TABLE `RecetteFêtes` (
  `id` int(11) NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_fete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RecetteIngredient`
--

CREATE TABLE `RecetteIngredient` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `unite` text NOT NULL,
  `id_recette` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RecetteIngredient`
--

INSERT INTO `RecetteIngredient` (`id`, `quantite`, `unite`, `id_recette`, `id_ingredient`) VALUES
(1, 200, 'g', 1, 1),
(2, 2, '', 1, 2),
(3, 3, '', 1, 3),
(4, 1, '', 1, 4),
(5, 3, '', 1, 5),
(6, 2, 'poignées', 1, 6),
(7, 2, 'branche', 1, 7),
(8, 2, '', 1, 8),
(9, 1, 'c-a-c', 1, 9),
(10, 1, 'c-a-c', 1, 10),
(11, 1, 'c-a-c', 1, 11),
(12, 1, 'c-a-s', 1, 12),
(13, 1, 'c-a-c', 1, 13),
(14, 1, 'c-a-c', 1, 14),
(16, 1, 'c-a-s', 1, 16),
(17, 800, 'g', 2, 17),
(18, 2, '', 2, 2),
(19, 1, '', 2, 4),
(20, 300, 'ml', 2, 18),
(21, 30, 'g', 2, 19),
(22, 1, 'pincée', 2, 20),
(24, 1, 'c-a-c', 2, 14),
(197, 250, 'g', 906, 1),
(198, 2, '', 906, 4),
(199, 1, 'bouquet', 906, 24),
(200, 2, 'branches', 906, 7),
(201, 2, '', 906, 3),
(202, 1, '', 906, 5),
(203, 100, 'g', 906, 6),
(204, 200, 'g', 906, 28),
(205, 2, 'c-a-s', 906, 16),
(206, 2, 'c-a-s', 906, 27),
(207, 2, 'c-a-c', 906, 13),
(208, 2, 'c-a-c', 906, 14),
(209, 1, 'c-a-c', 906, 10),
(210, 1, 'c-a-c', 906, 12),
(211, 1, 'c-a-c', 906, 9),
(212, 1, 'c-a-c', 906, 11),
(213, 400, 'g', 907, 29),
(214, 1, '', 907, 4),
(215, 4, '', 907, 8),
(216, 3, '', 907, 5),
(217, 2, 'c-a-c', 907, 13),
(218, 1, 'c-a-c', 907, 14),
(219, 1, 'c-a-c', 907, 11),
(220, 1, 'poignée', 907, 6),
(226, 4, '', 911, 31),
(227, 2, 'L', 911, 32),
(228, 120, 'g', 911, 33),
(229, 3, 'c-a-s', 911, 34),
(243, 450, 'g', 913, 35),
(244, 2, '', 913, 4),
(245, 30, 'g', 913, 19),
(246, 2, 'c-a-s', 913, 27),
(247, 3, 'c-a-s', 913, 36),
(248, 3, 'c-a-s', 913, 24),
(249, 1, 'c-a-c', 913, 20),
(250, 2, '', 912, 31),
(251, 1, '', 912, 4),
(252, 60, 'ml', 912, 27),
(253, 1, 'c-a-c', 912, 13),
(254, 1, 'c-a-c', 912, 14),
(304, 840, 'g', 914, 38),
(305, 250, 'g', 914, 19),
(306, 250, 'g', 914, 39),
(307, 3, 'g', 914, 13),
(308, 1, 'verre', 914, 32),
(309, 1, 'kg', 914, 40),
(310, 1, 'verre', 914, 41);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `date_naissance` date NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `nom`, `email`, `sexe`, `date_naissance`, `mot_de_passe`, `approved`) VALUES
(16, 'Nada', 'jn_hanad@esi.dz', 'Female', '2023-01-13', 'nada', 1),
(17, 'Nada', 'jn_hanead@esi.dz', 'Female', '2023-01-04', 'nada', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `AdminParams`
--
ALTER TABLE `AdminParams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Diaporama`
--
ALTER TABLE `Diaporama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Etape`
--
ALTER TABLE `Etape`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Indexes for table `Fêtes`
--
ALTER TABLE `Fêtes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IngredientCuit`
--
ALTER TABLE `IngredientCuit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NotationUtilisateur`
--
ALTER TABLE `NotationUtilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `PreferenceUtilisateur`
--
ALTER TABLE `PreferenceUtilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_recette` (`id_recette`);

--
-- Indexes for table `Recette`
--
ALTER TABLE `Recette`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `RecetteFêtes`
--
ALTER TABLE `RecetteFêtes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`),
  ADD KEY `id_fete` (`id_fete`);

--
-- Indexes for table `RecetteIngredient`
--
ALTER TABLE `RecetteIngredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_recette` (`id_recette`),
  ADD KEY `id_ingredient` (`id_ingredient`);

--
-- Indexes for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `AdminParams`
--
ALTER TABLE `AdminParams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Diaporama`
--
ALTER TABLE `Diaporama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Etape`
--
ALTER TABLE `Etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `Fêtes`
--
ALTER TABLE `Fêtes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ingredient`
--
ALTER TABLE `Ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `IngredientCuit`
--
ALTER TABLE `IngredientCuit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `NotationUtilisateur`
--
ALTER TABLE `NotationUtilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `PreferenceUtilisateur`
--
ALTER TABLE `PreferenceUtilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Recette`
--
ALTER TABLE `Recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=915;

--
-- AUTO_INCREMENT for table `RecetteFêtes`
--
ALTER TABLE `RecetteFêtes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RecetteIngredient`
--
ALTER TABLE `RecetteIngredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Etape`
--
ALTER TABLE `Etape`
  ADD CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`);

--
-- Constraints for table `NotationUtilisateur`
--
ALTER TABLE `NotationUtilisateur`
  ADD CONSTRAINT `notationutilisateur_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`),
  ADD CONSTRAINT `notationutilisateur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateurs` (`id`);

--
-- Constraints for table `PreferenceUtilisateur`
--
ALTER TABLE `PreferenceUtilisateur`
  ADD CONSTRAINT `preferenceutilisateur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateurs` (`id`),
  ADD CONSTRAINT `preferenceutilisateur_ibfk_2` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`);

--
-- Constraints for table `Recette`
--
ALTER TABLE `Recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `Utilisateurs` (`id`);

--
-- Constraints for table `RecetteFêtes`
--
ALTER TABLE `RecetteFêtes`
  ADD CONSTRAINT `recettefêtes_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`),
  ADD CONSTRAINT `recettefêtes_ibfk_2` FOREIGN KEY (`id_fete`) REFERENCES `Fêtes` (`id`);

--
-- Constraints for table `RecetteIngredient`
--
ALTER TABLE `RecetteIngredient`
  ADD CONSTRAINT `recetteingredient_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `Recette` (`id`),
  ADD CONSTRAINT `recetteingredient_ibfk_2` FOREIGN KEY (`id_ingredient`) REFERENCES `Ingredient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
