# Online Academia E-Learning System

This is an E-Learning System built using Laravel 10, Breeze, Socialite, Vue.js 3, Inertia Js, JavaScript and Tailwind CSS. The application features a fully responsive design. It includes a SideNavOverlay animation for seamless navigation and provides functionalities for adding and managing Courses.

### Features

1. Login and Register: Securely log in to your account or create a new account to get started. Keep your personal information safe and accessible through our authentication system. You can also login using Github or Google.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/7f8e8a00-b6a8-44bb-b687-26612a2ad045)

2. Profile Management: Easily manage your profile information.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/80fd790f-ac64-4b83-91d3-fc66fa8626f2)

3. Responsive Design: Enjoy a seamless learning experience across various devices, including desktops, tablets, and smartphones. Our platform is designed to adapt to different screen sizes, ensuring comfortable access anytime, anywhere.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/6d6db68c-da08-45c3-90ac-d0516c5a2279)
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/fe163d77-8e55-4452-8b85-0ff7a9ff05fc)

4. Add Courses and Add Episodes: Create and publish new courses, providing valuable content to eager learners. Divide courses into episodes, making it easier for students to navigate and learn at their own pace.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/c161da03-9b92-4751-bccb-bd1b44452ec8)

5. Manage and Delete Courses: Shows the table of all Courses. If a course is no longer relevant, educators can remove it from the platform. Deleting a course ensures that learners only have access to high-quality, current content.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/0adfeb01-1d89-41a9-95ea-edf4ef5c7e6e)

6. View Course Page: Browse and discover a wide range of courses offered by our talented educators. Get a quick overview of course details, including descriptions, episode lists, and instructor information.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/b5417693-503e-4582-8925-1c4babb89764)

7. Watch Episodes: Dive into course content by watching individual episodes. Take advantage of the flexibility to pause, rewind, or rewatch episodes to grasp the concepts effectively.
![image](https://github.com/pawdgreyt/online-academia/assets/52988042/2a3ca2b3-6e9f-4920-9551-85734888ce36)

### Installation

1. Clone this repository to your local machine or server:

   ```bash
   git clone https://github.com/pawdgreyt/online-academia.git

2. Navigate to the project directory:

   ```bash
   cd online-academia

3. Install PHP and Node.js dependencies:

   ```bash
   composer install
   npm install

4. Rename .env.example to .env and configure your database settings.
5. Also Open the .env file and set your GitHub OAuth application credentials:
   
   ```bash
   GITHUB_CLIENT_ID=your-github-client-id
   GITHUB_CLIENT_SECRET=your-github-client-secret
   GITHUB_CALLBACK_URL=http://your-app-url/login/github/callback
    
   GOOGLE_CLIENT_ID=your-github-client-id
   GOOGLE_CLIENT_SECRET=your-github-client-secret
   GOOGLE_CALLBACK_URL=http://your-app-url/login/google/callback

6. Generate a new application key:

   ```bash
   php artisan key:generate

7. Generate a new application key:

   ```bash
   php artisan key:generate

8. Run database migration and seeders: 

   ```bash
   php artisan migrate
   php artisan db:seed

9. Start the development server and compile assets:

   ```bash
   php artisan serve
   npm run dev

11. Visit http://localhost:8000 in your browser to access the application.
   

   
