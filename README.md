# DC Genderang Irama - Content Management System

## Overview

This is the official landing page and content management system for **DC Genderang Irama (MAN 2 Model Banjarmasin)**. The system allows administrators to manage dynamic content such as Visions, Missions, Galleries, Achievements, and Team Members via a user-friendly admin interface.

## Key Features

-   **Dynamic Landing Page**: The homepage (`/`) automatically fetches and displays content from the database.
-   **Admin Panel** (`/admin/dashboard`): A secure dashboard to manage all site content.
-   **Vision & Mission Management**: Update the core values of the organization.
-   **Gallery System**: Create albums and upload cover images.
-   **Achievement Showcase**: Manage awards with year, title, description, and multi-image sliders.
-   **Team Management**:
    -   Separate sections for Leadership and Members.
    -   **Excel Import**: Bulk add team members using an Excel template.
    -   **Template Download**: Download the standard Excel format for imports.

## Documentation

Detailed documentation is available in the [`docs/`](./docs) directory:

-   **[User Guide](./docs/user_guide.md)**: Instructions for administrators on how to use the CMS.
-   **[Technical Reference](./docs/technical_reference.md)**: Logic, database schema, and code structure for developers.

## Tech Stack

-   **Framework**: [Laravel 12](https://laravel.com)
-   **Frontend**: Blade Templates + [Tailwind CSS](https://tailwindcss.com) (handled via Vite)
-   **Admin Authentication**: [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
-   **Excel Processing**: [Laravel Excel](https://docs.laravel-excel.com/) (`maatwebsite/excel`)

## Installation

1. **Clone the repository**:

    ```bash
    git clone <repository-url>
    cd dcgi
    ```

2. **Install PHP dependencies**:

    ```bash
    composer install
    ```

3. **Install NPM dependencies**:

    ```bash
    npm install && npm run build
    ```

4. **Environment Setup**:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    _Configure your database settings in `.env`._

5. **Run Migrations & Seeders**:

    ```bash
    php artisan migrate:fresh --seed
    ```

    _This will populate the database with initial data (Vision, Mission, Albums, Achievements, Team)._

6. **Serve the Application**:
    ```bash
    php artisan serve
    ```

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
