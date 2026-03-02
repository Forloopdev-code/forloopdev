# Forloop Front-End Replication Prompt

Use this prompt to guide Claude Code in replicating the Forloop front-end design system, component architecture, and visual patterns for a **Next.js + Medusa.js** e-commerce project.

---

## Tech Stack

Build with:
- **Next.js 14+** (App Router)
- **TypeScript** (strict mode)
- **Tailwind CSS 3.4+** with custom config
- **Medusa.js** storefront SDK
- **Montserrat** font (Google Fonts / `next/font`)

Install Tailwind plugins:
```bash
npm install @tailwindcss/forms @tailwindcss/typography
```

---

## Font Setup (Next.js)

```typescript
// app/layout.tsx
import { Montserrat } from 'next/font/google';

const montserrat = Montserrat({
  subsets: ['latin'],
  variable: '--font-montserrat',
  display: 'swap',
});

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en" className={montserrat.variable}>
      <body className="bg-neutral-900 text-platinum font-sans antialiased">
        {children}
      </body>
    </html>
  );
}
```

---

## Tailwind Configuration

```typescript
// tailwind.config.ts
import type { Config } from 'tailwindcss';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const config: Config = {
  content: [
    './app/**/*.{js,ts,jsx,tsx,mdx}',
    './components/**/*.{js,ts,jsx,tsx,mdx}',
  ],
  theme: {
    colors: {
      jet:          '#363537',   // Dark gray - primary bg, navbar
      trueBlue:     '#3066BE',   // Blue - accent, links
      platinum:     '#E0E0E0',   // Light gray - text, borders
      pistachio:    '#8ED081',   // Green - success, published status
      persianGreen: '#1EA896',   // Teal - primary buttons, focus states
      white:        '#ffffff',
      black:        '#000000',
      transparent:  'transparent',
      current:      'currentColor',
      neutral: {
        50:  '#fafafa',
        100: '#f5f5f5',
        200: '#e5e5e5',
        300: '#d4d4d4',
        400: '#a3a3a3',
        500: '#737373',
        600: '#525252',
        700: '#404040',
        800: '#262626',
        900: '#171717',
      },
    },
    extend: {
      fontFamily: {
        sans: ['var(--font-montserrat)', 'system-ui', 'sans-serif'],
      },
      backgroundImage: {
        'brand-gradient':   'linear-gradient(135deg, #8ED081 0%, #1EA896 50%, #3066BE 100%)',
        'brand-gradient-r': 'linear-gradient(to right, #8ED081, #1EA896, #3066BE)',
        'hero-overlay':     'linear-gradient(to bottom, rgba(54,53,55,0.7) 0%, rgba(54,53,55,0.85) 100%)',
      },
    },
  },
  plugins: [forms, typography],
};

export default config;
```

---

## Typography System

| Use Case     | Weight          | Tailwind Classes                                      |
|--------------|-----------------|-------------------------------------------------------|
| Headlines    | Black (900)     | `text-3xl font-black uppercase tracking-tight text-white` |
| Subheadings  | ExtraBold (800) | `text-xs font-bold uppercase tracking-widest text-persianGreen` |
| Body         | Regular/Medium  | `text-sm text-neutral-300` or `text-neutral-400`      |
| Labels       | Semibold (600)  | `text-xs font-semibold uppercase tracking-wide text-neutral-500` |
| Buttons      | Bold (700)      | `text-xs font-bold uppercase tracking-widest`         |

---

## Dark Theme Patterns

This is a **dark-first design**. Key patterns:

| Element           | Classes                                    |
|-------------------|-------------------------------------------|
| Page background   | `bg-neutral-900`                          |
| Card background   | `bg-neutral-800` or `bg-neutral-800/60`   |
| Navbar            | `bg-jet`                                  |
| Borders           | `border-neutral-700` or `border-neutral-600` |
| Primary text      | `text-white` or `text-neutral-200`        |
| Secondary text    | `text-neutral-300` or `text-neutral-400`  |
| Muted text        | `text-neutral-500`                        |

---

## Core Components

### Button Components

```typescript
// components/ui/Button.tsx
import { ButtonHTMLAttributes, forwardRef } from 'react';
import { cn } from '@/lib/utils';

interface ButtonProps extends ButtonHTMLAttributes<HTMLButtonElement> {
  variant?: 'primary' | 'secondary' | 'danger' | 'gradient';
}

export const Button = forwardRef<HTMLButtonElement, ButtonProps>(
  ({ className, variant = 'primary', children, ...props }, ref) => {
    const variants = {
      primary: 'bg-persianGreen text-white hover:bg-pistachio active:bg-persianGreen focus:ring-persianGreen',
      secondary: 'bg-white text-neutral-700 border border-neutral-300 hover:bg-neutral-50 focus:ring-trueBlue',
      danger: 'bg-[#dc2626] text-white hover:bg-[#b91c1c] active:bg-[#991b1b] focus:ring-[#dc2626]',
      gradient: 'bg-brand-gradient text-white hover:opacity-90 hover:scale-[1.03]',
    };

    return (
      <button
        ref={ref}
        className={cn(
          'inline-flex items-center justify-center gap-2 px-4 py-2 rounded-md font-bold text-xs uppercase tracking-widest transition-all duration-150',
          'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-neutral-800',
          'disabled:opacity-50 disabled:cursor-not-allowed',
          variants[variant],
          className
        )}
        {...props}
      >
        {children}
      </button>
    );
  }
);
Button.displayName = 'Button';
```

### Text Input

```typescript
// components/ui/Input.tsx
import { InputHTMLAttributes, forwardRef } from 'react';
import { cn } from '@/lib/utils';

interface InputProps extends InputHTMLAttributes<HTMLInputElement> {
  label?: string;
  error?: string;
}

export const Input = forwardRef<HTMLInputElement, InputProps>(
  ({ className, label, error, id, ...props }, ref) => {
    return (
      <div className="space-y-1">
        {label && (
          <label htmlFor={id} className="block text-xs font-semibold uppercase tracking-wide text-neutral-300">
            {label}
          </label>
        )}
        <input
          ref={ref}
          id={id}
          className={cn(
            'w-full bg-neutral-700 border-neutral-600 text-white placeholder-neutral-500',
            'focus:border-persianGreen focus:ring-persianGreen rounded-md shadow-sm',
            'transition-colors duration-150',
            error && 'border-[#f87171] focus:border-[#f87171] focus:ring-[#f87171]',
            className
          )}
          {...props}
        />
        {error && <p className="text-xs text-[#f87171]">{error}</p>}
      </div>
    );
  }
);
Input.displayName = 'Input';
```

### Utility Function

```typescript
// lib/utils.ts
import { clsx, type ClassValue } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}
```

---

## Card Components

### Standard Card

```typescript
// components/ui/Card.tsx
import { cn } from '@/lib/utils';

interface CardProps {
  children: React.ReactNode;
  className?: string;
}

export function Card({ children, className }: CardProps) {
  return (
    <div className={cn('bg-neutral-800 rounded-xl border border-neutral-700 p-6', className)}>
      {children}
    </div>
  );
}
```

### Stats Card

```typescript
// components/ui/StatsCard.tsx
import { cn } from '@/lib/utils';

interface StatsCardProps {
  label: string;
  value: string | number;
  icon: React.ReactNode;
  accent: 'blue' | 'green' | 'teal' | 'neutral';
}

const accentStyles = {
  blue: { text: 'text-trueBlue', bg: 'bg-trueBlue/10', border: 'border-trueBlue/20' },
  green: { text: 'text-pistachio', bg: 'bg-pistachio/10', border: 'border-pistachio/20' },
  teal: { text: 'text-persianGreen', bg: 'bg-persianGreen/10', border: 'border-persianGreen/20' },
  neutral: { text: 'text-platinum', bg: 'bg-neutral-700', border: 'border-neutral-600' },
};

export function StatsCard({ label, value, icon, accent }: StatsCardProps) {
  const styles = accentStyles[accent];

  return (
    <div className={cn(
      'bg-neutral-800 rounded-xl p-5 border relative overflow-hidden',
      'group hover:border-opacity-60 transition-all duration-200',
      styles.border
    )}>
      {/* Hover gradient overlay */}
      <div
        className="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
        style={{ background: 'radial-gradient(ellipse at top left, rgba(30,168,150,0.06) 0%, transparent 70%)' }}
      />

      <div className="relative">
        <div className={cn('w-10 h-10 rounded-lg flex items-center justify-center mb-3', styles.bg)}>
          <span className={cn('h-5 w-5', styles.text)}>{icon}</span>
        </div>
        <div className={cn('text-3xl font-black mb-0.5', styles.text)}>{value}</div>
        <div className="text-xs font-semibold uppercase tracking-wider text-neutral-500">{label}</div>
      </div>
    </div>
  );
}
```

### Quick Action Card

```typescript
// components/ui/ActionCard.tsx
import Link from 'next/link';
import { cn } from '@/lib/utils';

interface ActionCardProps {
  href: string;
  label: string;
  icon: React.ReactNode;
  accent?: 'teal' | 'blue' | 'green' | 'neutral';
}

const accentStyles = {
  teal: 'hover:border-persianGreen hover:bg-persianGreen/5 [&_.icon-bg]:bg-persianGreen/10 [&_.icon-bg]:group-hover:bg-persianGreen/20 [&_.icon]:text-persianGreen',
  blue: 'hover:border-trueBlue hover:bg-trueBlue/5 [&_.icon-bg]:bg-trueBlue/10 [&_.icon-bg]:group-hover:bg-trueBlue/20 [&_.icon]:text-trueBlue',
  green: 'hover:border-pistachio hover:bg-pistachio/5 [&_.icon-bg]:bg-pistachio/10 [&_.icon-bg]:group-hover:bg-pistachio/20 [&_.icon]:text-pistachio',
  neutral: 'hover:border-neutral-500 hover:bg-neutral-700/50 [&_.icon-bg]:bg-neutral-700 [&_.icon-bg]:group-hover:bg-neutral-600 [&_.icon]:text-neutral-400 [&_.icon]:group-hover:text-white',
};

export function ActionCard({ href, label, icon, accent = 'teal' }: ActionCardProps) {
  return (
    <Link
      href={href}
      className={cn(
        'group flex flex-col items-center gap-2 p-4 rounded-xl border border-neutral-700',
        'transition-all duration-200 text-center',
        accentStyles[accent]
      )}
    >
      <div className="icon-bg w-10 h-10 rounded-lg flex items-center justify-center transition-colors">
        <span className="icon h-5 w-5">{icon}</span>
      </div>
      <span className="text-xs font-bold text-neutral-300 group-hover:text-white uppercase tracking-wide">
        {label}
      </span>
    </Link>
  );
}
```

---

## Status Badges

```typescript
// components/ui/Badge.tsx
import { cn } from '@/lib/utils';

interface BadgeProps {
  variant: 'live' | 'draft' | 'owner' | 'admin' | 'editor';
  children?: React.ReactNode;
}

const badgeStyles = {
  live: 'bg-pistachio/10 text-pistachio border-pistachio/20',
  draft: 'bg-neutral-700 text-neutral-400 border-neutral-600',
  owner: 'bg-pistachio/20 text-pistachio border-pistachio/30',
  admin: 'bg-trueBlue/20 text-trueBlue border-trueBlue/30',
  editor: 'bg-persianGreen/20 text-persianGreen border-persianGreen/30',
};

const dotColors = {
  live: 'bg-pistachio',
  draft: 'bg-neutral-500',
};

export function Badge({ variant, children }: BadgeProps) {
  const showDot = variant === 'live' || variant === 'draft';
  const labels = { live: 'Live', draft: 'Draft', owner: 'Owner', admin: 'Admin', editor: 'Editor' };

  return (
    <span className={cn(
      'inline-flex items-center gap-1 px-2 py-0.5 rounded border text-xs font-bold uppercase tracking-wide',
      showDot && 'rounded-full',
      badgeStyles[variant]
    )}>
      {showDot && <span className={cn('w-1.5 h-1.5 rounded-full', dotColors[variant as keyof typeof dotColors])} />}
      {children || labels[variant]}
    </span>
  );
}
```

---

## Section Headers

```typescript
// components/ui/SectionHeader.tsx
interface SectionHeaderProps {
  eyebrow?: string;
  title: string;
  subtitle?: string;
}

export function SectionHeader({ eyebrow, title, subtitle }: SectionHeaderProps) {
  return (
    <div>
      {eyebrow && (
        <div className="flex items-center gap-3 mb-1">
          <div className="h-px w-6 bg-brand-gradient-r" />
          <span className="text-xs font-bold tracking-widest uppercase text-persianGreen">{eyebrow}</span>
        </div>
      )}
      <h1 className="text-3xl font-black text-white uppercase tracking-tight">{title}</h1>
      {subtitle && <p className="text-neutral-400 text-sm mt-1">{subtitle}</p>}
    </div>
  );
}

// Simple section title
export function SectionTitle({ children }: { children: React.ReactNode }) {
  return (
    <h2 className="text-xs font-bold tracking-widest uppercase text-neutral-500 mb-4">
      {children}
    </h2>
  );
}
```

---

## Table Component

```typescript
// components/ui/Table.tsx
import Link from 'next/link';
import { cn } from '@/lib/utils';

interface Column<T> {
  key: keyof T | string;
  header: string;
  className?: string;
  render?: (item: T) => React.ReactNode;
}

interface TableProps<T> {
  title: string;
  viewAllHref?: string;
  columns: Column<T>[];
  data: T[];
  keyField: keyof T;
}

export function Table<T>({ title, viewAllHref, columns, data, keyField }: TableProps<T>) {
  return (
    <div className="bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden">
      {/* Header */}
      <div className="flex items-center justify-between px-6 py-4 border-b border-neutral-700">
        <h2 className="text-xs font-bold tracking-widest uppercase text-neutral-500">{title}</h2>
        {viewAllHref && (
          <Link
            href={viewAllHref}
            className="text-xs font-bold text-persianGreen hover:text-pistachio transition-colors uppercase tracking-wide"
          >
            View All &rarr;
          </Link>
        )}
      </div>

      <div className="overflow-x-auto">
        <table className="w-full">
          <thead>
            <tr className="border-b border-neutral-700">
              {columns.map((col) => (
                <th
                  key={String(col.key)}
                  className={cn(
                    'px-6 py-3 text-left text-xs font-bold uppercase tracking-widest text-neutral-500',
                    col.className
                  )}
                >
                  {col.header}
                </th>
              ))}
            </tr>
          </thead>
          <tbody className="divide-y divide-neutral-700">
            {data.map((item) => (
              <tr
                key={String(item[keyField])}
                className="hover:bg-neutral-700/40 transition-colors duration-150 group"
              >
                {columns.map((col) => (
                  <td key={String(col.key)} className={cn('px-6 py-4', col.className)}>
                    {col.render ? col.render(item) : String(item[col.key as keyof T])}
                  </td>
                ))}
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}
```

---

## Layout Components

### Page Container

```typescript
// components/layout/Container.tsx
import { cn } from '@/lib/utils';

interface ContainerProps {
  children: React.ReactNode;
  className?: string;
}

export function Container({ children, className }: ContainerProps) {
  return (
    <div className={cn('py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto', className)}>
      {children}
    </div>
  );
}
```

### Grid Layouts

```typescript
// components/layout/Grid.tsx
import { cn } from '@/lib/utils';

interface GridProps {
  children: React.ReactNode;
  cols?: 2 | 3 | 4;
  className?: string;
}

export function StatsGrid({ children, className }: { children: React.ReactNode; className?: string }) {
  return (
    <div className={cn('grid grid-cols-2 lg:grid-cols-4 gap-4', className)}>
      {children}
    </div>
  );
}

export function ActionsGrid({ children, className }: { children: React.ReactNode; className?: string }) {
  return (
    <div className={cn('grid grid-cols-2 sm:grid-cols-3 gap-3', className)}>
      {children}
    </div>
  );
}

export function ContentGrid({ children, className }: { children: React.ReactNode; className?: string }) {
  return (
    <div className={cn('grid lg:grid-cols-3 gap-6', className)}>
      {children}
    </div>
  );
}
```

---

## Gradient Button (CTA)

```typescript
// components/ui/GradientButton.tsx
import Link from 'next/link';
import { cn } from '@/lib/utils';

interface GradientButtonProps {
  href?: string;
  onClick?: () => void;
  children: React.ReactNode;
  className?: string;
}

export function GradientButton({ href, onClick, children, className }: GradientButtonProps) {
  const classes = cn(
    'inline-flex items-center gap-2 px-5 py-2.5 rounded-lg font-bold text-sm text-white',
    'transition-all duration-150 hover:opacity-90 hover:scale-[1.03]',
    'bg-brand-gradient',
    className
  );

  if (href) {
    return <Link href={href} className={classes}>{children}</Link>;
  }

  return <button onClick={onClick} className={classes}>{children}</button>;
}
```

---

## Icon Components

Use `lucide-react` or inline SVGs:

```bash
npm install lucide-react
```

```typescript
// Example usage
import { Plus, FileText, Users, Settings } from 'lucide-react';

<Plus className="h-4 w-4" />
<FileText className="h-5 w-5 text-persianGreen" />
```

Or create inline SVG components:

```typescript
// components/icons/DocumentIcon.tsx
export function DocumentIcon({ className }: { className?: string }) {
  return (
    <svg className={className} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
      <path fillRule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75-6.75a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clipRule="evenodd" />
    </svg>
  );
}
```

---

## File Structure (Next.js App Router)

```
├── app/
│   ├── layout.tsx              # Root layout with font setup
│   ├── page.tsx                # Landing page
│   ├── globals.css             # Tailwind directives
│   ├── (auth)/
│   │   ├── login/page.tsx
│   │   └── register/page.tsx
│   ├── (store)/
│   │   ├── layout.tsx          # Store layout with nav
│   │   ├── page.tsx            # Product listing
│   │   ├── products/[handle]/page.tsx
│   │   ├── cart/page.tsx
│   │   └── checkout/page.tsx
│   └── (dashboard)/
│       ├── layout.tsx          # Admin layout
│       └── dashboard/page.tsx
├── components/
│   ├── ui/                     # Reusable UI components
│   │   ├── Button.tsx
│   │   ├── Input.tsx
│   │   ├── Card.tsx
│   │   ├── Badge.tsx
│   │   ├── Table.tsx
│   │   └── ...
│   ├── layout/                 # Layout components
│   │   ├── Header.tsx
│   │   ├── Footer.tsx
│   │   ├── Container.tsx
│   │   └── Grid.tsx
│   ├── icons/                  # SVG icon components
│   └── store/                  # E-commerce specific
│       ├── ProductCard.tsx
│       ├── CartDrawer.tsx
│       └── ...
├── lib/
│   ├── utils.ts                # cn() helper
│   └── medusa/                 # Medusa client setup
│       └── client.ts
├── public/
│   └── img/                    # Static images
├── tailwind.config.ts
└── tsconfig.json
```

---

## Medusa Integration Notes

```typescript
// lib/medusa/client.ts
import Medusa from '@medusajs/medusa-js';

export const medusa = new Medusa({
  baseUrl: process.env.NEXT_PUBLIC_MEDUSA_BACKEND_URL || 'http://localhost:9000',
  maxRetries: 3,
});
```

For product cards and e-commerce components, apply the same dark theme patterns:

```typescript
// components/store/ProductCard.tsx
import Image from 'next/image';
import Link from 'next/link';
import { formatPrice } from '@/lib/utils';

interface ProductCardProps {
  product: {
    handle: string;
    title: string;
    thumbnail: string;
    price: number;
  };
}

export function ProductCard({ product }: ProductCardProps) {
  return (
    <Link
      href={`/products/${product.handle}`}
      className="group bg-neutral-800 rounded-xl border border-neutral-700 overflow-hidden hover:border-persianGreen transition-all duration-200"
    >
      <div className="aspect-square relative bg-neutral-700">
        <Image
          src={product.thumbnail}
          alt={product.title}
          fill
          className="object-cover group-hover:scale-105 transition-transform duration-300"
        />
      </div>
      <div className="p-4">
        <h3 className="text-sm font-semibold text-white group-hover:text-persianGreen transition-colors line-clamp-1">
          {product.title}
        </h3>
        <p className="text-lg font-black text-pistachio mt-1">
          {formatPrice(product.price)}
        </p>
      </div>
    </Link>
  );
}
```

---

## Available Image Assets

Copy these from the original project to `public/img/`:

| File | Description |
|------|-------------|
| `logo_name_light.png` | Light logo with company name |
| `forloopLogoGradientName.png` | Gradient version of logo |
| `logo_green_transparent.png` | Green logo on transparent bg |
| `grayscale-transparent.png` | Grayscale logo variant |
| `Hero1.jpg` | Hero section background |
| `laptopImage.jpg` | Feature section image |

---

## Quick Reference: Common Patterns

```typescript
// Card
className="bg-neutral-800 rounded-xl border border-neutral-700 p-6"

// Section title
className="text-xs font-bold tracking-widest uppercase text-neutral-500 mb-4"

// Page heading
className="text-3xl font-black text-white uppercase tracking-tight"

// Body text
className="text-sm text-neutral-300"

// Link
className="text-xs font-bold text-persianGreen hover:text-pistachio transition-colors uppercase tracking-wide"

// Input
className="bg-neutral-700 border-neutral-600 text-white placeholder-neutral-500 focus:border-persianGreen focus:ring-persianGreen rounded-md"

// Gradient background (inline style)
style={{ background: 'linear-gradient(135deg, #8ED081 0%, #1EA896 50%, #3066BE 100%)' }}
```

---

## Key Design Principles

1. **Dark-first:** All backgrounds are neutral-800/900, text is light
2. **Brand colors are accents:** persianGreen for primary actions, pistachio for success, trueBlue for info
3. **Uppercase labels:** Section titles, buttons, badges use `uppercase tracking-widest`
4. **Subtle gradients:** Brand gradient for CTAs, gradient lines for visual accents
5. **Rounded corners:** `rounded-md` default, `rounded-xl` for cards, `rounded-lg` for buttons
6. **Consistent spacing:** `p-4/5/6` for cards, `gap-3/4/6` for grids
7. **Group hover states:** Use `group` and `group-hover:` for coordinated effects
8. **Color transparency:** Use `/10`, `/20` suffixes for subtle backgrounds (e.g., `bg-persianGreen/10`)

---

## Dependencies to Install

```bash
npm install clsx tailwind-merge lucide-react @medusajs/medusa-js
npm install -D @tailwindcss/forms @tailwindcss/typography
```
