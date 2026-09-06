# 🍱 HopeMeals 

HopeMeals is a web-based food donation and management system designed to streamline the process of donating food and managing its distribution. The platform brings together users, administrators, and delivery personnel in one system, with features like authentication, food donation forms, feedback collection, profile management, and an integrated chatbot.

## ✨ Features

- 👤 User registration and login
- 🧾 User profile management
- 🍲 Food donation functionality
- 🛠️ Admin dashboard and management tools
- 🚚 Delivery management module
- 💬 Chatbot for user interaction
- ⭐ Feedback system
- 🗄️ MySQL database integration

## 🧰 Tech Stack

| Layer      | Technology         |
|------------|---------------------|
| Frontend   | HTML, CSS, JavaScript |
| Backend    | PHP                 |
| Database   | MySQL               |

## 📁 Project Structure

```
HopeMeals/
├── admin/          # Admin-related pages and functionality
├── chatbot/        # Chatbot files
├── database/        # Database schema
├── delivery/         # Delivery-related functionality
├── food/           # Food-related pages
├── img/            # Images used in the project
├── connection.php # Database connection
├── index.html      # Main page
├── login.php       # User login
├── signup.php     # User registration
├── profile.php     # User profile
├── feedback.php    # Feedback functionality
└── README.md
```

## 🚀 Getting Started

To run this project locally, you'll need a PHP server environment such as **XAMPP**.

1. **Clone this repository**
   ```bash
   git clone https://github.com/perry1291/HopeMeals.git
   ```
2. **Move the project folder** into the `htdocs` directory in XAMPP.
3. **Start Apache and MySQL** from the XAMPP Control Panel.
4. **Import the SQL file** from the `database/` folder into MySQL using phpMyAdmin.
5. **Update the database configuration** in `connection.php` if required.
6. **Open the project** in your browser:
   ```
   http://localhost/HopeMeals/
