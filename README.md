#  Cloud Data Storage Platform

A secure web-based cloud storage application built using **HTML, CSS, PHP, and MySQL**.  
This platform allows users to:

✅ Register & Login (Unique username + email)  
✅ Upload files & images  
✅ View uploaded files  
✅ Download files  
✅ Delete files  
✅ Private storage for each user  
✅ User-specific folders  



##  Features

###  User Authentication
- Secure password hashing
- Unique username & email validation
- Login/Logout system

###  File Management
- Upload any file type
- Image preview support (JPG, PNG, GIF)
- Download files
- Delete files
- Auto-created user folders:

  uploads/user_USERID/
  

###  Database Tables
- **users** → stores login details  
- **files** → stores uploaded file paths  

---

##  Technologies Used

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache + MySQL)  
- **Version Control:** Git & GitHub  

---

##  How to Run

1. Install XAMPP  
2. Copy project folder to:

3. Start Apache & MySQL  
4. Import SQL:

- Open `http://localhost/phpmyadmin`
- Create DB → `cloud_storage`
- Import:

users (id, username, email, password)
files (id, user_id, filename, filepath)

http://localhost/cloud_storage_platform/

