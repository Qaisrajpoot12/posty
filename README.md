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


composer install

Install the required PHP dependencies using Composer:





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

```



home page 

![image](https://github.com/user-attachments/assets/a67b27cb-ad0d-4b53-8f9b-09d744f43f29)


dashboard link ..

![image](https://github.com/user-attachments/assets/c309f060-98f9-4afd-95dc-492a28dde9f1)

dashboard

![image](https://github.com/user-attachments/assets/f057da49-8894-45a8-9442-618bfb253933)

https://github.com/user-attachments/assets/4a14e27c-d639-434e-b373-d5e08aa00f30


post detail page for all users

![image](https://github.com/user-attachments/assets/3b54a030-8703-419a-a61b-e5a6b5cee867)

dashboard post edit page ...

![image](https://github.com/user-attachments/assets/3e909201-ec01-44fd-a396-d98246769123)
