نقوم بفتح المشروع و في منفذ الاوامر نقوم

1- تثبيت الحزم المطلوبة:composer install

2- -المشروع يحتوي على واجهة أمامية، نقوم أيضًا بتثبيت حزم:npm install

3- إنشاء ملف البيئة(.env):cp .env.example .env

3- توليد مفتاح التطبيق:php artisan key:generate

4- إعداد قاعدة البيانات في ملف .env تأكد من إنشاء قاعدة البيانات مسبقًا باستخدام phpMyAdmin أو أي أداة إدارة قواعد بيانات. DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_databasename

DB_USERNAME=your_db_username

DB_PASSWORD=your_db_password

5-إنشاء جداول قاعدة البيانات:php artisan migrate

6- إدخال بيانات تجريبية : php artisan db:seed

7- إنشاء رابط التخزين للصور : php artisan storage:link

8- تشغيل السيرفر المحلي:php artisan serve

9- تشغيل واجهة المستخدم الأمامية المشروع يستخدم:npm run dev