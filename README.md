# CSRF Security Lab

A vulnerable PHP application created to demonstrate and learn Cross-Site Request Forgery (CSRF) attacks and defenses.

## Project Structure

```
victims/
└── csrf-lab/
    ├── assets/
    ├── attacker/
    ├── css/
    ├── includes/
    ├── levels/
    ├── login.php
    ├── dashboard.php
    ├── logout.php
    └── db.php
```

## Features

- User login system
- Dashboard
- Email change functionality
- Multiple CSRF security levels
- Educational attack demonstrations

## Technologies Used

- PHP
- HTML
- CSS
- Apache
- Kali Linux

## Purpose

This project was built for educational purposes to understand:

- Cross-Site Request Forgery (CSRF)
- Session management
- CSRF tokens
- Web application security

## Disclaimer

This project is intended only for learning and testing in a controlled lab environment.

## Vulnerabilities Included

This lab demonstrates different Cross-Site Request Forgery (CSRF) scenarios for educational purposes.

- Low Level
  - No CSRF protection
  - Vulnerable to forged requests

- Medium Level
  - Basic CSRF token implementation
  - Demonstrates weak protection techniques

- High Level
  - Strong CSRF token validation
  - Uses secure token comparison

- Impossible Level
  - Proper CSRF protection
  - Secure implementation using strong validation

## Installation

### Requirements

- Kali Linux (or any Linux distribution)
- Apache2
- PHP
- MySQL/MariaDB

### Setup

1. Clone the repository

```bash
git clone https://github.com/aslu75632-oss/csrf-security-lab.git
```

2. Copy the project into the Apache web root.

3. Start Apache and MySQL.

```bash
sudo systemctl start apache2
sudo systemctl start mariadb
```

4. Create the required database and import the SQL file (if applicable).

5. Open your browser and navigate to:

```
http://localhost/victims/csrf-lab/
```

6. Log in and begin testing the different CSRF security levels.
