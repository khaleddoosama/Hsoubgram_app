# Your Project Name

## Installation and Setup

Follow these steps to clone and run the project locally:

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

### 2. Install Dependencies
```bash
composer install
```

If the project has frontend dependencies, install them using:
```bash
npm install
```

### 3. Set Up Environment File
```bash
cp .env.example .env
```

Then, open the `.env` file and configure your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Make sure the database exists in your MySQL server before running the next step.

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Database Migrations & Seeders
```bash
php artisan migrate --seed
```

### 6. Create Storage Symlink
```bash
php artisan storage:link
```

### 7. Start the Application
```bash
php artisan serve
```

The application will now be available at:  
`http://127.0.0.1:8000`

### 8. (Optional) Run Frontend Build
If the project uses Vite or another frontend bundler:
```bash
npm run dev
```

### 9. Login Credentials
Use any seeded email from the database and the default password `password` to log in.

---

Now your Laravel project should be up and running
