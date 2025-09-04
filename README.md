Attendance Website Project
A Centralized LAN-Based Laboratory System for Attendance Tracking and Activity Logs Monitoring.
This project allows users to submit attendance via a website, stores the data in a MySQL database, and can be accessed across the local network. The system is containerized using Docker for easy setup and consistent environments.

Description
This project demonstrates a full workflow of creating a web-based attendance system with PHP, Apache, and MySQL using Docker.
It allows:
-Tracking attendance via a web interface.
-Storing attendance data securely in a MySQL database.
-Accessing the website from multiple devices on the same LAN.
-Easy setup using Docker containers for both the database and web server.

This README provides a step-by-step guide to replicate the setup, test the system, and update the project.

Setup Guide
1. Install Docker
Install Docker on your MacBook (or your development machine).

Verify installation:
docker --version


2. Set up MySQL in Docker
Pull the MySQL image:
docker pull mysql:latest

Run the MySQL container:
docker run --name attendance-db -e MYSQL_ROOT_PASSWORD=yourpassword -d mysql:latest

Create a database for the project using a MySQL client (MySQL Workbench, CLI, or PHPMyAdmin).
Allow other devices on your LAN (e.g., Windows PC) to connect to this MySQL instance if needed.

Notes:
Replace yourpassword with a strong password.
Make sure your firewall allows incoming connections to MySQL port (3306).


3. Create the Website
On your MacBook, create your project folder, e.g., attendance-website.

Build your website files:
index.php (main page)
style.css (styling)
scripts.js (optional scripts)

Any additional PHP or resource files
Test locally to ensure everything works before deploying to Docker.


4. Set up PHP and Apache in Docker
Pull the PHP-Apache image:
docker pull php:apache

Run a container and mount your project folder:
docker run -d -p 8080:80 -v /path/to/attendance-website:/var/www/html --name attendance-web php:apache

Access the website from another device on the same LAN:
http://<Mac-IP>:8080

Notes:
Replace /path/to/attendance-website with the absolute path to your project folder.
<Mac-IP> is your MacBook’s IP address on the local network.

5. Test Website and Database
Submit data through the website form.
Check that the submitted data is reflected in the MySQL database.
Verify from both MacBook and other connected devices to ensure proper functionality.


6. Version Control with Git
Initialize Git repository (if not already done):
git init

Add all project files:
git add .
git commit -m "Initial project setup"

Connect to GitHub and push:
git remote add origin https://github.com/YourUsername/attendance-website.git
git push -u origin main


7. Updating the Project
Whenever you make updates, such as adding CSS, JS, or new PHP files:
Test your changes locally or in Docker.

Stage, commit, and push updates to GitHub:
git add .
git commit -m "Added new CSS and updated homepage layout"
git push

8. Notes & Best Practices
Always backup your MySQL data before making major changes.
Document any new steps you do in this README to make it easier to remember in the future.

Use Docker volumes to persist database data between container restarts:
docker run -v db_data:/var/lib/mysql ...
