-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2020 at 12:00 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.2.15-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web18_spinari17`
--

-- --------------------------------------------------------

--
-- Table structure for table `software_admin`
--

CREATE TABLE `software_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_admin`
--

INSERT INTO `software_admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `software_balancesheet`
--

CREATE TABLE `software_balancesheet` (
  `balancesheet_nr` int(11) NOT NULL,
  `Datetime` datetime NOT NULL,
  `total_assets` int(11) NOT NULL,
  `total_liabilities` int(11) NOT NULL,
  `total_equity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_balancesheet`
--

INSERT INTO `software_balancesheet` (`balancesheet_nr`, `Datetime`, `total_assets`, `total_liabilities`, `total_equity`) VALUES
(1, '2020-06-10 17:50:00', 50000, 10000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `software_cashflowstatement`
--

CREATE TABLE `software_cashflowstatement` (
  `cashflowstatement_nr` int(11) NOT NULL,
  `Datetime` datetime NOT NULL,
  `Cash_incoming` int(11) NOT NULL,
  `Cash_outflow` int(11) NOT NULL,
  `Cash_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_cashflowstatement`
--

INSERT INTO `software_cashflowstatement` (`cashflowstatement_nr`, `Datetime`, `Cash_incoming`, `Cash_outflow`, `Cash_balance`) VALUES
(1, '2020-06-10 17:55:00', 30000, 5000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `software_cashier`
--

CREATE TABLE `software_cashier` (
  `cashier_id` varchar(5) NOT NULL,
  `cashier_name` varchar(10) NOT NULL,
  `cashier_surname` varchar(10) NOT NULL,
  `cashier_email` varchar(30) NOT NULL,
  `cashier_username` varchar(10) NOT NULL,
  `cashier_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_cashier`
--

INSERT INTO `software_cashier` (`cashier_id`, `cashier_name`, `cashier_surname`, `cashier_email`, `cashier_username`, `cashier_pass`) VALUES
('1', 'cashier', 'cashier', 'cashier@email.com', 'cashier', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `software_cashierreceipts`
--

CREATE TABLE `software_cashierreceipts` (
  `Receipt_nr` int(11) NOT NULL,
  `Receipt_date` date NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Vat` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_cashierreceipts`
--

INSERT INTO `software_cashierreceipts` (`Receipt_nr`, `Receipt_date`, `Product_name`, `Quantity`, `Description`, `Price`, `Vat`, `total_amount`) VALUES
(4, '2020-06-22', 'Oil', 2, 'gega oil', 20, 15, 0),
(2, '2020-06-22', 'jumper cables', 1, 'one jumper cables ', 2300, 200, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `software_client`
--

CREATE TABLE `software_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `client_surname` varchar(150) NOT NULL,
  `client_username` varchar(100) NOT NULL,
  `client_pass` varchar(100) NOT NULL,
  `client_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_client`
--

INSERT INTO `software_client` (`client_id`, `client_name`, `client_surname`, `client_username`, `client_pass`, `client_email`) VALUES
(0, 'Alba', 'alba', 'alba', '9f3c53497ff88271d961857b9a845fdb', 'ana@yahoo.com'),
(1, 'Leo', 'Hoxha', 'client', 'client', 'leo@gmail.com'),
(0, 'client ', 'client', 'client', '62608e08adc29a8d6dbc9754e659f125', 'client@gmail.com'),
(0, 'Ale', 'Hoxha', 'hoxha', '7ca4f671d55b82ea7043330c196dbb4c', 'ale@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `software_comment`
--

CREATE TABLE `software_comment` (
  `comment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `mess` text NOT NULL,
  `logs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_comment`
--

INSERT INTO `software_comment` (`comment_id`, `client_id`, `mess`, `logs`) VALUES
(0, 0, 'the service is great', '2020-06-19 18:04:53'),
(0, 0, 'Service is great.', '2020-06-23 00:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `software_economist`
--

CREATE TABLE `software_economist` (
  `economist_id` int(11) NOT NULL,
  `economist_name` varchar(150) NOT NULL,
  `economist_surname` varchar(150) NOT NULL,
  `economist_username` varchar(150) NOT NULL,
  `economist_pass` varchar(100) NOT NULL,
  `economist_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_economist`
--

INSERT INTO `software_economist` (`economist_id`, `economist_name`, `economist_surname`, `economist_username`, `economist_pass`, `economist_email`) VALUES
(0, 'economist', 'economist', 'economist', 'economist', 'economist@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `software_employee`
--

CREATE TABLE `software_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(150) NOT NULL,
  `employee_surname` varchar(150) NOT NULL,
  `employee_username` varchar(100) NOT NULL,
  `employee_pass` varchar(150) NOT NULL,
  `employee_job` varchar(100) NOT NULL,
  `employee_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_employee`
--

INSERT INTO `software_employee` (`employee_id`, `employee_name`, `employee_surname`, `employee_username`, `employee_pass`, `employee_job`, `employee_email`) VALUES
(2, 'Vera', 'Balliu', 'janitor', 'janitor', 'Janitor', 'vera@email.com'),
(1, 'Astrit', 'Vali', 'security', 'security', 'security', 'security@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `software_fattendant`
--

CREATE TABLE `software_fattendant` (
  `fattendant_id` varchar(5) NOT NULL,
  `fattendant_name` varchar(10) NOT NULL,
  `fattendant_surname` varchar(10) NOT NULL,
  `fattendant_email` varchar(30) NOT NULL,
  `fattendant_username` varchar(10) NOT NULL,
  `fattendant_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_fattendant`
--

INSERT INTO `software_fattendant` (`fattendant_id`, `fattendant_name`, `fattendant_surname`, `fattendant_email`, `fattendant_username`, `fattendant_pass`) VALUES
('1', 'Agron', 'Delia', 'agron@email.com', 'attendant', 'attendant');

-- --------------------------------------------------------

--
-- Table structure for table `software_fdriver`
--

CREATE TABLE `software_fdriver` (
  `fdriver_id` varchar(5) NOT NULL,
  `fdriver_name` varchar(10) NOT NULL,
  `fdriver_surname` varchar(10) NOT NULL,
  `fdriver_email` varchar(30) NOT NULL,
  `fdriver_username` varchar(10) NOT NULL,
  `fdriver_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_fdriver`
--

INSERT INTO `software_fdriver` (`fdriver_id`, `fdriver_name`, `fdriver_surname`, `fdriver_email`, `fdriver_username`, `fdriver_pass`) VALUES
('1', 'driver', 'driver', 'driver@email.com', 'driver', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `software_fuelreceipts`
--

CREATE TABLE `software_fuelreceipts` (
  `Receipt_nr` int(11) NOT NULL,
  `Receipt_date` date NOT NULL,
  `fuel_amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `Vat` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_fuelreceipts`
--

INSERT INTO `software_fuelreceipts` (`Receipt_nr`, `Receipt_date`, `fuel_amount`, `price`, `Vat`, `total_price`) VALUES
(1, '2020-06-17', 20, 1.7, 5, 30);

-- --------------------------------------------------------

--
-- Table structure for table `software_incomestatement`
--

CREATE TABLE `software_incomestatement` (
  `incomestatement_nr` int(11) NOT NULL,
  `Datetime` datetime NOT NULL,
  `Revenues` varchar(100) NOT NULL,
  `Expenses` varchar(100) NOT NULL,
  `Net_income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_incomestatement`
--

INSERT INTO `software_incomestatement` (`incomestatement_nr`, `Datetime`, `Revenues`, `Expenses`, `Net_income`) VALUES
(1, '2020-06-10 17:55:00', '18000$', '10000$', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `software_inventory`
--

CREATE TABLE `software_inventory` (
  `Inventory_id` int(11) NOT NULL,
  `Products_name` varchar(500) NOT NULL,
  `Categories_name` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Unit_price` int(11) NOT NULL,
  `Quantity_instock` int(11) NOT NULL,
  `Quantity_ordered` int(11) NOT NULL,
  `Quantity_purchased` int(11) NOT NULL,
  `Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_inventory`
--

INSERT INTO `software_inventory` (`Inventory_id`, `Products_name`, `Categories_name`, `Description`, `Unit_price`, `Quantity_instock`, `Quantity_ordered`, `Quantity_purchased`, `Datetime`) VALUES
(1, 'oil', 'oil', 'oil', 20, 20, 20, 20, '2020-06-23 23:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `software_manager`
--

CREATE TABLE `software_manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(150) NOT NULL,
  `manager_surname` varchar(150) NOT NULL,
  `manager_username` varchar(150) NOT NULL,
  `manager_pass` varchar(100) NOT NULL,
  `manager_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_manager`
--

INSERT INTO `software_manager` (`manager_id`, `manager_name`, `manager_surname`, `manager_username`, `manager_pass`, `manager_email`) VALUES
(1, 'manager', 'manager', 'manager', 'manager', 'manager@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `software_orders`
--

CREATE TABLE `software_orders` (
  `product_name` varchar(150) NOT NULL,
  `Ord_id` int(11) NOT NULL,
  `Ord_amount` varchar(50) NOT NULL,
  `Ord_location` varchar(50) NOT NULL,
  `Ord_dateshipped` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_orders`
--

INSERT INTO `software_orders` (`product_name`, `Ord_id`, `Ord_amount`, `Ord_location`, `Ord_dateshipped`) VALUES
('', 15, '2', 'tirana', '2020-06-22'),
('antifreeze', 15, '2', 'tirana', '2020-06-23'),
('jumper cables', 2, '1', 'Kruje', '2020-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `software_payrolls`
--

CREATE TABLE `software_payrolls` (
  `Payroll_code` int(11) NOT NULL,
  `Employee_name` varchar(50) NOT NULL,
  `Hours` int(11) NOT NULL,
  `Extra_hours` int(11) NOT NULL,
  `dollar_perhour` int(11) NOT NULL,
  `dollar_perextrahour` int(11) NOT NULL,
  `Vacation` int(11) NOT NULL,
  `Other` varchar(100) NOT NULL,
  `Full_transaction` int(11) NOT NULL,
  `Datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_payrolls`
--

INSERT INTO `software_payrolls` (`Payroll_code`, `Employee_name`, `Hours`, `Extra_hours`, `dollar_perhour`, `dollar_perextrahour`, `Vacation`, `Other`, `Full_transaction`, `Datetime`) VALUES
(21, 'Driver', 8, 2, 15, 10, 0, 'Good performance', 300, '2020-06-21 16:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `software_product`
--

CREATE TABLE `software_product` (
  `P_id` int(11) NOT NULL,
  `P_amount` varchar(50) NOT NULL,
  `P_price` float NOT NULL,
  `Vat` int(11) NOT NULL,
  `P_sellingprice` float NOT NULL,
  `P_points` int(11) NOT NULL,
  `product_keywords` varchar(50) NOT NULL,
  `name` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_product`
--

INSERT INTO `software_product` (`P_id`, `P_amount`, `P_price`, `Vat`, `P_sellingprice`, `P_points`, `product_keywords`, `name`) VALUES
(2, '20', 200, 15, 215, 5, 'oil', 'oil.jpg'),
(3, '1', 150, 15, 165, 10, 'antifreeze', 'antifreeze.jpg'),
(4, '10', 2300, 200, 2500, 20, 'jumper cables', '1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `software_purchases`
--

CREATE TABLE `software_purchases` (
  `Pur_id` int(11) NOT NULL,
  `Pur_buyingprice` float NOT NULL,
  `Pur_datepurchased` date NOT NULL,
  `Pur_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_purchases`
--

INSERT INTO `software_purchases` (`Pur_id`, `Pur_buyingprice`, `Pur_datepurchased`, `Pur_amount`) VALUES
(1, 25, '2020-06-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `software_receipt`
--

CREATE TABLE `software_receipt` (
  `receipt_nr` int(11) NOT NULL,
  `Datetime` datetime NOT NULL,
  `P_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `vat` float NOT NULL,
  `taxable total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software_shift`
--

CREATE TABLE `software_shift` (
  `emp_name` varchar(15) NOT NULL,
  `position` varchar(15) NOT NULL,
  `clock_in` datetime NOT NULL,
  `clock_out` datetime NOT NULL,
  `extra_hr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_shift`
--

INSERT INTO `software_shift` (`emp_name`, `position`, `clock_in`, `clock_out`, `extra_hr`) VALUES
('Agron Delia', 'fuel attendat', '2020-06-22 15:02:00', '2020-06-21 15:02:00', 1),
('Agron Delia', 'fuel attendat', '2020-06-22 15:02:00', '2020-06-21 15:02:00', 1),
('cashier', 'cashier', '2020-06-22 15:06:00', '2020-06-22 15:06:00', 1),
('cashier', 'cashier', '2020-06-22 15:06:00', '2020-06-22 15:06:00', 1),
('alba', 'janitor', '2020-06-23 12:39:00', '2020-06-23 20:39:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `software_suppliers`
--

CREATE TABLE `software_suppliers` (
  `Supplier_id` int(11) NOT NULL,
  `P_id` int(150) NOT NULL,
  `S_name` varchar(50) NOT NULL,
  `S_surname` varchar(50) NOT NULL,
  `Contract_begin` date NOT NULL,
  `Contract_end` date NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_suppliers`
--

INSERT INTO `software_suppliers` (`Supplier_id`, `P_id`, `S_name`, `S_surname`, `Contract_begin`, `Contract_end`, `Amount`) VALUES
(1, 0, 'Steven', 'Smith', '2020-06-02', '2021-01-23', 100);

-- --------------------------------------------------------

--
-- Table structure for table `software_wage`
--

CREATE TABLE `software_wage` (
  `name` varchar(150) NOT NULL,
  `wage` int(11) NOT NULL,
  `total_work_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software_wage`
--

INSERT INTO `software_wage` (`name`, `wage`, `total_work_hours`) VALUES
('economist', 500, 45),
('manager', 450, 40),
('cashier', 300, 35);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
