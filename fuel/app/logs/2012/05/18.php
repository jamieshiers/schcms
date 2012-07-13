<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Warning - 2012-05-18 07:33:55 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 07:33:55 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Error - 2012-05-18 08:51:44 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/classes/controller/welcome.php on line 55
Error - 2012-05-18 08:51:44 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/classes/controller/welcome.php on line 57
Error - 2012-05-18 08:51:44 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/views/welcome/pages.php on line 1
Error - 2012-05-18 08:51:44 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/views/welcome/pages.php on line 2
Error - 2012-05-18 09:03:39 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:05:01 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:05:06 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:13:09 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:13:35 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:13:41 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:16:01 --> Error - No uploaded files are selected. in /Applications/MAMP/htdocs/cms/fuel/core/classes/upload.php on line 497
Error - 2012-05-18 09:25:49 --> 8 - Use of undefined constant multiple - assumed 'multiple' in /Applications/MAMP/htdocs/cms/fuel/app/views/admin/vacancy/_form.php on line 64
Error - 2012-05-18 09:30:18 --> 8 - Use of undefined constant multiple - assumed 'multiple' in /Applications/MAMP/htdocs/cms/fuel/app/views/admin/vacancy/_form.php on line 64
Error - 2012-05-18 09:30:18 --> 4096 - Argument 2 passed to Fuel\Core\Form::file() must be an array, string given, called in /Applications/MAMP/htdocs/cms/fuel/app/views/admin/vacancy/_form.php on line 64 and defined in /Applications/MAMP/htdocs/cms/fuel/core/classes/form.php on line 316
Error - 2012-05-18 09:33:44 --> 8 - Undefined variable: field_down in /Applications/MAMP/htdocs/cms/fuel/packages/oil/classes/generate/migration/actions.php on line 118
Error - 2012-05-18 09:33:44 --> 2 - implode(): Invalid arguments passed in /Applications/MAMP/htdocs/cms/fuel/packages/oil/classes/generate/migration/actions.php on line 118
Error - 2012-05-18 09:35:51 --> Error - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'cms.pages_2' doesn't exist with query: "ALTER TABLE `pages_2`" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Error - 2012-05-18 09:36:01 --> Error - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'cms.pages_2' doesn't exist with query: "ALTER TABLE `pages_2`" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Error - 2012-05-18 09:38:02 --> Error - Migration "016_add_parent_id_to_pages_2.php" does not contain expected class "Fuel\Migrations\Add_parent_id_to_pages_2" in /Applications/MAMP/htdocs/cms/fuel/core/classes/migrate.php on line 156
Error - 2012-05-18 09:40:13 --> Error - SQLSTATE[42S02]: Base table or view not found: 1146 Table 'cms.vacancy' doesn't exist with query: "ALTER TABLE `vacancy` 
	ADD `files` varchar(255) NOT NULL" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Error - 2012-05-18 10:10:53 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/classes/controller/admin/vacancy.php on line 54
Error - 2012-05-18 10:10:53 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/classes/controller/admin/vacancy.php on line 54
Error - 2012-05-18 10:10:53 --> 8 - Trying to get property of non-object in /Applications/MAMP/htdocs/cms/fuel/app/classes/controller/admin/vacancy.php on line 54
Error - 2012-05-18 10:12:33 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'file' in 'field list' with query: "INSERT INTO `vacancies` (`job_title`, `location`, `contract_type`, `contract_term`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `file`) VALUES ('tyest', 'tetsjshd', 'jdjsh', 'jdshfks', 'sjdkfh', 'djksf', 'dshjk', 1337335953, 1337335953, null)" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Error - 2012-05-18 10:13:12 --> Error - SQLSTATE[21000]: Cardinality violation: 1241 Operand should contain 1 column(s) with query: "INSERT INTO `vacancies` (`job_title`, `location`, `contract_type`, `contract_term`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `files`) VALUES ('tyest', 'tetsjshd', 'jdjsh', 'jdshfks', 'sjdkfh', 'djksf', 'dshjk', 1337335992, 1337335992, ('balsall.pdf', 'Print Review.pdf', 'Printing Strategy Scoping and Implementation.pdf'))" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Error - 2012-05-18 10:13:45 --> Error - SQLSTATE[21000]: Cardinality violation: 1241 Operand should contain 1 column(s) with query: "INSERT INTO `vacancies` (`job_title`, `location`, `contract_type`, `contract_term`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `files`) VALUES ('test', 'test', 'test', 'test', 'test', 'test', 'etst', 1337336025, 1337336025, ('balsall.pdf', 'Print Review.pdf', 'Printing Strategy Scoping and Implementation.pdf'))" in /Applications/MAMP/htdocs/cms/fuel/core/classes/database/pdo/connection.php on line 137
Warning - 2012-05-18 10:32:08 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 10:32:08 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Error - 2012-05-18 10:36:51 --> 8 - Undefined variable: files in /Applications/MAMP/htdocs/cms/fuel/app/views/vacancy/view.php on line 26
Error - 2012-05-18 10:51:27 --> Parsing Error - syntax error, unexpected T_ECHO, expecting ',' or ';' in /Applications/MAMP/htdocs/cms/fuel/app/views/vacancy/view.php on line 29
Error - 2012-05-18 10:51:50 --> Parsing Error - syntax error, unexpected T_ECHO, expecting ',' or ';' in /Applications/MAMP/htdocs/cms/fuel/app/views/vacancy/view.php on line 29
Warning - 2012-05-18 11:18:40 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:18:40 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:21:11 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:21:11 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Error - 2012-05-18 11:21:22 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Applications/MAMP/htdocs/cms/fuel/app/views/admin/vacancy/_form.php on line 64
Warning - 2012-05-18 11:23:04 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:23:04 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:29:09 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
Warning - 2012-05-18 11:29:09 --> Fuel\Core\Validation::errors - This method is deprecated. Please use Validation::error() instead.
