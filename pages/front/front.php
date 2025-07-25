<?php
    session_start();


if(isset($_SESSION['logged_in']) == TRUE){
        header("Location: ../task/indexhome.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queuepal</title>
    <link rel="icon" type="image/x-icon" href="../../assets/images/flogo.png">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="front.css">
    
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <a href="#" class="logo">Queue<span>pal</span></a>
            <div class="nav-links">
                <a href="#home">Home</a>
                <a href="#features">How It Works</a>
                <a href="#testimonials">Testimonials</a>
                <a href="#">Contact</a>
            </div>
            <div class="nav-buttons">
                <a href="../auth/login.php" class="btn btn-outline">Log In</a>
                <a href="../auth/registration.php" class="btn btn-primary">Sign Up Free</a>
            </div>
        </nav>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="container">
            <h1>Your productivity powerhouse</h1>
            <p>Capture, organize, and tackle your to-dos from anywhere. Escape the clutter and chaos—unleash your
                productivity with Queuepal.</p>
            <div class="home-buttons">
                <a href="../auth/registration.php" class="btn btn-primary">Get Started - It's Free</a>
            </div>
            <div class="home-image">
                <img src="../../assets/images/display.png" alt="Queuepal Dashboard">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Work Smarter, Not Harder</h2>
                <p>Stay organized and efficient with Inbox, Boards, and Planner. Every to-do, idea, or responsibility—no
                    matter how small—finds its place.</p>
            </div>

            <div class="features-container">
                <div class="feature-tabs">
                    <div class="feature-tab active" data-tab="inbox">
                        <div class="tab-content">
                            <div class="tab-icon">
                                <i class="uil uil-inbox"></i>
                            </div>
                            <div class="tab-text">
                                <h3>Digitalized Notes</h3>
                                <p>Capture your notes anywhere, anytime. Everything starts here.</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-tab" data-tab="boards">
                        <div class="tab-content">
                            <div class="tab-icon">
                                <i class="uil uil-apps"></i>
                            </div>
                            <div class="tab-text">
                                <h3>Visual Boards</h3>
                                <p>Visualize your workflow from "to-do tasks" to "notes" with our kanban boards.</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-tab" data-tab="planner">
                        <div class="tab-content">
                            <div class="tab-icon">
                                <i class="uil uil-schedule"></i>
                            </div>
                            <div class="tab-text">
                                <h3>Multiple notes</h3>
                                <p>Organize your thoughts and ideas with dedicated notes for each task.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="feature-display">
                    <div class="image-holder active" id="inbox-holder">
                        <div class="image-container">
                            <img src="../../assets/images/note.jpg" alt="Digitalized Feature" class="feature-image">
                        </div>
                        <p class="image-caption">Capture tasks and notes quickly </p>
                    </div>

                    <div class="image-holder" id="boards-holder">
                        <div class="image-container">
                            <img src="../../assets/images/stick.jpg" alt="Boards Feature" class="feature-image">
                        </div>
                        <p class="image-caption">Organize work visually with visual boards</p>
                    </div>

                    <div class="image-holder" id="planner-holder">
                        <div class="image-container">
                            <img src="../../assets/images/think.jpg" alt="Multiple Notes" class="feature-image">
                        </div>
                        <p class="image-caption">Add your thoughts and ideas for each task</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Proven and Tested</h2>
                <p>Join thousands of people who have transformed their workflow with Queuepal</p>
            </div>

            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"Queuepal has completely changed how I manage projects. I've
                        seen a 40% increase in productivity since switching."</p>
                    <div class="testimonial-author">
                        <img src="../../assets/images/Johnny.jpg" alt="Johnny Makasalanan" class="author-avatar">
                        <div class="author-info">
                            <h4>Johnny Makasalanan</h4>
                            <p>Marketing Assistant, Cybersafe</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p class="testimonial-text">"The intuitive interface makes it easy for me to stay focused. Onboarding was a breeze! Overall, it's a great help!"</p>
                    <div class="testimonial-author">
                        <img src="../../assets/images/bronny.png" alt="Bronny James" class="author-avatar">
                        <div class="author-info">
                            <h4>Bronny James</h4>
                            <p>Basketball player</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p class="testimonial-text">"I've tried countless task managers, but Queuepal is the first one that
                        actually helped me stay organized long-term."</p>
                    <div class="testimonial-author">
                        <img src="../../assets/images/Tina Moran.jpg" alt="Tina Moran" class="author-avatar">
                        <div class="author-info">
                            <h4>Tina Moran</h4>
                            <p>Freelance Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Productivity?</h2>
            <p>Join thousands of professionals who are getting more done with Queuepal</p>
            <div class="cta-buttons">
                <a href="../auth/registration.php" class="btn btn-light">Get Started Free</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>Queuepal</h3>
                    <p>Making productivity simple and accessible for everyone.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="uil uil-twitter-alt"></i></a>
                        <a href="#" class="social-link"><i class="uil uil-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="uil uil-linkedin-alt"></i></a>
                        <a href="#" class="social-link"><i class="uil uil-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Product</h3>
                    <ul class="footer-links">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">Updates</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Tutorials</a></li>
                        <li><a href="#">Community</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Queuepal. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="front.js"></script>

</body>

</html>