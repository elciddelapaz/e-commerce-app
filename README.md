
# Laravel E-commerce

## Installation

### Install my-project with npm

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

## Endpoints
### Orders
* The `/order` endpoint let you create and manage your order

| Verb | URI | Action |
|:------|:-----:|:--------:|
| `GET` | `/orders` | Get all products|
| `GET` | `/orders/create` | Get the form to create an order |
| `POST` | `/orders` | Create an order | 
| `GET` | `/orders/{order}/edit` | Get the form to edit an order | 

### Products
* The `/products` endpoint let you create and manage your product

| Verb | URI | Action |
|:------|:-----:|:--------:|
| `GET` | `/products` | Get all products|
| `GET` | `/products/create` | Get the form to create an product |
| `POST` | `/products` | Create an product | 
| `GET` | `/products/{product}/edit` | Get the form to edit an product | 
| `PUT` | `/products/{product}` | Update a product
| `DELETE` |  `/products/{product}` | Delete a product

### Payment
* The `/payment` endpoint let you create a payment

| Verb | URI | Action |
|:------|:-----:|:--------:|
| `POST` | `/payment` | Create a payment|
