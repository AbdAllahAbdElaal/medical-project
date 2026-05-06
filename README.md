# Hope Medical Foundation (Simple Multi-Page)

Simple website built with:
- HTML
- CSS
- JavaScript
- Bootstrap 5 (CDN)
- PHP mail handler for contact form

## Pages
- `index.html` (Home)
- `about.html` (About)
- `programs.html` (Programs)
- `news.html` (News)
- `contact.html` (Contact form)
- `thank-you.html` (Success page)
- `contact.php` (Server-side form handler)

## Before Upload
1. Open `contact.php`.
2. Change this line to your real email:
   - `$to = "info@hopemedical.org";`

## Hosting Requirements
- Any hosting that supports **PHP** and `mail()`.
- Domain/SSL is optional but recommended.

## Upload Steps
1. Upload all files to your `public_html` (or root web folder).
2. Keep all files in the same folder.
3. Make sure file names stay exactly the same.
4. Visit `yourdomain.com/contact.html` and test the form.

## Notes
- If your host disables PHP `mail()`, use SMTP (PHPMailer) later.
- This project is intentionally simple for easy editing and expansion.
