# CRUD Application Setup Instructions

## 📋 What's Included

This project contains a complete CRUD (Create, Read, Update, Delete) application with:
- **crud.php** - Main application file with HTML form and table
- **db_config.php** - Database configuration
- **database.sql** - SQL schema with sample data
- **Dockerfile** - Container configuration for PHP application
- **docker-compose.yml** - Orchestrates PHP and MySQL containers

## 🚀 How to Run with Docker

### Prerequisites
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop)
- Make sure Docker is running

### Steps to Start the Application

1. **Open Terminal in Project Directory**
   ```bash
   cd "c:\Users\NAYEEM\OneDrive\Desktop\desktop_and_Web_Course"
   ```

2. **Start Docker Containers**
   ```bash
   docker-compose up -d
   ```
   This will:
   - Download MySQL and PHP images
   - Create and start containers
   - Initialize the database with sample data

3. **Access the Application**
   - Open your browser and go to: `http://localhost:8080/crud.php`

4. **Stop the Application**
   ```bash
   docker-compose down
   ```

5. **Stop and Remove All Data** (including database)
   ```bash
   docker-compose down -v
   ```

## 🔧 Features

- ✅ **Create** - Add new users with name, email, and phone
- ✅ **Read** - View all users in a beautiful table
- ✅ **Update** - Edit existing user information
- ✅ **Delete** - Remove users with confirmation
- 🎨 **Responsive Design** - Works on all devices
- 🐳 **Dockerized** - Easy deployment with Docker

## 📊 Database Information

- **Database Name**: crud_db
- **Table Name**: users
- **Columns**: id, name, email, phone, created_at, updated_at

## 🔐 Default Credentials

- **MySQL Root Password**: rootpassword
- **Database User**: crud_user
- **Database Password**: crud_password

## 🌐 Ports

- **Web Application**: http://localhost:8080
- **MySQL Database**: localhost:3306

## 📝 Troubleshooting

If you encounter any issues:

1. **Check if containers are running:**
   ```bash
   docker ps
   ```

2. **View container logs:**
   ```bash
   docker-compose logs
   ```

3. **Restart containers:**
   ```bash
   docker-compose restart
   ```

4. **Rebuild containers:**
   ```bash
   docker-compose up -d --build
   ```

Enjoy your CRUD application! 🎉
