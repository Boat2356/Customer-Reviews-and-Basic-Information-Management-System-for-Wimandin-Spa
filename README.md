# Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa
## Tools required
- [Composer](https://getcomposer.org/download/): A program used for managing various libraries for PHP language.
- [XAMPP](https://www.apachefriends.org/download.html): A program to simulate a computer as a web server.
- [Visual Studio Code](https://code.visualstudio.com/download): used to edit and modify code.
- [Laravel 10](https://laravel.com/docs/10.x/releases): Free and open source PHP framework that is designed to develop web applications in the PHP language (server-side) using the architectural style Model-View-Controller (MVC).
- MySQL: A relational database management system using SQL language.
  
## Settings (.evn file)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wimandinspa (DB name in MySQL)
DB_USERNAME=root
DB_PASSWORD=
```

## Commands
```
# Refresh the database and run all database seeds...
php artisan migrate:refresh --seed
```

```
# PHP's built-in development server
php artisan serve
```

## Requirement
Wimandin Spa is a comprehensive alternative health service provider located behind Khon Kaen University, near the Noppharat dormitory. The spa has a serene atmosphere and offers a variety of services such as Thai massage, oil massage, foot massage, skin scrub, and more, all at affordable prices. In addition, they continuously offer interesting promotions, which has led us to be interested in developing a system related to Wimandin Spa.

From our interview, we gathered that what the spa wants is a system to store its information to be displayed on a website for customers to view. This would also serve as an additional advertising channel for the spa, apart from its Facebook page.

Therefore, our system is designed to deal with Wimandin Spa, capable of storing customer data, promotions, and various services of the shop comprehensively.

## System requirements
1. For customers:
- Customers can register and log in to the system to write reviews on the website.
- Customers can view the massage or spa services of the shop.
- Customers can view various posts to follow news or promotions of the shop.
2. For employees or administrators:
- They can add/edit/delete post types.
- They can add/edit/delete posts.
- They can add/edit/delete types of massage services.
- They can add/edit/delete massage services.
- They can add/edit/delete rooms.
- They can add/edit/delete frequently asked questions.
- They can add/edit/delete the contact information of the shop.
- They can edit the status / delete customer reviews.

## Entity Relationship Diagram (ERD)

<p align="center">
  <img width="839" height="931" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/c7a7ae62-bf9c-4721-8b4b-0a6f98a4a409">
</p>

## Relational Database Model

<p align="center">
  <img width="1716" height="450" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/6ab05681-a94d-4a7e-b05f-fc67f7d097ee">
</p>

## Data Dictionary
#### Table : User ข้อมูลผู้ใช้  
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|UserID |Bigint(20)| รหัสผู้ใช้| PK, NOT NULL, AUTO INCREMENT|
|Name |VARCHAR(40)| ชื่อ|
|Email| VARCHAR(40)| อีเมล|
|phone| CHAR(10)| เบอร์โทรศัพท์|
|User_type| VARCHAR(1)| ประเภทผู้ใช้งาน|
|password| VARCHAR(20)| รหัสผ่าน|

#### Table : Review ข้อมูลการรีวิว
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|ReviewID| Bigint(20)| รหัสการรีวิว| PK, NOT NULL, AUTO INCREMENT|
|ReviewContent| VARCHAR2(2000)| เนื้อหาการรีวิว|
|Rating| NUMBER(1)| คะแนนรีวิว |
|createDate| DATE| วันที่รีวิวถูกสร้าง| 
|updateDate| DATE| วันที่รีวิวถูกอัพเดตล่าสุด| 
|img| VARCHAR(255)| ภาพประกอบการรีวิว| 
|UserID| Bigint(20)| รหัสลูกค้า| FK |
|ReviewStatus| TINYINT(1)| สถานะการรีวิว |

#### Table : PostType ข้อมูลประเภทของการโพสต์
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|PostTypeID| Bigint(20)| รหัสประเภทโพสต์| PK, NOT NULL, AUTO INCREMENT|
|PostTypeName| VARCHAR(255)| ชื่อประเภทโพสต์|

#### Table : Post ข้อมูลการโพสต์
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|PostID| Bigint(20)| รหัสโพสต์| PK, NOT NULL, AUTO INCREMENT|
|PostTitle| VARCHAR(255)| หัวข้อโพสต์|
|PostContent| VARCHAR(255)| เนื้อหาการโพสต์|
|createDate| DATE| วันที่โพสต์ถูกสร้าง|
|updateDate| DATE| วันที่โพสต์ถูกอัพเดตล่าสุด|
|PostStatus| TINYINT(1)| สถานะของโพสต์|
|img| VARCHAR(255)| ภาพประกอบการโพสต์|
|UserID| Bigint(20)| รหัสลูกค้า| FK |
|PostTypeID| Bigint(20)| รหัสประเภทโพสต์| FK |

#### Table : ContactInfo ข้อมูลติดต่อของทางร้าน
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|ContactID| Bigint(20)| รหัสติดต่อ| PK, NOT NULL, AUTO INCREMENT|
|Address| VARCHAR(255)| ที่อยู่|
|OpenHour| VARCHAR(255)| เวลาทำงาน|
|Phone_number| CHAR(10)| เบอร์โทร|
|Line| VARCHAR(255)| ไลน์เพื่อติดต่อ|
|Facebook| VARCHAR(255)| เฟซบุ๊กเพื่อติดต่อ|
|UserID| Bigint(20)| รหัสลูกค้า| FK |

#### Table : TreatmentType ข้อมูลประเภทของบริการ
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|TreatmentTypeID| Bigint(20)| รหัสประเภทบริการ| PK, NOT NULL, AUTO INCREMENT|
|TreatmentTypeName| VARCHAR(255)| ชื่อประเภทบริการ|

#### Table : Treatment ข้อมูลบริการนวด
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|TreatmentID| Bigint(20)| รหัสทรีทเมนท์| PK, NOT NULL, AUTO INCREMENT|
|TreatmentName| VARCHAR(255)| ชื่อทรีทเมนท์|
|Price| NUMBER(4)| ราคา|
|duration| VARCHAR(255)| ระยะเวลา|
|UserID| Bigint(20)| รหัสลูกค้า| FK |
|img| VARCHAR(255)| ภาพประกอบของทรีทเมนท์|

#### Table : FAQ ข้อมูลคำถามที่พบบ่อย
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|FAQid| Bigint(20)| รหัส FAQ| PK, NOT NULL, AUTO INCREMENT|
|question| VARCHAR(255)| คำถาม|
|answer| VARCHAR(255)| คำตอบ |
|UserID| Bigint(20)| รหัสลูกค้า| FK |

#### Table : Room ข้อมูลห้องนวด
| Column Name  | Data type | Description | Constraint |
|     :---:     |     :---:     |     :---:     |     :---:      |
|RoomID| Bigint(20)| รหัสพนักงาน| PK, NOT NULL, AUTO INCREMENT|
|size| VARCHAR(255)| แพ็คเกตของห้อง|
|UserID| Bigint(20)| รหัสลูกค้า| FK |
|img| VARCHAR(255)| ภาพประกอบของห้อง|
|Name| VARCHAR(255)| ชื่อห้อง|
|description| VARCHAR(255)| รายละเอียด|

## Web design
1. For customers (Both anonymous and who have already logged in.)
- Home Page
- Service Page is a dropdown composed of the Treatment Page and the Room Page
- Post Page is a dropdown composed of the Promotion Page and the News Page
- FAQ Page
- Review Page
- Login Page is divided into the Sign-in Page, Registration Page, and Forgot Password Page.

2. For employees or administrators
- Dashboard Page
- Admin Profile page
- All post types Page
- All post page
- All treatment types page
- All treatment page
- All rooms page
- All reviews page
- All frequently asked questions (faq) page
- All contact page
