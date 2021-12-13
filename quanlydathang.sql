-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 01:20 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `machitiet` int(11) NOT NULL,
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(10) UNSIGNED NOT NULL,
  `GiaDatHang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`machitiet`, `SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES
(25, 28, 125, 1, 1299000),
(26, 29, 120, 1, 899000),
(27, 29, 123, 1, 1999000),
(28, 29, 124, 1, 1999000),
(29, 30, 116, 2, 799000),
(30, 30, 117, 1, 799000),
(31, 31, 123, 1, 1999000),
(32, 31, 124, 1, 1999000),
(36, 35, 123, 1, 1999000),
(37, 36, 125, 1, 1299000),
(38, 37, 115, 1, 729000),
(39, 37, 116, 1, 799000),
(40, 37, 121, 1, 799000),
(41, 38, 135, 2, 1299000),
(42, 39, 130, 1, 429000),
(43, 39, 131, 1, 500000),
(44, 39, 132, 1, 629000),
(45, 40, 125, 4, 1299000),
(46, 41, 128, 1, 1699000),
(47, 41, 131, 1, 500000),
(48, 41, 135, 1, 1299000),
(49, 42, 115, 1, 729000),
(50, 42, 116, 1, 799000),
(51, 43, 130, 1, 429000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `msnv` int(11) NOT NULL,
  `NgayDH` timestamp NOT NULL DEFAULT current_timestamp(),
  `NgayGH` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TrangThaiDH` varchar(125) NOT NULL,
  `DiaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `TenKH`, `msnv`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `DiaChi`) VALUES
(28, 1, 'Ôn Đình Khang', 2, '2021-11-23 18:01:45', '2021-11-24 09:16:33', 'Đã giao', 'Tp.Hồ Chí Minh'),
(29, 1, 'Ôn Đình Khang', 2, '2021-11-23 18:07:23', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Cà Mau'),
(30, 1, 'Ôn Đình Khang', 2, '2021-11-23 18:07:32', '2021-11-24 08:18:07', 'Đã giao', 'Đồng tháp'),
(31, 1, 'Ôn Đình Khang', 2, '2021-11-24 03:56:36', '2021-11-24 08:25:05', 'Đã giao', 'Cà Mau'),
(35, 1, 'Ôn Đình Khang', 2, '2021-11-24 04:00:58', '2021-11-24 08:11:35', 'Đã xác nhận', 'Tp.Hồ Chí Minh'),
(36, 9, 'Bộ Lâm Phong', 2, '2021-11-24 04:09:58', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Sóc Trăng'),
(37, 11, 'Nguyễn Đình Quý', 2, '2021-11-24 07:46:24', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Vĩnh Long'),
(38, 10, 'Nguyễn Tấn Ngọc', 2, '2021-11-24 09:09:16', '2021-11-24 09:16:23', 'Đã xác nhận', 'Cần Thơ'),
(39, 10, 'Nguyễn Tấn Ngọc', 2, '2021-11-24 09:16:14', '2021-11-24 10:49:57', 'Đã xác nhận', 'Cần Thơ'),
(40, 10, 'Nguyễn Tấn Ngọc', 2, '2021-11-24 09:16:47', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Cần Thơ'),
(41, 1, 'Ôn Đình Khang', 2, '2021-11-24 10:09:12', '2021-11-24 10:09:40', 'Đã giao', 'Hà Nội'),
(42, 1, 'Ôn Đình Khang', 2, '2021-11-24 10:10:18', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Cà Mau'),
(43, 10, 'Nguyễn Tấn Ngọc', 2, '2021-11-24 10:49:30', '0000-00-00 00:00:00', 'Chờ Xác Nhận', 'Cần Thơ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `MSKH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(6, 'Tịnh Biên, An Giang', 1),
(8, 'đường 3/2, Ninh Kiều, Cần Thơ', 1),
(9, 'Đồng tháp', 1),
(10, 'Cà Mau', 1),
(11, 'Tp.Hồ Chí Minh', 1),
(12, 'Sóc Trăng', 9),
(13, 'Vĩnh Long', 11),
(14, 'Trà Vinh', 11),
(15, 'Bạc liêu', 11),
(16, 'Cần Thơ', 10),
(17, 'Hà Nội', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(10) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `QuyCach` varchar(1000) NOT NULL,
  `Gia` int(10) UNSIGNED NOT NULL,
  `SoLuongHang` int(10) UNSIGNED NOT NULL,
  `MaLoaiHang` int(11) NOT NULL,
  `adddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `adddate`, `time_update`) VALUES
(114, 'ÁO PHÔNG CAO CỔ ĐEN', 'JOIN LIFE Care for fiber: tối thiểu 55% là bông hữu cơ.\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nBÔNG HỮU CƠ\nSợi bông hữu cơ, hay còn gọi là Ecologically Grown Cotton, có nguồn gốc từ các cây bông được canh tác bằng cách sử dụng các loại phân bón và thuốc trừ sâu tự nhiên.\nViệc áp dụng các phương pháp canh tác tự nhiên này giúp bảo vệ nguồn nước và sự đa dạng sinh học của môi trường, cho phép người nông dân trồng xen kẽ cây bông với các loại cây lương thực và cây thực phẩm khác, ví dụ như cam, cà chua hoặc nghệ.\nNgoài ra, trong các đồn điền trồng bông hữu cơ hay Ecologically Grown Cotton, việc tránh sử dụng các hạt giống biến đổi gen cũng giúp bảo vệ sự đa dạng sinh học của hạt giống và độ phì nhiêu của đất.\nCác giấy chứng nhận\nChúng tôi chỉ sử dụng bông hữu cơ đạt chứng nhận do các tổ chức uy tín cấp. Các tổ chức này có nhiệm vụ theo dõi quy trìn', 729000, 99, 16, '2021-10-29 03:58:04', '2021-11-23 16:52:31'),
(115, 'ÁO PHÔNG CAO CỔ TRẮNG', 'JOIN LIFE\nCare for fiber: tối thiểu 55% là bông hữu cơ.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nBÔNG HỮU CƠ\nSợi bông hữu cơ, hay còn gọi là Ecologically Grown Cotton, có nguồn gốc từ các cây bông được canh tác bằng cách sử dụng các loại phân bón và thuốc trừ sâu tự nhiên.\n\nViệc áp dụng các phương pháp canh tác tự nhiên này giúp bảo vệ nguồn nước và sự đa dạng sinh học của môi trường, cho phép người nông dân trồng xen kẽ cây bông với các loại cây lương thực và cây thực phẩm khác, ví dụ như cam, cà chua hoặc nghệ.\n\nNgoài ra, trong các đồn điền trồng bông hữu cơ hay Ecologically Grown Cotton, việc tránh sử dụng các hạt giống biến đổi gen cũng giúp bảo vệ sự đa dạng sinh học của hạt giống và độ phì nhiêu của đất.\nCác giấy chứng nhận\nChúng tôi chỉ sử dụng bông hữu cơ đạt chứng nhận do các tổ chức uy tín cấp. Các tổ chức này có nhiệm vụ theo dõi quy t', 729000, 98, 16, '2021-10-29 03:59:20', '2021-11-24 10:10:18'),
(116, 'ÁO PHÔNG HỌA TIẾT CHUỘT MICKEY', 'JOIN LIFE\nCare for fiber: tối thiểu 15% là bông tái chế.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nBÔNG TÁI CHẾ\nBông tái chế được sản xuất từ bông phế liệu, được phân chia theo loại và màu sắc và sau đó được nghiền nát để tái chế thành sợi bông mới.\n\nViệc sử dụng bông tái chế giúp làm giảm việc tiêu thụ nguyên liệu thô. Bằng cách biến bông phế liệu thành một loại sợi tái chế mới, chúng tôi tránh được việc phải trồng các cây bông mới. \n\nNgoài ra, quá trình sản xuất loại sợi này cũng tiêu thụ ít nước và ít năng lượng hơn, đồng thời tạo ra ít rác thải hơn, giúp chúng tôi bảo vệ môi trường.\nCác giấy chứng nhận\nChúng tôi chỉ sử dụng bông hữu cơ đạt chứng nhận do các tổ chức uy tín cấp. Các tổ chức này có nhiệm vụ theo dõi quy trình sản xuất loại bông này, từ nguyên liệu đầu vào cho tới sản phẩm cuối cùng. Hiện nay chúng tôi đang áp dụng các tiêu chuẩn s', 799000, 95, 16, '2021-10-29 04:13:03', '2021-11-24 10:10:18'),
(117, 'ÁO PHÔNG HỌA TIẾT', 'CHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% vải cotton\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.', 799000, 46, 16, '2021-10-29 04:22:06', '2021-11-23 18:07:32'),
(118, 'ÁO PHÔNG RIDER - WAITE TAROT', 'CHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% vải cotton\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.', 799000, 99, 16, '2021-10-29 04:22:56', '2021-11-23 17:19:19'),
(119, 'ÁO PHÔNG IN HỌA TIẾT', 'CHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% vải cotton\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.', 799000, 100, 16, '2021-10-29 04:24:48', '2021-10-29 04:24:48'),
(120, 'ÁO PHÔNG IN CHỮ', 'JOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn cầu, cho phép đánh giá các tác động của', 899000, 48, 16, '2021-10-29 04:26:02', '2021-11-23 18:07:23'),
(121, 'ÁO PHÔNG DÀI TAY', 'JOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn cầu, cho phép đánh giá các tác động của', 799000, 48, 16, '2021-10-29 04:26:50', '2021-11-24 07:46:24'),
(122, 'ÁO PHÔNG IN CHỮ', 'CHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% vải cotton\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.', 1299000, 50, 16, '2021-10-29 04:37:02', '2021-10-29 04:37:02'),
(123, 'QUẦN PHA LEN', 'JOIN LIFE\nCare for fiber: tối thiểu 25% là sợi polyamide tái chế.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nSỢI POLYAMIDE TÁI CHẾ\nSợi polyamide tái chế được sản xuất từ ​​lưới đánh cá và quần áo làm từ sợi nylon thu hồi được. Chúng được phân loại và nghiền nát. Sau khi được nghiền, các sợi polyamide được thu hồi và xử lý để tạo ra sợi polyamide tái chế mới. \n\nBằng cách này, chúng tôi thu hồi được rác thải nhựa và giảm việc tiêu thụ nguyên liệu thô.\n\nNgoài ra, quá trình sản xuất loại sợi này cũng tiêu thụ ít nước và ít năng lượng hơn, đồng thời tạo ra ít rác thải hơn, giúp chúng tôi bảo vệ môi trường.\nCác giấy chứng nhận\nChúng tôi chỉ sử dụng sợi polyamide tái chế đạt chứng nhận do các tổ chức uy tín cấp. Các tổ chức này có nhiệm vụ theo dõi quy trình sản xuất loại sợi này, từ nguyên liệu đầu vào cho tới sản phẩm cuối cùng. Hiện nay chúng tôi đang á', 1999000, 23, 17, '2021-10-29 04:39:18', '2021-11-24 04:00:58'),
(124, 'QUẦN PHA LEN TRẮNG', 'JOIN LIFE\nCare for fiber: tối thiểu 25% là sợi polyamide tái chế.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nSỢI POLYAMIDE TÁI CHẾ\nSợi polyamide tái chế được sản xuất từ ​​lưới đánh cá và quần áo làm từ sợi nylon thu hồi được. Chúng được phân loại và nghiền nát. Sau khi được nghiền, các sợi polyamide được thu hồi và xử lý để tạo ra sợi polyamide tái chế mới. \n\nBằng cách này, chúng tôi thu hồi được rác thải nhựa và giảm việc tiêu thụ nguyên liệu thô.\n\nNgoài ra, quá trình sản xuất loại sợi này cũng tiêu thụ ít nước và ít năng lượng hơn, đồng thời tạo ra ít rác thải hơn, giúp chúng tôi bảo vệ môi trường.\nCác giấy chứng nhận\nChúng tôi chỉ sử dụng sợi polyamide tái chế đạt chứng nhận do các tổ chức uy tín cấp. Các tổ chức này có nhiệm vụ theo dõi quy trình sản xuất loại sợi này, từ nguyên liệu đầu vào cho tới sản phẩm cuối cùng. Hiện nay chúng tôi đang á', 1999000, 15, 17, '2021-10-29 04:40:23', '2021-11-24 03:56:36'),
(125, 'QUẦN JOGGER VẢI NHUNG', 'CHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% vải pôliexte\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.', 1299000, 92, 17, '2021-10-29 17:05:30', '2021-11-24 09:16:47'),
(126, 'QUẦN JOGGER PHỐI DẢI TRANG TRÍ', 'JOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn cầu, cho phép đánh giá các tác động của', 1299000, 0, 17, '2021-10-29 17:06:30', '2021-11-23 16:57:35'),
(127, 'QUẦN ÂU THEO BỘ CẠP CÓ VIỀN KHÁC MÀU', 'JOIN LIFE\nCare for fiber: tối thiểu 25% là sợi polyester tái chế.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nSỢI POLYESTER TÁI CHẾ\nSợi polyester tái chế được sản xuất bằng cách tái chế nhựa PET, một loại nhựa có thể được tìm thấy ở các chai lọ bằng nhựa.\n\nMỗi khi bạn vứt một chai nhựa vào thùng rác tái chế, chai nhựa đó sẽ được đưa tới một nhà máy phân loại rác thải. Tại đó, các loại nhựa khác nhau sẽ được phân loại để đảm bảo rằng chúng sẽ được sử dụng cho các mục đích phù hợp nhất. Nhựa PET sẽ được rửa sạch, nghiền nát và tái chế thành sợi polyester tái chế mới.\n\nBằng cách này, chúng tôi mang lại một cuộc đời mới cho rác thải nhựa và giảm việc tiêu thụ nguyên liệu thô, thông qua một quá trình tiêu thụ ít nước và năng lượng hơn, và tạo ra ít rác thải hơn.\n\nSợi tái sinh có các đặc tính tương tự như của sợi polyester nguyên chất: dai, bền và luôn có ', 1299000, 10, 17, '2021-11-24 08:34:48', '2021-11-24 08:34:48'),
(128, 'QUẦN VẢI JACQUARD DÁNG SUPER SKINNY', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nCHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n88% nylon · 12% elastane\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.\n[car]7\nGiặt máy ở nhiệt độ tối đa 30ºC, vắt ở tốc độ thấp\n[car]14\nKhông sử dụng nước tẩy / thuốc tẩy\n[car]18\nGiặ', 1699000, 19, 17, '2021-11-24 08:36:14', '2021-11-24 10:09:12'),
(129, 'ÁO PHÔNG CỔ TRỤ', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nJOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn c', 429000, 30, 18, '2021-11-24 08:37:39', '2021-11-24 08:37:39'),
(130, 'ÁO PHÔNG CỔ TRỤ RED', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nJOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn c', 429000, 28, 18, '2021-11-24 08:38:32', '2021-11-24 10:49:30'),
(131, 'ÁO PHÔNG CỔ TRỤ BLACK', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nJOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn c', 500000, 3, 18, '2021-11-24 08:39:23', '2021-11-24 10:09:12'),
(132, 'ÁO PHÔNG CAO CỔ', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nJOIN LIFE\nCare for water: được sản xuất với ít nước hơn.\n\nChúng tôi gắn thẻ Join Life cho các sản phẩm may mặc được sản xuất bằng những công nghệ và nguyên liệu giúp chúng tôi giảm thiểu tác động của các sản phẩm của mình tới môi trường. \nCARE FOR WATER\nCác sản phẩm may mặc này được sản xuất bằng các công nghệ giúp làm giảm lượng nước tiêu thụ trong quá trình sản xuất.\n\nCác quy trình nhuộm hoặc giặt các sản phẩm may mặc là những quy trình tiêu thụ nhiều nước nhất. Việc sử dụng các chu trình khép kín cho phép tái sử dụng nước hoặc việc áp dụng các công nghệ như máy nhuộm dung tỷ thấp hoặc nhuộm màu toàn bộ các sợi thay vì chỉ nhuộm trên bề mặt vải giúp làm giảm lượng nước tiêu thụ trong các quy trình này, từ đó giúp chúng tôi bảo vệ các nguồn nước ngọt.\nCác giấy chứng nhận\nSản phẩm này đã được sản xuất theo tiêu chuẩn Join Life do Tập đoàn Inditex phát triển dựa trên Phân tích Vòng đời. Đây là một phương pháp được tiêu chuẩn hóa và có giá trị toàn c', 629000, 19, 18, '2021-11-24 08:40:06', '2021-11-24 09:16:14'),
(133, 'QUẦN CARGO GIẢ DA', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nCHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\nVẢI NỀN\n100% vải pôliexte\nLỚP PHỦ\n100% pôliurêtan\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nChỉ giặt quần áo khi cần thiết, đôi khi chỉ cần phơi quần áo tại nơi thoáng khí là đủ. Quá trình giặt làm hao mòn dần các loại vải. Bằng cách giảm số lần giặt, chúng ta sẽ kéo dài tuổi thọ của quần áo và giảm lượng nước và năng lượng tiêu thụ trong các quá trình chăm sóc.\n[car]8\nGiặt máy ở nhiệt độ tối ', 1299000, 30, 19, '2021-11-24 08:41:03', '2021-11-24 08:41:03'),
(134, 'QUẦN CARGO VẢI RŨ BÓNG', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nCHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n98% vải thun vitcô · 2% elastane\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nChỉ giặt quần áo khi cần thiết, đôi khi chỉ cần phơi quần áo tại nơi thoáng khí là đủ. Quá trình giặt làm hao mòn dần các loại vải. Bằng cách giảm số lần giặt, chúng ta sẽ kéo dài tuổi thọ của quần áo và giảm lượng nước và năng lượng tiêu thụ trong các quá trình chăm sóc.\n[car]8\nGiặt máy ở nhiệt độ tối đa 30ºC\n[car]14\nK', 899000, 30, 19, '2021-11-24 08:41:49', '2021-11-24 08:41:49'),
(135, 'QUẦN CARGO ỐNG RỘNG', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nCHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n100% sợi lyocell\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.\n[car]7\nGiặt máy ở nhiệt độ tối đa 30ºC, vắt ở tốc độ thấp\n[car]14\nKhông sử dụng nước tẩy / thuốc tẩy\n[car]18\nGiặt ở nhiệ', 1299000, 9, 19, '2021-11-24 08:42:31', '2021-11-24 10:09:12'),
(136, 'QUẦN CARGO BO GẤU', 'CHẤT LIỆU, CÁCH CHĂM SÓC VÀ NGUỒN GỐC\nCHẤT LIỆU\nChúng tôi đang triển khai các chương trình giám sát nhằm đảm bảo việc tuân thủ các tiêu chuẩn về độ an toàn, tính lành mạnh và chất lượng của các sản phẩm của chúng tôi. \n\nTiêu chuẩn Green to Wear 2.0 nhằm mục đích giảm thiểu tác động của quá trình sản xuất hàng dệt may tới môi trường. Để thực hiện được mục tiêu này, chúng tôi đã xây dựng chương trình The List của Inditex, theo đó giúp chúng tôi đảm bảo các quy trình sản xuất sạch cũng như độ an toàn và tính lành mạnh của các sản phẩm may mặc của mình. \nLỚP NGOÀI\n89% vải pôliexte · 11% elastane\nCHĂM SÓC\nChăm sóc đúng cách quần áo của mình tức là bạn đang bảo vệ môi trường\nGiặt ở nhiệt độ thấp và sử dụng các chế độ vắt nhẹ nhàng sẽ có lợi hơn cho quần áo, giúp duy trì màu sắc, hình dạng và cấu trúc của vải. Đồng thời giúp làm giảm lượng năng lượng tiêu thụ trong các quá trình chăm sóc.\n[car]7\nGiặt máy ở nhiệt độ tối đa 30ºC, vắt ở tốc độ thấp\n[car]14\nKhông sử dụng nước tẩy / thuốc tẩy\n[car', 899000, 12, 19, '2021-11-24 08:43:09', '2021-11-24 08:43:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL COMMENT 'url img',
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `url`, `MSHH`) VALUES
(212, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/800/2/w/294/5584360800_6_1_1.jpg?ts=1632842314816', 114),
(213, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/800/2/w/750/5584360800_2_1_1.jpg?ts=1632928302684', 114),
(214, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/800/2/w/750/5584360800_2_2_1.jpg?ts=1632928308577', 114),
(215, 'ÁO PHÔNG CAO CỔ TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/250/2/w/750/5584360250_6_1_1.jpg?ts=1632842303963', 115),
(216, 'ÁO PHÔNG CAO CỔ TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/250/2/w/750/5584360250_2_1_1.jpg?ts=1632928281013', 115),
(217, 'ÁO PHÔNG CAO CỔ TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/5584/360/250/2/w/750/5584360250_2_2_1.jpg?ts=1632928197336', 115),
(218, 'ÁO PHÔNG HỌA TIẾT CHUỘT MICKEY', 'https://static.zara.net/photos///2021/I/0/2/p/0962/445/800/2/w/750/0962445800_6_2_1.jpg?ts=1634114199156', 116),
(219, 'ÁO PHÔNG HỌA TIẾT CHUỘT MICKEY', 'https://static.zara.net/photos///2021/I/0/2/p/0962/445/800/2/w/750/0962445800_2_1_1.jpg?ts=1633617425262', 116),
(220, 'ÁO PHÔNG HỌA TIẾT CHUỘT MICKEY', 'https://static.zara.net/photos///2021/I/0/2/p/0962/445/800/2/w/750/0962445800_2_2_1.jpg?ts=1633617421497', 116),
(221, 'ÁO PHÔNG HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/0495/442/800/2/w/750/0495442800_6_1_1.jpg?ts=1623755691432', 117),
(222, 'ÁO PHÔNG HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/0495/442/800/2/w/750/0495442800_1_1_1.jpg?ts=1623841570456', 117),
(223, 'ÁO PHÔNG HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/0495/442/800/2/w/750/0495442800_2_2_1.jpg?ts=1623841536773', 117),
(224, 'ÁO PHÔNG RIDER - WAITE TAROT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/339/800/2/w/750/5644339800_6_1_1.jpg?ts=1626424269626', 118),
(225, 'ÁO PHÔNG RIDER - WAITE TAROT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/339/800/2/w/750/5644339800_2_1_1.jpg?ts=1626685410308', 118),
(226, 'ÁO PHÔNG RIDER - WAITE TAROT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/339/800/2/w/750/5644339800_2_2_1.jpg?ts=1626685390194', 118),
(227, 'ÁO PHÔNG IN HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/341/800/2/w/750/5644341800_6_1_1.jpg?ts=1627986612159', 119),
(228, 'ÁO PHÔNG IN HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/341/800/2/w/750/5644341800_2_1_1.jpg?ts=1628072377647', 119),
(229, 'ÁO PHÔNG IN HỌA TIẾT', 'https://static.zara.net/photos///2021/I/0/2/p/5644/341/800/2/w/750/5644341800_2_2_1.jpg?ts=1628072430239', 119),
(230, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/4087/378/506/2/w/750/4087378506_6_1_1.jpg?ts=1634815309037', 120),
(231, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/4087/378/506/2/w/750/4087378506_2_1_1.jpg?ts=1634831936045', 120),
(232, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/4087/378/506/2/w/750/4087378506_2_2_1.jpg?ts=1634832181310', 120),
(233, 'ÁO PHÔNG DÀI TAY', 'https://static.zara.net/photos///2021/I/0/2/p/6462/303/916/2/w/750/6462303916_6_1_1.jpg?ts=1632842338967', 121),
(234, 'ÁO PHÔNG DÀI TAY', 'https://static.zara.net/photos///2021/I/0/2/p/6462/303/916/2/w/750/6462303916_2_1_1.jpg?ts=1632910714740', 121),
(235, 'ÁO PHÔNG DÀI TAY', 'https://static.zara.net/photos///2021/I/0/2/p/6462/303/916/2/w/750/6462303916_2_2_1.jpg?ts=1632910560493', 121),
(236, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/0840/306/251/2/w/750/0840306251_6_1_1.jpg?ts=1625226897149', 122),
(237, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/0840/306/251/2/w/750/0840306251_2_1_1.jpg?ts=1625476672398', 122),
(238, 'ÁO PHÔNG IN CHỮ', 'https://static.zara.net/photos///2021/I/0/2/p/0840/306/251/2/w/750/0840306251_2_3_1.jpg?ts=1625476677085', 122),
(239, 'QUẦN PHA LEN', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/973/2/w/750/6717551973_6_1_1.jpg?ts=1633518356688', 123),
(240, 'QUẦN PHA LEN', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/973/2/w/750/6717551973_2_1_1.jpg?ts=1635330860819', 123),
(241, 'QUẦN PHA LEN', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/973/2/w/750/6717551973_2_3_1.jpg?ts=1635330836031', 123),
(242, 'QUẦN PHA LEN TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/954/2/w/750/6717551954_6_1_1.jpg?ts=1633518263257', 124),
(243, 'QUẦN PHA LEN TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/954/2/w/750/6717551954_1_1_1.jpg?ts=1635330938622', 124),
(244, 'QUẦN PHA LEN TRẮNG', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/954/2/w/750/6717551954_2_3_1.jpg?ts=1635330837551', 124),
(245, 'QUẦN JOGGER VẢI NHUNG', 'https://static.zara.net/photos///2021/I/0/2/p/8288/561/700/2/w/750/8288561700_6_1_1.jpg?ts=1633608567784', 125),
(246, 'QUẦN JOGGER VẢI NHUNG', 'https://static.zara.net/photos///2021/I/0/2/p/8288/561/700/2/w/750/8288561700_1_1_1.jpg?ts=1633940838465', 125),
(247, 'QUẦN JOGGER VẢI NHUNG', 'https://static.zara.net/photos///2021/I/0/2/p/8288/561/700/2/w/750/8288561700_6_3_1.jpg?ts=1633608713467', 125),
(248, 'QUẦN JOGGER PHỐI DẢI TRANG TRÍ', 'https://static.zara.net/photos///2021/I/0/2/p/4087/342/712/2/w/750/4087342712_6_1_1.jpg?ts=1630489494370', 126),
(249, 'QUẦN JOGGER PHỐI DẢI TRANG TRÍ', 'https://static.zara.net/photos///2021/I/0/1/p/4087/342/712/4/w/750/4087342712_1_1_1.jpg?ts=1634899251179', 126),
(250, 'QUẦN JOGGER PHỐI DẢI TRANG TRÍ', 'https://static.zara.net/photos///2021/I/0/1/p/4087/342/712/4/w/750/4087342712_2_3_1.jpg?ts=1634899277699', 126),
(251, 'QUẦN ÂU THEO BỘ CẠP CÓ VIỀN KHÁC MÀU', 'https://static.zara.net/photos///2021/I/0/2/p/0706/440/804/2/w/294/0706440804_6_1_1.jpg?ts=1627984059499', 127),
(252, 'QUẦN ÂU THEO BỘ CẠP CÓ VIỀN KHÁC MÀU', 'https://static.zara.net/photos///2021/I/0/1/p/0706/440/804/102/w/750/0706440804_1_1_1.jpg?ts=1631208795800', 127),
(253, 'QUẦN ÂU THEO BỘ CẠP CÓ VIỀN KHÁC MÀU', 'https://static.zara.net/photos///2021/I/0/2/p/0706/440/804/2/w/750/0706440804_6_2_1.jpg?ts=1627984067185', 127),
(254, 'QUẦN VẢI JACQUARD DÁNG SUPER SKINNY', 'https://static.zara.net/photos///2021/I/0/2/p/9621/304/800/2/w/750/9621304800_6_1_1.jpg?ts=1633965122519', 128),
(255, 'QUẦN VẢI JACQUARD DÁNG SUPER SKINNY', 'https://static.zara.net/photos///2021/I/0/2/p/9621/304/800/2/w/750/9621304800_1_1_1.jpg?ts=1633965108799', 128),
(256, 'QUẦN VẢI JACQUARD DÁNG SUPER SKINNY', 'https://static.zara.net/photos///2021/I/0/2/p/9621/304/800/2/w/750/9621304800_6_2_1.jpg?ts=1633965103033', 128),
(257, 'ÁO PHÔNG CỔ TRỤ', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/505/2/w/294/4424638505_6_1_1.jpg?ts=1633691685556', 129),
(258, 'ÁO PHÔNG CỔ TRỤ', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/505/2/w/750/4424638505_1_1_1.jpg?ts=1634202200970', 129),
(259, 'ÁO PHÔNG CỔ TRỤ', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/505/2/w/750/4424638505_6_3_1.jpg?ts=1633693994599', 129),
(260, 'ÁO PHÔNG CỔ TRỤ RED', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/600/2/w/750/4424638600_6_1_1.jpg?ts=1633691905421', 130),
(261, 'ÁO PHÔNG CỔ TRỤ RED', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/600/2/w/750/4424638600_1_1_1.jpg?ts=1634202211044', 130),
(262, 'ÁO PHÔNG CỔ TRỤ RED', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/600/2/w/750/4424638600_6_3_1.jpg?ts=1633693997337', 130),
(263, 'ÁO PHÔNG CỔ TRỤ BLACK', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/800/2/w/750/4424638800_6_1_1.jpg?ts=1633691319008', 131),
(264, 'ÁO PHÔNG CỔ TRỤ BLACK', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/800/2/w/750/4424638800_2_1_1.jpg?ts=1637314210167', 131),
(265, 'ÁO PHÔNG CỔ TRỤ BLACK', 'https://static.zara.net/photos///2021/I/0/1/p/4424/638/800/2/w/750/4424638800_6_3_1.jpg?ts=1633693186123', 131),
(266, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/1/p/1165/477/800/2/w/750/1165477800_6_2_1.jpg?ts=1634113365184', 132),
(267, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/1/p/1165/477/800/2/w/750/1165477800_1_1_1.jpg?ts=1634134055580', 132),
(268, 'ÁO PHÔNG CAO CỔ', 'https://static.zara.net/photos///2021/I/0/1/p/1165/477/800/2/w/750/1165477800_6_3_1.jpg?ts=1634113595654', 132),
(269, 'QUẦN CARGO GIẢ DA', 'https://static.zara.net/photos///2021/I/0/1/p/9484/006/800/2/w/750/9484006800_6_1_1.jpg?ts=1635852935659', 133),
(270, 'QUẦN CARGO GIẢ DA', 'https://static.zara.net/photos///2021/I/0/1/p/9484/006/800/17/w/750/9484006800_1_1_1.jpg?ts=1637575997796', 133),
(271, 'QUẦN CARGO GIẢ DA', 'https://static.zara.net/photos///2021/I/0/1/p/9484/006/800/2/w/750/9484006800_6_2_1.jpg?ts=1635852925073', 133),
(272, 'QUẦN CARGO VẢI RŨ BÓNG', 'https://static.zara.net/photos///2021/I/0/1/p/0219/830/800/2/w/750/0219830800_6_1_1.jpg?ts=1636626972913', 134),
(273, 'QUẦN CARGO VẢI RŨ BÓNG', 'https://static.zara.net/photos///2021/I/0/1/p/0219/830/800/2/w/750/0219830800_1_1_1.jpg?ts=1636633841672', 134),
(274, 'QUẦN CARGO VẢI RŨ BÓNG', 'https://static.zara.net/photos///2021/I/0/1/p/0219/830/800/2/w/750/0219830800_6_2_1.jpg?ts=1636626923257', 134),
(275, 'QUẦN CARGO ỐNG RỘNG', 'https://static.zara.net/photos///2021/I/0/1/p/9472/966/800/2/w/750/9472966800_6_1_1.jpg?ts=1634889189138', 135),
(276, 'QUẦN CARGO ỐNG RỘNG', 'https://static.zara.net/photos///2021/I/0/1/p/9472/966/800/2/w/750/9472966800_1_1_1.jpg?ts=1634889561267', 135),
(277, 'QUẦN CARGO ỐNG RỘNG', 'https://static.zara.net/photos///2021/I/0/1/p/9472/966/800/2/w/750/9472966800_6_2_1.jpg?ts=1634889202127', 135),
(278, 'QUẦN CARGO BO GẤU', 'https://static.zara.net/photos///2021/I/0/1/p/1608/130/800/2/w/750/1608130800_6_1_1.jpg?ts=1633691227635', 136),
(279, 'QUẦN CARGO BO GẤU', 'https://static.zara.net/photos///2021/I/0/1/p/1608/130/800/2/w/750/1608130800_1_1_1.jpg?ts=1633685889444', 136),
(280, 'QUẦN CARGO BO GẤU', 'https://static.zara.net/photos///2021/I/0/1/p/1608/130/800/2/w/750/1608130800_6_2_1.jpg?ts=1633692174624', 136);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(10) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTen`, `SoDienThoai`, `Email`) VALUES
(1, 'Ôn Đình Khang', '0123456789', 'ondinhk@gmail.com'),
(9, 'Bộ Lâm Phong', '09896325421', ' bolamphong@gmail.com'),
(10, 'Nguyễn Tấn Ngọc', '01234569874', ' ngoc@gmail.com'),
(11, 'Nguyễn Đình Quý', '03214569874', ' nguyenquy@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL COMMENT 'url_img'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`, `url`) VALUES
(16, 'Áo Phông Nam', 'https://static.zara.net/photos///2021/I/0/2/p/0962/315/752/2/w/444/0962315752_2_1_1.jpg?ts=1625818246306'),
(17, 'Quần Nam', 'https://static.zara.net/photos///2021/I/0/2/p/6717/551/954/2/w/378/6717551954_1_1_1.jpg?ts=1635330938622'),
(18, 'Áo Phông Nữ', 'https://static.zara.net/photos///2021/I/0/1/p/0962/650/717/2/w/600/0962650717_2_3_1.jpg?ts=1631114529887'),
(19, 'Quần Nữ', 'https://static.zara.net/photos///2021/I/0/1/p/9424/620/330/3/w/600/9424620330_1_1_1.jpg?ts=1635409338345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `msnv` int(10) NOT NULL,
  `admin` tinyint(1) NOT NULL COMMENT '1 is admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`username`, `password`, `msnv`, `admin`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 2, 1),
('khangb1812346', 'e10adc3949ba59abbe56e057f20f883e', 11, 1),
('user1', '81dc9bdb52d04dc20036dbd8313ed055', 3, 0),
('user2', '81dc9bdb52d04dc20036dbd8313ed055', 12, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_khachhang`
--

CREATE TABLE `login_khachhang` (
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `MSKH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `login_khachhang`
--

INSERT INTO `login_khachhang` (`username`, `pass`, `MSKH`) VALUES
('lamphong123', 'e10adc3949ba59abbe56e057f20f883e', 9),
('nguyenngoc', 'e10adc3949ba59abbe56e057f20f883e', 10),
('nguyenquy', 'e10adc3949ba59abbe56e057f20f883e', 11),
('onkhang', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `msnv` int(10) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`msnv`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(2, 'Ôn Đình Khang', 'Admin', 'Cần Thơ', '0834677431'),
(3, 'Nguyễn Văn A', 'Nhân viên', 'Cần Thơ', '0123654789'),
(11, 'Cao Thanh Tuấn', 'Nhân Viên', 'Long An', '01234567891'),
(12, 'Nguyễn Văn B', 'Nhân Viên', 'Đồng Tháp', '01236547897');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`machitiet`),
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `mskh` (`MSKH`),
  ADD KEY `msnv` (`msnv`),
  ADD KEY `MSKH_2` (`MSKH`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `msnv` (`msnv`);

--
-- Chỉ mục cho bảng `login_khachhang`
--
ALTER TABLE `login_khachhang`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`msnv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `machitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `msnv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`mskh`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`msnv`) REFERENCES `nhanvien` (`msnv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `login_khachhang`
--
ALTER TABLE `login_khachhang`
  ADD CONSTRAINT `login_khachhang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
