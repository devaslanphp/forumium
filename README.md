# Forumium
<img src="./public/favicon.svg" width="50" />

**Fast**, **Clean**, **Easy to use** and **Open Source** Forum to boost collaboration


## Installation

- Clone the repository
- Install backend dependencies: `composer install`
- Install frontend dependencies: `npm install` (or `yarn`)
- Generate assets: `npm run build` (or `yarn build`)
- Create a new file `.env` based on `.env.example`: `cp .env.example .env` (or any other compatible command)
- Update `.env` file by adding your database information and your SMTP server information

> **IMPORTANT:** The queue is activated by default in this configuration (based on .env.example file), and it's recommanded to have it enabled at least for the configuration step
- Generate an application key: `php artisan key:generate`

## Database configuration 

There is 2 ways to configure your database : 

### Manually 

By executing the commands:

`php artisan migrate`

`php artisan db:seed`
    
> Here the database configuration is done, you got the database structure and the minimal data inserted by the seeder to make the application work, if you want demo data to be inserted, you need to run the following commands:
> Before you execute demo data seeder, you need to run queue listener: `php artisan queue:work`, because there is some data that will be inserted via jobs
>    - `php artisan db:seed --class=ContentSeeder`
>    - `php artisan db:seed --class=NotificationSeeder`

### Automatically

By executing the command: `composer run app-install`

> Before you execute the composer command, you need to run queue listener: `php artisan queue:work`, because there is some data that will be inserted via jobs

> Please note that this command will insert also demo data into your database (if you don't need demo data, please use the manual configuration above)

## Serve the application

- After you have configured the database you can serve the application: `php artisan serve`
- The database seeder already executed will create at least two users:
  - **Administrator** 
    - Email address: *admin@forumium.app*
    - Password : *password*
  - **Moderator** 
    - Email address: *mod@forumium.app*
    - Password: *password*

> **IMPORTANT:** if you have executed the demo data seeders, you will have 30 other users (with the **Member** role) inserted also, you can check the database (table: `users`) to get their email addresses, and all their passwords will be *password* (the same as Administrator and Moderator)
