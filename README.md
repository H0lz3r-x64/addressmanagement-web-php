# Commissioning Assurance Department Project

This project is a custom solution designed to meet the specific needs of the Commissioning Assurance Department. It is essentially a clone of Azure DevOps, but with additional functionality and flexibility for customization. The project is built using the PHP MVC (Model-View-Controller) architecture.

## Core Technologies

- **PHP**: The server-side scripting language used for backend development.
- **Composer**: A dependency management tool used in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.
- **Laravel's Eloquent ORM**: An implementation of the active record pattern that allows you to work with your database using PHP objects.

## Project Structure

The project is divided into two main parts:

1. **Main Application**: This is the core of the project. It is a PHP MVC application that uses Composer for dependency management and Laravel's Eloquent as an ORM. The application's credentials are securely stored in a `.env` file.

2. **Cron Job (commisioningdevopswebinterface-cronJob)**: This is a scheduled task that runs at specified intervals on the server. Its main function is to fetch data from the DevOps API and store it in the application's database for later use.

### Main Application

The main application is structured as follows:

- **Views**: This directory contains the views of the application. An example of a view is `HomeView.php`, which displays all dashboards to the user. Each dashboard is a clickable link that redirects the user to the respective dashboard.

- **Controllers**: This directory contains the controllers of the application. Controllers handle the business logic of the application.

- **Models**: This directory contains the models of the application. Models represent the data and the rules to manipulate that data.

### Cron Job

The cron job is a separate project that is responsible for fetching data from the DevOps API and storing it in the application's database. It is scheduled to run at specified intervals.

## Database Structure

The database is structured to store the data fetched from the DevOps API. It also includes tables for storing dashboards, queries, and other related data. Each table is linked to others through foreign keys, creating relationships between the data.

### Dashboards Table

This table stores information about the dashboards. Each dashboard has a unique ID and a name.

```sql
CREATE TABLE `Dashboards` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `name` (`name`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;
```

### DashboardProperties Table

This table stores the properties of each dashboard. It links dashboards, fields, and values together.

```sql
CREATE TABLE `DashboardProperties` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`dashboard_model_id` INT(11) NULL DEFAULT NULL,
	`field_model_id` INT(11) NULL DEFAULT NULL,
	`value_model_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `dashboard_id` (`dashboard_model_id`) USING BTREE,
	INDEX `field_id` (`field_model_id`) USING BTREE,
	INDEX `value_id` (`value_model_id`) USING BTREE,
	CONSTRAINT `DashboardProperties_ibfk_1` FOREIGN KEY (`dashboard_model_id`) REFERENCES `devopsapi`.`Dashboards` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `DashboardProperties_ibfk_2` FOREIGN KEY (`field_model_id`) REFERENCES `devopsapi`.`Fields` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `DashboardProperties_ibfk_3` FOREIGN KEY (`value_model_id`) REFERENCES `devopsapi`.`FieldValues` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
;
```

### Fields Table

This table stores information about each field. Each field has a unique ID, a name, a reference name, a project name, a type, a flag indicating if it is queryable, and a work item type.

```sql
CREATE TABLE `Fields` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`referenceName` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`projectName` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`type` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`isQueryable` TINYINT(1) NULL DEFAULT NULL,
	`workItemType` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COMMENT='This table will store information about each field.'
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3906
;
```

### FieldOperationValues Table

This table stores the valid values for each field-operation pair.

```sql
CREATE TABLE `FieldOperationValues` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`field_model_id` INT(11) NULL DEFAULT NULL,
	`operation_model_id` INT(11) NULL DEFAULT NULL,
	`value` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `FK__FieldsInFieldOperationValues` (`field_model_id`) USING BTREE,
	INDEX `FK__OperationsInFieldOperationValues` (`operation_model_id`) USING BTREE,
	CONSTRAINT `FK__FieldsInFieldOperationValues` FOREIGN KEY (`field_model_id`) REFERENCES `devopsapi`.`Fields` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `FK__OperationsInFieldOperationValues` FOREIGN KEY (`operation_model_id`) REFERENCES `devopsapi`.`SupportedOperations` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COMMENT='This table will store the valid values for each field-operation pair.'
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=96934
;
```

### Queries Table

This table stores the queries associated with each dashboard.

```sql
CREATE TABLE `Queries` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`dashboard_model_id` INT(11) NULL DEFAULT NULL,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci

',


	`wiql_string` TEXT NOT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `dashboard_id` (`dashboard_model_id`) USING BTREE,
	CONSTRAINT `Queries_ibfk_1` FOREIGN KEY (`dashboard_model_id`) REFERENCES `devopsapi`.`Dashboards` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;
```

### SupportedOperations Table

This table stores information about each supported operation.

```sql
CREATE TABLE `SupportedOperations` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`referenceName` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COMMENT='This table will store information about each supported operation.'
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=26
;
```

## Current Status

The project is currently a work in progress. The core has been assembled, but there is still a significant amount of development to be done.

The cronjob script is to be considered as feature complete.

## Future Work

The next steps for this project will be to continue building out the functionality of the main application. The frontend of the query edit already works but the backend and the assembling of the wiql (work item query langauge) and sending that request to the devops api to receive the data, must still be implemented. The ux and ui also are barebone as of now and need to get properly implemented.

## Getting Started

To get started with this project, you will need to install the necessary dependencies using Composer. You will also need to set up the `.env` file with the appropriate credentials.

### Step 1: Clone the Repository

First, you need to clone the project repository to your local machine. Open your terminal, navigate to the directory where you want to clone the repository, and run the following command:

```bash
git clone https://git.knapp.at/luca.holzer/commisioningdevopswebinterface.git
```

### Step 2: Install Composer Dependencies

Navigate to the project directory and download the necessary Composer dependencies by running the following command:

```bash
composer install
```

This command reads the `composer.json` file in the current directory to determine which dependencies to install. It then checks the `composer.lock` file to know which exact versions of the packages to install. If the `composer.lock `file does not exist, Composer will create it after the `install` command finishes running.

### Step 3: Configure Database and DevOps API Key

Store your database credentials and DevOps API key in an `.env` file in the project root. The file should look like this:

```bash
DB_CONNECTION=""
DB_HOST=""
DB_DATABASE=""
DB_USERNAME=""
DB_PASSWORD=""

DEVOPS_PERSONAL_ACCESS_TOKEN=""
```

## Contributing

Contributions are welcome. Please submit a pull request with your proposed changes.

## License

This project is licensed under the MIT License.