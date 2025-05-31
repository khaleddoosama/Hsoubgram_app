# مشروع Hsoubgram

## تثبيت وتشغيل المشروع

نقوم بفتح المشروع وفي منفذ الأوامر نقوم بالخطوات التالية:

### 1- استنساخ المشروع من GitHub:
```bash
git clone https://github.com/khaleddoosama/Hsoubgram_app.git
cd Hsoubgram_app
2- تثبيت الحزم المطلوبة:composer install

3-المشروع يحتوي على واجهة أمامية، نقوم أيضًا بتثبيت حزم NPM:  npm install

4- إنشاء ملف البيئة (.env): cp .env.example .env

5-إعداد قاعدة البيانات في ملف .env تأكد من إنشاء قاعدة البيانات مسبقًا باستخدام phpMyAdmin أو أي أداة إدارة قواعد بيانات.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_databasename
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

6- توليد مفتاح التطبيق: php artisan key:generate

7- إنشاء جداول قاعدة البيانات وإدخال بيانات تجريبية: php artisan migrate --seed

8- إنشاء رابط التخزين للصور: php artisan storage:link

9- تشغيل السيرفر المحلي: php artisan serve

10- تشغيل واجهة المستخدم الأمامية المشروع يستخدم Vite: npm run dev











