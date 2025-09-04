# Centralized LAN-Based Laboratory System for Attendance Tracking and Activity Logs Monitoring

A **Centralized LAN-Based Laboratory System** that allows users to submit attendance via a website. The data is stored in a MySQL database and can be accessed across the local network. The system is containerized using **Docker** for easy setup and consistent environments.

---

## 🛠️ Setup Guide

### 1. Install Docker
- Install Docker on your MacBook (or your development machine).  
- Verify installation:
    docker --version

---

### 2. Set up MySQL in Docker
1. Pull the MySQL image:
    docker pull mysql:latest

2. Run the MySQL container:
    docker run --name attendance-db -e MYSQL_ROOT_PASSWORD=yourpassword -d mysql:latest

3. Create a database for the project using a MySQL client (MySQL Workbench, CLI, or PHPMyAdmin).  
4. Allow other devices on your LAN to connect to this MySQL instance if needed.

**Notes:**
- Replace `yourpassword` with a strong password.
- Ensure your firewall allows incoming connections to MySQL port (3306).

---

### 3. Create the Website
1. On your MacBook, create your project folder, e.g., `attendance-website`.  
2. Build your website files:
   - `index.php` (main page)
   - `submit.php` (handles form submissions)
   - CSS, JS, or other resource files  
3. Test locally to ensure everything works before deploying to Docker.

---

### 4. Set up PHP and Apache in Docker
1. Pull the PHP-Apache image:
    docker pull php:apache

2. Run a container and mount your project folder:
    docker run -d -p 8080:80 -v /path/to/attendance-website:/var/www/html --name attendance-web php:apache

3. Access the website from another device on the same LAN:
    http://<Mac-IP>:8080

**Notes:**
- Replace `/path/to/attendance-website` with the absolute path to your project folder.  
- `<Mac-IP>` is your MacBook’s IP address on the local network.

---

### 5. Test Website and Database
- Submit data through the website form.  
- Check that the submitted data is reflected in the MySQL database.  
- Verify functionality from both MacBook and other connected devices.

---

### 6. Version Control with Git
1. Initialize Git repository (if not already done):
    git init

2. Add all project files:
    git add .
    git commit -m "Initial project setup"

3. Connect to GitHub and push:
    git remote add origin https://github.com/YourUsername/attendance-website.git
    git push -u origin main

---

### 7. Updating the Project
Whenever you make updates, such as adding CSS, JS, or new PHP files:

1. Test your changes locally or in Docker.  
2. Stage, commit, and push updates to GitHub:
    git add .
    git commit -m "Added new CSS and updated homepage layout"
    git push

---

### ⚙️ Notes & Best Practices
- Backup your MySQL data before making major changes.  
- Document any new steps in this README for easier reference.  
- Use Docker volumes to persist database data between container restarts:
    docker run -v db_data:/var/lib/mysql ...

---

### Recommended Project Structure
attendance-website/
├── index.php
├── submit.php
├── css/
│   └── style.css
├── js/
│   └── scripts.js
├── Dockerfile
└── README.md

---

### Step-by-Step Process Summary
1. Install Docker on your MacBook.  
2. Install MySQL in Docker and create a database.  
3. Build your website project folder (`index.php`, `submit.php`, CSS, JS).  
4. Set up PHP and Apache in Docker, mount your project folder, and run the container.  
5. Access the website from your MacBook or other devices on the LAN.  
6. Test form submissions to confirm database updates.  
7. Track your project with Git and push changes to GitHub.  
8. Document any new steps or updates in the README for future reference.
