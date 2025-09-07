-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 09:17 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_project_type`
--

CREATE TABLE `add_project_type` (
  `project_type_id` int(11) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_project_type`
--

INSERT INTO `add_project_type` (`project_type_id`, `project_type`, `status`, `url`, `image`, `description`) VALUES
(1, 'Infrastructure', '1', 'Infrastructure', 'Contract.jpg', 'KSMB is a highly trusted name in the field of Infrastructure Development in northern India and has successfully completed a number of contractual projects for Multinational Companies, Government, and Corporate Sector'),
(2, 'Real Estate', '1', 'RealEstate', 'ksmb-realstate.jpg', 'KSMB has earned a respectable name for itself in the Real Estate Sector of Lucknow in a short span of time and the Real Estate Division of the Group is all poised to create new benchmarks and offer an unparalleled lifestyle to its customers');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `reset_key` varchar(255) NOT NULL,
  `key_status` varchar(255) NOT NULL,
  `key_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `name`, `email`, `phoneno`, `password`, `reset_key`, `key_status`, `key_time`) VALUES
(1, 'KSMB', 'b.akhileshverma@gmail.com', '9695916449', '$2y$12$VdRiVr/NWNcjiq5lMk8/ce7W6o/j/kM/PCVA7mxH6SfwPdv2wcqiK', 'f7f25ffb743b4418ffe0ad119107ea608f76b0782295feebf5e6de1411ab64ee', '1', '2025-08-27 08:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `award_tabel`
--

CREATE TABLE `award_tabel` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `award_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(15) NOT NULL,
  `user_id` int(15) DEFAULT NULL,
  `blog_head` varchar(300) DEFAULT NULL,
  `blog_description` varchar(350) DEFAULT NULL,
  `blog_keyword` varchar(3500) DEFAULT NULL,
  `blog_intro` varchar(450) DEFAULT NULL,
  `blog_url` varchar(150) DEFAULT NULL,
  `blog_content` text DEFAULT NULL,
  `blog_head_image` varchar(450) DEFAULT NULL,
  `tags` varchar(2500) DEFAULT NULL,
  `author` varchar(450) DEFAULT NULL,
  `trn_date` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `user_id`, `blog_head`, `blog_description`, `blog_keyword`, `blog_intro`, `blog_url`, `blog_content`, `blog_head_image`, `tags`, `author`, `trn_date`) VALUES
(9, 1, 'HOME LOAN GUID', '1. How much loan can I avail?\r\nA maximum loan of 80% - 85% of the agreement value can be availed. However, depending on your income eligibility and approved by the bank, your loan amount may differ. All loans are at the sole discretion of the banks........', 'Blog', 'intro', 'HOMELOANGUID-9', '<p><strong>1. How much loan can I avail?</strong><br>A maximum loan of 80% - 85% of the agreement value can be availed. However, depending on your income eligibility and approved by the bank, your loan amount may differ. All loans are at the sole discretion of the banks.</p><p><strong>2. What is the term of the loan that bank offers?</strong><br>Home Loans are offered for a term ranging between 10 years to 25 years by bank and financial institutions.</p><p><strong>3. What are the Basic Documents required for Home Loans?</strong><br>Documents required for home loan by a salaried person in India are:</p><ul><li>Original Salary Slip for past 3 months or Salary Certificate</li><li>Form 16 A (TDS Form) photocopy from the applicant’s employer</li><li>Photocopy of the applicant’s updated bank statement for last 6 months</li><li>Photocopy of the applicant’s company I.D. card, Aadhar Card, Pan Card or voter I.D. card or the applicant’s passport/ ration card.</li><li>Passport size colour photographs of the applicant &amp; co-applicant</li></ul><p>Documents required for self-employed persons in India are:</p><ul><li>Photocopy of the applicant’s statement of accounts for the last 6 months</li><li>Applicant’s passport/ration card photocopy</li><li>A profile of the applicant’s business mentioning the nature of the business, employee strength, geographical territory, etc.</li><li>A copy of the partnership deed, 3 years P &amp; L A/c, Balance Sheet, computation of income certified by a CA and individual computation of income and tax returns for last 3 years in the case of a business partnership</li><li>3 years P &amp; L A/c, Balance Sheet, computation of income certified by a CA and an income tax return file statement for 3 years is required, in case of a proprietor or professional</li><li>A remuneration certificate, board resolution for fixing remuneration, the company\'s annual report and individual IT returns for last 3 years is required, if the company applying for a loan is Private Ltd.</li></ul><p><strong>4. What is the procedure for disbursement of home loan?</strong><br>The bank undertake verification and due diligence of all the required documents submitted by the Applicant, the loan amount will be disbursed by the bank. The disbursement of the loan will be in the favour of the Developer.<br><br>Documents required for disbursement:</p><ul><li>Agreement to Sale&nbsp;</li><li>Loan agreement</li><li>Disbursement requests</li><li>Post-dated cheques</li><li>Personal guarantors documents.</li></ul><p><strong>Some Important Home Loan Facts:</strong></p><ol><li>One of the basic home loan facts is that it is a prerequisite for most banks that the borrower take out an insurance policy to protect the home loan. This ensures that they will get their money back if the borrower dies or is for some other reason incapable of servicing his or her loan. This is because, such an agreement between borrower and lender is over extended periods of time. Unless the borrower finds the financial means to prepay it in part of in totality, a home loan is generally repaid over several years.</li><li>For any loan, rate of interest and principal are two basic components involved while calculating EMI payment. A major part of the amount goes in paying up the interest, in the first few years of your loan repayment tenure. After you have paid much of the interest, the trend reverses after a few years and the principal repayment increases. Banks have to increase tenure up to a certain point, as today home loan interest rates are high everywhere. The EMI you pay fails to cover the loan amount, if the interest rate continues to go up. These are some important home loan facts which you should be aware of before buying a home.</li></ol><p><strong>Tax Benefits:</strong></p><p><strong>1. Will I get tax benefits on loans?</strong><br>Yes, under various sections of Income Tax department, you are eligible for tax benefits</p><p><strong>2. Do I get deduction on Interest payment?</strong><br>The repayment of the interest portion of the EMI is allowed as a deduction under section 24 under the head \"income from house property\" up to Rs. 1,50,000/- for self-occupied property.&nbsp;</p><p><strong>3. Do I get deduction on principal?</strong><br>Under section 80C up to a maximum amount of Rs. 1,50,000/- the repayment of principal amount of the loan can be claimed as a deduction. Under Section 80C towards payment made for stamp duty, registration fee and other expenses for the purpose of transferring the property in the name of the assessed also, one can claim deduction. All these deductions however should not exceed the overall limit of Rs. 1 lakh. However, deduction under Section 80C is not available in respect of payment made towards the cost of any addition, alteration, renovation or repair carried out after the issue of the completion certificate.<br><br><strong>4. What is TDS on Property?</strong><br>A purchaser of an immovable property (other than agricultural land) worth Rs 50 lakh or more is required to pay withholding tax at the rate of 1% of the sales consideration effective 1st June 2013. Buyer of the property is required to deduct the TDS and deposit the same in Government treasury. Purchaser of the property is not required to procure Tax Deduction Account Number (TAN) according to rules in respect of tax deducted at source. The Buyer is required to quote his or her PAN and sellers PAN.</p>', '1756264079_service_1_9.svg', 'beatmoniter', 'Akhilesh verma', 'August 27, 2025'),
(11, 1, 'HOME LOAN GUID', '1. How much loan can I avail?\r\nA maximum loan of 80% - 85% of the agreement value can be availed. However, depending on your income eligibility and approved by the bank, your loan amount may differ. All loans are at the sole discretion of the banks........', 'Blog', 'intro', 'HOMELOANGUID-9', '<p><strong>1. How much loan can I avail?</strong><br>A maximum loan of 80% - 85% of the agreement value can be availed. However, depending on your income eligibility and approved by the bank, your loan amount may differ. All loans are at the sole discretion of the banks.</p><p><strong>2. What is the term of the loan that bank offers?</strong><br>Home Loans are offered for a term ranging between 10 years to 25 years by bank and financial institutions.</p><p><strong>3. What are the Basic Documents required for Home Loans?</strong><br>Documents required for home loan by a salaried person in India are:</p><ul><li>Original Salary Slip for past 3 months or Salary Certificate</li><li>Form 16 A (TDS Form) photocopy from the applicant’s employer</li><li>Photocopy of the applicant’s updated bank statement for last 6 months</li><li>Photocopy of the applicant’s company I.D. card, Aadhar Card, Pan Card or voter I.D. card or the applicant’s passport/ ration card.</li><li>Passport size colour photographs of the applicant &amp; co-applicant</li></ul><p>Documents required for self-employed persons in India are:</p><ul><li>Photocopy of the applicant’s statement of accounts for the last 6 months</li><li>Applicant’s passport/ration card photocopy</li><li>A profile of the applicant’s business mentioning the nature of the business, employee strength, geographical territory, etc.</li><li>A copy of the partnership deed, 3 years P &amp; L A/c, Balance Sheet, computation of income certified by a CA and individual computation of income and tax returns for last 3 years in the case of a business partnership</li><li>3 years P &amp; L A/c, Balance Sheet, computation of income certified by a CA and an income tax return file statement for 3 years is required, in case of a proprietor or professional</li><li>A remuneration certificate, board resolution for fixing remuneration, the company\'s annual report and individual IT returns for last 3 years is required, if the company applying for a loan is Private Ltd.</li></ul><p><strong>4. What is the procedure for disbursement of home loan?</strong><br>The bank undertake verification and due diligence of all the required documents submitted by the Applicant, the loan amount will be disbursed by the bank. The disbursement of the loan will be in the favour of the Developer.<br><br>Documents required for disbursement:</p><ul><li>Agreement to Sale&nbsp;</li><li>Loan agreement</li><li>Disbursement requests</li><li>Post-dated cheques</li><li>Personal guarantors documents.</li></ul><p><strong>Some Important Home Loan Facts:</strong></p><ol><li>One of the basic home loan facts is that it is a prerequisite for most banks that the borrower take out an insurance policy to protect the home loan. This ensures that they will get their money back if the borrower dies or is for some other reason incapable of servicing his or her loan. This is because, such an agreement between borrower and lender is over extended periods of time. Unless the borrower finds the financial means to prepay it in part of in totality, a home loan is generally repaid over several years.</li><li>For any loan, rate of interest and principal are two basic components involved while calculating EMI payment. A major part of the amount goes in paying up the interest, in the first few years of your loan repayment tenure. After you have paid much of the interest, the trend reverses after a few years and the principal repayment increases. Banks have to increase tenure up to a certain point, as today home loan interest rates are high everywhere. The EMI you pay fails to cover the loan amount, if the interest rate continues to go up. These are some important home loan facts which you should be aware of before buying a home.</li></ol><p><strong>Tax Benefits:</strong></p><p><strong>1. Will I get tax benefits on loans?</strong><br>Yes, under various sections of Income Tax department, you are eligible for tax benefits</p><p><strong>2. Do I get deduction on Interest payment?</strong><br>The repayment of the interest portion of the EMI is allowed as a deduction under section 24 under the head \"income from house property\" up to Rs. 1,50,000/- for self-occupied property.&nbsp;</p><p><strong>3. Do I get deduction on principal?</strong><br>Under section 80C up to a maximum amount of Rs. 1,50,000/- the repayment of principal amount of the loan can be claimed as a deduction. Under Section 80C towards payment made for stamp duty, registration fee and other expenses for the purpose of transferring the property in the name of the assessed also, one can claim deduction. All these deductions however should not exceed the overall limit of Rs. 1 lakh. However, deduction under Section 80C is not available in respect of payment made towards the cost of any addition, alteration, renovation or repair carried out after the issue of the completion certificate.<br><br><strong>4. What is TDS on Property?</strong><br>A purchaser of an immovable property (other than agricultural land) worth Rs 50 lakh or more is required to pay withholding tax at the rate of 1% of the sales consideration effective 1st June 2013. Buyer of the property is required to deduct the TDS and deposit the same in Government treasury. Purchaser of the property is not required to procure Tax Deduction Account Number (TAN) according to rules in respect of tax deducted at source. The Buyer is required to quote his or her PAN and sellers PAN.</p>', '1756264079_service_1_9.svg', 'beatmoniter', 'Akhilesh verma', 'August 27, 2025');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cate`
--

CREATE TABLE `blog_cate` (
  `blog_cate_id` int(15) NOT NULL,
  `blog_cate_name` varchar(25) DEFAULT NULL,
  `blog_cate_slug` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_cate`
--

INSERT INTO `blog_cate` (`blog_cate_id`, `blog_cate_name`, `blog_cate_slug`) VALUES
(6, 'Medical', 'Medical');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cate_blog`
--

CREATE TABLE `blog_cate_blog` (
  `id` int(15) NOT NULL,
  `blog_id` varchar(15) DEFAULT NULL,
  `blog_cate_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_cate_blog`
--

INSERT INTO `blog_cate_blog` (`id`, `blog_id`, `blog_cate_id`) VALUES
(6, '6', '5'),
(7, '7', '5'),
(8, '8', '5'),
(9, '9', '5'),
(10, '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `job_id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `skills_and_Experience` text NOT NULL,
  `Short_description` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`job_id`, `job_type`, `position`, `responsibilities`, `requirements`, `skills_and_Experience`, `Short_description`, `experience`, `date`) VALUES
(5, 'Web Development', 'Junior Manager', '<p><i>Lorem ipsum</i>, or <i>lipsum</i> as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s <i>De Finibus Bonorum et Malorum</i> for use in a type specimen book. It usually begins with:</p><blockquote><p><i>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”</i></p></blockquote><p>The purpose of <i>lorem ipsum</i> is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without <a href=\"https://loremipsum.io/#controversy\">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p><p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our <a href=\"https://loremipsum.io/#generator\">generator</a> to get your own, or read on for the authoritative history of <i>lorem ipsum</i>.</p>', '<p>You can use lorem ipsum as a substitute for content in many print and digital formats. Traditionally, the print industry used lorem ipsum in specimen booklets to demonstrate the size and style range of a particular typeface. As the industry progressed, it started appearing in transfer sheets and word processors. Now, you can find lorem ipsum in printed items like pamphlets or brochures, magazines, newspapers, letter headings, advertising and packaging. In digital design, lorem ipsum appears in digital marketing, product descriptions, website designs, infographics and blog posts.</p>', '<p>The origins of lorem ipsum trace to an ancient Latin text. Analysis of the text block reveal that fragments of the text match passages by the Roman philosopher Cicero from 45 B.C. The first use of lorem ipsum as placeholder text traces to a printer in the 1500s that scrambled pieces of the original text and used the new text when making a specimen book.</p><p>In the 1960s, a typeface manufacturer used lorem ipsum in advertising campaigns and sold pages of lipsum as rub-down transfer sheets, which were used in the era before computers. In the 1980s, with the development of digital publishing software, companies started selling software that included built-in graphics and word-processing templates with a version of lipsum.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p>', 'The basic premise of search engine reputation management is to use the following three strategies to accomplish the goal of creating a completely positive first page of search engine results for a specific', '10 Years', 'December 15, 2022'),
(6, 'Web Development', 'Senior Manager', '<p>A vast majority of the app marketers mainly concentrate on the post-launch app marketing techniques and measures while completely missing on the pre-launch campaign. This prevents the app to create buzz and hype just around the time when the app is launched. As and when you launch the app, already a considerable number of people should expectantly look forward to your app and this requires long-drawn marketing efforts leading up to the app launch event. To create pre-launch buzz and hype about the app a mobile app development company has an array of marketing options like social media campaign, search engine ads, video ads, email campaigns, etc. Apart from online options, you can also reach out to the wider audience with traditional marketing options like outdoor ads, print ads, media ads, and promotional events.</p>', '<p>Just as a retail business in real life is remembered not just for its product offerings but also because of its services, support, and customer-friendliness, an app that offers a <strong>helpful customer support system</strong> for its valued users enjoy more traction and engagement than other apps. Great brands all over the globe enjoy appreciation and popularity because of their customer-friendly support and services.</p>', '<p>Just as a retail business in real life is remembered not just for its product offerings but also because of its services, support, and customer-friendliness, an app that offers a <strong>helpful customer support system</strong> for its valued users enjoy more traction and engagement than other apps. Great brands all over the globe enjoy appreciation and popularity because of their customer-friendly support and services.</p>', 'The basic premise of search engine reputation management is to use the following three strategies to accomplish the goal of creating a completely positive first page of search engine results for a specific', '15 Years', 'December 19, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `carrer_form`
--

CREATE TABLE `carrer_form` (
  `form_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrer_form`
--

INSERT INTO `carrer_form` (`form_id`, `name`, `email`, `message`, `document`, `job_id`) VALUES
(1, 'Akhilesh', 'vermm@gmail.com', 'new', '1671435408_Attendance of OCTOBER.xlsx.pdf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_tabel`
--

CREATE TABLE `certificate_tabel` (
  `certificate_id` int(11) NOT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificate_tabel`
--

INSERT INTO `certificate_tabel` (`certificate_id`, `certificate_name`, `document`) VALUES
(4, 'ISO Certificate 9001', 'KSM BASHIR- 9001.pdf'),
(5, 'ISO Certificate 14001', 'KSM BASHIR- 14001.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(13) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `number`, `message`) VALUES
(1, 'Akhilesh', 'akhilesh.awesomesauce@gmail.com', NULL, 'my name is akhilesh'),
(3, 'Akhilesh', 'akhilesh.awesomesauce@gmail.com', NULL, 'hiii i am akhilesh'),
(4, 'akhilesh', 'b.akhileshverma@gmail.com', NULL, 'hi i am akhilesh');

-- --------------------------------------------------------

--
-- Table structure for table `csr`
--

CREATE TABLE `csr` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `postion` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csr`
--

INSERT INTO `csr` (`id`, `image`, `postion`, `title`) VALUES
(1, 'Untitled design.1706791212.jpg', NULL, ''),
(2, 'Untitled design (2).jpg', NULL, ''),
(3, 'Untitled design5.jpg', NULL, ''),
(4, 'Untitled design (4).jpg', NULL, ''),
(5, 'Untitled design (10).jpg', NULL, ''),
(6, 'Untitled design (12).jpg', NULL, ''),
(7, 'Untitled design (13).jpg', NULL, ''),
(8, 'Untitled design (5).1706847985.jpg', NULL, ''),
(9, 'Untitled design (6).1706862385.jpg', NULL, ''),
(10, 'Untitled design (10).1706862453.jpg', NULL, ''),
(11, 'Untitled design (7).1706862491.jpg', NULL, ''),
(12, '0Q3A7506.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_gallery`
--

CREATE TABLE `media_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `postion` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_gallery`
--

INSERT INTO `media_gallery` (`id`, `image`, `postion`, `title`) VALUES
(28, 'Garden Bay Township.1713266895.jpg', NULL, 'Garden Bay Township'),
(29, 'Garden Bay Heights.jpg', NULL, 'Garden Bay Heights'),
(30, 'The Oasis.1689582935.jpg', NULL, 'Club House Garden Bay'),
(31, 'Garden Bay Heights.1689584258.jpg', NULL, 'Garden Bay Heights'),
(36, '1685078153_gardenbay_two.jpg', NULL, 'Garden Bay'),
(48, 'Untitled design.jpg', NULL, 'Conference Room'),
(49, 'New Office Cons..jpg', NULL, 'Construction Division'),
(50, 'Construction Division.jpg', NULL, 'Construction Division'),
(51, 'Reception.jpg', NULL, 'Reception Area'),
(52, '15th Aug Celebration.jpg', NULL, '15th Aug Celebration'),
(53, 'PM & CM.1690801491.jpg', NULL, 'Inauguration of Kanpur Metro by Hon\'ble Prime Minister Shri Narendra Modi Ji and Hon\'ble Chief Minister Shri Yogi Adityanath Ji'),
(54, '16.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(55, '17.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(56, '19.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(57, '20.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(58, '18.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(59, '21.jpg', NULL, 'Euronics Corporate Cricket League 2024 - Season 2.<br> Team KSMB League 2024 Winner'),
(60, 'Sports.jpg', NULL, 'Euronics Corporate Cricket League Lucknow Season - 2  Team KSMB League 2024 Winner'),
(62, 'Safety 4.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(63, 'Safety - 3.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(65, 'Safety - 1.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(66, 'Safety 5.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(76, 'Safety 2.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(77, '7.jpg', NULL, 'Team KSMB Signing the Safety Pledge during the Safety Month Celebration at Corporate Office in Lucknow'),
(78, '008.jpg', NULL, 'Safety Is Our First Priority'),
(79, '007.jpg', NULL, 'Safety Is Our First Priority'),
(80, '006.jpg', NULL, 'Safety Is Our First Priority'),
(102, 'W_1.jpg', NULL, 'International Women\'s Day Celebration at KSMB Head Office'),
(103, 'W_3.jpg', NULL, 'International Women\'s Day Celebration at KSMB Head Office'),
(104, 'W_4.jpg', NULL, 'International Women\'s Day Celebration at KSMB Head Office'),
(106, 'W_6.jpg', NULL, 'International Women\'s Day Celebration at KSMB Head Office'),
(107, 'W_5.jpg', NULL, 'International Women\'s Day Celebration at KSMB Head Office'),
(302, 'Bhoomi Pujan.JPG', NULL, 'Lucknow Metro Bhawan Ground Breaking Ceremony'),
(303, 'EVENT - 2.JPG', NULL, 'Lucknow Metro Bhawan Ground Breaking Ceremony'),
(315, 'metrobhawan_ground_break_ceremony.jpg', NULL, 'Lucknow Metro Bhawan Ground Breaking Ceremony'),
(316, 'EVENT - 1.JPG', NULL, 'Lucknow Metro Bhawan Ground Breaking Ceremony');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_type_id` int(11) DEFAULT NULL,
  `project_name_id` int(11) DEFAULT NULL,
  `head_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `project_data` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `date` varchar(200) NOT NULL,
  `project_status` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_type_id`, `project_name_id`, `head_image`, `name`, `heading`, `short_description`, `project_data`, `url`, `date`, `project_status`, `location`, `logo`, `is_featured`) VALUES
(24, 2, 14, '1691937977_new.jpg', 'KSMB', 'GARDEN BAY', 'Garden Bay is a township project with impressive range of homes that are blessed with pristine nature, sophisticated innovation, opulent facilities and exotic comfort.', '<p>Garden Bay is an amazing 72-acre township, located at Sitapur-Hardoi Link Road, Lucknow. The township boasts of an incredibly tranquil environment, delivering a wholesome living experience. Our masterful team endeavors to present you a lifestyle that will elevate your lifestyle above&nbsp;all&nbsp;others.</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1685078153_gardenbay_four.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1685078153_gardenbay_three.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1685078153_gardenbay_two.jpg\"></figure><h3><strong>Garden Bay Amenities: -</strong></h3><p>- Contemporary Clubhouse &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Gymnasium &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Courts for Lawn Tennis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Badminton &amp; Basketball &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Billiards &amp; Table Tennis</p><p>- Cricket Net &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Swimming Pool &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Kids Pool &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - CCTV Surveillance &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -&nbsp;Cafe</p><p>- Educational Facility &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- Convenience&nbsp;Shopping</p>', 'GARDENBAY', '2014-2023', 1, 'Lucknow', '1685077369_gardenbay_logo.png', 1),
(26, 1, 9, '1690456497_Nepal.jpg', 'KSMB', 'Integrated Check Post at Rupaidiha', 'Rupaidiha, strategically situated in Bahraich district of Uttar Pradesh, is the first Land Port of U.P. along the international border with Nepal.', '<p>Representing a crucial gateway for trade and commerce, Rapaidiha in Bahraich District stands as Uttar Pradesh\'s primary Land Port on international border with Nepal having seamless connectivity to Lucknow. As the third operational Land Port on the Indo-Nepal border, this establishment is poised to foster robust bilateral trade, enhancing economic ties between India and Nepal.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690456828_Nepal-1.jpg\"></figure><h2>&nbsp;</h2><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690456861_Nepal-2.jpg\"></figure><h2>&nbsp;</h2>', 'IntegratedCheckPostatRupaidiha', '', 1, 'Rupadiha (UP) Indo-Nepal Border', '', 0),
(29, 1, 11, '1690016306_River Side Mall.jpg', 'KSMB', 'Inox River Side Mall', 'Spread over an expansive area, INOX Riverside Mall boasts a diverse array of high end Retail stores.', '<p>INOX Riverside Mall is a captivating destination nestled in the heart of Gomti Nagar, Lucknow. This iconic mall offers a delightful fusion of contemporary elegance and a vibrant shopping experience. Spread over an expansive area, INOX Riverside Mall boasts of a diverse array of high-end retail stores, fashion boutiques, and lifestyle outlets, catering to discerning shoppers apart from offering a world-class cinematic experience at INOX cinema.</p><p><img src=\"https://ksmb.in/images/ck_editor/1691828224_Inox Riverside Mall Gomti Nagar Lucknow.jpg\"></p><p>&nbsp;</p>', 'InoxRiverSideMall', '', 1, 'Lucknow', '', 1),
(30, 1, 11, '1690295755_ksmb-nbcc.jpg', 'KSMB', 'NBCC Commercial Complex at Lucknow', 'NBCC Complex is a Ready to Move Commercial Project offering Office spaces and Shops for sale / rent.', '<p>Situated in the most rapidly developing area of Lucknow, this exquisite commercial project is meticulously crafted to cater specifically to commercial needs. Spanning across 1.79 acres, it offers a diverse range of spaces, ranging from 200 sqft to 1319 sqft. The construction of this commercial building was undertaken with precision and excellence resulting in the creation of a beautiful building which is considered as a landmark in the Neighbouring area.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690532058_NBCC-1.jpg\"></figure><h2>&nbsp;</h2><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690532443_NBCC.jpg\"></figure><h2>&nbsp;</h2>', 'NBCCCommercialComplexatLucknow', '', 1, 'Lucknow', '', 1),
(38, 1, 4, '1690610434_Kanpur Metro-11.jpg', 'KSMB', 'Depot cum Workshop for Kanpur Metro', 'This crucial project is of great significance as it was undertaken under the patronage of the hon’ble Chief Minister of U.P.', '<p>This crucial project is of great significance as it was undertaken under the patronage of the hon’ble Chief Minister of U.P. This project was developed by KSMB Group as a State-of-the-Art facility which now serves as a crucial asset for the Kanpur Metro providing a cutting-edge facility for its efficient operations. The successful completion of this project has further strengthened our position as a leading construction firm capable of successfully completing complex projects.</p><figure class=\"image image_resized\" style=\"width:99.44%;\"><img src=\"https://ksmb.in/images/ck_editor/1740393316_Kanpur Metro - 1.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740393304_Kanpur Metro - 2.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690610448_PM &amp; CM.jpg\"></figure><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690609077_KSMB-KanpurMetro.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690443887_Kanpur Metro-12.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690532969_Metro.jpg\"></figure><p>&nbsp;</p>', 'DepotcumWorkshopforKanpurMetro', '', 1, 'Kanpur', '', 1),
(39, 1, 19, '1690355221_PNB.jpg', 'KSMB', 'Staff Quarters For Punjab National Bank At Gomti Nagar Lucknow', 'This Group Housing project was constructed for the accommodation of the staff of Punjab National Bank.', '<p>Located strategically in the vibrant neighbourhood of Gomti Nagar, Lucknow, the Staff Quarters project has been meticulously designed to provide a comfortable and convenient living space for the bank\'s esteemed employees. Our team of skilled professionals worked diligently to complete this project on schedule, ensuring a smooth and hassle-free construction process.</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740475380_pnb_staff_quarters.jpg\"></figure>', 'StaffQuartersForPunjabNationalBankAtGomtiNagarLucknow', '', 1, 'Lucknow', '', 1),
(40, 1, 19, '1690355490_Director\'s Residence, Metro Rail, Lucknow.jpg', 'KSMB', 'Director\'s Residence, Metro Rail, Lucknow', 'An exquisite Villa was constructed for the Director of LMRC offering a peaceful living environment.', '<p>An exquisite Villa was constructed for the Director of LMRC offering a peaceful living&nbsp;environment.</p>', 'DirectorsResidenceMetroRailLucknow', '', 1, 'Lucknow', '', 0),
(41, 1, 19, '1690355848_CLUSTER BUILDING HOUSING AT LUCKNOW METRO RAIL CORPORATION LUCKNOW.jpg', 'KSMB', 'Multi-Storied Officers Colony of Lucknow Metro Rail Corporation at Lucknow', 'This colony has been constructed for the accommodation of the officers and staff of the Lucknow Metro.', '<p>Lucknow Metro Rail Corporation (LMRC) staff colony has been constructed near Jail Road in Lucknow for the accommodation of its officers and staff for Phase-1 of the Lucknow Metro project. The Lucknow Metro Rail Corporation Staff Colony has been strategically designed to provide easy accessibility to the Lucknow Metro Phase -1. This residential facility has been constructed with modern amenities to ensure that the officers and staff of LMRC live in a comfortable and healthy environment.</p><p>&nbsp;</p>', 'Multi-StoriedOfficersColonyofLucknowMetroRailCorporationatLucknow', '', 1, 'Lucknow', '', 0),
(46, 1, 20, '1690435818_Kansai Narolac Paints Plant-1 - Kanpur Dehat.jpg', 'KSMB', 'Kansai Nerolac Paints Plant-1 Kanpur Dehat', '', '<figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1693047455_Picture1.jpg\"></figure>', 'KansaiNerolacPaintsPlant-1KanpurDehat', '', 1, 'Kanpur', '', 0),
(47, 1, 20, '1690435860_Kansai Narolac Paints Plant-2 Kanpur Dehat.jpg', 'KSMB', 'Kansai Nerolac Paints Plant-2 Kanpur Dehat', '', '<figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1693047538_Picture2.jpg\"></figure>', 'KansaiNerolacPaintsPlant-2KanpurDehat', '', 1, 'Kanpur', '', 0),
(59, 1, 10, '1690872908_Reabareli.jpg', 'KSMB', 'National Institute of Fashion & Technology, Raebareli', 'As a premier institution in the field of Fashion Technology, NIFT has brought Raebareli in the forefront of the Fashion Industry.', '<p>Nestled within a vast and verdant campus, NIFT, Raebareli boasts a picturesque setting creating an environment free from pollution. The focal points of academic and administrative activities reside within the multi-storied buildings designed to accommodate well-equipped classrooms, studios, laboratories, and a resourceful library. The institute is situated just 3 kilometres away from Raebareli Junction and 82 kilometres from Lucknow.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740395582_NIF RBL1.jpg\"></figure><p>NATIONAL INSTITUTE OF FASHION TECHNOLOGY RAEBARELI AMPHITHEATER</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740395592_NIF RBL2.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740395600_NIF RBL3.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740395616_NIF RBL4.jpg\"></figure>', 'NationalInstituteofFashionTechnologyRaebareli', '', 1, 'Reabareli', '', 1),
(60, 1, 10, '1690612613_National Aviation University Fursatganj, Amethi.jpg', 'KSMB', 'Rajiv Gandhi National Aviation University, Fursatganj, Amethi', 'The academy was established with the aim of creating a centre for excellence for training commercial pilots offering the best of training facilities available.', '<p>Rajiv Gandhi National Aviation University at Fursatganj, Amethi is yet another milestone in our bouquet of completed projects.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613446_NATIONAL AVIATION UNIVERSITY FURSATGANJ.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613472_National Aviation University Open Air Theater Academic Block, Fursatganj, Amethi.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613489_National Aviation University Hostel Block, Fursatganj, Amethi.jpg\"></figure>', 'IndraGandhiRashtriyaUdanAcademyFursatganjAmethi', '', 1, 'Amethi', '', 1),
(61, 1, 10, '1690612757_New Campus of Central University of Punjab at Bhatinda.jpg', 'KSMB', 'Central University of Punjab, Bhatinda', 'Sprawling across 500 acres, the Central University of Punjab is an educational institution of significant importance.', '<p>University is now sprawling across 500 acres of land in Ghudda village in district Bhatinda. The campus is environment-friendly and energy-efficient and its Master Plan has provisionally been certified with a five-star rating by GRIHA Council and TERI.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613788_New Campus of Central University of Punjab, Bhatinda.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613818_PG Hostel, New Campus Central University Punjab Bhatinda.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690613849_Women PG Hostel, New Campus Central University Punjab Bhatinda.jpg\"></figure>', 'CentralUniversityofPunjabBhatinda', '', 1, 'Bhatinda, Punjab', '', 1),
(62, 1, 10, '1690612821_CDRI-1.jpg', 'KSMB', 'Central Drugs Research Institute, Lucknow', 'The Central Drug Research Institute is a multidisciplinary research laboratory situated in Lucknow (U.P.)', '<p>The Central Drugs Research Institute at Lucknow is a crowning achievement by KSMB Group. With meticulous planning and unwavering dedication, we have crafted a cutting-edge research facility that exemplifies innovation and functionality. Witness the embodiment of our commitment to excellence as we proudly showcase CDRI Lucknow among our completed projects, symbolizing a new era in construction prowess.</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740398458_CDRI Lucknow.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740398466_DSC06739-HDR.jpg\"></figure><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1740398471_DSC06860-HDR.jpg\"></figure>', 'CentralDrugsResearchInstituteLucknow', '', 1, 'Lucknow', '', 1),
(63, 1, 20, '1690870832_Berger Paint Plant Jammu.jpg', 'KSMB', 'Berger Paint Plant at Jammu', '', '<p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690870883_Berger Paint at Jammu-2.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690870903_Berger Paint at Jammu.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1690870919_Berger Paint at Jammu-3.jpg\"></figure><p>&nbsp;</p><figure class=\"image image_resized\" style=\"width:97.15%;\"><img src=\"https://ksmb.in/images/ck_editor/1690870932_Berger Paint at Jammu-4.jpg\"></figure><p>&nbsp;</p>', 'BergerPaintPlantatJammu', '', 1, 'Jammu', '', 0),
(65, 1, 20, '1691734351_Amritsar Kansai.jpg', 'KSMB', 'Kansai Nerolac Amritsar, Punjab', 'Integrated Paint Factory for Kansai Nerolac Paints Ltd. at Amritsar', '<p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1691734280_Amritsar Kansai-1.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1691734299_Amritsar Kansai-2.jpg\"></figure>', 'KansaiNerolacAmritsarPunjab', '', 1, 'Amritsar, Punjab', '', 0),
(66, 1, 20, '1691734547_Gujrat Kansai.jpg', 'KSMB', 'Kansai Nerolac Bharuch Gujarat', 'Integrated Paint Factory for Kansai Nerolac Paints Ltd. at Bharuch Gujarat.', '<p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1691734645_Gujrat-1.jpg\"></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://ksmb.in/images/ck_editor/1691734666_Gujrat-2.jpg\"></figure><p>&nbsp;</p>', 'KansaiNerolacBharuchGujarat', '', 1, 'Bharuch, Gujrat', '', 0),
(67, 1, 4, '1691831177_Indore Metro.jpg', 'KSMB', 'Rolling Stock Depot cum Workshop for Indore Metro Rail Project', 'This Stock Depot cum Workshop is an integral and important part of the Indore Metro Rail Project.', '<p>This project offered a challenging work environment where coordination and collaboration with various contractors responsible for Track, Signalling, Rail, and other crucial components was required. Further, the MPMRCL also suddenly preponed the completion date for certain buildings due to their requirements for Trial Runs. We diligently put in extra efforts and successfully achieved the desired timelines maintaining the desired quality standards.</p><p>&nbsp;</p>', 'RollingStockDepotcumWorkshopforIndoreMetroRailProject', '', 1, 'Indore', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_gallery`
--

CREATE TABLE `project_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `postion` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_gallery`
--

INSERT INTO `project_gallery` (`id`, `image`, `postion`, `title`) VALUES
(13, 'Garden Bay Township.1689584737.jpg', NULL, 'Garden Bay Township'),
(14, 'Garden Bay Heights.1689584795.jpg', NULL, 'Garden Bay Heights'),
(15, 'Garden Bay Club House.jpg', NULL, 'Garden Bay Club House'),
(16, 'night view.jpg', NULL, 'Garden Bay Township Night View'),
(17, 'Day View.jpg', NULL, 'Garden Bay Township Day View'),
(18, 'Club Night View.jpg', NULL, 'Garden Bay Club House Night View'),
(19, 'Garden Bay Entrance Gate.jpg', NULL, 'Garden Bay Entrance Gate'),
(20, 'Gate.jpg', NULL, 'Garden Bay Entrance Gate'),
(21, 'ddddddd.jpg', NULL, 'Garden Bay ');

-- --------------------------------------------------------

--
-- Table structure for table `project_name`
--

CREATE TABLE `project_name` (
  `id` int(11) NOT NULL,
  `project_type_id` int(11) NOT NULL,
  `project_name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(800) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_name`
--

INSERT INTO `project_name` (`id`, `project_type_id`, `project_name`, `image`, `status`, `description`, `url`, `date`, `logo`) VALUES
(4, 1, 'Metro Projects', '1690348299_Metro Projects.jpg', 1, '', 'metroprojects-1', '10-08-2023', '1681994120_Frame 26.png'),
(9, 1, 'Integrated Check Post', '1690353045_Nepal.jpg', 1, '', 'integratedcheckpost-1', '14-08-2023', ''),
(10, 1, 'Institutional Projects', '1690610945_Untitled design (2).jpg', 1, '', 'institutionalprojects-1', '11-08-2023', ''),
(11, 1, 'Commercial Projects', '1690352117_Untitled design.jpg', 1, '', 'commercialprojects-1', '14-08-2023', ''),
(14, 2, 'Township', '1690616223_Garden Bay Township.jpg', 1, 'Garden Bay is a township project with impressive range of homes that are blessed with pristine nature, sophisticated innovation, opulent facilities and exotic comfort.', 'township-2', '12-08-2023', ''),
(15, 2, 'Residential', '1690616563_Garden Bay Group Housing.jpg', 1, 'Coming Soon...', 'residential-2', '12-08-2023', ''),
(16, 2, 'Commercial', '1690616701_Untitled design.jpg', 1, 'Coming Soon......', 'commercial-2', '12-08-2023', ''),
(19, 1, 'Residential Projects', '1690783117_Residency.jpg', 1, '', 'residentialprojects-1', '31-07-2023', ''),
(20, 1, 'Industrial Projects', '1690800966_Kansai-2.jpg', 1, '', 'industrialprojects-1', '31-07-2023', '');

-- --------------------------------------------------------

--
-- Table structure for table `safety_blog`
--

CREATE TABLE `safety_blog` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `postion` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safety_blog`
--

INSERT INTO `safety_blog` (`id`, `image`, `postion`, `title`) VALUES
(1, '29.jpg', NULL, ''),
(2, '30.jpg', NULL, ''),
(3, '31.jpg', NULL, ''),
(4, '32.jpg', NULL, ''),
(5, '33.jpg', NULL, ''),
(6, '34.jpg', NULL, ''),
(7, '35.jpg', NULL, ''),
(8, '36.jpg', NULL, ''),
(9, '37.jpg', NULL, ''),
(10, '38.jpg', NULL, ''),
(11, '39.jpg', NULL, ''),
(12, '40.jpg', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `postion` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`member_id`, `name`, `postion`, `description`, `facebook`, `twitter`, `linkedin`) VALUES
(6, 'MR. Arif  Zamir  Farooqui', 'Senior Managing Partner', 'Mr. Arif. Z. Farooqui, a seasoned professional with over four decades, believes in Occupational Health and Safety as a key driver in Sustainable Future. Having Expertise in Project Management, Contract Management, etc he always Focuses on Employees Engagement , Hand Holding Freshers and Innovation plus Initiatives in Engineering and Growth.', '', '', ''),
(7, 'MR. MOHAMMAD ZAKARIA', 'Managing Partner', 'Mr. Mohammad Zakaria, a technocrat believes Firmly that Unless Organizations Four Pillars ie Ethics , Safety , Innovation and Entrepreneurship is not in place , it will be very difficult to be at the Top . Hence keeping the Four Pillars in forefront Mr Zakaria keeps pushing for the best and at the same time to develop a Futuristic Organization he always emphasizes Training and Development at all levels . Process , PMS and Advanced Systems is something which Mr Zakaria is Passionate and he is working towards making each employee Tech savvy and digital loving . Apart from this he personally engages with the team working towards CSR and other site based social gatherings.', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `title`, `content`, `image`) VALUES
(1, 'Akhilesh', 'Manager', 'Good Company', '1668753679_90x90.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_project_type`
--
ALTER TABLE `add_project_type`
  ADD PRIMARY KEY (`project_type_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `award_tabel`
--
ALTER TABLE `award_tabel`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_cate`
--
ALTER TABLE `blog_cate`
  ADD PRIMARY KEY (`blog_cate_id`);

--
-- Indexes for table `blog_cate_blog`
--
ALTER TABLE `blog_cate_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `carrer_form`
--
ALTER TABLE `carrer_form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `certificate_tabel`
--
ALTER TABLE `certificate_tabel`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_gallery`
--
ALTER TABLE `media_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_gallery`
--
ALTER TABLE `project_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_name`
--
ALTER TABLE `project_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_project_type`
--
ALTER TABLE `add_project_type`
  MODIFY `project_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `award_tabel`
--
ALTER TABLE `award_tabel`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog_cate`
--
ALTER TABLE `blog_cate`
  MODIFY `blog_cate_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_cate_blog`
--
ALTER TABLE `blog_cate_blog`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carrer_form`
--
ALTER TABLE `carrer_form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate_tabel`
--
ALTER TABLE `certificate_tabel`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media_gallery`
--
ALTER TABLE `media_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `project_gallery`
--
ALTER TABLE `project_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `project_name`
--
ALTER TABLE `project_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
