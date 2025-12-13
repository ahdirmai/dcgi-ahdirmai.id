# Technical Reference - DCGI CMS

## Architecture

-   **Framework**: Laravel 12.x
-   **Frontend**: Blade + Tailwind CSS (Vite)
-   **Admin Theme**: Laravel Breeze (Blade/Alpine)

## Database Schema

### Tables

-   `visions`: `id`, `content`
-   `missions`: `id`, `content`
-   `albums`: `id`, `title`, `description`, `cover_image_path`
-   `achievements`: `id`, `year`, `title`, `description`
-   `team_members`: `id`, `name`, `role`, `type` ('leadership', 'member')
-   `galleries` (Polymorphic):
    -   `image_path`
    -   `caption`
    -   `galleryable_id`
    -   `galleryable_type`

### Polymorphic Relationships

The `Gallery` model is used to store images for multiple entities:

-   **Album**: `morphMany` (Technically set up, though currently Album uses a direct `cover_image_path` for the main cover, and could use Gallery for inside photos).
-   **Achievement**: `morphMany` (Stores all slider images).
-   **TeamMember**: `morphOne` (Stores the profile picture).

## Excel Import

-   **Library**: `maatwebsite/excel`
-   **Import Class**: `App\Imports\TeamMembersImport`
    -   Implements `ToModel`, `WithHeadingRow`.
    -   Maps columns: `name`, `role`, `type`.
-   **Export Class**: `App\Exports\TeamMembersTemplateExport`
    -   Returns headers for the template.

## Admin Routes

Prefix: `/admin`
Name Prefix: `admin.`

-   `dashboard`: `App\Http\Controllers\Admin\DashboardController`
-   `vision-mission`: `VisionMissionController`
-   `albums`: `AlbumController`
-   `achievements`: `AchievementController`
-   `team`: `TeamMemberController`
    -   `team.import` (POST)
    -   `team.template` (GET)

## Frontend Integration

-   **Controller**: `App\Http\Controllers\WelcomeController`
-   **View**: `welcome.blade.php`
-   **Assets**: `@vite(['resources/css/app.css', 'resources/js/app.js'])` (Tailwind v4)
