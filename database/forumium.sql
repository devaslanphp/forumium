-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 déc. 2022 à 21:17
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forumium`
--

-- --------------------------------------------------------

--
-- Structure de la table `app_notifications`
--

CREATE TABLE `app_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `app_notifications`
--

INSERT INTO `app_notifications` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Someone edited my discussion', '2022-12-22 11:51:01', '2022-12-22 11:51:01', NULL),
(2, 'Someone posts in a discussion I\'m following', '2022-12-22 11:51:11', '2022-12-22 11:51:11', NULL),
(3, 'Someone locks my discussion', '2022-12-22 11:51:13', '2022-12-22 11:51:13', NULL),
(4, 'When one of my posts is up/down voted', '2022-12-22 11:52:39', '2022-12-22 11:52:39', NULL),
(5, 'Someone sets my reply as a best answer', '2022-12-22 11:52:48', '2022-12-22 11:52:48', NULL),
(6, 'A best answer is set in a discussion I participated in', '2022-12-22 11:52:54', '2022-12-22 11:52:54', NULL),
(7, 'Someone commented to one of my posts', '2022-12-22 11:53:23', '2022-12-22 11:53:23', NULL),
(8, 'Someone mentions me in a post', '2022-12-22 11:53:27', '2022-12-22 11:53:27', NULL),
(9, 'Someone likes one of my posts', '2022-12-22 11:53:36', '2022-12-22 11:53:36', NULL),
(10, 'A moderator warns me', '2022-12-22 11:53:44', '2022-12-22 11:53:44', NULL),
(11, 'Someone creates a discussion in a tag I\'m following', '2022-12-22 11:53:53', '2022-12-22 11:53:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `source_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `source_type`, `source_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 1, 'App\\Models\\Discussion', 1, '2022-12-23 15:12:02', '2022-12-23 17:04:58', NULL),
(8, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.', 5, 'App\\Models\\Discussion', 1, '2022-12-23 16:12:26', '2022-12-23 16:12:26', NULL),
(9, 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 1, 'App\\Models\\Reply', 1, '2022-12-24 13:03:25', '2022-12-24 13:10:03', NULL),
(10, 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt...', 5, 'App\\Models\\Reply', 1, '2022-12-24 13:10:20', '2022-12-24 13:12:42', NULL),
(11, 'similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', 1, 'App\\Models\\Reply', 4, '2022-12-24 13:10:55', '2022-12-24 13:10:55', NULL),
(12, 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 5, 'App\\Models\\Reply', 4, '2022-12-24 13:12:20', '2022-12-24 13:12:20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_resolved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discussions`
--

INSERT INTO `discussions` (`id`, `name`, `content`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `is_resolved`) VALUES
(1, 'Lorem ipsum dolor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, '2022-12-22 14:23:53', '2022-12-24 15:08:46', NULL, 1),
(2, 'Ut enim ad minima', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>', 5, '2022-12-22 15:07:01', '2022-12-22 15:07:01', NULL, 0),
(3, 'Et harum quidem rerum', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</p>', 5, '2022-12-22 16:30:56', '2022-12-22 16:30:56', NULL, 0),
(4, 'Shortbread bear claw cheesecake', '<p>Shortbread bear claw cheesecake wafer jelly gummi bears sugar plum jelly beans. Pudding chupa chups gingerbread croissant cookie cake cake. Gingerbread tart jujubes muffin candy jelly-o soufflé. Cookie donut gummies candy canes lollipop. Donut pie gingerbread shortbread dessert dragée cookie jelly beans marzipan. Danish wafer bonbon jelly-o soufflé. Dessert pastry candy cake wafer bear claw jelly beans tootsie roll. Caramels chocolate bar sesame snaps gingerbread bonbon tiramisu.<br>Croissant gingerbread lollipop dessert tiramisu cookie shortbread. Marzipan fruitcake soufflé sweet roll liquorice. Muffin chocolate cake chocolate cake tiramisu jelly beans shortbread ice cream dragée. Croissant soufflé jelly cheesecake danish lollipop marzipan. Pie croissant jelly beans danish dragée bear claw. Cake pudding lemon drops dessert danish. Lollipop jelly croissant soufflé candy jujubes. Bonbon cotton candy bear claw jelly beans cheesecake caramels apple pie marshmallow fruitcake. Brownie jelly carrot cake halvah topping pudding sweet. Donut chocolate gummies tart biscuit tootsie roll cake liquorice powder.</p>', 1, '2022-12-23 09:14:19', '2022-12-23 09:14:19', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `discussion_tags`
--

CREATE TABLE `discussion_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `discussion_tags`
--

INSERT INTO `discussion_tags` (`id`, `discussion_id`, `tag_id`) VALUES
(1, 1, 2),
(2, 1, 7),
(3, 2, 3),
(4, 2, 4),
(5, 3, 4),
(6, 3, 6),
(7, 4, 5),
(8, 4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `discussion_id`, `type`) VALUES
(2, 1, 1, 'following'),
(3, 1, 2, 'ignoring'),
(4, 1, 3, 'not-following');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `source_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `source_type`, `source_id`, `created_at`, `updated_at`) VALUES
(5, 1, 'App\\Models\\Reply', 6, '2022-12-23 09:54:57', '2022-12-23 09:54:57'),
(6, 1, 'App\\Models\\Discussion', 3, '2022-12-23 09:55:54', '2022-12-23 09:55:54'),
(7, 1, 'App\\Models\\Discussion', 2, '2022-12-23 09:55:56', '2022-12-23 09:55:56'),
(8, 5, 'App\\Models\\Discussion', 1, '2022-12-23 09:42:56', '2022-12-23 09:42:56'),
(10, 1, 'App\\Models\\Reply', 5, '2022-12-23 10:00:01', '2022-12-23 10:00:01'),
(12, 1, 'App\\Models\\Discussion', 1, '2022-12-23 15:51:42', '2022-12-23 15:51:42'),
(14, 1, 'App\\Models\\Reply', 1, '2022-12-23 15:52:57', '2022-12-23 15:52:57'),
(16, 1, 'App\\Models\\Comment', 8, '2022-12-23 16:21:43', '2022-12-23 16:21:43'),
(18, 1, 'App\\Models\\Comment', 9, '2022-12-24 13:04:42', '2022-12-24 13:04:42'),
(19, 1, 'App\\Models\\Comment', 10, '2022-12-24 15:09:50', '2022-12-24 15:09:50');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_22_083621_create_jobs_table', 2),
(6, '2022_12_22_095906_create_roles_table', 3),
(7, '2022_12_22_095913_create_permissions_table', 3),
(8, '2022_12_22_100059_create_user_roles_table', 3),
(9, '2022_12_22_100105_create_role_permissions_table', 3),
(10, '2022_12_22_124442_create_notifications_table', 4),
(11, '2022_12_22_124447_create_user_notifications_table', 4),
(12, '2022_12_22_133607_create_socials_table', 5),
(13, '2022_12_22_143642_create_tags_table', 6),
(14, '2022_12_22_145655_create_discussions_table', 7),
(15, '2022_12_22_145752_create_discussion_tags_table', 7),
(17, '2022_12_23_081648_create_comments_table', 8),
(18, '2022_12_23_082707_create_followers_table', 9),
(19, '2022_12_23_081436_create_replies_table', 10),
(21, '2022_12_23_103652_create_likes_table', 11),
(22, '2022_12_24_141352_add_resolved_flag_to_discussions', 12),
(23, '2022_12_24_151236_add_description_to_tags', 13);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Start discussions', '<p>Create a new discussion</p>', '2022-12-22 09:42:07', '2022-12-22 09:42:07', NULL),
(2, 'Reply to discussions', '<p>Add a reply (answer) to discussions</p>', '2022-12-22 09:42:47', '2022-12-22 09:42:47', NULL),
(3, 'Like posts', '<p>Like discussions and replies</p>', '2022-12-22 09:43:55', '2022-12-22 09:43:55', NULL),
(4, 'Comment posts', '<p>Add a comment to discussions and replies</p>', '2022-12-22 09:44:11', '2022-12-22 09:44:11', NULL),
(5, 'Pin discussions', '<p>Add discussions to pinned section</p>', '2022-12-22 09:44:45', '2022-12-22 09:44:45', NULL),
(6, 'Edit posts', '<p>Edit discussions and replies</p>', '2022-12-22 09:45:25', '2022-12-22 09:45:25', NULL),
(7, 'Delete posts', '<p>Delete discussions and replies</p>', '2022-12-22 09:45:34', '2022-12-22 09:45:34', NULL),
(8, 'View posts stats', '<p>View discussions and replies stats&nbsp;</p>', '2022-12-22 09:46:22', '2022-12-22 09:46:22', NULL),
(9, 'Lock discussions', '<p>Disable all interactions to discussions</p>', '2022-12-22 09:46:46', '2022-12-22 09:46:46', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `replies`
--

INSERT INTO `replies` (`id`, `content`, `user_id`, `discussion_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 5, 1, '2022-12-23 08:12:46', '2022-12-23 12:58:58', NULL),
(4, '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 1, 1, '2022-12-23 08:24:46', '2022-12-23 12:58:58', NULL),
(5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 1, '2022-12-23 09:33:14', '2022-12-23 14:38:05', NULL),
(6, '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 1, 1, '2022-12-23 09:36:08', '2022-12-23 12:58:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `color`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '#e01d1d', '<p>Platform admins</p>', '2022-12-22 09:28:45', '2022-12-22 09:32:05', NULL),
(2, 'Mod', '#ae1de0', '<p>Platform mods</p>', '2022-12-22 09:30:14', '2022-12-22 09:31:56', NULL),
(3, 'Member', '#1dc9e0', '<p>Platform members</p>', '2022-12-22 09:30:25', '2022-12-22 09:30:25', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 2, 1),
(4, 1, 2),
(5, 3, 2),
(6, 2, 2),
(7, 1, 3),
(8, 3, 3),
(9, 2, 3),
(10, 1, 4),
(11, 3, 4),
(12, 2, 4),
(13, 1, 5),
(14, 2, 5),
(15, 1, 6),
(16, 2, 6),
(17, 1, 7),
(18, 2, 7),
(19, 1, 8),
(20, 2, 8),
(21, 1, 9),
(22, 2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `socials`
--

INSERT INTO `socials` (`id`, `provider`, `token`, `user_id`, `name`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'google', '111327107602257274348', 1, 'Hatim El Oufir', 'eloufirhatim@gmail.com', '2022-12-22 12:51:51', '2022-12-22 12:51:51', NULL),
(4, 'github', '6197875', 1, 'EL OUFIR Hatim', 'eloufirhatim@gmail.com', '2022-12-22 13:15:23', '2022-12-22 13:15:23', NULL),
(8, 'facebook', '10229543170307055', 1, 'EL Oufir Hatim', 'eloufirhatim@hotmail.com', '2022-12-22 13:22:20', '2022-12-22 16:30:01', '2022-12-22 16:30:01'),
(9, 'facebook', '10229543170307055', 1, 'EL Oufir Hatim', 'eloufirhatim@hotmail.com', '2022-12-22 16:30:06', '2022-12-22 16:30:06', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `color`, `icon`, `created_at`, `updated_at`, `deleted_at`, `description`) VALUES
(1, 'Test Posting', '#B59E8C', 'fa-solid fa-vial', '2022-12-22 13:41:56', '2022-12-24 14:13:36', NULL, 'Test out Flarum in this tag. Discussions in this tag will be deleted every so often.'),
(2, 'Support', '#4B93D1', 'fa-solid fa-wrench', '2022-12-22 13:42:12', '2022-12-24 14:13:49', NULL, 'Get help setting up, using, and customising Flarum.'),
(3, 'Meta', '#EF564F', 'fa-solid fa-bullhorn', '2022-12-22 13:43:25', '2022-12-24 14:13:59', NULL, 'Discussion about this community: its organisation and how we can improve it.'),
(4, 'Praise', '#9354CA', 'fa-solid fa-hand-holding-heart', '2022-12-22 13:43:39', '2022-12-24 14:14:20', NULL, 'Share you thanks for Flarum, its team or any of the participants in our ecosystem.'),
(5, 'Proposals', '#a22581', 'fa-solid fa-check-to-slot', '2022-12-22 13:44:03', '2022-12-24 14:14:28', NULL, 'Feature requests, design suggestions to become actionable tasks'),
(6, 'Extensions', '#48BF83', 'fa-solid fa-plug', '2022-12-22 13:44:19', '2022-12-24 14:14:38', NULL, 'Announce your extensions and provide help to users in this area. For requests/ideas, post in Feedback. For help building extensions, post in Dev > Extensibility.'),
(7, 'Dev', '#414141', 'fa-solid fa-code', '2022-12-22 13:44:49', '2022-12-24 14:14:46', NULL, 'For developers. Get help hacking core, building extensions, themes, and translations.'),
(8, 'Resources', '#626C78', 'fa-solid fa-suitcase', '2022-12-22 13:45:02', '2022-12-24 14:14:54', NULL, 'Share Flarum-related resources and services here: hosting, jobs, etc.'),
(9, 'Off-topic', '#D68B4F', 'fa-solid fa-quote-right', '2022-12-22 13:45:14', '2022-12-24 14:15:01', NULL, 'Off-topic discussions that don\'t fit into any other categories.'),
(10, 'Feedback', '#9354CA', 'fa-solid fa-comment-dots', '2022-12-22 13:45:23', '2022-12-24 14:15:14', NULL, 'For discussing Flarum core features and design. For issues use Support.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hatim El Oufir', 'eloufirhatim@gmail.com', '2022-12-22 08:39:00', '$2y$10$0tLstQ0921s6EzWnuf00z.yM4jt6JaPjAQZ5wieJFk7rv4siIUUY2', 'ejOtbf7qzB8Yj519qESzjzMet4gsycPBKkNjHTb39Z7oaFcCclgXN0aFOSvH', '2022-12-21 19:18:03', '2022-12-22 08:57:12'),
(5, 'Basma Es-Sbaï', 'essbai.basma@gmail.com', '2022-12-22 08:03:58', '$2y$10$D9.sdxHus/NBoHaB13wgU.BZwuwB3dk55bNQWd8HnNU9kunwdzTwq', NULL, '2022-12-22 07:50:22', '2022-12-22 08:03:58');

-- --------------------------------------------------------

--
-- Structure de la table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `via_web` tinyint(1) NOT NULL DEFAULT 0,
  `via_email` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `notification_id`, `via_web`, `via_email`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 1, 1),
(4, 1, 4, 1, 1),
(5, 1, 5, 1, 1),
(6, 1, 6, 1, 0),
(7, 1, 7, 1, 1),
(8, 1, 8, 1, 1),
(9, 1, 9, 1, 0),
(10, 1, 10, 1, 1),
(11, 1, 11, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 5, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_source_type_source_id_index` (`source_type`,`source_id`);

--
-- Index pour la table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_foreign` (`user_id`);

--
-- Index pour la table `discussion_tags`
--
ALTER TABLE `discussion_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_tags_discussion_id_foreign` (`discussion_id`),
  ADD KEY `discussion_tags_tag_id_foreign` (`tag_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_user_id_foreign` (`user_id`),
  ADD KEY `followers_discussion_id_foreign` (`discussion_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_source_type_source_id_index` (`source_type`,`source_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_discussion_id_foreign` (`discussion_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_user_id_foreign` (`user_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_foreign` (`user_id`),
  ADD KEY `user_notifications_notification_id_foreign` (`notification_id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `app_notifications`
--
ALTER TABLE `app_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `discussion_tags`
--
ALTER TABLE `discussion_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `discussion_tags`
--
ALTER TABLE `discussion_tags`
  ADD CONSTRAINT `discussion_tags_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `discussion_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Contraintes pour la table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `app_notifications` (`id`),
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
