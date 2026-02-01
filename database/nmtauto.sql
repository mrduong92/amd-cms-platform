-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: db
-- Thời gian đã tạo: Th2 01, 2026 lúc 12:39 PM
-- Phiên bản máy phục vụ: 8.0.43
-- Phiên bản PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nmtauto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('nmt-auto-cache-homepage_data_2', 'a:4:{s:7:\"sliders\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"partners\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"projects\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:20;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:34:\"KT Home - Kiến trúc Xây dựng\";s:4:\"slug\";s:19:\"kthome-architecture\";s:7:\"excerpt\";s:108:\"Website công ty kiến trúc xây dựng với showcase dự án và dịch vụ thiết kế kiến trúc.\";s:7:\"content\";s:468:\"<h2>KT Home - Kiến trúc Xây dựng</h2>\n\n<p>Website công ty kiến trúc xây dựng.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Showcase dự án</li>\n    <li>Dịch vụ thiết kế kiến trúc</li>\n    <li>Tư vấn xây dựng</li>\n    <li>Portfolio công trình</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"http://kthome.vn/\" target=\"_blank\">http://kthome.vn/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:20;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:34:\"KT Home - Kiến trúc Xây dựng\";s:4:\"slug\";s:19:\"kthome-architecture\";s:7:\"excerpt\";s:108:\"Website công ty kiến trúc xây dựng với showcase dự án và dịch vụ thiết kế kiến trúc.\";s:7:\"content\";s:468:\"<h2>KT Home - Kiến trúc Xây dựng</h2>\n\n<p>Website công ty kiến trúc xây dựng.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Showcase dự án</li>\n    <li>Dịch vụ thiết kế kiến trúc</li>\n    <li>Tư vấn xây dựng</li>\n    <li>Portfolio công trình</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"http://kthome.vn/\" target=\"_blank\">http://kthome.vn/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:28;s:4:\"name\";s:26:\"Xây dựng & Nội thất\";s:4:\"slug\";s:12:\"construction\";s:4:\"icon\";N;s:11:\"description\";N;s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:28;s:4:\"name\";s:26:\"Xây dựng & Nội thất\";s:4:\"slug\";s:12:\"construction\";s:4:\"icon\";N;s:11:\"description\";N;s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:1;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:19;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:39:\"Triệu Gia - Thiết kế Nội thất\";s:4:\"slug\";s:17:\"trieugia-interior\";s:7:\"excerpt\";s:105:\"Website showcase dự án nội thất đã thực hiện với portfolio công trình và gallery ảnh.\";s:7:\"content\";s:496:\"<h2>Triệu Gia - Thiết kế Nội thất</h2>\n\n<p>Website showcase dự án nội thất đã thực hiện.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Portfolio công trình</li>\n    <li>Gallery ảnh dự án</li>\n    <li>Tư vấn thiết kế online</li>\n    <li>Báo giá theo yêu cầu</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://trieugia.vn/\" target=\"_blank\">https://trieugia.vn/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:19;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:39:\"Triệu Gia - Thiết kế Nội thất\";s:4:\"slug\";s:17:\"trieugia-interior\";s:7:\"excerpt\";s:105:\"Website showcase dự án nội thất đã thực hiện với portfolio công trình và gallery ảnh.\";s:7:\"content\";s:496:\"<h2>Triệu Gia - Thiết kế Nội thất</h2>\n\n<p>Website showcase dự án nội thất đã thực hiện.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Portfolio công trình</li>\n    <li>Gallery ảnh dự án</li>\n    <li>Tư vấn thiết kế online</li>\n    <li>Báo giá theo yêu cầu</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://trieugia.vn/\" target=\"_blank\">https://trieugia.vn/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";r:75;}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:2;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:18;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:34:\"Phuan Home - Mái hiên di động\";s:4:\"slug\";s:16:\"phuanhome-awning\";s:7:\"excerpt\";s:123:\"Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp với gallery sản phẩm.\";s:7:\"content\";s:521:\"<h2>Phuan Home - Mái hiên Di động</h2>\n\n<p>Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Gallery sản phẩm</li>\n    <li>Báo giá theo kích thước</li>\n    <li>Form liên hệ</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://phuanhome.net/\" target=\"_blank\">https://phuanhome.net/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:18;s:7:\"site_id\";i:2;s:11:\"category_id\";i:28;s:7:\"user_id\";i:1;s:5:\"title\";s:34:\"Phuan Home - Mái hiên di động\";s:4:\"slug\";s:16:\"phuanhome-awning\";s:7:\"excerpt\";s:123:\"Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp với gallery sản phẩm.\";s:7:\"content\";s:521:\"<h2>Phuan Home - Mái hiên Di động</h2>\n\n<p>Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Gallery sản phẩm</li>\n    <li>Báo giá theo kích thước</li>\n    <li>Form liên hệ</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://phuanhome.net/\" target=\"_blank\">https://phuanhome.net/</a></p>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";r:75;}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:3;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:17;s:7:\"site_id\";i:2;s:11:\"category_id\";i:30;s:7:\"user_id\";i:1;s:5:\"title\";s:46:\"Vận tải Thanh Sang & Chuyển nhà Tâm An\";s:4:\"slug\";s:19:\"transport-logistics\";s:7:\"excerpt\";s:124:\"Bộ đôi website dịch vụ vận tải và chuyển nhà với tính năng báo giá online, đặt lịch tự động.\";s:7:\"content\";s:652:\"<h2>Website Dịch vụ Vận tải & Chuyển nhà</h2>\n\n<p>Bộ đôi website cho ngành dịch vụ vận tải và chuyển nhà.</p>\n\n<h3>Vận tải Thanh Sang</h3>\n<p><a href=\"https://vantaithanhsang.com/\" target=\"_blank\">https://vantaithanhsang.com/</a></p>\n<ul>\n    <li>Giới thiệu dịch vụ vận tải</li>\n    <li>Báo giá online</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Chuyển nhà Tâm An</h3>\n<p><a href=\"https://chuyennhataman.net/\" target=\"_blank\">https://chuyennhataman.net/</a></p>\n<ul>\n    <li>Dịch vụ chuyển nhà trọn gói</li>\n    <li>Tính phí tự động</li>\n    <li>Đặt lịch online</li>\n</ul>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:17;s:7:\"site_id\";i:2;s:11:\"category_id\";i:30;s:7:\"user_id\";i:1;s:5:\"title\";s:46:\"Vận tải Thanh Sang & Chuyển nhà Tâm An\";s:4:\"slug\";s:19:\"transport-logistics\";s:7:\"excerpt\";s:124:\"Bộ đôi website dịch vụ vận tải và chuyển nhà với tính năng báo giá online, đặt lịch tự động.\";s:7:\"content\";s:652:\"<h2>Website Dịch vụ Vận tải & Chuyển nhà</h2>\n\n<p>Bộ đôi website cho ngành dịch vụ vận tải và chuyển nhà.</p>\n\n<h3>Vận tải Thanh Sang</h3>\n<p><a href=\"https://vantaithanhsang.com/\" target=\"_blank\">https://vantaithanhsang.com/</a></p>\n<ul>\n    <li>Giới thiệu dịch vụ vận tải</li>\n    <li>Báo giá online</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Chuyển nhà Tâm An</h3>\n<p><a href=\"https://chuyennhataman.net/\" target=\"_blank\">https://chuyennhataman.net/</a></p>\n<ul>\n    <li>Dịch vụ chuyển nhà trọn gói</li>\n    <li>Tính phí tự động</li>\n    <li>Đặt lịch online</li>\n</ul>\";s:5:\"image\";N;s:4:\"type\";s:7:\"project\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:19:50\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:50\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:30;s:4:\"name\";s:23:\"Vận tải & Logistics\";s:4:\"slug\";s:9:\"transport\";s:4:\"icon\";N;s:11:\"description\";N;s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:30;s:4:\"name\";s:23:\"Vận tải & Logistics\";s:4:\"slug\";s:9:\"transport\";s:4:\"icon\";N;s:11:\"description\";N;s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"updated_at\";s:19:\"2026-02-01 01:19:49\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:4:\"news\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:6:{i:0;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:23;s:7:\"site_id\";i:2;s:11:\"category_id\";i:32;s:7:\"user_id\";N;s:5:\"title\";s:59:\"AI trong thiết kế Web: Xu hướng 2026 và tương lai\";s:4:\"slug\";s:48:\"ai-trong-thiet-ke-web-xu-huong-2026-va-tuong-lai\";s:7:\"excerpt\";s:172:\"Khám phá cách trí tuệ nhân tạo đang cách mạng hóa ngành thiết kế web, từ tự động hóa layout đến cá nhân hóa trải nghiệm người dùng.\";s:7:\"content\";s:1507:\"<h2>AI đang thay đổi cách chúng ta thiết kế website</h2>\n<p>Năm 2026 đánh dấu bước ngoặt quan trọng trong ngành thiết kế web khi AI trở thành công cụ không thể thiếu. Từ việc tự động sinh layout đến tối ưu hóa UX, AI đang giúp các designer làm việc hiệu quả hơn bao giờ hết.</p>\n\n<h3>1. Tự động hóa thiết kế layout</h3>\n<p>AI có thể phân tích hàng triệu website thành công để đề xuất cấu trúc layout tối ưu cho từng ngành nghề cụ thể. Điều này giúp rút ngắn thời gian thiết kế từ vài tuần xuống còn vài ngày.</p>\n\n<h3>2. Cá nhân hóa trải nghiệm người dùng</h3>\n<p>Với machine learning, website có thể tự điều chỉnh nội dung và giao diện dựa trên hành vi của từng người dùng, tạo ra trải nghiệm độc đáo cho mỗi khách truy cập.</p>\n\n<h3>3. Tối ưu hóa SEO thông minh</h3>\n<p>AI giúp phân tích và đề xuất cải thiện SEO một cách tự động, từ cấu trúc heading đến meta description, đảm bảo website luôn đạt thứ hạng cao trên công cụ tìm kiếm.</p>\n\n<blockquote>\n\"AI không thay thế designer, mà giúp họ làm việc thông minh hơn\" - CEO AMD AI Solutions\n</blockquote>\n\n<h3>Kết luận</h3>\n<p>Việc áp dụng AI trong thiết kế web không còn là lựa chọn mà là điều bắt buộc để cạnh tranh trong thị trường số hóa ngày nay.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:23;s:7:\"site_id\";i:2;s:11:\"category_id\";i:32;s:7:\"user_id\";N;s:5:\"title\";s:59:\"AI trong thiết kế Web: Xu hướng 2026 và tương lai\";s:4:\"slug\";s:48:\"ai-trong-thiet-ke-web-xu-huong-2026-va-tuong-lai\";s:7:\"excerpt\";s:172:\"Khám phá cách trí tuệ nhân tạo đang cách mạng hóa ngành thiết kế web, từ tự động hóa layout đến cá nhân hóa trải nghiệm người dùng.\";s:7:\"content\";s:1507:\"<h2>AI đang thay đổi cách chúng ta thiết kế website</h2>\n<p>Năm 2026 đánh dấu bước ngoặt quan trọng trong ngành thiết kế web khi AI trở thành công cụ không thể thiếu. Từ việc tự động sinh layout đến tối ưu hóa UX, AI đang giúp các designer làm việc hiệu quả hơn bao giờ hết.</p>\n\n<h3>1. Tự động hóa thiết kế layout</h3>\n<p>AI có thể phân tích hàng triệu website thành công để đề xuất cấu trúc layout tối ưu cho từng ngành nghề cụ thể. Điều này giúp rút ngắn thời gian thiết kế từ vài tuần xuống còn vài ngày.</p>\n\n<h3>2. Cá nhân hóa trải nghiệm người dùng</h3>\n<p>Với machine learning, website có thể tự điều chỉnh nội dung và giao diện dựa trên hành vi của từng người dùng, tạo ra trải nghiệm độc đáo cho mỗi khách truy cập.</p>\n\n<h3>3. Tối ưu hóa SEO thông minh</h3>\n<p>AI giúp phân tích và đề xuất cải thiện SEO một cách tự động, từ cấu trúc heading đến meta description, đảm bảo website luôn đạt thứ hạng cao trên công cụ tìm kiếm.</p>\n\n<blockquote>\n\"AI không thay thế designer, mà giúp họ làm việc thông minh hơn\" - CEO AMD AI Solutions\n</blockquote>\n\n<h3>Kết luận</h3>\n<p>Việc áp dụng AI trong thiết kế web không còn là lựa chọn mà là điều bắt buộc để cạnh tranh trong thị trường số hóa ngày nay.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-02-01 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:32;s:4:\"name\";s:17:\"AI & Công nghệ\";s:4:\"slug\";s:12:\"ai-cong-nghe\";s:4:\"icon\";N;s:11:\"description\";s:34:\"Bài viết về AI & Công nghệ\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:32;s:4:\"name\";s:17:\"AI & Công nghệ\";s:4:\"slug\";s:12:\"ai-cong-nghe\";s:4:\"icon\";N;s:11:\"description\";s:34:\"Bài viết về AI & Công nghệ\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:0;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:1;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:24;s:7:\"site_id\";i:2;s:11:\"category_id\";i:33;s:7:\"user_id\";N;s:5:\"title\";s:72:\"5 yếu tố quan trọng nhất của một website chuyển đổi cao\";s:4:\"slug\";s:55:\"5-yeu-to-quan-trong-nhat-cua-mot-website-chuyen-doi-cao\";s:7:\"excerpt\";s:139:\"Tìm hiểu những yếu tố thiết kế và UX giúp tăng tỷ lệ chuyển đổi khách truy cập thành khách hàng thực sự.\";s:7:\"content\";s:1130:\"<h2>Website của bạn có đang \"bán hàng\" hiệu quả?</h2>\n<p>Một website đẹp chưa chắc đã là website tốt. Website tốt phải có khả năng chuyển đổi khách truy cập thành khách hàng. Dưới đây là 5 yếu tố then chốt:</p>\n\n<h3>1. Thời gian tải trang nhanh</h3>\n<p>Theo nghiên cứu, 53% người dùng mobile sẽ rời website nếu tải quá 3 giây. Tối ưu tốc độ là ưu tiên số 1.</p>\n\n<h3>2. Call-to-Action rõ ràng</h3>\n<p>Nút CTA phải nổi bật, dễ thấy và truyền tải được giá trị. \"Nhận báo giá miễn phí\" hiệu quả hơn đơn giản là \"Gửi\".</p>\n\n<h3>3. Social Proof mạnh mẽ</h3>\n<p>Testimonials, reviews, case studies - những bằng chứng xã hội giúp xây dựng niềm tin với khách hàng mới.</p>\n\n<h3>4. Mobile-first Design</h3>\n<p>70% traffic hiện nay đến từ mobile. Website phải hoạt động hoàn hảo trên điện thoại.</p>\n\n<h3>5. Nội dung có giá trị</h3>\n<p>Content phải giải quyết vấn đề của khách hàng, không chỉ nói về bản thân doanh nghiệp.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-01-29 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:24;s:7:\"site_id\";i:2;s:11:\"category_id\";i:33;s:7:\"user_id\";N;s:5:\"title\";s:72:\"5 yếu tố quan trọng nhất của một website chuyển đổi cao\";s:4:\"slug\";s:55:\"5-yeu-to-quan-trong-nhat-cua-mot-website-chuyen-doi-cao\";s:7:\"excerpt\";s:139:\"Tìm hiểu những yếu tố thiết kế và UX giúp tăng tỷ lệ chuyển đổi khách truy cập thành khách hàng thực sự.\";s:7:\"content\";s:1130:\"<h2>Website của bạn có đang \"bán hàng\" hiệu quả?</h2>\n<p>Một website đẹp chưa chắc đã là website tốt. Website tốt phải có khả năng chuyển đổi khách truy cập thành khách hàng. Dưới đây là 5 yếu tố then chốt:</p>\n\n<h3>1. Thời gian tải trang nhanh</h3>\n<p>Theo nghiên cứu, 53% người dùng mobile sẽ rời website nếu tải quá 3 giây. Tối ưu tốc độ là ưu tiên số 1.</p>\n\n<h3>2. Call-to-Action rõ ràng</h3>\n<p>Nút CTA phải nổi bật, dễ thấy và truyền tải được giá trị. \"Nhận báo giá miễn phí\" hiệu quả hơn đơn giản là \"Gửi\".</p>\n\n<h3>3. Social Proof mạnh mẽ</h3>\n<p>Testimonials, reviews, case studies - những bằng chứng xã hội giúp xây dựng niềm tin với khách hàng mới.</p>\n\n<h3>4. Mobile-first Design</h3>\n<p>70% traffic hiện nay đến từ mobile. Website phải hoạt động hoàn hảo trên điện thoại.</p>\n\n<h3>5. Nội dung có giá trị</h3>\n<p>Content phải giải quyết vấn đề của khách hàng, không chỉ nói về bản thân doanh nghiệp.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-01-29 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:33;s:4:\"name\";s:16:\"Thiết kế Web\";s:4:\"slug\";s:12:\"thiet-ke-web\";s:4:\"icon\";N;s:11:\"description\";s:33:\"Bài viết về Thiết kế Web\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:1;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:33;s:4:\"name\";s:16:\"Thiết kế Web\";s:4:\"slug\";s:12:\"thiet-ke-web\";s:4:\"icon\";N;s:11:\"description\";s:33:\"Bài viết về Thiết kế Web\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:1;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:2;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:25;s:7:\"site_id\";i:2;s:11:\"category_id\";i:34;s:7:\"user_id\";N;s:5:\"title\";s:73:\"Chiến lược Marketing số cho SME: Chi phí thấp, hiệu quả cao\";s:4:\"slug\";s:57:\"chien-luoc-marketing-so-cho-sme-chi-phi-thap-hieu-qua-cao\";s:7:\"excerpt\";s:136:\"Hướng dẫn xây dựng chiến lược marketing số phù hợp với ngân sách hạn chế của doanh nghiệp nhỏ và vừa.\";s:7:\"content\";s:960:\"<h2>Marketing số không cần ngân sách khủng</h2>\n<p>Nhiều SME nghĩ rằng marketing số đòi hỏi ngân sách lớn. Thực tế, với chiến lược đúng đắn, bạn có thể đạt kết quả ấn tượng với chi phí tối thiểu.</p>\n\n<h3>SEO - Đầu tư dài hạn hiệu quả</h3>\n<p>Tối ưu SEO cho website giúp bạn có traffic miễn phí từ Google. Chi phí ban đầu cho SEO sẽ mang lại lợi ích lâu dài.</p>\n\n<h3>Content Marketing</h3>\n<p>Tạo nội dung giá trị thu hút khách hàng tự nhiên. Blog, video, infographic - hãy chọn định dạng phù hợp với audience của bạn.</p>\n\n<h3>Social Media có chiến lược</h3>\n<p>Đừng có mặt trên mọi nền tảng. Hãy tập trung vào 1-2 kênh nơi khách hàng của bạn thực sự hoạt động.</p>\n\n<h3>Email Marketing</h3>\n<p>Với ROI trung bình 4200%, email marketing vẫn là kênh hiệu quả nhất cho SME.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-01-26 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:25;s:7:\"site_id\";i:2;s:11:\"category_id\";i:34;s:7:\"user_id\";N;s:5:\"title\";s:73:\"Chiến lược Marketing số cho SME: Chi phí thấp, hiệu quả cao\";s:4:\"slug\";s:57:\"chien-luoc-marketing-so-cho-sme-chi-phi-thap-hieu-qua-cao\";s:7:\"excerpt\";s:136:\"Hướng dẫn xây dựng chiến lược marketing số phù hợp với ngân sách hạn chế của doanh nghiệp nhỏ và vừa.\";s:7:\"content\";s:960:\"<h2>Marketing số không cần ngân sách khủng</h2>\n<p>Nhiều SME nghĩ rằng marketing số đòi hỏi ngân sách lớn. Thực tế, với chiến lược đúng đắn, bạn có thể đạt kết quả ấn tượng với chi phí tối thiểu.</p>\n\n<h3>SEO - Đầu tư dài hạn hiệu quả</h3>\n<p>Tối ưu SEO cho website giúp bạn có traffic miễn phí từ Google. Chi phí ban đầu cho SEO sẽ mang lại lợi ích lâu dài.</p>\n\n<h3>Content Marketing</h3>\n<p>Tạo nội dung giá trị thu hút khách hàng tự nhiên. Blog, video, infographic - hãy chọn định dạng phù hợp với audience của bạn.</p>\n\n<h3>Social Media có chiến lược</h3>\n<p>Đừng có mặt trên mọi nền tảng. Hãy tập trung vào 1-2 kênh nơi khách hàng của bạn thực sự hoạt động.</p>\n\n<h3>Email Marketing</h3>\n<p>Với ROI trung bình 4200%, email marketing vẫn là kênh hiệu quả nhất cho SME.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:1;s:12:\"published_at\";s:19:\"2026-01-26 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:34;s:4:\"name\";s:14:\"Marketing số\";s:4:\"slug\";s:12:\"marketing-so\";s:4:\"icon\";N;s:11:\"description\";s:31:\"Bài viết về Marketing số\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:2;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:34;s:4:\"name\";s:14:\"Marketing số\";s:4:\"slug\";s:12:\"marketing-so\";s:4:\"icon\";N;s:11:\"description\";s:31:\"Bài viết về Marketing số\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:2;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:3;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:26;s:7:\"site_id\";i:2;s:11:\"category_id\";i:35;s:7:\"user_id\";N;s:5:\"title\";s:73:\"Case Study: Tăng 300% leads cho công ty xây dựng với website mới\";s:4:\"slug\";s:62:\"case-study-tang-300-leads-cho-cong-ty-xay-dung-voi-website-moi\";s:7:\"excerpt\";s:140:\"Phân tích chi tiết cách AMD AI Solutions giúp một công ty xây dựng tăng trưởng leads gấp 3 lần sau khi redesign website.\";s:7:\"content\";s:982:\"<h2>Bối cảnh</h2>\n<p>Công ty Xây dựng Đại Phát đến với AMD với vấn đề: website cũ không tạo ra leads, hầu hết khách hàng đến từ giới thiệu truyền miệng.</p>\n\n<h3>Thách thức</h3>\n<ul>\n<li>Website cũ không responsive, tải chậm</li>\n<li>Không có form liên hệ rõ ràng</li>\n<li>Nội dung nghèo nàn, không có portfolio dự án</li>\n<li>SEO gần như không tồn tại</li>\n</ul>\n\n<h3>Giải pháp AMD AI</h3>\n<ul>\n<li>Thiết kế lại hoàn toàn với AI-powered layout</li>\n<li>Tối ưu tốc độ (PageSpeed 95+)</li>\n<li>Xây dựng portfolio với 50+ dự án hoàn thành</li>\n<li>Tích hợp chatbot tư vấn 24/7</li>\n<li>SEO on-page cho 100+ từ khóa ngành xây dựng</li>\n</ul>\n\n<h3>Kết quả sau 3 tháng</h3>\n<ul>\n<li>Traffic tăng 450%</li>\n<li>Leads từ website tăng 300%</li>\n<li>Tỷ lệ chuyển đổi đạt 4.2%</li>\n<li>Doanh thu từ online chiếm 35% tổng doanh thu</li>\n</ul>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-23 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:26;s:7:\"site_id\";i:2;s:11:\"category_id\";i:35;s:7:\"user_id\";N;s:5:\"title\";s:73:\"Case Study: Tăng 300% leads cho công ty xây dựng với website mới\";s:4:\"slug\";s:62:\"case-study-tang-300-leads-cho-cong-ty-xay-dung-voi-website-moi\";s:7:\"excerpt\";s:140:\"Phân tích chi tiết cách AMD AI Solutions giúp một công ty xây dựng tăng trưởng leads gấp 3 lần sau khi redesign website.\";s:7:\"content\";s:982:\"<h2>Bối cảnh</h2>\n<p>Công ty Xây dựng Đại Phát đến với AMD với vấn đề: website cũ không tạo ra leads, hầu hết khách hàng đến từ giới thiệu truyền miệng.</p>\n\n<h3>Thách thức</h3>\n<ul>\n<li>Website cũ không responsive, tải chậm</li>\n<li>Không có form liên hệ rõ ràng</li>\n<li>Nội dung nghèo nàn, không có portfolio dự án</li>\n<li>SEO gần như không tồn tại</li>\n</ul>\n\n<h3>Giải pháp AMD AI</h3>\n<ul>\n<li>Thiết kế lại hoàn toàn với AI-powered layout</li>\n<li>Tối ưu tốc độ (PageSpeed 95+)</li>\n<li>Xây dựng portfolio với 50+ dự án hoàn thành</li>\n<li>Tích hợp chatbot tư vấn 24/7</li>\n<li>SEO on-page cho 100+ từ khóa ngành xây dựng</li>\n</ul>\n\n<h3>Kết quả sau 3 tháng</h3>\n<ul>\n<li>Traffic tăng 450%</li>\n<li>Leads từ website tăng 300%</li>\n<li>Tỷ lệ chuyển đổi đạt 4.2%</li>\n<li>Doanh thu từ online chiếm 35% tổng doanh thu</li>\n</ul>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-23 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:35;s:4:\"name\";s:10:\"Case Study\";s:4:\"slug\";s:10:\"case-study\";s:4:\"icon\";N;s:11:\"description\";s:27:\"Bài viết về Case Study\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:3;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:35;s:4:\"name\";s:10:\"Case Study\";s:4:\"slug\";s:10:\"case-study\";s:4:\"icon\";N;s:11:\"description\";s:27:\"Bài viết về Case Study\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:3;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:4;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:27;s:7:\"site_id\";i:2;s:11:\"category_id\";i:36;s:7:\"user_id\";N;s:5:\"title\";s:74:\"Website 2026: Tối giản, tốc độ và trải nghiệm đa giác quan\";s:4:\"slug\";s:56:\"website-2026-toi-gian-toc-do-va-trai-nghiem-da-giac-quan\";s:7:\"excerpt\";s:116:\"Điểm qua những xu hướng thiết kế web nổi bật nhất năm 2026 mà mọi doanh nghiệp cần biết.\";s:7:\"content\";s:1071:\"<h2>Xu hướng thiết kế web 2026</h2>\n<p>Thế giới web design đang thay đổi nhanh chóng. Dưới đây là những xu hướng đang định hình năm 2026:</p>\n\n<h3>1. Neobrutalism</h3>\n<p>Thiết kế mạnh mẽ, bold với border dày và màu sắc tương phản cao đang trở lại như một làn sóng mới.</p>\n\n<h3>2. Dark Mode mặc định</h3>\n<p>Với sự phổ biến của OLED screens, dark mode không còn là option mà là mặc định cho nhiều website.</p>\n\n<h3>3. Micro-interactions AI-powered</h3>\n<p>Các hiệu ứng nhỏ được AI cá nhân hóa tạo trải nghiệm độc đáo cho mỗi người dùng.</p>\n\n<h3>4. 3D và Immersive Experience</h3>\n<p>WebGL và Three.js giúp tạo trải nghiệm 3D ngay trên browser mà không cần plugin.</p>\n\n<h3>5. Voice UI Integration</h3>\n<p>Với sự phổ biến của smart speakers, website bắt đầu tích hợp voice navigation.</p>\n\n<h3>6. Sustainable Web Design</h3>\n<p>Thiết kế tiết kiệm năng lượng, tối ưu carbon footprint của website.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-20 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:27;s:7:\"site_id\";i:2;s:11:\"category_id\";i:36;s:7:\"user_id\";N;s:5:\"title\";s:74:\"Website 2026: Tối giản, tốc độ và trải nghiệm đa giác quan\";s:4:\"slug\";s:56:\"website-2026-toi-gian-toc-do-va-trai-nghiem-da-giac-quan\";s:7:\"excerpt\";s:116:\"Điểm qua những xu hướng thiết kế web nổi bật nhất năm 2026 mà mọi doanh nghiệp cần biết.\";s:7:\"content\";s:1071:\"<h2>Xu hướng thiết kế web 2026</h2>\n<p>Thế giới web design đang thay đổi nhanh chóng. Dưới đây là những xu hướng đang định hình năm 2026:</p>\n\n<h3>1. Neobrutalism</h3>\n<p>Thiết kế mạnh mẽ, bold với border dày và màu sắc tương phản cao đang trở lại như một làn sóng mới.</p>\n\n<h3>2. Dark Mode mặc định</h3>\n<p>Với sự phổ biến của OLED screens, dark mode không còn là option mà là mặc định cho nhiều website.</p>\n\n<h3>3. Micro-interactions AI-powered</h3>\n<p>Các hiệu ứng nhỏ được AI cá nhân hóa tạo trải nghiệm độc đáo cho mỗi người dùng.</p>\n\n<h3>4. 3D và Immersive Experience</h3>\n<p>WebGL và Three.js giúp tạo trải nghiệm 3D ngay trên browser mà không cần plugin.</p>\n\n<h3>5. Voice UI Integration</h3>\n<p>Với sự phổ biến của smart speakers, website bắt đầu tích hợp voice navigation.</p>\n\n<h3>6. Sustainable Web Design</h3>\n<p>Thiết kế tiết kiệm năng lượng, tối ưu carbon footprint của website.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-20 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:36;s:4:\"name\";s:11:\"Xu hướng\";s:4:\"slug\";s:8:\"xu-huong\";s:4:\"icon\";N;s:11:\"description\";s:28:\"Bài viết về Xu hướng\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:4;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:36;s:4:\"name\";s:11:\"Xu hướng\";s:4:\"slug\";s:8:\"xu-huong\";s:4:\"icon\";N;s:11:\"description\";s:28:\"Bài viết về Xu hướng\";s:4:\"type\";s:4:\"post\";s:9:\"parent_id\";N;s:5:\"order\";i:4;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:9:\"is_active\";s:7:\"boolean\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:4:\"icon\";i:3;s:11:\"description\";i:4;s:4:\"type\";i:5;s:9:\"parent_id\";i:6;s:5:\"order\";i:7;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}i:5;O:15:\"App\\Models\\Post\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"posts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:18:{s:2:\"id\";i:28;s:7:\"site_id\";i:2;s:11:\"category_id\";i:32;s:7:\"user_id\";N;s:5:\"title\";s:63:\"Chatbot AI: Công cụ bán hàng 24/7 cho doanh nghiệp nhỏ\";s:4:\"slug\";s:52:\"chatbot-ai-cong-cu-ban-hang-247-cho-doanh-nghiep-nho\";s:7:\"excerpt\";s:108:\"Hướng dẫn triển khai chatbot AI để tự động hóa chăm sóc khách hàng và tăng doanh số.\";s:7:\"content\";s:1052:\"<h2>Tại sao SME cần chatbot AI?</h2>\n<p>Với nguồn lực hạn chế, SME không thể có đội ngũ chăm sóc khách hàng 24/7. Chatbot AI là giải pháp hoàn hảo.</p>\n\n<h3>Lợi ích của Chatbot AI</h3>\n<ul>\n<li><strong>Hoạt động 24/7:</strong> Không bỏ lỡ bất kỳ khách hàng nào</li>\n<li><strong>Trả lời tức thì:</strong> Khách hàng không phải chờ đợi</li>\n<li><strong>Tiết kiệm chi phí:</strong> Giảm 70% chi phí support</li>\n<li><strong>Thu thập data:</strong> Hiểu khách hàng tốt hơn</li>\n</ul>\n\n<h3>Các bước triển khai</h3>\n<ol>\n<li>Xác định use cases chính (FAQ, đặt hàng, hỗ trợ)</li>\n<li>Xây dựng knowledge base</li>\n<li>Training chatbot với dữ liệu thực</li>\n<li>Tích hợp vào website và các kênh khác</li>\n<li>Liên tục cải thiện dựa trên feedback</li>\n</ol>\n\n<h3>AMD AI Chatbot Solution</h3>\n<p>AMD cung cấp giải pháp chatbot AI tích hợp sẵn cho mọi website, được training riêng cho từng ngành nghề.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-17 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:18:{s:2:\"id\";i:28;s:7:\"site_id\";i:2;s:11:\"category_id\";i:32;s:7:\"user_id\";N;s:5:\"title\";s:63:\"Chatbot AI: Công cụ bán hàng 24/7 cho doanh nghiệp nhỏ\";s:4:\"slug\";s:52:\"chatbot-ai-cong-cu-ban-hang-247-cho-doanh-nghiep-nho\";s:7:\"excerpt\";s:108:\"Hướng dẫn triển khai chatbot AI để tự động hóa chăm sóc khách hàng và tăng doanh số.\";s:7:\"content\";s:1052:\"<h2>Tại sao SME cần chatbot AI?</h2>\n<p>Với nguồn lực hạn chế, SME không thể có đội ngũ chăm sóc khách hàng 24/7. Chatbot AI là giải pháp hoàn hảo.</p>\n\n<h3>Lợi ích của Chatbot AI</h3>\n<ul>\n<li><strong>Hoạt động 24/7:</strong> Không bỏ lỡ bất kỳ khách hàng nào</li>\n<li><strong>Trả lời tức thì:</strong> Khách hàng không phải chờ đợi</li>\n<li><strong>Tiết kiệm chi phí:</strong> Giảm 70% chi phí support</li>\n<li><strong>Thu thập data:</strong> Hiểu khách hàng tốt hơn</li>\n</ul>\n\n<h3>Các bước triển khai</h3>\n<ol>\n<li>Xác định use cases chính (FAQ, đặt hàng, hỗ trợ)</li>\n<li>Xây dựng knowledge base</li>\n<li>Training chatbot với dữ liệu thực</li>\n<li>Tích hợp vào website và các kênh khác</li>\n<li>Liên tục cải thiện dựa trên feedback</li>\n</ol>\n\n<h3>AMD AI Chatbot Solution</h3>\n<p>AMD cung cấp giải pháp chatbot AI tích hợp sẵn cho mọi website, được training riêng cho từng ngành nghề.</p>\";s:5:\"image\";N;s:4:\"type\";s:4:\"news\";s:11:\"is_featured\";i:0;s:12:\"published_at\";s:19:\"2026-01-17 01:35:00\";s:9:\"is_active\";i:1;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:10:\"created_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"updated_at\";s:19:\"2026-02-01 01:35:00\";s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:11:\"is_featured\";s:7:\"boolean\";s:9:\"is_active\";s:7:\"boolean\";s:12:\"published_at\";s:8:\"datetime\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";r:580;}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:14:{i:0;s:7:\"site_id\";i:1;s:11:\"category_id\";i:2;s:7:\"user_id\";i:3;s:5:\"title\";i:4;s:4:\"slug\";i:5;s:7:\"excerpt\";i:6;s:7:\"content\";i:7;s:5:\"image\";i:8;s:4:\"type\";i:9;s:11:\"is_featured\";i:10;s:12:\"published_at\";i:11;s:9:\"is_active\";i:12;s:10:\"meta_title\";i:13;s:16:\"meta_description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}', 1769950475);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('product','service','post') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `description`, `type`, `parent_id`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pin Lithium Xe Nâng', 'pin-lithium-xe-nang', 'battery_charging_full', 'Pin lithium chất lượng cao dành cho xe nâng công nghiệp', 'product', NULL, 1, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(2, 'Pin Lithium Năng Lượng Mặt Trời', 'pin-lithium-nang-luong-mat-troi', 'solar_power', 'Hệ thống lưu trữ năng lượng mặt trời', 'product', NULL, 2, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(3, 'Camera AI', 'camera-ai', 'videocam', 'Camera an ninh tích hợp trí tuệ nhân tạo', 'product', NULL, 3, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(4, 'Dịch vụ Xe Nâng', 'dich-vu-xe-nang', 'precision_manufacturing', NULL, 'service', NULL, 1, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(5, 'Dịch vụ Năng Lượng', 'dich-vu-nang-luong', 'bolt', NULL, 'service', NULL, 2, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(6, 'Tin tức', 'tin-tuc', 'newspaper', NULL, 'post', NULL, 1, 1, '2026-01-26 08:42:17', '2026-01-26 08:42:17', NULL),
(7, 'Dự án', 'du-an', 'engineering', NULL, 'post', NULL, 2, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(8, 'Pin Lithium Xe Nâng', 'pin-lithium-xe-nang-2', 'battery_charging_full', 'Pin lithium chất lượng cao dành cho xe nâng công nghiệp', 'product', NULL, 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(9, 'Pin Lithium Năng Lượng Mặt Trời', 'pin-lithium-nang-luong-mat-troi-2', 'solar_power', 'Hệ thống lưu trữ năng lượng mặt trời', 'product', NULL, 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(10, 'Camera AI', 'camera-ai-2', 'videocam', 'Camera an ninh tích hợp trí tuệ nhân tạo', 'product', NULL, 3, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(11, 'Dịch vụ Xe Nâng', 'dich-vu-xe-nang-2', 'precision_manufacturing', NULL, 'service', NULL, 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(12, 'Dịch vụ Năng Lượng', 'dich-vu-nang-luong-2', 'bolt', NULL, 'service', NULL, 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(13, 'Tin tức', 'tin-tuc-2', 'newspaper', NULL, 'post', NULL, 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(14, 'Dự án', 'du-an-2', 'engineering', NULL, 'post', NULL, 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(15, 'Pin Lithium Xe Nâng', 'pin-lithium-xe-nang-3', 'battery_charging_full', 'Pin lithium chất lượng cao dành cho xe nâng công nghiệp', 'product', NULL, 1, 1, '2026-01-27 00:33:12', '2026-01-27 00:33:12', NULL),
(16, 'Pin Lithium Năng Lượng Mặt Trời', 'pin-lithium-nang-luong-mat-troi-3', 'solar_power', 'Hệ thống lưu trữ năng lượng mặt trời', 'product', NULL, 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(17, 'Camera AI', 'camera-ai-3', 'videocam', 'Camera an ninh tích hợp trí tuệ nhân tạo', 'product', NULL, 3, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(18, 'Dịch vụ Xe Nâng', 'dich-vu-xe-nang-3', 'precision_manufacturing', NULL, 'service', NULL, 1, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(19, 'Dịch vụ Năng Lượng', 'dich-vu-nang-luong-3', 'bolt', NULL, 'service', NULL, 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(20, 'Tin tức', 'tin-tuc-3', 'newspaper', NULL, 'post', NULL, 1, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(21, 'Dự án', 'du-an-3', 'engineering', NULL, 'post', NULL, 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(22, 'Healthcare', 'healthcare', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(23, 'E-commerce', 'ecommerce', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(24, 'Enterprise', 'enterprise', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(25, 'SaaS Platform', 'saas', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(26, 'Giáo dục', 'education', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(27, 'B2B Solutions', 'b2b', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(28, 'Xây dựng & Nội thất', 'construction', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(29, 'F&B', 'fnb', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(30, 'Vận tải & Logistics', 'transport', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(31, 'API & Tools', 'api', NULL, NULL, 'post', NULL, 0, 1, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(32, 'AI & Công nghệ', 'ai-cong-nghe', NULL, 'Bài viết về AI & Công nghệ', 'post', NULL, 0, 1, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(33, 'Thiết kế Web', 'thiet-ke-web', NULL, 'Bài viết về Thiết kế Web', 'post', NULL, 1, 1, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(34, 'Marketing số', 'marketing-so', NULL, 'Bài viết về Marketing số', 'post', NULL, 2, 1, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(35, 'Case Study', 'case-study', NULL, 'Bài viết về Case Study', 'post', NULL, 3, 1, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(36, 'Xu hướng', 'xu-huong', NULL, 'Bài viết về Xu hướng', 'post', NULL, 4, 1, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` enum('new','read','replied','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `site_id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `admin_notes`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, '0985763892', NULL, 'test', 'read', NULL, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-27 14:57:43', '2026-01-27 14:57:51', NULL),
(2, NULL, NULL, NULL, 'fsdfsdfsd', NULL, 'fdsfdsfds', 'read', NULL, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-28 08:21:38', '2026-01-28 08:23:05', NULL),
(3, 2, NULL, NULL, '0985763892', 'Yêu cầu tư vấn từ website', NULL, 'new', NULL, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', '2026-02-01 11:54:32', '2026-02-01 11:54:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `size` bigint UNSIGNED NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom',
  `linkable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkable_id` bigint UNSIGNED DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `location` enum('header','footer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'header',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `site_id`, `name`, `icon`, `url`, `link_type`, `linkable_type`, `linkable_id`, `target`, `parent_id`, `order`, `is_active`, `location`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Chính sách bảo hành', NULL, '/chinh-sach-bao-hanh', 'custom', NULL, NULL, '_self', NULL, 1, 1, 'footer', '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(8, NULL, 'Chính sách đổi trả', NULL, '/chinh-sach-doi-tra', 'custom', NULL, NULL, '_self', NULL, 2, 1, 'footer', '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(9, NULL, 'Điều khoản sử dụng', NULL, '/dieu-khoan-su-dung', 'custom', NULL, NULL, '_self', NULL, 3, 1, 'footer', '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(10, NULL, 'Chính sách bảo mật', NULL, '/chinh-sach-bao-mat', 'custom', NULL, NULL, '_self', NULL, 4, 1, 'footer', '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(11, NULL, 'Trang chủ', NULL, '/', 'home', NULL, NULL, '_self', NULL, 0, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(12, NULL, 'Dịch vụ', NULL, '/dich-vu', 'custom', NULL, NULL, '_self', NULL, 2, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(13, NULL, 'Dự án', NULL, '/du-an', 'custom', NULL, NULL, '_self', NULL, 3, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(14, NULL, 'Tin tức', NULL, '/tin-tuc', 'custom', NULL, NULL, '_self', NULL, 4, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(15, NULL, 'Liên hệ', NULL, '/lien-he', 'custom', NULL, NULL, '_self', NULL, 5, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(16, NULL, 'Sản phẩm chủ lực', NULL, '/san-pham', 'custom', NULL, NULL, '_self', NULL, 1, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(17, NULL, 'Pin lithium xe nâng', NULL, '/san-pham/danh-muc/binh-ac-quy-pin-lithium-cho-xe-nang-dien', 'custom', NULL, NULL, '_self', 16, 0, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(18, NULL, 'Camera AI', NULL, '/san-pham/danh-muc/he-thong-camera-ai-an-toan-cho-xe-nang-va-may-cong-trinh', 'custom', NULL, NULL, '_self', 16, 1, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(19, NULL, 'Xe nâng', NULL, '/san-pham/danh-muc/dich-vu-cho-thue-xe-nang-dien-va-xe-nang-dau', 'custom', NULL, NULL, '_self', 16, 2, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(20, NULL, 'Máy công trình', NULL, '/san-pham/danh-muc/phu-tung-va-linh-kien-xe-nang-va-may-cong-trinh', 'custom', NULL, NULL, '_self', 16, 3, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(21, NULL, 'Phụ tùng xe nâng', NULL, '/san-pham/danh-muc/phu-tung-va-linh-kien-xe-nang-va-may-cong-trinh', 'custom', NULL, NULL, '_self', 16, 4, 1, 'header', '2026-01-27 14:05:23', '2026-01-27 14:54:59'),
(22, NULL, 'Dịch vụ', NULL, '/dich-vu', 'custom', NULL, NULL, '_self', NULL, 1, 1, 'footer', '2026-01-27 14:05:23', '2026-01-27 14:05:23'),
(23, NULL, 'Dự án tiêu biểu', NULL, '/du-an', 'custom', NULL, NULL, '_self', NULL, 2, 1, 'footer', '2026-01-27 14:05:23', '2026-01-27 14:05:23'),
(24, NULL, 'Tin tức', NULL, '/tin-tuc', 'custom', NULL, NULL, '_self', NULL, 3, 1, 'footer', '2026-01-27 14:05:23', '2026-01-27 14:05:23'),
(25, NULL, 'Chính sách bảo hành', NULL, '/chinh-sach-bao-hanh', 'page', NULL, NULL, '_self', NULL, 4, 1, 'footer', '2026-01-27 14:05:23', '2026-01-27 14:05:23'),
(26, NULL, 'Liên hệ', NULL, '/lien-he', 'custom', NULL, NULL, '_self', NULL, 5, 1, 'footer', '2026-01-27 14:05:23', '2026-01-27 14:05:23'),
(27, 2, 'Trang chủ', NULL, '/', 'home', NULL, NULL, '_self', NULL, 1, 1, 'header', '2026-02-01 01:15:12', '2026-02-01 01:15:12'),
(28, 2, 'Giới thiệu', NULL, NULL, 'page', 'App\\Models\\Page', 1, '_self', NULL, 2, 1, 'header', '2026-02-01 01:15:12', '2026-02-01 01:15:12'),
(29, 2, 'Liên hệ', NULL, NULL, 'page', 'App\\Models\\Page', 4, '_self', NULL, 3, 1, 'header', '2026-02-01 01:15:12', '2026-02-01 01:15:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_26_000001_create_categories_table', 1),
(5, '2024_01_26_000002_create_products_table', 1),
(6, '2024_01_26_000003_create_product_specs_table', 1),
(7, '2024_01_26_000004_create_services_table', 1),
(8, '2024_01_26_000005_create_posts_table', 1),
(9, '2024_01_26_000006_create_pages_table', 1),
(10, '2024_01_26_000007_create_sliders_table', 1),
(11, '2024_01_26_000008_create_menus_table', 1),
(12, '2024_01_26_000009_create_partners_table', 1),
(13, '2024_01_26_000010_create_settings_table', 1),
(14, '2024_01_26_000011_create_media_table', 1),
(15, '2024_01_26_000012_create_product_images_table', 1),
(16, '2024_01_26_000013_create_contact_inquiries_table', 1),
(17, '2024_01_26_000014_create_newsletter_subscribers_table', 1),
(18, '2024_01_26_000015_add_admin_fields_to_users_table', 1),
(19, '2024_01_26_100001_add_linkable_to_menus_table', 2),
(20, '2024_01_27_000001_add_image_to_pages_table', 3),
(21, '2026_01_27_083658_create_social_posts_table', 4),
(22, '2024_01_27_000002_update_contact_inquiries_table', 5),
(23, '2026_02_01_000001_create_sites_table', 6),
(24, '2026_02_01_000002_add_site_id_to_tables', 6),
(25, '2026_02_01_000003_update_settings_unique_constraint', 7),
(26, '2026_02_01_084128_make_message_nullable_in_contact_inquiries_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `site_id`, `title`, `slug`, `content`, `image`, `meta_title`, `meta_description`, `template`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Về chúng tôi', 'about', '<div class=\"space-y-8\">\n                    <div class=\"flex gap-6\">\n                        <div class=\"shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md\">\n                            <span class=\"material-symbols-outlined text-primary\">verified</span>\n                        </div>\n                        <div>\n                            <h4 class=\"font-bold text-xl mb-1\">Chuyên môn kỹ thuật vượt trội</h4>\n                            <p class=\"text-slate-600\">Các kỹ sư của chúng tôi được đào tạo chính quy với hơn 10 năm kinh nghiệm trong hệ thống năng lượng và thiết bị công nghiệp.</p>\n                        </div>\n                    </div>\n                    <div class=\"flex gap-6\">\n                        <div class=\"shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md\">\n                            <span class=\"material-symbols-outlined text-primary\">support_agent</span>\n                        </div>\n                        <div>\n                            <h4 class=\"font-bold text-xl mb-1\">Hỗ trợ 24/7</h4>\n                            <p class=\"text-slate-600\">Hạ tầng quan trọng không bao giờ nghỉ. Chúng tôi cũng vậy. Đội ngũ hỗ trợ luôn sẵn sàng phục vụ bạn mọi lúc.</p>\n                        </div>\n                    </div>\n                    <div class=\"flex gap-6\">\n                        <div class=\"shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md\">\n                            <span class=\"material-symbols-outlined text-primary\">high_quality</span>\n                        </div>\n                        <div>\n                            <h4 class=\"font-bold text-xl mb-1\">Đảm bảo chất lượng cao cấp</h4>\n                            <p class=\"text-slate-600\">Mọi sản phẩm và dịch vụ đều đáp ứng các tiêu chuẩn an toàn và chất lượng quốc tế khắt khe nhất.</p>\n                        </div>\n                    </div>\n                </div>', NULL, NULL, NULL, 'about', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(2, NULL, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', '<h2>Chính sách bảo hành sản phẩm</h2>\n                <p>NMT AUTO cam kết bảo hành chính hãng cho tất cả sản phẩm được mua trực tiếp từ công ty.</p>\n                <h3>Thời gian bảo hành</h3>\n                <ul>\n                    <li>Pin lithium xe nâng: 3 năm</li>\n                    <li>Hệ thống lưu trữ năng lượng: 10 năm</li>\n                    <li>Camera AI: 2 năm</li>\n                </ul>\n                <h3>Điều kiện bảo hành</h3>\n                <ul>\n                    <li>Sản phẩm còn trong thời hạn bảo hành</li>\n                    <li>Có phiếu bảo hành và hóa đơn mua hàng</li>\n                    <li>Sản phẩm bị lỗi do nhà sản xuất</li>\n                </ul>\n                <h3>Không bảo hành</h3>\n                <ul>\n                    <li>Hư hỏng do sử dụng sai cách</li>\n                    <li>Sản phẩm đã qua sửa chữa bên ngoài</li>\n                    <li>Hư hỏng do thiên tai, cháy nổ</li>\n                </ul>', NULL, NULL, NULL, 'default', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(3, NULL, 'Chính sách đổi trả', 'chinh-sach-doi-tra', '<h2>Chính sách đổi trả hàng</h2>\n                <p>Quý khách có thể đổi trả sản phẩm trong vòng 7 ngày kể từ ngày nhận hàng.</p>\n                <h3>Điều kiện đổi trả</h3>\n                <ul>\n                    <li>Sản phẩm còn nguyên vẹn, chưa qua sử dụng</li>\n                    <li>Còn đầy đủ bao bì, phụ kiện đi kèm</li>\n                    <li>Có hóa đơn mua hàng</li>\n                </ul>\n                <h3>Quy trình đổi trả</h3>\n                <ol>\n                    <li>Liên hệ hotline: 1900 1234</li>\n                    <li>Cung cấp thông tin đơn hàng và lý do đổi trả</li>\n                    <li>Gửi sản phẩm về địa chỉ công ty</li>\n                    <li>Nhận sản phẩm mới hoặc hoàn tiền trong 3-5 ngày</li>\n                </ol>', NULL, NULL, NULL, 'default', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(4, NULL, 'Liên hệ', 'lien-he', '<p>Hãy liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất.</p>', NULL, NULL, NULL, 'contact', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partners`
--

INSERT INTO `partners` (`id`, `site_id`, `name`, `logo`, `url`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Toyota Material Handling', '', 'https://toyota-forklifts.com.vn', 1, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL),
(2, NULL, 'CATL Battery', '', 'https://www.catl.com', 2, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL),
(3, NULL, 'BYD Forklift', '', 'https://www.byd.com', 3, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL),
(4, NULL, 'Longi Solar', '', 'https://www.longi.com', 4, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL),
(5, NULL, 'Huawei Solar', '', 'https://solar.huawei.com', 5, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL),
(6, NULL, 'Hikvision', '', 'https://www.hikvision.com', 6, 1, '2026-01-27 14:05:23', '2026-01-27 14:05:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('news','project','success_story') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `site_id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `image`, `type`, `is_featured`, `published_at`, `is_active`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 7, 1, 'NMT AUTO triển khai dự án chuyển đổi pin lithium cho kho logistics lớn', 'nmt-auto-trien-khai-du-an-chuyen-doi-pin-lithium-cho-kho-logistics-lon', 'Dự án chuyển đổi 50 xe nâng từ pin axit sang pin lithium tại kho logistics ABC đã hoàn thành thành công, giúp tiết kiệm 40% chi phí năng lượng.', '<p>Vừa qua, NMT AUTO đã hoàn thành thành công dự án chuyển đổi hệ thống pin cho 50 xe nâng tại kho logistics ABC, một trong những trung tâm logistics lớn nhất miền Nam.</p>\n                <h3>Thách thức</h3>\n                <p>Khách hàng đang sử dụng pin axit-chì truyền thống với nhiều hạn chế:</p>\n                <ul>\n                    <li>Thời gian sạc kéo dài 8-10 tiếng</li>\n                    <li>Chi phí bảo trì cao</li>\n                    <li>Phải thay pin giữa ca làm việc</li>\n                </ul>\n                <h3>Giải pháp</h3>\n                <p>NMT AUTO đã triển khai giải pháp pin lithium LFP với các ưu điểm:</p>\n                <ul>\n                    <li>Sạc nhanh chỉ 2-3 tiếng</li>\n                    <li>Không cần bảo trì</li>\n                    <li>Tuổi thọ gấp 3 lần pin axit</li>\n                </ul>\n                <h3>Kết quả</h3>\n                <p>Sau 6 tháng vận hành, khách hàng đã tiết kiệm được 40% chi phí năng lượng và tăng 25% năng suất vận hành.</p>', NULL, 'project', 1, '2026-01-22 00:32:52', 1, NULL, NULL, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(2, NULL, 6, 1, 'Xu hướng sử dụng pin lithium trong ngành logistics năm 2024', 'xu-huong-su-dung-pin-lithium-trong-nganh-logistics-nam-2024', 'Pin lithium đang trở thành xu hướng tất yếu trong ngành logistics với nhiều ưu điểm vượt trội so với pin truyền thống.', '<p>Trong những năm gần đây, ngành logistics Việt Nam đang chứng kiến sự chuyển đổi mạnh mẽ từ pin axit-chì truyền thống sang pin lithium cho các thiết bị xử lý vật liệu.</p>\n                <h3>Tại sao pin lithium?</h3>\n                <p>Pin lithium mang lại nhiều lợi ích quan trọng:</p>\n                <ul>\n                    <li><strong>Hiệu suất cao:</strong> Hiệu suất năng lượng đạt trên 95%</li>\n                    <li><strong>Sạc nhanh:</strong> Chỉ cần 1-3 tiếng để sạc đầy</li>\n                    <li><strong>Tuổi thọ dài:</strong> 3000+ chu kỳ sạc, gấp 3-4 lần pin axit</li>\n                    <li><strong>Không bảo trì:</strong> Không cần bổ sung nước, không khí thải độc hại</li>\n                </ul>\n                <h3>Triển vọng tương lai</h3>\n                <p>Dự báo đến năm 2025, 60% xe nâng tại các kho logistics lớn sẽ sử dụng pin lithium.</p>', NULL, 'news', 1, '2026-01-17 00:32:52', 1, NULL, NULL, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(3, NULL, 6, 1, 'Hướng dẫn bảo dưỡng xe nâng điện đúng cách', 'huong-dan-bao-duong-xe-nang-dien-dung-cach', 'Bảo dưỡng định kỳ xe nâng điện giúp kéo dài tuổi thọ thiết bị và đảm bảo an toàn vận hành.', '<p>Xe nâng điện là thiết bị quan trọng trong kho bãi, việc bảo dưỡng đúng cách sẽ giúp thiết bị hoạt động ổn định và bền bỉ.</p>\n                <h3>Lịch bảo dưỡng định kỳ</h3>\n                <ul>\n                    <li><strong>Hàng ngày:</strong> Kiểm tra mức nạp pin, vệ sinh xe</li>\n                    <li><strong>Hàng tuần:</strong> Kiểm tra lốp, phanh, hệ thống thủy lực</li>\n                    <li><strong>Hàng tháng:</strong> Kiểm tra tổng thể, bôi trơn các bộ phận</li>\n                    <li><strong>6 tháng:</strong> Bảo dưỡng lớn, thay dầu thủy lực</li>\n                </ul>\n                <h3>Lưu ý quan trọng</h3>\n                <p>Luôn sử dụng phụ tùng chính hãng và tuân thủ hướng dẫn của nhà sản xuất.</p>', NULL, 'news', 0, '2026-01-12 00:32:52', 1, NULL, NULL, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(4, NULL, 7, 1, 'Dự án lắp đặt hệ thống năng lượng mặt trời 500kWp cho nhà máy sản xuất', 'du-an-lap-dat-he-thong-nang-luong-mat-troi-500kwp-cho-nha-may-san-xuat', 'NMT AUTO hoàn thành lắp đặt hệ thống điện mặt trời áp mái 500kWp, giúp nhà máy tiết kiệm 30% chi phí điện.', '<p>NMT AUTO vừa hoàn thành dự án lắp đặt hệ thống điện mặt trời áp mái công suất 500kWp cho nhà máy sản xuất XYZ tại Bình Dương.</p>\n                <h3>Thông số dự án</h3>\n                <ul>\n                    <li>Công suất: 500kWp</li>\n                    <li>Diện tích: 3,500m² mái nhà</li>\n                    <li>Số tấm pin: 1,000 tấm Longi 500W</li>\n                    <li>Inverter: Huawei SUN2000</li>\n                </ul>\n                <h3>Hiệu quả đạt được</h3>\n                <p>Sau khi vận hành, hệ thống sản xuất trung bình 2,000 kWh/ngày, giúp nhà máy tiết kiệm khoảng 1.5 tỷ đồng tiền điện mỗi năm.</p>', NULL, 'project', 1, '2026-01-24 00:32:52', 1, NULL, NULL, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(5, NULL, 7, 1, 'NMT AUTO triển khai dự án chuyển đổi pin lithium cho kho logistics lớn', 'nmt-auto-trien-khai-du-an-chuyen-doi-pin-lithium-cho-kho-logistics-lon-2', 'Dự án chuyển đổi 50 xe nâng từ pin axit sang pin lithium tại kho logistics ABC đã hoàn thành thành công, giúp tiết kiệm 40% chi phí năng lượng.', '<p>Vừa qua, NMT AUTO đã hoàn thành thành công dự án chuyển đổi hệ thống pin cho 50 xe nâng tại kho logistics ABC, một trong những trung tâm logistics lớn nhất miền Nam.</p>\n                <h3>Thách thức</h3>\n                <p>Khách hàng đang sử dụng pin axit-chì truyền thống với nhiều hạn chế:</p>\n                <ul>\n                    <li>Thời gian sạc kéo dài 8-10 tiếng</li>\n                    <li>Chi phí bảo trì cao</li>\n                    <li>Phải thay pin giữa ca làm việc</li>\n                </ul>\n                <h3>Giải pháp</h3>\n                <p>NMT AUTO đã triển khai giải pháp pin lithium LFP với các ưu điểm:</p>\n                <ul>\n                    <li>Sạc nhanh chỉ 2-3 tiếng</li>\n                    <li>Không cần bảo trì</li>\n                    <li>Tuổi thọ gấp 3 lần pin axit</li>\n                </ul>\n                <h3>Kết quả</h3>\n                <p>Sau 6 tháng vận hành, khách hàng đã tiết kiệm được 40% chi phí năng lượng và tăng 25% năng suất vận hành.</p>', NULL, 'project', 1, '2026-01-22 00:33:13', 1, NULL, NULL, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(6, NULL, 6, 1, 'Xu hướng sử dụng pin lithium trong ngành logistics năm 2024', 'xu-huong-su-dung-pin-lithium-trong-nganh-logistics-nam-2024-2', 'Pin lithium đang trở thành xu hướng tất yếu trong ngành logistics với nhiều ưu điểm vượt trội so với pin truyền thống.', '<p>Trong những năm gần đây, ngành logistics Việt Nam đang chứng kiến sự chuyển đổi mạnh mẽ từ pin axit-chì truyền thống sang pin lithium cho các thiết bị xử lý vật liệu.</p>\n                <h3>Tại sao pin lithium?</h3>\n                <p>Pin lithium mang lại nhiều lợi ích quan trọng:</p>\n                <ul>\n                    <li><strong>Hiệu suất cao:</strong> Hiệu suất năng lượng đạt trên 95%</li>\n                    <li><strong>Sạc nhanh:</strong> Chỉ cần 1-3 tiếng để sạc đầy</li>\n                    <li><strong>Tuổi thọ dài:</strong> 3000+ chu kỳ sạc, gấp 3-4 lần pin axit</li>\n                    <li><strong>Không bảo trì:</strong> Không cần bổ sung nước, không khí thải độc hại</li>\n                </ul>\n                <h3>Triển vọng tương lai</h3>\n                <p>Dự báo đến năm 2025, 60% xe nâng tại các kho logistics lớn sẽ sử dụng pin lithium.</p>', NULL, 'news', 1, '2026-01-17 00:33:13', 1, NULL, NULL, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(7, NULL, 6, 1, 'Hướng dẫn bảo dưỡng xe nâng điện đúng cách', 'huong-dan-bao-duong-xe-nang-dien-dung-cach-2', 'Bảo dưỡng định kỳ xe nâng điện giúp kéo dài tuổi thọ thiết bị và đảm bảo an toàn vận hành.', '<p>Xe nâng điện là thiết bị quan trọng trong kho bãi, việc bảo dưỡng đúng cách sẽ giúp thiết bị hoạt động ổn định và bền bỉ.</p>\n                <h3>Lịch bảo dưỡng định kỳ</h3>\n                <ul>\n                    <li><strong>Hàng ngày:</strong> Kiểm tra mức nạp pin, vệ sinh xe</li>\n                    <li><strong>Hàng tuần:</strong> Kiểm tra lốp, phanh, hệ thống thủy lực</li>\n                    <li><strong>Hàng tháng:</strong> Kiểm tra tổng thể, bôi trơn các bộ phận</li>\n                    <li><strong>6 tháng:</strong> Bảo dưỡng lớn, thay dầu thủy lực</li>\n                </ul>\n                <h3>Lưu ý quan trọng</h3>\n                <p>Luôn sử dụng phụ tùng chính hãng và tuân thủ hướng dẫn của nhà sản xuất.</p>', NULL, 'news', 0, '2026-01-12 00:33:13', 1, NULL, NULL, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(8, NULL, 7, 1, 'Dự án lắp đặt hệ thống năng lượng mặt trời 500kWp cho nhà máy sản xuất', 'du-an-lap-dat-he-thong-nang-luong-mat-troi-500kwp-cho-nha-may-san-xuat-2', 'NMT AUTO hoàn thành lắp đặt hệ thống điện mặt trời áp mái 500kWp, giúp nhà máy tiết kiệm 30% chi phí điện.', '<p>NMT AUTO vừa hoàn thành dự án lắp đặt hệ thống điện mặt trời áp mái công suất 500kWp cho nhà máy sản xuất XYZ tại Bình Dương.</p>\n                <h3>Thông số dự án</h3>\n                <ul>\n                    <li>Công suất: 500kWp</li>\n                    <li>Diện tích: 3,500m² mái nhà</li>\n                    <li>Số tấm pin: 1,000 tấm Longi 500W</li>\n                    <li>Inverter: Huawei SUN2000</li>\n                </ul>\n                <h3>Hiệu quả đạt được</h3>\n                <p>Sau khi vận hành, hệ thống sản xuất trung bình 2,000 kWh/ngày, giúp nhà máy tiết kiệm khoảng 1.5 tỷ đồng tiền điện mỗi năm.</p>', NULL, 'project', 1, '2026-01-24 00:33:13', 1, NULL, NULL, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(9, 2, 22, 1, 'AI Chatbot cho Bệnh viện/Phòng khám', 'ai-chatbot-healthcare', 'Hệ thống AI chatbot tư vấn sức khỏe tự động, giúp giảm tải công việc tư vấn ban đầu cho bệnh viện và phòng khám.', '<h2>AI Chatbot cho Bệnh viện/Phòng khám</h2>\n\n<p>Hệ thống AI chatbot tư vấn sức khỏe tự động, giúp giảm tải công việc tư vấn ban đầu cho đội ngũ y tế.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel - Backend framework</li>\n    <li>Python (Flask) - AI/ML services</li>\n    <li>LangChain/LangGraph - AI Agent orchestration</li>\n    <li>MySQL - Database</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Tư vấn triệu chứng tự động 24/7</li>\n    <li>Đặt lịch khám online</li>\n    <li>Tra cứu thông tin bác sĩ</li>\n    <li>FAQ automation</li>\n    <li>Chuyển tiếp đến nhân viên khi cần</li>\n</ul>\n\n<h3>Kết quả đạt được</h3>\n<ul>\n    <li>Xử lý <strong>80%</strong> câu hỏi cơ bản tự động</li>\n    <li>Giảm <strong>60%</strong> workload cho lễ tân</li>\n    <li>Phản hồi khách hàng <strong>24/7</strong></li>\n</ul>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(10, 2, 23, 1, 'Hệ thống Quản lý Kho & Bán hàng Đa kênh', 'ecommerce-multichannel', 'Hệ thống tích hợp quản lý kho, đơn hàng từ nhiều kênh: Shopee, Lazada, TikTok Shop, Website.', '<h2>Hệ thống Quản lý Kho & Bán hàng Đa kênh</h2>\n\n<p>Hệ thống tích hợp quản lý kho, đơn hàng từ nhiều kênh bán hàng phổ biến tại Việt Nam.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel - Backend framework</li>\n    <li>MySQL - Database</li>\n    <li>Redis - Caching & Queue</li>\n    <li>Integration APIs - Shopee, Lazada, TikTok Shop</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Đồng bộ inventory real-time từ tất cả kênh</li>\n    <li>Quản lý đơn hàng tập trung</li>\n    <li>Báo cáo doanh thu theo kênh</li>\n    <li>Quản lý kho thông minh</li>\n    <li>Cảnh báo hết hàng tự động</li>\n</ul>\n\n<h3>Kết quả đạt được</h3>\n<ul>\n    <li>Giảm <strong>70%</strong> thời gian đối chiếu đơn hàng</li>\n    <li>Tăng hiệu quả quản lý kho</li>\n    <li>Không còn tình trạng overselling</li>\n</ul>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(11, 2, 24, 1, 'Worklog Management System', 'worklog-management-system', 'Hệ thống quản lý công số, timesheet cho công ty outsourcing với tích hợp SAML SSO.', '<h2>Worklog Management System</h2>\n\n<p>Hệ thống quản lý công số, timesheet dành cho công ty outsourcing với khả năng mở rộng cao.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>Node.js (NestJS) - Backend framework</li>\n    <li>Next.js - Frontend framework</li>\n    <li>GraphQL - API layer</li>\n    <li>PostgreSQL - Database</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Time tracking theo project/task</li>\n    <li>Project allocation management</li>\n    <li>Reporting & Analytics</li>\n    <li>SAML SSO integration với Google Workspace</li>\n    <li>Export báo cáo Excel/PDF</li>\n</ul>\n\n<h3>Kết quả đạt được</h3>\n<ul>\n    <li>Tự động hóa quy trình quản lý công</li>\n    <li>Tích hợp SSO với Google Workspace</li>\n    <li>Báo cáo real-time cho management</li>\n</ul>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(12, 2, 25, 1, 'Salebot.io.vn - AI Chatbot Platform', 'salebot-ai-platform', 'Platform cung cấp giải pháp chatbot thông minh giúp doanh nghiệp tự động hóa customer service và sales.', '<h2>Salebot.io.vn - AI Chatbot Platform</h2>\n\n<p>Platform SaaS cung cấp giải pháp chatbot thông minh giúp doanh nghiệp Việt Nam tự động hóa customer service và sales.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel - Core platform</li>\n    <li>Python (Flask) - AI services</li>\n    <li>Node.js - Real-time messaging</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Chatbot builder kéo thả trực quan</li>\n    <li>Tích hợp Facebook Messenger</li>\n    <li>Tích hợp Zalo OA</li>\n    <li>Widget chat cho website</li>\n    <li>AI-powered responses</li>\n    <li>Analytics & Reporting</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://salebot.io.vn/\" target=\"_blank\">https://salebot.io.vn/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(13, 2, 26, 1, 'Trung tâm Tiếng Nhật Bảo Tín', 'nhatngubaotin-education', 'Tư vấn & triển khai đồng bộ website trung tâm và hệ thống thi thử tiếng Nhật online.', '<h2>Giải pháp Tổng thể cho Trung tâm Tiếng Nhật Bảo Tín</h2>\n\n<p>Tư vấn & triển khai đồng bộ nhiều hệ thống cho trung tâm đào tạo tiếng Nhật.</p>\n\n<h3>Website Trung tâm</h3>\n<p><a href=\"https://nhatngubaotin.vn/\" target=\"_blank\">https://nhatngubaotin.vn/</a></p>\n<ul>\n    <li>Giới thiệu khóa học</li>\n    <li>Đăng ký khóa học online</li>\n    <li>Thanh toán trực tuyến</li>\n    <li>Quản lý học viên</li>\n</ul>\n\n<h3>Hệ thống Thi thử Tiếng Nhật</h3>\n<p><a href=\"http://thitiengnhat.com/\" target=\"_blank\">http://thitiengnhat.com/</a></p>\n<ul>\n    <li>Platform thi thử online</li>\n    <li>Tạo đề thi tự động</li>\n    <li>Chấm điểm tự động</li>\n    <li>Theo dõi tiến độ học tập</li>\n</ul>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(14, 2, 27, 1, 'Silkroad B2B Solutions', 'silkroad-b2b-solutions', 'Triển khai hạ tầng Azure, tích hợp Chatbot AI trên Zalo OA và phát triển API integration.', '<h2>Silkroad B2B Solutions</h2>\n\n<p>Triển khai đồng bộ nhiều dịch vụ công nghệ cho doanh nghiệp B2B.</p>\n\n<h3>Dịch vụ đã triển khai</h3>\n<ul>\n    <li>Triển khai hạ tầng Azure cho môi trường production</li>\n    <li>Tích hợp Chatbot AI trả lời tự động trên Zalo OA</li>\n    <li>Phát triển API integration cho các hệ thống liên kết</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://silkroad.hekate.ai/\" target=\"_blank\">https://silkroad.hekate.ai/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(15, 2, 28, 1, 'Đại Phát Hoàng Hà - VLXD', 'daiphathoangha-vlxd', 'Website thương mại điện tử ngành vật liệu xây dựng với catalog sản phẩm và giỏ hàng.', '<h2>Đại Phát Hoàng Hà - Vật liệu Xây dựng</h2>\n\n<p>Website thương mại điện tử chuyên ngành vật liệu xây dựng.</p>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Catalog sản phẩm đa dạng</li>\n    <li>Giỏ hàng & thanh toán online</li>\n    <li>Quản lý đơn hàng</li>\n    <li>Báo giá tự động</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://daiphathoangha.vn/\" target=\"_blank\">https://daiphathoangha.vn/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(16, 2, 29, 1, 'Bia Hơi Hà Nội 183', 'biahoihanoi183-fnb', 'Website giới thiệu nhà hàng với kế hoạch triển khai POS system, Kitchen Display, QR ordering.', '<h2>Bia Hơi Hà Nội 183</h2>\n\n<p>Website giới thiệu nhà hàng với kế hoạch phát triển hệ thống quản lý toàn diện.</p>\n\n<h3>Đã triển khai</h3>\n<ul>\n    <li>Website giới thiệu nhà hàng</li>\n    <li>Menu online</li>\n    <li>Thông tin liên hệ & đặt bàn</li>\n</ul>\n\n<h3>Kế hoạch Q1/2026</h3>\n<ul>\n    <li>POS system</li>\n    <li>Kitchen Display System</li>\n    <li>QR ordering</li>\n    <li>Table management</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://biahoihanoi183.net/\" target=\"_blank\">https://biahoihanoi183.net/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:49', 1, NULL, NULL, '2026-02-01 01:19:49', '2026-02-01 01:19:49', NULL),
(17, 2, 30, 1, 'Vận tải Thanh Sang & Chuyển nhà Tâm An', 'transport-logistics', 'Bộ đôi website dịch vụ vận tải và chuyển nhà với tính năng báo giá online, đặt lịch tự động.', '<h2>Website Dịch vụ Vận tải & Chuyển nhà</h2>\n\n<p>Bộ đôi website cho ngành dịch vụ vận tải và chuyển nhà.</p>\n\n<h3>Vận tải Thanh Sang</h3>\n<p><a href=\"https://vantaithanhsang.com/\" target=\"_blank\">https://vantaithanhsang.com/</a></p>\n<ul>\n    <li>Giới thiệu dịch vụ vận tải</li>\n    <li>Báo giá online</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Chuyển nhà Tâm An</h3>\n<p><a href=\"https://chuyennhataman.net/\" target=\"_blank\">https://chuyennhataman.net/</a></p>\n<ul>\n    <li>Dịch vụ chuyển nhà trọn gói</li>\n    <li>Tính phí tự động</li>\n    <li>Đặt lịch online</li>\n</ul>', NULL, 'project', 1, '2026-02-01 01:19:50', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:19:50', NULL),
(18, 2, 28, 1, 'Phuan Home - Mái hiên di động', 'phuanhome-awning', 'Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp với gallery sản phẩm.', '<h2>Phuan Home - Mái hiên Di động</h2>\n\n<p>Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Gallery sản phẩm</li>\n    <li>Báo giá theo kích thước</li>\n    <li>Form liên hệ</li>\n    <li>Quản lý đơn hàng</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://phuanhome.net/\" target=\"_blank\">https://phuanhome.net/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:50', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:19:50', NULL),
(19, 2, 28, 1, 'Triệu Gia - Thiết kế Nội thất', 'trieugia-interior', 'Website showcase dự án nội thất đã thực hiện với portfolio công trình và gallery ảnh.', '<h2>Triệu Gia - Thiết kế Nội thất</h2>\n\n<p>Website showcase dự án nội thất đã thực hiện.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Portfolio công trình</li>\n    <li>Gallery ảnh dự án</li>\n    <li>Tư vấn thiết kế online</li>\n    <li>Báo giá theo yêu cầu</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://trieugia.vn/\" target=\"_blank\">https://trieugia.vn/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:50', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:19:50', NULL),
(20, 2, 28, 1, 'KT Home - Kiến trúc Xây dựng', 'kthome-architecture', 'Website công ty kiến trúc xây dựng với showcase dự án và dịch vụ thiết kế kiến trúc.', '<h2>KT Home - Kiến trúc Xây dựng</h2>\n\n<p>Website công ty kiến trúc xây dựng.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>PHP Laravel</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Showcase dự án</li>\n    <li>Dịch vụ thiết kế kiến trúc</li>\n    <li>Tư vấn xây dựng</li>\n    <li>Portfolio công trình</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"http://kthome.vn/\" target=\"_blank\">http://kthome.vn/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:50', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:19:50', NULL),
(21, 2, 22, 1, 'Chỉnh Hình Việt Đức', 'chinhhinhvietduc-medical', 'Website y tế chuyên về chân tay giả và các sản phẩm chỉnh hình với đặt lịch tư vấn online.', '<h2>Chỉnh Hình Việt Đức</h2>\n\n<p>Website y tế chuyên về chân tay giả và các sản phẩm chỉnh hình.</p>\n\n<h3>Công nghệ sử dụng</h3>\n<ul>\n    <li>WordPress</li>\n    <li>PHP</li>\n    <li>MySQL</li>\n</ul>\n\n<h3>Tính năng chính</h3>\n<ul>\n    <li>Content management</li>\n    <li>Product catalog</li>\n    <li>Đặt lịch tư vấn online</li>\n    <li>Thông tin sản phẩm chi tiết</li>\n</ul>\n\n<h3>Website</h3>\n<p><a href=\"https://chinhhinhvietduc.com/\" target=\"_blank\">https://chinhhinhvietduc.com/</a></p>', NULL, 'project', 1, '2026-02-01 01:19:50', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:19:50', NULL),
(22, 2, 31, 1, 'API Services & Công cụ Nội bộ', 'api-services-tools', 'Nhiều API services cho data processing và system integration, công cụ automation nội bộ.', '<h2>API Services &amp; C&ocirc;ng cụ Nội bộ</h2>\r\n<p>Nhiều API services v&agrave; c&ocirc;ng cụ automation được ph&aacute;t triển cho c&aacute;c dự &aacute;n v&agrave; đối t&aacute;c.</p>\r\n<h3>C&ocirc;ng nghệ sử dụng</h3>\r\n<ul>\r\n<li>PHP - REST API</li>\r\n<li>Python - Data processing</li>\r\n<li>Node.js - Real-time services</li>\r\n</ul>\r\n<h3>Dịch vụ</h3>\r\n<ul>\r\n<li>Data processing APIs</li>\r\n<li>System integration services</li>\r\n<li>Workflow automation tools</li>\r\n<li>Deployment &amp; operations tools</li>\r\n</ul>\r\n<h3>Ứng dụng</h3>\r\n<ul>\r\n<li>C&ocirc;ng cụ automation nội bộ</li>\r\n<li>Tools hỗ trợ triển khai dự &aacute;n</li>\r\n<li>Integration với c&aacute;c hệ thống b&ecirc;n thứ ba</li>\r\n</ul>', NULL, 'project', 0, '2026-02-01 01:19:00', 1, NULL, NULL, '2026-02-01 01:19:50', '2026-02-01 01:28:56', NULL),
(23, 2, 32, NULL, 'AI trong thiết kế Web: Xu hướng 2026 và tương lai', 'ai-trong-thiet-ke-web-xu-huong-2026-va-tuong-lai', 'Khám phá cách trí tuệ nhân tạo đang cách mạng hóa ngành thiết kế web, từ tự động hóa layout đến cá nhân hóa trải nghiệm người dùng.', '<h2>AI đang thay đổi cách chúng ta thiết kế website</h2>\n<p>Năm 2026 đánh dấu bước ngoặt quan trọng trong ngành thiết kế web khi AI trở thành công cụ không thể thiếu. Từ việc tự động sinh layout đến tối ưu hóa UX, AI đang giúp các designer làm việc hiệu quả hơn bao giờ hết.</p>\n\n<h3>1. Tự động hóa thiết kế layout</h3>\n<p>AI có thể phân tích hàng triệu website thành công để đề xuất cấu trúc layout tối ưu cho từng ngành nghề cụ thể. Điều này giúp rút ngắn thời gian thiết kế từ vài tuần xuống còn vài ngày.</p>\n\n<h3>2. Cá nhân hóa trải nghiệm người dùng</h3>\n<p>Với machine learning, website có thể tự điều chỉnh nội dung và giao diện dựa trên hành vi của từng người dùng, tạo ra trải nghiệm độc đáo cho mỗi khách truy cập.</p>\n\n<h3>3. Tối ưu hóa SEO thông minh</h3>\n<p>AI giúp phân tích và đề xuất cải thiện SEO một cách tự động, từ cấu trúc heading đến meta description, đảm bảo website luôn đạt thứ hạng cao trên công cụ tìm kiếm.</p>\n\n<blockquote>\n\"AI không thay thế designer, mà giúp họ làm việc thông minh hơn\" - CEO AMD AI Solutions\n</blockquote>\n\n<h3>Kết luận</h3>\n<p>Việc áp dụng AI trong thiết kế web không còn là lựa chọn mà là điều bắt buộc để cạnh tranh trong thị trường số hóa ngày nay.</p>', NULL, 'news', 1, '2026-02-01 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(24, 2, 33, NULL, '5 yếu tố quan trọng nhất của một website chuyển đổi cao', '5-yeu-to-quan-trong-nhat-cua-mot-website-chuyen-doi-cao', 'Tìm hiểu những yếu tố thiết kế và UX giúp tăng tỷ lệ chuyển đổi khách truy cập thành khách hàng thực sự.', '<h2>Website của bạn có đang \"bán hàng\" hiệu quả?</h2>\n<p>Một website đẹp chưa chắc đã là website tốt. Website tốt phải có khả năng chuyển đổi khách truy cập thành khách hàng. Dưới đây là 5 yếu tố then chốt:</p>\n\n<h3>1. Thời gian tải trang nhanh</h3>\n<p>Theo nghiên cứu, 53% người dùng mobile sẽ rời website nếu tải quá 3 giây. Tối ưu tốc độ là ưu tiên số 1.</p>\n\n<h3>2. Call-to-Action rõ ràng</h3>\n<p>Nút CTA phải nổi bật, dễ thấy và truyền tải được giá trị. \"Nhận báo giá miễn phí\" hiệu quả hơn đơn giản là \"Gửi\".</p>\n\n<h3>3. Social Proof mạnh mẽ</h3>\n<p>Testimonials, reviews, case studies - những bằng chứng xã hội giúp xây dựng niềm tin với khách hàng mới.</p>\n\n<h3>4. Mobile-first Design</h3>\n<p>70% traffic hiện nay đến từ mobile. Website phải hoạt động hoàn hảo trên điện thoại.</p>\n\n<h3>5. Nội dung có giá trị</h3>\n<p>Content phải giải quyết vấn đề của khách hàng, không chỉ nói về bản thân doanh nghiệp.</p>', NULL, 'news', 1, '2026-01-29 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(25, 2, 34, NULL, 'Chiến lược Marketing số cho SME: Chi phí thấp, hiệu quả cao', 'chien-luoc-marketing-so-cho-sme-chi-phi-thap-hieu-qua-cao', 'Hướng dẫn xây dựng chiến lược marketing số phù hợp với ngân sách hạn chế của doanh nghiệp nhỏ và vừa.', '<h2>Marketing số không cần ngân sách khủng</h2>\n<p>Nhiều SME nghĩ rằng marketing số đòi hỏi ngân sách lớn. Thực tế, với chiến lược đúng đắn, bạn có thể đạt kết quả ấn tượng với chi phí tối thiểu.</p>\n\n<h3>SEO - Đầu tư dài hạn hiệu quả</h3>\n<p>Tối ưu SEO cho website giúp bạn có traffic miễn phí từ Google. Chi phí ban đầu cho SEO sẽ mang lại lợi ích lâu dài.</p>\n\n<h3>Content Marketing</h3>\n<p>Tạo nội dung giá trị thu hút khách hàng tự nhiên. Blog, video, infographic - hãy chọn định dạng phù hợp với audience của bạn.</p>\n\n<h3>Social Media có chiến lược</h3>\n<p>Đừng có mặt trên mọi nền tảng. Hãy tập trung vào 1-2 kênh nơi khách hàng của bạn thực sự hoạt động.</p>\n\n<h3>Email Marketing</h3>\n<p>Với ROI trung bình 4200%, email marketing vẫn là kênh hiệu quả nhất cho SME.</p>', NULL, 'news', 1, '2026-01-26 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(26, 2, 35, NULL, 'Case Study: Tăng 300% leads cho công ty xây dựng với website mới', 'case-study-tang-300-leads-cho-cong-ty-xay-dung-voi-website-moi', 'Phân tích chi tiết cách AMD AI Solutions giúp một công ty xây dựng tăng trưởng leads gấp 3 lần sau khi redesign website.', '<h2>Bối cảnh</h2>\n<p>Công ty Xây dựng Đại Phát đến với AMD với vấn đề: website cũ không tạo ra leads, hầu hết khách hàng đến từ giới thiệu truyền miệng.</p>\n\n<h3>Thách thức</h3>\n<ul>\n<li>Website cũ không responsive, tải chậm</li>\n<li>Không có form liên hệ rõ ràng</li>\n<li>Nội dung nghèo nàn, không có portfolio dự án</li>\n<li>SEO gần như không tồn tại</li>\n</ul>\n\n<h3>Giải pháp AMD AI</h3>\n<ul>\n<li>Thiết kế lại hoàn toàn với AI-powered layout</li>\n<li>Tối ưu tốc độ (PageSpeed 95+)</li>\n<li>Xây dựng portfolio với 50+ dự án hoàn thành</li>\n<li>Tích hợp chatbot tư vấn 24/7</li>\n<li>SEO on-page cho 100+ từ khóa ngành xây dựng</li>\n</ul>\n\n<h3>Kết quả sau 3 tháng</h3>\n<ul>\n<li>Traffic tăng 450%</li>\n<li>Leads từ website tăng 300%</li>\n<li>Tỷ lệ chuyển đổi đạt 4.2%</li>\n<li>Doanh thu từ online chiếm 35% tổng doanh thu</li>\n</ul>', NULL, 'news', 0, '2026-01-23 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(27, 2, 36, NULL, 'Website 2026: Tối giản, tốc độ và trải nghiệm đa giác quan', 'website-2026-toi-gian-toc-do-va-trai-nghiem-da-giac-quan', 'Điểm qua những xu hướng thiết kế web nổi bật nhất năm 2026 mà mọi doanh nghiệp cần biết.', '<h2>Xu hướng thiết kế web 2026</h2>\n<p>Thế giới web design đang thay đổi nhanh chóng. Dưới đây là những xu hướng đang định hình năm 2026:</p>\n\n<h3>1. Neobrutalism</h3>\n<p>Thiết kế mạnh mẽ, bold với border dày và màu sắc tương phản cao đang trở lại như một làn sóng mới.</p>\n\n<h3>2. Dark Mode mặc định</h3>\n<p>Với sự phổ biến của OLED screens, dark mode không còn là option mà là mặc định cho nhiều website.</p>\n\n<h3>3. Micro-interactions AI-powered</h3>\n<p>Các hiệu ứng nhỏ được AI cá nhân hóa tạo trải nghiệm độc đáo cho mỗi người dùng.</p>\n\n<h3>4. 3D và Immersive Experience</h3>\n<p>WebGL và Three.js giúp tạo trải nghiệm 3D ngay trên browser mà không cần plugin.</p>\n\n<h3>5. Voice UI Integration</h3>\n<p>Với sự phổ biến của smart speakers, website bắt đầu tích hợp voice navigation.</p>\n\n<h3>6. Sustainable Web Design</h3>\n<p>Thiết kế tiết kiệm năng lượng, tối ưu carbon footprint của website.</p>', NULL, 'news', 0, '2026-01-20 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL),
(28, 2, 32, NULL, 'Chatbot AI: Công cụ bán hàng 24/7 cho doanh nghiệp nhỏ', 'chatbot-ai-cong-cu-ban-hang-247-cho-doanh-nghiep-nho', 'Hướng dẫn triển khai chatbot AI để tự động hóa chăm sóc khách hàng và tăng doanh số.', '<h2>Tại sao SME cần chatbot AI?</h2>\n<p>Với nguồn lực hạn chế, SME không thể có đội ngũ chăm sóc khách hàng 24/7. Chatbot AI là giải pháp hoàn hảo.</p>\n\n<h3>Lợi ích của Chatbot AI</h3>\n<ul>\n<li><strong>Hoạt động 24/7:</strong> Không bỏ lỡ bất kỳ khách hàng nào</li>\n<li><strong>Trả lời tức thì:</strong> Khách hàng không phải chờ đợi</li>\n<li><strong>Tiết kiệm chi phí:</strong> Giảm 70% chi phí support</li>\n<li><strong>Thu thập data:</strong> Hiểu khách hàng tốt hơn</li>\n</ul>\n\n<h3>Các bước triển khai</h3>\n<ol>\n<li>Xác định use cases chính (FAQ, đặt hàng, hỗ trợ)</li>\n<li>Xây dựng knowledge base</li>\n<li>Training chatbot với dữ liệu thực</li>\n<li>Tích hợp vào website và các kênh khác</li>\n<li>Liên tục cải thiện dựa trên feedback</li>\n</ol>\n\n<h3>AMD AI Chatbot Solution</h3>\n<p>AMD cung cấp giải pháp chatbot AI tích hợp sẵn cho mọi website, được training riêng cho từng ngành nghề.</p>', NULL, 'news', 0, '2026-01-17 01:35:00', 1, NULL, NULL, '2026-02-01 01:35:00', '2026-02-01 01:35:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `short_description`, `description`, `image`, `badge`, `price`, `sale_price`, `is_featured`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Pin Lithium LFP 48V 200Ah', 'pin-lithium-lfp-48v-200ah', 'Pin lithium sắt phosphate hiệu suất cao cho xe nâng', '<p>Pin Lithium LFP 48V 200Ah l&agrave; giải ph&aacute;p ho&agrave;n hảo cho xe n&acirc;ng điện với nhiều ưu điểm vượt trội:</p>\r\n<ul>\r\n<li>Tuổi thọ cao: 3000+ chu kỳ sạc</li>\r\n<li>An to&agrave;n tuyệt đối với c&ocirc;ng nghệ LFP</li>\r\n<li>Sạc nhanh trong 2-3 giờ</li>\r\n<li>Bảo h&agrave;nh 3 năm</li>\r\n</ul>', 'photos/1/603896D7-AE18-46D6-9707-CB7762300FD3.jpeg', 'Bán chạy', 45000000.00, NULL, 1, 1, 1, '2026-01-26 08:42:18', '2026-01-27 15:00:17', NULL),
(2, 1, 'Pin Lithium LFP 80V 300Ah', 'pin-lithium-lfp-80v-300ah', 'Pin lithium công suất lớn cho xe nâng hạng nặng', '<p>Pin Lithium LFP 80V 300Ah được thiết kế cho các xe nâng hạng nặng trong môi trường công nghiệp khắc nghiệt.</p>', NULL, 'Giảm giá', 85000000.00, 75000000.00, 1, 2, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(3, 1, 'Pin Lithium LFP 24V 100Ah', 'pin-lithium-lfp-24v-100ah', 'Pin lithium nhỏ gọn cho xe nâng tay điện', '<p>Dòng pin lithium nhỏ gọn phù hợp cho xe nâng tay điện và các thiết bị vận chuyển nhẹ.</p>', NULL, NULL, 18000000.00, NULL, 0, 3, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(4, 1, 'Pin Lithium LFP 48V 200Ah', 'pin-lithium-lfp-48v-200ah-2', 'Pin lithium sắt phosphate hiệu suất cao cho xe nâng', '<p>Pin Lithium LFP 48V 200Ah là giải pháp hoàn hảo cho xe nâng điện với nhiều ưu điểm vượt trội:</p>\n                <ul>\n                    <li>Tuổi thọ cao: 3000+ chu kỳ sạc</li>\n                    <li>An toàn tuyệt đối với công nghệ LFP</li>\n                    <li>Sạc nhanh trong 2-3 giờ</li>\n                    <li>Bảo hành 3 năm</li>\n                </ul>', NULL, 'Bán chạy', 45000000.00, NULL, 1, 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(5, 1, 'Pin Lithium LFP 80V 300Ah', 'pin-lithium-lfp-80v-300ah-2', 'Pin lithium công suất lớn cho xe nâng hạng nặng', '<p>Pin Lithium LFP 80V 300Ah được thiết kế cho các xe nâng hạng nặng trong môi trường công nghiệp khắc nghiệt.</p>', NULL, 'Giảm giá', 85000000.00, 75000000.00, 1, 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(6, 1, 'Pin Lithium LFP 24V 100Ah', 'pin-lithium-lfp-24v-100ah-2', 'Pin lithium nhỏ gọn cho xe nâng tay điện', '<p>Dòng pin lithium nhỏ gọn phù hợp cho xe nâng tay điện và các thiết bị vận chuyển nhẹ.</p>', NULL, NULL, 18000000.00, NULL, 1, 3, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(7, 2, 'Hệ thống lưu trữ 10kWh', 'he-thong-luu-tru-10kwh', 'Hệ thống lưu trữ năng lượng mặt trời gia đình', '<p>Hệ thống lưu trữ năng lượng mặt trời 10kWh phù hợp cho hộ gia đình và văn phòng nhỏ.</p>', NULL, 'Mới', 65000000.00, NULL, 1, 4, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(8, 2, 'Hệ thống lưu trữ 50kWh', 'he-thong-luu-tru-50kwh', 'Hệ thống lưu trữ năng lượng công nghiệp', '<p>Hệ thống lưu trữ năng lượng 50kWh cho nhà máy và doanh nghiệp lớn.</p>', NULL, NULL, 280000000.00, NULL, 1, 5, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(9, 3, 'Camera AI Nhận diện Khuôn mặt', 'camera-ai-nhan-dien-khuon-mat', 'Camera an ninh thông minh với AI nhận diện khuôn mặt', '<p>Camera tích hợp AI nhận diện khuôn mặt với độ chính xác cao, phù hợp cho văn phòng và nhà máy.</p>', NULL, 'Hot', 8500000.00, NULL, 1, 6, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(10, 1, 'Pin Lithium LFP 48V 200Ah', 'pin-lithium-lfp-48v-200ah-3', 'Pin lithium sắt phosphate hiệu suất cao cho xe nâng', '<p>Pin Lithium LFP 48V 200Ah là giải pháp hoàn hảo cho xe nâng điện với nhiều ưu điểm vượt trội:</p>\n                <ul>\n                    <li>Tuổi thọ cao: 3000+ chu kỳ sạc</li>\n                    <li>An toàn tuyệt đối với công nghệ LFP</li>\n                    <li>Sạc nhanh trong 2-3 giờ</li>\n                    <li>Bảo hành 3 năm</li>\n                </ul>', NULL, 'Bán chạy', 45000000.00, NULL, 1, 1, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(11, 1, 'Pin Lithium LFP 80V 300Ah', 'pin-lithium-lfp-80v-300ah-3', 'Pin lithium công suất lớn cho xe nâng hạng nặng', '<p>Pin Lithium LFP 80V 300Ah được thiết kế cho các xe nâng hạng nặng trong môi trường công nghiệp khắc nghiệt.</p>', NULL, 'Giảm giá', 85000000.00, 75000000.00, 1, 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(12, 1, 'Pin Lithium LFP 24V 100Ah', 'pin-lithium-lfp-24v-100ah-3', 'Pin lithium nhỏ gọn cho xe nâng tay điện', '<p>Dòng pin lithium nhỏ gọn phù hợp cho xe nâng tay điện và các thiết bị vận chuyển nhẹ.</p>', NULL, NULL, 18000000.00, NULL, 1, 3, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(13, 2, 'Hệ thống lưu trữ 10kWh', 'he-thong-luu-tru-10kwh-2', 'Hệ thống lưu trữ năng lượng mặt trời gia đình', '<p>Hệ thống lưu trữ năng lượng mặt trời 10kWh phù hợp cho hộ gia đình và văn phòng nhỏ.</p>', NULL, 'Mới', 65000000.00, NULL, 1, 4, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(14, 2, 'Hệ thống lưu trữ 50kWh', 'he-thong-luu-tru-50kwh-2', 'Hệ thống lưu trữ năng lượng công nghiệp', '<p>Hệ thống lưu trữ năng lượng 50kWh cho nhà máy và doanh nghiệp lớn.</p>', NULL, NULL, 280000000.00, NULL, 1, 5, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(15, 3, 'Camera AI Nhận diện Khuôn mặt', 'camera-ai-nhan-dien-khuon-mat-2', 'Camera an ninh thông minh với AI nhận diện khuôn mặt', '<p>Camera tích hợp AI nhận diện khuôn mặt với độ chính xác cao, phù hợp cho văn phòng và nhà máy.</p>', NULL, 'Hot', 8500000.00, NULL, 1, 6, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `alt_text`, `order`, `is_primary`, `created_at`, `updated_at`) VALUES
(1, 1, 'photos/1/1748961574_rem-cau-vong-ma-diamond.jpg', NULL, 0, 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(2, 1, 'photos/1/6d6aeae3-50d3-475c-92b1-7cc40f38c05f.jpeg', NULL, 1, 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(3, 1, 'photos/1/754F4C6F-8A10-478B-9F84-6374A1FF37D2.jpeg', NULL, 2, 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(4, 1, 'photos/1/9cea24e7-ad17-4116-88bc-1c4cae8f1bf6.jpeg', NULL, 3, 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(5, 1, 'photos/1/9cb5fe7e16e599bbc0f4.jpg', NULL, 4, 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_specs`
--

CREATE TABLE `product_specs` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `spec_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_specs`
--

INSERT INTO `product_specs` (`id`, `product_id`, `spec_name`, `spec_value`, `order`, `created_at`, `updated_at`) VALUES
(6, 2, 'Điện áp', '80V', 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(7, 2, 'Dung lượng', '300Ah', 2, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(8, 2, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(9, 2, 'Chu kỳ sạc', '3000+', 4, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(10, 2, 'Bảo hành', '3 năm', 5, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(11, 3, 'Điện áp', '24V', 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(12, 3, 'Dung lượng', '100Ah', 2, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(13, 3, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(14, 3, 'Chu kỳ sạc', '3000+', 4, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(15, 3, 'Bảo hành', '3 năm', 5, '2026-01-26 08:42:18', '2026-01-26 08:42:18'),
(16, 4, 'Điện áp', '48V', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(17, 4, 'Dung lượng', '200Ah', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(18, 4, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(19, 4, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(20, 4, 'Bảo hành', '3 năm', 5, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(21, 5, 'Điện áp', '80V', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(22, 5, 'Dung lượng', '300Ah', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(23, 5, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(24, 5, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(25, 5, 'Bảo hành', '3 năm', 5, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(26, 6, 'Điện áp', '24V', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(27, 6, 'Dung lượng', '100Ah', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(28, 6, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(29, 6, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(30, 6, 'Bảo hành', '3 năm', 5, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(31, 7, 'Dung lượng', '10kWh', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(32, 7, 'Công nghệ', 'LiFePO4', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(33, 7, 'Hiệu suất', '95%+', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(34, 7, 'Bảo hành', '10 năm', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(35, 8, 'Dung lượng', '50kWh', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(36, 8, 'Công nghệ', 'LiFePO4', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(37, 8, 'Hiệu suất', '95%+', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(38, 8, 'Bảo hành', '10 năm', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(39, 9, 'Độ phân giải', '4K Ultra HD', 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(40, 9, 'AI', 'Nhận diện khuôn mặt', 2, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(41, 9, 'Tầm nhìn đêm', '30m', 3, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(42, 9, 'Bảo hành', '2 năm', 4, '2026-01-27 00:32:52', '2026-01-27 00:32:52'),
(43, 10, 'Điện áp', '48V', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(44, 10, 'Dung lượng', '200Ah', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(45, 10, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(46, 10, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(47, 10, 'Bảo hành', '3 năm', 5, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(48, 11, 'Điện áp', '80V', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(49, 11, 'Dung lượng', '300Ah', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(50, 11, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(51, 11, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(52, 11, 'Bảo hành', '3 năm', 5, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(53, 12, 'Điện áp', '24V', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(54, 12, 'Dung lượng', '100Ah', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(55, 12, 'Công nghệ', 'LiFePO4 (LFP)', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(56, 12, 'Chu kỳ sạc', '3000+', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(57, 12, 'Bảo hành', '3 năm', 5, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(58, 13, 'Dung lượng', '10kWh', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(59, 13, 'Công nghệ', 'LiFePO4', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(60, 13, 'Hiệu suất', '95%+', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(61, 13, 'Bảo hành', '10 năm', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(62, 14, 'Dung lượng', '50kWh', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(63, 14, 'Công nghệ', 'LiFePO4', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(64, 14, 'Hiệu suất', '95%+', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(65, 14, 'Bảo hành', '10 năm', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(66, 15, 'Độ phân giải', '4K Ultra HD', 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(67, 15, 'AI', 'Nhận diện khuôn mặt', 2, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(68, 15, 'Tầm nhìn đêm', '30m', 3, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(69, 15, 'Bảo hành', '2 năm', 4, '2026-01-27 00:33:13', '2026-01-27 00:33:13'),
(70, 1, 'Điện áp', '48V', 0, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(71, 1, 'Dung lượng', '200Ah', 1, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(72, 1, 'Công nghệ', 'LiFePO4 (LFP)', 2, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(73, 1, 'Chu kỳ sạc', '3000+', 3, '2026-01-27 15:00:17', '2026-01-27 15:00:17'),
(74, 1, 'Bảo hành', '3 năm', 4, '2026-01-27 15:00:17', '2026-01-27 15:00:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `category_id`, `name`, `slug`, `icon`, `short_description`, `description`, `image`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Cho thuê xe nâng', 'cho-thue-xe-nang', 'local_shipping', 'Dịch vụ cho thuê xe nâng ngắn hạn và dài hạn với giá cả cạnh tranh', '<p>Chúng tôi cung cấp dịch vụ cho thuê xe nâng linh hoạt theo nhu cầu của khách hàng.</p>', NULL, 1, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(2, NULL, 'Bảo trì & Sửa chữa', 'bao-tri-sua-chua', 'build', 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi', '<p>Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng hỗ trợ bảo trì và sửa chữa 24/7.</p>', NULL, 2, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(3, NULL, 'Tư vấn giải pháp năng lượng', 'tu-van-giai-phap-nang-luong', 'lightbulb', 'Tư vấn và thiết kế hệ thống năng lượng mặt trời cho doanh nghiệp', '<p>Chuyên gia của chúng tôi sẽ tư vấn giải pháp năng lượng phù hợp nhất cho doanh nghiệp của bạn.</p>', NULL, 3, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(4, NULL, 'Lắp đặt hệ thống pin', 'lap-dat-he-thong-pin', 'engineering', 'Dịch vụ lắp đặt và chuyển đổi hệ thống pin lithium cho xe nâng', '<p>Chúng tôi cung cấp dịch vụ lắp đặt và nâng cấp hệ thống pin lithium cho xe nâng.</p>', NULL, 4, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(5, NULL, 'Đào tạo vận hành', 'dao-tao-van-hanh', 'school', 'Đào tạo nhân viên vận hành xe nâng an toàn và hiệu quả', '<p>Khóa đào tạo chuyên nghiệp giúp nhân viên vận hành xe nâng an toàn.</p>', NULL, 5, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(6, NULL, 'Cung cấp phụ tùng', 'cung-cap-phu-tung', 'inventory_2', 'Phụ tùng xe nâng chính hãng với giá ưu đãi', '<p>Cung cấp đầy đủ phụ tùng thay thế cho các loại xe nâng phổ biến.</p>', NULL, 6, 1, '2026-01-26 08:42:18', '2026-01-26 08:42:18', NULL),
(7, NULL, 'Cho thuê xe nâng', 'cho-thue-xe-nang-2', 'local_shipping', 'Dịch vụ cho thuê xe nâng ngắn hạn và dài hạn với giá cả cạnh tranh', '<p>Chúng tôi cung cấp dịch vụ cho thuê xe nâng linh hoạt theo nhu cầu của khách hàng.</p>', NULL, 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(8, NULL, 'Bảo trì & Sửa chữa', 'bao-tri-sua-chua-2', 'build', 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi', '<p>Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng hỗ trợ bảo trì và sửa chữa 24/7.</p>', NULL, 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(9, NULL, 'Tư vấn giải pháp năng lượng', 'tu-van-giai-phap-nang-luong-2', 'lightbulb', 'Tư vấn và thiết kế hệ thống năng lượng mặt trời cho doanh nghiệp', '<p>Chuyên gia của chúng tôi sẽ tư vấn giải pháp năng lượng phù hợp nhất cho doanh nghiệp của bạn.</p>', NULL, 3, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(10, NULL, 'Lắp đặt hệ thống pin', 'lap-dat-he-thong-pin-2', 'engineering', 'Dịch vụ lắp đặt và chuyển đổi hệ thống pin lithium cho xe nâng', '<p>Chúng tôi cung cấp dịch vụ lắp đặt và nâng cấp hệ thống pin lithium cho xe nâng.</p>', NULL, 4, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(11, NULL, 'Đào tạo vận hành', 'dao-tao-van-hanh-2', 'school', 'Đào tạo nhân viên vận hành xe nâng an toàn và hiệu quả', '<p>Khóa đào tạo chuyên nghiệp giúp nhân viên vận hành xe nâng an toàn.</p>', NULL, 5, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(12, NULL, 'Cung cấp phụ tùng', 'cung-cap-phu-tung-2', 'inventory_2', 'Phụ tùng xe nâng chính hãng với giá ưu đãi', '<p>Cung cấp đầy đủ phụ tùng thay thế cho các loại xe nâng phổ biến.</p>', NULL, 6, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(13, NULL, 'Cho thuê xe nâng', 'cho-thue-xe-nang-3', 'local_shipping', 'Dịch vụ cho thuê xe nâng ngắn hạn và dài hạn với giá cả cạnh tranh', '<p>Chúng tôi cung cấp dịch vụ cho thuê xe nâng linh hoạt theo nhu cầu của khách hàng.</p>', NULL, 1, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(14, NULL, 'Bảo trì & Sửa chữa', 'bao-tri-sua-chua-3', 'build', 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi', '<p>Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng hỗ trợ bảo trì và sửa chữa 24/7.</p>', NULL, 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(15, NULL, 'Tư vấn giải pháp năng lượng', 'tu-van-giai-phap-nang-luong-3', 'lightbulb', 'Tư vấn và thiết kế hệ thống năng lượng mặt trời cho doanh nghiệp', '<p>Chuyên gia của chúng tôi sẽ tư vấn giải pháp năng lượng phù hợp nhất cho doanh nghiệp của bạn.</p>', NULL, 3, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(16, NULL, 'Lắp đặt hệ thống pin', 'lap-dat-he-thong-pin-3', 'engineering', 'Dịch vụ lắp đặt và chuyển đổi hệ thống pin lithium cho xe nâng', '<p>Chúng tôi cung cấp dịch vụ lắp đặt và nâng cấp hệ thống pin lithium cho xe nâng.</p>', NULL, 4, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(17, NULL, 'Đào tạo vận hành', 'dao-tao-van-hanh-3', 'school', 'Đào tạo nhân viên vận hành xe nâng an toàn và hiệu quả', '<p>Khóa đào tạo chuyên nghiệp giúp nhân viên vận hành xe nâng an toàn.</p>', NULL, 5, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(18, NULL, 'Cung cấp phụ tùng', 'cung-cap-phu-tung-3', 'inventory_2', 'Phụ tùng xe nâng chính hãng với giá ưu đãi', '<p>Cung cấp đầy đủ phụ tùng thay thế cho các loại xe nâng phổ biến.</p>', NULL, 6, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5KrbUz3DduA03yMJg6wlBuwwtgwqyZSu98RsachB', NULL, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXI3WHVZZXd6dDhUS0F4aFhlOFdSYVBDODBvZDN4VUZlUklHanVQTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS8ud2VsbC1rbm93bi9hcHBzcGVjaWZpYy9jb20uY2hyb21lLmRldnRvb2xzLmpzb24iO3M6NToicm91dGUiO3M6MTA6InBhZ2VzLnNob3ciO319', 1769947047),
('CyNb5ZGFSpuTJzWZ4dcXY7UrTWU11JRhY9cQNPgj', 1, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUFJvQmh5T3FuM0Ztb0JPcUY2UUNQZXd1VmJrNUtNcmxGVEFZWkUwRCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS90aW4tdHVjL2t0aG9tZS1hcmNoaXRlY3R1cmUiO3M6NToicm91dGUiO3M6MTA6InBvc3RzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjEzOiJhZG1pbl9zaXRlX2lkIjtzOjE6IjIiO30=', 1769910211),
('l9KjcdBgt0jEVSFdcGAcPDWDgxcG7CG4ZaS7fBQB', NULL, '192.168.32.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUxMRmFmTGROaEU2b25zQnMzM2dRa1p5Nk1pUGFFYm1TTThndm5xRSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1769935228);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` enum('text','textarea','image','boolean','number','email','url') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `site_id`, `key`, `value`, `type`, `group`, `label`, `description`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'site_name', 'NMT AUTO', 'text', 'general', 'Tên website', 'Tên hiển thị của website', 1, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(2, 1, 'site_description', 'Giải pháp công nghiệp & năng lượng tái tạo hàng đầu Việt Nam', 'textarea', 'general', 'Mô tả website', 'Mô tả ngắn gọn về website', 2, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(3, 1, 'site_logo', 'settings/S0630QrDpQw34FXyJQHegH8ppRywfw0Mfp3KGiCQ.png', 'image', 'general', 'Logo', 'Logo chính của website', 3, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(4, 1, 'site_favicon', 'settings/EfZEBIJXTEzkfxMh0pHqIvJZYnG4hJy1uecfOEhm.svg', 'image', 'general', 'Favicon', 'Icon hiển thị trên tab trình duyệt', 4, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(5, 1, 'contact_phone', '0123 456 789', 'text', 'contact', 'Số điện thoại', 'Số điện thoại liên hệ', 1, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(6, 1, 'contact_hotline', '1900 1234', 'text', 'contact', 'Hotline', 'Số hotline', 2, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(7, 1, 'contact_email', 'info@nmtauto.vn', 'email', 'contact', 'Email', 'Email liên hệ', 3, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(8, 1, 'contact_address', '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh', 'textarea', 'contact', 'Địa chỉ', 'Địa chỉ công ty', 4, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(9, 1, 'contact_map_embed', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14903.54425956664!2d105.77032909999998!3d20.95709015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade7d6136023%3A0x1b322b695569f1c6!2zUGFvIFF1w6FuIEjDoCBUcsOs!5e0!3m2!1svi!2s!4v1769523342481!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'textarea', 'contact', 'Google Map Embed', 'Mã nhúng Google Map', 5, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(10, 1, 'contact_working_hours', 'Thứ 2 - Thứ 6: 8:00 - 17:30', 'text', 'contact', 'Giờ làm việc', 'Thời gian làm việc', 6, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(11, 1, 'social_facebook', 'https://facebook.com/nmtauto', 'url', 'social', 'Facebook', 'Link trang Facebook', 1, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(12, 1, 'social_youtube', 'https://youtube.com/@nmtauto', 'url', 'social', 'YouTube', 'Link kênh YouTube', 2, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(13, 1, 'social_tiktok', 'https://tiktok.com/@nmtauto', 'url', 'social', 'TikTok', 'Link trang TikTok', 3, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(14, 1, 'social_zalo', 'https://zalo.me/nmtauto', 'url', 'social', 'Zalo', 'Link Zalo OA', 4, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(15, 1, 'social_instagram', '', 'url', 'social', 'Instagram', 'Link trang Instagram', 5, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(16, 1, 'seo_meta_title', 'NMT AUTO - Giải pháp công nghiệp & năng lượng tái tạo', 'text', 'seo', 'Meta Title', 'Tiêu đề SEO mặc định', 1, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(17, 1, 'seo_meta_description', 'NMT AUTO cung cấp giải pháp pin lithium, camera AI, hệ thống lưu trữ năng lượng và dịch vụ xe nâng chuyên nghiệp.', 'textarea', 'seo', 'Meta Description', 'Mô tả SEO mặc định', 2, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(18, 1, 'seo_meta_keywords', 'pin lithium, camera AI, năng lượng tái tạo, xe nâng, NMT AUTO', 'text', 'seo', 'Meta Keywords', 'Từ khóa SEO', 3, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(19, 1, 'seo_og_image', NULL, 'image', 'seo', 'OG Image', 'Hình ảnh khi chia sẻ lên mạng xã hội', 4, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(20, 1, 'footer_about', 'NMT AUTO là công ty hàng đầu trong lĩnh vực cung cấp giải pháp công nghiệp và năng lượng tái tạo tại Việt Nam.', 'textarea', 'footer', 'Giới thiệu Footer', 'Nội dung giới thiệu ở footer', 1, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(21, 1, 'footer_copyright', '© 2024 NMT AUTO. All rights reserved.', 'text', 'footer', 'Copyright', 'Nội dung copyright', 2, '2026-01-26 08:42:17', '2026-02-01 01:06:41'),
(22, 1, 'company_name', 'CÔNG TY TNHH NMT AUTO', 'text', 'contact', 'Tên công ty', 'Tên đầy đủ của công ty', 0, '2026-01-27 14:52:59', '2026-02-01 01:06:41'),
(24, 1, 'recaptcha_site_key', '6Ld8zFgsAAAAADZ83boNDLPqEuVie1Cb_50Zt74d', 'text', 'security', 'reCAPTCHA Site Key', 'Google reCAPTCHA v3 Site Key (Public)', 1, '2026-01-28 08:20:50', '2026-02-01 01:06:41'),
(25, 1, 'recaptcha_secret_key', '6Ld8zFgsAAAAAOXCal9nuZcV9cPDLp2KUaxPf6KP', 'text', 'security', 'reCAPTCHA Secret Key', 'Google reCAPTCHA v3 Secret Key (Private)', 2, '2026-01-28 08:20:50', '2026-02-01 01:06:41'),
(27, 2, 'site_name', 'AMD AI Solutions', 'text', 'general', 'Tên website', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(28, 2, 'site_description', 'Giải pháp AI thông minh cho doanh nghiệp', 'textarea', 'general', 'Mô tả website', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(29, 2, 'site_tagline', 'Webco.io.vn', 'text', 'general', 'Tagline', NULL, 3, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(30, 2, 'primary_color', '#3b82f6', 'text', 'general', 'Màu chính', NULL, 4, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(31, 2, 'contact_phone', '028 7777 9999', 'text', 'contact', 'Số điện thoại', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(32, 2, 'contact_email', 'info@amdai.vn', 'email', 'contact', 'Email', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(33, 2, 'contact_address', 'Hà Nội, Việt Nam', 'textarea', 'contact', 'Địa chỉ', NULL, 3, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(34, 2, 'contact_description', 'Đội ngũ AMD AI Solutions luôn sẵn sàng hỗ trợ bạn 24/7. Hãy liên hệ ngay để được tư vấn miễn phí!', 'textarea', 'contact', 'Mô tả trang liên hệ', NULL, 4, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(35, 2, 'social_facebook', 'https://facebook.com/amdai', 'url', 'social', 'Facebook', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(36, 2, 'social_youtube', '', 'url', 'social', 'YouTube', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(37, 2, 'social_zalo', '', 'text', 'social', 'Zalo', NULL, 3, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(38, 2, 'social_linkedin', '', 'url', 'social', 'LinkedIn', NULL, 4, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(39, 2, 'hero_badge', 'Kỷ nguyên Website 4.0', 'text', 'hero', 'Badge Hero', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(40, 2, 'hero_title', 'Website Thiết Kế Riêng Với <br/><span class=\"gradient-text\">Chi Phí Mẫu Cố Định</span>', 'textarea', 'hero', 'Tiêu đề Hero', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(41, 2, 'hero_subtitle', '- Sức Mạnh Từ AI -', 'text', 'hero', 'Phụ đề Hero', NULL, 3, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(42, 2, 'hero_description', 'AMD tái định nghĩa việc xây dựng thương hiệu số cho SME. Chúng tôi kết hợp trí tuệ nhân tạo để tạo ra các website độc bản, chuẩn SEO với tốc độ hoàn thiện gấp 5 lần.', 'textarea', 'hero', 'Mô tả Hero', NULL, 4, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(43, 2, 'cta_button_text', 'Tư vấn Web AI', 'text', 'cta', 'Text nút CTA', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(44, 2, 'cta_title', 'Sẵn sàng để bùng nổ doanh số?', 'text', 'cta', 'Tiêu đề CTA', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(45, 2, 'cta_description', 'Đăng ký để AI của chúng tôi phân tích website cũ hoặc đề xuất giải pháp cho website mới của bạn hoàn toàn miễn phí.', 'textarea', 'cta', 'Mô tả CTA', NULL, 3, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(46, 2, 'footer_about', 'Tiên phong ứng dụng Generative AI vào thiết kế Website SME tại Việt Nam. Xây dựng tương lai số cho mọi doanh nghiệp.', 'textarea', 'footer', 'Giới thiệu Footer', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(47, 2, 'footer_copyright', '© 2024 AMD AI SOLUTIONS. All rights reserved.', 'text', 'footer', 'Copyright', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(48, 2, 'process_title', 'Quy trình vận hành bằng AI', 'text', 'process', 'Tiêu đề quy trình', NULL, 1, '2026-02-01 01:07:14', '2026-02-01 01:07:14'),
(49, 2, 'process_subtitle', 'Tối ưu hóa thời gian và chất lượng bằng công nghệ độc quyền', 'text', 'process', 'Phụ đề quy trình', NULL, 2, '2026-02-01 01:07:14', '2026-02-01 01:07:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sites`
--

CREATE TABLE `sites` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'frontend',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sites`
--

INSERT INTO `sites` (`id`, `name`, `slug`, `domain`, `theme`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'NMT AUTO', 'nmtauto', 'nmtauto.vn', 'frontend', 1, '2026-02-01 01:06:41', '2026-02-01 01:06:41'),
(2, 'AMD AI Solutions', 'amd', 'amdai.vn', 'amd', 1, '2026-02-01 01:06:41', '2026-02-01 01:06:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `site_id`, `title`, `subtitle`, `description`, `button_text`, `button_url`, `image`, `order`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Giải pháp Pin Lithium', 'Công nghệ xanh cho tương lai', 'Nâng cao hiệu suất, tiết kiệm chi phí với pin lithium chất lượng cao', 'Xem sản phẩm', '/san-pham', 'photos/1/603896D7-AE18-46D6-9707-CB7762300FD3.jpeg', 1, 1, '2026-01-26 08:42:18', '2026-01-26 13:52:26', NULL),
(2, NULL, 'Dịch vụ Xe Nâng Chuyên Nghiệp', 'Cho thuê - Bảo trì - Sửa chữa', 'Đội ngũ kỹ thuật viên giàu kinh nghiệm, hỗ trợ 24/7', 'Liên hệ ngay', '/lien-he', 'photos/1/754F4C6F-8A10-478B-9F84-6374A1FF37D2.jpeg', 2, 1, '2026-01-26 08:42:18', '2026-01-26 13:53:01', NULL),
(3, NULL, 'Giải pháp Pin Lithium', 'Công nghệ xanh cho tương lai', 'Nâng cao hiệu suất, tiết kiệm chi phí với pin lithium chất lượng cao', 'Xem sản phẩm', '/san-pham', '', 1, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(4, NULL, 'Dịch vụ Xe Nâng Chuyên Nghiệp', 'Cho thuê - Bảo trì - Sửa chữa', 'Đội ngũ kỹ thuật viên giàu kinh nghiệm, hỗ trợ 24/7', 'Liên hệ ngay', '/lien-he', '', 2, 1, '2026-01-27 00:32:52', '2026-01-27 00:32:52', NULL),
(5, NULL, 'Giải pháp Pin Lithium', 'Công nghệ xanh cho tương lai', 'Nâng cao hiệu suất, tiết kiệm chi phí với pin lithium chất lượng cao', 'Xem sản phẩm', '/san-pham', '', 1, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL),
(6, NULL, 'Dịch vụ Xe Nâng Chuyên Nghiệp', 'Cho thuê - Bảo trì - Sửa chữa', 'Đội ngũ kỹ thuật viên giàu kinh nghiệm, hỗ trợ 24/7', 'Liên hệ ngay', '/lien-he', '', 2, 1, '2026-01-27 00:33:13', '2026-01-27 00:33:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_posts`
--

CREATE TABLE `social_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `platform` enum('facebook','youtube','tiktok','instagram') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'facebook',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_posts`
--

INSERT INTO `social_posts` (`id`, `platform`, `title`, `description`, `image`, `video_url`, `post_url`, `is_active`, `order`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'Lắp đặt Pin Lithium', 'Lắp đặt hệ thống Pin Lithium cho kho bãi tại Bình Dương.', NULL, NULL, 'https://facebook.com/nmtauto', 1, 1, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(2, 'facebook', 'Bảo trì xe nâng', 'Dịch vụ bảo trì xe nâng định kỳ - Đảm bảo an toàn vận hành.', NULL, NULL, 'https://facebook.com/nmtauto', 1, 2, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(3, 'facebook', 'Hệ thống năng lượng mặt trời', 'Hoàn thành lắp đặt hệ thống năng lượng mặt trời cho nhà máy sản xuất.', NULL, NULL, 'https://facebook.com/nmtauto', 1, 3, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(4, 'youtube', 'Giới thiệu Pin Lithium xe nâng', 'Video giới thiệu công nghệ Pin Lithium cho xe nâng điện.', NULL, 'https://youtube.com/@nmtauto', 'https://youtube.com/@nmtauto', 1, 4, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(5, 'youtube', 'Hướng dẫn bảo trì xe nâng', 'Hướng dẫn chi tiết cách bảo trì xe nâng đúng cách.', NULL, 'https://youtube.com/@nmtauto', 'https://youtube.com/@nmtauto', 1, 5, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(6, 'tiktok', 'Xe nâng điện hoạt động', 'Xe nâng điện NMT AUTO vận hành mượt mà trong kho.', NULL, 'https://tiktok.com/@nmtauto', 'https://tiktok.com/@nmtauto', 1, 6, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(7, 'tiktok', 'Camera AI an toàn', 'Hệ thống Camera AI cảnh báo va chạm cho xe nâng.', NULL, 'https://tiktok.com/@nmtauto', 'https://tiktok.com/@nmtauto', 1, 7, '2026-01-27 14:03:28', '2026-01-27 14:03:28'),
(8, 'instagram', 'Showroom NMT AUTO', 'Không gian trưng bày sản phẩm tại showroom NMT AUTO.', NULL, NULL, 'https://instagram.com/nmtauto', 1, 8, '2026-01-27 14:03:28', '2026-01-27 14:03:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `avatar`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@nmtauto.vn', 1, 'avatars/Z2B0hPFnN2OlTLo2TTw8t3Sb5YiM9zRmfj3H6vNM.png', NULL, '2026-01-26 08:42:17', '$2y$12$ytf5k335/PAuEkqXMTH57.HgPZg7uDRFoT79jaS/swNi57czkeSKG', NULL, '2026-01-26 08:42:17', '2026-01-27 14:50:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_inquiries_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`),
  ADD KEY `menus_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_specs`
--
ALTER TABLE `product_specs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specs_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_site_id_key_unique` (`site_id`,`key`);

--
-- Chỉ mục cho bảng `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_site_id_foreign` (`site_id`);

--
-- Chỉ mục cho bảng `social_posts`
--
ALTER TABLE `social_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_specs`
--
ALTER TABLE `product_specs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `social_posts`
--
ALTER TABLE `social_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD CONSTRAINT `contact_inquiries_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menus_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `product_specs`
--
ALTER TABLE `product_specs`
  ADD CONSTRAINT `product_specs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Ràng buộc cho bảng `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
