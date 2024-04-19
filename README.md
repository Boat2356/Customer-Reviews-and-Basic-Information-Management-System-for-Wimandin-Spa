# Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa
## The tools used in this project.
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


# 1. Web page for customers. (Both anonymous and those who have already logged in.)

## Home Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/94bc540c-8d7a-48cc-8c59-62a07a10f6a8">
</p>
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/0c2a5f54-a7b5-4373-9d26-cb156f9dca19">
</p>
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/a7eb3454-7c7b-4f83-b5ef-6d5cc030cb98">
</p>
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/816113b5-3c62-4f3a-bf73-8e8b04ca58f6">
</p>
  
## Treatment Page
  
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/e0401058-fc4b-43b1-b241-fa7c61481cf9">
</p>

## Room Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/1e6a4693-e6c7-4d96-8c6a-ea93c2bf504e">
</p>

## Promotion Page (Preview version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/a05db92d-103d-476c-857f-995294c592b0">
</p>

## Promotion Page (Detail version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/ed644b34-fa71-4fd7-ba6d-7d12a4bfe39c">
</p> 
  
## News Page (Preview version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/0d0bbe6a-ed1c-4dc7-9734-5a0a1a18b6a7">
</p>

## News Page (Detail version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/4e658b42-a633-481b-a27b-414f4715246e">
</p> 

## Article Page (Preview version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/e9c0914c-3ccc-4aa9-88fb-5cd43eaff385">
</p>

## Article Page (Detail version)

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/746deb5c-a3a3-4221-a8d8-5871f84d6d7a">
</p> 

## FAQ Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/fe14dd3e-10a4-4e8f-9888-0deb199c0045">
</p>

## FAQ Page (Contact)
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/5b248d89-e529-4264-99b6-dcb3df9850b0">
</p> 


## Review Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/d171a26d-3d14-4862-914d-b263ad96d3ce">
</p>

## Review Form Page
<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/3ec4a975-8118-4ea3-b58a-78a9855402d2">
</p> 

## Sign-in Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/8453678f-15c2-4a5e-a3f6-854acac53539">
</p> 

## Registration Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/3f3b288a-023d-4786-9dad-7b7d29ede7c0">
</p> 

## Forgot Password Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/fa7eefce-91e1-4a60-87bf-5acfef417df4)">
</p> 

# 2. Web page for employees and administrators.
## Dashboard Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/33b8d96a-c078-4f70-9762-34336f8be084">
</p> 

## Admin Profile page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/2bcf9497-9926-4e53-97af-93ec8a12ad3a">
</p>

## Post Type Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/cf75805e-0db2-4c58-b580-007e552b9949">
</p>

## Create Post Type Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/a508e015-6962-44d7-b423-c3955f36c4fb">
</p>

## Edit Post Type Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/460018b9-6758-443e-9efb-0ef0316feb23">
</p>

## Post Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/e08b507f-ed31-4a32-a3a0-93c0866db1b9">
</p>

## Create Post Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/db6ac8a1-8bdb-423d-b7c2-91803529488d">
</p>

## Edit Post Page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/af93a7c1-168f-40c6-b2af-7f0f848c045a">
</p>

## Treatment type page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/2030d3f6-dff4-46ff-8854-dedae6e8c37b">
</p>

## Treatment page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/a00dca16-858c-4f3c-a17b-85efa25a7e84">
</p>

## Create Treatment page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/fe8f253a-1864-4afe-a041-04bb24a8d520">
</p>

## Edit Treatment page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/b7dbd8ed-9444-4ceb-b45f-be6fc4ed7839">
</p>

## Rooms page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/d2ed072a-4343-4ca0-ae98-df611e74c662">
</p>

## Create Rooms page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/539c3c98-6d49-4355-9d7f-81f73f7c12a0">
</p>

## Edit Rooms page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/18589f1e-eaab-45bf-8a86-4fa4e7af698b">
</p>

## Reviews page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/0e66cd93-d9a2-45d0-b5ad-9564aee6e83c">
</p>

## Frequently Asked Questions (faq) page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/87199732-89e6-4539-a142-bb1a39f1c6c7">
</p>

## Create FAQ page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/8d123323-8c7a-4ce1-bd68-758f99d99353">
</p>

## Edit FAQ page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/bd6411ad-ef1c-4ff0-a824-49bd339cbc73">
</p>

## Contact page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/f3aecd43-b464-4060-b03e-5e32cf3622ae">
</p>

## Create Contact page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/d18322d5-5181-4d2b-90fe-2a67dd4c5235">
</p>

## Edit Contact page

<p align="center">
  <img width="745" height="344" src="https://github.com/Boat2356/Customer-Reviews-and-Basic-Information-Management-System-for-Wimandin-Spa/assets/140761543/d7500e53-9965-4f46-a797-761681cc3625">
</p>
