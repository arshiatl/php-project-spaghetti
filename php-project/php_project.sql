-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 08:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Programming Languages', '2022-01-07 20:29:58', NULL),
(2, 'Server Side', '2022-01-07 20:30:02', NULL),
(3, 'Frameworks', '2022-01-07 20:30:06', '2022-01-07 20:58:44'),
(4, 'Video Games', '2022-01-07 20:41:28', '2022-01-07 21:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `img` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `cat_id`, `status`, `img`, `created_at`, `updated_at`) VALUES
(1, 'C', 'C (/ˈsiː/, as in the letter c) is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions. It has found lasting use in applications previously coded in assembly language. Such applications include operating systems and various application software for computer architectures that range from supercomputers to PLCs and embedded systems.\r\n\r\nA successor to the programming language B, C was originally developed at Bell Labs by Dennis Ritchie between 1972 and 1973 to construct utilities running on Unix. It was applied to re-implementing the kernel of the Unix operating system.[6] During the 1980s, C gradually gained popularity. It has become one of the most widely used programming languages,[7][8] with C compilers from various vendors available for the majority of existing computer architectures and operating systems. C has been standardized by ANSI since 1989 (ANSI C) and by the International Organization for Standardization (ISO).\r\n\r\nC is an imperative procedural language. It was designed to be compiled to provide low-level access to memory and language constructs that map efficiently to machine instructions, all with minimal runtime support. Despite its low-level capabilities, the language was designed to encourage cross-platform programming. A standards-compliant C program written with portability in mind can be compiled for a wide variety of computer platforms and operating systems with few changes to its source code.[9]\r\n\r\nSince 2000, C has consistently ranked among the top two languages in the TIOBE index, a measure of the popularity of programming languages', 1, 1, '/assets/images/posts/2022_01_07_06_31_44.png', '2022-01-07 20:35:44', NULL),
(2, 'C++', 'dss>>C++ (/ˌsiːˌplʌsˈplʌs/) is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\". The language has expanded significantly over time, and modern C++ now has object-oriented, generic, and functional features in addition to facilities for low-level memory manipulation. It is almost always implemented as a compiled language, and many vendors provide C++ compilers, including the Free Software Foundation, LLVM, Microsoft, Intel, Oracle, and IBM, so it is available on many platforms.[10]\r\n\r\nC++ was designed with an orientation toward system programming and embedded, resource-constrained software and large systems, with performance, efficiency, and flexibility of use as its design highlights.[11] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[11] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).[12]\r\n\r\nC++ is standardized by the International Organization for Standardization (ISO), with the latest standard version ratified and published by ISO in December 2020 as ISO/IEC 14882:2020 (informally known as C++20).[13] The C++ programming language was initially standardized in 1998 as ISO/IEC 14882:1998, which was then amended by the C++03, C++11, C++14, and C++17 standards. The current C++20 standard supersedes these with new features and an enlarged standard library. Before the initial standardization in 1998, C++ was developed by Danish computer scientist Bjarne Stroustrup at Bell Labs since 1979 as an extension of the C language; he wanted an efficient and flexible language similar to C that also provided high-level features for program organization.[14] Since 2012, C++ has been on a three-year release schedule[15] with C++23 as the next planned standard>>>', 1, 1, '/assets/images/posts/2022_01_07_06_31_28.jpg', '2022-01-07 20:38:07', '2022-01-07 20:55:05'),
(3, 'C#', 'C# (/si ʃɑːrp/ see sharp)[b] is a general-purpose, multi-paradigm programming language. C# encompasses static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented (class-based), and component-oriented programming disciplines.[15]\r\n\r\nC# was designed by Anders Hejlsberg from Microsoft in 2000 and was later approved as an international standard by Ecma (ECMA-334) in 2002 and ISO (ISO/IEC 23270) in 2003. Microsoft introduced C# along with .NET Framework and Visual Studio, both of which were closed-source. At the time, Microsoft had no open-source products. Four years later, in 2004, a free and open-source project called Mono began, providing a cross-platform compiler and runtime environment for the C# programming language. A decade later, Microsoft released Visual Studio Code (code editor), Roslyn (compiler), and the unified .NET platform (software framework), all of which support C# and are free, open-source, and cross-platform. Mono also joined Microsoft but was not merged into .NET.\r\n\r\nAs of 2021, the most recent version of the language is C# 10.0, which was released in 2021 in .NET 6.0.>>', 1, 1, '/assets/images/posts/2022_01_07_06_31_16.png', '2022-01-07 20:40:18', '2022-01-07 20:51:37'),
(4, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is a general-purpose programming language intended to let programmers write once, run anywhere (WORA),[17] meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.[18] Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of the underlying computer architecture. The syntax of Java is similar to C and C++, but has fewer low-level facilities than either of them. The Java runtime provides dynamic capabilities (such as reflection and runtime code modification) that are typically not available in traditional compiled languages. As of 2019, Java was one of the most popular programming languages in use according to GitHub,[19][20] particularly for client–server web applications, with a reported 9 million developers.[21]\r\n\r\nJava was originally developed by James Gosling at Sun Microsystems (which has since been acquired by Oracle) and released in 1995 as a core component of Sun Microsystems\' Java platform. The original and reference implementation Java compilers, virtual machines, and class libraries were originally released by Sun under proprietary licenses. As of May 2007, in compliance with the specifications of the Java Community Process, Sun had relicensed most of its Java technologies under the GPL-2.0-only license. Oracle offers its own HotSpot Java Virtual Machine, however the official reference implementation is the OpenJDK JVM which is free open-source software and used by most developers and is the default JVM for almost all Linux distributions.\r\n\r\nAs of October 2021, Java 17 is the latest version. Java 8, 11 and 17 are the current long-term support (LTS) versions. Oracle released the last zero-cost public update for the legacy version Java 8 LTS in January 2019 for commercial use, although it will otherwise still support Java 8 with public updates for personal use indefinitely. Other vendors have begun to offer zero-cost builds of OpenJDK 8 and 11 that are still receiving security and other upgrades.\r\n\r\nOracle (and others) highly recommend uninstalling outdated and unsupported versions of Java, because of serious risks due to unresolved security issues.[22] Oracle advises its users to immediately transition to a supported version, such as one of the LTS versions (8, 11, 17).', 1, 1, '/assets/images/posts/2022_01_07_06_31_40.png', '2022-01-07 20:42:19', '2022-01-07 20:44:40'),
(5, 'PHP', 'PHP is a general-purpose scripting language geared towards web development.[7] It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.[8] The PHP reference implementation is now produced by The PHP Group.[9] PHP originally stood for Personal Home Page,[8] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[10]\r\n\r\nPHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and executed PHP code – which may be any type of data, such as generated HTML or binary image data – would form the whole or part of an HTTP response. Various web template systems, web content management systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside the web context, such as standalone graphical applications[11] and robotic drone control.[12] PHP code can also be directly executed from the command line.\r\n\r\nThe standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on a variety of operating systems and platforms.[13]\r\n\r\nThe PHP language evolved without a written formal specification or standard until 2014, with the original implementation acting as the de facto standard which other implementations aimed to follow. Since 2014, work has gone on to create a formal PHP specification.[14]\r\n\r\nW3Techs reports that, as of April 2021, \"PHP is used by 79.2% of all the websites whose server-side programming language we know.\"[15] PHP version 7.4 is the most used version. Support for version 7.3 was dropped on 6 December 2021.>', 2, 1, '/assets/images/posts/2022_01_07_06_31_18.png', '2022-01-07 20:45:18', '2022-01-07 20:55:12'),
(6, 'Node js', 'Node.js is an open-source, cross-platform, back-end JavaScript runtime environment that runs on the V8 engine and executes JavaScript code outside a web browser. Node.js lets developers use JavaScript to write command line tools and for server-side scripting—running scripts server-side to produce dynamic web page content before the page is sent to the user\'s web browser. Consequently, Node.js represents a \"JavaScript everywhere\" paradigm,[6] unifying web-application development around a single programming language, rather than different languages for server-side and client-side scripts.\r\n\r\nThough .js is the standard filename extension for JavaScript code, the name \"Node.js\" does not refer to a particular file in this context and is merely the name of the product. Node.js has an event-driven architecture capable of asynchronous I/O. These design choices aim to optimize throughput and scalability in web applications with many input/output operations, as well as for real-time Web applications (e.g., real-time communication programs and browser games).[7]\r\n\r\nThe Node.js distributed development project was previously governed by the Node.js Foundation,[8] and has now merged with the JS Foundation to form the OpenJS Foundation, which is facilitated by the Linux Foundation\'s Collaborative Projects program.[9]\r\n\r\nCorporate users of Node.js software include GoDaddy,[10] Groupon,[11] IBM,[12] LinkedIn,[13][14] Microsoft,[15][16] Netflix,[17] PayPal,[18][19] Rakuten, SAP,[20] Voxer,[21] Walmart,[22] Yahoo!,[23] and Amazon Web Services.[24]>>', 2, 1, '/assets/images/posts/2022_01_07_06_31_45.png', '2022-01-07 20:46:00', '2022-01-07 20:55:19'),
(7, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers write clear, logical code for small and large-scale projects.[31]\r\n\r\nPython is dynamically-typed and garbage-collected. It supports multiple programming paradigms, including structured (particularly, procedural), object-oriented and functional programming. It is often described as a \"batteries included\" language due to its comprehensive standard library.[32][33]\r\n\r\nGuido van Rossum began working on Python in the late 1980s, as a successor to the ABC programming language, and first released it in 1991 as Python 0.9.0.[34] Python 2.0 was released in 2000 and introduced new features, such as list comprehensions and a cycle-detecting garbage collection system (in addition to reference counting). Python 3.0 was released in 2008 and was a major revision of the language that is not completely backward-compatible. Python 2 was discontinued with version 2.7.18 in 2020.[35]\r\n\r\nPython consistently ranks as one of the most popular programming languages>', 1, 1, '/assets/images/posts/2022_01_07_06_31_28.png', '2022-01-07 20:47:28', '2022-01-07 20:48:32'),
(8, 'Java Script', 'JavaScript (/ˈdʒɑːvəˌskrɪpt/),[10] often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.[11] Over 97% of websites use JavaScript on the client side for web page behavior,[12] often incorporating third-party libraries.[13] All major web browsers have a dedicated JavaScript engine to execute the code on users\' devices.\r\n\r\nJavaScript is a high-level, often just-in-time compiled language that conforms to the ECMAScript standard.[14] It has dynamic typing, prototype-based object-orientation, and first-class functions. It is multi-paradigm, supporting event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM).\r\n\r\nThe ECMAScript standard does not include any input/output (I/O), such as networking, storage, or graphics facilities. In practice, the web browser or other runtime system provides JavaScript APIs for I/O.\r\n\r\nJavaScript engines were originally used only in web browsers, but are now core components of some servers and a variety of applications. The most popular runtime system for this usage is Node.js.\r\n\r\nAlthough Java and JavaScript are similar in name, syntax, and respective standard libraries, the two languages are distinct and differ greatly in design.', 1, 1, '/assets/images/posts/2022_01_07_06_31_00.png', '2022-01-07 20:50:00', NULL),
(9, 'Laravel', 'Laravel is a free, open-source[3] PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.[4][5]: 2, 5–9 [6][7]\r\n\r\nThe source code of Laravel is hosted on GitHub and licensed under the terms of MIT License', 3, 1, '/assets/images/posts/2022_01_07_06_31_36.png', '2022-01-07 20:58:36', NULL),
(10, 'ASP.NET', 'ASP.NET is an open-source,[2] server-side web-application framework designed for web development to produce dynamic web pages. It was developed by Microsoft to allow programmers to build dynamic web sites, applications and services.\r\n\r\nIt was first released in January 2002 with version 1.0 of the .NET Framework and is the successor to Microsoft\'s Active Server Pages (ASP) technology. ASP.NET is built on the Common Language Runtime (CLR), allowing programmers to write ASP.NET code using any supported .NET language. The ASP.NET SOAP extension framework allows ASP.NET components to process SOAP messages.\r\n\r\nASP.NET\'s successor is ASP.NET Core. It is a re-implementation of ASP.NET as a modular web framework, together with other frameworks like Entity Framework. The new framework uses the new open-source .NET Compiler Platform (codename \"Roslyn\") and is cross platform. ASP.NET MVC, ASP.NET Web API, and ASP.NET Web Pages (a platform using only Razor pages) have merged into a unified MVC 6', 3, 1, '/assets/images/posts/2022_01_07_06_31_09.png', '2022-01-07 21:01:09', NULL),
(11, 'Phalcon', 'Phalcon is a PHP web framework based on the model–view–controller (MVC) pattern. Originally released in 2012, it is an open-source framework licensed under the terms of the BSD License.\r\n\r\nUnlike most PHP frameworks,[citation needed] Phalcon is implemented as a web server extension written in Zephir and C, aiming to boost execution speed, reduce resource usage, and handle more HTTP requests per second than comparable frameworks written primarily in PHP. One drawback of this approach is that root/administrative access is required on the server to install Phalcon by building a custom binary or using a precompiled one.[6]\r\n\r\nHistory\r\nPhalcon was created by Andrés Gutiérrez and collaborators looking for a new approach to traditional web application frameworks written in PHP. The original draft of the framework in 2011 was called \"Spark\",[7] the name was later changed to Phalcon, representing the words \"PHP\" and \"falcon\". Phalcon\'s initial release was made available on November 14, 2012.\r\n\r\nPhalcon 0.3.5 includes an ORM written in C, MVC components, and cache components. This release was followed by the Phalcon 0.5.0 that brought a high-level dialect of SQL called PHQL, and Phalcon 0.6.0 that introduced Volt, a template engine similar to Jinja. Phalcon 1.0 was released on March 22, 2013.[8] with Phalcon 1.3 being the last minor release in that series. Phalcon 2.0 saw most of the project ported from C to Zephir.\r\n\r\nPhalcon 3.0.0 was released on 29 July 2016,[9] this major release includes support for PHP 7 as well as being Phalcon\'s first LTS (Long Term Support) release. Phalcon also adopted SemVer for their next releases versioning.\r\n\r\nPhalcon 4.0.0 was released on 21 December 2019,[10] this major release includes support for PHP 7.2, 7.3 and 7.4 has Stricter Interfaces and support PSR-3, PSR-7, PSR-11 (proxy), PSR-13, PSR-16, PSR-17.\r\n\r\nOn 19 August 2020,[11] it was announced that Serghei, the core contributor on the Zephir language was stepping down from the project, thus leaving the language in an unmaintained state. The Phalcon Team decided to abandon the language and port the framework over to a native PHP application for Version 5. Version 5 will be the first version of Phalcon to support PHP 8.\r\n\r\nA Phalcon Hangout on 6 September 2020[12] announced that work has started on Phalcon 5. With this announcement, the projects new repositories were officially made public.\r\n\r\nPhalcon Slayer is a wrapper that restructures the Phalcon framework.>>', 3, 1, '/assets/images/posts/2022_01_07_06_31_53.png', '2022-01-07 21:02:53', '2022-01-07 21:04:31'),
(12, 'ASP.NET Core', 'ASP.NET Core is a free and open-source web framework and successor to ASP.NET,[3] developed by Microsoft.[4] It is a modular framework that runs on both the full .NET Framework, on Windows, and the cross-platform .NET. However ASP.NET Core version 3 works only on .NET Core dropping support of the .NET Framework.[5]\r\n\r\nThe framework is a complete rewrite that unites the previously separate ASP.NET MVC and ASP.NET Web API into a single programming model.\r\n\r\nDespite being a new framework, built on a new web stack, it does have a high degree of concept compatibility with ASP.NET. The ASP.NET Core framework supports side-by-side versioning so that different applications being developed on a single machine can target different versions of ASP.NET Core. This is not possible with previous versions of ASP.NET.\r\n\r\nBlazor is a recent (optional) component to support WebAssembly and since version 5.0 it is dropping support for some old web browsers. While current Microsoft Edge works, the legacy version of it, i.e. \"Microsoft Edge Legacy\" and Internet Explorer 11 are dropped when you use Blazor.', 3, 1, '/assets/images/posts/2022_01_07_06_31_57.png', '2022-01-07 21:03:57', NULL),
(13, 'Django', 'Django (/ˈdʒæŋɡoʊ/ JANG-goh; sometimes stylized as django)[6] is a Python-based free and open-source web framework that follows the model–template–views (MTV) architectural pattern.[7][8] It is maintained by the Django Software Foundation (DSF), an independent organization established in the US as a 501(c)(3) non-profit.\r\n\r\nDjango\'s primary goal is to ease the creation of complex, database-driven websites. The framework emphasizes reusability and \"pluggability\" of components, less code, low coupling, rapid development, and the principle of don\'t repeat yourself.[9] Python is used throughout, even for settings, files, and data models. Django also provides an optional administrative create, read, update and delete interface that is generated dynamically through introspection and configured via admin models.\r\n\r\nSome well-known sites that use Django include Instagram,[10] Mozilla,[11] Disqus,[12] Bitbucket,[13] Nextdoor[14] and Clubhouse.[15]>', 3, 1, '/assets/images/posts/2022_01_07_06_31_48.jpg', '2022-01-07 21:06:42', '2022-01-07 21:07:48'),
(14, 'Express', 'Express.js, or simply Express, is a back end web application framework for Node.js, released as free and open-source software under the MIT License. It is designed for building web applications and APIs.[3] It has been called the de facto standard server framework for Node.js.[4]\r\n\r\nThe original author, TJ Holowaychuk, described it as a Sinatra-inspired server,[5] meaning that it is relatively minimal with many features available as plugins. Express is the back-end component of popular development stacks like the MEAN, MERN or MEVN stack, together with the MongoDB database software and a JavaScript front-end framework or library', 3, 1, '/assets/images/posts/2022_01_07_06_31_15.jpg', '2022-01-07 21:09:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`) VALUES
(1, 'arshia.tl@yahoo.com', '$2y$10$kkzF.T.KYNOtEOhhhN0NrOGV30nkZtOdcgOvdouyfHftnJK6fRKm6', 'arshia', 'kian', '2022-01-07 20:25:38'),
(2, 'erfan@gmailcom', '$2y$10$HqHLD0MhukD2aQ1F3saBWO6LWCQpjaaO4xaaG9D1Ymeg0PhkkS.H2', 'erfan', 'aliloo', '2022-01-07 21:11:04'),
(3, 'parsa_kian.24@email.com', '$2y$10$r/BoHK4ErtHyEmzPmkKQAuF/kr044jehNawMAeeqa92tOmdyFvJPC', 'parsa', 'kian', '2022-01-07 21:11:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
