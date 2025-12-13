# User Guide - DCGI Content Management System

## Overview

This CMS allows administrators to manage the dynamic content of the DC Genderang Irama landing page.

## Access

-   **URL**: `/admin/dashboard`
-   **Login**: Use your admin credentials.

## Features

### 1. Dashboard

The dashboard provides quick access cards to all management sections:

-   Vision & Mission
-   Gallery Albums
-   Achievements
-   Team Members

### 2. Vision & Mission

**Manage the organizations core values.**

-   **Vision**: Update the main vision statement.
-   **Missions**: Add, edit, or delete individual mission points.

### 3. Gallery Albums

**Manage the photo gallery.**

-   **Create Album**: Upload a cover image, set a title and description.
-   **Edit/Delete**: Modify existing albums. _Note: Uploading photos to an album is handled via the specific album view (future feature) or currently just managing the album entity itself for the front page grid._

### 4. Achievements

**Showcase awards and recognitions.**

-   **Add Achievement**: Enter year, title, description.
-   **Images**: Upload multiple images for a single achievement. These appear in the modal on the homepage.
-   **Edit**: You can add more images or delete existing ones.

### 5. Team Members

**Manage Leadership and Members.**

-   **Add Member**:
    -   **Name**: Full name.
    -   **Role**: Position (e.g., 'Ketua', 'Anggota').
    -   **Type**: Select 'Leadership' for the top section or 'Member' for the scrolling list.
    -   **Image**: Upload a profile picture.
-   **Excel Import**:
    1. Click **Download Template** to get the correct Excel format.
    2. Fill in the data (`name`, `role`, `type`).
    3. Upload the file using the "Import" form.
    4. Click **Import** to bulk add members.

## Security

-   All admin routes are protected.
-   Images are stored in the public disk.
