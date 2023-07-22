# contactUsPageInPHP

# Web Page with PHP and MySQL

This repository contains the code for a dynamic and interactive Contact Page with an Admin Panel, created using PHP and MySQL DB. The project aims to demonstrate the seamless integration of PHP scripting language with the powerful relational database management system, MySQL, to build a robust web application.
## Usage

The web page enables users to communicate with you through a contact form, capturing their details for further engagement. The data submitted through the contact form is seamlessly stored in the MySQL database, ensuring efficient data management and retrieval.

The Admin Panel provides exclusive access to view all the contact form submissions, empowering you to monitor user inquiries and streamline communication.

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

5. Create a novel MySQL database and seamlessly import the provided SQL file:

   - Open your preferred web browser and navigate to `http://localhost/phpmyadmin`.
   - Opt for "New" to engender a fresh database, denoted as "contactUs," and subsequently press "Create."

   - After successfully creating the database, navigate to it in the left sidebar and proceed to the "Import" tab, prominently situated at the top.
   - Choose the "contactUs.sql" file from your cloned repository by pressing "Choose File." Thereafter, preserve the remaining configurations as default and execute the "Go" command to seamlessly import the SQL file into the database.

6. Access the web page via your web browser by inputting the subsequent URL:

   ```
   http://localhost/contactUsPageInPHP/
   ```

   If the setup is executed correctly, you should observe the web page efficiently running on your local server.

## Admin Panel

To access the Admin Panel and its privileged functionalities, employ the following credentials:

- Username: admin
- Password: admin@123

Kindly acknowledge that due to the rapid development of this project, the Admin Panel's functionalities may not be fully functional or may exhibit incompleteness. Specifically, certain features such as deleting contact form submissions may not be entirely implemented at this stage. This project serves as a rudimentary demonstration of PHP and MySQL integration, intended primarily for learning purposes.

## Contribution

Contributions to this project are sincerely appreciated. If you encounter issues or have valuable insights to share, please feel free to open issues or submit pull requests to enhance the project further.

## Credits

Thank you for showing interest in our project! If you have any queries, encounter issues, or wish to provide suggestions, please do not hesitate to open an issue or contact us.

Happy coding!