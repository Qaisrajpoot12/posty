# Posty

Posty is a Laravel project that demonstrates real-time notifications using Laravel Echo, Pusher, and WebSockets. It includes functionalities for creating posts, broadcasting events in real-time, sending emails, and handling queued jobs.

## Prerequisites

Before setting up the project, ensure you have the following installed on your local machine:

- PHP 8.0 or higher
- Composer
- Node.js and npm
- A Pusher account (for broadcasting events)
- MySQL or another compatible database

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone the Repository

Clone the project repository from GitHub to your local machine:

```bash
git clone https://github.com/Qaisrajpoot12/posty.git
cd posty


2. Install Dependencies

Install the required PHP dependencies using Composer:


composer install



Here is the content for your README.md file for the project "Posty":

markdown

# Posty

Posty is a Laravel project that demonstrates real-time notifications using Laravel Echo, Pusher, and WebSockets. It includes functionalities for creating posts, broadcasting events in real-time, sending emails, and handling queued jobs.

## Prerequisites

Before setting up the project, ensure you have the following installed on your local machine:

- PHP 8.0 or higher
- Composer
- Node.js and npm
- A Pusher account (for broadcasting events)
- MySQL or another compatible database

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone the Repository

Clone the project repository from GitHub to your local machine:

```bash
git clone https://github.com/Qaisrajpoot12/posty.git
cd posty

2. Install Dependencies

Install the required PHP dependencies using Composer:

bash

composer install

Install JavaScript dependencies using npm:



npm install
npm run dev




Here is the content for your README.md file for the project "Posty":

markdown

# Posty

Posty is a Laravel project that demonstrates real-time notifications using Laravel Echo, Pusher, and WebSockets. It includes functionalities for creating posts, broadcasting events in real-time, sending emails, and handling queued jobs.

## Prerequisites

Before setting up the project, ensure you have the following installed on your local machine:

- PHP 8.0 or higher
- Composer
- Node.js and npm
- A Pusher account (for broadcasting events)
- MySQL or another compatible database

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone the Repository

Clone the project repository from GitHub to your local machine:

```bash
git clone https://github.com/Qaisrajpoot12/posty.git
cd posty

2. Install Dependencies

Install the required PHP dependencies using Composer:

bash

composer install

Install JavaScript dependencies using npm:



npm install
npm run dev

3. Configure Environment Variables

Copy the .env.example file to .env:



cp .env.example .env



Edit the .env file and update the following configurations:

    Database Configuration: Update the database settings with your own database credentials.


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password




Pusher Configuration: Add your Pusher credentials for broadcasting events.

PUSHER_APP_ID=your_pusher_app_id
PUSHER_APP_KEY=your_pusher_app_key
PUSHER_APP_SECRET=your_pusher_app_secret
PUSHER_APP_CLUSTER=your_pusher_app_cluster
BROADCAST_DRIVER=pusher




Mail Configuration: Set up your mail settings to enable email notifications.



MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@example.com
MAIL_FROM_NAME="${APP_NAME}"


4. Generate Application Key


php artisan key:generate


5. Run Database Migrations


php artisan migrate




6. Start the Queue Worker


php artisan queue:work



7. Run the Application


php artisan serve
