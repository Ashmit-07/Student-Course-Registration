# Student Course Registration System

A web-based DBMS project developed using **PHP**, **MySQL**, **HTML**, and **CSS** for managing student course registrations in an academic environment.

The system allows users to:

* manage students
* manage instructors
* manage courses
* register students into courses
* track total credits
* view registration details

---

## 🚀 Features

### 👨‍🎓 Student Management

* Add students
* View all students
* Delete students

### 👨‍🏫 Instructor Management

* Add instructors
* View instructors
* Delete instructors

### 📚 Course Management

* Add courses
* View courses
* Delete courses

### 📝 Registration System

* Register students into courses
* Prevent duplicate registrations
* View all registrations
* Delete registrations

### 📊 Analytics

* View courses registered by each student
* Calculate total registered credits per student

### 🎨 UI Features

* Responsive card-based homepage
* Smooth hover animations
* Gradient borders and effects
* Modern clean interface
* Interactive buttons and tables

---

# 🛠️ Technologies Used

| Technology | Purpose                  |
| ---------- | ------------------------ |
| PHP        | Backend Logic            |
| MySQL      | Database                 |
| HTML       | Structure                |
| CSS        | Styling & Animations     |
| XAMPP      | Local Server Environment |

---

# 🗄️ Database Schema

## Tables Used

* Student
* Instructor
* Course
* Department
* Semester
* Registration

---

# 🔗 Relationships

* A Department can have multiple Students
* A Department can offer multiple Courses
* A Department can have multiple Instructors
* An Instructor can teach multiple Courses
* A Student can register for multiple Courses
* A Course can have multiple registered Students
* A Semester can contain multiple Registrations

---

# 📂 Project Structure

```plaintext
student-course-registeration/
│
├── index.php
├── db.php
├── style.css
│
├── add_student.php
├── view_students.php
├── delete_student.php
│
├── add_instructor.php
├── view_instructors.php
├── delete_instructor.php
│
├── add_course.php
├── view_courses.php
├── delete_course.php
│
├── register.php
├── view_registration.php
├── delete_registration.php
│
├── student_courses.php
├── total_credits.php
│
└── course_registration.sql
```

---

# ⚙️ Installation & Setup

## 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/student-course-registeration.git
```

---

## 2️⃣ Move Project Folder

Move the folder into:

```plaintext
xampp/htdocs/
```

---

## 3️⃣ Start XAMPP

Start:

* Apache
* MySQL

---

## 4️⃣ Import Database

1. Open phpMyAdmin
2. Create database:

```sql
course_registration
```

3. Import:

```plaintext
course_registration.sql
```

---

## 5️⃣ Run the Project

Open browser:

```plaintext
http://localhost/student-course-registeration/
```

---

# 🧠 DBMS Concepts Used

* Primary Keys
* Foreign Keys
* Normalization (up to 3NF)
* One-to-Many Relationships
* Many-to-Many Relationships
* SQL Joins
* Aggregate Functions
* Constraints
* CRUD Operations

---

# 📸 Screenshots

Add screenshots here for:

* Homepage
* Add Student
* Add Course
* Registration Page
* View Registrations
* Total Credits

---

# 🔮 Future Improvements

* User Authentication System
* Update/Edit Functionality
* Search & Filters
* Export Reports
* Mobile Responsive Design
* Admin Dashboard

---

# 👨‍💻 Authors

* Ashmit Pradhan
* Jestin Jaison

---

# 📄 License

This project is developed for educational purposes.
