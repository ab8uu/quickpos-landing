<?php
$nameError = $_GET['name_error'] ?? '';
$emailError = $_GET['email_error'] ?? '';
$messageError = $_GET['message_error'] ?? '';
$oldName = $_GET['old_name'] ?? '';
$oldEmail = $_GET['old_email'] ?? '';
$oldMessage = $_GET['old_message'] ?? '';

function safe_value(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS | Smart POS Landing Page</title>
    <meta name="description" content="QuickPOS helps you manage billing, inventory, and sales with a modern point-of-sale system.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <nav class="navbar container">
            <a href="#home" class="logo">QuickPOS</a>
            <button class="menu-toggle" id="menuToggle" aria-label="Open menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <a href="#contact" class="btn btn-primary nav-btn">Get Started</a>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="container hero-grid">
                <div class="hero-content">
                    <p class="pill">Modern POS for Growing Businesses</p>
                    <h1>Manage Your Store Smarter with QuickPOS</h1>
                    <p class="hero-subtitle">Modern POS system for shops and businesses.</p>
                    <div class="hero-actions">
                        <a href="#pricing" class="btn btn-primary">Start Free Trial</a>
                        <a href="#features" class="btn btn-secondary">Explore Features</a>
                    </div>
                </div>
                <div class="hero-card">
                    <h3>Live Store Snapshot</h3>
                    <ul>
                        <li><span>Today's Sales</span><strong>$3,420</strong></li>
                        <li><span>Orders</span><strong>147</strong></li>
                        <li><span>Low Stock Items</span><strong>08</strong></li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="features" class="section">
            <div class="container">
                <div class="section-title">
                    <p>Features</p>
                    <h2>Everything You Need To Run Your Store</h2>
                </div>
                <div class="card-grid">
                    <article class="feature-card">
                        <div class="icon">⚡</div>
                        <h3>Fast Billing</h3>
                        <p>Generate bills instantly.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon">📦</div>
                        <h3>Inventory Management</h3>
                        <p>Track products automatically.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon">📊</div>
                        <h3>Sales Reports</h3>
                        <p>View analytics and sales reports.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon">☁️</div>
                        <h3>Cloud Backup</h3>
                        <p>Securely save your data online.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="pricing" class="section pricing-section">
            <div class="container">
                <div class="section-title">
                    <p>Pricing</p>
                    <h2>Simple Plans For Every Business Size</h2>
                </div>
                <div class="card-grid pricing-grid">
                    <article class="pricing-card">
                        <h3>Basic Plan</h3>
                        <p class="price">$9/month</p>
                        <ul>
                            <li>Single outlet support</li>
                            <li>Daily sales summary</li>
                            <li>Email support</li>
                        </ul>
                        <button type="button" class="btn btn-secondary">Choose Plan</button>
                    </article>
                    <article class="pricing-card featured">
                        <span class="badge">Most Popular</span>
                        <h3>Pro Plan</h3>
                        <p class="price">$19/month</p>
                        <ul>
                            <li>Multi-outlet management</li>
                            <li>Advanced inventory tools</li>
                            <li>Priority support</li>
                        </ul>
                        <button type="button" class="btn btn-primary">Choose Plan</button>
                    </article>
                    <article class="pricing-card">
                        <h3>Enterprise Plan</h3>
                        <p class="price">$49/month</p>
                        <ul>
                            <li>Unlimited users and stores</li>
                            <li>Custom integrations</li>
                            <li>Dedicated account manager</li>
                        </ul>
                        <button type="button" class="btn btn-secondary">Choose Plan</button>
                    </article>
                </div>
            </div>
        </section>

        <section id="contact" class="section">
            <div class="container contact-wrap">
                <div class="section-title left">
                    <p>Contact</p>
                    <h2>Let's Talk About Your Business</h2>
                    <span>Send us a quick message and our team will connect with you.</span>
                </div>
                <form action="process.php" method="post" class="contact-form" novalidate>
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="<?= safe_value($oldName); ?>">
                    <?php if ($nameError !== ''): ?>
                        <p class="error"><?= safe_value($nameError); ?></p>
                    <?php endif; ?>

                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="<?= safe_value($oldEmail); ?>">
                    <?php if ($emailError !== ''): ?>
                        <p class="error"><?= safe_value($emailError); ?></p>
                    <?php endif; ?>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5"><?= safe_value($oldMessage); ?></textarea>
                    <?php if ($messageError !== ''): ?>
                        <p class="error"><?= safe_value($messageError); ?></p>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-content">
            <div class="social-links">
                <a href="#" aria-label="Facebook">Facebook</a>
                <a href="#" aria-label="Instagram">Instagram</a>
                <a href="#" aria-label="LinkedIn">LinkedIn</a>
                <a href="#" aria-label="Twitter/X">Twitter/X</a>
            </div>
            <p>&copy; 2026 QuickPOS. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
