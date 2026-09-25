# Internship & Placement Management System
PHP + MySQL + Bootstrap starter MVP.

## XAMPP
1. Copy this folder to C:\xampp\htdocs\
2. Start Apache and MySQL.
3. Import sql/placement_db.sql in phpMyAdmin.
4. Open http://localhost/internship_placement_management_system/

Admin demo:
email: admin@example.com
password: password

Students and companies can register.

## AWS target
EC2 (Apache/PHP) -> RDS MySQL
S3 for resumes/documents
SNS for notifications
CloudWatch for monitoring
GitHub + CI/CD for deployment

Before production, move DB credentials to environment variables/Secrets Manager and restrict RDS 3306 to the EC2 security group.
