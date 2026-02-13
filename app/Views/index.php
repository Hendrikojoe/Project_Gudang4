<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <title><?= $title ?></title>
=======
  <title><?= $title ?> - ElegantSite</title>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<<<<<<< HEAD
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #2c3e50;
      --accent-color: #0d6efd;
      --light-bg: #f8f9fa;
      --text-dark: #212529;
=======
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Swiper Slider -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <style>
    :root {
      --primary: #2A3F54;
      --primary-dark: #1E2C3A;
      --primary-light: #3A4F64;
      --accent: #00B4D8;
      --accent-gradient: linear-gradient(135deg, #00B4D8 0%, #0096C7 100%);
      --secondary: #6C757D;
      --success: #2ECC71;
      --warning: #F39C12;
      --danger: #E74C3C;
      --dark: #2C3E50;
      --gray-100: #F8F9FA;
      --gray-200: #E9ECEF;
      --gray-300: #DEE2E6;
      --gray-400: #CED4DA;
      --gray-500: #ADB5BD;
      --gray-600: #6C757D;
      --gray-700: #495057;
      --gray-800: #343A40;
      --gray-900: #212529;
      --white: #FFFFFF;
      --black: #000000;
      --shadow-sm: 0 2px 4px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.03);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.02);
      --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.02);
      --shadow-2xl: 0 25px 50px -12px rgba(0,0,0,0.1);
      --shadow-accent: 0 10px 20px -5px rgba(0, 180, 216, 0.2);
      --border-radius-sm: 0.375rem;
      --border-radius: 0.5rem;
      --border-radius-lg: 0.75rem;
      --border-radius-xl: 1rem;
      --border-radius-2xl: 1.5rem;
      --border-radius-full: 9999px;
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
<<<<<<< HEAD
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: var(--light-bg);
      color: var(--text-dark);
    }

    .navbar {
      background-color: var(--primary-color);
    }

    .navbar-brand {
      font-weight: 600;
    }

    .navbar-brand span {
      color: var(--accent-color);
    }

    .hero-section {
      background-color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-section h1 {
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .hero-section p {
      color: #555;
      max-width: 600px;
      margin: 0 auto 30px;
    }

    .btn-custom {
      padding: 10px 25px;
      border-radius: 30px;
      font-weight: 500;
      border: none;
    }

    .btn-primary {
      background-color: var(--accent-color);
      color: white;
    }

    .btn-outline-dark {
      border: 1px solid #333;
    }

    .features-section {
      background-color: #fff;
      padding: 80px 0;
    }

    .feature-card {
      background: #fff;
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      transition: 0.3s;
    }

    .feature-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transform: translateY(-4px);
    }

    .feature-card i {
      font-size: 2rem;
      color: var(--accent-color);
      margin-bottom: 15px;
    }

    .stats-section {
      background: var(--primary-color);
      color: white;
      padding: 60px 0;
    }

    .stat-item {
      text-align: center;
=======
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--gray-100);
      color: var(--gray-800);
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background: var(--gray-200);
    }

    ::-webkit-scrollbar-thumb {
      background: var(--primary-light);
      border-radius: var(--border-radius-full);
      transition: all 0.3s ease;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: var(--accent);
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      letter-spacing: -0.02em;
    }

    /* Navbar Modern */
    .navbar {
      background: rgba(42, 63, 84, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      padding: 1rem 0;
      box-shadow: var(--shadow-md);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.5rem;
      letter-spacing: -0.02em;
      color: var(--white) !important;
      position: relative;
    }

    .navbar-brand span {
      color: var(--accent);
      position: relative;
      display: inline-block;
    }

    .navbar-brand i {
      color: var(--accent);
      margin-right: 0.5rem;
      transition: transform 0.3s ease;
    }

    .navbar-brand:hover i {
      transform: rotate(360deg);
    }

    .nav-link {
      color: rgba(255,255,255,0.85) !important;
      font-weight: 500;
      padding: 0.5rem 1rem !important;
      margin: 0 0.25rem;
      border-radius: var(--border-radius-sm);
      transition: all 0.3s ease;
      position: relative;
    }

    .nav-link i {
      margin-right: 0.5rem;
      font-size: 0.9rem;
      transition: transform 0.3s ease;
    }

    .nav-link:hover {
      color: var(--white) !important;
      background: rgba(255,255,255,0.1);
    }

    .nav-link:hover i {
      transform: translateY(-2px);
    }

    .nav-link.active {
      color: var(--white) !important;
      background: rgba(0, 180, 216, 0.2);
    }

    .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 1rem;
      right: 1rem;
      height: 2px;
      background: var(--accent);
      border-radius: var(--border-radius-full);
    }

    /* Hero Section Modern */
    .hero-section {
      position: relative;
      padding: 120px 0;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      overflow: hidden;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><polygon points="0,100 100,0 100,100" fill="rgba(255,255,255,0.02)"/></svg>');
      background-size: 100% 100%;
      animation: slideRight 20s linear infinite;
    }

    .hero-section::after {
      content: '';
      position: absolute;
      bottom: -50px;
      left: 0;
      right: 0;
      height: 100px;
      background: linear-gradient(to top right, transparent 49%, var(--white) 50%);
    }

    @keyframes slideRight {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    .hero-content {
      position: relative;
      z-index: 10;
    }

    .hero-badge {
      display: inline-block;
      padding: 0.5rem 1.5rem;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(5px);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: var(--border-radius-full);
      color: var(--white);
      font-weight: 600;
      font-size: 0.875rem;
      letter-spacing: 0.5px;
      margin-bottom: 1.5rem;
      animation: fadeInDown 1s ease;
    }

    .hero-badge i {
      margin-right: 0.5rem;
      color: var(--accent);
    }

    .hero-section h1 {
      font-weight: 800;
      font-size: 3.5rem;
      line-height: 1.2;
      margin-bottom: 1.5rem;
      color: var(--white);
      animation: fadeInUp 1s ease 0.2s both;
    }

    .hero-section .highlight {
      position: relative;
      display: inline-block;
      color: var(--accent);
    }

    .hero-section .highlight::after {
      content: '';
      position: absolute;
      bottom: 10px;
      left: 0;
      width: 100%;
      height: 8px;
      background: rgba(0, 180, 216, 0.3);
      z-index: -1;
      border-radius: var(--border-radius-full);
    }

    .hero-section p {
      font-size: 1.25rem;
      color: rgba(255,255,255,0.9);
      margin-bottom: 2rem;
      max-width: 600px;
      animation: fadeInUp 1s ease 0.4s both;
    }

    .hero-stats {
      display: flex;
      gap: 2rem;
      margin-top: 3rem;
      animation: fadeInUp 1s ease 0.8s both;
    }

    .hero-stat-item {
      text-align: center;
    }

    .hero-stat-value {
      font-size: 2rem;
      font-weight: 800;
      color: var(--white);
      line-height: 1;
      margin-bottom: 0.25rem;
    }

    .hero-stat-label {
      font-size: 0.875rem;
      color: rgba(255,255,255,0.7);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    /* Buttons Modern */
    .btn {
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: var(--border-radius-full);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      border: none;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255,255,255,0.2);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }

    .btn:hover::before {
      width: 300px;
      height: 300px;
    }

    .btn-primary {
      background: var(--accent-gradient);
      color: var(--white);
      box-shadow: var(--shadow-accent);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 25px -5px rgba(0, 180, 216, 0.4);
    }

    .btn-outline {
      background: transparent;
      border: 2px solid rgba(255,255,255,0.3);
      color: var(--white);
    }

    .btn-outline:hover {
      border-color: var(--accent);
      background: var(--accent);
      transform: translateY(-2px);
    }

    /* Features Section Modern */
    .features-section {
      padding: 100px 0;
      background: var(--white);
      position: relative;
    }

    .section-header {
      text-align: center;
      max-width: 600px;
      margin: 0 auto 60px;
    }

    .section-subtitle {
      display: inline-block;
      padding: 0.5rem 1.5rem;
      background: linear-gradient(135deg, rgba(0, 180, 216, 0.1) 0%, rgba(0, 150, 199, 0.1) 100%);
      color: var(--accent);
      font-weight: 600;
      font-size: 0.875rem;
      border-radius: var(--border-radius-full);
      margin-bottom: 1rem;
    }

    .section-title {
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .section-description {
      font-size: 1.125rem;
      color: var(--gray-600);
    }

    .feature-card {
      background: var(--white);
      border-radius: var(--border-radius-xl);
      padding: 2rem;
      box-shadow: var(--shadow-lg);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      border: 1px solid var(--gray-200);
      height: 100%;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--accent-gradient);
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-2xl);
      border-color: transparent;
    }

    .feature-card:hover::before {
      transform: scaleX(1);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, rgba(0, 180, 216, 0.1) 0%, rgba(0, 150, 199, 0.1) 100%);
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
      transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
      background: var(--accent-gradient);
      transform: scale(1.1) rotate(5deg);
    }

    .feature-icon i {
      font-size: 2rem;
      color: var(--accent);
      transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon i {
      color: var(--white);
      transform: scale(1.1);
    }

    .feature-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
    }

    .feature-description {
      color: var(--gray-600);
      margin-bottom: 0;
      line-height: 1.7;
    }

    .feature-link {
      display: inline-flex;
      align-items: center;
      color: var(--accent);
      font-weight: 600;
      font-size: 0.875rem;
      margin-top: 1.5rem;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .feature-link i {
      margin-left: 0.5rem;
      transition: transform 0.3s ease;
    }

    .feature-link:hover {
      color: var(--primary);
    }

    .feature-link:hover i {
      transform: translateX(5px);
    }

    /* Stats Section Modern */
    .stats-section {
      padding: 80px 0;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      position: relative;
      overflow: hidden;
    }

    .stats-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="rgba(255,255,255,0.03)"/></svg>');
      background-size: 60px 60px;
      animation: rotate 60s linear infinite;
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    .stat-card {
      text-align: center;
      padding: 2rem;
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border-radius: var(--border-radius-lg);
      border: 1px solid rgba(255,255,255,0.1);
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      background: rgba(255,255,255,0.15);
      transform: translateY(-5px);
    }

    .stat-icon {
      width: 60px;
      height: 60px;
      background: rgba(255,255,255,0.15);
      border-radius: var(--border-radius-full);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
    }

    .stat-icon i {
      font-size: 1.5rem;
      color: var(--accent);
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    }

    .stat-value {
      font-size: 2.5rem;
<<<<<<< HEAD
      font-weight: 600;
      color: #0dcaf0;
    }

    .info-section {
      padding: 80px 0;
    }

    .info-card {
      background: white;
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      padding: 30px;
    }

    .info-card h3 {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    footer {
      background-color: var(--primary-color);
      color: white;
      padding: 40px 0;
      text-align: center;
    }

    footer p {
      margin: 0;
      color: rgba(255, 255, 255, 0.75);
=======
      font-weight: 800;
      color: var(--white);
      line-height: 1;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      font-size: 0.875rem;
      font-weight: 600;
      color: rgba(255,255,255,0.8);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 0;
    }

    /* Info Section Modern */
    .info-section {
      padding: 100px 0;
      background: var(--gray-100);
    }

    .info-card {
      background: var(--white);
      border-radius: var(--border-radius-xl);
      padding: 2.5rem;
      box-shadow: var(--shadow-lg);
      transition: all 0.3s ease;
      border: 1px solid var(--gray-200);
      height: 100%;
      position: relative;
      overflow: hidden;
    }

    .info-card::after {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 100px;
      height: 100px;
      background: linear-gradient(135deg, transparent 50%, rgba(0, 180, 216, 0.05) 50%);
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-2xl);
      border-color: transparent;
    }

    .info-header {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
    }

    .info-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, rgba(0, 180, 216, 0.1) 0%, rgba(0, 150, 199, 0.1) 100%);
      border-radius: var(--border-radius);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
    }

    .info-icon i {
      font-size: 1.25rem;
      color: var(--accent);
    }

    .info-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 0;
    }

    .info-item {
      display: flex;
      align-items: center;
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--gray-200);
    }

    .info-item:last-child {
      border-bottom: none;
    }

    .info-item i {
      width: 24px;
      color: var(--accent);
      margin-right: 1rem;
    }

    .info-item strong {
      color: var(--primary);
      margin-left: 0.5rem;
    }

    .tech-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .tech-list li {
      display: flex;
      align-items: center;
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--gray-200);
      transition: all 0.3s ease;
    }

    .tech-list li:last-child {
      border-bottom: none;
    }

    .tech-list li:hover {
      transform: translateX(10px);
      color: var(--accent);
    }

    .tech-list i {
      width: 24px;
      color: var(--accent);
      margin-right: 1rem;
    }

    /* Testimonials Section */
    .testimonials-section {
      padding: 100px 0;
      background: var(--white);
    }

    .testimonial-card {
      background: var(--white);
      border-radius: var(--border-radius-xl);
      padding: 2rem;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--gray-200);
      margin: 1rem;
    }

    .testimonial-content {
      margin-bottom: 1.5rem;
    }

    .testimonial-content i {
      color: var(--accent);
      font-size: 1.5rem;
      opacity: 0.3;
      margin-bottom: 1rem;
    }

    .testimonial-content p {
      font-size: 1rem;
      line-height: 1.7;
      color: var(--gray-700);
      font-style: italic;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
    }

    .author-avatar {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
      border-radius: var(--border-radius-full);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
      color: var(--white);
      font-weight: 700;
    }

    .author-info h6 {
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 0.25rem;
    }

    .author-info span {
      font-size: 0.75rem;
      color: var(--gray-600);
    }

    /* CTA Section */
    .cta-section {
      padding: 80px 0;
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      position: relative;
      overflow: hidden;
    }

    .cta-content {
      position: relative;
      z-index: 10;
      text-align: center;
    }

    .cta-title {
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--white);
      margin-bottom: 1rem;
    }

    .cta-description {
      font-size: 1.125rem;
      color: rgba(255,255,255,0.9);
      margin-bottom: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .cta-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
    }

    /* Footer Modern */
    .footer {
      background: var(--primary-dark);
      padding: 60px 0 30px;
      color: var(--white);
    }

    .footer-brand {
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--white);
      margin-bottom: 1rem;
      display: inline-block;
    }

    .footer-brand span {
      color: var(--accent);
    }

    .footer-description {
      color: rgba(255,255,255,0.7);
      margin-bottom: 1.5rem;
      line-height: 1.7;
    }

    .social-links {
      display: flex;
      gap: 1rem;
    }

    .social-link {
      width: 40px;
      height: 40px;
      background: rgba(255,255,255,0.1);
      border-radius: var(--border-radius-full);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      transition: all 0.3s ease;
    }

    .social-link:hover {
      background: var(--accent);
      transform: translateY(-3px);
      color: var(--white);
    }

    .footer-title {
      font-size: 1.125rem;
      font-weight: 700;
      color: var(--white);
      margin-bottom: 1.5rem;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 0.75rem;
    }

    .footer-links a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
    }

    .footer-links a:hover {
      color: var(--accent);
      transform: translateX(5px);
    }

    .footer-links i {
      margin-right: 0.5rem;
      font-size: 0.75rem;
    }

    .footer-bottom {
      margin-top: 3rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      text-align: center;
      color: rgba(255,255,255,0.6);
    }

    .footer-bottom i {
      color: var(--danger);
      animation: heartbeat 1.5s ease infinite;
    }

    @keyframes heartbeat {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    /* Responsive */
    @media (max-width: 991.98px) {
      .hero-section h1 {
        font-size: 2.5rem;
      }
      
      .section-title {
        font-size: 2rem;
      }
      
      .hero-stats {
        flex-wrap: wrap;
      }
    }

    @media (max-width: 767.98px) {
      .hero-section {
        padding: 80px 0;
      }
      
      .hero-section h1 {
        font-size: 2rem;
      }
      
      .hero-section p {
        font-size: 1rem;
      }
      
      .section-title {
        font-size: 1.75rem;
      }
      
      .cta-title {
        font-size: 1.75rem;
      }
      
      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 100%;
      }
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    }
  </style>
</head>
<body>
<<<<<<< HEAD

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Elegant<span>Site</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Beranda</a></li>
          <?php if ($isLoggedIn): ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/register') ?>">Daftar</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/login') ?>">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-section">
    <div class="container">
      <h1>Selamat Datang di ElegantSite</h1>
      <p>
        <?= ($hour < 10) ? "Selamat pagi! Awali harimu dengan semangat baru." :
          (($hour < 15) ? "Selamat siang! Semoga aktivitasmu berjalan lancar." :
          (($hour < 19) ? "Selamat sore! Saatnya rehat sejenak." :
          "Selamat malam! Waktunya menutup hari dengan tenang.")); ?>
      </p>
      <div>
        <?php if ($isLoggedIn): ?>
          <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary me-2">Dashboard</a>
          <a href="<?= base_url('/logout') ?>" class="btn btn-outline-dark">Logout</a>
        <?php else: ?>
          <a href="<?= base_url('/register') ?>" class="btn btn-primary me-2">Mulai Sekarang</a>
          <a href="<?= base_url('/login') ?>" class="btn btn-outline-dark">Masuk Akun</a>
        <?php endif; ?>
=======

  <!-- Navbar Modern -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <i class="fas fa-cube"></i> Elegant<span>Site</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('/') ?>">
              <i class="fas fa-home"></i> Beranda
            </a>
          </li>
          <?php if ($isLoggedIn): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/dashboard') ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/logout') ?>">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/register') ?>">
                <i class="fas fa-user-plus"></i> Daftar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/login') ?>">
                <i class="fas fa-sign-in-alt"></i> Login
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section Modern -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="hero-content">
            <div class="hero-badge">
              <i class="fas fa-rocket"></i> Platform Digital Terpercaya
            </div>
            <h1>
              Solusi Digital <br/>
              <span class="highlight">Profesional</span> untuk Bisnis Anda
            </h1>
            <p>
              <?= ($hour < 10) ? "Selamat pagi! ☀️ Mulai hari Anda dengan semangat baru bersama platform digital terbaik." :
                (($hour < 15) ? "Selamat siang! 🌤️ Waktunya mengoptimalkan produktivitas bisnis Anda." :
                (($hour < 19) ? "Selamat sore! ⛅ Saatnya mengevaluasi perkembangan bisnis hari ini." :
                "Selamat malam! 🌙 Waktunya merencanakan strategi bisnis esok hari.")); ?>
            </p>
            <div class="d-flex gap-3">
              <?php if ($isLoggedIn): ?>
                <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary">
                  <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a href="<?= base_url('/logout') ?>" class="btn btn-outline">
                  <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
              <?php else: ?>
                <a href="<?= base_url('/register') ?>" class="btn btn-primary">
                  <i class="fas fa-rocket me-2"></i> Mulai Sekarang
                </a>
                <a href="<?= base_url('/login') ?>" class="btn btn-outline">
                  <i class="fas fa-key me-2"></i> Masuk Akun
                </a>
              <?php endif; ?>
            </div>
            <div class="hero-stats">
              <div class="hero-stat-item">
                <div class="hero-stat-value">500+</div>
                <div class="hero-stat-label">Klien Puas</div>
              </div>
              <div class="hero-stat-item">
                <div class="hero-stat-value">1000+</div>
                <div class="hero-stat-label">Proyek</div>
              </div>
              <div class="hero-stat-item">
                <div class="hero-stat-value">24/7</div>
                <div class="hero-stat-label">Support</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="hero-image text-center">
            <img src="https://via.placeholder.com/600x400/00B4D8/FFFFFF?text=Dashboard+Analytics" alt="Dashboard Preview" class="img-fluid rounded-4 shadow-2xl">
          </div>
        </div>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
      </div>
    </div>
  </section>

<<<<<<< HEAD
  <section class="features-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2>Fitur Unggulan</h2>
        <p class="text-muted">Didesain untuk performa dan kemudahan maksimal.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-shield-alt"></i>
            <h5>Keamanan Terjamin</h5>
            <p class="text-muted">Sistem terenkripsi untuk menjaga kerahasiaan data Anda.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-bolt"></i>
            <h5>Performa Cepat</h5>
            <p class="text-muted">Optimasi kecepatan dan tampilan di semua perangkat.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-headset"></i>
            <h5>Dukungan 24/7</h5>
            <p class="text-muted">Tim support siap membantu Anda kapan pun diperlukan.</p>
=======
  <!-- Features Section Modern -->
  <section class="features-section">
    <div class="container">
      <div class="section-header" data-aos="fade-up">
        <span class="section-subtitle">
          <i class="fas fa-star me-2"></i> KEUNGGULAN PLATFORM
        </span>
        <h2 class="section-title">Fitur Unggulan Kami</h2>
        <p class="section-description">
          Didesain khusus untuk memberikan pengalaman terbaik dan kemudahan dalam mengelola bisnis Anda.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="feature-title">Keamanan Enterprise</h3>
            <p class="feature-description">
              Sistem keamanan berlapis dengan enkripsi end-to-end dan proteksi data real-time untuk melindungi aset digital Anda.
            </p>
            <a href="#" class="feature-link">
              Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-bolt"></i>
            </div>
            <h3 class="feature-title">Performa Tinggi</h3>
            <p class="feature-description">
              Optimasi kecepatan loading super cepat dengan teknologi terbaru dan arsitektur cloud yang scalable.
            </p>
            <a href="#" class="feature-link">
              Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-headset"></i>
            </div>
            <h3 class="feature-title">Support Premium</h3>
            <p class="feature-description">
              Tim support profesional siap membantu 24/7 dengan response time cepat dan solusi yang tepat sasaran.
            </p>
            <a href="#" class="feature-link">
              Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
            </a>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
          </div>
        </div>
      </div>
    </div>
  </section>

<<<<<<< HEAD
  <section class="stats-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">150+</div>
            <p>Proyek Selesai</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">95%</div>
            <p>Kepuasan Pengguna</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">50+</div>
            <p>Klien Aktif</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">24/7</div>
            <p>Dukungan</p>
=======
  <!-- Stats Section Modern -->
  <section class="stats-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">
              <span class="counter" data-target="150">0</span>+
            </div>
            <div class="stat-label">Proyek Selesai</div>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-smile"></i>
            </div>
            <div class="stat-value">
              <span class="counter" data-target="95">0</span>%
            </div>
            <div class="stat-label">Kepuasan Klien</div>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-building"></i>
            </div>
            <div class="stat-value">
              <span class="counter" data-target="50">0</span>+
            </div>
            <div class="stat-label">Perusahaan Aktif</div>
          </div>
        </div>
        <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">24/7</div>
            <div class="stat-label">Dukungan</div>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
          </div>
        </div>
      </div>
    </div>
  </section>

<<<<<<< HEAD
  <section class="info-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="info-card">
            <h3>Informasi Sistem</h3>
            <p>Tanggal: <?= $date ?></p>
            <p>Waktu Server: <?= $time ?></p>
            <p>PHP Version: <?= $php_version ?></p>
            <p>CodeIgniter: v<?= $ci_version ?></p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-card">
            <h3>Teknologi</h3>
            <ul class="list-unstyled">
              <li>Backend: PHP <?= $php_version ?></li>
              <li>Frontend: JavaScript</li>
              <li>UI Framework: Bootstrap 5</li>
              <li>Database: MySQL</li>
=======
  <!-- Info Section Modern -->
  <section class="info-section">
    <div class="container">
      <div class="section-header" data-aos="fade-up">
        <span class="section-subtitle">
          <i class="fas fa-info-circle me-2"></i> INFORMASI SISTEM
        </span>
        <h2 class="section-title">Teknologi & Spesifikasi</h2>
        <p class="section-description">
          Dibangun dengan teknologi modern dan terpercaya untuk performa maksimal.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <div class="info-card">
            <div class="info-header">
              <div class="info-icon">
                <i class="fas fa-server"></i>
              </div>
              <h3 class="info-title">Informasi Sistem</h3>
            </div>
            <div class="info-item">
              <i class="fas fa-calendar"></i>
              <span>Tanggal: <strong><?= $date ?></strong></span>
            </div>
            <div class="info-item">
              <i class="fas fa-clock"></i>
              <span>Waktu Server: <strong><?= $time ?></strong></span>
            </div>
            <div class="info-item">
              <i class="fas fa-code"></i>
              <span>PHP Version: <strong><?= $php_version ?></strong></span>
            </div>
            <div class="info-item">
              <i class="fas fa-bolt"></i>
              <span>CodeIgniter: <strong>v<?= $ci_version ?></strong></span>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <div class="info-card">
            <div class="info-header">
              <div class="info-icon">
                <i class="fas fa-cogs"></i>
              </div>
              <h3 class="info-title">Stack Teknologi</h3>
            </div>
            <ul class="tech-list">
              <li>
                <i class="fas fa-server"></i>
                Backend: <strong>PHP <?= $php_version ?></strong> dengan CodeIgniter 4
              </li>
              <li>
                <i class="fas fa-code"></i>
                Frontend: <strong>JavaScript (ES6+)</strong> dengan Bootstrap 5
              </li>
              <li>
                <i class="fas fa-database"></i>
                Database: <strong>MySQL</strong> dengan Query Optimizer
              </li>
              <li>
                <i class="fas fa-cloud"></i>
                Hosting: <strong>Cloud Infrastructure</strong> dengan 99.9% Uptime
              </li>
              <li>
                <i class="fas fa-lock"></i>
                Security: <strong>SSL/TLS</strong> + Firewall Protection
              </li>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

<<<<<<< HEAD
  <footer>
    <p>&copy; <?= date('Y') ?> ElegantSite. Dibuat dengan CodeIgniter 4.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
=======
  <!-- Testimonials Section -->
  <section class="testimonials-section">
    <div class="container">
      <div class="section-header" data-aos="fade-up">
        <span class="section-subtitle">
          <i class="fas fa-comments me-2"></i> TESTIMONIAL
        </span>
        <h2 class="section-title">Apa Kata Klien Kami</h2>
        <p class="section-description">
          Pengalaman nyata dari para profesional yang telah menggunakan platform kami.
        </p>
      </div>

      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial-card">
            <div class="testimonial-content">
              <i class="fas fa-quote-right"></i>
              <p>
                "Platform yang sangat membantu dalam mengelola inventaris perusahaan. Fitur lengkap dan mudah digunakan. Tim support sangat responsif!"
              </p>
            </div>
            <div class="testimonial-author">
              <div class="author-avatar">BS</div>
              <div class="author-info">
                <h6>Budi Santoso</h6>
                <span>CEO, TechCorp</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-card">
            <div class="testimonial-content">
              <i class="fas fa-quote-right"></i>
              <p>
                "Keamanan data terjamin dan performa sangat cepat. Dashboard yang informatif memudahkan monitoring stok real-time."
              </p>
            </div>
            <div class="testimonial-author">
              <div class="author-avatar">SA</div>
              <div class="author-info">
                <h6>Siti Aminah</h6>
                <span>Manager, RetailPro</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial-card">
            <div class="testimonial-content">
              <i class="fas fa-quote-right"></i>
              <p>
                "Integrasi yang mulus dengan sistem existing. Reporting feature sangat detail dan customizable. Highly recommended!"
              </p>
            </div>
            <div class="testimonial-author">
              <div class="author-avatar">AR</div>
              <div class="author-info">
                <h6>Ahmad Rizki</h6>
                <span>Owner, Toko Maju</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-content" data-aos="zoom-in">
        <h2 class="cta-title">Siap Mengoptimalkan Bisnis Anda?</h2>
        <p class="cta-description">
          Bergabunglah dengan ratusan perusahaan lain yang telah merasakan kemudahan mengelola bisnis dengan platform kami.
        </p>
        <div class="cta-buttons">
          <?php if ($isLoggedIn): ?>
            <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary">
              <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
          <?php else: ?>
            <a href="<?= base_url('/register') ?>" class="btn btn-primary">
              <i class="fas fa-rocket me-2"></i> Mulai Gratis
            </a>
            <a href="<?= base_url('/login') ?>" class="btn btn-outline">
              <i class="fas fa-key me-2"></i> Masuk Akun
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Modern -->
  <footer class="footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <a href="<?= base_url('/') ?>" class="footer-brand">
            <i class="fas fa-cube"></i> Elegant<span>Site</span>
          </a>
          <p class="footer-description">
            Platform digital terpercaya untuk membantu mengembangkan bisnis Anda dengan teknologi terkini dan tim profesional.
          </p>
          <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="social-link"><i class="fab fa-github"></i></a>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-2">
          <h5 class="footer-title">Produk</h5>
          <ul class="footer-links">
            <li><a href="#"><i class="fas fa-chevron-right"></i> Fitur</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Harga</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Integrasi</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Update</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <h5 class="footer-title">Perusahaan</h5>
          <ul class="footer-links">
            <li><a href="#"><i class="fas fa-chevron-right"></i> Tentang</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Karir</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Kontak</a></li>
          </ul>
        </div>
        <div class="col-lg-2">
          <h5 class="footer-title">Dukungan</h5>
          <ul class="footer-links">
            <li><a href="#"><i class="fas fa-chevron-right"></i> Pusat Bantuan</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Dokumentasi</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
            <li><a href="#"><i class="fas fa-chevron-right"></i> Status</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> ElegantSite. Dibuat dengan <i class="fas fa-heart"></i> menggunakan CodeIgniter 4.</p>
        <p class="mt-2 small opacity-75">Version 2.0.0 - All rights reserved</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    // Initialize AOS
    AOS.init({
      duration: 800,
      once: true,
      offset: 100,
      easing: 'ease-in-out'
    });

    // Counter Animation
    function animateCounter(element) {
      const target = parseInt(element.getAttribute('data-target'));
      const current = parseInt(element.innerText);
      const increment = target / 50;
      
      if (current < target) {
        element.innerText = Math.ceil(current + increment);
        setTimeout(() => animateCounter(element), 30);
      } else {
        element.innerText = target;
      }
    }

    // Start counter animation when stats section is visible
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const counters = document.querySelectorAll('.counter');
          counters.forEach(counter => {
            counter.innerText = '0';
            animateCounter(counter);
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
      observer.observe(statsSection);
    }

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.style.background = 'rgba(42, 63, 84, 0.98)';
        navbar.style.boxShadow = 'var(--shadow-lg)';
      } else {
        navbar.style.background = 'rgba(42, 63, 84, 0.95)';
        navbar.style.boxShadow = 'var(--shadow-md)';
      }
    });

    // Active nav link based on scroll position
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
      let current = '';
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 200) {
          current = section.getAttribute('id');
        }
      });

      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
          link.classList.add('active');
        }
      });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });

    // Typing effect for hero paragraph
    const heroParagraph = document.querySelector('.hero-section p');
    if (heroParagraph) {
      const originalText = heroParagraph.textContent;
      heroParagraph.textContent = '';
      
      let i = 0;
      function typeWriter() {
        if (i < originalText.length) {
          heroParagraph.textContent += originalText.charAt(i);
          i++;
          setTimeout(typeWriter, 50);
        }
      }
      
      // Start typing effect after page load
      window.addEventListener('load', typeWriter);
    }

    // Dynamic greeting update
    function updateGreeting() {
      const hour = new Date().getHours();
      const greetingElement = document.querySelector('.hero-section p');
      let greeting = '';
      
      if (hour < 10) {
        greeting = "Selamat pagi! ☀️ Mulai hari Anda dengan semangat baru bersama platform digital terbaik.";
      } else if (hour < 15) {
        greeting = "Selamat siang! 🌤️ Waktunya mengoptimalkan produktivitas bisnis Anda.";
      } else if (hour < 19) {
        greeting = "Selamat sore! ⛅ Saatnya mengevaluasi perkembangan bisnis hari ini.";
      } else {
        greeting = "Selamat malam! 🌙 Waktunya merencanakan strategi bisnis esok hari.";
      }
      
      if (greetingElement && greetingElement.textContent !== greeting) {
        greetingElement.textContent = greeting;
      }
    }

    setInterval(updateGreeting, 60000);

    // Tooltip initialization
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Popover initialization
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl);
    });
  </script>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
</body>
</html>
