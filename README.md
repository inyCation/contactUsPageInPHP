# contactUsPageInPHP

# Contact Us Page in PHP with Admin Panel

Welcome to the **Contact Us Page with Admin Panel** repository! This project demonstrates the seamless integration of PHP scripting language with the powerful relational database management system, MySQL, to build a dynamic web application for user communication and inquiry management.

## Features

- **Contact Form:** Users can communicate with you through a user-friendly contact form, and their details are securely stored in a MySQL database.
- **Query ID Generation:** Each user inquiry receives a unique query ID, enabling efficient tracking and organization.
- **Admin Panel:** An admin panel grants access to view, manage, and respond to user inquiries, streamlining communication.
- **Response Page:** Users can search for their inquiry using the assigned query ID to check for admin responses.
- **CSRF Protection:** The admin login is fortified with CSRF protection to prevent unauthorized access.
- **Session-Based Authentication:** All admin pages are authenticated using secure session management.
- **Hashing+Salting Registration with Auth:** Registeration and admin login is integrated with hashing and salting security.


## Requirements

Before setting up and running the web page locally, ensure that you have the following prerequisites installed on your system:

1. **XAMPP**: XAMPP, a widely-used software package, bundles the Apache HTTP server, PHP programming language, MySQL database, and other components necessary to establish a local web server environment. You can download XAMPP from the official website: https://www.apachefriends.org/index.html

## Installation and Setup

To configure the web page using XAMPP on your local machine, meticulously follow these steps:

1. Download XAMPP from the provided link and meticulously adhere to the installation instructions tailored to your operating system.

2. After a successful installation, initiate the XAMPP control panel, which facilitates the management of various components.

3. Start the Apache web server and MySQL database service by executing the "Start" command adjacent to their respective names in the XAMPP control panel. This process effectively initiates the local web server and database server.

4. Clone this repository into the "htdocs" directory of your XAMPP installation. Conventionally, the "htdocs" folder resides in the XAMPP installation directory and serves as the root directory for your web server.

   ```bash
   git clone https://github.com/inyCation/contactUsPageInPHP C:/xampp/htdocs/contactUsPageInPHP
   ```

5. Database Setup:

    Open http://localhost/phpmyadmin in your web browser.

    Create a database named "contactUs."

    Navigate to the "Import" tab, choose the "contactUs.sql" file from the cloned repository, and execute the import.

6. Access the web page via your web browser by inputting the subsequent URL:

   ```
   http://localhost/contactUsPageInPHP/
   ```

   If the setup is executed correctly, you should observe the web page efficiently running on your local server.

## Admin Panel

To access the Admin Panel and its privileged functionalities, employ the following credentials:

- Username: admin
- Password: Admin@123

Please note that while the Admin Panel's functionality is intended for learning purposes, it includes features such as logout, replying to specific queries, deleting queries, and viewing all queries at once.


## Contribution

Contributions to this project are sincerely appreciated. If you encounter issues or have valuable insights to share, please feel free to open issues or submit pull requests to enhance the project further.

## Credits

Thank you for showing interest in our project! If you have any queries, encounter issues, or wish to provide suggestions, please do not hesitate to open an issue or contact us.

Happy coding!
