## Set up
Clone this repository, navigate to the repository root and run the following commands
1. Install dependencies
```bash
    composer install
```
2. Make a copy of the env.example file and save as .env
3. Adde your database connection in the .env file you just made
4. Run migration
```bash
    php artisan migrate
```

4. Start application
```bash
    php artisan serve
```
5. Run command to pull users
```bash
    php artisan external-users:pull
```

## Required PHP version
^8.0
## Testing
Run the command below at the root directory of the project
```bash
    ./vendor/bin/phpunit
```
