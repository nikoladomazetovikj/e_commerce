$\Large {\text{\color[RGB]{124,252,0}SUPER SEEDS}}$


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

12. Start the scheduler with command:

```
php artisan schedule:run
```

or 

```
php artisan schedule:work
```

*NOTE: (this scheduler deletes all inactive or expired sales from the database)*

13. Create a profile on `Stripe`

https://stripe.com/

14. In developer tools get your `API` keys: (public and secret)

15. Put them in `ENV` file:

````
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret
````

16. Start application using this command:

```
php artisan serve
```

17. In order to send mails (for testing) create a profile on 

https://mailtrap.io/

NOTE: Mail Trap is free but limited. There are always alternative tools. One of them is `MailHog`. 

18. In `Integrations` select `Laravel 7+` and copy values

19. Paste the values in `.env` file (like in the .env.example)

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME= {generated username}
MAIL_PASSWORD= {generated password}
MAIL_ENCRYPTION=tls
```
 If you are using `Mailhog` please follow the configuration settings.
```angular2html
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```
Note: This is only relevant if you are using `MailHog` on your local server.
20. Follow the generated link and start using application (e.g. on localhost)

```
http://127.0.0.1:8000
```


Note: For the CMS part, the new `Laravel Breeze` dark mode is used. By default is not integrated in `Laravel`, so basically on every update of the composer the theme will be returned into white. To enable dark mode please run `php artisan breeze:install --dark` and then please  REVERT all new created changes.
