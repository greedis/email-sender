# Email Sender

This is a Laravel application that sends emails using SMTP, PHPMailer, queues, and Redis.

## Requirements

- PHP >= 8.1
- Composer
- Laravel Sail
- Redis
- MySQL
- SMTP server configuration

## Installation

1. **Clone the repository**
   Clone the repository to your local machine:
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Install dependencies**
   Install PHP dependencies using Composer:
   ```bash
   composer install
   ```

3. **Set up environment file**
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

4. **Configure your environment**
   Open the `.env` file and configure your SMTP settings:
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=<smtp-server>
   MAIL_PORT=465
   MAIL_USERNAME=<your-email>
   MAIL_PASSWORD=<your-password>
   MAIL_ENCRYPTION=ssl
   ```

5. **Run Sail**
   Start the Laravel Sail environment:
   ```bash
   ./vendor/bin/sail up
   ```

6. **Migrate the database**
   Run the database migrations:
   ```bash
   ./vendor/bin/sail artisan migrate
   ```

7. **Start the queue worker**
   Run the queue worker to process email sending jobs:
   ```bash
   ./vendor/bin/sail artisan queue:work
   ```

## Usage

1. Go to the application URL in your browser (default is `http://localhost`).
2. Navigate to the **Email Form** page and submit the form.
3. The email will be queued and processed by Redis.

## Testing the Email

1. Ensure that Redis is running.
2. Use the email form to send a test email.
3. The email will be processed in the background and sent to the configured SMTP server.
