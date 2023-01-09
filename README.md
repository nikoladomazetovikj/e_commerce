#### To setup the project please follow this instructions:

1. Clone this repo:

```
cd/destination_folder (on your local machine)
git clone {repo_url}
```

2. Install composer (latest version)

https://getcomposer.org/download/

3. Install `NodeJs` (version 16.17)

https://nodejs.org/en/

4. Run this command: 

```
composer update
```

5. Create a database on your local machine

6. Rename `.env.example` file to `.env`

7. Open `.env` file and setup the following variables:

```
DB_DATABASE= {your database name}
DB_USERNAME= {db username}
DB_PASSWORD= {db password}
```

8. Generate key:

```
php artisan key:generate
```

9. In order to create db tables, run this command:

```
php artisan migrate
```
10. Seed data (if there is) running this command:

```
php artisan db:seed
```

11. Run the following commands to optimize the asset:

```
npm install
npm run dev
```

12. Start application using this command:

```
php artisan serve
```

12. In order to send mails (for testing) create a profile on 

https://mailtrap.io/

13. In `Integrations` select `Laravel 7+` and copy values

14. Paste the values in `.env` file (like in the .env.example)

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME= {generated username}
MAIL_PASSWORD= {generated password}
MAIL_ENCRYPTION=tls
```

15. Follow the generated link and start using application
