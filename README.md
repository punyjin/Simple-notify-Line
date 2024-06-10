# ตัวอย่างระบบสแกนบัตรและแจ้งเตือนผ่าน LINE 

## เกี่ยวกับโปรเจคนี้
โปรเจคนี้เป็นเว็บไซต์ที่มีระบบสแกนบัตรและสามารถส่งการแจ้งเตือนผ่าน LINE ได้            
และ สามารถจัดการ User ด้วยระบบหลังบ้านได้ ( ฟีเจอร์ในอนาคต )
โดยโปรเจคนี้มีเป้าหมายเพื่อการยกตัวอย่างการสแกนบัตรนักศึกษา และ แจ้งเตือนเข้าไปยังไลน์ อีกทั้งยังสามารถจัดการดูแลรายบุคคลในหลังบ้านได้อีกด้วย 

## ฟีเจอร์ในโปรเจคนี้ 
- **การสแกนบัตร**: จะเรียกใช้ตัวเลขที่ป้อนเข้ามาผ่านการสแกน Barcode เพื่อเช็คกับระบบ
- **การแจ้งเตือนผ่าน LINE**: ส่งการแจ้งเตือนเรียลไทม์ไปยังผู้ใช้ผ่าน LINE
- **แผงควบคุม**: แผงควบคุมสำหรับผู้ดูแลระบบเพื่อตรวจสอบประวัติการสแกนและจัดการการแจ้งเตือน ( ฟีเจอร์ในอนาคต )

## เครื่องมือ และ ภาษาที่ใช้ในโปรเจคนี้
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **LINE Messaging API**: ใช้ในการส่งการแจ้งเตือน

## สื่งที่ต้องมี
ตรวจสอบอุปกรณ์ของท่านก่อนว่าได้ทำตามข้อกำหนดต่อไปนี้หรือไม่:
- ติดตั้ง PHP และเว็บเซิร์ฟเวอร์ (เช่น XAMPP,IIS, Apache ฯลฯ) บนเครื่อง
- ตั้งค่าและรัน MySQL เซิร์ฟเวอร์
- บัญชีผู้ใช้ LINE Developer และสร้างช่องทาง (Channel) สำหรับการใช้งาน
  
## การติดตั้ง
1. ติดตั้งโปรแกรมรัน WebApplication (XAMPP,IIS, ฯลฯ):
   
   **[XAMPP](https://www.apachefriends.org/download.html)**
2. ติดตั้งโปรแกรมจัดการฐานข้อมูล (Navicat ฯลฯ):

   **[Navicat](https://navicat.com/en/)**
3. ติดตั้งโปรแกรมรัน MySQL (หากลง XAMPP แล้วไม่จำเป็นต้องติดตั้ง):

   **[MySQL](https://www.mysql.com/)**
   
4. ดาวน์โหลดและแตกไฟล์ หรือจะโคลนก็ได้:
   ```bash
   git clone https://github.com/punyjin/Simple-notify-Line.git
5. นำเข้าฐานข้อมูล MySQL:
   ```bash
   mysql -u your_username -p your_database < database.sql
6. ตั้งค่า MySQL ใน Connect.php ให้ตรงกับที่ได้ตั้งค่าไว้:
     ```bash
    $host = 'localhost'; // ชื่อโฮสต์ของฐานข้อมูล
    $db = 'databasename'; // ชื่อฐานข้อมูล
    $user = 'username'; // ชื่อผู้ใช้ฐานข้อมูล
    $pass = 'password'; // รหัสผ่านผู้ใช้ฐานข้อมูล
7. ตั้งค่า LINE API ในไฟล์ scan.php:
   ```bash
   $lineToken = "Your Token"; // ใส่ Token Line Notify

   
