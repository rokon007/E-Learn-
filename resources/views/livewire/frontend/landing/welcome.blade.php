<div>
    <!-- Hero Section with Slider -->
    <section class="hero">
        <div class="slider-container">
            <div class="slide active">
                <img src="https://t3.ftcdn.net/jpg/04/42/44/98/360_F_442449827_ispo2oI83ffX0TSax4Pgdd7xkqCA5ThA.jpg" alt="Image 1">
                <div class="slide-content">
                    <h1>Advance Your Skills with Online Learning</h1>
                    <p>Explore a variety of courses taught by industry experts. Learn at your own pace, anytime, anywhere.</p>
                    <a href="#" class="btn">Explore Courses</a>
                </div>
            </div>
            <div class="slide">
                <img src="https://t3.ftcdn.net/jpg/05/14/95/12/360_F_514951224_2dxMLbIw5qNRdPGD003chpbVcxWtcp7K.jpg" alt="Image 2">
                <div class="slide-content">
                    <h1>Learn from Industry Experts</h1>
                    <p>Our instructors are professionals with years of experience in their fields.</p>
                    <a href="#" class="btn">Meet Our Instructors</a>
                </div>
            </div>
            <div class="slide">
                <img src="https://t4.ftcdn.net/jpg/05/36/78/91/360_F_536789107_s0yn1EE4jcS8KiffDcqAUJqzB9KpQFSL.jpg" alt="Image 3">
                <div class="slide-content">
                    <h1>Join Our Community</h1>
                    <p>Connect with like-minded learners and grow together.</p>
                    <a href="#" class="btn">Join Now</a>
                </div>
            </div>
            <div class="slide">
                <img src="https://i.pinimg.com/736x/a0/fb/d3/a0fbd33d4db15e253988d73216d849dd.jpg" alt="Image 4">
                <div class="slide-content">
                    <h1>Get Certified</h1>
                    <p>Earn certificates that boost your career prospects.</p>
                    <a href="#" class="btn">View Certificates</a>
                </div>
            </div>

            <div class="slider-arrows">
                <div class="arrow prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="arrow next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            <div class="slider-nav">
                <div class="slider-dot active"></div>
                <div class="slider-dot"></div>
                <div class="slider-dot"></div>
                <div class="slider-dot"></div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">Proper E Learning Platform gives you a corporate environment and helpful digital marketing community</p>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Web Development</h3>
                    <p>Learn front-end and back-end development with the latest technologies and frameworks.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Digital Marketing</h3>
                    <p>Master SEO, social media marketing, email campaigns, and analytics to boost online presence.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Graphic Design</h3>
                    <p>Create stunning visuals and develop your design skills with industry-standard tools.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Proper E Learning Platform gives you a corporate environment and helpful digital marketing community</p>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>What is Digital Earning Platform?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Admission fee to join this company?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Employees need to cover upon joining?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Criteria for joining the company?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We're not always in the position that we want to be at. We're constantly growing. We're constantly making mistakes. We're constantly trying to express ourselves and actualize our dreams.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('js')
    <script>
        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');

            question.addEventListener('click', () => {
                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });

                // Toggle current item
                item.classList.toggle('active');
            });
        });
    </script>
    @endsection
</div>
