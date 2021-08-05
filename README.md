### ตัวอย่างการทำ Login ด้วย YRU Passport

1. เปิด cmd หรือ terminal (macOs)
2. ```git clone https://github.com/nirusduddin/laravel8-login-with-yru-passport.git```
3. ``` cd laravel8-login-with-yru-passport```
4. รันคำสั่ง ```composer update``` เพื่อติดตั้ง packages
5. รันคำสั่ง ```copy .env.example .env``` หรือ ```cp .env.example .env```
6. นำค่า CLIENT_ID และ CLIENT_SECRET จากเจ้าหน้าที่ นำไปใส่ที่ไฟล์ .env
7. สร้างฐานข้อมูลและตั้งค่าการเชื่อมต่อที่ไฟล์ .env
8. รันคำสั่ง ```php artisan migrate``` เพื่อสร้างตารางข้อมูล
9. รันเว็บแอป ```php artisan serve```
10. Enjoy!


<i>***หมายเหตุ ในเครื่องต้องมี php (7.4), git, composer</i>
