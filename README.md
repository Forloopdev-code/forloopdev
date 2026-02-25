# Forloop

A full-stack web application and client portal built for **Forloop** — a web/software development company with a strong focus on design.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 10 (PHP 8.1+) |
| Frontend | Vue 3 + Inertia.js |
| Styling | Tailwind CSS 3.4 |
| Build Tool | Vite 5 |
| Database | MongoDB |
| Auth | Laravel Jetstream + Fortify + Sanctum |
| Testing | PHPUnit 10 |

---

## Features

- **Authentication** — Register, login, email verification, password reset, two-factor authentication
- **Team Management** — Create teams, invite members, manage roles and permissions
- **Profile Management** — Update profile info, profile photo, password, and connected sessions
- **API Token Management** — Generate and revoke Sanctum API tokens
- **Branded UI** — Custom Forloop color palette, typography, and assets throughout

---

## Getting Started

### Prerequisites

- PHP 8.1+
- Composer
- Node.js & npm
- MongoDB connection

### Installation

```bash
# Clone the repo
git clone <repo-url>
cd <project-directory>

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file and configure
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Build frontend assets
npm run dev
```

### Environment

Update your `.env` file with your MongoDB connection string, mail settings, and any other environment-specific config before running the app.

---

## Project Structure

```
app/
├── Actions/         # Fortify & Jetstream action classes
├── Http/            # Controllers, middleware, kernel
├── Models/          # User, Team, Membership, TeamInvitation
├── Policies/        # Authorization policies
└── Providers/       # Service providers

resources/
├── js/
│   ├── Pages/       # Inertia page components (Vue 3)
│   ├── Components/  # Reusable UI components
│   └── Layouts/     # App layout wrappers
└── views/           # Blade templates & email views

routes/
├── web.php          # Web routes
└── api.php          # API routes
```

---

## Brand

Forloop's custom brand colors are registered in `tailwind.config.js`:

| Token | Color | Hex |
|---|---|---|
| `pistachio` | Green | `#8ED081` |
| `persianGreen` | Teal | `#1EA896` |
| `trueBlue` | Blue | `#3066BE` |
| `jet` | Dark Gray | `#363537` |
| `platinum` | Light Gray | `#E0E0E0` |

Typography uses **Montserrat** across all weights.

---

## License

Private — © Forloop. All rights reserved.
