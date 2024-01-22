# Student Management System (SMS) in PHP

This is a simple Student Management System implemented in PHP using raw code. The system allows you to perform CRUD operations on student data and manages relationships using MySQL for the database.

## Requirements

- PHP (version  8.2.12)
- MySQL (MySQL version 5.0.37)
- Web server ( Apache,)


## Database Schema
Students Table::

id (Primary Key): Unique identifier for each student.
name: Full name of the student.
age: Age of the student.
course_id (Foreign Key): Relates to the id column in the courses table, indicating the course the student is enrolled in.
Courses Table:

id (Primary Key): Unique identifier for each course.
name: Name of the course.
Admission Table:

id (Primary Key): Unique identifier for each admission record.
student_id (Foreign Key): Relates to the id column in the students table, indicating the student associated with the admission.
admission_date: Date of admission.
admission_type: Type of admission (e.g., regular, transfer).
Teachers Table:

id (Primary Key): Unique identifier for each teacher.
name: Full name of the teacher.
subject: Subject taught by the teacher.
Admin Table:

id (Primary Key): Unique identifier for each admin.
name: Full name of the admin.
username: Username for admin login.
password: Encrypted password for admin login.
Fees Table:

id (Primary Key): Unique identifier for each fee record.
student_id (Foreign Key): Relates to the id column in the students table, indicating the student associated with the fee record.
fee_amount: Amount of the fee.
payment_date: Date of fee payment
