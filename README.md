# Addressmanagement
## Set-Up
### Step 1: Install Composer Dependencies

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
