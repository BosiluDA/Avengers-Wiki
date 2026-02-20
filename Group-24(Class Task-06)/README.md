# Avengers Wiki - Database Setup

## Database Configuration

The app uses MySQL with these settings (in `db_config.php`):
- **Host:** localhost
- **Database:** avengers_wiki
- **User:** root
- **Password:** (empty)

## Setup

1. Start XAMPP Apache and MySQL
2. The database and `characters` table are created automatically when you run:
   ```bash
   mysql -u root < setup_database.sql
   ```
3. Open `http://localhost/Group-24(Class Task-06)/Group-24(Class Task-06)/index.html` in your browser

## Database Structure

**characters** table:
- id (AUTO_INCREMENT)
- name, real_name, status, team, abilities
- created_at
