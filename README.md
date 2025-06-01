# 🕒 Attendance Management System (PHP)

This is a simple **Attendance Management System** built using **Core PHP** and **MySQL**. It allows users to log in, check in/out, apply for leave, and manage employee attendance records.

---

## Table of Contents
- [Features](#-features)
- [Project Structure](#-project-structure)
- [Technologies Used](#-technologies-used)
- [Installation](#-installation)
- [License](#-license)

---


## 🚀 Features

- ✅ **Employee Check-in/Check-out** with timestamp recording.
- 📊 **Dashboard** with attendance summaries (present/absent/late).
- 📝 **Leave Management**:
  - Apply for leave (Casual/Sick).
  - Admin approval/rejection.
- 🔐 **Secure Login/Logout** with session management.
- 🛠 **Admin Controls**:
  - Add/edit/delete employees.
  - View/modify attendance records.
- 💡 **AJAX-Powered**:
  - Dynamic form submissions.
  - Real-time updates without page reloads.
---

## 📁 Project Structure
attendance-system-php/
├── assets/ # CSS/JS/Images
│ ├── css/
│ ├── js/
│ └── img/
├── config/ # Database and settings
│ └── db.php
├── includes/ # Reusable components
│ ├── header.php
│ └── footer.php
├── admin/ # Admin panel
│ ├── dashboard.php
│ ├── employees.php
│ └── leaves.php
├── employee/ # Employee views
│ ├── checkin.php
│ └── leave_apply.php
├── index.php # Login page
└── README.md

---

## 🛠 Technologies Used
| Component       | Technology               |
|-----------------|--------------------------|
| **Frontend**    | HTML5, CSS3, JavaScript (AJAX) |
| **Backend**     | PHP (Core)               |
| **Database**    | MySQL                    |
| **Security**    | PHP Sessions             |
| **Server**      | Apache / XAMPP           |

---

## ⚙️ Installation
1. **Prerequisites**:
   - PHP 8.0+
   - MySQL 5.7+
   - Apache/Nginx

2. **Setup**:
   ```bash
   git clone https://github.com/your-repo/attendance-system-php.git
   cd attendance-system-php
---
 ##  📜 License
MIT License. See LICENSE for details.


