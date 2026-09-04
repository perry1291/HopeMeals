HopeMeals 🍽️

HopeMeals is a web-based food donation and management system developed to help organize the process of donating food and managing its distribution.
The project includes different modules for users, administrators, and delivery management. It also has features such as user authentication, food donation forms, feedback, profile management, a chatbot, and database integration.

Features:
User registration and login
User profile management
Food donation functionality
Admin dashboard and management features
Delivery management module
Chatbot for user interaction
Feedback system
MySQL database integration

Tech Stack:
HTML
CSS
JavaScript
PHP
MySQL

Project Structure:
HopeMeals/
│
├── admin/          # Admin-related pages and functionality
├── chatbot/        # Chatbot files
├── database/       # Database schema
├── delivery/       # Delivery-related functionality
├── food/           # Food-related pages
├── img/            # Images used in the project
│
├── connection.php  # Database connection
├── index.html      # Main page
├── login.php       # User login
├── signup.php      # User registration
├── profile.php     # User profile
├── feedback.php    # Feedback functionality
│
└── README.md

Running the Project:
To run this project locally, you will need a PHP server environment such as XAMPP.

1. Clone this repository:
   git clone https://github.com/perry1291/HopeMeals.git
2. Move the project folder to the htdocs directory in XAMPP.
3. Start Apache and MySQL from the XAMPP Control Panel.
4. Import the SQL file from the database folder into MySQL using phpMyAdmin.
5. Update the database configuration in connection.php if required.
6. Open the project in your browser:
   http://localhost/HopeMeals/
