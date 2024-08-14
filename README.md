# Exam Project

## Description
Yet another Exam project. This application allows users to manage their tasks efficiently. It includes features like only adding tasks. Additionally, it integrates with Telegram to manage tasks via a bot.

## Requirements
- PHP 8.3 or higher
- Composer
- MySQL

## Installation

1. Clone the repository:
    ```shell
    git clone https://github.com/AminovJamshid/Exam_project
    cd Exam_project
    ```

2. Install dependencies using Composer:
    ```shell
    composer install
    ```

3. Set up the database:
    - Create a MySQL database named `exam_db`.
    - Import the `dump.sql` file to set up the tables and initial data:
        ```shell
        mysql -u root -p exam_db < dump.sql
        ```

4. Configure the database connection in `src/DB.php`:
    ```php
    <?php
    // src/DB.php

    return [
        'host' => 'localhost',
        'dbname' => 'exam_db',
        'user' => 'root',
        'password' => 'your_password',
    ];
    ```
___

## Usage

### Web Interface
1. Start a local PHP server:
    ```shell
    php -S localhost:8080
    ```

2. Open your browser and navigate to `http://localhost:8080`.

### Telegram Bot
1. Set up your Telegram bot by creating a new bot on Telegram and obtaining the bot token.

2. Update the bot token in `src/Bot.php`:
    ```php
    <?php
    // src/Bot.php

    $botToken = "your_bot_token";

    // Add the rest of your bot setup code here
    ```

3. Set up a webhook for your bot to point to your server's endpoint.

___

## Contributing
Feel free to submit issues or pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
