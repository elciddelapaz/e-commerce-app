
# Laravel E-commerce


## Installation

Install my-project with npm

```bash
  # Clone the repo
  git clone https://github.com/elciddelapaz/e-commerce-app

  # Go to project directory
  cd e-commerce-app

  # Copy and edit .env file
  cp .env.example .env
  # Create a database on port 3306 and input the DB_DATABASE, DB_USERNAME and DB_USERNAME
  # for email to work visit https://mailtrap.io/ and input username & password on MAIL_USERNAME and MAIL_PASSWORD
  
  # Install packages
  composer install

  # Generate application key file
  php artisan key:generate

  # Install npm packages
  npm install && npm run build

  # Migrate and seed the database
  php artisan migrate --seed
  
  # Start the server
  composer run dev
```

## Authentication

- Email: test@example.com
- Password: 1234
